<?php
/**
 * BBD Tree Service — Brush Removal Service Page
 * Phase 4: Inner Pages
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$service     = $services[8]; // Brush Removal
$currentPage = 'brush-removal';

$pageTitle       = "Brush Removal Watertown MA | BBD Tree Service";
$pageDescription = "Brush removal & lot clearing in Watertown, MA. BBD Tree Service clears overgrown vegetation, storm debris & invasive growth with full haul-away. Free estimates.";
$pageKeywords    = implode(', ', $service['keywords']);
$canonicalUrl    = $siteUrl . '/services/brush-removal';
$ogImage         = $siteImages['photo6'];
$heroImage       = $siteImages['photo6'];

$faqs = [
    [
        'q' => 'What types of brush and vegetation does BBD Tree Service remove?',
        'a' => 'We clear overgrown shrubs, saplings, vine growth (bittersweet, poison ivy, wild grape), storm-downed branches and debris piles, invasive species growth, and general vegetation overgrowth on residential and commercial properties throughout the Watertown area. If it\'s growing where you don\'t want it, we can remove it.',
    ],
    [
        'q' => 'Do you handle poison ivy removal in Watertown?',
        'a' => 'Yes, though we take proper precautions and use protective equipment when removing poison ivy and other irritating species. We\'ll flag any poison ivy presence during the estimate visit. All removed material is bagged for disposal — not chipped — to prevent spread during processing.',
    ],
    [
        'q' => 'What happens to all the brush after removal?',
        'a' => 'We chip woody material on-site where appropriate, and haul away all debris, including soft vegetation that can\'t be chipped. The site is raked and left clean. Some homeowners opt to keep the wood chip mulch for garden beds — just let us know during the estimate and we\'ll leave it in place.',
    ],
    [
        'q' => 'Can brush removal be combined with tree service in one visit?',
        'a' => 'Yes, and it\'s often the most efficient approach. Many brush removal jobs in Watertown are scheduled alongside a tree removal or trimming visit — we handle the trees and stumps, then clear any brush and overgrowth in the same visit, often at a reduced combined price.',
    ],
];

$schemaMarkup = generateServiceSchema($service) . "\n" . generateFAQSchema($faqs);

$breadcrumbSchema = json_encode([
    '@context'        => 'https://schema.org',
    '@type'           => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => $siteUrl],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $siteUrl . '/services'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Brush Removal'],
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
.service-hero { min-height: 52vh; display: flex; align-items: flex-end; position: relative; overflow: hidden; background-image: url('<?= htmlspecialchars($siteImages['photo6']) ?>'); background-size: cover; background-position: center 45%; }
.service-hero::before { content:''; position:absolute; inset:0; background:linear-gradient(155deg,rgba(10,18,28,0.9) 0%,rgba(45,106,0,0.72) 55%,rgba(108,194,0,0.08) 100%); z-index:1; }
.service-hero-inner { position:relative; z-index:2; width:100%; padding:60px 0 50px; }
.breadcrumb-nav { display:flex; align-items:center; gap:var(--space-2); font-size:0.8rem; color:rgba(255,255,255,0.6); margin-bottom:var(--space-4); flex-wrap:wrap; }
.breadcrumb-nav a { color:rgba(255,255,255,0.6); } .breadcrumb-nav a:hover { color:var(--color-accent); }
.breadcrumb-nav .sep { color:rgba(255,255,255,0.3); } .breadcrumb-nav .current { color:rgba(255,255,255,0.9); }
.service-hero-eyebrow { display:inline-flex; align-items:center; gap:var(--space-2); background:rgba(108,194,0,0.12); border:1px solid rgba(108,194,0,0.35); border-radius:999px; padding:5px 16px; font-size:0.7rem; font-weight:700; text-transform:uppercase; letter-spacing:2px; color:var(--color-accent); margin-bottom:var(--space-4); }
.service-hero h1 { font-size:clamp(2.2rem,5vw,3.8rem); font-weight:800; line-height:1.1; letter-spacing:-0.025em; color:#fff; text-wrap:balance; margin-bottom:var(--space-4); }
.service-hero h1 .accent { color:var(--color-accent); }
.service-hero-sub { font-size:1.05rem; color:rgba(255,255,255,0.82); max-width:560px; line-height:1.7; margin-bottom:var(--space-6); }
.hero-cta-row { display:flex; align-items:center; gap:var(--space-4); flex-wrap:wrap; }

/* Full-bleed photo background stat strip — signature */
.stat-photo-strip { position:relative; min-height:320px; overflow:hidden; display:flex; align-items:center; }
.stat-photo-bg { position:absolute; inset:0; }
.stat-photo-bg img { width:100%; height:100%; object-fit:cover; display:block; }
.stat-photo-bg::after { content:''; position:absolute; inset:0; background:rgba(10,18,28,0.82); }
.stat-photo-content { position:relative; z-index:1; width:100%; padding:var(--space-12) 0; }
.stat-row { display:grid; grid-template-columns:repeat(4,1fr); gap:var(--space-5); text-align:center; }
@media (max-width:767px) { .stat-row { grid-template-columns:repeat(2,1fr); gap:var(--space-6); } }
.stat-item .stat-val { font-size:2.8rem; font-weight:800; color:var(--color-accent); line-height:1; margin-bottom:var(--space-2); }
.stat-item .stat-lbl { font-size:0.8rem; color:rgba(255,255,255,0.75); text-transform:uppercase; letter-spacing:1.5px; }

