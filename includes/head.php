<?php
/**
 * BBD Tree Service — <head> Include
 * Phase 2: Header, Footer, Head, Functions
 *
 * Expects the following variables set by the including page:
 *   $pageTitle       (optional — falls back to site default)
 *   $pageDescription (optional — falls back to site default)
 *   $pageKeywords    (optional — falls back to $secondaryKeywords)
 *   $canonicalUrl    (optional — falls back to $siteUrl)
 *   $ogImage         (optional — falls back to $logoUrl)
 *   $schemaMarkup    (optional — page-specific JSON-LD string)
 *   $heroImage       (optional — triggers preload link)
 *   $useSwiper       (optional bool — injects Swiper CSS)
 *   $currentPage     (recommended — used by header.php for active state)
 */

if (!isset($siteName)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

// ─── Resolve Meta Values ──────────────────────────────────────────────────────
$_t = isset($pageTitle) && $pageTitle !== ''
    ? $pageTitle
    : "$siteName | " . ucwords($primaryKeyword) . " | {$address['city']}, {$address['state']}";

$_d = isset($pageDescription) && $pageDescription !== ''
    ? $pageDescription
    : "BBD Tree Service provides professional tree removal, trimming, pruning, and stump grinding in Watertown, MA. Licensed and insured with 26 years of experience. Free estimates.";

$_can = isset($canonicalUrl) && $canonicalUrl !== '' ? $canonicalUrl : $siteUrl;
$_img = isset($ogImage) && $ogImage !== '' ? $ogImage : $logoUrl;

$_kw = '';
if (isset($pageKeywords)) {
    $_kw = is_array($pageKeywords) ? implode(', ', $pageKeywords) : $pageKeywords;
} else {
    $_kw = implode(', ', $secondaryKeywords);
}

$_sch = isset($schemaMarkup) ? $schemaMarkup : '';

// ─── LocalBusiness Schema ─────────────────────────────────────────────────────
$_serviceOffers = array_map(function ($s) {
    return [
        '@type'       => 'Offer',
        'itemOffered' => ['@type' => 'Service', 'name' => $s['name']],
    ];
}, $services);

$_areaServed = array_map(function ($a) {
    return $a['city'] . ', ' . $a['state'];
}, $serviceAreas);

$_localBusiness = [
    '@context'    => 'https://schema.org',
    '@type'       => 'LocalBusiness',
    '@id'         => $siteUrl . '/#business',
    'name'        => $siteName,
    'url'         => $siteUrl,
    'telephone'   => $phone,
    'email'       => $email,
    'description' => "BBD Tree Service provides professional tree removal, trimming, pruning, and stump grinding in Watertown, MA and Greater Boston. Licensed and insured with {$yearsInBusiness} years of experience.",
    'image'       => $logoUrl,
    'logo'        => $logoUrl,
    'address'     => [
        '@type'           => 'PostalAddress',
        'streetAddress'   => $address['street'],
        'addressLocality' => $address['city'],
        'addressRegion'   => $address['state'],
        'postalCode'      => $address['zip'],
        'addressCountry'  => 'US',
    ],
    'geo' => [
        '@type'     => 'GeoCoordinates',
        'latitude'  => 42.3636,
        'longitude' => -71.1827,
    ],
    'openingHoursSpecification' => [
        [
            '@type'     => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
            'opens'     => '07:00',
            'closes'    => '18:00',
        ],
        [
            '@type'     => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Saturday'],
            'opens'     => '08:00',
            'closes'    => '16:00',
        ],
    ],
    'aggregateRating' => [
        '@type'       => 'AggregateRating',
        'ratingValue' => '4.9',
        'reviewCount' => '85',
        'bestRating'  => '5',
    ],
    'areaServed'       => $_areaServed,
    'hasOfferCatalog'  => [
        '@type'           => 'OfferCatalog',
        'name'            => 'Tree Services',
        'itemListElement' => $_serviceOffers,
    ],
    'foundingYear'    => (string) $yearEstablished,
    'priceRange'      => '$$',
    'paymentAccepted' => 'Cash, Check, Credit Card',
    'sameAs'          => array_values($socialLinks),
];
$_lbJson = json_encode($_localBusiness, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Primary SEO -->
  <title><?= htmlspecialchars($_t) ?></title>
  <meta name="description" content="<?= htmlspecialchars($_d) ?>">
  <meta name="keywords" content="<?= htmlspecialchars($_kw) ?>">
  <link rel="canonical" href="<?= htmlspecialchars($_can) ?>">
  <?php if (!empty($noindex)): ?>
  <meta name="robots" content="noindex, nofollow">
  <?php endif; ?>

  <!-- Open Graph -->
  <meta property="og:type"        content="website">
  <meta property="og:title"       content="<?= htmlspecialchars($_t) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($_d) ?>">
  <meta property="og:url"         content="<?= htmlspecialchars($_can) ?>">
  <meta property="og:image"       content="<?= htmlspecialchars($_img) ?>">
  <meta property="og:site_name"   content="<?= htmlspecialchars($siteName) ?>">
  <meta property="og:locale"      content="en_US">

  <!-- Twitter Card -->
  <meta name="twitter:card"        content="summary_large_image">
  <meta name="twitter:title"       content="<?= htmlspecialchars($_t) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($_d) ?>">
  <meta name="twitter:image"       content="<?= htmlspecialchars($_img) ?>">

  <!-- Fonts: preconnect -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <!-- Google Fonts: Montserrat (headings) + Open Sans (body) -->
  <link rel="preload" as="style"
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&family=Open+Sans:wght@400;500;600&display=swap"
    onload="this.onload=null;this.rel='stylesheet'">
  <noscript>
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&family=Open+Sans:wght@400;500;600&display=swap">
  </noscript>

  <!-- Framework CSS -->
  <link rel="stylesheet" href="/assets/css/framework.css">

  <?php if (isset($useSwiper) && $useSwiper): ?>
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <?php endif; ?>

  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
  <link rel="icon" type="image/png"     href="/assets/images/favicon.png" sizes="32x32">
  <link rel="apple-touch-icon"          href="/assets/images/apple-touch-icon.png">

  <?php if (isset($heroImage) && $heroImage !== ''): ?>
  <!-- Hero Image Preload -->
  <link rel="preload" as="image" href="<?= htmlspecialchars($heroImage) ?>">
  <?php endif; ?>

  <!-- Google Analytics (replace placeholder before launch) -->
  <!-- GA4: <?= $googleAnalyticsId ?> -->
  <!--
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?= $googleAnalyticsId ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '<?= $googleAnalyticsId ?>');
  </script>
  -->

  <?php if (isset($currentPage) && $currentPage === 'home' && isset($gscVerification) && $gscVerification !== ''): ?>
  <!-- Google Search Console Verification (homepage only) -->
  <meta name="google-site-verification" content="<?= htmlspecialchars($gscVerification) ?>">
  <?php endif; ?>

  <!-- JSON-LD: LocalBusiness -->
  <script type="application/ld+json">
<?= $_lbJson ?>
  </script>

  <?php if (!empty($_sch)): ?>
  <!-- JSON-LD: Page-Specific Schema -->
  <script type="application/ld+json">
<?= $_sch ?>
  </script>
  <?php endif; ?>

</head>
