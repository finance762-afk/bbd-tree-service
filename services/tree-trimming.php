<?php
/**
 * BBD Tree Service — Tree Trimming Service Page
 * Phase 4: Inner Pages
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$service     = $services[1]; // Tree Trimming
$currentPage = 'tree-trimming';

$pageTitle       = "Tree Trimming Watertown MA | BBD Tree Service";
$pageDescription = "Professional tree trimming & pruning in Watertown, MA. BBD Tree Service improves tree health, structure & curb appeal. 26 years experience. Free estimates.";
$pageKeywords    = implode(', ', $service['keywords']);
$canonicalUrl    = $siteUrl . '/services/tree-trimming';
$ogImage         = $siteImages['trimmed1'];
$heroImage       = $siteImages['trimmed1'];

$faqs = [
    [
        'q' => 'How often should trees in Watertown be trimmed?',
        'a' => 'Most shade trees in the Watertown area benefit from a professional trim every 3–5 years. Faster-growing species like silver maple or ornamental pears may need attention every 2–3 years. Fruit trees and flowering varieties often need annual shaping. BBD Tree Service can assess your specific trees and recommend the right schedule.',
    ],
    [
        'q' => 'What\'s the difference between tree trimming and tree pruning?',
        'a' => 'Trimming is typically focused on shape and aesthetics — cutting back overgrown or wayward growth to maintain a desired form. Pruning is a more targeted practice focused on tree health: removing dead, diseased, or crossing branches to improve structure and reduce disease risk. BBD Tree Service applies both techniques as appropriate for each tree.',
    ],
    [
        'q' => 'Can you trim trees near power lines in Watertown?',
        'a' => 'We trim trees near residential service lines that don\'t require utility company involvement. For trees touching or growing into distribution lines maintained by Eversource, the utility must perform or authorize that work. We\'ll advise you during the estimate on which lines we can address safely and which require a utility contact.',
    ],
    [
        'q' => 'Will trimming make my tree healthier?',
        'a' => 'Done correctly, yes. Removing dead or damaged limbs reduces disease pathways and prevents bark decay from spreading. Thinning the canopy improves air circulation and light penetration, which supports healthy growth below. Poorly executed trimming — especially topping — causes serious long-term harm, which is why technique matters.',
    ],
];

$schemaMarkup = generateServiceSchema($service) . "\n" . generateFAQSchema($faqs);

$breadcrumbSchema = json_encode([
    '@context'        => 'https://schema.org',
    '@type'           => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => $siteUrl],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $siteUrl . '/services'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Tree Trimming'],
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
.service-hero {
  min-height: 55vh;
  display: flex;
  align-items: flex-end;
  position: relative;
  overflow: hidden;
  background-image: url('<?= htmlspecialchars($siteImages['trimmed1']) ?>');
  background-size: cover;
  background-position: center 40%;
}
.service-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(160deg, rgba(10,18,28,0.88) 0%, rgba(45,106,0,0.72) 60%, rgba(108,194,0,0.10) 100%);
  z-index: 1;
}
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

/* Signature: Full-bleed split with image bleeding right edge */
.signature-split {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 480px;
  overflow: hidden;
}
.signature-split .split-content {
  background: var(--color-primary);
  padding: var(--space-16) var(--space-12) var(--space-16) 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
}
.signature-split .split-content-inner { max-width: 520px; margin-left: auto; padding-left: var(--space-8); }
.signature-split .split-image {
  position: relative;
  overflow: hidden;
}
.signature-split .split-image img { width: 100%; height: 100%; object-fit: cover; display: block; }
.signature-split .split-image .overlay-stat {
  position: absolute;
  bottom: var(--space-6);
  left: var(--space-6);
  background: var(--color-primary);
  border-left: 4px solid var(--color-accent);
  border-radius: var(--radius);
  padding: var(--space-3) var(--space-5);
  color: #fff;
}
.overlay-stat .stat-val { font-size: 1.8rem; font-weight: 800; color: var(--color-accent); line-height: 1; }
.overlay-stat .stat-lbl { font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px; opacity: 0.75; }
@media (max-width: 767px) {
  .signature-split { grid-template-columns: 1fr; }
  .signature-split .split-content { padding: var(--space-10) var(--space-5); }
  .signature-split .split-content-inner { max-width: 100%; margin-left: 0; padding-left: 0; }
  .signature-split .split-image { min-height: 280px; }
}

.benefits-list { list-style: none; margin: var(--space-6) 0; display: flex; flex-direction: column; gap: var(--space-3); }
.benefits-list li { display: flex; align-items: flex-start; gap: var(--space-3); font-size: 0.95rem; line-height: 1.55; }
.benefits-list li i { color: var(--color-accent); flex-shrink: 0; margin-top: 3px; }

