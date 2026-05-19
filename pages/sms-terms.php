<section class="bg-soft-gradient py-12">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <p class="text-sm font-semibold text-brand-700 uppercase tracking-wide">Legal · 10DLC</p>
    <h1 class="mt-2 text-3xl sm:text-4xl font-extrabold text-slate-900">SMS Terms &amp; Conditions</h1>
    <p class="mt-2 text-sm text-slate-500">Last updated: <?= date('F j, Y') ?></p>
  </div>
</section>

<article class="py-12 bg-white">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-slate-700 leading-relaxed space-y-8">

    <section class="space-y-3">
      <h2 class="text-2xl font-bold text-slate-900">Program description</h2>
      <p>The <?= e(SITE_NAME) ?> SMS program (the "<strong>Program</strong>") is operated by <?= e(OPERATING_ENTITY) ?>. The Program sends text messages relating to consolidation loans, personal loan options, account updates, appointment reminders, and customer support — only to recipients who have expressly opted in.</p>
    </section>

    <section class="space-y-3">
      <h2 class="text-2xl font-bold text-slate-900">Consent (opt-in)</h2>
      <p><?= e(SMS_CONSENT_TEXT) ?></p>
      <p>Consent is not a condition of any purchase or service. You may opt out at any time without penalty.</p>
    </section>

    <section class="space-y-3">
      <h2 class="text-2xl font-bold text-slate-900">Message frequency</h2>
      <p>Message frequency varies based on your interactions with us. You may receive transactional messages (e.g., appointment reminders, application updates) and marketing messages (e.g., loan or program offers).</p>
    </section>

    <section class="space-y-3">
      <h2 class="text-2xl font-bold text-slate-900">Message &amp; data rates</h2>
      <p>Standard message and data rates may apply. Check your wireless plan for details. <?= e(SITE_NAME) ?> does not charge for messages sent via the Program.</p>
    </section>

    <section class="space-y-3">
      <h2 class="text-2xl font-bold text-slate-900">HELP (assistance)</h2>
      <p>Reply <strong>HELP</strong> to any message to receive help information, or contact us at <a href="mailto:<?= e(BUSINESS_EMAIL) ?>" class="text-brand-700 underline"><?= e(BUSINESS_EMAIL) ?></a> or <a href="tel:<?= e(BUSINESS_PHONE_RAW) ?>" class="text-brand-700 underline"><?= e(BUSINESS_PHONE) ?></a>.</p>
    </section>

    <section class="space-y-3">
      <h2 class="text-2xl font-bold text-slate-900">STOP (opt-out)</h2>
      <p>Reply <strong>STOP</strong> to any message to unsubscribe from the Program at any time. You will receive a single confirmation message and no further messages, unless you re-subscribe.</p>
    </section>

    <section class="space-y-3">
      <h2 class="text-2xl font-bold text-slate-900">Supported carriers</h2>
      <p>Compatible with major U.S. carriers including AT&amp;T, T-Mobile, Verizon Wireless, Sprint, Boost, Cricket, MetroPCS, U.S. Cellular, and others. Carriers are not liable for delayed or undelivered messages.</p>
    </section>

    <section class="space-y-3">
      <h2 class="text-2xl font-bold text-slate-900">AI / automated content disclosure</h2>
      <p><?= e(AI_DISCLOSURE_TEXT) ?></p>
    </section>

    <section class="space-y-3">
      <h2 class="text-2xl font-bold text-slate-900">Privacy</h2>
      <p>Your mobile information will not be shared with third parties or affiliates for marketing or promotional purposes. Information may be shared with sub-contractors and service providers (such as our SMS gateway and lead-routing platforms) only as needed to operate the Program. See our <a href="/privacy-policy" class="text-brand-700 underline">Privacy Policy</a> for full details.</p>
    </section>

    <section class="space-y-3">
      <h2 class="text-2xl font-bold text-slate-900">California residents</h2>
      <p>See our <a href="/california-privacy" class="text-brand-700 underline">California Privacy Notice</a> for information about your rights under the CCPA and CPRA.</p>
    </section>

    <section class="space-y-3">
      <h2 class="text-2xl font-bold text-slate-900">Changes</h2>
      <p>We may update these SMS Terms from time to time. Material changes will be posted to this page with a revised "Last updated" date.</p>
    </section>

    <section class="space-y-3">
      <h2 class="text-2xl font-bold text-slate-900">Contact</h2>
      <p class="leading-7">
        <strong><?= e(OPERATING_ENTITY) ?></strong><br>
        <?= e(OPERATING_ADDR_ONE_LINE) ?><br>
        <a href="mailto:<?= e(BUSINESS_EMAIL) ?>" class="text-brand-700 underline"><?= e(BUSINESS_EMAIL) ?></a> · <a href="tel:<?= e(BUSINESS_PHONE_RAW) ?>" class="text-brand-700 underline"><?= e(BUSINESS_PHONE) ?></a>
      </p>
    </section>

  </div>
</article>
