<?php
/**
 * BBD Tree Service — Services Index
 * Phase 4: /services/index.php
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

// ─── Page Meta ────────────────────────────────────────────────────────────────
$pageTitle       = "Tree Services in Watertown MA | BBD Tree Service";
$pageDescription = "Complete tree services in Watertown, MA: removal, trimming, pruning, stump grinding, brush removal & more. 26 years experience. Licensed & insured. Free estimates.";
$pageKeywords    = "tree services watertown ma, tree removal, tree trimming, stump grinding, brush removal, hedge trimming, commercial tree service, residential tree service";
$canonicalUrl    = $siteUrl . '/services';
$ogImage         = $siteImages['trimmed1'];
$heroImage       = $siteImages['trimmed1'];
$currentPage     = 'services';

$breadcrumbSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $siteUrl],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $siteUrl . '/services'],
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<body>

<script type="application/ld+json">
<?= $breadcrumbSchema ?>
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ============================================================
     SERVICES INDEX — PAGE STYLES
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
    background: linear-gradient(135deg, rgba(45,106,0,0.82) 0%, rgba(28,72,0,0.70) 100%);
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
.page-hero-sub {
    font-size: 1.15rem;
    opacity: 0.9;
    max-width: 55ch;
    line-height: 1.6;
}
.breadcrumb {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    font-size: 0.85rem;
    opacity: 0.75;
    color: white;
}
.breadcrumb a {
    color: white;
    text-decoration: underline;
    text-underline-offset: 3px;
}
.breadcrumb-sep { opacity: 0.5; }
.hero-cta-row {
    display: flex;
    align-items: center;
    gap: var(--space-xl);
    flex-wrap: wrap;
}
.hero-phone {
    color: white;
    font-size: 1.2rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    opacity: 0.9;
}

/* ── Services Grid Section ───────────────────────────────────────────── */
.services-intro-section {
    padding: var(--section-pad);
    background: var(--color-bg);
}
.services-intro {
    max-width: 70ch;
    margin: 0 auto var(--space-3xl);
    text-align: center;
}
.services-intro .eyebrow {
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
.services-intro h2 {
    font-size: clamp(1.8rem, 4vw, 2.8rem);
    font-weight: 800;
    letter-spacing: -0.02em;
    color: var(--color-text);
    margin-bottom: var(--space-lg);
}
.services-intro p {
    font-size: 1.05rem;
    color: var(--color-text-light);
    line-height: 1.7;
}

/* ── Service Cards Grid ──────────────────────────────────────────────── */
.services-main-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--space-xl);
}
.service-main-card {
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: transform var(--transition), box-shadow var(--transition);
    border: 1px solid rgba(45,106,0,0.08);
}
.service-main-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-lg);
}
.service-card-img {
    position: relative;
    aspect-ratio: 16/10;
    overflow: hidden;
}
.service-card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.service-main-card:hover .service-card-img img {
    transform: scale(1.06);
}
.service-card-img-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(28,72,0,0.55) 0%, transparent 60%);
}
.service-card-badge {
    position: absolute;
    top: var(--space-md);
    left: var(--space-md);
    background: var(--color-accent);
    color: var(--color-primary-dark);
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    padding: 4px 10px;
    border-radius: 999px;
}
.service-card-body {
    padding: var(--space-xl);
    display: flex;
    flex-direction: column;
    flex: 1;
    gap: var(--space-md);
}
.service-card-icon {
    width: 48px;
    height: 48px;
    background: rgba(45,106,0,0.08);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-primary);
    transition: background var(--transition), color var(--transition), transform var(--transition);
}
.service-main-card:hover .service-card-icon {
    background: var(--color-accent);
    color: var(--color-primary-dark);
    transform: scale(1.1) rotate(-5deg);
}
.service-card-body h3 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--color-text);
    margin: 0;
    transition: color var(--transition);
}
.service-main-card:hover .service-card-body h3 {
    color: var(--color-primary);
}
.service-card-body p {
    font-size: 0.92rem;
    color: var(--color-text-light);
    line-height: 1.65;
    flex: 1;
}
.service-card-link {
    display: inline-flex;
    align-items: center;
    gap: var(--space-sm);
    color: var(--color-primary);
    font-size: 0.88rem;
    font-weight: 600;
    transition: gap var(--transition);
    margin-top: auto;
}
.service-card-link:hover {
    gap: var(--space-md);
    color: var(--color-primary-dark);
}

