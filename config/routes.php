<?php
/**
 * Simple route → page mapping.
 *  - Keys are normalized request paths (no trailing slash, "/" for home).
 *  - Values are: ['page' => filename in /pages, 'title' => SEO title, 'desc' => meta description].
 */

return [
    '/' => [
        'page'  => 'home',
        'title' => 'Consolidation Loans & Personal Loans Made Simple',
        'desc'  => 'Loan Streamline Pro helps consumers consolidate debt, lower monthly payments, and compare personal loan options from trusted Lending Partners.',
    ],
    '/about' => [
        'page'  => 'about',
        'title' => 'About Us',
        'desc'  => 'Learn about Loan Streamline Pro — helping consumers reduce debt and access personal loan options through trusted Lending Partners.',
    ],
    '/how-it-works' => [
        'page'  => 'how-it-works',
        'title' => 'How It Works',
        'desc'  => 'See how Loan Streamline Pro matches you with consolidation loans and personal loan options in three simple steps.',
    ],
    '/debt-consolidation' => [
        'page'  => 'debt-consolidation',
        'title' => 'Consolidation Loans Made Simple',
        'desc'  => 'Combine high-interest credit card balances into one lower monthly payment with consolidation loan options from Loan Streamline Pro.',
    ],
    '/personal-loans' => [
        'page'  => 'personal-loans',
        'title' => 'Personal Loans',
        'desc'  => 'Explore personal loan options for consolidation, large purchases, or emergencies — fast pre-qualification with no impact to your credit score.',
    ],
    '/contact' => [
        'page'  => 'contact',
        'title' => 'Contact Us',
        'desc'  => 'Get in touch with Loan Streamline Pro for personal loan and consolidation loan support.',
    ],
    '/privacy-policy' => [
        'page'  => 'privacy-policy',
        'title' => 'Privacy Policy',
        'desc'  => 'Privacy Policy for Loan Streamline Pro — how we collect, use, and share your information with Lending Partners.',
    ],
    '/terms-and-conditions' => [
        'page'  => 'terms-conditions',
        'title' => 'Terms & Conditions',
        'desc'  => 'Terms & Conditions for using the Loan Streamline Pro website and services.',
    ],
    '/sms-terms' => [
        'page'  => 'sms-terms',
        'title' => 'SMS Terms & Conditions',
        'desc'  => 'SMS Terms & Conditions — includes 10DLC, STOP, and HELP information for messages from Loan Streamline Pro.',
    ],
    '/california-privacy' => [
        'page'  => 'california-privacy',
        'title' => 'California Privacy Notice (CCPA / CPRA)',
        'desc'  => 'California Consumer Privacy Act notice for Loan Streamline Pro residents of California.',
    ],
    '/thank-you' => [
        'page'  => 'thank-you',
        'title' => 'Thank You',
        'desc'  => 'Thank you for your inquiry — a Loan Streamline Pro 