.what-we-clear { display:grid; grid-template-columns:repeat(2,1fr); gap:var(--space-5); margin-top:var(--space-8); }
@media (max-width:767px) { .what-we-clear { grid-template-columns:1fr; } }
.clear-item { display:flex; gap:var(--space-4); align-items:flex-start; padding:var(--space-5); background:var(--color-bg); border-radius:var(--radius-lg); border:1px solid rgba(45,106,0,0.07); box-shadow:var(--shadow-sm); }
.clear-icon { width:40px; height:40px; flex-shrink:0; background:rgba(108,194,0,0.1); border-radius:var(--radius); display:flex; align-items:center; justify-content:center; color:var(--color-accent); }
.clear-item h3 { font-size:0.95rem; font-weight:700; color:var(--color-primary); margin-bottom:var(--space-1); }
.clear-item p  { font-size:0.875rem; color:var(--color-text-light); line-height:1.6; }

.process-steps { display:flex; flex-direction:column; gap:0; position:relative; }
.process-steps::before { content:''; position:absolute; left:24px; top:48px; bottom:0; width:2px; background:linear-gradient(to bottom,var(--color-accent),transparent); }
.process-step { display:flex; gap:var(--space-6); padding-bottom:var(--space-8); position:relative; }
.step-num { flex-shrink:0; width:48px; height:48px; background:var(--color-primary); border:3px solid var(--color-accent); border-radius:50%; display:flex; align-items:center; justify-content:center; font-family:var(--font-heading); font-weight:800; font-size:1rem; color:var(--color-accent); position:relative; z-index:1; }
.step-body h3 { font-size:1.05rem; font-weight:700; color:var(--color-primary); margin-bottom:var(--space-2); padding-top:10px; }
.step-body p  { font-size:0.9rem; color:var(--color-text-light); line-height:1.65; }

.faq-list { display:flex; flex-direction:column; gap:var(--space-3); }
.faq-item { background:var(--color-bg); border:1px solid rgba(45,106,0,0.1); border-radius:var(--radius-lg); overflow:hidden; }
.faq-item summary { padding:var(--space-5) var(--space-6); font-weight:700; font-size:0.95rem; color:var(--color-primary); cursor:pointer; list-style:none; display:flex; justify-content:space-between; align-items:center; gap:var(--space-3); }
.faq-item summary::-webkit-details-marker { display:none; }
.faq-item summary::after { content:'+'; font-size:1.3rem; color:var(--color-accent); flex-shrink:0; }
.faq-item[open] summary::after { content:'−'; }
.faq-answer { padding:0 var(--space-6) var(--space-5); font-size:0.92rem; color:var(--color-text-light); line-height:1.7; }