/* ── Why BBD Strip ───────────────────────────────────────────────────── */
.why-strip {
    padding: var(--section-pad);
    background: var(--color-bg-alt);
    clip-path: polygon(0 0, 100% 5%, 100% 100%, 0 95%);
    margin: var(--space-2xl) 0;
}
.why-strip-inner {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-4xl);
    align-items: center;
}
.why-strip-text .eyebrow {
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
.why-strip-text h2 {
    font-size: clamp(1.8rem, 4vw, 2.6rem);
    font-weight: 800;
    letter-spacing: -0.02em;
    color: var(--color-text);
    margin-bottom: var(--space-lg);
    text-wrap: balance;
}
.why-strip-text p {
    font-size: 1rem;
    color: var(--color-text-light);
    line-height: 1.7;
    margin-bottom: var(--space-xl);
    max-width: 52ch;
}
.why-checklist {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: var(--space-md);
    margin-bottom: var(--space-xl);
}
.why-checklist li {
    display: flex;
    align-items: flex-start;
    gap: var(--space-md);
    font-size: 0.95rem;
    color: var(--color-text);
    line-height: 1.5;
}
.why-checklist li::before {
    content: '';
    flex-shrink: 0;
    width: 20px;
    height: 20px;
    background: var(--color-primary);
    border-radius: 50%;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='20 6 9 17 4 12'/%3E%3C/svg%3E");
    background-size: 12px;
    background-repeat: no-repeat;
    background-position: center;
    margin-top: 2px;
}
.why-strip-stats {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-lg);
}
.stat-box {
    background: white;
    border-radius: var(--radius-md);
    padding: var(--space-xl);
    text-align: center;
    box-shadow: var(--shadow-sm);
    border-bottom: 3px solid var(--color-accent);
}
.stat-box .stat-num {
    font-family: var(--font-heading);
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 800;
    color: var(--color-primary);
    display: block;
    line-height: 1;
    margin-bottom: var(--space-sm);
}
.stat-box .stat-label {
    font-size: 0.82rem;
    color: var(--color-text-light);
    line-height: 1.4;
    text-transform: uppercase;
    letter-spacing: 0.06em;
}

/* ── CTA Banner ──────────────────────────────────────────────────────── */
.cta-banner-services {
    padding: var(--section-pad);
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    position: relative;
    overflow: hidden;
    text-align: center;
}
.cta-banner-services::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='1'/%3E%3C/svg%3E");
    opacity: 0.06;
}
.cta-banner-services .container {
    position: relative;
    z-index: 2;
}
.cta-banner-services h2 {
    font-size: clamp(1.8rem, 4vw, 2.8rem);
    font-weight: 800;
    color: white;
    margin-bottom: var(--space-md);
    text-wrap: balance;
}
.cta-banner-services p {
    font-size: 1.05rem;
    color: rgba(255,255,255,0.85);
    margin-bottom: var(--space-2xl);
    max-width: 56ch;
    margin-inline: auto;
    line-height: 1.6;
}
.cta-banner-services .cta-actions {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-xl);
    flex-wrap: wrap;
}
.cta-banner-services .cta-phone {
    color: var(--color-accent);
    font-size: 1.5rem;
    font-weight: 800;
    display: flex;
    align-items: center;
    gap: var(--space-sm);
}

/* ─── Responsive ─────────────────────────────────────────────────────── */
@media (max-width: 1023px) {
    .services-main-grid { grid-template-columns: 1fr 1fr; }
    .why-strip-inner { grid-template-columns: 1fr; gap: var(--space-3xl); }
}
@media (max-width: 767px) {
    .services-main-grid { grid-template-columns: 1fr; }
    .why-strip-stats { grid-template-columns: 1fr 1fr; }
    .page-hero { min-height: 60vh; }
    .why-strip { clip-path: none; }
}

</style>

<!-- ════════════════════════════════════════════════════════════
     PAGE HERO
     ════════════════════════════════════════════════════════════ -->
<section class="page-hero" aria-label="Services hero">
    <div class="noise" aria-hidden="true"></div>
    <div class="page-hero-content">
        <div class="container">
            <nav class="breadcrumb" aria-label="Breadcrumb">
                <a href="/">Home</a>
                <span class="breadcrumb-sep" aria-hidden="true">/</span>
                <span aria-current="page">Services</span>
            </nav>
            <h1 data-animate="fade-up">
                <span>Tree Services in</span>
                Watertown & Greater Boston
            </h1>
            <p class="page-hero-sub prose" data-animate="fade-up">
                Every service BBD Tree Service provides is backed by 26 years of hands-on arborist experience, full Massachusetts licensing, and a commitment to leaving your property cleaner than we found it.
            </p>
            <div class="hero-cta-row" data-animate="fade-up">
                <a href="/contact" class="btn-primary magnetic">Get a Free Estimate</a>
                <?php if ($phone): ?>
                <a href="tel:<?= preg_replace('/\D/', '', $phone) ?>" class="hero-phone">
                    <i data-lucide="phone" aria-hidden="true"></i>
                    <?= formatPhone($phone) ?>
                </a>
                <?php else: ?>
                <span class="hero-phone">
                    <i data-lucide="phone" aria-hidden="true"></i>
                    Call for a Free Quote
                </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Ticker Strip -->
