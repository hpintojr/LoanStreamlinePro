<?php
/**
 * Helper functions used across the site.
 */

/** Escape output for HTML context. */
function e(?string $s): string {
    return htmlspecialchars((string)$s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Render a component file from /components, passing variables. */
function component(string $name, array $vars = []): void {
    $file = __DIR__ . '/../components/' . basename($name) . '.php';
    if (!is_file($file)) {
        echo "<!-- missing component: " . e($name) . " -->";
        return;
    }
    extract($vars, EXTR_SKIP);
    include $file;
}

/** Return active CSS classes if current path matches one of the given paths. */
function nav_active(string $path, string $activeClass = 'text-blue-700 font-semibold'): string {
    $current = current_path();
    return ($current === $path) ? $activeClass : '';
}

/**
 * Current request path, normalized: e.g. "/", "/about", "/consolidation-loans".
 * Resolution order (IONOS CGI/FastCGI tolerant):
 *   1. $_GET['_url']            — set by .htaccess rewrite (most reliable on IONOS)
 *   2. $_SERVER['PATH_INFO']    — works if someone hits /index.php/about directly
 *   3. $_SERVER['REQUEST_URI']  — last-resort fallback (clean Apache setups)
 */
function current_path(): string {
    $path = '';
    if (!empty($_GET['_url']) && is_string($_GET['_url'])) {
        $path = $_GET['_url'];
    } elseif (!empty($_SERVER['PATH_INFO'])) {
        $path = $_SERVER['PATH_INFO'];
    } else {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';
    }
    // Normalize: ensure leading slash, strip trailing slash, default to "/"
    $path = '/' . ltrim($path, '/');
    $path = rtrim($path, '/');
    return $path === '' ? '/' : $path;
}

/** Generate (and remember) a CSRF token for the current session. */
function csrf_token(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/** Validate a submitted CSRF token. */
function csrf_check(?string $token): bool {
    return !empty($_SESSION['csrf_token'])
        && is_string($token)
        && hash_equals($_SESSION['csrf_token'], $token);
}

/** PDO connection (lazy). Returns null if DB unreachable so site still loads. */
function db(): ?PDO {
    static $pdo = null;
    if ($pdo !== null) return $pdo;
    try {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]);
    } catch (Throwable $e) {
        error_log('DB connect failed: ' . $e->getMessage());
        $pdo = null;
    }
    return $pdo;
}

/** Build a page <title>. */
function page_title(string $title = ''): string {
    return $title === '' ? SITE_NAME : $title . ' | ' . SITE_NAME;
}

/** Format a phone for display from a raw E.164 number. */
function pretty_phone(string $raw): string {
    $d = preg_replace('/\D/', '', $raw);
    if (strlen($d) === 11 && $d[0] === '1') $d = substr($d, 1);
    if (strlen($d) === 10) {
        return '(' . substr($d, 0, 3) . ') ' . substr($d, 3, 3) . '-' . substr($d, 6);
    }
    return $raw;
}
