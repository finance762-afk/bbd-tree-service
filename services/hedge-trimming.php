<?php
/**
 * BBD Tree Service — Hedge Trimming Service Page
 * Phase 4: Inner Pages
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$service     = $services[7]; // Hedge Trimming
$currentPage = 'hedge-trimming';

$pageTitle       = "Hedge Trimming Watertown MA | BBD Tree Service";
$pageDescription = "Professional hedge trimming & shaping in Watertown, MA. BBD Tree Service keeps your hedges, shrubs & borders clean, healthy & precisely shaped year-round. Free estimates.";
$pageKeywords    = implode(', ', $service['keywords']);
$canonicalUrl    = $siteUrl . '/services/hedge-trimming';
$ogImage         = $siteImages['branches3'];
$heroImage       = $siteImages['branches3'];

$faqs = [
    [
        'q' => 'How often should hedges be trimmed in Watertown, MA?',
        'a' => 'Most formal hedges (boxwood, privet, arborvitae, yew) in Watertown benefit from 2–3 trims per growing season — typically in late spring after the first flush of growth, mid-summer, and early fall. Informal or naturalistic hedges may need only one annual shaping. Fast-growing species like privet can require monthly attention during peak season.',
    ],
    [
        'q' => 'When is the best time to trim hedges in Massachusetts?',
        'a' => 'Avoid trimming during the hottest part of summer, as fresh cuts in July heat can stress the plant. The ideal windows in Massachusetts are late spring (after the first growth flush, typically late May), and again in late August through September. Heavy shaping is best done in early spring before buds open.',
    ],
    [
        'q' => 'Can you shape overgrown hedges that haven\'t been maintained in years?',
        'a' => 'Yes, though severe rejuvenation is best done gradually over 2–3 seasons to avoid shocking the plant. We\'ll evaluate the hedge at the estimate and tell you honestly how much can be reduced at once and what the recovery timeline looks like for your specific species.',
    ],
    [
        'q' => 'Do you remove all the clippings after hedge trimming?',
        'a' => 'All hedge clippings are raked up and either chipped on-site or hauled away — your choice. We leave beds and lawn areas clean before we leave. Fine clippings from an established hedge can be left as mulch in the bed if preferred.',
    ],
];

$schemaMarkup = generateServiceSchema($service) . "\n" . generateFAQSchema($faqs);

$breadcrumbSchema = json_encode([
    '@context'        => 'https://schema.org',
    '@type'           => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => $siteUrl],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $siteUrl . '/services'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Hedge Trimming'],
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
.service-hero { min-height: 52vh; display: flex; align-items: flex-end; position: relative; overflow: hidden; background-image: url('<?= htmlspecialchars($siteImages['branches3']) ?>'); background-size: cover; background-position: center 45%; }
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

/* Hedge type grid — signature layout with staggered heights */
.hedge-type-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:var(--space-4); margin-top:var(--space-8); }
@media (max-width:1023px) { .hedge-type-grid { grid-template-columns:repeat(2,1fr); } }
@media (max-width:767px)  { .hedge-type-grid { grid-template-columns:1fr; } }
.hedge-type-card { background:var(--color-bg); border-radius:var(--radius-lg); overflow:hidden; box-shadow:var(--shadow-sm); border:1px solid rgba(45,106,0,0.07); }
.hedge-type-card:nth-child(2) { margin-top:var(--space-6); }
.hedge-type-card:nth-child(3) { margin-top:var(--space-3); }
@media (max-width:767px) { .hedge-type-card:nth-child(n) { margin-top:0; } }
.hedge-type-img { aspect-ratio:16/9; overflow:hidden; }
.hedge-type-img img { width:100%; height:100%; object-fit:cover; transition:transform 0.4s ease; }
.hedge-type-card:hover .hedge-type-img img { transform:scale(1.06); }
.hedge-type-body { padding:var(--space-5); }
.hedge-type-body h3 { font-size:0.95rem; font-weight:700; color:var(--color-primary); margin-bottom:var(--space-1); }
.hedge-type-body p  { font-size:0.85rem; color:var(--color-text-light); line-height:1.6; }

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
        <span class="current">Hedge Trimming</span>
      </nav>
      <div class="service-hero-eyebrow">
        <i data-lucide="align-justify" aria-hidden="true"></i>
        Watertown, MA
      </div>
      <h1><span class="accent">Crisp, Clean Lines</span><br>Every Visit</h1>
      <p class="service-hero-sub">Professional hedge and shrub trimming that keeps your Watertown property's borders precise, healthy, and polished — season after season.</p>
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
      <span>Precision Shaping</span><span class="ticker-sep">✦</span><span>All Hedge Species</span><span class="ticker-sep">✦</span><span>Licensed &amp; Insured</span><span class="ticker-sep">✦</span><span>26 Years Experience</span><span class="ticker-sep">✦</span><span>Full Cleanup</span><span class="ticker-sep">✦</span><span>Free Estimates</span><span class="ticker-sep">✦</span>
    </div>
    <div class="ticker-content" aria-hidden="true">
      <span>Precision Shaping</span><span class="ticker-sep">✦</span><span>All Hedge Species</span><span class="ticker-sep">✦</span><span>Licensed &amp; Insured</span><span class="ticker-sep">✦</span><span>26 Years Experience</span><span class="ticker-sep">✦</span><span>Full Cleanup</span><span class="ticker-sep">✦</span><span>Free Estimates</span><span class="ticker-sep">✦</span>
    </div>
  </div>
