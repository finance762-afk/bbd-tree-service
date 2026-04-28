<?php
/**
 * BBD Tree Service — Tree Removal Service Page
 * Phase 4: Inner Pages
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$service     = $services[0]; // Tree Removal
$currentPage = 'tree-removal';

$pageTitle       = "Tree Removal Watertown MA | BBD Tree Service";
$pageDescription = "Expert tree removal in Watertown, MA. BBD Tree Service safely removes dangerous, diseased & unwanted trees of any size. Licensed & insured. Free estimates. Call today.";
$pageKeywords    = implode(', ', $service['keywords']);
$canonicalUrl    = $siteUrl . '/services/tree-removal';
$ogImage         = $siteImages['hero'];
$heroImage       = $siteImages['hero'];

$faqs = [
    [
        'q' => 'How much does tree removal cost in Watertown, MA?',
        'a' => 'Tree removal in Watertown typically runs $400–$1,800 depending on tree height, trunk diameter, and proximity to buildings or power lines. A small tree under 30 feet costs $400–$700; large trees over 60 feet can reach $1,200–$1,800. We provide exact written quotes after a free on-site assessment.',
    ],
    [
        'q' => 'Do you offer emergency tree removal near Watertown?',
        'a' => 'Yes. When a storm-damaged or suddenly leaning tree creates an immediate hazard, call BBD Tree Service directly. We respond to urgent situations throughout Watertown and the surrounding Greater Boston communities, dispatching a crew to assess and mitigate the risk as quickly as possible.',
    ],
    [
        'q' => 'Will you clean up after removing the tree?',
        'a' => 'Full cleanup is included with every removal job. We chip branches on-site, section and haul the trunk, and rake the area clean. The only thing we leave behind is a level patch of ground — the stump can be ground separately or in the same visit.',
    ],
    [
        'q' => 'Do I need a permit to remove a tree in Watertown?',
        'a' => 'Watertown requires a permit for the removal of trees in the public right-of-way, and some large private trees may also require approval depending on your property\'s location. BBD Tree Service handles permit inquiries and can advise you on what\'s required before any work begins.',
    ],
];

$schemaMarkup = generateServiceSchema($service) . "\n" . generateFAQSchema($faqs);

$breadcrumbSchema = json_encode([
    '@context'        => 'https://schema.org',
    '@type'           => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => $siteUrl],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $siteUrl . '/services'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Tree Removal'],
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
/* ── Service Hero ─────────────────────────────────────────────────── */
.service-hero {
  min-height: 55vh;
  display: flex;
  align-items: flex-end;
  position: relative;
  overflow: hidden;
  background-image: url('<?= htmlspecialchars($siteImages['hero']) ?>');
  background-size: cover;
  background-position: center 30%;
}
.service-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(160deg, rgba(10,18,28,0.88) 0%, rgba(45,106,0,0.72) 60%, rgba(108,194,0,0.10) 100%);
  z-index: 1;
}
.service-hero-inner {
  position: relative;
  z-index: 2;
  width: 100%;
  padding: 60px 0 50px;
}
.breadcrumb-nav {
  display: flex;
  align-items: center;
  gap: var(--space-2);
  font-size: 0.8rem;
  color: rgba(255,255,255,0.6);
  margin-bottom: var(--space-4);
  flex-wrap: wrap;
}
.breadcrumb-nav a { color: rgba(255,255,255,0.6); transition: color var(--transition); }
.breadcrumb-nav a:hover { color: var(--color-accent); }
.breadcrumb-nav .sep { color: rgba(255,255,255,0.3); }
.breadcrumb-nav .current { color: rgba(255,255,255,0.9); }
.service-hero-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: var(--space-2);
  background: rgba(108,194,0,0.12);
  border: 1px solid rgba(108,194,0,0.35);
  border-radius: 999px;
  padding: 5px 16px;
  font-size: 0.7rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 2px;
  color: var(--color-accent);
  margin-bottom: var(--space-4);
}
.service-hero h1 {
  font-size: clamp(2.2rem, 5vw, 3.8rem);
  font-weight: 800;
  line-height: 1.1;
  letter-spacing: -0.025em;
  color: #fff;
  text-wrap: balance;
  margin-bottom: var(--space-4);
}
.service-hero h1 .accent { color: var(--color-accent); }
.service-hero-sub {
  font-size: 1.05rem;
  color: rgba(255,255,255,0.82);
  max-width: 560px;
  line-height: 1.7;
  margin-bottom: var(--space-6);
}
.hero-cta-row {
  display: flex;
  align-items: center;
  gap: var(--space-4);
  flex-wrap: wrap;
}
/* ── Section Divider ──────────────────────────────────────────────── */
.divider-wave {
  overflow: hidden;
  line-height: 0;
  background: var(--color-bg);
}
.divider-wave svg { display: block; }
.divider-diagonal {
  height: 60px;
  background: var(--color-bg-alt);
  clip-path: polygon(0 0, 100% 0, 100% 100%, 0 60%);
}
/* ── Detail Section ───────────────────────────────────────────────── */
.service-detail-grid {
  display: grid;
  grid-template-columns: 1fr 420px;
  gap: var(--space-12);
  align-items: start;
}
@media (max-width: 1023px) {
  .service-detail-grid { grid-template-columns: 1fr; }
}
.service-img-stack {
  position: relative;
  padding-bottom: var(--space-8);
}
.service-img-main {
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-lg);
  aspect-ratio: 4/3;
}
.service-img-main img { width: 100%; height: 100%; object-fit: cover; display: block; }
.service-img-badge {
  position: absolute;
  bottom: 0;
  right: -20px;
  background: var(--color-primary);
  color: #fff;
  border-radius: var(--radius-lg);
  padding: var(--space-4) var(--space-5);
  box-shadow: var(--shadow-lg);
  text-align: center;
  min-width: 130px;
}
.service-img-badge .badge-num { font-size: 2rem; font-weight: 800; color: var(--color-accent); line-height: 1; }
.service-img-badge .badge-label { font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; opacity: 0.8; }
@media (max-width: 1023px) { .service-img-badge { right: 0; } }
/* ── Why Choose Us ────────────────────────────────────────────────── */
.why-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: var(--space-5);
}
@media (max-width: 767px) { .why-grid { grid-template-columns: 1fr; } }
.why-card {
  background: var(--color-bg);
  border-radius: var(--radius-lg);
  padding: var(--space-6);
  border: 1px solid rgba(45,106,0,0.08);
  box-shadow: var(--shadow-sm);
  transition: transform var(--transition), box-shadow var(--transition);
}
.why-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); }
.why-card .icon-wrap {
  width: 48px; height: 48px;
  background: rgba(108,194,0,0.1);
  border-radius: var(--radius);
  display: flex; align-items: center; justify-content: center;
  color: var(--color-accent);
  margin-bottom: var(--space-3);
}
.why-card h3 { font-size: 1rem; font-weight: 700; margin-bottom: var(--space-2); color: var(--color-primary); }
.why-card p  { font-size: 0.9rem; color: var(--color-text-light); line-height: 1.6; }
/* ── Process Steps ────────────────────────────────────────────────── */
.process-steps {
  display: flex;
  flex-direction: column;
  gap: 0;
  position: relative;
}
.process-steps::before {
  content: '';
  position: absolute;
  left: 24px;
  top: 48px;
  bottom: 0;
  width: 2px;
  background: linear-gradient(to bottom, var(--color-accent), transparent);
}
.process-step {
  display: flex;
  gap: var(--space-6);
  padding-bottom: var(--space-8);
  position: relative;
}
.step-num {
  flex-shrink: 0;
  width: 48px; height: 48px;
  background: var(--color-primary);
  border: 3px solid var(--color-accent);
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-family: var(--font-heading);
  font-weight: 800;
  font-size: 1rem;
  color: var(--color-accent);
  position: relative;
  z-index: 1;
}
.step-body h3 { font-size: 1.05rem; font-weight: 700; color: var(--color-primary); margin-bottom: var(--space-2); padding-top: 10px; }
.step-body p  { font-size: 0.9rem; color: var(--color-text-light); line-height: 1.65; }
/* ── FAQ ──────────────────────────────────────────────────────────── */
.faq-list { display: flex; flex-direction: column; gap: var(--space-3); }
.faq-item {
  background: var(--color-bg);
  border: 1px solid rgba(45,106,0,0.1);
  border-radius: var(--radius-lg);
  overflow: hidden;
}
.faq-item summary {
  padding: var(--space-5) var(--space-6);
  font-weight: 700;
  font-size: 0.95rem;
  color: var(--color-primary);
  cursor: pointer;
  list-style: none;
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: var(--space-3);
}
.faq-item summary::-webkit-details-marker { display: none; }
.faq-item summary::after { content: '+'; font-size: 1.3rem; color: var(--color-accent); flex-shrink: 0; }
.faq-item[open] summary::after { content: '−'; }
.faq-answer { padding: 0 var(--space-6) var(--space-5); font-size: 0.92rem; color: var(--color-text-light); line-height: 1.7; }
/* ── CTA Banner ───────────────────────────────────────────────────── */
.cta-banner-service {
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
  position: relative;
  overflow: hidden;
  text-align: center;
  padding: var(--space-16) var(--space-5);
}
.cta-banner-service::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
  pointer-events: none;
}
.cta-banner-service .eyebrow { color: var(--color-accent); margin-bottom: var(--space-3); }
.cta-banner-service h2 { color: #fff; margin-bottom: var(--space-3); font-size: clamp(1.8rem,4vw,2.6rem); }
.cta-banner-service p  { color: rgba(255,255,255,0.8); margin-bottom: var(--space-6); font-size: 1rem; }
.cta-banner-actions { display: flex; align-items: center; justify-content: center; gap: var(--space-4); flex-wrap: wrap; }
/* ── Answer Block ─────────────────────────────────────────────────── */
.answer-block {
  background: rgba(108,194,0,0.06);
  border-left: 4px solid var(--color-accent);
  border-radius: 0 var(--radius-lg) var(--radius-lg) 0;
  padding: var(--space-5) var(--space-6);
  margin-bottom: var(--space-6);
}
.answer-block h2 { font-size: 1.1rem; font-weight: 700; color: var(--color-primary); margin-bottom: var(--space-2); }
.answer-block p  { font-size: 0.92rem; color: var(--color-text-light); line-height: 1.7; margin: 0; }
/* ── Last Updated ─────────────────────────────────────────────────── */
.last-updated { font-size: 0.78rem; color: var(--color-text-muted, #999); margin-top: var(--space-6); }
</style>

<!-- ── SERVICE HERO ──────────────────────────────────────────────────────────── -->
<section class="service-hero">
  <div class="service-hero-inner">
    <div class="container">
      <nav class="breadcrumb-nav" aria-label="Breadcrumb">
        <a href="/">Home</a>
        <span class="sep" aria-hidden="true">›</span>
        <a href="/services">Services</a>
        <span class="sep" aria-hidden="true">›</span>
        <span class="current">Tree Removal</span>
      </nav>
      <div class="service-hero-eyebrow">
        <i data-lucide="tree" aria-hidden="true"></i>
        Watertown, MA
      </div>
      <h1>Tree Removal <span class="accent">Done Right</span><br>— the First Time</h1>
      <p class="service-hero-sub">Safe, efficient removal of any tree — any size — with full cleanup included. Serving Watertown and Greater Boston for 26 years.</p>
      <div class="hero-cta-row">
        <a href="/contact" class="btn-primary">
          <i data-lucide="clipboard-list" aria-hidden="true"></i>
          Get a Free Estimate
        </a>
        <?php if (!empty($phone)): ?>
        <a href="tel:<?= preg_replace('/\D/','',$phone) ?>" class="btn-secondary" style="background:rgba(255,255,255,0.1);border-color:rgba(255,255,255,0.3);color:#fff;">
          <i data-lucide="phone" aria-hidden="true"></i>
          <?= htmlspecialchars(formatPhone($phone)) ?>
        </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<!-- ── PROOF TICKER ──────────────────────────────────────────────────────────── -->
<div class="ticker-strip" aria-hidden="true">
  <div class="ticker-track">
    <div class="ticker-content">
      <span>Licensed &amp; Insured</span><span class="ticker-sep">✦</span>
      <span>26 Years in Watertown</span><span class="ticker-sep">✦</span>
      <span>Free On-Site Estimates</span><span class="ticker-sep">✦</span>
      <span>Emergency Response</span><span class="ticker-sep">✦</span>
      <span>Full Cleanup Included</span><span class="ticker-sep">✦</span>
      <span>All Tree Sizes</span><span class="ticker-sep">✦</span>
      <span>Certified Arborists</span><span class="ticker-sep">✦</span>
    </div>
    <div class="ticker-content" aria-hidden="true">
      <span>Licensed &amp; Insured</span><span class="ticker-sep">✦</span>
      <span>26 Years in Watertown</span><span class="ticker-sep">✦</span>
      <span>Free On-Site Estimates</span><span class="ticker-sep">✦</span>
      <span>Emergency Response</span><span class="ticker-sep">✦</span>
      <span>Full Cleanup Included</span><span class="ticker-sep">✦</span>
      <span>All Tree Sizes</span><span class="ticker-sep">✦</span>
      <span>Certified Arborists</span><span class="ticker-sep">✦</span>
    </div>
  </div>
</div>

<!-- ── SERVICE DETAIL ────────────────────────────────────────────────────────── -->
<section class="section-pad" style="background:var(--color-bg);">
  <div class="container">

    <div class="answer-block" data-animate="fade-up">
      <h2>What does tree removal in Watertown, MA actually involve?</h2>
      <p>Tree removal means safely felling or dismantling a tree — from cutting and lowering branches to sectioning the trunk — then hauling everything off your property and raking clean. BBD Tree Service completes most residential removals in a single visit, typically in 2–6 hours depending on size and site conditions.</p>
    </div>

    <div class="service-detail-grid">
      <!-- Copy -->
      <div>
        <div class="eyebrow-label" data-animate="fade-up">Tree Removal Watertown MA</div>
        <h2 class="section-title" data-animate="fade-up">When a Tree Needs to Come Down, We Make It Straightforward</h2>
        <div class="prose" data-animate="fade-up">
          <p>Not every tree removal is an emergency, but every one requires the same level of precision. Whether a storm left a 60-foot oak half-suspended over your roof, or a dead birch is finally posing a risk to your Watertown property, BBD Tree Service brings the right equipment and the experience to remove it without damage to your lawn, fence, or foundation.</p>
          <p>We handle the full range: small ornamental trees under 20 feet, mid-size shade trees, large-canopy hardwoods over 80 feet, and everything in between. Every job begins with a free on-site walk — our crew assesses lean, root zone, proximity to structures, and access points before a single rope is tied. You get an exact price upfront with no surprise add-ons.</p>
          <p>Tree removal in Greater Boston means working in tight yards, around historic stone walls, and near power distribution lines — all of which require specific techniques. Our team uses rigging and controlled lowering for trees where a straight fell isn't possible, protecting your landscape throughout the process. We've completed hundreds of complex removals across Watertown, Cambridge, Newton, and Belmont over 26 years.</p>
          <p>Stump grinding can be added to any removal at booking — we grind 6–12 inches below grade and rake all chips clean. If you'd prefer to handle the stump later, we'll leave it level and out of the way.</p>
        </div>
        <p class="last-updated">Last Updated: April 2026</p>
      </div>

      <!-- Image Stack -->
      <div class="service-img-stack img-reveal" data-animate="wipe-right">
        <div class="service-img-main">
          <img alt="BBD Tree Service crew removing a large tree in Watertown MA"
               src="<?= htmlspecialchars($siteImages['hero']) ?>"
               width="840" height="630" loading="lazy">
        </div>
        <div class="service-img-badge">
          <div class="badge-num">26</div>
          <div class="badge-label">Years Serving<br>Watertown</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── CTA BANNER #2 (Mid-Page) ──────────────────────────────────────────────── -->
<section class="cta-banner-service">
  <div class="container" style="position:relative;z-index:1;">
    <div class="eyebrow-label eyebrow" data-animate="fade-up">Free Estimate — No Obligation</div>
    <h2 data-animate="fade-up">Ready to Remove That Problem Tree?</h2>
    <p data-animate="fade-up">Get an exact quote for your Watertown tree removal. We'll come to you, walk the site, and give you a written price — usually same week.</p>
    <div class="cta-banner-actions" data-animate="fade-up">
      <a href="/contact" class="btn-primary">Request an Estimate</a>
      <?php if (!empty($phone)): ?>
      <a href="tel:<?= preg_replace('/\D/','',$phone) ?>" class="btn-secondary" style="border-color:rgba(255,255,255,0.4);color:#fff;">
        <i data-lucide="phone" aria-hidden="true"></i> <?= htmlspecialchars(formatPhone($phone)) ?>
      </a>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ── WHY CHOOSE US ─────────────────────────────────────────────────────────── -->
<section class="section-pad" style="background:var(--color-bg-alt);">
  <div class="container">
    <div class="eyebrow-label text-center" data-animate="fade-up">Why BBD Tree Service</div>
    <h2 class="section-title text-center" data-animate="fade-up">What Sets Our Tree Removal Apart</h2>
    <div class="why-grid" style="margin-top:var(--space-8);">
      <div class="why-card" data-animate="fade-up">
        <div class="icon-wrap"><i data-lucide="shield-check" aria-hidden="true"></i></div>
        <h3>Full Liability Coverage</h3>
        <p>Every crew member on your property is covered by comprehensive general liability and workers' compensation. You're not exposed to any risk if something unexpected happens.</p>
      </div>
      <div class="why-card" data-animate="fade-up">
        <div class="icon-wrap"><i data-lucide="zap" aria-hidden="true"></i></div>
        <h3>Same-Week Scheduling</h3>
        <p>Most non-emergency removals in Watertown and the surrounding area are scheduled within 3–5 business days. Urgent situations get priority attention.</p>
      </div>
      <div class="why-card" data-animate="fade-up">
        <div class="icon-wrap"><i data-lucide="package" aria-hidden="true"></i></div>
        <h3>Cleanup to the Last Chip</h3>
        <p>No logs left on the lawn, no branches pushed into a corner. We haul every piece of wood and rake the area before we leave — your yard looks better than when we arrived.</p>
      </div>
      <div class="why-card" data-animate="fade-up">
        <div class="icon-wrap"><i data-lucide="dollar-sign" aria-hidden="true"></i></div>
        <h3>Transparent, Fixed Pricing</h3>
        <p>The quote we give after the site visit is the price you pay. No per-hour billing, no fuel surcharges added at invoice. Every job is priced before work starts.</p>
      </div>
    </div>
  </div>
</section>

<!-- ── PROCESS ───────────────────────────────────────────────────────────────── -->
<section class="section-pad" style="background:var(--color-bg);">
  <div class="container">
    <div style="max-width:700px;margin:0 auto;">
      <div class="eyebrow-label" data-animate="fade-up">How It Works</div>
      <h2 class="section-title" data-animate="fade-up">Tree Removal From Call to Clean</h2>
      <div class="process-steps" style="margin-top:var(--space-8);" data-animate="fade-up">
        <div class="process-step">
          <div class="step-num">1</div>
          <div class="step-body">
            <h3>Free On-Site Assessment</h3>
            <p>We visit your Watertown property, evaluate the tree's size, condition, lean, and surroundings, and identify the safest removal approach. You get a written estimate before we leave.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">2</div>
          <div class="step-body">
            <h3>Job-Day Setup &amp; Protection</h3>
            <p>Our crew sets up protective ground cover, rigging lines, and drop zones. Structures, adjacent plants, and lawn areas are padded or fenced off as needed before any cutting begins.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">3</div>
          <div class="step-body">
            <h3>Controlled Removal</h3>
            <p>Branches are removed section by section from the top down, lowered by rope when necessary. The trunk is sectioned and brought down in controlled pieces — never allowed to fall free near structures.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">4</div>
          <div class="step-body">
            <h3>Full Cleanup &amp; Site Restoration</h3>
            <p>All wood is chipped or hauled, the area is raked, and any ground cover is removed. The stump is ground on request. We do a final walk with you to confirm the site is clear.</p>
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
      <h2 class="section-title" data-animate="fade-up">Tree Removal FAQs — Watertown, MA</h2>
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

<!-- ── CLOSING CTA #3 ────────────────────────────────────────────────────────── -->
<section class="section-pad" style="background:var(--color-bg-dark);text-align:center;">
  <div class="container">
    <div class="eyebrow-label" style="color:var(--color-accent);" data-animate="fade-up">Watertown's Tree Removal Specialists</div>
    <h2 style="color:#fff;font-size:clamp(1.8rem,4vw,2.6rem);margin-bottom:var(--space-4);" data-animate="fade-up">Stop Waiting on a Tree That's Already a Problem</h2>
    <p style="color:rgba(255,255,255,0.75);max-width:540px;margin:0 auto var(--space-8);line-height:1.7;" data-animate="fade-up">Every week a damaged tree stands increases the risk to your home and the cost to remove it. Get your free estimate this week.</p>
    <div class="cta-banner-actions" data-animate="fade-up">
      <a href="/contact#estimate" class="btn-primary">Get My Free Estimate</a>
      <?php if (!empty($phone)): ?>
      <a href="tel:<?= preg_replace('/\D/','',$phone) ?>" class="btn-secondary" style="border-color:rgba(255,255,255,0.3);color:#fff;">
        <i data-lucide="phone" aria-hidden="true"></i> <?= htmlspecialchars(formatPhone($phone)) ?>
      </a>
      <?php endif; ?>
    </div>
    <p style="color:rgba(255,255,255,0.45);font-size:0.8rem;margin-top:var(--space-6);">Serving Watertown, Cambridge, Newton, Waltham, Belmont &amp; surrounding communities</p>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
