<?php
/**
 * BBD Tree Service — Tree Care Services Page
 * Phase 4: Inner Pages
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$service     = $services[9]; // Tree Care Services
$currentPage = 'tree-care';

$pageTitle       = "Tree Care Services Watertown MA | BBD Tree Service";
$pageDescription = "Comprehensive tree care in Watertown, MA — health assessments, disease treatment & maintenance programs by BBD Tree Service. 26 years experience. Free estimates.";
$pageKeywords    = implode(', ', $service['keywords']);
$canonicalUrl    = $siteUrl . '/services/tree-care';
$ogImage         = $siteImages['branches2'];
$heroImage       = $siteImages['branches2'];

$faqs = [
    [
        'q' => 'How do I know if my trees need professional care in Watertown?',
        'a' => 'Signs that a tree needs attention include deadwood in the canopy, sparse or yellowing leaves in summer, fungal conks at the base or on the trunk, cankers or bark discoloration, significant lean that has recently increased, and branches that are failing during normal (non-storm) conditions. Any of these warrant a professional assessment. Left untreated, tree health problems tend to compound over multiple seasons.',
    ],
    [
        'q' => 'What does a tree health assessment involve?',
        'a' => 'Our health assessment includes a visual inspection of the full crown, trunk, root crown, and visible root zone. We look for signs of disease, insect activity, structural weakness, and soil or drainage issues. You receive a verbal summary on the spot and recommendations for any care needed — whether that\'s pruning, treatment, soil improvement, or removal.',
    ],
    [
        'q' => 'Can tree diseases in Massachusetts be treated?',
        'a' => 'Some can. Dutch elm disease and oak wilt are largely managed through preventive pruning timing and rapid removal of infected material. Other fungal diseases like anthracnose, apple scab, and powdery mildew respond to seasonal fungicide applications. We\'ll assess what your tree is dealing with and tell you honestly whether treatment is likely to be effective or whether removal is the better path.',
    ],
    [
        'q' => 'What\'s included in an annual tree maintenance program?',
        'a' => 'Our maintenance programs typically include one or two seasonal assessments, targeted pruning of hazard wood or structural issues identified at each visit, and coordination of any additional services needed (removal, stump grinding, treatment referrals). Programs are customized to your property\'s tree inventory — a smaller urban lot needs a different schedule than a large residential property in Weston or Lexington.',
    ],
];

$schemaMarkup = generateServiceSchema($service) . "\n" . generateFAQSchema($faqs);

$breadcrumbSchema = json_encode([
    '@context'        => 'https://schema.org',
    '@type'           => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => $siteUrl],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $siteUrl . '/services'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Tree Care Services'],
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
.service-hero { min-height: 52vh; display: flex; align-items: flex-end; position: relative; overflow: hidden; background-image: url('<?= htmlspecialchars($siteImages['branches2']) ?>'); background-size: cover; background-position: center 40%; }
.service-hero::before { content:''; position:absolute; inset:0; background:linear-gradient(155deg,rgba(10,18,28,0.9) 0%,rgba(26,43,60,0.72) 55%,rgba(6,182,212,0.08) 100%); z-index:1; }
.service-hero-inner { position:relative; z-index:2; width:100%; padding:60px 0 50px; }
.breadcrumb-nav { display:flex; align-items:center; gap:var(--space-2); font-size:0.8rem; color:rgba(255,255,255,0.6); margin-bottom:var(--space-4); flex-wrap:wrap; }
.breadcrumb-nav a { color:rgba(255,255,255,0.6); } .breadcrumb-nav a:hover { color:var(--color-accent); }
.breadcrumb-nav .sep { color:rgba(255,255,255,0.3); } .breadcrumb-nav .current { color:rgba(255,255,255,0.9); }
.service-hero-eyebrow { display:inline-flex; align-items:center; gap:var(--space-2); background:rgba(6,182,212,0.12); border:1px solid rgba(6,182,212,0.35); border-radius:999px; padding:5px 16px; font-size:0.7rem; font-weight:700; text-transform:uppercase; letter-spacing:2px; color:var(--color-accent); margin-bottom:var(--space-4); }
.service-hero h1 { font-size:clamp(2.2rem,5vw,3.8rem); font-weight:800; line-height:1.1; letter-spacing:-0.025em; color:#fff; text-wrap:balance; margin-bottom:var(--space-4); }
.service-hero h1 .accent { color:var(--color-accent); }
.service-hero-sub { font-size:1.05rem; color:rgba(255,255,255,0.82); max-width:560px; line-height:1.7; margin-bottom:var(--space-6); }
.hero-cta-row { display:flex; align-items:center; gap:var(--space-4); flex-wrap:wrap; }

/* Tree care cycle timeline — signature layout */
.care-timeline { position:relative; padding:0; }
.care-timeline::before { content:''; position:absolute; left:50%; top:0; bottom:0; width:2px; background:linear-gradient(to bottom,var(--color-accent),transparent); transform:translateX(-50%); }
@media (max-width:767px) { .care-timeline::before { left:20px; transform:none; } }
.care-season { display:grid; grid-template-columns:1fr 60px 1fr; gap:0; align-items:start; margin-bottom:var(--space-10); }
@media (max-width:767px) { .care-season { grid-template-columns:50px 1fr; } }
.season-content { padding:var(--space-6); background:var(--color-bg); border-radius:var(--radius-lg); box-shadow:var(--shadow-sm); border:1px solid rgba(26,43,60,0.07); }
.care-season:nth-child(even) .season-content:first-child { display:none; }
.care-season:nth-child(odd)  .season-content:last-child  { display:none; }
@media (max-width:767px) { .care-season:nth-child(even) .season-content:first-child { display:block; } .care-season:nth-child(odd) .season-content:last-child { display:none; } }
.season-node { display:flex; flex-direction:column; align-items:center; gap:var(--space-2); }
.season-dot { width:48px; height:48px; background:var(--color-primary); border:3px solid var(--color-accent); border-radius:50%; display:flex; align-items:center; justify-content:center; color:var(--color-accent); flex-shrink:0; position:relative; z-index:1; }
.season-label { font-size:0.65rem; font-weight:700; text-transform:uppercase; letter-spacing:2px; color:var(--color-accent); white-space:nowrap; }
.season-content h3 { font-size:1rem; font-weight:700; color:var(--color-primary); margin-bottom:var(--space-2); }
.season-content p  { font-size:0.875rem; color:var(--color-text-light); line-height:1.65; }
@media (max-width:767px) {
  .care-season { grid-template-columns:50px 1fr; }
  .care-season:nth-child(n) .season-content:first-child { display:block; }
  .care-season:nth-child(n) .season-content:last-child  { display:none; }
}

