<?php
$reviews = $reviews ?? [
  ['name'=>'Maria G.',  'loc'=>'Phoenix, AZ',  'stars'=>5, 'text'=>'I was juggling six credit cards. One call, one form, and I had a clear plan within a week. My monthly payment dropped by over $400.'],
  ['name'=>'Daniel R.', 'loc'=>'Tampa, FL',    'stars'=>5, 'text'=>'They explained everything in plain English. No high-pressure sales. I finally feel like I have a clear plan to pay everything off.'],
  ['name'=>'Karen H.',  'loc'=>'Columbus, OH', 'stars'=>5, 'text'=>'After comparing offers, I chose a consolidation loan that fit my budget. The specialist was patient and answered every question.'],
];
?>
<section class="py-16 sm:py-20 bg-soft-gradient">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl">
      <p class="text-sm font-semibold text-brand-700 uppercase tracking-wide">What clients say</p>
      <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900">Real stories from real customers.</h2>
    </div>

    <div class="mt-10 grid gap-6 md:grid-cols-3">
      <?php foreach ($reviews as $r): ?>
        <figure class="rounded-2xl bg-white p-6 border border-slate-100 shadow-soft">
          <div class="flex gap-0.5 text-amber-400 mb-3" aria-label="<?= e($r['stars']) ?> out of 5 stars">
            <?php for ($i=0; $i<5; $i++): ?>
              <svg class="w-4 h-4 <?= $i < $r['stars'] ? 'fill-current' : 'text-slate-200 fill-current' ?>" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.957a1 1 0 00.95.69h4.162c.969 0 1.371 1.24.588 1.81l-3.366 2.446a1 1 0 00-.364 1.118l1.287 3.957c.3.922-.755 1.688-1.539 1.118L10 14.347l-3.366 2.446c-.784.57-1.838-.196-1.539-1.118l1.286-3.957a1 1 0 00-.363-1.118L2.652 8.154c-.783-.57-.38-1.81.588-1.81h4.162a1 1 0 00.95-.69l1.287-3.957z"/></svg>
            <?php endfor; ?>
          </div>
          <blockquote class="text-slate-700 leading-6">“<?= e($r['text']) ?>”</blockquote>
          <figcaption class="mt-4 text-sm text-slate-500">
            <span class="font-semibold text-slate-800"><?= e($r['name']) ?></span> · <?= e($r['loc']) ?>
          </figcaption>
        </figure>
      <?php endforeach; ?>
    </div>
    <p class="mt-4 text-xs text-slate-500">Reviews are representative client experiences. Individual results vary based on creditworthiness, lender, and program selected.</p>
  </div>
</section>
