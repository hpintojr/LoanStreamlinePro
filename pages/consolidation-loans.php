<?php
component('hero', [
  'eyebrow'  => 'Consolidation loans',
  'headline' => 'Consolidate credit card balances<br>into one simple payment.',
  'sub'      => 'Replace multiple high-interest credit card balances with a single, predictable monthly payment — often at a lower combined interest rate.',
  'bullets'  => [
    'Best for $5,000 – $100,000 of credit card balances',
    'Fixed terms from 24 to 60 months',
    'See your rate in 60 seconds with no credit impact',
  ],
]);
?>

<!-- What is a consolidation loan? -->
<section class="py-16 bg-white">
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-[1fr,1.4fr] gap-10 items-center">
      <div>
        <p class="text-sm font-semibold text-brand-700 uppercase tracking-wide">The basics</p>
        <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900 leading-tight">What is a consolidation loan?</h2>
      </div>
      <div class="rounded-2xl bg-soft-gradient border border-slate-100 p-7 shadow-soft">
        <p class="text-slate-700 leading-relaxed">A consolidation loan combines multiple unsecured balances — typically high-interest credit card balances — into a single new loan. Instead of juggling several minimum payments at varying APRs, you make <strong class="text-slate-900">one fixed monthly payment</strong>, often at a lower combined rate.</p>
      </div>
    </div>
  </div>
</section>

<!-- How it can help -->
<section class="py-16 bg-soft-gradient">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mb-12">
      <p class="text-sm font-semibold text-brand-700 uppercase tracking-wide">Benefits</p>
      <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900">How it can help you.</h2>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
      <?php
      $benefits = [
        ['t'=>'Simpler payments', 'd'=>'One due date, one payment, one balance to track. No more juggling cards.', 'icon'=>'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
        ['t'=>'Potential interest savings', 'd'=>'Replacing 20–29% credit card APRs with a lower fixed-rate consolidation loan can mean meaningful interest savings over the life of the loan.', 'icon'=>'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z'],
        ['t'=>'A clear payoff date', 'd'=>'Unlike revolving credit card minimums, an installment loan has a defined term — so you know exactly when you\'ll be paid off.', 'icon'=>'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
      ];
      foreach ($benefits as $b): ?>
        <div class="rounded-2xl bg-white p-7 shadow-soft border border-slate-100 hover:-translate-y-0.5 transition">
          <div class="w-12 h-12 rounded-xl bg-brand-50 text-brand-700 flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= e($b['icon']) ?>"/></svg>
          </div>
          <h3 class="font-bold text-slate-900 text-lg"><?= e($b['t']) ?></h3>
          <p class="mt-2 text-sm text-slate-600 leading-6"><?= e($b['d']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Is it right for you? -->
<section class="py-16 bg-white">
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid md:grid-cols-2 gap-6">

      <div class="rounded-3xl bg-brand-gradient text-white p-8 shadow-soft relative overflow-hidden">
        <div class="absolute -right-8 -top-8 w-40 h-40 rounded-full bg-white/10 blur-2xl"></div>
        <div class="relative">
          <p class="text-xs font-semibold uppercase tracking-widest text-brand-50/90">Best fit when</p>
          <h2 class="mt-2 text-2xl font-bold">A consolidation loan works for you if:</h2>
          <ul class="mt-5 space-y-3">
            <?php foreach ([
              'You have several credit card balances or other unsecured balances.',
              'You can qualify for a rate lower than what you\'re paying today.',
              'You\'re committed to not running up new balances on the cards you pay off.',
            ] as $item): ?>
              <li class="flex gap-3">
                <span class="flex-shrink-0 w-6 h-6 rounded-full bg-white/20 flex items-center justify-center mt-0.5">
                  <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                </span>
                <span class="text-brand-50/95"><?= e($item) ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>

      <div class="rounded-3xl bg-soft-gradient border border-slate-100 p-8">
        <p class="text-xs font-semibold uppercase tracking-widest text-slate-500">May not be the right fit</p>
        <h2 class="mt-2 text-2xl font-bold text-slate-900">It might not be ideal if:</h2>
        <ul class="mt-5 space-y-3 text-slate-700">
          <?php foreach ([
            'Your total balance is very small.',
            'You only have secured loans (like a mortgage or auto loan).',
            'You\'re already enrolled in a structured payment program.',
          ] as $item): ?>
            <li class="flex gap-3">
              <span class="flex-shrink-0 w-6 h-6 rounded-full bg-slate-200 flex items-center justify-center mt-0.5">
                <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M20 12H4"/></svg>
              </span>
              <span><?= e($item) ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
        <p class="mt-5 text-sm text-slate-500">A specialist can help you think through the trade-offs — no obligation.</p>
      </div>

    </div>
  </div>
</section>

<!-- How we review -->
<section class="py-16 bg-soft-gradient">
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <p class="text-sm font-semibold text-brand-700 uppercase tracking-wide">Our process</p>
    <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900">How we review your application.</h2>
    <p class="mt-4 text-slate-600 max-w-3xl mx-auto">When you submit your information, we review it against our lending criteria and show you a clear offer that fits your profile. You'll see your rate, term, monthly payment, and fees up front. There is no obligation to accept, and pre-qualification uses only a soft credit inquiry.</p>
    <div class="mt-8 flex flex-wrap justify-center gap-3">
      <a href="/#apply" class="inline-flex items-center px-6 py-3 rounded-full bg-brand-gradient text-white font-bold shadow-soft">Get my rate</a>
      <a href="tel:<?= e(BUSINESS_PHONE_RAW) ?>" class="inline-flex items-center px-6 py-3 rounded-full border border-slate-200 text-slate-800 font-semibold hover:border-brand-300 hover:text-brand-700">Call <?= e(BUSINESS_PHONE) ?></a>
    </div>
  </div>
</section>

<?php
component('loan-options');
component('trust-badges');
component('testimonials');
component('faq');
component('cta-banner', ['title' => 'See your consolidation options', 'sub' => 'Check your rate in 60 seconds — no impact to your credit score.']);
