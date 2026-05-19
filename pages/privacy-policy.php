<section class="bg-soft-gradient py-12">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <p class="text-sm font-semibold text-brand-700 uppercase tracking-wide">Legal</p>
    <h1 class="mt-2 text-3xl sm:text-4xl font-extrabold text-slate-900">Privacy Policy</h1>
    <p class="mt-2 text-sm text-slate-500">Last updated: <?= date('F j, Y') ?></p>
  </div>
</section>

<article class="py-12 bg-white">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 prose prose-slate max-w-none">

    <p><?= e(SITE_NAME) ?> ("we," "our," "us") is a marketing brand operated by <?= e(PARENT_COMPANY) ?>. This Privacy Policy describes how we collect, use, share, and protect your personal information when you visit <?= e(SITE_URL) ?> or interact with our services.</p>

    <h2>1. Information we collect</h2>
    <ul>
      <li><strong>Information you provide:</strong> name, email, phone number, mailing address, state of residence, estimated debt amount, credit range, monthly income, and other details submitted through forms.</li>
      <li><strong>Information collected automatically:</strong> IP address, browser type, device identifiers, referring URL, pages viewed, and similar usage data via cookies and standard logs.</li>
      <li><strong>Consent records:</strong> the exact text of any opt-in you agreed to, plus the date, time, IP address, and user agent recorded at submission.</li>
    </ul>

    <h2>2. How we use your information</h2>
    <ul>
      <li>To respond to your inquiry and present debt consolidation and loan options.</li>
      <li>To contact you by phone, email, or SMS about your inquiry (only with your express consent for SMS — see our <a href="/sms-terms">SMS Terms</a>).</li>
      <li>To share your information with our trusted lending and service partners so they can present offers.</li>
      <li>To improve our website, comply with legal obligations, and prevent fraud.</li>
    </ul>

    <h2>3. AI and automated technology</h2>
    <p><?= e(AI_DISCLOSURE_TEXT) ?> A real specialist remains responsible for binding offers, advice, and program enrollment.</p>

    <h2>4. How we share information</h2>
    <p>We may share your information with: (a) lending partners and debt-relief service providers who present offers, (b) service providers that operate our website, hosting, analytics, email, and SMS infrastructure, and (c) regulators or law enforcement when required by law. We do not sell your information to third-party advertisers.</p>

    <h2>5. Cookies</h2>
    <p>We use essential cookies to operate the site and analytics cookies (such as Google Analytics, if enabled) to understand how visitors use our pages. You can disable cookies in your browser settings.</p>

    <h2>6. Data security</h2>
    <p>We transmit all form submissions over 256-bit TLS and store data on infrastructure protected by industry-standard administrative, technical, and physical safeguards. No transmission over the internet is 100% secure; we cannot guarantee absolute security.</p>

    <h2>7. Data retention</h2>
    <p>We retain lead information and consent records for as long as needed to provide our services, comply with legal obligations (including 10DLC and TCPA recordkeeping), and resolve disputes.</p>

    <h2>8. Your rights</h2>
    <p>You may request access, correction, or deletion of your personal information by emailing <a href="mailto:<?= e(BUSINESS_EMAIL) ?>"><?= e(BUSINESS_EMAIL) ?></a>. California residents have additional rights described in our <a href="/california-privacy">California Privacy Notice</a>.</p>

    <h2>9. Children's privacy</h2>
    <p>Our services are intended for adults 18 or older. We do not knowingly collect personal information from children under 18.</p>

    <h2>10. Changes to this policy</h2>
    <p>We may update this Privacy Policy from time to time. Changes are effective when posted on this page.</p>

    <h2>11. Contact us</h2>
    <p><?= e(PARENT_COMPANY) ?><br><?= e(BUSINESS_ADDRESS) ?><br><a href="mailto:<?= e(BUSINESS_EMAIL) ?>"><?= e(BUSINESS_EMAIL) ?></a> · <a href="tel:<?= e(BUSINESS_PHONE_RAW) ?>"><?= e(BUSINESS_PHONE) ?></a></p>

  </div>
</article>
