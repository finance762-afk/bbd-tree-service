<?php
/**
 * BBD Tree Service — About Us
 * Phase 4: about.php
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

// ─── Page Meta ────────────────────────────────────────────────────────────────
$pageTitle       = "About BBD Tree Service | 26 Years in Watertown MA";
$pageDescription = "BBD Tree Service has served Watertown, MA and Greater Boston since 2000. Learn about our licensed arborist team, values, and commitment to safe, thorough tree care.";
$pageKeywords    = "about bbd tree service, watertown ma arborist, tree service company watertown, licensed arborist massachusetts, tree removal company history";
$canonicalUrl    = $siteUrl . '/about';
$ogImage         = $siteImages['staff'];
$heroImage       = $siteImages['photo1'];
$currentPage     = 'about';

$orgSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type'    => 'Organization',
    'name'     => $siteName,
    'url'      => $siteUrl,
    'logo'     => $logoUrl,
    'foundingDate' => (string)$yearEstablished,
    'description'  => 'BBD Tree Service is a licensed and insured tree care company serving Watertown, MA and Greater Boston since 2000. Specializing in tree removal, trimming, pruning, and stump grinding.',
    'address'  => [
        '@type'           => 'PostalAddress',
        'streetAddress'   => $address['street'],
        'addressLocality' => $address['city'],
        'addressRegion'   => $address['state'],
        'postalCode'      => $address['zip'],
        'addressCountry'  => 'US',
    ],
    'areaServed' => array_map(fn($a) => $a['city'] . ', ' . $a['state'], $serviceAreas),
    'sameAs'     => array_values($socialLinks),
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

$personSchema = json_encode([
    '@context'      => 'https://schema.org',
    '@type'         => 'Person',
    'name'          => $ownerName ?: 'BBD Tree Service Owner',
    'jobTitle'      => 'Owner & Lead Arborist',
    'worksFor'      => ['@type' => 'Organization', 'name' => $siteName],
    'address'       => [
        '@type'           => 'PostalAddress',
        'addressLocality' => $address['city'],
        'addressRegion'   => $address['state'],
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

$aggregateRatingSchema = json_encode([
    '@context'        => 'https://schema.org',
    '@type'           => 'LocalBusiness',
    'name'            => $siteName,
    'aggregateRating' => [
        '@type'       => 'AggregateRating',
        'ratingValue' => '4.9',
        'reviewCount' => '87',
        'bestRating'  => '5',
        'worstRating' => '1',
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

$breadcrumbSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $siteUrl],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'About', 'item' => $siteUrl . '/about'],
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<body>

<script type="application/ld+json"><?= $orgSchema ?></script>
<script type="application/ld+json"><?= $personSchema ?></script>
<script type="application/ld+json"><?= $aggregateRatingSchema ?></script>
<script type="application/ld+json"><?= $breadcrumbSchema ?></script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ============================================================
     ABOUT — PAGE STYLES
     ============================================================ -->
<style>

/* ── Page Hero ───────────────────────────────────────────────────────── */
.page-hero {
    position: relative;
    min-height: 52vh;
    display: flex;
    align-items: center;
    background-image: url('<?= $heroImage ?>');
    background-size: cover;
    background-position: center;
    overflow: hidden;
}
.page-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(45,106,0,0.85) 0%, rgba(28,72,0,0.72) 100%);
    z-index: 1;
}
.page-hero .noise {
    position: absolute;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='1'/%3E%3C/svg%3E");
    opacity: 0.04;
    z-index: 2;
}
.page-hero-content {
    position: relative;
    z-index: 3;
    color: white;
    padding: var(--section-pad);
    width: 100%;
}
.page-hero-content .container {
    display: flex;
    flex-direction: column;
    gap: var(--space-lg);
}
.page-hero h1 {
    font-size: clamp(2.2rem, 5vw, 3.8rem);
    font-weight: 800;
    line-height: 1.1;
    text-wrap: balance;
    letter-spacing: -0.02em;
}
.page-hero h1 span {
    display: block;
    background: linear-gradient(90deg, #fff 40%, var(--color-accent));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.breadcrumb {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    font-size: 0.85rem;
    opacity: 0.75;
    color: white;
}
.breadcrumb a { color: white; text-decoration: underline; text-underline-offset: 3px; }
.breadcrumb-sep { opacity: 0.5; }

/* ── Story Split ─────────────────────────────────────────────────────── */
.story-section {
    padding: var(--section-pad);
    background: var(--color-bg);
}
.story-split {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-4xl);
    align-items: center;
}
.story-img-stack {
    position: relative;
}
.story-img-main {
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    aspect-ratio: 4/5;
}
.story-img-main img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.story-img-badge {
    position: absolute;
    bottom: -var(--space-xl);
    right: -var(--space-xl);
    bottom: -32px;
    right: -32px;
    background: var(--color-accent);
    color: var(--color-primary-dark);
    border-radius: var(--radius-md);
    padding: var(--space-lg) var(--space-xl);
    text-align: center;
    box-shadow: var(--shadow-md);
}
.story-img-badge .badge-num {
    font-family: var(--font-heading);
    font-size: 2.8rem;
    font-weight: 800;
    line-height: 1;
    display: block;
}
.story-img-badge .badge-label {
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    display: block;
    margin-top: 2px;
}
.story-text .eyebrow {
    display: inline-block;
    background: var(--color-accent);
    color: var(--color-primary-dark);
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    padding: var(--space-xs) var(--space-md);
    border-radius: 999px;
    margin-bottom: var(--space-md);
}
.story-text h2 {
    font-size: clamp(1.8rem, 4vw, 2.6rem);
    font-weight: 800;
    letter-spacing: -0.02em;
    color: var(--color-text);
    margin-bottom: var(--space-xl);
    text-wrap: balance;
}
.story-text p {
    font-size: 1rem;
    color: var(--color-text-light);
    line-height: 1.75;
    margin-bottom: var(--space-lg);
    max-width: 54ch;
}