<div class="ticker-strip" aria-hidden="true">
    <div class="ticker-track">
        <div class="ticker-content">
            <span>Licensed &amp; Insured</span><span class="sep">✦</span>
            <span>26 Years in Watertown</span><span class="sep">✦</span>
            <span>Free Estimates</span><span class="sep">✦</span>
            <span>Serving 10+ Communities</span><span class="sep">✦</span>
            <span>Same-Day Availability</span><span class="sep">✦</span>
            <span>Residential &amp; Commercial</span><span class="sep">✦</span>
            <span>Full Cleanup Included</span><span class="sep">✦</span>
            <span>Emergency Response</span><span class="sep">✦</span>
        </div>
        <div class="ticker-content" aria-hidden="true">
            <span>Licensed &amp; Insured</span><span class="sep">✦</span>
            <span>26 Years in Watertown</span><span class="sep">✦</span>
            <span>Free Estimates</span><span class="sep">✦</span>
            <span>Serving 10+ Communities</span><span class="sep">✦</span>
            <span>Same-Day Availability</span><span class="sep">✦</span>
            <span>Residential &amp; Commercial</span><span class="sep">✦</span>
            <span>Full Cleanup Included</span><span class="sep">✦</span>
            <span>Emergency Response</span><span class="sep">✦</span>
        </div>
    </div>
</div>

<!-- ════════════════════════════════════════════════════════════
     SERVICES GRID
     ════════════════════════════════════════════════════════════ -->
<section class="services-intro-section" aria-label="All services">
    <div class="container">
        <div class="services-intro" data-animate="fade-up">
            <span class="eyebrow">What We Do</span>
            <h2>Complete Tree Care for Every Property</h2>
            <p class="prose-centered">From emergency removals to seasonal hedge maintenance, BBD Tree Service handles every aspect of tree and landscape health in Watertown, MA and the surrounding communities. Each service is performed by our trained arborist team with professional-grade equipment.</p>
        </div>

        <div class="services-main-grid">
            <?php
            $cardImages = [
                $siteImages['hero'],
                $siteImages['trimmed1'],
                $siteImages['branches1'],
                $siteImages['photo2'],
                $siteImages['photo3'],
                $siteImages['photo4'],
                $siteImages['photo5'],
                $siteImages['branches3'],
                $siteImages['photo6'],
                $siteImages['branches2'],
            ];
            foreach ($services as $i => $svc):
                $img = $cardImages[$i] ?? $siteImages['hero'];
            ?>
            <article class="service-main-card" data-animate="fade-up" data-tilt data-tilt-max="5" data-tilt-speed="400" data-tilt-glare data-tilt-max-glare="0.12">
                <div class="service-card-img">
                    <picture>
                        <source srcset="<?= $img ?>" type="image/webp">
                        <img alt="<?= htmlspecialchars($svc['name']) ?> in Watertown MA — BBD Tree Service"
                             src="<?= $img ?>"
                             width="480" height="300" loading="lazy">
                    </picture>
                    <div class="service-card-img-overlay" aria-hidden="true"></div>
                    <span class="service-card-badge">Professional Service</span>
                </div>
                <div class="service-card-body">
                    <div class="service-card-icon" aria-hidden="true">
                        <i data-lucide="<?= htmlspecialchars($svc['icon']) ?>" width="22" height="22"></i>
                    </div>
                    <h3><?= htmlspecialchars($svc['name']) ?></h3>
                    <p class="prose"><?= htmlspecialchars($svc['description']) ?></p>
                    <a href="/services/<?= $svc['slug'] ?>" class="service-card-link">
                        Learn More <i data-lucide="arrow-right" width="16" height="16" aria-hidden="true"></i>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     CTA BANNER (MID-PAGE)
     ════════════════════════════════════════════════════════════ -->
