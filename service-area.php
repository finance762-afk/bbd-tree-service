<?php
/**
 * BBD Tree Service — Service Area
 * Phase 4: service-area.php
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

// ─── Page Meta ────────────────────────────────────────────────────────────────
$pageTitle       = "Tree Service Watertown MA & Greater Boston | BBD Tree Service";
$pageDescription = "BBD Tree Service provides tree removal, trimming & stump grinding in Watertown, Cambridge, Newton, Waltham, Belmont, Arlington, Lexington & surrounding MA communities.";
$pageKeywords    = "tree service watertown ma, tree service cambridge ma, tree service newton ma, tree service waltham ma, tree service belmont ma, arborist greater boston, tree removal near me watertown";
$canonicalUrl    = $siteUrl . '/service-area';
$ogImage         = $siteImages['hero'];
$heroImage       = $siteImages['branches4'];
$currentPage     = 'service-area';

$breadcrumbSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $siteUrl],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Service Area', 'item' => $siteUrl . '/service-area'],
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

// Local area-specific content
$areaContent = [
    'Watertown' => [
        'desc' => 'BBD Tree Service is based in Watertown and has served homeowners and businesses here since 2000. From the older maples and oaks along Coolidge Hill Rd to the tree-lined streets near Victory Field, we know this city\'s canopy inside and out.',
        'note' => 'Same-day estimates available for Watertown addresses.',
        'img'  => 'hero',
    ],
    'Cambridge' => [
        'desc' => 'Cambridge\'s dense urban tree canopy — particularly around Harvard Square, Fresh Pond Reservation, and East Cambridge — requires experienced crews who understand tight lot lines and proximity to structures. BBD serves the full city.',
        'note' => 'COI documentation available for Cambridge property managers.',
        'img'  => 'trimmed1',
    ],
    'Newton' => [
        'desc' => 'Newton\'s sprawling residential lots often mean large, mature trees near homes and utilities. BBD handles everything from full removal of aging oaks near the Upper Falls neighborhood to routine trimming in Newton Centre.',
        'note' => 'Multi-tree discounts available for Newton properties.',
        'img'  => 'branches1',
    ],
    'Waltham' => [
        'desc' => 'Waltham\'s mix of older residential stock and commercial corridors means tree care needs range from hazard removal near the Moody Street district to brush clearing on larger suburban lots. BBD covers the full city.',
        'note' => 'Commercial and residential service available throughout Waltham.',
        'img'  => 'photo2',
    ],
    'Belmont' => [
        'desc' => 'Belmont\'s established neighborhoods and hillside properties around Belmont Hill are known for mature canopies. BBD provides careful removal and trimming work that protects both the landscape and the structures nearby.',
        'note' => 'Storm response and emergency removal available in Belmont.',
        'img'  => 'photo3',
    ],
    'Arlington' => [
        'desc' => 'Tree removal near Arlington\'s power lines and historic District requires careful coordination. BBD operates throughout Arlington, including the Heights and the Reservoir neighborhoods, with full knowledge of local overhead utilities.',
        'note' => 'Free on-site estimates for all Arlington addresses.',
        'img'  => 'photo4',
    ],
    'Lexington' => [
        'desc' => 'Lexington\'s expansive wooded lots and well-maintained residential properties make it a strong fit for BBD\'s full range of services — from large oak removal to seasonal hedge trimming and annual tree care programs.',
        'note' => 'Annual maintenance programs available for Lexington homeowners.',
        'img'  => 'photo5',
    ],
    'Weston' => [
        'desc' => 'Weston\'s large parcels and heavily wooded private properties often require significant tree work after storm seasons. BBD\'s crew handles multi-tree removal jobs and full lot clearing for Weston homeowners and estates.',
        'note' => 'Lot clearing and multi-tree removal available in Weston.',
        'img'  => 'branches3',
    ],
    'Brookline' => [
        'desc' => 'Brookline\'s urban density and high-value residential neighborhoods near Coolidge Corner and Fisher Hill demand precision tree work. BBD\'s crew is experienced with tight-access lots and historic property considerations.',
        'note' => 'Residential and commercial service throughout Brookline.',
        'img'  => 'photo6',
    ],
    'Somerville' => [
        'desc' => 'Somerville\'s fast-changing urban landscape still has significant street trees and residential green space. BBD provides tree trimming, removal, and stump grinding throughout Somerville including Davis Square and Winter Hill.',
        'note' => 'Fast-response service available for Somerville properties.',
        'img'  => 'branches2',
    ],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<body>

<script type="application/ld+json"><?= $breadcrumbSchema ?></script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ============================================================
     SERVICE AREA — PAGE STYLES
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
    background: linear-gradient(135deg, rgba(45,106,0,0.84) 0%, rgba(28,72,0,0.72) 100%);
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
.hero-area-tags {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-sm);
}
.area-tag {
    background: rgba(255,255,255,0.15);
    border: 1px solid rgba(255,255,255,0.25);
    color: white;
    font-size: 0.78rem;
    font-weight: 600;
    padding: 4px 12px;
    border-radius: 999px;
    backdrop-filter: blur(4px);
}

/* ── Area Intro Section ──────────────────────────────────────────────── */
.area-intro-section {
    padding: var(--section-pad);
    background: var(--color-bg);
}
.area-intro-inner {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-4xl);
    align-items: center;
}
.area-intro-text .eyebrow {
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
.area-intro-text h2 {
    font-size: clamp(1.8rem, 4vw, 2.6rem);
    font-weight: 800;
    letter-spacing: -0.02em;
    color: var(--color-text);
    margin-bottom: var(--space-lg);
    text-wrap: balance;
}
.area-intro-text p {
    font-size: 1rem;
    color: var(--color-text-light);
    line-height: 1.75;
    margin-bottom: var(--space-lg);
    max-width: 54ch;
}
.area-intro-img {
    position: relative;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    aspect-ratio: 4/3;
}
.area-intro-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.area-intro-img::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(28,72,0,0.35) 0%, transparent 60%);
}
.area-radius-badge {
    position: absolute;
    bottom: var(--space-xl);
    right: var(--space-xl);
    background: var(--color-accent);
    color: var(--color-primary-dark);
    padding: var(--space-md) var(--space-lg);
    border-radius: var(--radius-md);
    font-family: var(--font-heading);
    font-size: 0.95rem;
    font-weight: 800;
    z-index: 2;
    box-shadow: var(--shadow-md);
    text-align: center;
}