/* ── Values Grid ─────────────────────────────────────────────────────── */
.values-section {
    padding: var(--section-pad);
    background: var(--color-bg-alt);
}
.values-section .section-header {
    text-align: center;
    margin-bottom: var(--space-3xl);
}
.values-section .eyebrow {
    display: inline-block;
    background: var(--color-accent);
    color: var(--color-primary-dark);
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    padding: var(--space-xs) var(--space-md);
    border-radius: 999px;
    margin-bottom: var(--space-md);
}
.values-section h2 {
    font-size: clamp(1.8rem, 4vw, 2.8rem);
    font-weight: 800;
    letter-spacing: -0.02em;
    color: var(--color-text);
    margin-bottom: var(--space-md);
    text-wrap: balance;
}
.values-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: var(--space-xl);
}
.value-card {
    background: white;
    border-radius: var(--radius-lg);
    padding: var(--space-2xl);
    box-shadow: var(--shadow-sm);
    border-top: 4px solid var(--color-accent);
    text-align: center;
    transition: transform var(--transition), box-shadow var(--transition);
}
.value-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
}
.value-icon {
    width: 56px;
    height: 56px;
    background: rgba(45,106,0,0.08);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-primary);
    margin: 0 auto var(--space-lg);
    transition: background var(--transition), color var(--transition);
}
.value-card:hover .value-icon {
    background: var(--color-primary);
    color: white;
}
.value-card h3 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--color-text);
    margin-bottom: var(--space-sm);
}
.value-card p {
    font-size: 0.88rem;
    color: var(--color-text-light);
    line-height: 1.6;
}

