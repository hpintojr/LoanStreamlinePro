<?php
/**
 * Simple route -> page mapping.
 *  - Keys are normalized request paths (no trailing slash, "/" for home).
 *  - Values are: ['page' => filename in /pages, 'title' => SEO title, 'desc' => meta description].
 */

return [
    '/' => [
        'page'  => 'home',
        'title' => 'Personal Loans Made Simple',
        'desc'  => 'Loan Streamline Pro, a brand of Advantage First Financial LLC (NMLS #2674295), offers personal loans with fixed rates and clear terms to Texas and Utah residents. Check your rate in 60 seconds.',
    ],
    '/about' => [
        'page'  => 'about',
        'title' => 'About Us',
        'desc'  => 'Learn about Loan Streamline Pro — the consumer brand of Advantage First Financial LLC, a licensed lender serving Texas and Utah.',
    ],
    '/how-it-works' => [
        'page'  => 'how-it-works',
        'title' => 'How It Works',
        'desc'  => 'See how Loan Streamline Pro takes you from application to a funded personal loan in three simple steps.',
    ],
    '/consolidation-loans' => [
        'page'  => 'consolidation-loans',
        'title' => 'Debt Consolidation Loans',
        'desc'  => 'Use a personal loan from Loan Streamline Pro to combine high-interest credit card balances into one lower monthly payment.',
    ],
    '/personal-loans' => [
        'page'  => 'personal-loans',
        'title' => 'Personal Loans',
        'desc'  => 'Personal loans for consolidation, large purchases, or emergencies — fast pre-qualification with no impact to your credit score.',
    ],
    '/contact' => [
        'page'  => 'contact',
        'title' => 'Contact Us',
        'desc'  => 'Get in touch with Loan Streamline Pro for personal loan support.',
    ],
    '/privacy-policy' => [
        'page'  => 'privacy-policy',
        'title' => 'Privacy Policy',
        'desc'  => 'Privacy Policy for Loan Streamline Pro — how we collect, use, and share your information as a licensed lender.',
    ],
    '/terms-and-conditions' => [
        'page'  => 'terms-conditions',
        'title' => 'Terms of Service',
        'desc'  => 'Terms of Service for using the Loan Streamline Pro website and services.',
    ],
    '/sms-terms' => [
        'page'  => 'sms-terms',
        'title' => 'SMS Terms & Conditions',
        'desc'  => 'SMS Terms & Conditions — includes 10DLC, STOP, and HELP information for messages from Loan Streamline Pro.',
    ],
    '/california-privacy' => [
        'page'  => 'california-privacy',
        'title' => 'California Privacy Notice (CCPA / CPRA)',
        'desc'  => 'California Consumer Privacy Act notice for residents of California.',
    ],
    '/thank-you' => [
        'page'  => 'thank-you',
        'title' => 'Thank You',
        'desc'  => 'Thank you for your inquiry — a Loan Streamline Pro specialist will reach out shortly.',
    ],
];
