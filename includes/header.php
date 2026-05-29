<?php /** @var string $PAGE_TITLE */ /** @var string $PAGE_DESC */ /** @var string $PAGE_PATH */ ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<meta name="theme-color" content="#1d4ed8">

<title><?= e($PAGE_TITLE) ?></title>
<meta name="description" content="<?= e($PAGE_DESC) ?>">
<link rel="canonical" href="<?= e(SITE_URL . $PAGE_PATH) ?>">

<!-- SEO keywords (broad — page content does the heavy lifting) -->
<meta name="keywords" content="personal loans, consolidation loans, fixed-rate loans, Texas personal loans, Utah personal loans, Advantage First Financial">

<!-- Open Graph -->
<meta property="og:type" content="website">
<meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
<meta property="og:title" content="<?= e($PAGE_TITLE) ?>">
<meta property="og:description" content="<?= e($PAGE_DESC) ?>">
<meta property="og:url" content="<?= e(SITE_URL . $PAGE_PATH) ?>">
<meta property="og:image" content="<?= e(SITE_URL) ?>/assets/img/og-image.png">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= e($PAGE_TITLE) ?>">
<meta name="twitter:description" content="<?= e($PAGE_DESC) ?>">

<!-- Favicon (SVG with PNG fallback if you upload favicon.png to /assets/img/) -->
<link rel="icon" type="image/svg+xml" href="/assets/img/favicon.svg">
<link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon.png">
<link rel="apple-touch-icon" sizes="180x180" href="/assets/img/apple-touch-icon.png">

<!-- Tailwind CDN (no build step — ideal for IONOS shared hosting) -->
<script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
<script>
tailwind.config = {
  theme: {
    extend: {
      colors: {
        brand: {
          50:  '#eff6ff',
          100: '#dbeafe',
          200: '#bfdbfe',
          300: '#93c5fd',
          400: '#60a5fa',
          500: '#3b82f6',
          600: '#2563eb',
          700: '#1d4ed8',
          800: '#1e40af',
          900: '#1e3a8a',
        }
      },
      fontFamily: {
        sans: ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'Segoe UI', 'Roboto', 'sans-serif'],
      },
      boxShadow: {
        soft: '0 10px 25px -10px rgba(37, 99, 235, 0.15), 0 4px 10px -4px rgba(15, 23, 42, 0.05)',
      },
      backgroundImage: {
        'brand-gradient': 'linear-gradient(135deg, #1d4ed8 0%, #2563eb 45%, #3b82f6 100%)',
        'soft-gradient':  'linear-gradient(180deg, #eff6ff 0%, #ffffff 100%)',
      }
    }
  }
}
</script>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<!-- Custom CSS -->
<link rel="stylesheet" href="/assets/css/custom.css">

<!-- JSON-LD structured data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FinancialService",
  "name": "<?= e(SITE_NAME) ?>",
  "alternateName": "LSP",
  "legalName": "<?= e(OPERATING_ENTITY) ?>",
  "url": "<?= e(SITE_URL) ?>",
  "areaServed": [
    { "@type": "State", "name": "Texas" },
    { "@type": "State", "name": "Utah" }
  ],
  "identifier": {
    "@type": "PropertyValue",
    "propertyID": "NMLS",
    "value": "<?= e(NMLS_ID) ?>"
  },
  "telephone": "<?= e(BUSINESS_PHONE_RAW) ?>",
  "email": "<?= e(BUSINESS_EMAIL) ?>"
}
</script>
</head>
<body class="font-sans text-slate-800 bg-white antialiased">

<a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 bg-white text-brand-700 px-3 py-2 rounded shadow">Skip to main content</a>

<?php include __DIR__ . '/nav.php'; ?>
<?php include __DIR__ . '/ai-disclosure-banner.php'; ?>

<main id="main">