/* ── Milestone Timeline (Signature Section) ──────────────────────────── */
.timeline-section {
    padding: var(--section-pad);
    background: var(--color-bg);
    overflow: hidden;
}
.timeline-section .section-header {
    text-align: center;
    margin-bottom: var(--space-4xl);
}
.timeline-section .eyebrow {
    display: inline-block;
    background: var(--color-accent);
    color: var(--color-primary-dark);
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    padding: var(--space-xs) var(--space-md);
    border-radius: 999px;
    margin-bottom: var(--space-md);
}
.timeline-section h2 {
    font-size: clamp(1.8rem, 4vw, 2.8rem);
    font-weight: 800;
    letter-spacing: -0.02em;
    color: var(--color-text);
    text-wrap: balance;
}
.timeline {
    position: relative;
    max-width: 900px;
    margin: 0 auto;
}
.timeline::before {
    content: '';
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(to bottom, var(--color-accent), var(--color-primary-dark));
}
.timeline-item {
    display: grid;
    grid-template-columns: 1fr auto 1fr;
    align-items: center;
    gap: var(--space-xl);
    margin-bottom: var(--space-3xl);
}
.timeline-item:nth-child(odd) .timeline-card { grid-column: 1; text-align: right; }
.timeline-item:nth-child(odd) .timeline-spacer { grid-column: 2; }
.timeline-item:nth-child(odd) .timeline-empty { grid-column: 3; }
.timeline-item:nth-child(even) .timeline-empty { grid-column: 1; }
.timeline-item:nth-child(even) .timeline-spacer { grid-column: 2; }
.timeline-item:nth-child(even) .timeline-card { grid-column: 3; text-align: left; }
.timeline-node {
    width: 48px;
    height: 48px;
    background: var(--color-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    box-shadow: 0 0 0 6px rgba(45,106,0,0.15);
    position: relative;
    z-index: 2;
    flex-shrink: 0;
}
.timeline-card {
    background: white;
    border-radius: var(--radius-md);
    padding: var(--space-xl);
    box-shadow: var(--shadow-md);
    border-left: 4px solid var(--color-accent);
}
.timeline-item:nth-child(odd) .timeline-card {
    border-left: none;
    border-right: 4px solid var(--color-accent);
}
.timeline-year {
    font-family: var(--font-heading);
    font-size: 1.8rem;
    font-weight: 800;
    color: var(--color-primary);
    display: block;
    margin-bottom: var(--space-xs);
}
.timeline-card h3 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--color-text);
    margin-bottom: var(--space-sm);
}
.timeline-card p {
    font-size: 0.88rem;
    color: var(--color-text-light);
    line-height: 1.6;
}

/* ── CTA Banner ──────────────────────────────────────────────────────── */
.cta-banner-about {
    padding: var(--section-pad);
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    position: relative;
    overflow: hidden;
    text-align: center;
}
.cta-banner-about::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='1'/%3E%3C/svg%3E");
    opacity: 0.06;
}
.cta-banner-about .container { position: relative; z-index: 2; }
.cta-banner-about h2 {
    font-size: clamp(1.8rem, 4vw, 2.8rem);
    font-weight: 800;
    color: white;
    margin-bottom: var(--space-md);
    text-wrap: balance;
}
.cta-banner-about p {
    font-size: 1.05rem;
    color: rgba(255,255,255,0.85);
    margin-bottom: var(--space-2xl);
    max-width: 56ch;
    margin-inline: auto;
    line-height: 1.6;
}
.cta-banner-about .cta-actions {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-xl);
    flex-wrap: wrap;
}
.cta-phone-lg {
    color: var(--color-accent);
    font-size: 1.5rem;
    font-weight: 800;
    display: flex;
    align-items: center;
    gap: var(--space-sm);
}

/* ── Team Photo Section ──────────────────────────────────────────────── */
.team-section {
    padding: var(--section-pad);
    background: var(--color-bg-dark);
    color: white;
}
.team-section .section-header {
    text-align: center;
    margin-bottom: var(--space-3xl);
}
.team-section .eyebrow {
    display: inline-block;
    background: var(--color-accent);
    color: var(--color-primary-dark);
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    padding: var(--space-xs) var(--space-md);
    border-radius: 999px;
    margin-bottom: var(--space-md);
}
.team-section h2 {
    font-size: clamp(1.8rem, 4vw, 2.8rem);
    font-weight: 800;
    letter-spacing: -0.02em;
    text-wrap: balance;
}
.team-photo-block {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-3xl);
    align-items: center;
}
.team-photo-wrap {
    position: relative;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    aspect-ratio: 4/3;
}
.team-photo-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: saturate(0.85) sepia(0.1);
}
.team-photo-wrap::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(45,106,0,0.45) 0%, transparent 60%);
}
.team-copy h3 {
    font-size: clamp(1.3rem, 2.5vw, 1.9rem);
    font-weight: 700;
    margin-bottom: var(--space-lg);
    text-wrap: balance;
}
.team-copy p {
    font-size: 1rem;
    opacity: 0.85;
    line-height: 1.75;
    margin-bottom: var(--space-lg);
    max-width: 50ch;
}
.cert-badges {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-md);
    margin-top: var(--space-xl);
}
.cert-badge {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(108,194,0,0.3);
    border-radius: var(--radius-md);
    padding: var(--space-sm) var(--space-md);
    font-size: 0.82rem;
    color: rgba(255,255,255,0.9);
}
.cert-badge i { color: var(--color-accent); flex-shrink: 0; }

