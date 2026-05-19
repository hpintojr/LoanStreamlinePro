<?php
$faqs = $faqs ?? [
  ['q'=>'Will checking my rate hurt my credit score?', 'a'=>'No. Pre-qualification uses a soft credit pull and will not affect your credit score. Only if you accept an offer and a lender runs a full application will a hard inquiry be made.'],
  ['q'=>'Is Loan Streamline Pro a lender?', 'a'=>'No. Loan Streamline Pro is a marketing brand operated by Advantage First Financial. We help match consumers with debt consolidation options and personal loans from trusted lending partners. We are not a direct lender, and final approval and terms are at the discretion of the lender.'],
  ['q'=>'How quickly can I get my money?', 'a'=>'It depends on the lender and how quickly you can verify your information. Many consolidation loans fund within 1–5 business days after acceptance.'],
  ['q'=>'How do you protect my personal information?', 'a'=>'Every submission is transmitted over 256-bit SSL encryption. We follow industry best practices and applicable privacy laws, including the California Consumer Privacy Act (CCPA / CPRA) for California residents. See our Privacy Policy for details, including how to request access, deletion, or to opt out of sharing.'],
  ['q'=>'What does the SMS opt-in mean?', 'a'=>'When you check the SMS box, you give explicit consent to receive text messages from Loan Streamline Pro and Advantage First Financial about your inquiry. Message frequency varies; standard Msg & data rates may apply. You can reply STOP at any time to unsubscribe, or HELP for help. See our SMS Terms.'],
  ['q'=>'Do you use AI in your communications?', 'a'=>'Yes — some communications may be generated using automated technology or AI-assisted systems. A real specialist remains responsible for any binding offers, advice, or program enrollment.'],
];
?>
<section class="py-16 sm:py-20 bg-white">
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <p class="text-sm font-semibold text-brand-700 uppercase tracking-wide">Questions, answered</p>
    <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900">Frequently asked questions</h2>

    <div class="mt-8 divide-y divide-slate-100 border-y border-slate-100">
      <?php foreach ($faqs as $f): ?>
        <details class="group py-4">
          <summary class="flex items-center justify-between cursor-pointer list-none font-semibold text-slate-900">
            <span><?= e($f['q']) ?></span>
            <svg class="faq-chevron w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
          </summary>
          <p class="mt-3 text-slate-600 leading-7 text-sm"><?= e($f['a']) ?></p>
        </details>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- JSON-LD FAQ schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      <?php foreach ($faqs as $i => $f): ?>
      {
        "@type": "Question",
        "name": <?= json_encode($f['q']) ?>,
        "acceptedAnswer": {"@type":"Answer","text": <?= json_encode($f['a']) ?>}
      }<?= $i < count($faqs) - 1 ? ',' : '' ?>
      <?php endforeach; ?>
    ]
  }
  </script>
</section>
