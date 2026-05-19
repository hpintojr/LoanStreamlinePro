</main>

<?php include __DIR__ . '/sticky-cta.php'; ?>

<footer class="bg-slate-900 text-slate-300 mt-16 pb-28 lg:pb-12">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 grid gap-10 md:grid-cols-4">

    <div class="md:col-span-1">
      <div class="flex items-center gap-2 mb-4">
        <span class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-brand-gradient text-white font-bold">LS</span>
        <span class="font-bold text-white">Loan Streamline Pro</span>
      </div>
      <p class="text-sm leading-6 text-slate-400">A marketing brand of <?= e(PARENT_COMPANY) ?>, helping consumers consolidate debt and explore personal loan options.</p>
    </div>

    <div>
      <h3 class="text-white font-semibold mb-3 text-sm uppercase tracking-wide">Explore</h3>
      <ul class="space-y-2 text-sm">
        <li><a href="/" class="hover:text-white">Home</a></li>
        <li><a href="/how-it-works" class="hover:text-white">How It Works</a></li>
        <li><a href="/debt-consolidation" class="hover:text-white">Debt Consolidation</a></li>
        <li><a href="/personal-loans" class="hover:text-white">Personal Loans</a></li>
        <li><a href="/about" class="hover:text-white">About</a></li>
        <li><a href="/contact" class="hover:text-white">Contact</a></li>
      </ul>
    </div>

    <div>
      <h3 class="text-white font-semibold mb-3 text-sm uppercase tracking-wide">Legal & Compliance</h3>
      <ul class="space-y-2 text-sm">
        <li><a href="/privacy-policy" class="hover:text-white">Privacy Policy</a></li>
        <li><a href="/terms-and-conditions" class="hover:text-white">Terms &amp; Conditions</a></li>
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
        <li class="text-slate-400"><?= e(BUSINESS_ADDRESS) ?></li>
        <li class="text-slate-400"><?= e(BUSINESS_HOURS) ?></li>
      </ul>
    </div>
  </div>

  <div class="border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-xs text-slate-400 space-y-3">
      <p><strong class="text-slate-200">Important Disclaimer:</strong> <?= e(FOOTER_DISCLAIMER) ?></p>
      <p><strong class="text-slate-200">AI Disclosure:</strong> <?= e(AI_DISCLOSURE_TEXT) ?></p>
      <p>Program availability varies by state. Not all consumers will qualify. Read all loan terms carefully before accepting an offer. The use of any third-party trademarks on this site is for identification purposes only and does not imply endorsement.</p>
      <p>&copy; <?= date('Y') ?> <?= e(PARENT_COMPANY) ?>. All rights reserved.</p>
    </div>
  </div>
</footer>

<script src="/assets/js/main.js" defer></script>
</body>
</html>
