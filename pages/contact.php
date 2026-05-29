<section class="bg-soft-gradient py-16 sm:py-20">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-12">
      <div>
        <p class="text-sm font-semibold text-brand-700 uppercase tracking-wide">Contact</p>
        <h1 class="mt-2 text-4xl sm:text-5xl font-extrabold text-slate-900 tracking-tight">We're here to help.</h1>
        <p class="mt-5 text-lg text-slate-600">Reach our US-based specialists by phone or email. We respond to inquiries during business hours.</p>

        <div class="mt-8 space-y-4 text-slate-700">
          <div class="flex items-start gap-3">
            <svg class="w-5 h-5 mt-1 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h2.28a1 1 0 01.95.68l1.5 4.5a1 1 0 01-.5 1.21l-1.84.92a11 11 0 005.29 5.29l.92-1.84a1 1 0 011.21-.5l4.5 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2A16 16 0 013 5z"/></svg>
            <div><div class="font-semibold">Phone</div><a class="text-brand-700 hover:underline" href="tel:<?= e(BUSINESS_PHONE_RAW) ?>"><?= e(BUSINESS_PHONE) ?></a><div class="text-sm text-slate-500"><?= e(BUSINESS_HOURS) ?></div></div>
          </div>
          <div class="flex items-start gap-3">
            <svg class="w-5 h-5 mt-1 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            <div><div class="font-semibold">Email</div><a class="text-brand-700 hover:underline" href="mailto:<?= e(BUSINESS_EMAIL) ?>"><?= e(BUSINESS_EMAIL) ?></a></div>
          </div>
          <div class="flex items-start gap-3">
            <svg class="w-5 h-5 mt-1 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0L6.343 16.657a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            <div><div class="font-semibold">Mailing Address</div><div class="text-sm text-slate-600"><?= e(BUSINESS_ADDRESS) ?></div></div>
          </div>
        </div>

        <div class="mt-8 rounded-2xl bg-white border border-slate-100 p-5 shadow-soft text-sm text-slate-600">
          <strong class="text-slate-800">Need to unsubscribe from SMS?</strong>
          Reply <strong>STOP</strong> to any text message you received from us, or email <a class="text-brand-700 hover:underline" href="mailto:<?= e(BUSINESS_EMAIL) ?>?subject=SMS%20Unsubscribe"><?= e(BUSINESS_EMAIL) ?></a> with the phone number you'd like removed.
        </div>
      </div>

      <div id="apply">
        <?php /* TEMP: lead form removed for 10DLC review (single opt-in source). Restore by uncommenting the line below and deleting the fallback card. */ ?>
        <?php /* component('multi-step-form'); */ ?>
        <div class="rounded-3xl bg-white border border-slate-100 p-8 shadow-soft">
          <p class="text-xs font-semibold uppercase tracking-widest text-brand-700">Get in touch</p>
          <h2 class="mt-2 text-2xl font-bold text-slate-900">Talk to a specialist.</h2>
          <p class="mt-3 text-slate-600">Call or email us to check your rate and discuss your options — no impact to your credit score.</p>
          <a href="tel:<?= e(BUSINESS_PHONE_RAW) ?>" class="mt-6 inline-flex items-center justify-center gap-2 w-full px-6 py-3 rounded-full bg-brand-gradient text-white font-bold shadow-soft hover:opacity-95 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h2.28a1 1 0 01.95.68l1.5 4.5a1 1 0 01-.5 1.21l-1.84.92a11 11 0 005.29 5.29l.92-1.84a1 1 0 011.21-.5l4.5 1.5a1 1 0 01.68.95V19a2 2 0 01-2 2A16 16 0 013 5z"/></svg>
            Call <?= e(BUSINESS_PHONE) ?>
          </a>
          <a href="mailto:<?= e(BUSINESS_EMAIL) ?>" class="mt-3 inline-flex items-center justify-center gap-2 w-full px-6 py-3 rounded-full border border-slate-200 text-slate-800 font-semibold hover:border-brand-300 hover:text-brand-700 transition">
            Email <?= e(BUSINESS_EMAIL) ?>
          </a>
          <p class="mt-4 text-sm text-slate-500 text-center"><?= e(BUSINESS_HOURS) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php component('trust-badges'); ?>
