-- =============================================================================
-- Loan Streamline Pro — Migration 001: Consent v2
--
-- Run this once in phpMyAdmin to upgrade an existing `leads` table that was
-- created with the original schema (single `consent_text` column).
--
-- After running:
--   * `consent_text` is renamed to `sms_consent_text`
--   * New `call_consent` TINYINT and `call_consent_text` TEXT columns exist
-- =============================================================================

-- 1) Rename the original consent_text column to sms_consent_text
ALTER TABLE `leads`
    CHANGE COLUMN `consent_text` `sms_consent_text` TEXT DEFAULT NULL;

-- 2) Add the call_consent flag column
ALTER TABLE `leads`
    ADD COLUMN `call_consent` TINYINT(1) NOT NULL DEFAULT 0 AFTER `sms_consent_text`;

-- 3) Add the call_consent_text column
ALTER TABLE `leads`
    ADD COLUMN `call_consent_text` TEXT DEFAULT NULL AFTER `call_consent`;

-- If any statement errors "column already exists" or "column not found", the
-- migration was partially applied — verify state with: SHOW COLUMNS FROM leads;