.trimming-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-5);
}
@media (max-width: 1023px) { .trimming-grid { grid-template-columns: repeat(2,1fr); } }
@media (max-width: 767px)  { .trimming-grid { grid-template-columns: 1fr; } }
.trim-card {
  background: var(--color-bg);
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-sm);
  border: 1px solid rgba(45,106,0,0.08);
}
.trim-card-img { aspect-ratio: 16/9; overflow: hidden; }
.trim-card-img img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease; }
.trim-card:hover .trim-card-img img { transform: scale(1.06); }
.trim-card-body { padding: var(--space-5); }
.trim-card-body h3 { font-size: 1rem; font-weight: 700; color: var(--color-primary); margin-bottom: var(--space-2); }
.trim-card-body p  { font-size: 0.875rem; color: var(--color-text-light); line-height: 1.6; }

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
        <span class="current">Tree Trimming</span>
      </nav>
      <div class="service-hero-eyebrow">
        <i data-lucide="scissors" aria-hidden="true"></i>
        Watertown, MA
      </div>
      <h1>Tree Trimming That <span class="accent">Improves</span><br>Your Property</h1>
      <p class="service-hero-sub">Precise trimming to enhance health, reduce hazard risk, and restore the natural shape of your trees — across Watertown and Greater Boston.</p>
      <div class="hero-cta-row">
        <a href="/contact" class="btn-primary">
          <i data-lucide="clipboard-list" aria-hidden="true"></i>Get a Free Estimate
        </a>
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
      <span>Licensed &amp; Insured</span><span class="ticker-sep">✦</span>
      <span>26 Years Experience</span><span class="ticker-sep">✦</span>
      <span>Proper Pruning Techniques</span><span class="ticker-sep">✦</span>
      <span>No Tree Topping</span><span class="ticker-sep">✦</span>
      <span>Full Debris Removal</span><span class="ticker-sep">✦</span>
      <span>Free Estimates</span><span class="ticker-sep">✦</span>
    </div>
    <div class="ticker-content" aria-hidden="true">
      <span>Licensed &amp; Insured</span><span class="ticker-sep">✦</span>
      <span>26 Years Experience</span><span class="ticker-sep">✦</span>
      <span>Proper Pruning Techniques</span><span class="ticker-sep">✦</span>
      <span>No Tree Topping</span><span class="ticker-sep">✦</span>
      <span>Full Debris Removal</span><span class="ticker-sep">✦</span>
      <span>Free Estimates</span><span class="ticker-sep">✦</span>
    </div>
  </div>
</div>

<!-- ── ANSWER BLOCK + DETAIL ─────────────────────────────────────────────────── -->
<section class="section-pad" style="background:var(--color-bg);">
  <div class="container">
    <div class="answer-block" data-animate="fade-up">
      <h2>What does professional tree trimming involve for Watertown homeowners?</h2>
      <p>Tree trimming means selectively cutting branches to improve a tree's shape, remove safety hazards, clear sightlines, and support long-term health. A properly trimmed tree is safer, easier to maintain, and often more visually striking than before the work — when done with the right cuts at the right locations.</p>
    </div>

    <div style="max-width:780px;" data-animate="fade-up">
      <div class="eyebrow-label">Tree Trimming Watertown MA</div>
      <h2 class="section-title">Shape, Safety, and 26 Years of Knowing the Difference</h2>
      <div class="prose">
        <p>There's a meaningful distinction between trimming that improves a tree and trimming that harms it. BBD Tree Service has been working with the mature oaks, maples, lindens, and ornamental trees on Watertown properties for over two decades — we know how each species responds to cuts, what the right removal points are, and what to leave alone.</p>
        <p>Our trimming work focuses on three outcomes: removing branches that are dead, damaged, or in conflict with each other; reducing canopy weight where limb failure is a risk; and refining the tree's natural form so it looks intentional rather than overgrown. We never top trees — a practice that causes long-term decay and structurally weakens the tree's ability to grow back safely.</p>
        <p>Whether you have a silver maple dropping branches onto your driveway, a row of privet hedges that's grown into a wall, or a row of young trees that need shaping for the next decade, we approach each job with a clear plan and the right tools to execute it cleanly.</p>
        <p>All trimmings are chipped or hauled at the end of each job. Most residential trimming in the Watertown and Cambridge area is completed in a single visit, often in 2–4 hours for a single tree.</p>
      </div>
      <p class="last-updated">Last Updated: April 2026</p>
    </div>
  </div>
</section>

