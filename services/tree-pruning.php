<?php
/**
 * BBD Tree Service — Tree Pruning Service Page
 * Phase 4: Inner Pages
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$service     = $services[2]; // Tree Pruning Service
$currentPage = 'tree-pruning';

$pageTitle       = "Tree Pruning Service Watertown MA | BBD Tree Service";
$pageDescription = "Specialized tree pruning in Watertown, MA by BBD Tree Service. Proper techniques that promote tree health, structural integrity & long-term growth. Free estimates.";
$pageKeywords    = implode(', ', $service['keywords']);
$canonicalUrl    = $siteUrl . '/services/tree-pruning';
$ogImage         = $siteImages['branches1'];
$heroImage       = $siteImages['branches1'];

$faqs = [
    [
        'q' => 'When is the best time for tree pruning in Massachusetts?',
        'a' => 'Late winter — February through early April, while trees are still dormant — is optimal for most deciduous trees in Massachusetts. Pruning before bud break minimizes stress and reduces disease exposure. Elms and oaks should be pruned only in dormancy to avoid Dutch elm disease and oak wilt. Hazard branches, however, should always be removed promptly regardless of season.',
    ],
    [
        'q' => 'What\'s the difference between pruning and trimming?',
        'a' => 'Pruning is a targeted health practice: removing specific dead, diseased, crossing, or structurally weak branches using cuts placed at natural branch collars. Trimming is broader shaping — reducing canopy size or maintaining a desired form. BBD Tree Service applies proper pruning science to every cut, whether the goal is health or aesthetics.',
    ],
    [
        'q' => 'How much does tree pruning cost in Watertown, MA?',
        'a' => 'Pruning a single medium-size tree in Watertown typically runs $150–$450, depending on canopy size, branch height, and access. Multiple trees on the same visit often qualify for a reduced per-tree rate. We provide a written price after a free on-site walk — you pay exactly what was quoted.',
    ],
    [
        'q' => 'Will pruning help a tree that looks declining?',
        'a' => 'It depends on the cause of decline. Pruning removes dead and diseased wood, which reduces decay spread and redirects the tree\'s energy into healthy growth. However, if the issue is root damage, soil compaction, disease below the bark, or a structural split, pruning alone won\'t reverse the problem. We\'ll give you an honest assessment during the estimate.',
    ],
];

$schemaMarkup = generateServiceSchema($service) . "\n" . generateFAQSchema($faqs);

$breadcrumbSchema = json_encode([
    '@context'        => 'https://schema.org',
    '@type'           => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => $siteUrl],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $siteUrl . '/services'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Tree Pruning Service'],
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
.service-hero { min-height: 55vh; display: flex; align-items: flex-end; position: relative; overflow: hidden; background-image: url('<?= htmlspecialchars($siteImages['branches1']) ?>'); background-size: cover; background-position: center 35%; }
.service-hero::before { content: ''; position: absolute; inset: 0; background: linear-gradient(155deg, rgba(10,18,28,0.9) 0%, rgba(45,106,0,0.75) 55%, rgba(108,194,0,0.08) 100%); z-index: 1; }
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

/* Editorial pullquote — signature section */
.pullquote-block {
  background: var(--color-primary);
  padding: var(--space-16) var(--space-8);
  position: relative;
  overflow: hidden;
}
.pullquote-block::before {
  content: '"';
  position: absolute;
  top: -30px;
  left: 40px;
  font-size: 18rem;
  font-weight: 900;
  color: rgba(108,194,0,0.08);
  line-height: 1;
  font-family: var(--font-heading);
  pointer-events: none;
}
.pullquote-inner { max-width: 820px; margin: 0 auto; text-align: center; position: relative; z-index: 1; }
.pullquote-text { font-size: clamp(1.3rem, 3vw, 2rem); font-weight: 700; color: #fff; line-height: 1.45; font-style: italic; letter-spacing: -0.01em; margin-bottom: var(--space-6); border-left: 5px solid var(--color-accent); padding-left: var(--space-6); text-align: left; }
.pullquote-attr { font-size: 0.85rem; color: var(--color-accent); text-transform: uppercase; letter-spacing: 2px; }

.pruning-points { display: grid; grid-template-columns: repeat(2,1fr); gap: var(--space-5); margin-top: var(--space-8); }
@media (max-width: 767px) { .pruning-points { grid-template-columns: 1fr; } }
.pruning-point { display: flex; gap: var(--space-4); align-items: flex-start; }
.pruning-point .pp-icon { width: 44px; height: 44px; flex-shrink: 0; background: rgba(108,194,0,0.1); border-radius: var(--radius); display: flex; align-items: center; justify-content: center; color: var(--color-accent); }
.pruning-point h3 { font-size: 0.95rem; font-weight: 700; color: var(--color-primary); margin-bottom: var(--space-1); }
.pruning-point p  { font-size: 0.875rem; color: var(--color-text-light); line-height: 1.6; }

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
        <span class="current">Tree Pruning Service</span>
      </nav>
      <div class="service-hero-eyebrow">
        <i data-lucide="git-branch" aria-hidden="true"></i>
        Watertown, MA
      </div>
      <h1>Pruning That <span class="accent">Extends</span><br>a Tree's Life</h1>
      <p class="service-hero-sub">Science-backed pruning techniques that strengthen structure, prevent disease, and support decades of healthy growth — across Watertown and Greater Boston.</p>
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
      <span>ISA-Standard Cuts</span><span class="ticker-sep">✦</span>
      <span>No Tree Topping</span><span class="ticker-sep">✦</span>
      <span>26 Years Experience</span><span class="ticker-sep">✦</span>
      <span>Licensed &amp; Insured</span><span class="ticker-sep">✦</span>
      <span>Seasonal Scheduling</span><span class="ticker-sep">✦</span>
      <span>Free Estimates</span><span class="ticker-sep">✦</span>
    </div>
    <div class="ticker-content" aria-hidden="true">
      <span>ISA-Standard Cuts</span><span class="ticker-sep">✦</span>
      <span>No Tree Topping</span><span class="ticker-sep">✦</span>
      <span>26 Years Experience</span><span class="ticker-sep">✦</span>
      <span>Licensed &amp; Insured</span><span class="ticker-sep">✦</span>
      <span>Seasonal Scheduling</span><span class="ticker-sep">✦</span>
      <span>Free Estimates</span><span class="ticker-sep">✦</span>
    </div>
  </div>
</div>

<!-- ── ANSWER BLOCK + DETAIL ─────────────────────────────────────────────────── -->
<section class="section-pad" style="background:var(--color-bg);">
  <div class="container">
    <div class="answer-block" data-animate="fade-up">
      <h2>What does professional tree pruning accomplish that regular trimming doesn't?</h2>
      <p>Pruning removes specific branches using cuts placed at natural branch collars, allowing the tree to seal over the wound and prevent decay from entering. Done correctly, pruning redirects growth energy, eliminates weak branch attachments before they fail, and extends the structural lifespan of a tree by decades. Random trimming without this understanding can accelerate decline.</p>
    </div>
    <div style="max-width:800px;" data-animate="fade-up">
      <div class="eyebrow-label">Tree Pruning Watertown MA</div>
      <h2 class="section-title">The Right Cut in the Right Place Changes Everything</h2>
      <div class="prose">
        <p>Pruning is one of the most impactful things you can do for a mature tree — and one of the easiest to get wrong. The difference between a collar cut that heals cleanly and a flush cut that opens a rot column is roughly an inch of placement. Over 26 years of work in Watertown and Greater Boston, our crew has made tens of thousands of these decisions correctly, on species ranging from black walnut and white oak to weeping cherry and dawn redwood.</p>
        <p>Our pruning work prioritizes three outcomes: removing dead and diseased wood that would otherwise serve as decay entry points; eliminating codominant stems and included bark that create high-failure-risk branch attachments; and selectively thinning dense canopies to reduce wind resistance and improve light penetration to the interior crown.</p>
        <p>We never top trees. Topping removes the terminal bud, destroys the tree's natural growth architecture, and produces dozens of weakly-attached water sprouts that create far greater risk than the branch that was removed. If a tree is too large for its space, we'll discuss structural reduction or — when appropriate — responsible removal.</p>
        <p>All pruning debris is chipped on-site or hauled away. Most single-tree pruning visits in the Watertown area complete in under three hours.</p>
      </div>
      <p class="last-updated">Last Updated: April 2026</p>
    </div>

    <!-- Pruning outcomes grid -->
    <div class="pruning-points" data-animate="fade-up">
      <div class="pruning-point">
        <div class="pp-icon"><i data-lucide="heart-pulse" aria-hidden="true"></i></div>
        <div>
          <h3>Disease Prevention</h3>
          <p>Removing dead and infected wood before disease reaches the main trunk protects the tree's long-term vascular health.</p>
        </div>
      </div>
      <div class="pruning-point">
        <div class="pp-icon"><i data-lucide="wind" aria-hidden="true"></i></div>
        <div>
          <h3>Storm Resistance</h3>
          <p>Thinning dense canopies reduces the sail effect in high winds, lowering the risk of branch failure during New England storms.</p>
        </div>
      </div>
      <div class="pruning-point">
        <div class="pp-icon"><i data-lucide="sun" aria-hidden="true"></i></div>
        <div>
          <h3>Light & Air Penetration</h3>
          <p>Opening the interior canopy lets sunlight and airflow reach lower limbs and the ground below, supporting healthier growth across the whole tree.</p>
        </div>
      </div>
      <div class="pruning-point">
        <div class="pp-icon"><i data-lucide="trending-up" aria-hidden="true"></i></div>
        <div>
          <h3>Growth Direction</h3>
          <p>Strategic pruning redirects the tree's energy into the strongest scaffold branches, building a sound structure for the next 20–50 years.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── PULLQUOTE / SIGNATURE SECTION ────────────────────────────────────────── -->
<section class="pullquote-block" aria-label="Our pruning commitment">
  <div class="container">
    <div class="pullquote-inner" data-animate="fade-up">
      <p class="pullquote-text">"A properly pruned tree doesn't look pruned — it looks like it grew that way. That's the standard we apply to every cut across Watertown and Greater Boston."</p>
      <p class="pullquote-attr">— BBD Tree Service, Watertown, MA · 26 Years</p>
    </div>
  </div>
</section>

<!-- ── MID-PAGE CTA ──────────────────────────────────────────────────────────── -->
<section class="cta-banner-service">
  <div class="container" style="position:relative;z-index:1;">
    <div class="eyebrow-label" style="color:var(--color-accent);margin-bottom:var(--space-3);" data-animate="fade-up">Free Pruning Estimate</div>
    <h2 data-animate="fade-up">Ready to Give Your Trees a Longer, Healthier Life?</h2>
    <p data-animate="fade-up">Schedule a free on-site pruning assessment in Watertown this week. We'll walk the trees with you and explain exactly what we'd do and why.</p>
    <div class="cta-banner-actions" data-animate="fade-up">
      <a href="/contact" class="btn-primary">Book Your Assessment</a>
      <?php if (!empty($phone)): ?>
      <a href="tel:<?= preg_replace('/\D/','',$phone) ?>" class="btn-secondary" style="border-color:rgba(255,255,255,0.4);color:#fff;">
        <i data-lucide="phone" aria-hidden="true"></i> <?= htmlspecialchars(formatPhone($phone)) ?>
      </a>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ── PROCESS ───────────────────────────────────────────────────────────────── -->
<section class="section-pad" style="background:var(--color-bg-alt);">
  <div class="container">
    <div style="max-width:700px;margin:0 auto;">
      <div class="eyebrow-label" data-animate="fade-up">How Pruning Works</div>
      <h2 class="section-title" data-animate="fade-up">Our Pruning Process, Start to Finish</h2>
      <div class="process-steps" style="margin-top:var(--space-8);" data-animate="fade-up">
        <div class="process-step">
          <div class="step-num">1</div>
          <div class="step-body">
            <h3>Species &amp; Condition Assessment</h3>
            <p>We identify the species, evaluate the current crown structure, note any deadwood or decay, and determine the best timing for the work based on the tree's seasonal cycle.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">2</div>
          <div class="step-body">
            <h3>Pruning Goal Definition</h3>
            <p>We walk through the job with you: what the tree needs vs. what it doesn't need. You understand the scope before any tools come out.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">3</div>
          <div class="step-body">
            <h3>Selective Cutting</h3>
            <p>Each cut is made just outside the branch collar using the three-cut method on larger limbs. No stubs, no flush cuts, no topping. Every cut point is chosen deliberately.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">4</div>
          <div class="step-body">
            <h3>Cleanup &amp; Review</h3>
            <p>Debris is chipped or hauled. We do a final review of the crown to confirm balance and structure before leaving your property.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── FAQ ───────────────────────────────────────────────────────────────────── -->
<section class="section-pad" style="background:var(--color-bg);">
  <div class="container">
    <div style="max-width:760px;margin:0 auto;">
      <div class="eyebrow-label" data-animate="fade-up">Common Questions</div>
      <h2 class="section-title" data-animate="fade-up">Tree Pruning FAQs — Watertown, MA</h2>
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
    <div class="eyebrow-label" style="color:var(--color-accent);" data-animate="fade-up">Watertown Tree Pruning</div>
    <h2 style="color:#fff;font-size:clamp(1.8rem,4vw,2.6rem);margin-bottom:var(--space-4);" data-animate="fade-up">The Best Time to Prune Was Last Year. The Second Best Is Now.</h2>
    <p style="color:rgba(255,255,255,0.75);max-width:520px;margin:0 auto var(--space-8);line-height:1.7;" data-animate="fade-up">Deferred pruning means more dead wood, weaker branch attachments, and greater removal risk down the road. Schedule your free estimate this week.</p>
    <div class="cta-banner-actions" data-animate="fade-up">
      <a href="/contact#estimate" class="btn-primary">Get My Free Pruning Estimate</a>
      <?php if (!empty($phone)): ?>
      <a href="tel:<?= preg_replace('/\D/','',$phone) ?>" class="btn-secondary" style="border-color:rgba(255,255,255,0.3);color:#fff;">
        <i data-lucide="phone" aria-hidden="true"></i> <?= htmlspecialchars(formatPhone($phone)) ?>
      </a>
      <?php endif; ?>
    </div>
    <p style="color:rgba(255,255,255,0.4);font-size:0.8rem;margin-top:var(--space-6);">Serving Watertown · Cambridge · Newton · Waltham · Belmont · Arlington · Lexington</p>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
