<?php
/**
 * Loan Streamline Pro — Site Configuration
 *
 * "Loan Streamline Pro" is a registered brand / assumed name of
 * Advantage First Financial LLC (NMLS ID 2674295). Advantage First Financial
 * is the licensed lender and the legal entity behind this site. The company is
 * licensed to lend in Texas (OCCC Regulated Lender) and Utah (DFI Consumer
 * Credit Notification); the site is intended for residents of those states.
 * OPERATING_ENTITY therefore resolves to the legal entity (AFF); SITE_NAME is
 * the consumer-facing brand.
 */

// --- Brand --------------------------------------------------------------
define('SITE_NAME',          'Loan Streamline Pro');
define('SITE_SHORT',         'LSP');
define('SITE_URL',           'https://loanstreamlinepro.com');
define('SITE_TAGLINE',       'Straightforward personal loans. Real people.');

// --- Operating / legal entity (appears throughout the site) ------------
// The legal entity is Advantage First Financial LLC, doing business as
// "Loan Streamline Pro." Legal documents contract in the name of AFF.
define('OPERATING_ENTITY',   'Advantage First Financial LLC');
define('OPERATING_ADDRESS',  '3187 Red Hill Ave Suite 230, Costa Mesa, CA 92626, United States');
define('OPERATING_ADDR_ONE_LINE', '3187 Red Hill Ave Suite 230, Costa Mesa, CA 92626');

// --- States we are licensed to lend in ---------------------------------
define('LICENSED_STATES',    'Texas and Utah');

// --- NMLS reference (licensed lender) ----------------------------------
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
define('FEATURED_RATE_LOW',  '5.99');                          // % APR — starting rate displayed
define('FEATURED_RATE_NOTE', 'APR range varies by creditworthiness, loan amount, term, and state of residence. Lowest rates require excellent credit. Not all applicants will qualify.');

// --- Compliance: form consent text -------------------------------------
// Both consent boxes are OPTIONAL on the form. The exact text shown is stored
// with each submitted lead for carrier/regulator audit.
define('SMS_CONSENT_TEXT',
    'I agree to receive informational text messages (SMS) related to my loan inquiry, application, ' .
    'and account from Loan Streamline Pro at the phone number provided, including messages sent ' .
    'using an autodialer or AI/conversational ' .
    'technology. Consent is not a condition of any purchase or service. Msg & data rates may apply. ' .
    'Message frequency varies. Reply HELP for help, STOP to cancel. View our Privacy Policy.'
);
define('CALL_CONSENT_TEXT',
    'I agree to receive informational phone calls related to my loan inquiry, application, and ' .
    'account from Loan Streamline Pro at the phone number provided, including calls placed using ' .
    'an automatic telephone dialing system or ' .
    'an artificial or prerecorded voice. Consent is not a condition of any purchase or service.'
);
define('AI_DISCLOSURE_TEXT',
    'Some communications may be generated using automated technology or AI-assisted systems.'
);
// A2P 10DLC / SMS carrier requirement. This exact carve-out must appear on the
// Privacy Policy and SMS Terms URLs submitted for campaign registration.
define('MOBILE_PRIVACY_CLAUSE',
    'Mobile information — including your mobile phone number and SMS/text-messaging ' .
    'opt-in consent — will not be shared, sold, rented, or transferred to any third ' .
    'parties or affiliates for their own marketing or promotional purposes. SMS opt-in ' .
    'consent is never shared with third parties for any purpose. Mobile information may ' .
    'be disclosed only to the service providers (such as our SMS gateway) that help us ' .
    'operate the messaging program, and only as needed to deliver those messages.'
);
define('FOOTER_DISCLAIMER',
    'Loan Streamline Pro is a brand of Advantage First Financial LLC (NMLS #2674295), a licensed ' .
    'lender. We currently make loans to residents of Texas and Utah. All loans are subject to ' .
    'eligibility, creditworthiness, and applicable state law. Not all applicants will qualify, and ' .
    'rates and terms vary by applicant.'
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
