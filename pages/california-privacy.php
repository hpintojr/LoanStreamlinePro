<section class="bg-soft-gradient py-12">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <p class="text-sm font-semibold text-brand-700 uppercase tracking-wide">Legal · CCPA / CPRA</p>
    <h1 class="mt-2 text-3xl sm:text-4xl font-extrabold text-slate-900">California Privacy Notice</h1>
    <p class="mt-2 text-sm text-slate-500">Last updated: <?= date('F j, Y') ?></p>
  </div>
</section>

<article class="py-12 bg-white">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-slate-700 leading-relaxed space-y-8">

    <section class="space-y-3">
      <p>This California Privacy Notice supplements our <a href="/privacy-policy" class="text-brand-700 underline">Privacy Policy</a> and applies to California residents under the California Consumer Privacy Act (CCPA), as amended by the California Privacy Rights Act (CPRA).</p>
    </section>

    <section class="space-y-3">
      <h2 class="text-2xl font-bold text-slate-900">Categories of personal information we collect</h2>
      <ul class="list-disc pl-6 space-y-2">
        <li><strong>Identifiers:</strong> name, email, phone number, IP address.</li>
        <li><strong>Customer records:</strong> mailing address, employment information.</li>
        <li><strong>Commercial information:</strong> balance amount, credit range, loan purpose.</li>
        <li><strong>Internet activity:</strong> pages visited, referring URLs, device data.</li>
        <li><strong>Geolocation:</strong> approximate location derived from IP address.</li>
        <li><strong>Inferences:</strong> profile data used to match you with appropriate loan or program options.</li>
      </ul>
    </section>

    <section class="space-y-3">
      <h2 class="text-2xl font-bold text-slate-900">How we use this information</h2>
      <p>We use these categories to respond to your inquiries, present loan and credit-relief options from our partners, fulfill our SMS Program, maintain security, prevent fraud, and meet legal and regulatory requirements (including 10DLC and TCPA recordkeeping).</p>
    </section>

    <section class="space-y-3">
      <h2 class="text-2xl font-bold text-slate-900">Categories of personal information we share</h2>
      <p>We share identifiers, customer records, commercial information, and inferences with our lending and credit-relief partners and our service providers (hosting, analytics, email/SMS, lead routing). We do not "sell" personal information in the traditional sense, but sharing your information with lending partners so they can present offers may be considered "sharing" under the CPRA.</p>
      <p class="font-semibold text-slate-900"><?= e(MOBILE_PRIVACY_CLAUSE) ?></p>
    </section>

    <section class="space-y-3">
      <h2 class="text-2xl font-bold text-slate-900">Your California rights</h2>
      <ul class="list-disc pl-6 space-y-2">
        <li><strong>Right to know</strong> what personal information we collect, use, and share.</li>
        <li><strong>Right to delete</strong> personal information we hold about you, subject to certain exceptions.</li>
        <li><strong>Right to correct</strong> inaccurate personal information.</li>
        <li><strong>Right to opt out of "sale" or "sharing"</strong> of your personal information (see below).</li>
        <li><strong>Right to limit use of sensitive personal information</strong>, if any is collected.</li>
        <li><strong>Right to non-discrimination</strong> for exercising any of these rights.</li>
      </ul>
    </section>

    <section class="space-y-3" id="do-not-sell">
      <h2 class="text-2xl font-bold text-slate-900">Do Not Sell or Share My Personal Information</h2>
      <p>To exercise your right to opt out of the sale or sharing of your personal information, email <a href="mailto:<?= e(BUSINESS_EMAIL) ?>?subject=Do%20Not%20Sell%20or%20Share%20-%20California" class="text-brand-700 underline"><?= e(BUSINESS_EMAIL) ?></a> with the subject line "Do Not Sell or Share — California" and include the email address and phone number you've used with us. We honor verified Global Privacy Control (GPC) browser signals as opt-out requests.</p>
      <p class="bg-slate-50 border-l-4 border-brand-600 p-4 font-semibold text-slate-900"><?= e(MOBILE_PRIVACY_CLAUSE) ?></p>
    </section>

    <section class="space-y-3">
      <h2 class="text-2xl font-bold text-slate-900">How to submit a privacy request</h2>
      <p>Email <a href="mailto:<?= e(BUSINESS_EMAIL) ?>" class="text-brand-700 underline"><?= e(BUSINESS_EMAIL) ?></a> or call <a href="tel:<?= e(BUSINESS_PHONE_RAW) ?>" class="text-brand-700 underline"><?= e(BUSINESS_PHONE) ?></a>. We will verify your identity before processing your request and respond within the time required by law (generally 45 days).</p>
    </section>

    <section class="space-y-3">
      <h2 class="text-2xl font-bold text-slate-900">Authorized agents</h2>
      <p>You may designate an authorized agent to submit a request on your behalf. The agent must provide written authorization and we may require you to verify your identity directly.</p>
    </section>

    <section class="space-y-3">
      <h2 class="text-2xl font-bold text-slate-900">AI and automated decision-making</h2>
      <p><?= e(AI_DISCLOSURE_TEXT) ?> No automated system makes binding decisions about your loan or program eligibility; a real specialist or lender is always responsible for final outcomes.</p>
    </section>

    <section class="space-y-3">
      <h2 class="text-2xl font-bold text-slate-900">Retention</h2>
      <p>We retain personal information only as long as needed to provide services, comply with legal and regulatory obligations (including consent recordkeeping for SMS and telephone outreach), and resolve disputes.</p>
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