/* ── Responsive ──────────────────────────────────────────────────────── */
@media (max-width: 1023px) {
    .values-grid { grid-template-columns: 1fr 1fr; }
    .story-split { grid-template-columns: 1fr; }
    .team-photo-block { grid-template-columns: 1fr; }
    .story-img-stack { max-width: 480px; margin: 0 auto; }
}
@media (max-width: 767px) {
    .page-hero { min-height: 60vh; }
    .values-grid { grid-template-columns: 1fr 1fr; }
    .timeline::before { display: none; }
    .timeline-item {
        grid-template-columns: 1fr;
        gap: var(--space-md);
    }
    .timeline-item:nth-child(odd) .timeline-card,
    .timeline-item:nth-child(even) .timeline-card {
        grid-column: 1;
        text-align: left;
        border-left: 4px solid var(--color-accent);
        border-right: none;
    }
    .timeline-item:nth-child(odd) .timeline-spacer,
    .timeline-item:nth-child(even) .timeline-spacer { display: none; }
    .timeline-item:nth-child(odd) .timeline-empty,
    .timeline-item:nth-child(even) .timeline-empty { display: none; }
    .story-img-badge { right: 0; bottom: -24px; }
}
@media (max-width: 480px) {
    .values-grid { grid-template-columns: 1fr; }
}

</style>

<!-- ════════════════════════════════════════════════════════════
     PAGE HERO
     ════════════════════════════════════════════════════════════ -->
<section class="page-hero" aria-label="About hero">
    <div class="noise" aria-hidden="true"></div>
    <div class="page-hero-content">
        <div class="container">
            <nav class="breadcrumb" aria-label="Breadcrumb">
                <a href="/">Home</a>
                <span class="breadcrumb-sep" aria-hidden="true">/</span>
                <span aria-current="page">About</span>
            </nav>
            <h1 data-animate="fade-up">
                <span>26 Years of Tree Care</span>
                Rooted in Watertown
            </h1>
            <p style="font-size:1.15rem; opacity:0.9; max-width:55ch; line-height:1.6;" class="prose" data-animate="fade-up">
                BBD Tree Service isn't a franchise or an out-of-state crew. We're a Watertown company — built here, staffed here, and held accountable to the neighborhoods we've worked in for over two decades.
            </p>
            <div style="display:flex; gap:var(--space-xl); flex-wrap:wrap; align-items:center;" data-animate="fade-up">
                <a href="/contact" class="btn-primary magnetic">Request a Free Estimate</a>
                <a href="/services" style="color:rgba(255,255,255,0.85); font-weight:600; text-decoration:underline; text-underline-offset:3px;">View All Services →</a>
            </div>
        </div>
    </div>
</section>

<!-- Ticker -->
<div class="ticker-strip" aria-hidden="true">
    <div class="ticker-track">
        <div class="ticker-content">
            <span>Founded in Watertown, MA</span><span class="sep">✦</span>
            <span>Licensed &amp; Insured</span><span class="sep">✦</span>
            <span>26 Years Experience</span><span class="sep">✦</span>
            <span>Serving Greater Boston</span><span class="sep">✦</span>
            <span>Free On-Site Estimates</span><span class="sep">✦</span>
            <span>Residential &amp; Commercial</span><span class="sep">✦</span>
            <span>4.9★ Customer Rating</span><span class="sep">✦</span>
        </div>
        <div class="ticker-content" aria-hidden="true">
            <span>Founded in Watertown, MA</span><span class="sep">✦</span>
            <span>Licensed &amp; Insured</span><span class="sep">✦</span>
            <span>26 Years Experience</span><span class="sep">✦</span>
            <span>Serving Greater Boston</span><span class="sep">✦</span>
            <span>Free On-Site Estimates</span><span class="sep">✦</span>
            <span>Residential &amp; Commercial</span><span class="sep">✦</span>
            <span>4.9★ Customer Rating</span><span class="sep">✦</span>
        </div>
    </div>
