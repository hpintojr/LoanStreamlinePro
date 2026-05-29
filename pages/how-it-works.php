<section class="bg-soft-gradient py-16 sm:py-20">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <p class="text-sm font-semibold text-brand-700 uppercase tracking-wide">How it works</p>
    <h1 class="mt-2 text-4xl sm:text-5xl font-extrabold text-slate-900 tracking-tight leading-[1.1]">Three steps to a clearer financial picture.</h1>
    <p class="mt-5 text-lg text-slate-600 max-w-3xl">Our process is designed to be fast, transparent, and stress-free. Here's exactly what to expect at each step.</p>
  </div>
</section>

<?php component('how-it-works'); ?>

<!-- Detailed steps -->
<section class="py-16 bg-white">
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

    <?php
    $detailedSteps = [
      [
        'n'   => '01',
        't'   => 'Tell us about you',
        'd'   => 'Use our 60-second form to share a few details: how much you want to borrow, your goal, and your estimated credit range.',
        'tag' => 'No credit-score impact',
        'icon'=> 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
      ],
      [
        'n'   => '02',
        't'   => 'We review your application',
        'd'   => 'Our team — sometimes assisted by automated systems — reviews your details against our lending criteria and shows you a clear offer in plain English. APR, monthly payment, term length, fees, and total cost are all spelled out.',
        'tag' => 'AI-assisted, human-reviewed',
        'icon'=> 'M13 10V3L4 14h7v7l9-11h-7z',
      ],
      [
        'n'   => '03',
        't'   => 'You decide what works',
        'd'   => 'Talk to a real US-based specialist. Ask every question. There is no pressure and no obligation to move forward. If you accept your offer, we fund your loan directly — many loans fund within 1–5 business days.',
        'tag' => 'You\'re in control',
        'icon'=> 'M5 13l4 4L19 7',
      ],
    ];
    foreach ($detailedSteps as $i => $s): ?>
      <div class="rounded-3xl bg-soft-gradient border border-slate-100 shadow-soft p-7 sm:p-9 relative overflow-hidden">
        <div class="grid sm:grid-cols-[auto,1fr] gap-6 items-start">
          <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-2xl bg-brand-gradient text-white font-bold flex items-center justify-center text-lg shadow-soft"><?= e($s['n']) ?></div>
            <div class="w-12 h-12 rounded-xl bg-white text-brand-700 flex items-center justify-center shadow-sm sm:hidden">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= e($s['icon']) ?>"/></svg>
            </div>
          </div>
          <div>
            <div class="flex flex-wrap items-center gap-3 mb-3">
              <h2 class="text-2xl font-bold text-slate-900"><?= e($s['t']) ?></h2>
              <span class="inline-flex items-center gap-1 px-3 py-0.5 rounded-full bg-white text-brand-700 text-xs font-semibold shadow-sm border border-brand-100">
                <span class="w-1.5 h-1.5 rounded-full bg-brand-500"></span> <?= e($s['tag']) ?>
              </span>
            </div>
            <p class="text-slate-600 leading-relaxed"><?= e($s['d']) ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- "Free to check your rate" highlight -->
<section class="pb-16 bg-white">
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="rounded-3xl bg-brand-gradient text-white p-8 sm:p-10 shadow-soft relative overflow-hidden">
      <div class="absolute -left-16 -bottom-16 w-64 h-64 rounded-full bg-white/10 blur-2xl"></div>
      <div class="relative grid sm:grid-cols-[auto,1fr,auto] gap-6 items-center">
        <div class="w-16 h-16 rounded-2xl bg-white/15 backdrop-blur flex items-center justify-center">
          <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div>
          <p class="text-xs font-semibold uppercase tracking-widest text-brand-50/90">What it costs to check your rate</p>
          <h2 class="mt-2 text-3xl sm:text-4xl font-extrabold leading-tight">Nothing. Zero. $0.</h2>
          <p class="mt-2 text-brand-50/95 max-w-2xl">Pre-qualification is free, has no commitment, and uses only a soft credit pull. You'll only see a hard inquiry on your credit report if you formally accept a loan offer and the lender runs a full application.</p>
        </div>
        <a href="/#apply" class="inline-flex items-center justify-center px-6 py-3 rounded-full bg-white text-brand-700 font-bold shadow-soft hover:bg-brand-50">Start now</a>
      </div>
    </div>
  </div>
</section>

<?php
component('trust-badges');
component('faq');
component('cta-banner');
