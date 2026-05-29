<?php
component('hero', [
  'eyebrow'    => 'Personal loans · A direct lender in ' . LICENSED_STATES,
  'headline'   => 'Personal loans<br>starting at <span class="text-brand-700">' . FEATURED_RATE_LOW . '%</span> APR.',
  'sub'        => 'See your rate in 60 seconds with no impact to your credit score. Loan Streamline Pro is a brand of Advantage First Financial LLC — fixed rates, fixed terms, no surprises.',
  'bullets'    => [
    'Loans from $1,000 to $50,000',
    'Funds in as little as 1-5 business days',
    'Soft credit check to pre-qualify - will not affect your score',
  ],
  'rate_badge' => true,
]);

component('social-proof');
component('benefits');
component('how-it-works');
component('loan-options');
component('trust-badges');
component('testimonials');
component('faq');
component('cta-banner');
