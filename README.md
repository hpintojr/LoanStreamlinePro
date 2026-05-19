# Loan Streamline Pro

Production-ready PHP marketing site for **loanstreamlinepro.com**, a marketing brand of **Advantage First Financial**. Built for IONOS Premium shared hosting (Apache + PHP 8) using Tailwind CSS (CDN) and vanilla JS. No build step required.

## What's in the box

```
loanstreamlinepro/
├── .htaccess                  # HTTPS, non-www, front-controller routing, security headers
├── index.php                  # Front controller / router
├── robots.txt                 # Allow crawlers; block /api, /config, etc.
├── sitemap.xml                # All 10 public pages
├── config/
│   ├── config.php             # Brand, contact, DB, webhook, compliance constants — EDIT THIS
│   └── routes.php             # URL → page mapping
├── includes/
│   ├── helpers.php            # PDO + CSRF + escaping helpers
│   ├── header.php             # <head>, nav, AI disclosure banner
│   ├── nav.php
│   ├── ai-disclosure-banner.php
│   ├── sticky-cta.php
│   └── footer.php             # Footer, compliance disclaimer, JSON-LD
├── components/                # Reusable PHP sections
│   ├── hero.php
│   ├── multi-step-form.php    # 3-step lead capture w/ CSRF + honeypot + SMS consent
│   ├── social-proof.php
│   ├── benefits.php
│   ├── how-it-works.php
│   ├── loan-options.php
│   ├── testimonials.php
│   ├── faq.php
│   ├── cta-banner.php
│   └── trust-badges.php
├── pages/
│   ├── home.php
│   ├── about.php
│   ├── how-it-works.php
│   ├── debt-consolidation.php
│   ├── personal-loans.php
│   ├── contact.php
│   ├── privacy-policy.php
│   ├── terms-conditions.php
│   ├── sms-terms.php
│   ├── california-privacy.php
│   ├── thank-you.php
│   └── 404.php
├── api/
│   └── lead.php               # Lead handler: DB insert + Affine webhook + email
├── assets/
│   ├── css/custom.css
│   ├── js/main.js             # Mobile menu, multi-step form, AJAX submit, sticky CTA
│   └── img/                   # favicon.svg, og-image.svg
└── sql/
    └── schema.sql             # leads, sms_optouts, lead_audit tables
```

## Deployment to IONOS (step by step)

### 1. Create the database

From the IONOS control panel → **Hosting → Databases → Create Database**:
- Type: **MariaDB**
- Name: `loanstreamlinepro` (or your choice)
- Create a user with **all privileges** on that database
- Note the **host**, **db name**, **user**, **password**

Open **phpMyAdmin** for the new DB and run the contents of `sql/schema.sql` to create the `leads`, `sms_optouts`, and `lead_audit` tables.

### 2. Configure the site

Edit `config/config.php` and fill in:
- `BUSINESS_PHONE`, `BUSINESS_PHONE_RAW`, `BUSINESS_EMAIL`, `BUSINESS_ADDRESS` (verify against Advantage First's current published values)
- `LEAD_NOTIFY_EMAIL` — inbox that should receive new-lead notifications
- `DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS` — from step 1
- `CSRF_SECRET` — replace with a random 64+ character string
- `APP_ENV` — keep as `production`

The Affine webhook URL is already wired in.

### 3. Upload via FTP / SFTP

Upload the **entire `loanstreamlinepro/` folder contents** (not the folder itself — i.e. `.htaccess`, `index.php`, etc. should sit at the **document root** of the domain) to:

```
/Public_html/www/loanstreamlinepro/
```

If your domain document root is already `/Public_html/www/loanstreamlinepro/`, you're done — `https://loanstreamlinepro.com/` will hit `index.php`.

### 4. Sanity check

Visit each of these URLs and confirm a 200:
- `/` `/about` `/how-it-works` `/debt-consolidation` `/personal-loans` `/contact` `/privacy-policy` `/terms-and-conditions` `/sms-terms` `/california-privacy`
- `/some-bad-url` → 404 page

Submit a test lead through the homepage form and confirm:
- Lead appears in the `leads` table (phpMyAdmin)
- Webhook receipt appears in your Affine workspace
- Notification email arrives at `LEAD_NOTIFY_EMAIL`

### 5. After go-live

- Submit `sitemap.xml` in Google Search Console.
- Set up the actual SMS provider (Twilio, Telnyx, Bandwidth, etc.) and **register your 10DLC campaign** — see checklist below.
- Wire a STOP-reply webhook from your SMS provider into a small script that inserts the phone number into `sms_optouts`. Your sending logic must check `sms_optouts` before every send.

---

## 10DLC submission checklist (use the research doc as your source)

When you file the 10DLC brand + campaign, you'll need:

- **Legal business name, DBA, EIN** for Advantage First Financial
- **Business address + authorized rep**
- **Website URL** — `https://loanstreamlinepro.com` (live with privacy/terms/SMS terms/CA notice visible)
- **Vertical / use case** — Financial Services, debt consolidation / loan offers
- **Sample messages** — pull from the research doc's templates section
- **Opt-in proof** — screenshot the homepage multi-step form **Step 3** showing the consent block and the linked SMS Terms and Privacy Policy
- **Opt-in language** (verbatim, also stored in the `consent_text` column of every lead row):
  > By submitting this form, you agree to receive SMS messages from Loan Streamline Pro and Advantage First Financial. Message frequency varies. Msg & data rates may apply. Reply STOP to opt out and HELP for help.
- **STOP/HELP handling** — documented in `/sms-terms`
- **AI disclosure** — present on every page (top banner + footer)
- **Estimated monthly volume** — start conservative; high-risk financial verticals are scrutinized

---

## Compliance features built in

- **TCPA / 10DLC:** explicit (unchecked) SMS consent box, full consent text + IP + UA + timestamp stored per lead, STOP/HELP language on every form and on `/sms-terms`.
- **CCPA / CPRA:** dedicated `/california-privacy` page including a `Do Not Sell or Share My Info` section reachable from the footer.
- **AI disclosure:** banner above the navigation on every page, repeated in footer, Privacy, Terms, SMS Terms, and CA notice.
- **Footer disclaimer:** Advantage First Financial / not-a-lender language present on every page.
- **CSRF + honeypot** on the lead form. Submissions log IP and user agent for audit.

## Local development

You can preview the site without IONOS using the built-in PHP server:

```bash
cd loanstreamlinepro
php -S localhost:8000 index.php
```

Then open `http://localhost:8000`. The DB connection will fail locally (that's fine), but the webhook and email steps will still attempt — set `APP_ENV` to `development` in `config/config.php` to see errors on screen.

## Notes & known to-dos

1. Replace `BUSINESS_PHONE`, address, and EIN in `config/config.php` with the exact values from Advantage First's official records before 10DLC submission. Carriers cross-check.
2. The OG image is a lightweight SVG. For best social previews, export it to a 1200×630 PNG and save as `assets/img/og-image.png` (the meta tag already points there).
3. The site uses the Tailwind CDN for zero-build simplicity. Page weight is fine, but for absolute peak performance you can switch to a pre-built `tailwind.css` later — header has a single `<script>` tag to swap.
