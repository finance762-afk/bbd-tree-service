<?php
/**
 * BBD Tree Service — Residential Tree Service Page
 * Phase 4: Inner Pages
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$service     = $services[6]; // Residential Tree Service
$currentPage = 'residential-tree-service';

$pageTitle       = "Residential Tree Service Watertown MA | BBD Tree Service";
$pageDescription = "Full-service residential tree care for Watertown MA homeowners. BBD Tree Service handles removal, trimming, pruning & stumps. Protect your home & curb appeal. Free estimates.";
$pageKeywords    = implode(', ', $service['keywords']);
$canonicalUrl    = $siteUrl . '/services/residential-tree-service';
$ogImage         = $siteImages['photo5'];
$heroImage       = $siteImages['photo5'];

$faqs = [
    [
        'q' => 'How do I know if a tree on my Watertown property is dangerous?',
        'a' => 'Warning signs include: large dead branches in the canopy, visible cracks or splits in the trunk or major limbs, leaning that has recently increased, fungal growth (mushrooms, conks) at the base, bark that\'s separating or hollowed sections, and roots that are lifting or cracked. If you notice any of these, have the tree assessed before the next storm season. BBD Tree Service offers free on-site evaluations.',
    ],
    [
        'q' => 'Will tree work damage my lawn or driveway?',
        'a' => 'We use protective ground cover, rubber-tired equipment on pavement, and careful material management to minimize impact to your lawn and hardscape. In most residential jobs in Watertown, lawn impact is minimal — comparable to what you\'d see after heavy foot traffic, which fills in within a few weeks. We\'ll walk you through what to expect during the estimate.',
    ],
    [
        'q' => 'What\'s included in your residential tree service?',
        'a' => 'Our residential service covers tree removal (full cleanup included), tree trimming and pruning, stump grinding, brush removal, and hedge trimming. We handle everything from a single low branch that\'s over your roof to full lot clearing for new landscaping.',
    ],
    [
        'q' => 'How far in advance should I schedule tree work in Watertown?',
        'a' => 'For non-emergency work, scheduling 2–4 weeks ahead is typical during spring and fall peak seasons. In winter and mid-summer, we often have shorter lead times of 1–2 weeks. For hazardous or emergency situations, call directly and we\'ll prioritize accordingly.',
    ],
];

$schemaMarkup = generateServiceSchema($service) . "\n" . generateFAQSchema($faqs);

$breadcrumbSchema = json_encode([
    '@context'        => 'https://schema.org',
    '@type'           => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => $siteUrl],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $siteUrl . '/services'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Residential Tree Service'],
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
.service-hero { min-height: 55vh; display: flex; align-items: flex-end; position: relative; overflow: hidden; background-image: url('<?= htmlspecialchars($siteImages['photo5']) ?>'); background-size: cover; background-position: center 40%; }
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

/* Services grid for homeowners */
.homeowner-services { display:grid; grid-template-columns:repeat(3,1fr); gap:var(--space-5); margin-top:var(--space-8); }
@media (max-width:1023px) { .homeowner-services { grid-template-columns:repeat(2,1fr); } }
@media (max-width:767px)  { .homeowner-services { grid-template-columns:1fr; } }
.homeowner-svc-card { background:var(--color-bg); border-radius:var(--radius-lg); padding:var(--space-6); box-shadow:var(--shadow-sm); border:1px solid rgba(45,106,0,0.07); transition:transform var(--transition), box-shadow var(--transition); text-decoration:none; color:inherit; display:block; }
.homeowner-svc-card:hover { transform:translateY(-5px); box-shadow:var(--shadow-md); }
.svc-card-icon { width:48px; height:48px; background:rgba(108,194,0,0.1); border-radius:var(--radius); display:flex; align-items:center; justify-content:center; color:var(--color-accent); margin-bottom:var(--space-4); }
.homeowner-svc-card h3 { font-size:1rem; font-weight:700; color:var(--color-primary); margin-bottom:var(--space-2); }
.homeowner-svc-card p  { font-size:0.875rem; color:var(--color-text-light); line-height:1.6; }
.homeowner-svc-card .card-link { display:inline-flex; align-items:center; gap:var(--space-1); font-size:0.8rem; font-weight:700; color:var(--color-accent); margin-top:var(--space-3); }

