<?php
/**
 * Loan Streamline Pro — Site Configuration
 * Edit the constants below before deploying to production.
 */

// --- Brand --------------------------------------------------------------
define('SITE_NAME',          'Loan Streamline Pro');
define('SITE_SHORT',         'LSLP');
define('PARENT_COMPANY',     'Advantage First Financial');
define('SITE_URL',           'https://loanstreamlinepro.com');
define('SITE_TAGLINE',       'Simplify your debt. Strengthen your future.');

// --- Contact (sourced from advantagefirst.com — update if outdated) -----
define('BUSINESS_PHONE',     '(800) 555-0100');           // TODO: replace with Advantage First's current published phone
define('BUSINESS_PHONE_RAW', '+18005550100');
define('BUSINESS_EMAIL',     'support@advantagefirst.com');
define('LEAD_NOTIFY_EMAIL',  'leads@loanstreamlinepro.com'); // where new lead notifications are sent
define('BUSINESS_ADDRESS',   'Advantage First Financial, USA');
define('BUSINESS_HOURS',     'Mon–Fri 8am–6pm PT');

// --- Compliance ---------------------------------------------------------
define('SMS_CONSENT_TEXT',
    'By submitting this form, you agree to receive SMS messages from Loan Streamline Pro and ' .
    'Advantage First Financial. Message frequency varies. Msg & data rates may apply. ' .
    'Reply STOP to opt out and HELP for help.'
);
define('AI_DISCLOSURE_TEXT',
    'Some communications may be generated using automated technology or AI-assisted systems.'
);
define('FOOTER_DISCLAIMER',
    'Loan Streamline Pro is a marketing brand operated by Advantage First Financial. ' .
    'We are not a direct lender. Loan approvals and terms are subject to eligibility and lender approval.'
);

// --- Database (IONOS MariaDB) -------------------------------------------
define('DB_HOST', 'db5020491379.hosting-data.io');
define('DB_NAME', 'dbs15690723');
define('DB_USER', 'dbu968206');
define('DB_PASS', 'Gi0p7P8-re#9der1yePhEpR2vlChez');
define('DB_CHARSET', 'utf8mb4');

// --- Lead webhook (Affine workspace) ------------------------------------
define('LEAD_WEBHOOK_URL',
    'https://affine.uw-t.com/workspace/39f696a9-4652-4cb9-99c3-9b0346ec6c00/hmQq-gfFUAPlgAIDIbKYA'
);
define('LEAD_WEBHOOK_ENABLED', true);

// --- Security -----------------------------------------------------------
define('CSRF_SECRET', 'CHANGE_THIS_TO_A_LONG_RANDOM_STRING_64_CHARS_MINIMUM_BEFORE_DEPLOY');

// --- Environment --------------------------------------------------------
// 'development' = errors print to the page (helpful while debugging).
// 'production'  = errors are silently logged to php_errors.log in the site root.
define('APP_ENV', 'production');

// --- Error handling -----------------------------------------------------
// IONOS sets display_errors=Off and log_errors=Off by default, so silent 500s
// are invisible. We override both: errors always go to a local file you can
// download via FTP/SFTP to diagnose problems.
$errorLog = __DIR__ . '/../php_errors.log';
if (APP_ENV === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
} else {
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);
    ini_set('display_errors', '0');
}
ini_set('log_errors', '1');
ini_set('error_log',  $errorLog);

// --- Timezone (California) ---------------------------------------------
date_default_timezone_set('America/Los_Angeles');

// --- Session ------------------------------------------------------------
if (session_status() === PHP_SESSION_NONE) {
    $secure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
           || (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https');
    ini_set('session.cookie_httponly', '1');
    ini_set('session.cookie_secure',   $secure ? '1' : '0');
    ini_set('session.cookie_samesite', 'Lax');
    session_start();
}