<!-- ── SIGNATURE SECTION: Full-bleed split ──────────────────────────────────── -->
<section class="signature-split" aria-label="What we trim">
  <div class="split-content">
    <div class="split-content-inner">
      <div class="eyebrow-label" style="color:var(--color-accent);" data-animate="fade-up">What We Trim</div>
      <h2 style="color:#fff;font-size:clamp(1.6rem,3.5vw,2.4rem);margin-bottom:var(--space-5);" data-animate="fade-up">Every Species, Every Situation</h2>
      <ul class="benefits-list" data-animate="fade-up">
        <li><i data-lucide="check-circle" aria-hidden="true"></i><span>Mature shade trees — oaks, maples, lindens, elms</span></li>
        <li><i data-lucide="check-circle" aria-hidden="true"></i><span>Ornamental and flowering trees — crabapples, cherries, dogwoods</span></li>
        <li><i data-lucide="check-circle" aria-hidden="true"></i><span>Evergreens — pines, spruce, arborvitae</span></li>
        <li><i data-lucide="check-circle" aria-hidden="true"></i><span>Young trees needing early structural training</span></li>
        <li><i data-lucide="check-circle" aria-hidden="true"></i><span>Trees overhanging roofs, power lines, or fences</span></li>
        <li><i data-lucide="check-circle" aria-hidden="true"></i><span>Storm-damaged trees with broken or hanging limbs</span></li>
      </ul>
      <a href="/contact" class="btn-primary" style="margin-top:var(--space-4);display:inline-flex;align-items:center;gap:var(--space-2);">
        <i data-lucide="clipboard-list" aria-hidden="true"></i>Book a Trim Assessment
      </a>
    </div>
  </div>
  <div class="split-image">
    <img
      src="<?= htmlspecialchars($siteImages['trimmed2']) ?>"
      alt="Professionally trimmed tree in Watertown MA by BBD Tree Service"
      width="900" height="700"
      loading="lazy">
    <div class="overlay-stat">
      <div class="stat-val">4.9★</div>
      <div class="stat-lbl">Average Rating<br>85+ Reviews</div>
    </div>
  </div>
</section>

<!-- ── MID-PAGE CTA ──────────────────────────────────────────────────────────── -->
<section class="cta-banner-service">
  <div class="container" style="position:relative;z-index:1;">
    <div class="eyebrow-label" style="color:var(--color-accent);margin-bottom:var(--space-3);" data-animate="fade-up">Free Trimming Estimate</div>
    <h2 data-animate="fade-up">Trees Looking Overgrown or Unbalanced?</h2>
    <p data-animate="fade-up">We'll come to your Watertown property, walk the trees with you, and give you a written estimate — no pressure, no obligation.</p>
    <div class="cta-banner-actions" data-animate="fade-up">
      <a href="/contact" class="btn-primary">Schedule an Assessment</a>
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
      <div class="eyebrow-label" data-animate="fade-up">Our Trimming Process</div>
      <h2 class="section-title" data-animate="fade-up">How We Approach Every Tree</h2>
      <div class="process-steps" style="margin-top:var(--space-8);" data-animate="fade-up">
        <div class="process-step">
          <div class="step-num">1</div>
          <div class="step-body">
            <h3>Site Walk &amp; Tree Assessment</h3>
            <p>We evaluate each tree's structure, species, and condition — identifying dead wood, crossing branches, and any limbs that pose a risk. You receive a written scope and price before work starts.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">2</div>
          <div class="step-body">
            <h3>Strategic Canopy Work</h3>
            <p>Working top-down, we remove targeted branches using proper collar cuts that allow the tree to compartmentalize and heal naturally. No flush cuts, no stubs left behind.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">3</div>
          <div class="step-body">
            <h3>Shape &amp; Balance Review</h3>
            <p>We step back after each major cut to evaluate the emerging silhouette, making sure the finished tree looks natural and proportional — not hacked or over-reduced.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">4</div>
          <div class="step-body">
            <h3>Full Debris Removal</h3>
            <p>All clippings and branches are chipped or bundled and removed from your property. The area around the tree is raked clean before we leave.</p>
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
      <h2 class="section-title" data-animate="fade-up">Tree Trimming FAQs — Watertown, MA</h2>
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
    <div class="eyebrow-label" style="color:var(--color-accent);" data-animate="fade-up">Watertown Tree Trimming</div>
    <h2 style="color:#fff;font-size:clamp(1.8rem,4vw,2.6rem);margin-bottom:var(--space-4);" data-animate="fade-up">Well-Trimmed Trees Are Safer and More Valuable</h2>
    <p style="color:rgba(255,255,255,0.75);max-width:540px;margin:0 auto var(--space-8);line-height:1.7;" data-animate="fade-up">Overgrown canopies, weak branch attachments, and dead wood are preventable hazards. Get ahead of it with a professional trim this season.</p>
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