/* Photo strip — overlapping layout — signature */
.photo-overlap-section { position:relative; padding:var(--space-16) 0; background:var(--color-primary); overflow:hidden; }
.photo-overlap-section::before { content:''; position:absolute; inset:0; background-image:url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E"); }
.photo-overlap-inner { position:relative; z-index:1; display:grid; grid-template-columns:1fr 1fr; gap:var(--space-12); align-items:center; }
@media (max-width:767px) { .photo-overlap-inner { grid-template-columns:1fr; } }
.photo-overlap-text .eyebrow { color:var(--color-accent); margin-bottom:var(--space-3); }
.photo-overlap-text h2 { color:#fff; font-size:clamp(1.6rem,3.5vw,2.4rem); margin-bottom:var(--space-5); }
.photo-overlap-text p  { color:rgba(255,255,255,0.78); font-size:0.95rem; line-height:1.7; max-width:480px; }
.photo-overlap-img-stack { position:relative; }
.photo-main { border-radius:var(--radius-lg); overflow:hidden; box-shadow:var(--shadow-xl,0 16px 40px rgba(0,0,0,0.3)); aspect-ratio:4/3; }
.photo-main img { width:100%; height:100%; object-fit:cover; display:block; }
.photo-inset { position:absolute; bottom:-20px; left:-20px; width:45%; border-radius:var(--radius-lg); overflow:hidden; box-shadow:var(--shadow-xl,0 16px 40px rgba(0,0,0,0.3)); border:4px solid var(--color-primary); aspect-ratio:1/1; }
.photo-inset img { width:100%; height:100%; object-fit:cover; display:block; }
@media (max-width:767px) { .photo-inset { left:10px; bottom:-15px; width:35%; } }

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
        <span class="current">Residential Tree Service</span>
      </nav>
      <div class="service-hero-eyebrow">
        <i data-lucide="home" aria-hidden="true"></i>
        Watertown Homeowners
      </div>
      <h1>Protect Your Home.<br><span class="accent">Improve Your Yard.</span></h1>
      <p class="service-hero-sub">Full-service residential tree care for Watertown homeowners — from a single dangerous branch to complete lot clearing. One call, one crew, everything handled.</p>
      <div class="hero-cta-row">
        <a href="/contact" class="btn-primary"><i data-lucide="clipboard-list" aria-hidden="true"></i>Get a Free Home Estimate</a>
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
      <span>Full Property Protection</span><span class="ticker-sep">✦</span><span>26 Years in Watertown</span><span class="ticker-sep">✦</span><span>Lawn-Friendly Equipment</span><span class="ticker-sep">✦</span><span>Licensed &amp; Insured</span><span class="ticker-sep">✦</span><span>Free Estimates</span><span class="ticker-sep">✦</span><span>No Surprise Charges</span><span class="ticker-sep">✦</span>
    </div>
    <div class="ticker-content" aria-hidden="true">
      <span>Full Property Protection</span><span class="ticker-sep">✦</span><span>26 Years in Watertown</span><span class="ticker-sep">✦</span><span>Lawn-Friendly Equipment</span><span class="ticker-sep">✦</span><span>Licensed &amp; Insured</span><span class="ticker-sep">✦</span><span>Free Estimates</span><span class="ticker-sep">✦</span><span>No Surprise Charges</span><span class="ticker-sep">✦</span>
    </div>
  </div>
</div>

<section class="section-pad" style="background:var(--color-bg);">
  <div class="container">
    <div class="answer-block" data-animate="fade-up">
      <h2>What tree services do Watertown homeowners need most?</h2>
      <p>The most common residential calls we receive in Watertown are for tree removal (diseased, storm-damaged, or proximity to structures), stump grinding after previous removals, and trimming of maples or oaks that are dropping limbs onto driveways and rooflines. Hedge trimming and brush clearing are also frequent spring and fall requests.</p>
    </div>

    <div style="max-width:800px;margin-bottom:var(--space-10);" data-animate="fade-up">
      <div class="eyebrow-label">Residential Tree Service Watertown MA</div>
      <h2 class="section-title">Everything Your Property's Trees Need, Under One Roof</h2>
      <div class="prose">
        <p>Watertown's residential neighborhoods are full of mature trees — the oaks and maples that make the streets beautiful but can also become a hazard over 50–80 years of growth. BBD Tree Service has been the go-to residential tree company for homeowners in Watertown and surrounding communities for 26 years, handling everything from emergency removals to annual trimming programs.</p>
        <p>We handle full-service residential work: tree removal with complete cleanup, stump grinding, seasonal pruning and trimming, hedge and shrub shaping, and brush removal after clearing projects. One call gets you a free estimate for your entire property — whether that's one tree or twelve.</p>
        <p>Our crews work with care around residential properties. We use protective ground mats, rubber-wheeled equipment on driveways and patios, and careful material management to protect your lawn and landscape while we work. Most homeowners in Watertown tell us we leave the yard looking better than when we arrived.</p>
      </div>
      <p class="last-updated">Last Updated: April 2026</p>
    </div>

    <div class="eyebrow-label" data-animate="fade-up">Our Residential Services</div>
    <h2 class="section-title" data-animate="fade-up">What We Do for Watertown Homeowners</h2>
    <div class="homeowner-services">
      <a href="/services/tree-removal" class="homeowner-svc-card" data-animate="fade-up">
        <div class="svc-card-icon"><i data-lucide="tree" aria-hidden="true"></i></div>
        <h3>Tree Removal</h3>
        <p>Safe removal of any tree — dangerous, diseased, or simply in the wrong spot. Full cleanup to the last chip.</p>
        <span class="card-link">Learn more <i data-lucide="arrow-right" aria-hidden="true"></i></span>
      </a>
      <a href="/services/tree-trimming" class="homeowner-svc-card" data-animate="fade-up">
        <div class="svc-card-icon"><i data-lucide="scissors" aria-hidden="true"></i></div>
        <h3>Tree Trimming</h3>
        <p>Shape and safety — reducing overgrowth, clearing roof lines, and improving your property's curb appeal.</p>
        <span class="card-link">Learn more <i data-lucide="arrow-right" aria-hidden="true"></i></span>
      </a>
      <a href="/services/stump-grinding" class="homeowner-svc-card" data-animate="fade-up">
        <div class="svc-card-icon"><i data-lucide="circle-slash" aria-hidden="true"></i></div>
        <h3>Stump Grinding</h3>
        <p>Ground 6–12" below grade, all chips cleared, lawn ready for seed or mulch — same visit as removal or standalone.</p>
        <span class="card-link">Learn more <i data-lucide="arrow-right" aria-hidden="true"></i></span>
      </a>
      <a href="/services/tree-pruning" class="homeowner-svc-card" data-animate="fade-up">
        <div class="svc-card-icon"><i data-lucide="git-branch" aria-hidden="true"></i></div>
        <h3>Tree Pruning</h3>
        <p>Health-focused pruning that removes deadwood, improves structure, and extends the lifespan of your mature trees.</p>
        <span class="card-link">Learn more <i data-lucide="arrow-right" aria-hidden="true"></i></span>
      </a>
      <a href="/services/hedge-trimming" class="homeowner-svc-card" data-animate="fade-up">
        <div class="svc-card-icon"><i data-lucide="align-justify" aria-hidden="true"></i></div>
        <h3>Hedge Trimming</h3>
        <p>Precise shaping of hedges and shrubs to maintain clean lines and healthy growth throughout the season.</p>
        <span class="card-link">Learn more <i data-lucide="arrow-right" aria-hidden="true"></i></span>
      </a>
      <a href="/services/brush-removal" class="homeowner-svc-card" data-animate="fade-up">
        <div class="svc-card-icon"><i data-lucide="trash-2" aria-hidden="true"></i></div>
        <h3>Brush Removal</h3>
        <p>Clear overgrown areas, clean up after storms, and open up your yard — debris hauled away or chipped on-site.</p>
        <span class="card-link">Learn more <i data-lucide="arrow-right" aria-hidden="true"></i></span>
      </a>
    </div>
  </div>
</section>

<!-- ── OVERLAPPING PHOTO — SIGNATURE SECTION ─────────────────────────────────── -->
<section class="photo-overlap-section" aria-label="About our residential work">
  <div class="container">
    <div class="photo-overlap-inner">
      <div class="photo-overlap-text" data-animate="fade-up">
        <div class="eyebrow eyebrow-label">26 Years in Watertown</div>
        <h2>Your Neighbors Have Trusted Us for Over Two Decades</h2>
        <p>BBD Tree Service has worked on thousands of Watertown residential properties since 2000. We know the neighborhood — the tight back yards, the old stone walls, the established maples along side streets. We work with your property's specific conditions, not against them.</p>
        <a href="/about" class="btn-secondary" style="border-color:rgba(255,255,255,0.35);color:#fff;margin-top:var(--space-5);display:inline-flex;align-items:center;gap:var(--space-2);">
          <i data-lucide="users" aria-hidden="true"></i>Meet the Team
        </a>
      </div>
      <div class="photo-overlap-img-stack" data-animate="fade-up">
        <div class="photo-main img-reveal">
          <img src="<?= htmlspecialchars($siteImages['trimmed1']) ?>" alt="BBD Tree Service residential tree trimming in Watertown MA" width="700" height="525" loading="lazy">
        </div>
        <div class="photo-inset">
          <img src="<?= htmlspecialchars($siteImages['staff']) ?>" alt="BBD Tree Service crew member in Watertown MA" width="300" height="300" loading="lazy">
        </div>
      </div>
    </div>
  </div>
</section>

<section class="cta-banner-service" style="padding-top:var(--space-16);">
  <div class="container" style="position:relative;z-index:1;">
    <div class="eyebrow-label" style="color:var(--color-accent);margin-bottom:var(--space-3);" data-animate="fade-up">Free Home Estimate</div>
    <h2 data-animate="fade-up">What Tree Issue Can We Help You Solve This Week?</h2>
    <p data-animate="fade-up">Tell us about your property. We'll schedule a free on-site walk within a few days and give you a written quote — no pressure, no obligation.</p>
    <div class="cta-banner-actions" data-animate="fade-up">
      <a href="/contact" class="btn-primary">Get My Free Estimate</a>
      <?php if (!empty($phone)): ?>
      <a href="tel:<?= preg_replace('/\D/','',$phone) ?>" class="btn-secondary" style="border-color:rgba(255,255,255,0.4);color:#fff;">
        <i data-lucide="phone" aria-hidden="true"></i> <?= htmlspecialchars(formatPhone($phone)) ?>
      </a>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="section-pad" style="background:var(--color-bg);">
  <div class="container">
    <div style="max-width:760px;margin:0 auto;">
      <div class="eyebrow-label" data-animate="fade-up">Common Questions</div>
      <h2 class="section-title" data-animate="fade-up">Residential Tree Service FAQs</h2>
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
    <div class="eyebrow-label" style="color:var(--color-accent);" data-animate="fade-up">Watertown Residential Tree Care</div>
    <h2 style="color:#fff;font-size:clamp(1.8rem,4vw,2.6rem);margin-bottom:var(--space-4);" data-animate="fade-up">Your Property Deserves Professional Tree Care</h2>
    <p style="color:rgba(255,255,255,0.75);max-width:520px;margin:0 auto var(--space-8);line-height:1.7;" data-animate="fade-up">26 years of Watertown residential experience means we know your neighborhood's trees — and exactly how to handle them. Get your free estimate this week.</p>
    <div class="cta-banner-actions" data-animate="fade-up">
      <a href="/contact#estimate" class="btn-primary">Schedule My Free Estimate</a>
      <?php if (!empty($phone)): ?>
      <a href="tel:<?= preg_replace('/\D/','',$phone) ?>" class="btn-secondary" style="border-color:rgba(255,255,255,0.3);color:#fff;">
        <i data-lucide="phone" aria-hidden="true"></i> <?= htmlspecialchars(formatPhone($phone)) ?>
      </a>
      <?php endif; ?>
    </div>
    <p style="color:rgba(255,255,255,0.4);font-size:0.8rem;margin-top:var(--space-6);">Serving Watertown · Cambridge · Newton · Waltham · Belmont · Arlington · Lexington · Weston</p>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
