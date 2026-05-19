<?php
/**
 * /api/lead — Lead capture endpoint.
 *
 * Pipeline:
 *   1. Verify request method, CSRF token, honeypot
 *   2. Validate & sanitize fields
 *   3. Require explicit SMS consent (record full audit trail: text, IP, UA, timestamp)
 *   4. Insert into `leads` table
 *   5. POST JSON to Affine webhook (LEAD_WEBHOOK_URL)
 *   6. Send notification email to LEAD_NOTIFY_EMAIL
 *   7. Reply with JSON for AJAX, or 303 redirect to /thank-you for no-JS submits
 *
 * Failure handling: every fatal/exception is caught and returned as JSON so
 * the browser can show the user what went wrong (no more silent 500s).
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/helpers.php';

header('X-Content-Type-Options: nosniff');

$wantsJson = (
    (isset($_SERVER['HTTP_ACCEPT']) && stripos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) ||
    (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') ||
    (isset($_SERVER['CONTENT_TYPE']) && stripos($_SERVER['CONTENT_TYPE'], 'application/json') !== false)
);

/** Always-on JSON / redirect reply. */
function reply(bool $ok, string $message, array $extra = [], int $status = 200): void {
    global $wantsJson;
    http_response_code($status);
    if ($wantsJson) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['ok' => $ok, 'message' => $message] + $extra);
    } else {
        if ($ok) {
            header('Location: /thank-you', true, 303);
        } else {
            header('Location: /?error=' . urlencode($message) . '#apply', true, 303);
        }
    }
    exit;
}

// ---- Fatal-error safety net --------------------------------------------
// Catches things like "Class not found", out-of-memory, parse errors in includes —
// anything that would otherwise leave the browser with a blank 500.
register_shutdown_function(function () use (&$wantsJson) {
    $err = error_get_last();
    if ($err && in_array($err['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR, E_USER_ERROR], true)) {
        if (!headers_sent()) {
            http_response_code(500);
            if ($wantsJson) {
                header('Content-Type: application/json; charset=utf-8');
                echo json_encode([
                    'ok'      => false,
                    'message' => 'Server error (see error log). Please try again or call us.',
                    'php_error' => $err['message'] . ' in ' . basename($err['file']) . ':' . $err['line'],
                ]);
            } else {
                echo '<h1>Server error</h1><pre>' . htmlspecialchars($err['message']) . '</pre>';
            }
        }
    }
});

set_exception_handler(function (Throwable $e) use (&$wantsJson) {
    error_log('lead.php uncaught: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine());
    if (!headers_sent()) {
        http_response_code(500);
        if ($wantsJson) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode([
                'ok'        => false,
                'message'   => 'Server error processing your request. Please call us or try again.',
                'php_error' => $e->getMessage(),
            ]);
        } else {
            echo '<h1>Error</h1><pre>' . htmlspecialchars($e->getMessage()) . '</pre>';
        }
    }
    exit;
});

// ---- Test-mode (helps verify the endpoint is reachable) ----------------
// Visit /api/lead?test=1 (GET) to confirm config + DB are ready before submitting.
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'GET' && !empty($_GET['test'])) {
    header('Content-Type: application/json; charset=utf-8');
    $pdo  = db();
    $info = [
        'ok'              => true,
        'endpoint'        => '/api/lead',
        'method_accepted' => 'POST',
        'session_active'  => session_status() === PHP_SESSION_ACTIVE,
        'csrf_token_set'  => !empty($_SESSION['csrf_token']),
        'db_connected'    => (bool)$pdo,
        'webhook_url_set' => (bool)(LEAD_WEBHOOK_ENABLED && LEAD_WEBHOOK_URL),
        'curl_available'  => function_exists('curl_init'),
        'mail_available'  => function_exists('mail'),
        'php_version'     => PHP_VERSION,
        'php_sapi'        => PHP_SAPI,
    ];
    if ($pdo) {
        try {
            $info['tables'] = $pdo->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);
        } catch (Throwable $e) { $info['db_error'] = $e->getMessage(); }
    }
    echo json_encode($info, JSON_PRETTY_PRINT);
    exit;
}

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    reply(false, 'Method not allowed. POST a form to this endpoint.', [], 405);
}