</div>

<!-- ════════════════════════════════════════════════════════════
     COMPANY STORY
     ════════════════════════════════════════════════════════════ -->
<section class="story-section" aria-label="Our story">
    <div class="container">
        <div class="story-split">
            <div class="story-img-stack img-reveal" data-animate="wipe-right">
                <div class="story-img-main">
                    <picture>
                        <source srcset="<?= $siteImages['staff'] ?>" type="image/webp">
                        <img src="<?= $siteImages['staff'] ?>"
                             alt="BBD Tree Service crew in Watertown MA — licensed arborist team"
                             width="600" height="750" loading="lazy">
                    </picture>
                </div>
                <div class="story-img-badge">
                    <span class="badge-num">26</span>
                    <span class="badge-label">Years Serving<br>Watertown, MA</span>
                </div>
            </div>

            <div class="story-text" data-animate="fade-up">
                <span class="eyebrow">Our Story</span>
                <h2>Built on Referrals, Not Advertising</h2>
                <p class="prose">BBD Tree Service got its start in Watertown in 2000, taking on residential removals and trims for homeowners who needed someone they could trust in their yards. No subcontractors, no crews that rotate in and out — just consistent, accountable work that spread through neighborhoods one job at a time.</p>
                <p class="prose">Over 26 years that approach has stayed the same. We still show up in person for every estimate, we still do the work ourselves, and we still answer the phone when something comes up. The business grew because the results did the talking — and we intend to keep it that way.</p>
                <p class="prose">Today BBD serves over 10 communities across Greater Boston, handling everything from single-tree removals to multi-property commercial contracts. The same standards that built this company in Watertown apply to every job, every time.</p>
                <a href="/services" class="btn-primary" style="margin-top: var(--space-md);">See What We Do</a>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     VALUES GRID
     ════════════════════════════════════════════════════════════ -->
<section class="values-section" aria-label="Our values">
    <div class="container">
        <div class="section-header" data-animate="fade-up">
            <span class="eyebrow">What We Stand For</span>
            <h2>Four Principles That Run Every Job</h2>
        </div>
        <div class="values-grid">
            <div class="value-card" data-animate="fade-up">
                <div class="value-icon" aria-hidden="true">
                    <i data-lucide="shield-check" width="26" height="26"></i>
                </div>
                <h3>Safety First</h3>
                <p class="prose">Every removal, trim, and stump job is planned around what's safest for your property, your neighbors, and our crew. We don't rush a setup to hit a schedule.</p>
            </div>
            <div class="value-card" data-animate="fade-up">
                <div class="value-icon" aria-hidden="true">
                    <i data-lucide="eye" width="26" height="26"></i>
                </div>
                <h3>Transparent Pricing</h3>
                <p class="prose">You get a written estimate before a single branch is touched. The price we quote is the price you pay — no fuel surcharges, no cleanup upcharges, no surprises on the invoice.</p>
            </div>
            <div class="value-card" data-animate="fade-up">
                <div class="value-icon" aria-hidden="true">
                    <i data-lucide="users" width="26" height="26"></i>
                </div>
                <h3>Direct Accountability</h3>
                <p class="prose">No subcontracting. The crew that shows up on day one is the crew that finishes the job. When you call with a question, you reach someone who was actually there.</p>
            </div>
            <div class="value-card" data-animate="fade-up">
                <div class="value-icon" aria-hidden="true">
                    <i data-lucide="leaf" width="26" height="26"></i>
                </div>
                <h3>Leave It Clean</h3>
                <p class="prose">Debris, wood chips, and limbs leave with us. We rake, blow, and inspect before packing up. Your lawn should look better after we leave than when we arrived.</p>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     CTA BANNER (MID-PAGE)
     ════════════════════════════════════════════════════════════ -->
