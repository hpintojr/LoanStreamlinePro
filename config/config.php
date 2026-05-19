<?php
/**
 * Loan Streamline Pro — Site Configuration
 *
 * Loan Streamline Pro is positioned as the operating entity (Wyoming).
 * Advantage First Financial LLC is referenced only at the bottom of the site
 * as the NMLS-licensed entity (NMLS ID 2674295).
 */

// --- Brand --------------------------------------------------------------
define('SITE_NAME',          'Loan Streamline Pro');
define('SITE_SHORT',         'LSP');
define('SITE_URL',           'https://loanstreamlinepro.com');
define('SITE_TAGLINE',       'Simplify your balances. Strengthen your future.');

// --- Operating entity (appears throughout the site) --------------------
define('OPERATING_ENTITY',   'Loan Streamline Pro');
define('OPERATING_ADDRESS',  '1712 Pioneer Ave Suite 500, Cheyenne, WY 82001, United States');
define('OPERATING_ADDR_ONE_LINE', '1712 Pioneer Ave Suite 500, Cheyenne, WY 82001');

// --- NMLS reference (appears only at the bottom for licensing disclosure)
define('NMLS_ENTITY',        'Advantage First Financial LLC');
define('NMLS_ID',            '2674295');
define('NMLS_URL',           'https://www.nmlsconsumeraccess.org/EntityDetails.aspx/COMPANY/2674295');

// --- Contact -----------------------------------------------------------
define('BUSINESS_PHONE',     '(800) 555-0100');                // TODO: replace with current published phone
define('BUSINESS_PHONE_RAW', '+18005550100');
define('BUSINESS_EMAIL',     'support@loanstreamlinepro.com');
define('LEAD_NOTIFY_EMAIL',  'leads@loanstreamlinepro.com');
define('BUSINESS_ADDRESS',   OPERATING_ADDR_ONE_LINE);
define('BUSINESS_HOURS',     'Mon–Fri 8am–6pm PT');

// --- Featured rate (used in hero) --------------------------------------
define('FEATURED_RATE_LOW',  '4.99');                          // % APR — starting rate displayed
define('FEATURED_RATE_NOTE', 'APR range varies by lender and creditworthiness. Lowest rates require excellent credit.');

// --- Compliance: form consent text -------------------------------------
// Both consent boxes are OPTIONAL on the form. The exact text shown is stored
// with each submitted lead for carrier/regulator audit.
define('SMS_CONSENT_TEXT',
    'I agree to receive marketing and informational text messages (SMS) from Loan Streamline Pro ' .
    'at the phone number provided, including messages sent using an autodialer or AI/conversational ' .
    'technology. Consent is not a condition of any purchase or service. Msg & data rates may apply. ' .
    'Message frequency varies. Reply HELP for help, STOP to cancel. View our Privacy Policy.'
);
define('CALL_CONSENT_TEXT',
    'I agree to receive marketing and informational phone calls from Loan Streamline Pro at the ' .
    'phone number provided, including calls placed using an automatic telephone dialing system or ' .
    'an artificial or prerecorded voice. Consent is not a condition of any purchase or service.'
);
define('AI_DISCLOSURE_TEXT',
    'Some communications may be generated using automated technology or AI-assisted systems.'
);
define('FOOTER_DISCLAIMER',
    'Loan Streamline Pro is not a lender. We help match consumers with lending and financial ' .
    'service partners. Loan approvals and final terms are subject to lender eligibility, ' .
    'creditworthiness, and applicable state law.'
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
define('APP_ENV', 'production');

// --- Error handling -----------------------------------------------------
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

// --- Backward compatibility (some templates still reference PARENT_COMPANY)
// PARENT_COMPANY now resolves to the operating entity to keep templates working.
// Remove once all templates have been updated.
if (!defined('PARENT_COMPANY')) define('PARENT_COMPANY', OPERATING_ENTITY);