// ---- CSRF ---------------------------------------------------------------
if (!csrf_check($_POST['csrf_token'] ?? null)) {
    error_log('lead.php: CSRF check failed. POST keys: ' . implode(',', array_keys($_POST)));
    reply(false, 'Your session expired. Please refresh the page and try again.', [], 419);
}

// ---- Honeypot -----------------------------------------------------------
if (!empty($_POST['website'])) {
    // Bot — silently pretend success.
    reply(true, 'Thanks!');
}

// ---- Validate -----------------------------------------------------------
$errors = [];

$first_name        = trim((string)($_POST['first_name'] ?? ''));
$last_name         = trim((string)($_POST['last_name'] ?? ''));
$email             = trim((string)($_POST['email'] ?? ''));
$phone_raw         = trim((string)($_POST['phone'] ?? ''));
$state             = strtoupper(trim((string)($_POST['state'] ?? '')));
// Only accept 2-letter US state codes; otherwise store null.
$validStates       = ['AL','AK','AZ','AR','CA','CO','CT','DE','DC','FL','GA','HI','ID','IL','IN','IA','KS','KY','LA','ME','MD','MA','MI','MN','MS','MO','MT','NE','NV','NH','NJ','NM','NY','NC','ND','OH','OK','OR','PA','RI','SC','SD','TN','TX','UT','VT','VA','WA','WV','WI','WY'];
if (!in_array($state, $validStates, true)) $state = '';
$debt_amount       = trim((string)($_POST['debt_amount'] ?? ''));
$loan_purpose      = trim((string)($_POST['loan_purpose'] ?? ''));
$credit_range      = trim((string)($_POST['credit_range'] ?? ''));
$monthly_income    = trim((string)($_POST['monthly_income'] ?? ''));
$source_page       = trim((string)($_POST['source_page'] ?? '/'));

// Two OPTIONAL consents — neither is required for a valid submission.
// We always store the *exact text shown* (from hidden fields) so the audit
// trail proves which version of the disclosure the user actually saw.
$sms_consent       = !empty($_POST['sms_consent'])  ? 1 : 0;
$call_consent      = !empty($_POST['call_consent']) ? 1 : 0;
$sms_consent_text  = trim((string)($_POST['sms_consent_text']  ?? SMS_CONSENT_TEXT));
$call_consent_text = trim((string)($_POST['call_consent_text'] ?? CALL_CONSENT_TEXT));

if ($first_name === '' || mb_strlen($first_name) > 80)        $errors[] = 'First name is required.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL))               $errors[] = 'A valid email is required.';
$phone_digits = preg_replace('/\D/', '', $phone_raw);
if (strlen($phone_digits) < 10 || strlen($phone_digits) > 15) $errors[] = 'A valid phone number is required.';

if ($errors) {
    reply(false, implode(' ', $errors), ['errors' => $errors], 422);
}

// Normalize phone to +E.164-ish (assume US if 10 digits)
$phone = (strlen($phone_digits) === 10) ? '+1' . $phone_digits : '+' . $phone_digits;

