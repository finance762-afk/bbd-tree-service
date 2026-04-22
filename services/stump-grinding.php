<?php
/**
 * BBD Tree Service — Stump Grinding Service Page
 * Phase 4: Inner Pages
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$service     = $services[3]; // Stump Grinding
$currentPage = 'stump-grinding';

$pageTitle       = "Stump Grinding Watertown MA | BBD Tree Service";
$pageDescription = "Fast stump grinding in Watertown, MA. BBD Tree Service grinds stumps below grade, cleans up all debris, and leaves your lawn ready for reseeding. Free estimates.";
$pageKeywords    = implode(', ', $service['keywords']);
$canonicalUrl    = $siteUrl . '/services/stump-grinding';
$ogImage         = $siteImages['photo2'];
$heroImage       = $siteImages['photo2'];

$faqs = [
    [
        'q' => 'How deep does stump grinding go?',
        'a' => 'We grind stumps 6–12 inches below grade as standard — deep enough to allow sod or new landscaping directly over the spot. If you\'re planning a concrete pour or foundation work in that area, we can grind deeper on request. The grinding depth is confirmed at the estimate visit.',
    ],
    [
        'q' => 'What happens to the wood chips and sawdust?',
        'a' => 'After grinding, we rake up the bulk of the wood chip mulch and either leave it for you to use in garden beds or haul it away — your choice. The remaining sawdust mixed with soil is fine to leave in place; it decomposes naturally within 1–2 seasons without causing any lawn issues.',
    ],
    [
        'q' => 'How much does stump grinding cost in Watertown?',
        'a' => 'Stump grinding in Watertown typically runs $100–$350 per stump depending on diameter and access. Stumps combined with a same-day removal are often discounted. Multiple stumps on the same property are priced at a per-unit rate — get a written quote at our free on-site visit.',
    ],
    [
        'q' => 'Will the stump re-sprout after grinding?',
        'a' => 'Most species won\'t re-sprout once the stump is ground below grade because the root system can no longer photosynthesize. Aggressive species like silver maple, black locust, and tree-of-heaven may produce root sprouts for a season or two. We\'ll flag this possibility during the estimate if your stump is one of these species.',
    ],
];

$schemaMarkup = generateServiceSchema($service) . "\n" . generateFAQSchema($faqs);

$breadcrumbSchema = json_encode([
    '@context'        => 'https://schema.org',
    '@type'           => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => $siteUrl],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $siteUrl . '/services'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Stump Grinding'],
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<body>

<script type="application/ld+json">
<?= $breadcrumbSchema ?>
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<style>
.service-hero { min-height: 55vh; display: flex; align-items: flex-end; position: relative; overflow: hidden; background-image: url('<?= htmlspecialchars($siteImages['photo2']) ?>'); background-size: cover; background-position: center 50%; }
.service-hero::before { content: ''; position: absolute; inset: 0; background: linear-gradient(155deg, rgba(10,18,28,0.9) 0%, rgba(45,106,0,0.72) 55%, rgba(108,194,0,0.08) 100%); z-index: 1; }
.service-hero-inner { position: relative; z-index: 2; width: 100%; padding: 60px 0 50px; }
.breadcrumb-nav { display: flex; align-items: center; gap: var(--space-2); font-size: 0.8rem; color: rgba(255,255,255,0.6); margin-bottom: var(--space-4); flex-wrap: wrap; }
.breadcrumb-nav a { color: rgba(255,255,255,0.6); transition: color var(--transition); }
.breadcrumb-nav a:hover { color: var(--color-accent); }
.breadcrumb-nav .sep { color: rgba(255,255,255,0.3); }
.breadcrumb-nav .current { color: rgba(255,255,255,0.9); }
.service-hero-eyebrow { display: inline-flex; align-items: center; gap: var(--space-2); background: rgba(108,194,0,0.12); border: 1px solid rgba(108,194,0,0.35); border-radius: 999px; padding: 5px 16px; font-size: 0.7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; color: var(--color-accent); margin-bottom: var(--space-4); }
.service-hero h1 { font-size: clamp(2.2rem, 5vw, 3.8rem); font-weight: 800; line-height: 1.1; letter-spacing: -0.025em; color: #fff; text-wrap: balance; margin-bottom: var(--space-4); }
.service-hero h1 .accent { color: var(--color-accent); }
.service-hero-sub { font-size: 1.05rem; color: rgba(255,255,255,0.82); max-width: 560px; line-height: 1.7; margin-bottom: var(--space-6); }
.hero-cta-row { display: flex; align-items: center; gap: var(--space-4); flex-wrap: wrap; }

/* Before/After stats comparison — signature section */
.compare-section { background: var(--color-bg-alt); padding: var(--space-16) 0; }
.compare-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: var(--space-1); border-radius: var(--radius-lg); overflow: hidden; }
@media (max-width: 767px) { .compare-grid { grid-template-columns: 1fr; } }
.compare-card { padding: var(--space-8) var(--space-6); text-align: center; }
.compare-card.before { background: rgba(45,106,0,0.06); }
.compare-card.after  { background: var(--color-primary); }
.compare-card.stat   { background: rgba(108,194,0,0.08); }
.compare-card .compare-label { font-size: 0.7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; margin-bottom: var(--space-3); }
.compare-card.before .compare-label { color: var(--color-text-light); }
.compare-card.after  .compare-label { color: var(--color-accent); }
.compare-card.stat   .compare-label { color: var(--color-accent); }
.compare-card .compare-value { font-size: 2.4rem; font-weight: 800; line-height: 1; margin-bottom: var(--space-2); }
.compare-card.before .compare-value { color: var(--color-text-light); }
.compare-card.after  .compare-value { color: #fff; }
.compare-card.stat   .compare-value { color: var(--color-primary); }
.compare-card .compare-desc { font-size: 0.85rem; line-height: 1.5; }
.compare-card.before .compare-desc { color: var(--color-text-light); }
.compare-card.after  .compare-desc { color: rgba(255,255,255,0.75); }
.compare-card.stat   .compare-desc { color: var(--color-text-light); }

.process-steps { display: flex; flex-direction: column; gap: 0; position: relative; }
.process-steps::before { content: ''; position: absolute; left: 24px; top: 48px; bottom: 0; width: 2px; background: linear-gradient(to bottom, var(--color-accent), transparent); }
.process-step { display: flex; gap: var(--space-6); padding-bottom: var(--space-8); position: relative; }
.step-num { flex-shrink: 0; width: 48px; height: 48px; background: var(--color-primary); border: 3px solid var(--color-accent); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-family: var(--font-heading); font-weight: 800; font-size: 1rem; color: var(--color-accent); position: relative; z-index: 1; }
.step-body h3 { font-size: 1.05rem; font-weight: 700; color: var(--color-primary); margin-bottom: var(--space-2); padding-top: 10px; }
.step-body p  { font-size: 0.9rem; color: var(--color-text-light); line-height: 1.65; }

.faq-list { display: flex; flex-direction: column; gap: var(--space-3); }
.faq-item { background: var(--color-bg); border: 1px solid rgba(45,106,0,0.1); border-radius: var(--radius-lg); overflow: hidden; }
.faq-item summary { padding: var(--space-5) var(--space-6); font-weight: 700; font-size: 0.95rem; color: var(--color-primary); cursor: pointer; list-style: none; display: flex; justify-content: space-between; align-items: center; gap: var(--space-3); }
.faq-item summary::-webkit-details-marker { display: none; }
.faq-item summary::after { content: '+'; font-size: 1.3rem; color: var(--color-accent); flex-shrink: 0; }
.faq-item[open] summary::after { content: '−'; }
.faq-answer { padding: 0 var(--space-6) var(--space-5); font-size: 0.92rem; color: var(--color-text-light); line-height: 1.7; }

.cta-banner-service { background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); position: relative; overflow: hidden; text-align: center; padding: var(--space-16) var(--space-5); }
.cta-banner-service::before { content: ''; position: absolute; inset: 0; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E"); pointer-events: none; }
.cta-banner-service h2 { color: #fff; margin-bottom: var(--space-3); font-size: clamp(1.8rem,4vw,2.6rem); }
.cta-banner-service p  { color: rgba(255,255,255,0.8); margin-bottom: var(--space-6); font-size: 1rem; }
.cta-banner-actions { display: flex; align-items: center; justify-content: center; gap: var(--space-4); flex-wrap: wrap; }

.answer-block { background: rgba(108,194,0,0.06); border-left: 4px solid var(--color-accent); border-radius: 0 var(--radius-lg) var(--radius-lg) 0; padding: var(--space-5) var(--space-6); margin-bottom: var(--space-6); }
.answer-block h2 { font-size: 1.1rem; font-weight: 700; color: var(--color-primary); margin-bottom: var(--space-2); }
.answer-block p  { font-size: 0.92rem; color: var(--color-text-light); line-height: 1.7; margin: 0; }
.last-updated { font-size: 0.78rem; color: var(--color-text-muted, #999); margin-top: var(--space-6); }
</style>

<!-- ── SERVICE HERO ──────────────────────────────────────────────────────────── -->
<section class="service-hero">
  <div class="service-hero-inner">
    <div class="container">
      <nav class="breadcrumb-nav" aria-label="Breadcrumb">
        <a href="/">Home</a><span class="sep">›</span>
        <a href="/services">Services</a><span class="sep">›</span>
        <span class="current">Stump Grinding</span>
      </nav>
      <div class="service-hero-eyebrow">
        <i data-lucide="circle-slash" aria-hidden="true"></i>
        Watertown, MA
      </div>
      <h1>Stump Gone. Lawn <span class="accent">Ready</span>.<br>Same Visit.</h1>
      <p class="service-hero-sub">We grind stumps 6–12 inches below grade, rake up all chips, and leave your yard clear and plantable — across Watertown and surrounding communities.</p>
      <div class="hero-cta-row">
        <a href="/contact" class="btn-primary"><i data-lucide="clipboard-list" aria-hidden="true"></i>Get a Free Estimate</a>
        <?php if (!empty($phone)): ?>
        <a href="tel:<?= preg_replace('/\D/','',$phone) ?>" class="btn-secondary" style="background:rgba(255,255,255,0.1);border-color:rgba(255,255,255,0.3);color:#fff;">
          <i data-lucide="phone" aria-hidden="true"></i><?= htmlspecialchars(formatPhone($phone)) ?>
        </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<!-- ── TICKER ────────────────────────────────────────────────────────────────── -->
<div class="ticker-strip" aria-hidden="true">
  <div class="ticker-track">
    <div class="ticker-content">
      <span>Ground 6–12" Below Grade</span><span class="ticker-sep">✦</span>
      <span>Full Chip Cleanup</span><span class="ticker-sep">✦</span>
      <span>Any Stump, Any Size</span><span class="ticker-sep">✦</span>
      <span>Licensed &amp; Insured</span><span class="ticker-sep">✦</span>
      <span>Lawn-Ready Results</span><span class="ticker-sep">✦</span>
      <span>Free Estimates</span><span class="ticker-sep">✦</span>
    </div>
    <div class="ticker-content" aria-hidden="true">
      <span>Ground 6–12" Below Grade</span><span class="ticker-sep">✦</span>
      <span>Full Chip Cleanup</span><span class="ticker-sep">✦</span>
      <span>Any Stump, Any Size</span><span class="ticker-sep">✦</span>
      <span>Licensed &amp; Insured</span><span class="ticker-sep">✦</span>
      <span>Lawn-Ready Results</span><span class="ticker-sep">✦</span>
      <span>Free Estimates</span><span class="ticker-sep">✦</span>
    </div>
  </div>
</div>

<!-- ── DETAIL ────────────────────────────────────────────────────────────────── -->
<section class="section-pad" style="background:var(--color-bg);">
  <div class="container">
    <div class="answer-block" data-animate="fade-up">
      <h2>How long does stump grinding take in Watertown, MA?</h2>
      <p>Most residential stumps in Watertown are fully ground and cleaned up in 1–2 hours. Larger stumps with extensive root flair or multiple trunks take 2–3 hours. We can combine stump grinding with a tree removal on the same visit, often saving you scheduling time and a separate trip charge.</p>
    </div>
    <div style="max-width:800px;" data-animate="fade-up">
      <div class="eyebrow-label">Stump Grinding Watertown MA</div>
      <h2 class="section-title">No More Tripping Over It. No More Mowing Around It.</h2>
      <div class="prose">
        <p>A stump left in the ground is more than an eyesore — it's a trip hazard, a mowing obstacle, a termite habitat, and a barrier to replanting the space. BBD Tree Service grinds stumps across Watertown, Cambridge, Newton, and surrounding areas using commercial-grade equipment sized to fit through typical residential gates and work in tight back yards.</p>
        <p>We grind 6–12 inches below the existing grade as standard practice. That's deep enough to plant directly over the area with sod, seed, or a new tree. If you're planning hardscape — a patio, walkway, or garden bed border — we can grind deeper to clear the root zone more thoroughly.</p>
        <p>After grinding, the excess wood chips are raked and either hauled away or left in place for use as garden mulch. The remaining soil-sawdust mix settles and decomposes naturally over 1–2 growing seasons, leaving a level patch of ground that blends seamlessly into your lawn.</p>
        <p>Stump grinding is available as a standalone service or as an add-on to any tree removal. Pricing is by stump diameter — a 12-inch stump costs less than a 36-inch oak stump. Get exact numbers at your free estimate visit.</p>
      </div>
      <p class="last-updated">Last Updated: April 2026</p>
    </div>
  </div>
</section>

<!-- ── COMPARE STATS — SIGNATURE SECTION ────────────────────────────────────── -->
<section class="compare-section" aria-label="Stump grinding results">
  <div class="container">
    <div class="eyebrow-label text-center" data-animate="fade-up">The Difference</div>
    <h2 class="section-title text-center" data-animate="fade-up">Before Grinding vs. After Grinding</h2>
    <div class="compare-grid" style="margin-top:var(--space-8);" data-animate="fade-up">
      <div class="compare-card before">
        <div class="compare-label">Before Grinding</div>
        <div class="compare-value">⚠</div>
        <div class="compare-desc">Trip hazard, mowing obstacle, potential termite habitat, unusable lawn space</div>
      </div>
      <div class="compare-card stat">
        <div class="compare-label">Typical Job Time</div>
        <div class="compare-value">1–2h</div>
        <div class="compare-desc">Most Watertown residential stumps fully ground and cleaned in a single visit</div>
      </div>
      <div class="compare-card after">
        <div class="compare-label">After Grinding</div>
        <div class="compare-value">✓</div>
        <div class="compare-desc">Level, plantable ground — ready for grass seed, mulch, new tree, or hardscape</div>
      </div>
    </div>
  </div>
</section>

<!-- ── MID-PAGE CTA ──────────────────────────────────────────────────────────── -->
<section class="cta-banner-service">
  <div class="container" style="position:relative;z-index:1;">
    <div class="eyebrow-label" style="color:var(--color-accent);margin-bottom:var(--space-3);" data-animate="fade-up">Get Rid of That Stump</div>
    <h2 data-animate="fade-up">Have a Stump That's Been Sitting There Too Long?</h2>
    <p data-animate="fade-up">We'll come to your Watertown property, give you a written price per stump, and schedule the grind for the same week in most cases.</p>
    <div class="cta-banner-actions" data-animate="fade-up">
      <a href="/contact" class="btn-primary">Get Stump Grinding Quote</a>
      <?php if (!empty($phone)): ?>
      <a href="tel:<?= preg_replace('/\D/','',$phone) ?>" class="btn-secondary" style="border-color:rgba(255,255,255,0.4);color:#fff;">
        <i data-lucide="phone" aria-hidden="true"></i> <?= htmlspecialchars(formatPhone($phone)) ?>
      </a>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ── PROCESS ───────────────────────────────────────────────────────────────── -->
<section class="section-pad" style="background:var(--color-bg);">
  <div class="container">
    <div style="max-width:700px;margin:0 auto;">
      <div class="eyebrow-label" data-animate="fade-up">What to Expect</div>
      <h2 class="section-title" data-animate="fade-up">The Stump Grinding Process</h2>
      <div class="process-steps" style="margin-top:var(--space-8);" data-animate="fade-up">
        <div class="process-step">
          <div class="step-num">1</div>
          <div class="step-body">
            <h3>Free Estimate &amp; Stump Measurement</h3>
            <p>We measure the stump diameter at grade, evaluate root flair and access, and give you a written per-stump price. No surprise add-ons.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">2</div>
          <div class="step-body">
            <h3>Site Prep &amp; Equipment Positioning</h3>
            <p>We lay protective mats over lawn areas and position the grinder above the stump. Adjacent landscape beds and walkways are cleared of debris before we start.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">3</div>
          <div class="step-body">
            <h3>Grinding Below Grade</h3>
            <p>The grinder works systematically across the stump, reducing it to chips 6–12 inches below the original surface. Larger surface roots are ground back to where they meet the main root plate.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">4</div>
          <div class="step-body">
            <h3>Chip Cleanup &amp; Raking</h3>
            <p>Excess chips are raked and either removed or redistributed to garden beds at your direction. The site is left level, clear, and ready for whatever comes next.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── FAQ ───────────────────────────────────────────────────────────────────── -->
<section class="section-pad" style="background:var(--color-bg-alt);">
  <div class="container">
    <div style="max-width:760px;margin:0 auto;">
      <div class="eyebrow-label" data-animate="fade-up">Common Questions</div>
      <h2 class="section-title" data-animate="fade-up">Stump Grinding FAQs — Watertown, MA</h2>
      <div class="faq-list" style="margin-top:var(--space-8);" data-animate="fade-up">
        <?php foreach ($faqs as $faq): ?>
        <details class="faq-item">
          <summary><?= htmlspecialchars($faq['q']) ?></summary>
          <div class="faq-answer"><?= htmlspecialchars($faq['a']) ?></div>
        </details>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ── CLOSING CTA ───────────────────────────────────────────────────────────── -->
<section class="section-pad" style="background:var(--color-bg-dark);text-align:center;">
  <div class="container">
    <div class="eyebrow-label" style="color:var(--color-accent);" data-animate="fade-up">Watertown Stump Grinding</div>
    <h2 style="color:#fff;font-size:clamp(1.8rem,4vw,2.6rem);margin-bottom:var(--space-4);" data-animate="fade-up">That Stump Is Easier to Remove Than You Think</h2>
    <p style="color:rgba(255,255,255,0.75);max-width:520px;margin:0 auto var(--space-8);line-height:1.7;" data-animate="fade-up">Most stumps are handled in a single morning visit. Get your free written quote this week — no obligation.</p>
    <div class="cta-banner-actions" data-animate="fade-up">
      <a href="/contact#estimate" class="btn-primary">Get My Stump Grinding Quote</a>
      <?php if (!empty($phone)): ?>
      <a href="tel:<?= preg_replace('/\D/','',$phone) ?>" class="btn-secondary" style="border-color:rgba(255,255,255,0.3);color:#fff;">
        <i data-lucide="phone" aria-hidden="true"></i> <?= htmlspecialchars(formatPhone($phone)) ?>
      </a>
      <?php endif; ?>
    </div>
    <p style="color:rgba(255,255,255,0.4);font-size:0.8rem;margin-top:var(--space-6);">Serving Watertown · Cambridge · Newton · Waltham · Belmont · Arlington</p>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
