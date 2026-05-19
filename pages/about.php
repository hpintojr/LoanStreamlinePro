<section class="bg-soft-gradient py-16 sm:py-20">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <p class="text-sm font-semibold text-brand-700 uppercase tracking-wide">About us</p>
    <h1 class="mt-2 text-4xl sm:text-5xl font-extrabold text-slate-900 tracking-tight leading-[1.1]">A simpler path to financial freedom — built for real life.</h1>
    <p class="mt-5 text-lg text-slate-600 max-w-3xl">Loan Streamline Pro helps consumers compare consolidation loan programs and personal loan options from our trusted Lending Partners, with full transparency on rates, terms, and fees.</p>
  </div>
</section>

<!-- Our mission — featured callout -->
<section class="py-16 bg-white">
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="rounded-3xl bg-brand-gradient text-white p-8 sm:p-12 shadow-soft relative overflow-hidden">
      <div class="absolute -right-16 -top-16 w-64 h-64 rounded-full bg-white/10 blur-2xl"></div>
      <div class="relative max-w-3xl">
        <p class="text-xs font-semibold uppercase tracking-widest text-brand-50/90">Our mission</p>
        <p class="mt-4 text-2xl sm:text-3xl font-bold leading-tight">High-interest credit card balances is one of the most stressful financial burdens facing households today.</p>
        <p class="mt-4 text-brand-50/95 leading-relaxed">Our mission is to make it easier to find a clear, affordable path forward — whether that's a consolidation loan, a structured payoff program, or a conversation with a real specialist who can answer your questions in plain English.</p>
      </div>
    </div>
  </div>
</section>

<!-- What we are / what we are not -->
<section class="py-16 bg-soft-gradient">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
      <p class="text-sm font-semibold text-brand-700 uppercase tracking-wide">Transparency</p>
      <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900">What we are — and what we aren't.</h2>
    </div>
    <div class="grid md:grid-cols-2 gap-6">

      <div class="rounded-2xl bg-white p-7 shadow-soft border border-brand-100">
        <div class="flex items-center gap-3 mb-4">
          <span class="inline-flex w-11 h-11 rounded-xl bg-brand-100 text-brand-700 items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
          </span>
          <h3 class="text-lg font-bold text-slate-900">What we are</h3>
        </div>
        <p class="text-slate-600 leading-relaxed">A consumer-facing marketing platform that connects you with vetted lending partners and licensed specialists. We present options in plain English so you can make an informed decision.</p>
      </div>

      <div class="rounded-2xl bg-white p-7 shadow-soft border border-slate-200">
        <div class="flex items-center gap-3 mb-4">
          <span class="inline-flex w-11 h-11 rounded-xl bg-slate-100 text-slate-600 items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
          </span>
          <h3 class="text-lg font-bold text-slate-900">What we are not</h3>
        </div>
        <p class="text-slate-600 leading-relaxed">We are <strong class="text-slate-800">not a direct lender</strong>. Loan approvals, interest rates, and final terms are determined by the lender that funds your loan — never by us.</p>
      </div>

    </div>
  </div>
</section>

<!-- Why customers choose us -->
<section class="py-16 sm:py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mb-12">
      <p class="text-sm font-semibold text-brand-700 uppercase tracking-wide">Why us</p>
      <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900">Why customers choose us.</h2>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
      <?php
      $reasons = [
        ['t'=>'Transparency first', 'd'=>'Every offer comes with APR, term, fees, and total cost — no surprises hidden in fine print.', 'icon'=>'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z'],
        ['t'=>'No-pressure process', 'd'=>'Checking your rate uses a soft credit pull and won\'t affect your credit score. You are never obligated to move forward.', 'icon'=>'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
        ['t'=>'Privacy first', 'd'=>'Your data is yours. We follow applicable state privacy laws and give you control over how your information is used and shared.', 'icon'=>'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z'],
        ['t'=>'Real humans, real help', 'd'=>'Some communications may use AI-assisted technology, but a real specialist is always responsible for binding offers and program enrollment.', 'icon'=>'M17 20h5v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75M9 20H4v-2a4 4 0 013-3.87m6-5a4 4 0 11-8 0 4 4 0 018 0z'],
      ];
      foreach ($reasons as $r): ?>
        <div class="group rounded-2xl border border-slate-100 bg-soft-gradient p-6 hover:shadow-soft hover:-translate-y-0.5 transition">
          <div class="w-11 h-11 rounded-xl bg-white text-brand-700 flex items-center justify-center shadow-soft mb-4 group-hover:bg-brand-gradient group-hover:text-white transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= e($r['icon']) ?>"/></svg>
          </div>
          <h3 class="font-bold text-slate-900"><?= e($r['t']) ?></h3>
          <p class="mt-2 text-sm text-slate-600 leading-6"><?= e($r['d']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Contact -->
<section class="py-16 bg-soft-gradient">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="rounded-3xl bg-white p-8 sm:p-10 shadow-soft border border-slate-100">
      <div class="grid sm:grid-cols-[1fr,auto] gap-6 items-center">
        <div>
          <p class="text-sm font-semibold text-brand-700 uppercase tracking-wide">Contact</p>
          <h2 class="mt-2 text-2xl sm:text-3xl font-bold text-slate-900">Talk to a US-based specialist.</h2>
          <p class="mt-3 text-slate-600"><?= e(BUSINESS_HOURS) ?></p>
          <div class="mt-5 flex flex-wrap gap-3 text-sm">
            <a href="tel:<?= e(BUSINESS_PHONE_RAW) ?>" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-50 text-brand-700 font-semibold hover:bg-brand-100">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h2.28a1 1 0 01.95.68l1.5 4.5a1 1 0 01-.5 1.21l-1.84.92a11 11 0 005.29 5.29l.92-1.84a1 1 0 011.21-.5l4.5 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2A16 16 0 013 5z"/></svg>
              <?= e(BUSINESS_PHONE) ?>
            </a>
            <a href="mailto:<?= e(BUSINESS_EMAIL) ?>" class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-slate-200 text-slate-700 font-semibold hover:border-brand-300 hover:text-brand-700">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
              <?= e(BUSINESS_EMAIL) ?>
            </a>
          </div>
        </div>
        <a href="/#apply" class="inline-flex items-center justify-center px-6 py-3 rounded-full bg-brand-gradient text-white font-bold shadow-soft">Get my rate</a>
      </div>
    </div>
  </div>
</section>

<?php
component('trust-badges');
component('cta-banner', ['title' => 'Ready to simplify your balances?', 'sub' => 'Get matched with options in 60 seconds — no impact to your credit score.']);
                                                                                                     