.cta-banner-service { background:linear-gradient(135deg,var(--color-primary) 0%,var(--color-primary-dark) 100%); position:relative; overflow:hidden; text-align:center; padding:var(--space-16) var(--space-5); }
.cta-banner-service::before { content:''; position:absolute; inset:0; background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E"); pointer-events:none; }
.cta-banner-service h2 { color:#fff; margin-bottom:var(--space-3); font-size:clamp(1.8rem,4vw,2.6rem); }
.cta-banner-service p  { color:rgba(255,255,255,0.8); margin-bottom:var(--space-6); font-size:1rem; }
.cta-banner-actions { display:flex; align-items:center; justify-content:center; gap:var(--space-4); flex-wrap:wrap; }

.answer-block { background:rgba(108,194,0,0.06); border-left:4px solid var(--color-accent); border-radius:0 var(--radius-lg) var(--radius-lg) 0; padding:var(--space-5) var(--space-6); margin-bottom:var(--space-6); }
.answer-block h2 { font-size:1.1rem; font-weight:700; color:var(--color-primary); margin-bottom:var(--space-2); }
.answer-block p  { font-size:0.92rem; color:var(--color-text-light); line-height:1.7; margin:0; }
.last-updated { font-size:0.78rem; color:var(--color-text-muted,#999); margin-top:var(--space-6); }
</style>

<section class="service-hero">
  <div class="service-hero-inner">
    <div class="container">
      <nav class="breadcrumb-nav" aria-label="Breadcrumb">
        <a href="/">Home</a><span class="sep">›</span>
        <a href="/services">Services</a><span class="sep">›</span>
        <span class="current">Brush Removal</span>
      </nav>
      <div class="service-hero-eyebrow">
        <i data-lucide="trash-2" aria-hidden="true"></i>
        Watertown, MA
      </div>
      <h1>Clear the <span class="accent">Overgrowth</span>.<br>Reclaim Your Space.</h1>
      <p class="service-hero-sub">Efficient brush clearing, storm debris cleanup, and vegetation removal across Watertown — all debris chipped or hauled away, site left clean.</p>
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

<div class="ticker-strip" aria-hidden="true">
  <div class="ticker-track">
    <div class="ticker-content">
      <span>Storm Debris Cleanup</span><span class="ticker-sep">✦</span><span>Invasive Species Removal</span><span class="ticker-sep">✦</span><span>Full Haul-Away</span><span class="ticker-sep">✦</span><span>Licensed &amp; Insured</span><span class="ticker-sep">✦</span><span>26 Years Experience</span><span class="ticker-sep">✦</span><span>Free Estimates</span><span class="ticker-sep">✦</span>
    </div>
    <div class="ticker-content" aria-hidden="true">
      <span>Storm Debris Cleanup</span><span class="ticker-sep">✦</span><span>Invasive Species Removal</span><span class="ticker-sep">✦</span><span>Full Haul-Away</span><span class="ticker-sep">✦</span><span>Licensed &amp; Insured</span><span class="ticker-sep">✦</span><span>26 Years Experience</span><span class="ticker-sep">✦</span><span>Free Estimates</span><span class="ticker-sep">✦</span>
    </div>
  </div>
</div>

<section class="section-pad" style="background:var(--color-bg);">
  <div class="container">
    <div class="answer-block" data-animate="fade-up">
      <h2>What does brush removal include for Watertown properties?</h2>
      <p>Brush removal covers cutting down and hauling away overgrown shrubs, saplings, thorny vegetation, vine growth, storm-downed branches, and general organic debris that's accumulated in unused areas of your property. Everything is chipped on-site or hauled away — you don't have to pile it at the curb or make multiple trips to the transfer station.</p>
    </div>

    <div style="max-width:800px;margin-bottom:var(--space-10);" data-animate="fade-up">
      <div class="eyebrow-label">Brush Removal Watertown MA</div>
      <h2 class="section-title">What's Been Growing Back There for Years? We'll Clear It in a Day.</h2>
      <div class="prose">
        <p>Brush and overgrowth problems in Watertown typically fall into three categories: neglected corners that have slowly filled in with invasive species and saplings; storm aftermath with downed branches and scattered debris; and properties being prepared for new landscaping or construction where the existing growth needs to come out completely.</p>
        <p>BBD Tree Service handles all three. We cut back and remove overgrown vegetation, clear storm debris piles, and prepare lots for new use — chipping material on-site or loading it into trucks for haul-away, depending on the volume and your preference. We also manage invasive species including Oriental bittersweet, common buckthorn, and multiflora rose, which are common throughout Watertown's wooded rear lots and wetland edges.</p>
        <p>Brush removal jobs are frequently combined with a tree removal or stump grinding visit in the same appointment, which often reduces the total cost and eliminates the need for a second scheduling window. Mention everything you need addressed when you contact us and we'll scope it all at once.</p>
      </div>
      <p class="last-updated">Last Updated: April 2026</p>
    </div>

    <div class="eyebrow-label" data-animate="fade-up">What We Remove</div>
    <h2 class="section-title" data-animate="fade-up">Every Type of Vegetation Overgrowth</h2>
    <div class="what-we-clear" data-animate="fade-up">
      <div class="clear-item">
        <div class="clear-icon"><i data-lucide="wind" aria-hidden="true"></i></div>
        <div><h3>Storm Debris</h3><p>Downed branches, split trunks, and scattered debris left by nor'easters and ice storms across your Watertown property.</p></div>
      </div>
      <div class="clear-item">
        <div class="clear-icon"><i data-lucide="leaf" aria-hidden="true"></i></div>
        <div><h3>Invasive Vines &amp; Species</h3><p>Oriental bittersweet, wild grape, multiflora rose, and buckthorn removed and properly disposed — not composted on-site.</p></div>
      </div>
      <div class="clear-item">
        <div class="clear-icon"><i data-lucide="sprout" aria-hidden="true"></i></div>
        <div><h3>Sapling &amp; Shrub Overgrowth</h3><p>Neglected corners filled with volunteer saplings and overgrown shrubs, cleared back to bare ground or defined landscape edges.</p></div>
      </div>
      <div class="clear-item">
        <div class="clear-icon"><i data-lucide="layers" aria-hidden="true"></i></div>
        <div><h3>Lot Clearing for Landscaping</h3><p>Preparation for new planting, fencing, garden installation, or hardscape — all existing vegetation removed and hauled out.</p></div>
      </div>
    </div>
  </div>
</section>

<!-- ── FULL-BLEED STAT PHOTO STRIP — SIGNATURE SECTION ──────────────────────── -->
<div class="stat-photo-strip" aria-label="BBD Tree Service brush removal in Watertown">
  <div class="stat-photo-bg">
    <img alt="Cleared brush and vegetation on Watertown property" src="<?= htmlspecialchars($siteImages['photo7']) ?>" width="1400" height="400" loading="lazy">
  </div>
  <div class="stat-photo-content">
    <div class="container">
      <div class="stat-row" data-animate="fade-up">
        <div class="stat-item">
          <div class="stat-val">26</div>
          <div class="stat-lbl">Years in Business</div>
        </div>
        <div class="stat-item">
          <div class="stat-val">10+</div>
          <div class="stat-lbl">Towns Served</div>
        </div>
        <div class="stat-item">
          <div class="stat-val">4.9★</div>
          <div class="stat-lbl">Average Rating</div>
        </div>
        <div class="stat-item">
          <div class="stat-val">1 Day</div>
          <div class="stat-lbl">Most Jobs Complete</div>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="cta-banner-service">
  <div class="container" style="position:relative;z-index:1;">
    <div class="eyebrow-label" style="color:var(--color-accent);margin-bottom:var(--space-3);" data-animate="fade-up">Brush Removal Watertown MA</div>
    <h2 data-animate="fade-up">Got a Corner of Your Property That's Gotten Out of Hand?</h2>
    <p data-animate="fade-up">We'll come out, walk the area with you, and give you a written price for clearing it — usually within a few days of contact.</p>
    <div class="cta-banner-actions" data-animate="fade-up">
      <a href="/contact" class="btn-primary">Get a Brush Removal Quote</a>
      <?php if (!empty($phone)): ?>
      <a href="tel:<?= preg_replace('/\D/','',$phone) ?>" class="btn-secondary" style="border-color:rgba(255,255,255,0.4);color:#fff;">
        <i data-lucide="phone" aria-hidden="true"></i> <?= htmlspecialchars(formatPhone($phone)) ?>
      </a>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="section-pad" style="background:var(--color-bg-alt);">
  <div class="container">
    <div style="max-width:700px;margin:0 auto;">
      <div class="eyebrow-label" data-animate="fade-up">Our Process</div>
      <h2 class="section-title" data-animate="fade-up">How We Approach Brush Clearing</h2>
      <div class="process-steps" style="margin-top:var(--space-8);" data-animate="fade-up">
        <div class="process-step">
          <div class="step-num">1</div>
          <div class="step-body">
            <h3>Free Site Walk &amp; Quote</h3>
            <p>We walk the area with you, identify the scope of clearing needed, note any invasive species or special handling requirements, and provide a written price per area or job.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">2</div>
          <div class="step-body">
            <h3>Clearing &amp; Cutting</h3>
            <p>Our crew works systematically through the area — cutting saplings, removing vines, clearing fallen branches, and reducing all vegetation to ground level or a defined boundary.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">3</div>
          <div class="step-body">
            <h3>Chipping or Haul-Away</h3>
            <p>Woody material is run through the chipper and either redistributed as mulch or loaded for haul-away. Non-chippable material (invasive vines, soft vegetation) is bagged and hauled.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">4</div>
          <div class="step-body">
            <h3>Final Rake &amp; Cleanup</h3>
            <p>The cleared area is raked clean and left ready for whatever comes next — new planting, lawn restoration, fencing, or simply open space.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-pad" style="background:var(--color-bg);">
  <div class="container">
    <div style="max-width:760px;margin:0 auto;">
      <div class="eyebrow-label" data-animate="fade-up">Common Questions</div>
      <h2 class="section-title" data-animate="fade-up">Brush Removal FAQs — Watertown, MA</h2>
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

<section class="section-pad" style="background:var(--color-bg-dark);text-align:center;">
  <div class="container">
    <div class="eyebrow-label" style="color:var(--color-accent);" data-animate="fade-up">Watertown Brush Removal</div>
    <h2 style="color:#fff;font-size:clamp(1.8rem,4vw,2.6rem);margin-bottom:var(--space-4);" data-animate="fade-up">Stop Working Around Overgrowth That Doesn't Belong There</h2>
    <p style="color:rgba(255,255,255,0.75);max-width:520px;margin:0 auto var(--space-8);line-height:1.7;" data-animate="fade-up">One crew, one day, everything cleared and hauled away. Get a free written quote for your Watertown property this week.</p>
    <div class="cta-banner-actions" data-animate="fade-up">
      <a href="/contact#estimate" class="btn-primary">Get My Free Clearing Quote</a>
      <?php if (!empty($phone)): ?>
      <a href="tel:<?= preg_replace('/\D/','',$phone) ?>" class="btn-secondary" style="border-color:rgba(255,255,255,0.3);color:#fff;">
        <i data-lucide="phone" aria-hidden="true"></i> <?= htmlspecialchars(formatPhone($phone)) ?>
      </a>
      <?php endif; ?>
    </div>
    <p style="color:rgba(255,255,255,0.4);font-size:0.8rem;margin-top:var(--space-6);">Serving Watertown · Cambridge · Newton · Waltham · Belmont · Arlington &amp; more</p>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
