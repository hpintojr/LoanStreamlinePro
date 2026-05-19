<?php
component('hero', [
  'eyebrow'    => 'Personal loans · Consolidation loans',
  'headline'   => 'Personal loans<br>starting at <span class="text-brand-700">' . FEATURED_RATE_LOW . '%</span> APR.',
  'sub'        => 'Get pre-qualified in 60 seconds and compare real offers from our trusted Lending Partners — without any impact to your credit score.',
  'bullets'    => [
    'Loans from $1,000 to $50,000',
    'Funds in as little as 1–5 business days',
    'Soft credit check to pre-qualify — won\'t affect your score',
  ],
  'rate_badge' => true,
]);

component('social-proof');
component('benefits');
component('how-it-works');
component('loan-options');
component('trust-badges');
component('testimo