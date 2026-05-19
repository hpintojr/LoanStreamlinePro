<?php
$title = $title ?? 'Ready to see your options?';
$sub   = $sub   ?? 'Check your rate in 60 seconds — no impact to your credit score.';
?>
<section class="py-16 sm:py-20">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="rounded-3xl bg-brand-gradient text-white p-8 sm:p-12 shadow-soft relative overflow-hidden">
      <div class="absolute -right-10 -top-10 w-64 h-64 rounded-full bg-white/10 blur-2xl"></div>
      <div class="relative grid lg:grid-cols-[1fr,auto] gap-6 items-center">
        <div>
          <h2 class="text-3xl sm:text-4xl font-bold leading-tight"><?= e($title) ?></h2>
          <p class="mt-3 text-brand-50/95"><?= e($sub) ?></p>
        </div>
        <div class="flex flex-wrap gap-3">
          <a href="/#apply" class="inline-flex items-center px-6 py-3 rounded-full bg-white text-brand-700 font-bold shadow-soft hover:bg-brand-50">Get My Rate</a>
          <a href="tel:<?= e(BUSINESS_PHONE_RAW) ?>" class="inline-flex items-center px-6 py-3 rounded-full border border-white/30 text-white font-semibold hover:bg-white/10">Call <?= e(BUSINESS_PHONE) ?></a>
        </div>
      </div>
    </div>
  </div>
</section>
