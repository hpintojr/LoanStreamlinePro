<?php
/**
 * Hero with side-by-side multi-step form.
 * Vars: $eyebrow, $headline, $sub, $bullets, $rate_badge
 */
$eyebrow    = $eyebrow    ?? 'Personal loans';
$headline   = $headline   ?? 'A simpler personal loan.<br>One clear path forward.';
$sub        = $sub        ?? 'A personal loan with a fixed rate and a clear payoff date. Check your rate in under 60 seconds with no impact to your credit score.';
$bullets    = $bullets    ?? [
    'Check your rate in under 60 seconds',
    'No obligation, no fees to apply',
    'US-based specialists',
];
$rate_badge = $rate_badge ?? false;
?>
<section class="relative overflow-hidden bg-soft-gradient">
  <div class="blob bg-brand-200 w-[480px] h-[480px] -top-32 -left-24"></div>
  <div class="blob bg-brand-100 w-[420px] h-[420px] top-40 -right-20"></div>

  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-16 lg:pt-20 lg:pb-24">
    <div class="grid lg:grid-cols-2 gap-12 items-center">

      <div>
        <p class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold text-brand-700 bg-brand-100 px-3 py-1 rounded-full">
          <span class="w-2 h-2 rounded-full bg-brand-600"></span> <?= e($eyebrow) ?>
        </p>

        <?php if ($rate_badge): ?>
          <div class="mt-4 inline-flex items-baseline gap-2 px-4 py-2 rounded-2xl bg-white border border-brand-100 shadow-soft">
            <span class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Rates as low as</span>
            <span class="text-2xl sm:text-3xl font-extrabold text-brand-700"><?= e(FEATURED_RATE_LOW) ?>%</span>
            <span class="text-xs font-semibold text-slate-500">APR<sup>*</sup></span>
          </div>
        <?php endif; ?>

        <h1 class="mt-4 text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 leading-[1.05]">
          <?= $headline ?>
        </h1>
        <p class="mt-5 text-lg text-slate-600 max-w-xl"><?= e($sub) ?></p>

        <ul class="mt-6 space-y-2 text-slate-700">
          <?php foreach ($bullets as $b): ?>
            <li class="flex items-start gap-2">
              <svg class="w-5 h-5 mt-0.5 text-brand-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              <span><?= e($b) ?></span>
            </li>
          <?php endforeach; ?>
        </ul>

        <div class="mt-8 flex flex-wrap items-center gap-3">
          <a href="#apply" class="inline-flex items-center justify-center px-6 py-3 rounded-full bg-brand-gradient text-white font-semibold shadow-soft hover:opacity-95 transition">
            Check my rate
          </a>
          <a href="tel:<?= e(BUSINESS_PHONE_RAW) ?>" class="inline-flex items-center gap-2 px-6 py-3 rounded-full border border-slate-200 text-slate-800 font-semibold hover:border-brand-300 hover:text-brand-700">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h2.28a1 1 0 01.95.68l1.5 4.5a1 1 0 01-.5 1.21l-1.84.92a11 11 0 005.29 5.29l.92-1.84a1 1 0 011.21-.5l4.5 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2A16 16 0 013 5z"/></svg>
            Call <?= e(BUSINESS_PHONE) ?>
          </a>
        </div>

        <p class="mt-5 text-xs text-slate-500 max-w-md">Checking your rate uses a soft credit pull and will not affect your credit score.</p>

        <?php if ($rate_badge): ?>
          <p class="mt-2 text-[11px] text-slate-400 max-w-lg leading-relaxed"><sup>*</sup> <?= e(FEATURED_RATE_NOTE) ?></p>
        <?php endif; ?>
      </div>

      <div id="apply">
        <?php component('multi-step-form'); ?>
      </div>

    </div>
  </div>
</section>
