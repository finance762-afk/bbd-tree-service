<?php
/**
 * BBD Tree Service — Stump Removal Service Page
 * Phase 4: Inner Pages
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$service     = $services[4]; // Stump Removal
$currentPage = 'stump-removal';

$pageTitle       = "Stump Removal Watertown MA | BBD Tree Service";
$pageDescription = "Complete stump removal in Watertown, MA by BBD Tree Service. We eliminate stumps and root systems entirely, restoring your landscape to a clean, usable condition.";
$pageKeywords    = implode(', ', $service['keywords']);
$canonicalUrl    = $siteUrl . '/services/stump-removal';
$ogImage         = $siteImages['photo3'];
$heroImage       = $siteImages['photo3'];

$faqs = [
    [
        'q' => 'What\'s the difference between stump grinding and stump removal?',
        'a' => 'Stump grinding reduces the stump to wood chips below grade, leaving the root system intact to decay naturally over several years. Full stump removal extracts the entire stump and root mass from the ground — a more intensive process that leaves a larger hole but eliminates the root system entirely. Grinding is sufficient for most residential situations; removal is preferable when you\'re planting a new tree in the exact same spot or need a completely clear root zone for construction.',
    ],
    [
        'q' => 'How long does full stump removal take?',
        'a' => 'Complete stump extraction in Watertown typically takes 2–4 hours for a medium-size stump, depending on root spread and soil conditions. Larger stumps with wide, entrenched root systems can take a full day. We\'ll give you a time estimate alongside the price quote after evaluating the stump on-site.',
    ],
    [
        'q' => 'Can I plant a new tree where the old stump was?',
        'a' => 'With full stump removal, yes — the root zone is cleared and the soil can be amended immediately for a new planting. With grinding only, we recommend waiting 1–2 seasons for the remaining root system to decay before planting directly in the same spot, unless you\'re planting at least 3–4 feet from the old stump location.',
    ],
    [
        'q' => 'How much does stump removal cost vs. grinding in Watertown?',
        'a' => 'Full stump removal costs more than grinding because of the additional excavation and hauling involved — typically $200–$600 for a mid-size stump compared to $100–$350 for grinding. For most homeowners, stump grinding provides the practical result they need at lower cost. We\'ll recommend the right approach for your specific situation at the estimate.',
    ],
];

$schemaMarkup = generateServiceSchema($service) . "\n" . generateFAQSchema($faqs);

$breadcrumbSchema = json_encode([
    '@context'        => 'https://schema.org',
    '@type'           => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => $siteUrl],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $siteUrl . '/services'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Stump Removal'],
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
.service-hero { min-height: 55vh; display: flex; align-items: flex-end; position: relative; overflow: hidden; background-image: url('<?= htmlspecialchars($siteImages['photo3']) ?>'); background-size: cover; background-position: center 40%; }
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

/* Staggered comparison cards — signature layout */
.option-cards { display:grid; grid-template-columns:repeat(2,1fr); gap:var(--space-6); margin-top:var(--space-8); }
@media (max-width:767px) { .option-cards { grid-template-columns:1fr; } }
.option-card { border-radius:var(--radius-lg); overflow:hidden; box-shadow:var(--shadow-md); }
.option-card-header { padding:var(--space-5) var(--space-6); }
.option-card.grinding .option-card-header { background:rgba(45,106,0,0.06); border-bottom:1px solid rgba(45,106,0,0.08); }
.option-card.removal  .option-card-header { background:var(--color-primary); }
.option-card-header h3 { font-size:1.1rem; font-weight:800; margin-bottom:var(--space-1); }
.option-card.grinding .option-card-header h3 { color:var(--color-primary); }
.option-card.removal  .option-card-header h3 { color:#fff; }
.option-card-header .option-tag { font-size:0.72rem; text-transform:uppercase; letter-spacing:1.5px; font-weight:700; }
.option-card.grinding .option-tag { color:var(--color-text-light); }
.option-card.removal  .option-tag { color:var(--color-accent); }
.option-card-body { background:var(--color-bg); padding:var(--space-5) var(--space-6); }
.option-card-body ul { list-style:none; display:flex; flex-direction:column; gap:var(--space-2); }
.option-card-body li { display:flex; gap:var(--space-2); font-size:0.875rem; color:var(--color-text-light); align-items:flex-start; }
.option-card-body li i { flex-shrink:0; margin-top:2px; }
.option-card.grinding li i { color:var(--color-text-light); }
.option-card.removal  li i { color:var(--color-accent); }

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
        <span class="current">Stump Removal</span>
      </nav>
      <div class="service-hero-eyebrow">
        <i data-lucide="minus-circle" aria-hidden="true"></i>
        Watertown, MA
      </div>
      <h1>Complete Stump &amp; Root <span class="accent">Elimination</span></h1>
      <p class="service-hero-sub">When grinding isn't enough — full stump extraction clears the root mass entirely and leaves your landscape truly reset, ready for new plantings or hardscape.</p>
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
      <span>Full Root Mass Removed</span><span class="ticker-sep">✦</span><span>Landscaping-Ready Finish</span><span class="ticker-sep">✦</span><span>Licensed &amp; Insured</span><span class="ticker-sep">✦</span><span>26 Years Experience</span><span class="ticker-sep">✦</span><span>Free Estimates</span><span class="ticker-sep">✦</span>
    </div>
    <div class="ticker-content" aria-hidden="true">
      <span>Full Root Mass Removed</span><span class="ticker-sep">✦</span><span>Landscaping-Ready Finish</span><span class="ticker-sep">✦</span><span>Licensed &amp; Insured</span><span class="ticker-sep">✦</span><span>26 Years Experience</span><span class="ticker-sep">✦</span><span>Free Estimates</span><span class="ticker-sep">✦</span>
    </div>
  </div>
</div>

<section class="section-pad" style="background:var(--color-bg);">
  <div class="container">
    <div class="answer-block" data-animate="fade-up">
      <h2>Who actually needs full stump removal vs. grinding?</h2>
      <p>Full removal is the right choice when you're planting a new tree in the same exact location, when the root system is causing heaving in a driveway or patio, or when you're preparing the ground for construction. For most homeowners who just want the stump out of sight and the lawn usable again, grinding delivers that result faster and at lower cost.</p>
    </div>

    <div style="max-width:800px;margin-bottom:var(--space-10);" data-animate="fade-up">
      <div class="eyebrow-label">Stump Removal Watertown MA</div>
      <h2 class="section-title">When the Root System Itself Needs to Go</h2>
      <div class="prose">
        <p>Most stump situations in Watertown are resolved efficiently with grinding — but there are cases where full extraction is the right call. When a root system is heaving pavement, when you need a clean slate for immediate replanting, or when a stump's roots are encroaching on a foundation or utility line, complete removal eliminates the problem at its source.</p>
        <p>BBD Tree Service handles full stump extraction using a combination of root pruning, mechanical leverage, and where necessary, excavation equipment. The stump and the bulk of the lateral root system come out of the ground intact. The resulting void is backfilled with clean topsoil and tamped to prevent settling, leaving a plantable, level surface.</p>
        <p>This is a more labor-intensive process than grinding, which is reflected in the pricing — but in the right circumstances, it's the approach that actually solves the problem. We'll give you an honest recommendation at the estimate: grinding vs. removal, with the reasoning behind our advice.</p>
      </div>
      <p class="last-updated">Last Updated: April 2026</p>
    </div>

    <!-- Staggered comparison cards -->
    <div class="eyebrow-label" data-animate="fade-up">Grinding vs. Full Removal</div>
    <h2 class="section-title" data-animate="fade-up">Which Option Is Right for Your Situation?</h2>
    <div class="option-cards" data-animate="fade-up">
      <div class="option-card grinding">
        <div class="option-card-header">
          <div class="option-tag">Stump Grinding</div>
          <h3>Fast, Affordable, Practical</h3>
        </div>
        <div class="option-card-body">
          <ul>
            <li><i data-lucide="check" aria-hidden="true"></i><span>Ground 6–12" below grade</span></li>
            <li><i data-lucide="check" aria-hidden="true"></i><span>Root system remains, decays naturally (1–3 years)</span></li>
            <li><i data-lucide="check" aria-hidden="true"></i><span>Best for: lawn restoration, mulch bed, most residential situations</span></li>
            <li><i data-lucide="check" aria-hidden="true"></i><span>Lower cost, faster completion</span></li>
          </ul>
        </div>
      </div>
      <div class="option-card removal">
        <div class="option-card-header">
          <div class="option-tag">Full Stump Removal</div>
          <h3>Complete Root Elimination</h3>
        </div>
        <div class="option-card-body">
          <ul>
            <li><i data-lucide="check" aria-hidden="true"></i><span>Stump and root mass fully extracted</span></li>
            <li><i data-lucide="check" aria-hidden="true"></i><span>Void backfilled with clean topsoil</span></li>
            <li><i data-lucide="check" aria-hidden="true"></i><span>Best for: immediate replanting, heaving pavement, construction prep</span></li>
            <li><i data-lucide="check" aria-hidden="true"></i><span>Complete solution for complex root situations</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="cta-banner-service">
  <div class="container" style="position:relative;z-index:1;">
    <div class="eyebrow-label" style="color:var(--color-accent);margin-bottom:var(--space-3);" data-animate="fade-up">Watertown Stump Removal</div>
    <h2 data-animate="fade-up">Not Sure Whether You Need Grinding or Full Removal?</h2>
    <p data-animate="fade-up">We'll evaluate your stump on-site and give you a clear recommendation — with pricing for both options — at no charge.</p>
    <div class="cta-banner-actions" data-animate="fade-up">
      <a href="/contact" class="btn-primary">Schedule a Free Site Visit</a>
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
      <div class="eyebrow-label" data-animate="fade-up">The Process</div>
      <h2 class="section-title" data-animate="fade-up">How Full Stump Removal Works</h2>
      <div class="process-steps" style="margin-top:var(--space-8);" data-animate="fade-up">
        <div class="process-step">
          <div class="step-num">1</div>
          <div class="step-body">
            <h3>Root System Assessment</h3>
            <p>We evaluate the stump diameter, root spread, soil type, and proximity to utilities, structures, and landscape features to plan the safest extraction approach.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">2</div>
          <div class="step-body">
            <h3>Root Pruning</h3>
            <p>Major lateral roots are cut at the outer edge of the extraction zone using a root saw or trenching tool, freeing the stump from its anchor points.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">3</div>
          <div class="step-body">
            <h3>Stump Extraction</h3>
            <p>Using a combination of mechanical leverage and equipment as needed, the stump and root mass are lifted from the ground and removed from your property.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">4</div>
          <div class="step-body">
            <h3>Void Backfill &amp; Site Finish</h3>
            <p>The hole is filled with clean topsoil, tamped to prevent settling, and raked smooth. The site is left level and ready for immediate planting or landscaping.</p>
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
      <h2 class="section-title" data-animate="fade-up">Stump Removal FAQs — Watertown, MA</h2>
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
    <div class="eyebrow-label" style="color:var(--color-accent);" data-animate="fade-up">Watertown Stump Removal</div>
    <h2 style="color:#fff;font-size:clamp(1.8rem,4vw,2.6rem);margin-bottom:var(--space-4);" data-animate="fade-up">Ready to Clear That Space for Good?</h2>
    <p style="color:rgba(255,255,255,0.75);max-width:520px;margin:0 auto var(--space-8);line-height:1.7;" data-animate="fade-up">Whether you need grinding or full removal, we'll tell you honestly which approach solves your problem — and give you a written quote on the spot.</p>
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
