<?php
/**
 * Loan Streamline Pro — Front Controller
 * All non-asset requests are routed here by .htaccess.
 */

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/helpers.php';

$routes = require __DIR__ . '/config/routes.php';
$path   = current_path();

// --- Special API endpoints ----------------------------------------------
// Both URLs route to the same handler. /submit is a fallback in case IONOS
// ModSecurity blocks /api/lead (common on financial-services sites).
if ($path === '/api/lead' || $path === '/submit' || $path === '/get-rate') {
    require __DIR__ . '/api/lead.php';
    exit;
}

// --- Diagnostic page (delete this block after go-live) ------------------
// Visit https://loanstreamlinepro.com/diag to verify rewrites + DB + sessions.
if ($path === '/diag') {
    header('Content-Type: text/plain; charset=utf-8');
    echo "Loan Streamline Pro — diagnostic\n";
    echo "================================\n\n";

    echo "[Routing] -----------------------------------------\n";
    echo "  PHP version:        " . PHP_VERSION . " (" . PHP_SAPI . ")\n";
    echo "  REQUEST_URI:        " . ($_SERVER['REQUEST_URI'] ?? '(none)') . "\n";
    echo "  PATH_INFO:          " . ($_SERVER['PATH_INFO']   ?? '(none)') . "\n";
    echo "  _url query param:   " . ($_GET['_url']           ?? '(none)') . "\n";
    echo "  Resolved path:      " . $path . "\n";
    echo "  HTTPS:              " . (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'yes' : 'no') . "\n";
    $usedRewrite = !empty($_GET['_url']);
    echo "  Rewrite working:    " . ($usedRewrite ? 'YES  (via ?_url query parameter)' : 'no — direct hit on /index.php?') . "\n\n";

    echo "[Session] -----------------------------------------\n";
    echo "  Session active:     " . (session_status() === PHP_SESSION_ACTIVE ? 'yes' : 'no') . "\n";
    echo "  CSRF token:         " . (csrf_token() ? 'generated' : 'FAILED') . "\n\n";

    echo "[Database] ----------------------------------------\n";
    $pdo = db();
    if ($pdo) {
        try {
            $stmt = $pdo->query('SELECT VERSION() AS v, NOW() AS n');
            $row  = $stmt->fetch();
            echo "  Connection:         OK (" . $row['v'] . ", server time " . $row['n'] . ")\n";
            $stmt = $pdo->query('SHOW TABLES');
            $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
            echo "  Tables:             " . (count($tables) ? implode(', ', $tables) : '(none — run sql/schema.sql in phpMyAdmin)') . "\n";
            if (in_array('leads', $tables, true)) {
                $cnt = (int)$pdo->query('SELECT COUNT(*) FROM leads')->fetchColumn();
                echo "  Leads recorded:     " . $cnt . "\n";
            }
        } catch (Throwable $e) {
            echo "  Query failed:       " . $e->getMessage() . "\n";
        }
    } else {
        echo "  Connection:         FAILED — verify DB_HOST/DB_NAME/DB_USER/DB_PASS in config/config.php\n";
    }

    echo "\n[Webhook] -----------------------------------------\n";
    echo "  URL configured:     " . (LEAD_WEBHOOK_ENABLED && LEAD_WEBHOOK_URL ? 'yes' : 'no') . "\n";
    echo "  cURL available:     " . (function_exists('curl_init') ? 'yes' : 'no') . "\n";

    echo "\n[Routes] ------------------------------------------\n";
    foreach ($routes as $r => $info) {
        echo "  " . str_pad($r, 28, ' ', STR_PAD_RIGHT) . " -> pages/" . $info['page'] . ".php\n";
    }
    echo "\nIf you see this page, the front controller is reachable. If 'Rewrite working' shows YES,\nyou can safely delete this /diag block from index.php once the site is live.\n";
    exit;
}

// --- Page lookup --------------------------------------------------------
if (!isset($routes[$path])) {
    http_response_code(404);
    $route = ['page' => '404', 'title' => 'Page Not Found', 'desc' => 'The page you requested could not be found.'];
} else {
    $route = $routes[$path];
}

$PAGE_TITLE = page_title($route['title']);
$PAGE_DESC  = $route['desc'] ?? '';
$PAGE_PATH  = $path;

require __DIR__ . '/includes/header.php';

$pageFile = __DIR__ . '/pages/' . basename($route['page']) . '.php';
if (is_file($pageFile)) {
    require $pageFile;
} else {
    echo '<main class="container mx-auto px-4 py-24"><h1 class="text-3xl font-bold">Page missing</h1></main>';
}

require __DIR__ . '/includes/footer.php';
