<header class="sticky top-0 z-40 bg-white/90 backdrop-blur border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">

      <a href="/" class="flex items-center gap-2.5 group" aria-label="Loan Streamline Pro — home">
        <img src="/assets/img/logo-mark.svg" alt="" class="w-10 h-10 group-hover:scale-105 transition" width="40" height="40">
        <span class="hidden sm:inline-flex flex-col leading-tight">
          <span class="font-extrabold text-slate-900 tracking-tight text-base">
            Loan <span class="text-brand-600">Streamline</span> Pro
          </span>
          <span class="text-[10px] font-semibold uppercase tracking-[0.18em] text-brand-700">Streamline today. Close tomorrow.</span>
        </span>
      </a>

      <nav class="hidden lg:flex items-center gap-7 text-sm text-slate-600">
        <a href="/how-it-works"       class="hover:text-brand-700 <?= nav_active('/how-it-works') ?>">How It Works</a>
        <a href="/consolidation-loans" class="hover:text-brand-700 <?= nav_active('/consolidation-loans') ?>">Consolidation Loans</a>
        <a href="/personal-loans"     class="hover:text-brand-700 <?= nav_active('/personal-loans') ?>">Personal Loans</a>
        <a href="/about"              class="hover:text-brand-700 <?= nav_active('/about') ?>">About</a>
        <a href="/contact"            class="hover:text-brand-700 <?= nav_active('/contact') ?>">Contact</a>
      </nav>

      <div class="flex items-center gap-2">
        <a href="tel:<?= e(BUSINESS_PHONE_RAW) ?>" class="hidden md:inline-flex items-center gap-2 text-sm font-semibold text-brand-700 hover:text-brand-800">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h2.28a1 1 0 01.95.68l1.5 4.5a1 1 0 01-.5 1.21l-1.84.92a11 11 0 005.29 5.29l.92-1.84a1 1 0 011.21-.5l4.5 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2A16 16 0 013 5z"/></svg>
          <?= e(BUSINESS_PHONE) ?>
        </a>
        <a href="/#apply" class="inline-flex items-center justify-center px-4 py-2 rounded-full bg-brand-gradient text-white text-sm font-semibold shadow-soft hover:opacity-95 transition">
          Get My Rate
        </a>
        <button id="mobileMenuBtn" class="lg:hidden p-2 text-slate-700" aria-label="Open menu" aria-controls="mobileMenu" aria-expanded="false">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
      </div>
    </div>

    <!-- Mobile menu -->
    <div id="mobileMenu" class="hidden lg:hidden pb-4">
      <nav class="flex flex-col gap-1 text-base">
        <a href="/how-it-works"        class="px-3 py-2 rounded-lg hover:bg-brand-50">How It Works</a>
        <a href="/consolidation-loans" class="px-3 py-2 rounded-lg hover:bg-brand-50">Consolidation Loans</a>
        <a href="/personal-loans"      class="px-3 py-2 rounded-lg hover:bg-brand-50">Personal Loans</a>
        <a href="/about"               class="px-3 py-2 rounded-lg hover:bg-brand-50">About</a>
        <a href="/contact"             class="px-3 py-2 rounded-lg hover:bg-brand-50">Contact</a>
        <a href="tel:<?= e(BUSINESS_PHONE_RAW) ?>" class="px-3 py-2 rounded-lg font-semibold text-brand-700">Call <?= e(BUSINESS_PHONE) ?></a>
      </nav>
    </div>

  </div>
</header>
