<section class="bg-soft-gradient py-12">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <p class="text-sm font-semibold text-brand-700 uppercase tracking-wide">Legal · 10DLC</p>
    <h1 class="mt-2 text-3xl sm:text-4xl font-extrabold text-slate-900">SMS Terms &amp; Conditions</h1>
    <p class="mt-2 text-sm text-slate-500">Last updated: <?= date('F j, Y') ?></p>
  </div>
</section>

<article class="py-12 bg-white">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 prose prose-slate max-w-none">

    <h2>Program description</h2>
    <p>The <?= e(SITE_NAME) ?> SMS program ("Program") is operated by <?= e(PARENT_COMPANY) ?>. The Program sends text messages relating to debt consolidation, personal loan options, account updates, appointment reminders, and customer support — only to recipients who have expressly opted in.</p>

    <h2>Consent (opt-in)</h2>
    <p><?= e(SMS_CONSENT_TEXT) ?></p>
    <p>Consent is not a condition of any purchase. You may opt out at any time without penalty.</p>

    <h2>Message frequency</h2>
    <p>Message frequency varies based on your interactions with us. You may receive transactional messages (e.g., appointment reminders, application updates) and marketing messages (e.g., loan or program offers).</p>

    <h2>Message and data rates</h2>
    <p>Standard message and data rates may apply. Check your wireless plan for details. <?= e(SITE_NAME) ?> does not charge for messages sent via the Program.</p>

    <h2>HELP (assistance)</h2>
    <p>Reply <strong>HELP</strong> to any message to receive help information, or contact us at <a href="mailto:<?= e(BUSINESS_EMAIL) ?>"><?= e(BUSINESS_EMAIL) ?></a> or <a href="tel:<?= e(BUSINESS_PHONE_RAW) ?>"><?= e(BUSINESS_PHONE) ?></a>.</p>

    <h2>STOP (opt-out)</h2>
    <p>Reply <strong>STOP</strong> to any message to unsubscribe from the Program at any time. You will receive a single confirmation message and no further messages, unless you re-subscribe.</p>

    <h2>Supported carriers</h2>
    <p>Compatible with major U.S. carriers including AT&amp;T, T-Mobile, Verizon Wireless, Sprint, Boost, Cricket, MetroPCS, U.S. Cellular, and others. Carriers are not liable for delayed or undelivered messages.</p>

    <h2>AI / automated content disclosure</h2>
    <p><?= e(AI_DISCLOSURE_TEXT) ?></p>

    <h2>Privacy</h2>
    <p>Your mobile information will not be shared with third parties or affiliates for marketing or promotional purposes. Information may be shared with sub-contractors and service providers (such as our SMS gateway and lead-routing platforms) only as needed to operate the Program. See our <a href="/privacy-policy">Privacy Policy</a> for full details.</p>

    <h2>California residents</h2>
    <p>See our <a href="/california-privacy">California Privacy Notice</a> for information about your rights under the CCPA and CPRA.</p>

    <h2>Changes</h2>
    <p>We may update these SMS Terms from time to time. Material changes will be posted to this page with a revised "Last updated" date.</p>

    <h2>Contact</h2>
    <p><?= e(PARENT_COMPANY) ?><br><?= e(BUSINESS_ADDRESS) ?><br><a href="mailto:<?= e(BUSINESS_EMAIL) ?>"><?= e(BUSINESS_EMAIL) ?></a> · <a href="tel:<?= e(BUSINESS_PHONE_RAW) ?>"><?= e(BUSINESS_PHONE) ?></a></p>

  </div>
</article>