.care-includes { display:grid; grid-template-columns:repeat(3,1fr); gap:var(--space-5); margin-top:var(--space-8); }
@media (max-width:1023px) { .care-includes { grid-template-columns:repeat(2,1fr); } }
@media (max-width:767px)  { .care-includes { grid-template-columns:1fr; } }
.care-card { background:var(--color-bg); border-radius:var(--radius-lg); padding:var(--space-6); box-shadow:var(--shadow-sm); border:1px solid rgba(26,43,60,0.07); border-top:3px solid var(--color-accent); }
.care-card-icon { width:44px; height:44px; background:rgba(6,182,212,0.1); border-radius:var(--radius); display:flex; align-items:center; justify-content:center; color:var(--color-accent); margin-bottom:var(--space-4); }
.care-card h3 { font-size:0.95rem; font-weight:700; color:var(--color-primary); margin-bottom:var(--space-2); }
.care-card p  { font-size:0.875rem; color:var(--color-text-light); line-height:1.6; }

.faq-list { display:flex; flex-direction:column; gap:var(--space-3); }
.faq-item { background:var(--color-bg); border:1px solid rgba(26,43,60,0.1); border-radius:var(--radius-lg); overflow:hidden; }
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

.answer-block { background:rgba(6,182,212,0.06); border-left:4px solid var(--color-accent); border-radius:0 var(--radius-lg) var(--radius-lg) 0; padding:var(--space-5) var(--space-6); margin-bottom:var(--space-6); }
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
        <span class="current">Tree Care Services</span>
      </nav>
      <div class="service-hero-eyebrow">
        <i data-lucide="heart" aria-hidden="true"></i>
        Watertown, MA
      </div>
      <h1>Trees That <span class="accent">Stay Healthy</span><br>for Decades</h1>
      <p class="service-hero-sub">Comprehensive tree care programs for Watertown homeowners and businesses — health assessments, disease identification, and seasonal maintenance that prevent problems before they become emergencies.</p>
      <div class="hero-cta-row">
        <a href="/contact" class="btn-primary"><i data-lucide="clipboard-list" aria-hidden="true"></i>Get a Free Tree Assessment</a>
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
      <span>Health Assessments</span><span class="ticker-sep">✦</span><span>Disease Identification</span><span class="ticker-sep">✦</span><span>Seasonal Programs</span><span class="ticker-sep">✦</span><span>26 Years Experience</span><span class="ticker-sep">✦</span><span>Licensed &amp; Insured</span><span class="ticker-sep">✦</span><span>Free Estimates</span><span class="ticker-sep">✦</span>
    </div>
    <div class="ticker-content" aria-hidden="true">
      <span>Health Assessments</span><span class="ticker-sep">✦</span><span>Disease Identification</span><span class="ticker-sep">✦</span><span>Seasonal Programs</span><span class="ticker-sep">✦</span><span>26 Years Experience</span><span class="ticker-sep">✦</span><span>Licensed &amp; Insured</span><span class="ticker-sep">✦</span><span>Free Estimates</span><span class="ticker-sep">✦</span>
    </div>
  </div>
