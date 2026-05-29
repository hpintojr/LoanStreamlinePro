<?php
component('hero', [
  'eyebrow'  => 'Personal loans',
  'headline' => 'Personal loans built<br>around your budget.',
  'sub'      => 'Borrow $1,000 to $50,000 for almost any purpose — consolidating high-interest balances, home improvement, medical expenses, or major purchases.',
  'bullets'  => [
    'Loan amounts from $1,000 – $50,000',
    'Fixed APRs and fixed monthly payments',
    'Soft credit check to pre-qualify',
  ],
]);
?>

<!-- What is a personal loan? -->
<section class="py-16 bg-white">
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-[1fr,1.4fr] gap-10 items-center">
      <div>
        <p class="text-sm font-semibold text-brand-700 uppercase tracking-wide">The basics</p>
        <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900 leading-tight">What is a personal loan?</h2>
      </div>
      <div class="rounded-2xl bg-soft-gradient border border-slate-100 p-7 shadow-soft">
        <p class="text-slate-700 leading-relaxed">A personal loan is a <strong class="text-slate-900">fixed-rate, fixed-term</strong> installment loan you can use for almost any legal purpose. Unlike a credit card, your APR doesn't change with the market, your monthly payment stays the same, and you have a clear payoff date.</p>
      </div>
    </div>
  </div>
</section>

<!-- Common uses -->
<section class="py-16 bg-soft-gradient">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mb-12">
      <p class="text-sm font-semibold text-brand-700 uppercase tracking-wide">Use cases</p>
      <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900">Common uses for a personal loan.</h2>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php
      $uses = [
        ['t'=>'Consolidation loans','d'=>'Pay off high-interest credit cards with a single lower-rate loan.','icon'=>'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z'],
        ['t'=>'Medical & dental','d'=>'Finance procedures or expenses not covered by insurance.','icon'=>'M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z'],
        ['t'=>'Home improvement','d'=>'Kitchen upgrades, repairs, or energy-efficiency projects.','icon'=>'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
        ['t'=>'Major life events','d'=>'Weddings, moving expenses, or unexpected emergencies.','icon'=>'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'],
      ];
      foreach ($uses as $u): ?>
        <div class="group rounded-2xl bg-white p-6 border border-slate-100 shadow-soft hover:-translate-y-0.5 transition">
          <div class="w-12 h-12 rounded-xl bg-brand-50 text-brand-700 flex items-center justify-center mb-4 group-hover:bg-brand-gradient group-hover:text-white transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= e($u['icon']) ?>"/></svg>
          </div>
          <h3 class="font-bold text-slate-900"><?= e($u['t']) ?></h3>
          <p class="mt-2 text-sm text-slate-600 leading-6"><?= e($u['d']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- What you'll need + Rates callout -->
<section class="py-16 bg-white">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-6">

      <div class="rounded-3xl bg-soft-gradient border border-slate-100 p-8 shadow-soft">
        <p class="text-xs font-semibold uppercase tracking-widest text-brand-700">Before you apply</p>
        <h2 class="mt-2 text-2xl font-bold text-slate-900">What you'll need.</h2>
        <ul class="mt-5 space-y-3">
          <?php foreach ([
            'Government-issued ID and date of birth',
            'Social Security number (for credit verification)',
            'Proof of income (recent pay stubs, tax return, or bank statements)',
            'An active bank account for funding and payments',
          ] as $item): ?>
            <li class="flex gap-3 text-slate-700">
              <span class="flex-shrink-0 w-6 h-6 rounded-full bg-brand-100 text-brand-700 flex items-center justify-center mt-0.5">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
              </span>
              <span><?= e($item) ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="rounded-3xl bg-brand-gradient text-white p-8 shadow-soft relative overflow-hidden">
        <div class="absolute -right-10 -bottom-10 w-48 h-48 rounded-full bg-white/10 blur-2xl"></div>
        <div class="relative">
          <p class="text-xs font-semibold uppercase tracking-widest text-brand-50/90">Read this first</p>
          <h2 class="mt-2 text-2xl font-bold">Rates, fees, and what to watch for.</h2>
          <p class="mt-4 text-brand-50/95 leading-relaxed">APRs depend on your credit profile, loan amount, and term. Some loans include an <strong>origination fee</strong> that's deducted from the loan proceeds. We show you the full APR (which includes most fees) so you can see the real cost before you sign.</p>
          <p class="mt-4 text-sm text-white font-semibold bg-white/15 backdrop-blur rounded-xl px-4 py-3">Always read the loan agreement carefully before signing.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<?php
component('benefits');
component('trust-badges');
component('testimonials');
component('faq');
component('cta-banner', ['title' => 'Pre-qualify for your personal loan', 'sub' => 'See your rate in 60 seconds with no impact to your credit score.']);
