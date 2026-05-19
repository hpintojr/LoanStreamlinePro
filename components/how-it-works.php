<section class="py-16 sm:py-20 bg-soft-gradient">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl">
      <p class="text-sm font-semibold text-brand-700 uppercase tracking-wide">How it works</p>
      <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900">Three simple steps. No surprises.</h2>
    </div>

    <div class="mt-10 grid gap-6 md:grid-cols-3">
      <?php
      $steps = [
        ['n'=>'01','t'=>'Tell us about your debt','d'=>'Share a few details about your balances and goals. Takes about 60 seconds — and never affects your credit score.'],
        ['n'=>'02','t'=>'Get matched with options','d'=>'We compare options from our trusted lending partners and present them in plain English: rate, term, monthly payment, total cost.'],
        ['n'=>'03','t'=>'Choose what works for you','d'=>'Talk to a real US-based specialist, ask questions, and only move forward if it makes sense for your budget.'],
      ];
      foreach ($steps as $s): ?>
        <div class="relative rounded-2xl bg-white p-6 shadow-soft border border-slate-100">
          <span class="absolute -top-3 -left-3 inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-brand-gradient text-white font-bold shadow-soft"><?= e($s['n']) ?></span>
          <h3 class="mt-5 font-semibold text-slate-900 text-lg"><?= e($s['t']) ?></h3>
          <p class="mt-2 text-sm text-slate-600 leading-6"><?= e($s['d']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