<section class="cta-banner-about" aria-label="Get an estimate">
    <div class="container">
        <h2 data-animate="fade-up">Work With a Company That's Been in Your Neighborhood for 26 Years</h2>
        <p class="prose-centered" data-animate="fade-up">Free on-site estimates. No pressure, no upselling. Just a clear look at what your trees need and what it will cost to get it done.</p>
        <div class="cta-actions" data-animate="fade-up">
            <a href="/contact" class="btn-primary">Book a Free Estimate</a>
            <?php if ($phone): ?>
            <a href="tel:<?= preg_replace('/\D/', '', $phone) ?>" class="cta-phone-lg">
                <i data-lucide="phone-call" aria-hidden="true"></i>
                <?= formatPhone($phone) ?>
            </a>
            <?php else: ?>
            <span class="cta-phone-lg"><i data-lucide="phone-call" aria-hidden="true"></i> Call for Same-Day Response</span>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     MILESTONE TIMELINE (SIGNATURE SECTION)
     ════════════════════════════════════════════════════════════ -->
<section class="timeline-section" aria-label="Company milestones">
    <div class="container">
        <div class="section-header" data-animate="fade-up">
            <span class="eyebrow">Our History</span>
            <h2>26 Years of Growth in Greater Boston</h2>
        </div>

        <div class="timeline" role="list">
            <div class="timeline-item" role="listitem" data-animate="fade-up">
                <div class="timeline-card">
                    <span class="timeline-year">2000</span>
                    <h3>BBD Tree Service Is Founded</h3>
                    <p>Started with a single crew handling residential removals and trims in Watertown. Word spread through the neighborhood — no advertising needed in year one.</p>
                </div>
                <div class="timeline-spacer"><div class="timeline-node"><i data-lucide="tree" width="20" height="20" aria-hidden="true"></i></div></div>
                <div class="timeline-empty" aria-hidden="true"></div>
            </div>

            <div class="timeline-item" role="listitem" data-animate="fade-up">
                <div class="timeline-empty" aria-hidden="true"></div>
                <div class="timeline-spacer"><div class="timeline-node"><i data-lucide="map-pin" width="20" height="20" aria-hidden="true"></i></div></div>
                <div class="timeline-card">
                    <span class="timeline-year">2005</span>
                    <h3>Expanded into Cambridge &amp; Newton</h3>
                    <p>Growing referral demand pushed our service area west and east. We added stump grinding to our core offerings and took on our first multi-property clients.</p>
                </div>
            </div>

            <div class="timeline-item" role="listitem" data-animate="fade-up">
                <div class="timeline-card">
                    <span class="timeline-year">2010</span>
                    <h3>Commercial Division Launched</h3>
                    <p>Property managers and municipalities began calling for reliable commercial tree contracts. BBD launched a dedicated commercial service track with COI documentation and flexible scheduling.</p>
                </div>
                <div class="timeline-spacer"><div class="timeline-node"><i data-lucide="building-2" width="20" height="20" aria-hidden="true"></i></div></div>
                <div class="timeline-empty" aria-hidden="true"></div>
            </div>

            <div class="timeline-item" role="listitem" data-animate="fade-up">
                <div class="timeline-empty" aria-hidden="true"></div>
                <div class="timeline-spacer"><div class="timeline-node"><i data-lucide="zap" width="20" height="20" aria-hidden="true"></i></div></div>
                <div class="timeline-card">
                    <span class="timeline-year">2011</span>
                    <h3>Storm Season — Rapid-Response Teams</h3>
                    <p>Multiple Nor'easters in succession pushed us to build a formal emergency response protocol. We served hundreds of homes across Greater Boston in back-to-back storm seasons.</p>
                </div>
            </div>

            <div class="timeline-item" role="listitem" data-animate="fade-up">
                <div class="timeline-card">
                    <span class="timeline-year">2018</span>
                    <h3>Full-Service Tree Care Programs</h3>
                    <p>Added seasonal health assessments, disease treatment, and annual maintenance programs for residential and commercial clients who wanted a long-term relationship with their arborist team.</p>
                </div>
                <div class="timeline-spacer"><div class="timeline-node"><i data-lucide="heart" width="20" height="20" aria-hidden="true"></i></div></div>
                <div class="timeline-empty" aria-hidden="true"></div>
            </div>

            <div class="timeline-item" role="listitem" data-animate="fade-up">
                <div class="timeline-empty" aria-hidden="true"></div>
                <div class="timeline-spacer"><div class="timeline-node"><i data-lucide="star" width="20" height="20" aria-hidden="true"></i></div></div>
                <div class="timeline-card">
                    <span class="timeline-year">2026</span>
                    <h3>26 Years &amp; Still Growing</h3>
                    <p>Serving 10+ communities across Greater Boston, BBD Tree Service continues to run every job the same way it started — show up, do it right, leave it clean.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     TEAM / CERTIFICATIONS
     ════════════════════════════════════════════════════════════ -->
