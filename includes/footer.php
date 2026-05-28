</main>

<?php include __DIR__ . '/sticky-cta.php'; ?>

<footer class="bg-slate-900 text-slate-300 mt-16 pb-28 lg:pb-12">
  <!-- Primary footer: brand, nav, legal, contact -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 grid gap-10 md:grid-cols-4">

    <div class="md:col-span-1">
      <a href="/" class="inline-block mb-4" aria-label="Loan Streamline Pro — home">
        <!-- Mobile: mark only -->
        <img
          src="/assets/img/logo-mark.png"
          onerror="this.onerror=null;this.src='/assets/img/logo-mark.svg';"
          alt="Loan Streamline Pro"
          width="48" height="48"
          class="block sm:hidden w-12 h-12">
        <!-- Tablet + desktop: full horizontal lockup (light variant for dark footer) -->
        <img
          src="/assets/img/logo-light.png"
          onerror="this.onerror=null;this.src='/assets/img/logo-light.svg';"
          alt="Loan Streamline Pro — Streamline today. Close tomorrow."
          width="240" height="50"
          class="hidden sm:block h-11 w-auto">
      </a>
      <p class="text-sm leading-6 text-slate-400">A simpler path to comparing personal loan and consolidation loan options from trusted lending partners.</p>
    </div>

    <div>
      <h3 class="text-white font-semibold mb-3 text-sm uppercase tracking-wide">Explore</h3>
      <ul class="space-y-2 text-sm">
        <li><a href="/" class="hover:text-white">Home</a></li>
        <li><a href="/how-it-works" class="hover:text-white">How It Works</a></li>
        <li><a href="/consolidation-loans" class="hover:text-white">Consolidation Loans</a></li>
        <li><a href="/personal-loans" class="hover:text-white">Personal Loans</a></li>
        <li><a href="/about" class="hover:text-white">About</a></li>
        <li><a href="/contact" class="hover:text-white">Contact</a></li>
      </ul>
    </div>

    <div>
      <h3 class="text-white font-semibold mb-3 text-sm uppercase tracking-wide">Legal &amp; Compliance</h3>
      <ul class="space-y-2 text-sm">
        <li><a href="/privacy-policy" class="hover:text-white">Privacy Policy</a></li>
        <li><a href="/terms-and-conditions" class="hover:text-white">Terms of Service</a></li>
        <li><a href="/sms-terms" class="hover:text-white">SMS Terms</a></li>
        <li><a href="/california-privacy" class="hover:text-white">California Privacy Notice</a></li>
        <li><a href="/california-privacy#do-not-sell" class="hover:text-white">Do Not Sell or Share My Info</a></li>
      </ul>
    </div>

    <div>
      <h3 class="text-white font-semibold mb-3 text-sm uppercase tracking-wide">Contact</h3>
      <ul class="space-y-2 text-sm">
        <li><a href="tel:<?= e(BUSINESS_PHONE_RAW) ?>" class="hover:text-white"><?= e(BUSINESS_PHONE) ?></a></li>
        <li><a href="mailto:<?= e(BUSINESS_EMAIL) ?>" class="hover:text-white"><?= e(BUSINESS_EMAIL) ?></a></li>
        <li class="text-slate-400 leading-relaxed"><?= e(OPERATING_ADDR_ONE_LINE) ?></li>
        <li class="text-slate-400"><?= e(BUSINESS_HOURS) ?></li>
      </ul>
    </div>
  </div>

  <!-- ===== Full lender-marketplace disclosure (required) ===== -->
  <div class="border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 text-xs text-slate-400 leading-relaxed space-y-4">

      <p>
        <strong class="text-slate-200">Loan Streamline Pro is not a lender</strong> or party to any
        loan or other transaction and does not issue credit cards, loans, financial products, or
        make credit decisions. Loan Streamline Pro may pass personal information to our Lending
        Partners and approved third parties in accordance with our <a href="/terms-and-conditions" class="text-slate-200 underline hover:text-white">Terms of Service</a>
        and <a href="/privacy-policy" class="text-slate-200 underline hover:text-white">Privacy Policy</a>.
        You can learn more about how our Lending Partners assess your eligibility for a financial
        product in Section 1 of the Terms of Service. Offers will vary depending on the Lending
        Partner, their criteria, your creditworthiness and your state's laws. There is no
        guarantee you will be presented with any offers, or that upon presentation of any offers
        you will qualify for the rates, fees, or terms shown on this Site.
      </p>

      <p>
        This Site does not constitute an offer, or acceptance into any particular financial
        product, or specific offer terms or conditions. Providing your information on this Site
        does not guarantee that you will be approved for an offer.
      </p>

      <p>
        If you receive an offer from one of Loan Streamline Pro's Lending Partners, it is
        imperative that you review the Lending Partner's terms and conditions before proceeding
        with an application for a financial product and please note, that at the point of
        application with a Lending Partner you may be subject to a hard inquiry on your credit
        file, which may affect your credit score.
      </p>

      <p>
        In order to help the government fight identity theft, the funding of terrorism and money
        laundering activities, Loan Streamline Pro, our affiliated third parties, and our Lending
        Partners may verify and record information that identifies you. Loan Streamline Pro is
        not an agent, representative or broker of any Lending Partner. We do not endorse or
        recommend any Lending Partners. We do not charge you for any service or product.
      </p>

      <p class="pt-2">
        <strong class="text-slate-200 uppercase tracking-wide text-[11px]">Advertiser Disclosure</strong><br>
        The offers that appear on this Site are from Lending Partners from which Loan Streamline
        Pro receives compensation for its services, tools, and facilities. Loan Streamline Pro
        does not prioritize offers for financial products in exchange for compensation from
        Lending Partners and does not recommend or endorse any Lending Partners, their offers, or
        their financial products. Loan Streamline Pro shows a wide variety of offers for
        different financial products. Loan Streamline Pro does not include all Lending Partners
        or all types of offers available in the marketplace. The underwriting criteria and
        decisioning necessary for offer presentment and approval are determined by the Lending
        Partners (not Loan Streamline Pro), and it is important that you review each Lending
        Partner's terms and conditions before proceeding with an application for a financial
        product. You must determine which product works for you and your personal financial
        situation. All rates, fees, and terms are presented without guarantee and are subject to
        change pursuant to each lender's discretion.
      </p>

      <p>
        <strong class="text-slate-200">AI Disclosure:</strong> <?= e(AI_DISCLOSURE_TEXT) ?>
      </p>

    </div>
  </div>

  <!-- ===== Operating entity + NMLS reference + copyright ===== -->
  <div class="border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-xs text-slate-400 space-y-2">
      <p>LoanStreamlinePro.com is operated by <?= e(OPERATING_ENTITY) ?>, <?= e(OPERATING_ADDR_ONE_LINE) ?>.</p>
      <p>
        <a href="<?= e(NMLS_URL) ?>" target="_blank" rel="noopener noreferrer" class="text-slate-200 underline hover:text-white">
          <?= e(NMLS_ENTITY) ?> (NMLS ID <?= e(NMLS_ID) ?>)
        </a>
      </p>
      <p>&copy; <?= date('Y') ?> <?= e(OPERATING_ENTITY) ?>. All rights reserved.</p>
    </div>
  </div>

</footer>

<script src="https://widgets.leadconnectorhq.com/loader.js" data-resources-url="https://widgets.leadconnectorhq.com/chat-widget/loader.js" data-widget-id="6a18b0041ce15bb9e987a7a3" data-source="WEB_USER"></script>
<script src="/assets/js/main.js" defer></script>
</body>
</html>
