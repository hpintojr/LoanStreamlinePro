<?php
/**
 * Orphan page — kept only because the sandbox can't delete files.
 * Direct hits to /pages/debt-consolidation.php are blocked by .htaccess.
 * Requests to /debt-consolidation are 301-redirected to /consolidation-loans
 * before this file is ever reached. You can safely delete this file via FTP.
 */
header('Location: /consolidation-loans', true, 301);
exit;