<section class="team-section" aria-label="Our team">
    <div class="container">
        <div class="section-header" data-animate="fade-up">
            <span class="eyebrow">The Team</span>
            <h2>Trained, Licensed, and Accountable</h2>
        </div>
        <div class="team-photo-block">
            <div class="team-photo-wrap img-reveal" data-animate="wipe-right">
                <picture>
                    <source srcset="<?= $siteImages['trimmed2'] ?>" type="image/webp">
                    <img src="<?= $siteImages['trimmed2'] ?>"
                         alt="BBD Tree Service arborist team performing tree trimming in Watertown MA"
                         width="700" height="525" loading="lazy">
                </picture>
            </div>
            <div class="team-copy" data-animate="fade-up">
                <h3>Every Crew Member Is Trained In-House</h3>
                <p class="prose">BBD doesn't hire seasonal day crews or outsource jobs to whoever's available. Every person who works on your property has been trained directly by our senior arborists — on technique, on safety, and on how we expect a job site to look when we leave.</p>
                <p class="prose">That consistency is why clients in Watertown, Newton, Cambridge, and across Greater Boston keep calling us back year after year. You're not getting a different company — you're getting the same accountable team.</p>
                <div class="cert-badges">
                    <div class="cert-badge">
                        <i data-lucide="shield" width="16" height="16" aria-hidden="true"></i>
                        <span>Massachusetts Licensed</span>
                    </div>
                    <div class="cert-badge">
                        <i data-lucide="shield" width="16" height="16" aria-hidden="true"></i>
                        <span>Fully Insured</span>
                    </div>
                    <div class="cert-badge">
                        <i data-lucide="award" width="16" height="16" aria-hidden="true"></i>
                        <span>General Liability Coverage</span>
                    </div>
                    <div class="cert-badge">
                        <i data-lucide="award" width="16" height="16" aria-hidden="true"></i>
                        <span>Workers' Compensation</span>
                    </div>
                    <div class="cert-badge">
                        <i data-lucide="clipboard-check" width="16" height="16" aria-hidden="true"></i>
                        <span>COI Available on Request</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     CLOSING CTA
     ════════════════════════════════════════════════════════════ -->
<section style="padding: var(--section-pad); background: var(--color-bg); text-align:center;" aria-label="Contact CTA">
    <div class="container">
        <p style="font-size:0.8rem; text-transform:uppercase; letter-spacing:0.12em; color:var(--color-primary); font-weight:700; margin-bottom:var(--space-md);" data-animate="fade-up">Let's Talk</p>
        <h2 style="font-size:clamp(1.8rem,4vw,2.8rem); font-weight:800; color:var(--color-text); margin-bottom:var(--space-md); text-wrap:balance;" data-animate="fade-up">Ready to Schedule Your Free Estimate?</h2>
        <p style="font-size:1.05rem; color:var(--color-text-light); max-width:52ch; margin:0 auto var(--space-2xl); line-height:1.6;" data-animate="fade-up">Call or submit a request and one of our team members will be in touch same day. We assess every project in person — no guesses, no generic quotes.</p>
        <div style="display:flex; align-items:center; justify-content:center; gap:var(--space-xl); flex-wrap:wrap;" data-animate="fade-up">
            <a href="/contact" class="btn-primary">Contact BBD Tree Service</a>
            <a href="/services" class="btn-secondary">Browse All Services</a>
        </div>
    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