</div>

<section class="section-pad" style="background:var(--color-bg);">
  <div class="container">
    <div class="answer-block" data-animate="fade-up">
      <h2>What does professional tree care actually prevent?</h2>
      <p>Proactive tree care prevents the three most expensive outcomes: emergency removal of a tree that failed suddenly, property damage from a limb failure that a structural assessment would have caught, and the slow loss of a mature tree to a disease that was treatable in its early stages. A healthy tree is worth significantly more to your property than a tree in decline — and far more than the cost of its removal.</p>
    </div>

    <div style="max-width:800px;margin-bottom:var(--space-10);" data-animate="fade-up">
      <div class="eyebrow-label">Tree Care Watertown MA</div>
      <h2 class="section-title">26 Years of Knowing What Watertown's Trees Need — By Season</h2>
      <div class="prose">
        <p>Tree care isn't a single service — it's an approach to your property's trees that changes with each season and evolves as the trees age. BBD Tree Service has been working with the full range of species found in Watertown and Greater Boston for over two decades: red and white oaks, silver and Norway maples, London plane trees, American and Japanese zelkova, ornamental crabapples, Japanese cherries, and the mature white pines and Norway spruces that anchor many older residential lots.</p>
        <p>We offer health assessments that include a full structural and visual inspection, disease identification, and honest recommendations — whether that's a targeted pruning cut, a seasonal spray program referral, soil amendment, or the straightforward advice that a particular tree has reached the end of its safe service life. We don't push removal when care is a viable option, and we don't recommend treatment when removal is the better path for your property's safety.</p>
        <p>For homeowners who want ongoing peace of mind, we offer annual maintenance programs that schedule regular assessments and targeted pruning across your property's tree inventory. You get proactive problem identification before issues become emergencies, and one consistent crew that knows your specific trees from year to year.</p>
      </div>
      <p class="last-updated">Last Updated: April 2026</p>
    </div>

    <!-- Care services grid -->
    <div class="eyebrow-label" data-animate="fade-up">What We Provide</div>
    <h2 class="section-title" data-animate="fade-up">Comprehensive Tree Care Services</h2>
    <div class="care-includes">
      <div class="care-card" data-animate="fade-up">
        <div class="care-card-icon"><i data-lucide="search" aria-hidden="true"></i></div>
        <h3>Tree Health Assessments</h3>
        <p>Full visual inspection of crown, trunk, root crown, and root zone. Disease, insect activity, and structural issue identification with on-site summary and recommendations.</p>
      </div>
      <div class="care-card" data-animate="fade-up">
        <div class="care-card-icon"><i data-lucide="activity" aria-hidden="true"></i></div>
        <h3>Disease Identification &amp; Guidance</h3>
        <p>We identify fungal diseases, bacterial infections, and insect infestations by species, and advise on treatment options or management strategies appropriate to your tree.</p>
      </div>
      <div class="care-card" data-animate="fade-up">
        <div class="care-card-icon"><i data-lucide="git-branch" aria-hidden="true"></i></div>
        <h3>Structural Pruning</h3>
        <p>Targeted pruning to address codominant leaders, included bark, and high-failure-risk branch attachments before they create a hazard or require emergency response.</p>
      </div>
      <div class="care-card" data-animate="fade-up">
        <div class="care-card-icon"><i data-lucide="calendar" aria-hidden="true"></i></div>
        <h3>Annual Maintenance Programs</h3>
        <p>Scheduled seasonal visits for your full property tree inventory — consistent crew, proactive issue identification, and coordinated service without repeat scheduling overhead.</p>
      </div>
      <div class="care-card" data-animate="fade-up">
        <div class="care-card-icon"><i data-lucide="zap" aria-hidden="true"></i></div>
        <h3>Storm Damage Response</h3>
        <p>Post-storm assessment and cleanup — addressing hanging limbs, split branch unions, and structural damage quickly to prevent further failure and property exposure.</p>
      </div>
      <div class="care-card" data-animate="fade-up">
        <div class="care-card-icon"><i data-lucide="layers" aria-hidden="true"></i></div>
        <h3>Young Tree Care</h3>
        <p>Early structural training for young trees — establishing a strong single leader, removing crossing branches, and setting the growth pattern that will define the tree's structure for decades.</p>
      </div>
    </div>
  </div>
