-- =============================================================================
-- Loan Stream Line Pro — MariaDB / MySQL schema
-- Run this once in phpMyAdmin (IONOS) on the database you created.
-- =============================================================================

CREATE TABLE IF NOT EXISTS `leads` (
    `id`               BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `created_at`       DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `first_name`       VARCHAR(80)   NOT NULL,
    `last_name`        VARCHAR(80)   DEFAULT NULL,
    `email`            VARCHAR(190)  NOT NULL,
    `phone`            VARCHAR(32)   NOT NULL,
    `state`            VARCHAR(8)    DEFAULT NULL,
    `debt_amount`      VARCHAR(40)   DEFAULT NULL,
    `loan_purpose`     VARCHAR(80)   DEFAULT NULL,
    `credit_range`     VARCHAR(40)   DEFAULT NULL,
    `monthly_income`   VARCHAR(40)   DEFAULT NULL,
    `source_page`      VARCHAR(190)  DEFAULT NULL,
    `referrer`         VARCHAR(190)  DEFAULT NULL,
    `utm_source`       VARCHAR(80)   DEFAULT NULL,
    `utm_medium`       VARCHAR(80)   DEFAULT NULL,
    `utm_campaign`     VARCHAR(120)  DEFAULT NULL,

    -- TCPA / 10DLC consent audit trail (both consents are OPTIONAL on the form)
    `sms_consent`        TINYINT(1)  NOT NULL DEFAULT 0,
    `sms_consent_text`   TEXT        DEFAULT NULL, -- exact SMS consent text shown to user
    `call_consent`       TINYINT(1)  NOT NULL DEFAULT 0,
    `call_consent_text`  TEXT        DEFAULT NULL, -- exact phone-call consent text shown to user
    `consent_ip`         VARCHAR(45) DEFAULT NULL,
    `consent_user_agent` VARCHAR(255) DEFAULT NULL,
    `consent_timestamp`  DATETIME    DEFAULT NULL,

    -- Internal pipeline
    `status`           ENUM('new','contacted','qualified','disqualified','converted') NOT NULL DEFAULT 'new',
    `webhook_status`   ENUM('pending','sent','failed','disabled') NOT NULL DEFAULT 'pending',
    `webhook_response` TEXT          DEFAULT NULL,
    `notes`            TEXT          DEFAULT NULL,

    PRIMARY KEY (`id`),
    KEY `idx_created_at` (`created_at`),
    KEY `idx_email` (`email`),
    KEY `idx_phone` (`phone`),
    KEY `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Opt-out / STOP log — keep a record any time someone replies STOP via SMS provider webhook.
CREATE TABLE IF NOT EXISTS `sms_optouts` (
    `id`         BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `phone`      VARCHAR(32)   NOT NULL,
    `optout_at`  DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `source`     VARCHAR(40)   NOT NULL DEFAULT 'sms_reply',
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_phone` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Audit log of every lead handler call (helpful when carriers ask for consent proof).
CREATE TABLE IF NOT EXISTS `lead_audit` (
    `id`          BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `lead_id`     BIGINT UNSIGNED DEFAULT NULL,
    `action`      VARCHAR(40)  NOT NULL,
    `payload`     TEXT         DEFAULT NULL,
    `ip`          VARCHAR(45)  DEFAULT NULL,
    `user_agent`  VARCHAR(255) DEFAULT NULL,
    `created_at`  DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_lead_id` (`lead_id`),
    KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