<section class="cta-banner-services" aria-label="Get an estimate">
    <div class="container">
        <h2 data-animate="fade-up">Not Sure Which Service You Need?</h2>
        <p class="prose-centered" data-animate="fade-up">Call BBD Tree Service and we'll assess your situation at no charge. We'll recommend only the work that's necessary — with a clear price before anything starts.</p>
        <div class="cta-actions" data-animate="fade-up">
            <a href="/contact" class="btn-primary">Request a Free Assessment</a>
            <?php if ($phone): ?>
            <a href="tel:<?= preg_replace('/\D/', '', $phone) ?>" class="cta-phone">
                <i data-lucide="phone-call" aria-hidden="true"></i>
                <?= formatPhone($phone) ?>
            </a>
            <?php else: ?>
            <span class="cta-phone"><i data-lucide="phone-call" aria-hidden="true"></i> Call Now — Free Advice</span>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     WHY BBD STRIP
     ════════════════════════════════════════════════════════════ -->
<section class="why-strip" aria-label="Why choose BBD">
    <div class="container">
        <div class="why-strip-inner">
            <div class="why-strip-text" data-animate="fade-up">
                <span class="eyebrow">Why BBD</span>
                <h2>26 Years. One Standard: Do It Right.</h2>
                <p class="prose">Every crew BBD sends to your property is trained, equipped, and accountable. We don't subcontract, we don't cut corners, and we don't leave until the job site is clean. That reputation took 26 years to build — we protect it on every job.</p>
                <ul class="why-checklist">
                    <li>Fully licensed and insured throughout Massachusetts</li>
                    <li>Free on-site estimates — price locked before work begins</li>
                    <li>Debris, limbs, and wood chips hauled away completely</li>
                    <li>Available for emergency response — storm damage prioritized</li>
                    <li>Serving Watertown, Cambridge, Newton, Waltham &amp; beyond</li>
                </ul>
                <a href="/about" class="btn-primary">Learn About Our Team</a>
            </div>
            <div class="why-strip-stats" data-animate="fade-up">
                <div class="stat-box">
                    <span class="stat-num" data-counter="26" data-suffix="+">26+</span>
                    <span class="stat-label">Years Serving Greater Boston</span>
                </div>
                <div class="stat-box">
                    <span class="stat-num" data-counter="10" data-suffix="+">10+</span>
                    <span class="stat-label">Towns in Our Service Area</span>
                </div>
                <div class="stat-box">
                    <span class="stat-num" data-prefix="4." data-counter="9" data-suffix="★">4.9★</span>
                    <span class="stat-label">Average Customer Rating</span>
                </div>
                <div class="stat-box">
                    <span class="stat-num" data-counter="100" data-suffix="%">100%</span>
                    <span class="stat-label">Cleanup Included — Always</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     CLOSING CTA
     ════════════════════════════════════════════════════════════ -->
<section style="padding: var(--section-pad); background: var(--color-bg-dark); color: white; text-align: center;" aria-label="Contact CTA">
    <div class="container">
        <p style="font-size:0.8rem; text-transform:uppercase; letter-spacing:0.12em; color: var(--color-accent); font-weight:700; margin-bottom:var(--space-md);" data-animate="fade-up">Ready to Get Started?</p>
        <h2 style="font-size:clamp(1.8rem,4vw,2.8rem); font-weight:800; margin-bottom:var(--space-md); text-wrap:balance;" data-animate="fade-up">Schedule Your Free Estimate Today</h2>
        <p style="font-size:1.05rem; opacity:0.8; max-width:52ch; margin:0 auto var(--space-2xl);" data-animate="fade-up">BBD Tree Service serves Watertown and 10+ surrounding communities. Same-day assessment available for urgent situations. Call now or fill out the contact form — we'll respond within the hour.</p>
        <div style="display:flex; align-items:center; justify-content:center; gap:var(--space-xl); flex-wrap:wrap;" data-animate="fade-up">
            <a href="/contact" class="btn-primary">Get My Free Estimate</a>
            <?php if ($phone): ?>
            <a href="tel:<?= preg_replace('/\D/', '', $phone) ?>" style="color:var(--color-accent); font-size:1.4rem; font-weight:800; display:flex; align-items:center; gap:var(--space-sm);">
                <i data-lucide="phone" aria-hidden="true"></i> <?= formatPhone($phone) ?>
            </a>
            <?php else: ?>
            <span style="color:var(--color-accent); font-size:1.4rem; font-weight:800; display:flex; align-items:center; gap:var(--space-sm);">
                <i data-lucide="phone" aria-hidden="true"></i> Call for Same-Day Service
            </span>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