/* ── Answer Block ────────────────────────────────────────────────────── */
.answer-block-wrap {
    padding: var(--section-pad);
    background: var(--color-bg-alt);
}
.answer-block {
    background: white;
    border-left: 4px solid var(--color-accent);
    border-radius: 0 var(--radius-md) var(--radius-md) 0;
    padding: var(--space-xl) var(--space-2xl);
    margin-bottom: var(--space-xl);
    box-shadow: var(--shadow-sm);
}
.answer-block:last-child { margin-bottom: 0; }
.answer-block h2 {
    font-size: clamp(1.1rem, 2.5vw, 1.35rem);
    font-weight: 700;
    color: var(--color-text);
    margin-bottom: var(--space-sm);
    letter-spacing: -0.01em;
}
.answer-block p {
    font-size: 0.95rem;
    color: var(--color-text-light);
    line-height: 1.7;
    max-width: 70ch;
}

/* ── Area Cards Grid ─────────────────────────────────────────────────── */
.areas-grid-section {
    padding: var(--section-pad);
    background: var(--color-bg);
}
.areas-grid-section .section-header {
    text-align: center;
    margin-bottom: var(--space-3xl);
}
.areas-grid-section .eyebrow {
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
.areas-grid-section h2 {
    font-size: clamp(1.8rem, 4vw, 2.8rem);
    font-weight: 800;
    letter-spacing: -0.02em;
    color: var(--color-text);
    text-wrap: balance;
}
.areas-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-xl);
}
.area-card {
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    border: 1px solid rgba(45,106,0,0.07);
    transition: transform var(--transition), box-shadow var(--transition);
}
.area-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
}
.area-card-img {
    position: relative;
    aspect-ratio: 16/7;
    overflow: hidden;
}
.area-card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.area-card:hover .area-card-img img {
    transform: scale(1.05);
}
.area-card-img-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(28,72,0,0.6) 0%, transparent 55%);
}
.area-card-city-label {
    position: absolute;
    bottom: var(--space-md);
    left: var(--space-md);
    font-family: var(--font-heading);
    font-size: 1.2rem;
    font-weight: 800;
    color: white;
    z-index: 2;
}
.area-card-body {
    padding: var(--space-xl);
    display: flex;
    flex-direction: column;
    gap: var(--space-md);
    flex: 1;
}
.area-card-body p {
    font-size: 0.9rem;
    color: var(--color-text-light);
    line-height: 1.65;
    flex: 1;
}
.area-card-note {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    font-size: 0.8rem;
    color: var(--color-primary);
    font-weight: 600;
    padding-top: var(--space-sm);
    border-top: 1px solid var(--color-bg-alt);
}
.primary-badge {
    display: inline-block;
    background: var(--color-accent);
    color: var(--color-primary-dark);
    font-size: 0.65rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    padding: 3px 8px;
    border-radius: 999px;
    margin-left: var(--space-sm);
}

