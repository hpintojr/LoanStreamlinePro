</main>

<?php include __DIR__ . '/sticky-cta.php'; ?>

<footer class="bg-slate-900 text-slate-300 mt-16 pb-28 lg:pb-12">
  <!-- Primary footer: brand, nav, legal, contact -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 grid gap-10 md:grid-cols-4">

    <div class="md:col-span-1">
      <a href="/" class="inline-block mb-4" aria-label="Loan Streamline Pro — home">
        <!-- Full horizontal lockup on all breakpoints (light variant for dark footer) -->
        <img
          src="/assets/img/logo-light.svg"
          alt="Loan Streamline Pro"
          width="240" height="45"
          class="block h-10 sm:h-11 w-auto">
      </a>
      <p class="text-sm leading-6 text-slate-400">Straightforward personal loans with fixed rates and clear terms, made directly by a licensed lender serving <?= e(LICENSED_STATES) ?>.</p>
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

  <!-- ===== Lender disclosure (required) ===== -->
  <div class="border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 text-xs text-slate-400 leading-relaxed space-y-4">

      <p>
        <strong class="text-slate-200">Loan Streamline Pro is a brand of Advantage First Financial LLC
        (NMLS #<?= e(NMLS_ID) ?>), a licensed lender.</strong> Advantage First Financial originates and
        funds loans directly for residents of <?= e(LICENSED_STATES) ?>, in accordance with our
        <a href="/terms-and-conditions" class="text-slate-200 underline hover:text-white">Terms of Service</a>
        and <a href="/privacy-policy" class="text-slate-200 underline hover:text-white">Privacy Policy</a>.
        <strong class="text-slate-200"><?= e(MOBILE_PRIVACY_CLAUSE) ?></strong>
        Offers vary depending on your creditworthiness, your state of residence, and applicable law.
        There is no guarantee you will be approved, or that upon approval you will qualify for the
        rates, fees, or terms shown on this Site.
      </p>

      <p>
        This Site does not constitute an offer or commitment to lend, or specific offer terms or
        conditions. Providing your information on this Site does not guarantee that you will be
        approved for a loan.
      </p>

      <p>
        Pre-qualification on this Site typically uses a soft credit inquiry that does not affect your
        credit score. If you choose to proceed with a formal application, a hard credit inquiry may be
        made, which can affect your credit score. Please review your loan agreement carefully before
        you sign.
      </p>

      <p>
        In order to help the government fight identity theft, the funding of terrorism, and money
        laundering activities, Advantage First Financial LLC and its service providers may verify and
        record information that identifies you. This may include your name, address, date of birth,
        Social Security number, and other identifying details.
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
