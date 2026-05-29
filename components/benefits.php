<?php
$benefits = $benefits ?? [
  ['title' => 'Lower monthly payments',         'desc' => 'Combine high-interest balances into a single, predictable monthly payment that may free up cash flow.',                'icon' => 'M3 12l2-2 4 4L20 4l1 1-12 13z'],
  ['title' => 'No credit-score impact to check','desc' => 'Pre-qualification uses a soft pull — see your estimated rate without any hit to your credit.',                          'icon' => 'M5 13l4 4L19 7'],
  ['title' => 'US-based specialists',           'desc' => 'Talk to a real person who can walk you through your options in plain English — not a chatbot.',                         'icon' => 'M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-5a4 4 0 11-8 0 4 4 0 018 0z'],
  ['title' => 'Transparent, no-pressure',       'desc' => 'Every offer comes with the APR, term, fees, and total cost spelled out — no surprises.',                                'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
  ['title' => 'Funds in days, not weeks',       'desc' => 'Many loans fund within 1–5 business days after your loan is approved and your agreement is signed.',                    'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
  ['title' => 'Secure & confidential',          'desc' => 'Every submission is transmitted over 256-bit SSL encryption. Your information is treated as private and never sold.',   'icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z'],
];
?>
<section class="py-16 sm:py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl">
      <p class="text-sm font-semibold text-brand-700 uppercase tracking-wide">Why Loan Streamline Pro</p>
      <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900">Built for clarity, not surprises.</h2>
      <p class="mt-3 text-slate-600">A process designed to be transparent, fast, and easy to understand — from the first click to the final payment.</p>
    </div>

    <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
      <?php foreach ($benefits as $b): ?>
        <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-soft hover:-translate-y-0.5 transition">
          <div class="w-11 h-11 rounded-xl bg-brand-50 text-brand-700 flex items-center justify-center mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= e($b['icon']) ?>"/></svg>
          </div>
          <h3 class="font-semibold text-slate-900"><?= e($b['title']) ?></h3>
          <p class="mt-2 text-sm text-slate-600 leading-6"><?= e($b['desc']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