/* ── Map Section ─────────────────────────────────────────────────────── */
.map-section {
    padding: var(--section-pad);
    background: var(--color-bg-alt);
    clip-path: polygon(0 5%, 100% 0, 100% 95%, 0 100%);
    margin: var(--space-2xl) 0;
}
.map-section .container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-3xl);
    align-items: center;
}
.map-frame {
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
    aspect-ratio: 4/3;
    position: relative;
}
.map-frame iframe {
    width: 100%;
    height: 100%;
    border: 0;
    position: absolute;
    inset: 0;
}
.map-copy .eyebrow {
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
.map-copy h2 {
    font-size: clamp(1.5rem, 3vw, 2.2rem);
    font-weight: 800;
    color: var(--color-text);
    margin-bottom: var(--space-lg);
    text-wrap: balance;
}
.map-copy p {
    font-size: 0.95rem;
    color: var(--color-text-light);
    line-height: 1.7;
    margin-bottom: var(--space-lg);
    max-width: 50ch;
}
.area-list-compact {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-sm);
    margin-bottom: var(--space-xl);
}
.area-list-compact li {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    font-size: 0.88rem;
    color: var(--color-text);
    font-weight: 500;
}
.area-list-compact li::before {
    content: '';
    width: 8px;
    height: 8px;
    background: var(--color-accent);
    border-radius: 50%;
    flex-shrink: 0;
}

/* ── Responsive ──────────────────────────────────────────────────────── */
@media (max-width: 1023px) {
    .area-intro-inner { grid-template-columns: 1fr; }
    .areas-grid { grid-template-columns: 1fr 1fr; }
    .map-section .container { grid-template-columns: 1fr; }
}
@media (max-width: 767px) {
    .page-hero { min-height: 60vh; }
    .areas-grid { grid-template-columns: 1fr; }
    .map-section { clip-path: none; }
    .area-list-compact { grid-template-columns: 1fr; }
}

</style>

<!-- ════════════════════════════════════════════════════════════
     PAGE HERO
     ════════════════════════════════════════════════════════════ -->
<section class="page-hero" aria-label="Service area hero">
    <div class="noise" aria-hidden="true"></div>
    <div class="page-hero-content">
        <div class="container">
            <nav class="breadcrumb" aria-label="Breadcrumb">
                <a href="/">Home</a>
                <span class="breadcrumb-sep" aria-hidden="true">/</span>
                <span aria-current="page">Service Area</span>
            </nav>
            <h1 data-animate="fade-up">
                <span>Tree Service in Watertown &amp;</span>
                Surrounding Communities
            </h1>
            <p style="font-size:1.1rem; opacity:0.9; max-width:55ch; line-height:1.6;" class="prose" data-animate="fade-up">
                BBD Tree Service covers a 15-mile radius from our Watertown base, reaching 10+ Greater Boston communities. Call for same-day estimates anywhere in our service area.
            </p>
            <div class="hero-area-tags" data-animate="fade-up" role="list" aria-label="Service area towns">
                <?php foreach ($serviceAreas as $area): ?>
                <span class="area-tag" role="listitem"><?= $area['city'] ?></span>
                <?php endforeach; ?>
            </div>
            <div style="display:flex; gap:var(--space-xl); flex-wrap:wrap; align-items:center;" data-animate="fade-up">
                <a href="/contact" class="btn-primary magnetic">Get a Free Estimate Near Me</a>
            </div>
        </div>
    </div>
</section>

<!-- Ticker -->
<div class="ticker-strip" aria-hidden="true">
    <div class="ticker-track">
        <div class="ticker-content">
            <span>15-Mile Radius from Watertown</span><span class="sep">✦</span>
            <span>10+ Communities Served</span><span class="sep">✦</span>
            <span>Free On-Site Estimates</span><span class="sep">✦</span>
            <span>Same-Day Availability</span><span class="sep">✦</span>
            <span>Licensed &amp; Insured MA</span><span class="sep">✦</span>
            <span>Emergency Response 24/7</span><span class="sep">✦</span>
        </div>
        <div class="ticker-content" aria-hidden="true">
            <span>15-Mile Radius from Watertown</span><span class="sep">✦</span>
            <span>10+ Communities Served</span><span class="sep">✦</span>
            <span>Free On-Site Estimates</span><span class="sep">✦</span>
            <span>Same-Day Availability</span><span class="sep">✦</span>
            <span>Licensed &amp; Insured MA</span><span class="sep">✦</span>
            <span>Emergency Response 24/7</span><span class="sep">✦</span>
        </div>
    </div>