</div>

<section class="section-pad" style="background:var(--color-bg);">
  <div class="container">
    <div class="answer-block" data-animate="fade-up">
      <h2>What's the right way to trim hedges so they stay healthy in Massachusetts?</h2>
      <p>Proper hedge trimming uses clean, sharp tools to cut just above a leaf node or bud — not mid-stem where the cut will die back and brown. The top of a formal hedge should be slightly narrower than the base so sunlight reaches all levels of growth. Overly wide or flat-topped hedges develop bare interiors over time. BBD Tree Service shapes hedges to promote healthy, dense growth, not just surface appearance.</p>
    </div>

    <div style="max-width:800px;margin-bottom:var(--space-10);" data-animate="fade-up">
      <div class="eyebrow-label">Hedge Trimming Watertown MA</div>
      <h2 class="section-title">Hedges That Look Maintained Year-Round, Not Just Right After a Trim</h2>
      <div class="prose">
        <p>The difference between a hedge that looks great the week after trimming and one that holds its form for months comes down to technique, timing, and the species-specific understanding of how fast it grows back. BBD Tree Service has been shaping hedges on Watertown and Cambridge properties for 26 years — boxwood borders along historic front walks, arborvitae privacy screens along property lines, formal privet hedges in back gardens, and overgrown yew hedges that haven't been touched in a decade.</p>
        <p>We trim hedges to maintain a slight taper (wider at the base) that ensures good light penetration and prevents interior dieback. This is the single most common mistake homeowners and less experienced crews make — shaping the hedge flat or wider at the top, which gradually starves the lower growth and leaves a bare, brown interior that takes years to recover.</p>
        <p>All trimming work includes full cleanup. Clippings are raked from the lawn and beds before we leave. We can also coordinate hedge trimming with a larger property maintenance visit to handle trees, stumps, and shrubs in a single scheduled call.</p>
      </div>
      <p class="last-updated">Last Updated: April 2026</p>
    </div>

    <!-- Staggered hedge type cards — signature layout -->
    <div class="eyebrow-label" data-animate="fade-up">What We Trim</div>
    <h2 class="section-title" data-animate="fade-up">Hedges, Shrubs &amp; Privacy Screens in Watertown</h2>
    <div class="hedge-type-grid">
      <div class="hedge-type-card" data-animate="fade-up">
        <div class="hedge-type-img">
          <img src="<?= htmlspecialchars($siteImages['branches4']) ?>" alt="Boxwood hedge trimming Watertown MA" width="600" height="338" loading="lazy">
        </div>
        <div class="hedge-type-body">
          <h3>Formal Hedges</h3>
          <p>Boxwood, yew, privet — precision-shaped to clean geometric lines that define garden borders and pathways.</p>
        </div>
      </div>
      <div class="hedge-type-card" data-animate="fade-up">
        <div class="hedge-type-img">
          <img src="<?= htmlspecialchars($siteImages['branches1']) ?>" alt="Arborvitae privacy screen trimming Watertown MA" width="600" height="338" loading="lazy">
        </div>
        <div class="hedge-type-body">
          <h3>Privacy Screens</h3>
          <p>Arborvitae, Leyland cypress, and holly rows trimmed to maintain density, height, and clean vertical lines.</p>
        </div>
      </div>
      <div class="hedge-type-card" data-animate="fade-up">
        <div class="hedge-type-img">
          <img src="<?= htmlspecialchars($siteImages['branches2']) ?>" alt="Ornamental shrub trimming Watertown MA" width="600" height="338" loading="lazy">
        </div>
        <div class="hedge-type-body">
          <h3>Ornamental Shrubs</h3>
          <p>Foundation plantings, flowering shrubs, and specimen plants shaped to complement your home's architecture.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="cta-banner-service">
  <div class="container" style="position:relative;z-index:1;">
    <div class="eyebrow-label" style="color:var(--color-accent);margin-bottom:var(--space-3);" data-animate="fade-up">Hedge Trimming Watertown MA</div>
    <h2 data-animate="fade-up">Hedges Looking Ragged Around the Edges?</h2>
    <p data-animate="fade-up">Get a free estimate for your Watertown property's hedges and shrubs. We'll give you a written quote and can often schedule within 1–2 weeks.</p>
    <div class="cta-banner-actions" data-animate="fade-up">
      <a href="/contact" class="btn-primary">Get a Hedge Trimming Quote</a>
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
      <div class="eyebrow-label" data-animate="fade-up">How We Work</div>
      <h2 class="section-title" data-animate="fade-up">The Hedge Trimming Process</h2>
      <div class="process-steps" style="margin-top:var(--space-8);" data-animate="fade-up">
        <div class="process-step">
          <div class="step-num">1</div>
          <div class="step-body">
            <h3>Species &amp; Condition Review</h3>
            <p>We identify your hedge species, note its current density, height, and any dieback, and recommend the right approach for the season and your goals.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">2</div>
          <div class="step-body">
            <h3>Shape Confirmation</h3>
            <p>Before any cutting, we confirm your desired height, width, and form — whether you want formal geometry or a more naturalistic shape — and mark reference lines as needed.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">3</div>
          <div class="step-body">
            <h3>Precision Cutting</h3>
            <p>Using clean, sharp hedgers and hand tools for detail work, we cut to the confirmed lines — always maintaining a slight base-wide taper for healthy interior growth.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">4</div>
          <div class="step-body">
            <h3>Cleanup &amp; Bed Raking</h3>
            <p>All clippings are raked from the lawn and beds. The area is swept or blown clean. Clippings are hauled away or left as mulch in the bed — your preference.</p>
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
      <h2 class="section-title" data-animate="fade-up">Hedge Trimming FAQs — Watertown, MA</h2>
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
    <div class="eyebrow-label" style="color:var(--color-accent);" data-animate="fade-up">Watertown Hedge Trimming</div>
    <h2 style="color:#fff;font-size:clamp(1.8rem,4vw,2.6rem);margin-bottom:var(--space-4);" data-animate="fade-up">Sharp Hedges Signal a Well-Maintained Property</h2>
    <p style="color:rgba(255,255,255,0.75);max-width:520px;margin:0 auto var(--space-8);line-height:1.7;" data-animate="fade-up">Don't let another growing season go by with hedges that are taking over your walkway or losing their shape. Get a free quote this week.</p>
    <div class="cta-banner-actions" data-animate="fade-up">
      <a href="/contact#estimate" class="btn-primary">Get My Free Estimate</a>
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