</section>

<!-- ── SEASONAL TIMELINE — SIGNATURE SECTION ────────────────────────────────── -->
<section class="section-pad" style="background:var(--color-bg-alt);">
  <div class="container">
    <div class="eyebrow-label text-center" data-animate="fade-up">Seasonal Care Calendar</div>
    <h2 class="section-title text-center" data-animate="fade-up">Massachusetts Tree Care by Season</h2>
    <div class="care-timeline" style="margin-top:var(--space-10);max-width:800px;margin-left:auto;margin-right:auto;" data-animate="fade-up">
      <div class="care-season">
        <div class="season-content">
          <h3>Winter Dormant Pruning</h3>
          <p>February–March is the safest window for pruning most deciduous species. Trees are dormant, disease pressure is minimal, and the full branch structure is visible without foliage.</p>
        </div>
        <div class="season-node">
          <div class="season-dot"><i data-lucide="snowflake" aria-hidden="true"></i></div>
          <div class="season-label">Winter</div>
        </div>
        <div class="season-content"></div>
      </div>
      <div class="care-season">
        <div class="season-content"></div>
        <div class="season-node">
          <div class="season-dot"><i data-lucide="sun" aria-hidden="true"></i></div>
          <div class="season-label">Spring</div>
        </div>
        <div class="season-content">
          <h3>Disease Monitoring &amp; Assessment</h3>
          <p>Spring leaf-out reveals disease symptoms, insect activity, and winter damage. Early identification means more treatment options and lower intervention cost.</p>
        </div>
      </div>
      <div class="care-season">
        <div class="season-content">
          <h3>Hazard Wood Removal</h3>
          <p>Summer reveals which branches are fully dead vs. stressed — a dead branch holds its leaves longest. Target removal of hazard limbs before hurricane season.</p>
        </div>
        <div class="season-node">
          <div class="season-dot"><i data-lucide="thermometer" aria-hidden="true"></i></div>
          <div class="season-label">Summer</div>
        </div>
        <div class="season-content"></div>
      </div>
      <div class="care-season">
        <div class="season-content"></div>
        <div class="season-node">
          <div class="season-dot"><i data-lucide="leaf" aria-hidden="true"></i></div>
          <div class="season-label">Fall</div>
        </div>
        <div class="season-content">
          <h3>Pre-Winter Structural Check</h3>
          <p>Before the first nor'easter, a structural assessment identifies limbs that need removal before heavy snow and ice loads. Fall is also ideal for planting new trees.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="cta-banner-service">
  <div class="container" style="position:relative;z-index:1;">
    <div class="eyebrow-label" style="color:var(--color-accent);margin-bottom:var(--space-3);" data-animate="fade-up">Tree Care Watertown MA</div>
    <h2 data-animate="fade-up">When Did Your Trees Last Get a Professional Assessment?</h2>
    <p data-animate="fade-up">A free health assessment takes about 30 minutes and identifies any problems before they become emergencies. Schedule yours this week.</p>
    <div class="cta-banner-actions" data-animate="fade-up">
      <a href="/contact" class="btn-primary">Schedule a Free Assessment</a>
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
      <h2 class="section-title" data-animate="fade-up">Tree Care FAQs — Watertown, MA</h2>
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
    <div class="eyebrow-label" style="color:var(--color-accent);" data-animate="fade-up">Watertown Tree Care Services</div>
    <h2 style="color:#fff;font-size:clamp(1.8rem,4vw,2.6rem);margin-bottom:var(--space-4);" data-animate="fade-up">Healthy Trees Protect Your Property and Add Real Value to It</h2>
    <p style="color:rgba(255,255,255,0.75);max-width:520px;margin:0 auto var(--space-8);line-height:1.7;" data-animate="fade-up">26 years of Watertown tree care experience means we know your local species, your regional disease pressures, and exactly what your trees need to thrive. Start with a free assessment.</p>
    <div class="cta-banner-actions" data-animate="fade-up">
      <a href="/contact#estimate" class="btn-primary">Get a Free Tree Assessment</a>
      <?php if (!empty($phone)): ?>
      <a href="tel:<?= preg_replace('/\D/','',$phone) ?>" class="btn-secondary" style="border-color:rgba(255,255,255,0.3);color:#fff;">
        <i data-lucide="phone" aria-hidden="true"></i> <?= htmlspecialchars(formatPhone($phone)) ?>
      </a>
      <?php endif; ?>
    </div>
    <p style="color:rgba(255,255,255,0.4);font-size:0.8rem;margin-top:var(--space-6);">Serving Watertown · Cambridge · Newton · Waltham · Belmont · Arlington · Lexington · Weston · Brookline · Somerville</p>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