</div>

<!-- ════════════════════════════════════════════════════════════
     AREA INTRO (SPLIT)
     ════════════════════════════════════════════════════════════ -->
<section class="area-intro-section" aria-label="Service area overview">
    <div class="container">
        <div class="area-intro-inner">
            <div class="area-intro-text" data-animate="fade-up">
                <span class="eyebrow">Where We Work</span>
                <h2>Greater Boston Tree Care — Local Knowledge, Consistent Standards</h2>
                <p class="prose">Most tree companies either operate out of a distant suburb or rotate through whatever crew is available that day. BBD Tree Service is different — we're based in Watertown, and the same team that worked your neighbor's yard last fall is the team that'll show up for your estimate.</p>
                <p class="prose">That local consistency matters when you're dealing with mature Greater Boston trees — the old oaks and maples near power lines, the Norway spruces in tight suburban lots, the street trees that require coordination with town public works. We know these neighborhoods and we know these trees.</p>
                <a href="/contact" class="btn-primary">Get a Free Estimate Near You</a>
            </div>
            <div class="area-intro-img img-reveal" data-animate="wipe-right">
                <picture>
                    <source srcset="<?= $siteImages['trimmed2'] ?>" type="image/webp">
                    <img alt="BBD Tree Service crew working near Watertown MA — serving Greater Boston communities"
                         src="<?= $siteImages['trimmed2'] ?>"
                         width="700" height="525" loading="lazy">
                </picture>
                <div class="area-radius-badge">15-Mile<br>Service Radius</div>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     ANSWER BLOCKS
     ════════════════════════════════════════════════════════════ -->
<section class="answer-block-wrap" aria-label="Common questions about service area">
    <div class="container">
        <div class="answer-block" data-animate="fade-up">
            <h2>How far does BBD Tree Service travel for tree work near me?</h2>
            <p>BBD Tree Service works within a 15-mile radius of Watertown, MA, covering Cambridge, Newton, Waltham, Belmont, Arlington, Lexington, Weston, Brookline, Somerville, and the surrounding communities. If you're outside that range, call us — we may still be able to help depending on the scope of work.</p>
        </div>
        <div class="answer-block" data-animate="fade-up">
            <h2>Does BBD Tree Service charge a travel fee for towns outside Watertown?</h2>
            <p>No. BBD Tree Service does not charge separate travel fees for communities within our service area. The estimate you receive covers the full job — travel, labor, equipment, and cleanup — with no hidden line items.</p>
        </div>
        <div class="answer-block" data-animate="fade-up">
            <h2>Can you handle emergency tree removal in Cambridge or Newton same-day?</h2>
            <p>Yes. BBD Tree Service responds to urgent tree situations across all communities in our service area, including Cambridge, Newton, and Brookline. Storm damage, split trunks, or fallen limbs blocking driveways are prioritized — call directly for fastest response.</p>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     CTA BANNER (MID-PAGE)
     ════════════════════════════════════════════════════════════ -->
<section style="padding:var(--section-pad); background:linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); position:relative; overflow:hidden; text-align:center;" aria-label="Mid-page CTA">
    <div style="position:absolute;inset:0;background-image:url(\"data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='1'/%3E%3C/svg%3E\");opacity:0.06;" aria-hidden="true"></div>
    <div class="container" style="position:relative;z-index:2;">
        <h2 style="font-size:clamp(1.8rem,4vw,2.8rem);font-weight:800;color:white;margin-bottom:var(--space-md);text-wrap:balance;" data-animate="fade-up">In Our Service Area? Get a Free Estimate This Week</h2>
        <p style="font-size:1.05rem;color:rgba(255,255,255,0.85);max-width:56ch;margin:0 auto var(--space-2xl);line-height:1.6;" data-animate="fade-up">BBD Tree Service schedules free on-site estimates across all 10+ communities we serve. Same-day response, no obligation.</p>
        <div style="display:flex;align-items:center;justify-content:center;gap:var(--space-xl);flex-wrap:wrap;" data-animate="fade-up">
            <a href="/contact" class="btn-primary" style="background:var(--color-accent);color:var(--color-primary-dark);">Request My Free Estimate</a>
            <?php if ($phone): ?>
            <a href="tel:<?= preg_replace('/\D/', '', $phone) ?>" style="color:white;font-size:1.3rem;font-weight:800;display:flex;align-items:center;gap:var(--space-sm);">
                <i data-lucide="phone" aria-hidden="true"></i> <?= formatPhone($phone) ?>
            </a>
            <?php else: ?>
            <span style="color:var(--color-accent);font-size:1.3rem;font-weight:800;display:flex;align-items:center;gap:var(--space-sm);">
                <i data-lucide="phone" aria-hidden="true"></i> Call for a Free Quote
            </span>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     AREA CARDS GRID
     ════════════════════════════════════════════════════════════ -->