// Consent metadata
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? null;
if ($ip) $ip = trim(explode(',', $ip)[0]);
$ua = substr((string)($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 255);
$referrer = substr((string)($_SERVER['HTTP_REFERER'] ?? ''), 0, 190);
$utm = [
    'utm_source'   => substr((string)($_POST['utm_source']   ?? $_GET['utm_source']   ?? ''), 0, 80),
    'utm_medium'   => substr((string)($_POST['utm_medium']   ?? $_GET['utm_medium']   ?? ''), 0, 80),
    'utm_campaign' => substr((string)($_POST['utm_campaign'] ?? $_GET['utm_campaign'] ?? ''), 0, 120),
];
$now = date('Y-m-d H:i:s');

$lead = [
    'created_at'         => $now,
    'first_name'         => $first_name,
    'last_name'          => $last_name,
    'email'              => strtolower($email),
    'phone'              => $phone,
    'state'              => $state,
    'debt_amount'        => $debt_amount,
    'loan_purpose'       => $loan_purpose,
    'credit_range'       => $credit_range,
    'monthly_income'     => $monthly_income,
    'source_page'        => $source_page,
    'referrer'           => $referrer,
    'utm_source'         => $utm['utm_source'],
    'utm_medium'         => $utm['utm_medium'],
    'utm_campaign'       => $utm['utm_campaign'],
    'sms_consent'        => $sms_consent,
    'sms_consent_text'   => $sms_consent_text,
    'call_consent'       => $call_consent,
    'call_consent_text'  => $call_consent_text,
    'consent_ip'         => $ip,
    'consent_user_agent' => $ua,
    'consent_timestamp'  => $now,
];

// ---- Insert into DB (non-fatal if it fails — webhook/email still go) ----
$leadId = null;
$dbError = null;
$pdo = db();
if ($pdo) {
    try {
        $cols = array_keys($lead);
        $sql = 'INSERT INTO leads (`' . implode('`,`', $cols) . '`) VALUES (:' . implode(',:', $cols) . ')';
        $stmt = $pdo->prepare($sql);
        $stmt->execute($lead);
        $leadId = (int)$pdo->lastInsertId();
    } catch (Throwable $e) {
        $dbError = $e->getMessage();
        error_log('lead.php DB insert failed: ' . $dbError);
    }
} else {
    $dbError = 'DB unavailable — check DB_HOST/DB_NAME/DB_USER/DB_PASS in config/config.php.';
    error_log('lead.php: ' . $dbError);
}

// ---- POST to Affine webhook --------------------------------------------
$webhookOk = null;
$webhookResp = '';
if (LEAD_WEBHOOK_ENABLED && LEAD_WEBHOOK_URL && function_exists('curl_init')) {
    $payload = json_encode(array_merge(['lead_id' => $leadId, 'site' => SITE_NAME], $lead));
    $ch = curl_init(LEAD_WEBHOOK_URL);
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => $payload,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json', 'User-Agent: LoanStreamlinePro/1.0'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 8,
        CURLOPT_FOLLOWLOCATION => true,
    ]);
    $resp = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err  = curl_error($ch);
    curl_close($ch);
    $webhookOk   = ($code >= 200 && $code < 300);
    $webhookResp = substr('HTTP ' . $code . ' ' . ($err ?: substr((string)$resp, 0, 500)), 0, 1000);

    if ($pdo && $leadId) {
        try {
            $u = $pdo->prepare('UPDATE leads SET webhook_status = :s, webhook_response = :r WHERE id = :id');
            $u->execute([':s' => $webhookOk ? 'sent' : 'failed', ':r' => $webhookResp, ':id' => $leadId]);
        } catch (Throwable $e) {
            error_log('lead.php webhook status update failed: ' . $e->getMessage());
        }
    }
}

// ---- Email notification -------------------------------------------------
if (LEAD_NOTIFY_EMAIL && function_exists('mail')) {
    $to      = LEAD_NOTIFY_EMAIL;
    $subject = '[New Lead] ' . SITE_NAME . ' — ' . $first_name . ' ' . $last_name . ' (' . $debt_amount . ')';
    $body    = "A new lead has been submitted on " . SITE_NAME . ".\n\n";
    foreach ($lead as $k => $v) {
        $body .= str_pad($k, 22, ' ', STR_PAD_RIGHT) . ': ' . (is_scalar($v) ? $v : json_encode($v)) . "\n";
    }
    $body .= "\nLead ID: " . ($leadId ?? 'NULL (DB insert failed)') . "\n";
    if ($webhookOk !== null) {
        $body .= 'Webhook: ' . ($webhookOk ? 'sent' : 'FAILED — ' . $webhookResp) . "\n";
    }
    $headers  = 'From: ' . SITE_NAME . ' <no-reply@' . parse_url(SITE_URL, PHP_URL_HOST) . ">\r\n";
    $headers .= 'Reply-To: ' . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
    @mail($to, $subject, $body, $headers);
}

// ---- Audit log ----------------------------------------------------------
if ($pdo) {
    try {
        $a = $pdo->prepare('INSERT INTO lead_audit (lead_id, action, payload, ip, user_agent) VALUES (:lid, :a, :p, :ip, :ua)');
        $a->execute([
            ':lid' => $leadId,
            ':a'   => 'lead_submitted',
            ':p'   => json_encode(['webhook_ok' => $webhookOk, 'webhook_resp' => $webhookResp, 'db_error' => $dbError]),
            ':ip'  => $ip,
            ':ua'  => $ua,
        ]);
    } catch (Throwable $e) { /* non-fatal */ }
}

reply(true, 'Thanks! We received your information.', [
    'lead_id'       => $leadId,
    'redirect'      => '/thank-you',
    'webhook_ok'    => $webhookOk,
    'db_error'      => $dbError,
]);