<section class="areas-grid-section" aria-label="All service areas">
    <div class="container">
        <div class="section-header" data-animate="fade-up">
            <span class="eyebrow">All Locations</span>
            <h2>Communities We Serve</h2>
        </div>
        <div class="areas-grid">
            <?php foreach ($serviceAreas as $area):
                $city = $area['city'];
                $content = $areaContent[$city] ?? ['desc' => 'BBD Tree Service provides professional tree removal, trimming, and stump grinding in ' . $city . ', MA.', 'note' => 'Free estimates available.', 'img' => 'hero'];
                $img = $siteImages[$content['img']] ?? $siteImages['hero'];
            ?>
            <article class="area-card" data-animate="fade-up">
                <div class="area-card-img">
                    <picture>
                        <source srcset="<?= $img ?>" type="image/webp">
                        <img alt="Tree service in <?= htmlspecialchars($city) ?>, MA — BBD Tree Service"
                             src="<?= $img ?>"
                             width="560" height="245" loading="lazy">
                    </picture>
                    <div class="area-card-img-overlay" aria-hidden="true"></div>
                    <div class="area-card-city-label">
                        <?= htmlspecialchars($city) ?>, MA
                        <?php if ($area['primary']): ?><span class="primary-badge">Home Base</span><?php endif; ?>
                    </div>
                </div>
                <div class="area-card-body">
                    <p class="prose"><?= $content['desc'] ?></p>
                    <div class="area-card-note">
                        <i data-lucide="check-circle" width="14" height="14" aria-hidden="true"></i>
                        <?= $content['note'] ?>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     MAP + AREA LIST
     ════════════════════════════════════════════════════════════ -->
<section class="map-section" aria-label="Service area map">
    <div class="container">
        <div class="map-frame img-reveal" data-animate="wipe-right">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d95392.07837697987!2d-71.23626968234862!3d42.37124999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e377fac48fdb99%3A0x0!2sWatertown%2C%20MA!5e0!3m2!1sen!2sus!4v1680000000000!5m2!1sen!2sus"
                title="BBD Tree Service coverage map — Watertown MA and surrounding communities"
                loading="lazy"
                allowfullscreen
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
        </div>
        <div class="map-copy" data-animate="fade-up">
            <span class="eyebrow">Our Coverage</span>
            <h2>15-Mile Radius from Watertown, MA</h2>
            <p class="prose">Every community within our service area gets the same crew, the same standards, and the same free on-site estimate. No tiered pricing based on distance — you pay for the job, not the drive.</p>
            <ul class="area-list-compact" role="list">
                <?php foreach ($serviceAreas as $area): ?>
                <li><?= $area['city'] ?>, <?= $area['state'] ?></li>
                <?php endforeach; ?>
            </ul>
            <a href="/contact" class="btn-primary">Book My Free Estimate</a>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     CLOSING CTA
     ════════════════════════════════════════════════════════════ -->
<section style="padding:var(--section-pad);background:var(--color-bg-dark);color:white;text-align:center;" aria-label="Closing CTA">
    <div class="container">
        <p style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.12em;color:var(--color-accent);font-weight:700;margin-bottom:var(--space-md);" data-animate="fade-up">26 Years. 10+ Towns. One Standard.</p>
        <h2 style="font-size:clamp(1.8rem,4vw,2.8rem);font-weight:800;margin-bottom:var(--space-md);text-wrap:balance;" data-animate="fade-up">Your Trees Are in Our Service Area — Let's Talk</h2>
        <p style="font-size:1.05rem;opacity:0.8;max-width:52ch;margin:0 auto var(--space-2xl);line-height:1.6;" data-animate="fade-up">Call BBD Tree Service or fill out our contact form. We'll confirm coverage at your address, schedule an on-site estimate, and have a price in your hands before any work begins.</p>
        <div style="display:flex;align-items:center;justify-content:center;gap:var(--space-xl);flex-wrap:wrap;" data-animate="fade-up">
            <a href="/contact" class="btn-primary">Contact BBD Tree Service</a>
            <a href="/services" class="btn-secondary">View All Services</a>
        </div>
    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
