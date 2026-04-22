<?php
/**
 * BBD Tree Service — Commercial Tree Service Page
 * Phase 4: Inner Pages
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$service     = $services[5]; // Commercial Tree Service
$currentPage = 'commercial-tree-service';

$pageTitle       = "Commercial Tree Service Watertown MA | BBD Tree Service";
$pageDescription = "Commercial tree care in Watertown, MA for businesses, property managers & municipalities. BBD Tree Service provides reliable scheduling, liability coverage & documentation.";
$pageKeywords    = implode(', ', $service['keywords']);
$canonicalUrl    = $siteUrl . '/services/commercial-tree-service';
$ogImage         = $siteImages['photo4'];
$heroImage       = $siteImages['photo4'];

$faqs = [
    [
        'q' => 'Do you carry commercial liability insurance for job sites in Watertown?',
        'a' => 'Yes. BBD Tree Service carries comprehensive general liability insurance and workers\' compensation coverage that meets or exceeds standard commercial contractor requirements across Massachusetts. Certificates of insurance are available on request for any property manager or municipality.',
    ],
    [
        'q' => 'Can you handle multi-property commercial accounts in the Greater Boston area?',
        'a' => 'Yes. We work with property management companies, HOAs, and municipal public works departments managing multiple properties across the Watertown area. We can schedule recurring inspections and maintenance cycles across your portfolio and provide consolidated invoicing and service documentation.',
    ],
    [
        'q' => 'What types of commercial properties does BBD Tree Service work with?',
        'a' => 'We serve office parks, retail centers, apartment complexes, HOAs, municipal parks, school campuses, and industrial properties throughout Watertown and surrounding communities. Any commercial property with trees, shrubs, or green space on the grounds is within our scope.',
    ],
    [
        'q' => 'Can commercial tree work be scheduled outside of business hours?',
        'a' => 'We can schedule early morning or Saturday work for commercial accounts when standard business hours would disrupt operations. Availability for off-hours scheduling depends on crew capacity at the time of booking — discuss your requirements during the estimate and we\'ll confirm what\'s available.',
    ],
];

$schemaMarkup = generateServiceSchema($service) . "\n" . generateFAQSchema($faqs);

$breadcrumbSchema = json_encode([
    '@context'        => 'https://schema.org',
    '@type'           => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => $siteUrl],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $siteUrl . '/services'],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Commercial Tree Service'],
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
.service-hero { min-height: 55vh; display: flex; align-items: flex-end; position: relative; overflow: hidden; background-image: url('<?= htmlspecialchars($siteImages['photo4']) ?>'); background-size: cover; background-position: center 35%; }
.service-hero::before { content:''; position:absolute; inset:0; background:linear-gradient(155deg,rgba(10,18,28,0.9) 0%,rgba(45,106,0,0.75) 55%,rgba(108,194,0,0.08) 100%); z-index:1; }
.service-hero-inner { position:relative; z-index:2; width:100%; padding:60px 0 50px; }
.breadcrumb-nav { display:flex; align-items:center; gap:var(--space-2); font-size:0.8rem; color:rgba(255,255,255,0.6); margin-bottom:var(--space-4); flex-wrap:wrap; }
.breadcrumb-nav a { color:rgba(255,255,255,0.6); } .breadcrumb-nav a:hover { color:var(--color-accent); }
.breadcrumb-nav .sep { color:rgba(255,255,255,0.3); } .breadcrumb-nav .current { color:rgba(255,255,255,0.9); }
.service-hero-eyebrow { display:inline-flex; align-items:center; gap:var(--space-2); background:rgba(108,194,0,0.12); border:1px solid rgba(108,194,0,0.35); border-radius:999px; padding:5px 16px; font-size:0.7rem; font-weight:700; text-transform:uppercase; letter-spacing:2px; color:var(--color-accent); margin-bottom:var(--space-4); }
.service-hero h1 { font-size:clamp(2.2rem,5vw,3.8rem); font-weight:800; line-height:1.1; letter-spacing:-0.025em; color:#fff; text-wrap:balance; margin-bottom:var(--space-4); }
.service-hero h1 .accent { color:var(--color-accent); }
.service-hero-sub { font-size:1.05rem; color:rgba(255,255,255,0.82); max-width:560px; line-height:1.7; margin-bottom:var(--space-6); }
.hero-cta-row { display:flex; align-items:center; gap:var(--space-4); flex-wrap:wrap; }

/* Commercial features — asymmetric grid — signature layout */
.commercial-asym { display:grid; grid-template-columns:1fr 1fr; gap:0; min-height:500px; }
@media (max-width:767px) { .commercial-asym { grid-template-columns:1fr; } }
.comm-img-panel { position:relative; overflow:hidden; min-height:300px; }
.comm-img-panel img { width:100%; height:100%; object-fit:cover; display:block; }
.comm-img-panel::after { content:''; position:absolute; inset:0; background:linear-gradient(to right,transparent 60%,var(--color-primary)); }
.comm-content-panel { background:var(--color-primary); padding:var(--space-12) var(--space-10); display:flex; flex-direction:column; justify-content:center; }
@media (max-width:1023px) { .comm-content-panel { padding:var(--space-8) var(--space-6); } }
.comm-feature-list { list-style:none; display:flex; flex-direction:column; gap:var(--space-4); margin-top:var(--space-6); }
.comm-feature-list li { display:flex; gap:var(--space-3); align-items:flex-start; }
.comm-feature-list .feat-icon { width:36px; height:36px; flex-shrink:0; background:rgba(108,194,0,0.15); border-radius:var(--radius); display:flex; align-items:center; justify-content:center; color:var(--color-accent); margin-top:2px; }
.comm-feature-list h4 { font-size:0.95rem; font-weight:700; color:#fff; margin-bottom:var(--space-1); }
.comm-feature-list p  { font-size:0.85rem; color:rgba(255,255,255,0.7); line-height:1.5; }

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
        <span class="current">Commercial Tree Service</span>
      </nav>
      <div class="service-hero-eyebrow">
        <i data-lucide="building-2" aria-hidden="true"></i>
        Watertown, MA
      </div>
      <h1>Commercial Tree Service <span class="accent">That Works</span><br>on Your Schedule</h1>
      <p class="service-hero-sub">Reliable, documented, fully insured tree care for businesses, property managers, and municipalities across Watertown and Greater Boston.</p>
      <div class="hero-cta-row">
        <a href="/contact" class="btn-primary"><i data-lucide="clipboard-list" aria-hidden="true"></i>Request a Commercial Quote</a>
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
      <span>COI Available on Request</span><span class="ticker-sep">✦</span><span>Multi-Property Accounts</span><span class="ticker-sep">✦</span><span>Flexible Scheduling</span><span class="ticker-sep">✦</span><span>26 Years Experience</span><span class="ticker-sep">✦</span><span>Licensed &amp; Insured</span><span class="ticker-sep">✦</span><span>Free Site Assessments</span><span class="ticker-sep">✦</span>
    </div>
    <div class="ticker-content" aria-hidden="true">
      <span>COI Available on Request</span><span class="ticker-sep">✦</span><span>Multi-Property Accounts</span><span class="ticker-sep">✦</span><span>Flexible Scheduling</span><span class="ticker-sep">✦</span><span>26 Years Experience</span><span class="ticker-sep">✦</span><span>Licensed &amp; Insured</span><span class="ticker-sep">✦</span><span>Free Site Assessments</span><span class="ticker-sep">✦</span>
    </div>
  </div>
</div>

<section class="section-pad" style="background:var(--color-bg);">
  <div class="container">
    <div class="answer-block" data-animate="fade-up">
      <h2>What makes commercial tree service different from residential?</h2>
      <p>Commercial tree work involves liability documentation requirements, multi-stakeholder approvals, larger job scopes, and scheduling constraints that residential work doesn't. BBD Tree Service has operated in commercial contexts throughout Watertown and Greater Boston for 26 years — we provide certificates of insurance, detailed scope documents, and flexible scheduling that works around your tenants, customers, and operations.</p>
    </div>

    <div style="max-width:800px;margin-bottom:var(--space-10);" data-animate="fade-up">
      <div class="eyebrow-label">Commercial Tree Service Watertown MA</div>
      <h2 class="section-title">A Commercial Tree Contractor That Doesn't Make Your Job Harder</h2>
      <div class="prose">
        <p>Property managers in Watertown deal with enough complexity without a tree contractor who shows up late, skips documentation, and leaves a mess for your tenants to complain about. BBD Tree Service runs commercial accounts the way commercial clients need them run: confirmed scheduling, site-ready crews, proper liability paperwork, and cleanup that meets a professional standard before we leave.</p>
        <p>We work across the full range of commercial property types — multi-family residential, office parks, retail centers, school grounds, municipal parks, and HOA common areas. Our crews are experienced at working around parked cars, operating equipment on paved surfaces without damage, and completing jobs in multiple phases when operational needs require it.</p>
        <p>For property managers handling multiple sites, we offer consolidated billing and annual maintenance programs that schedule regular tree assessments, pruning cycles, and storm response across your portfolio. You get one contact, consistent documentation, and a crew that knows your properties.</p>
      </div>
      <p class="last-updated">Last Updated: April 2026</p>
    </div>
  </div>
</section>

<!-- ── ASYMMETRIC SPLIT — SIGNATURE SECTION ──────────────────────────────────── -->
<section class="commercial-asym" aria-label="What we bring to commercial accounts">
  <div class="comm-img-panel">
    <img
      src="<?= htmlspecialchars($siteImages['branches2']) ?>"
      alt="BBD Tree Service commercial tree work in Watertown MA"
      width="800" height="600"
      loading="lazy">
  </div>
  <div class="comm-content-panel">
    <div class="eyebrow-label" style="color:var(--color-accent);" data-animate="fade-up">What We Provide</div>
    <h2 style="color:#fff;font-size:clamp(1.6rem,3vw,2.2rem);margin-bottom:var(--space-2);" data-animate="fade-up">Built for Commercial Clients</h2>
    <ul class="comm-feature-list" data-animate="fade-up">
      <li>
        <div class="feat-icon"><i data-lucide="file-text" aria-hidden="true"></i></div>
        <div><h4>Certificate of Insurance</h4><p>COI provided to property managers, HOAs, and municipal clients on request before work begins.</p></div>
      </li>
      <li>
        <div class="feat-icon"><i data-lucide="calendar" aria-hidden="true"></i></div>
        <div><h4>Flexible Scheduling</h4><p>Early morning, Saturday, and phased-visit scheduling available to work around your tenants and operations.</p></div>
      </li>
      <li>
        <div class="feat-icon"><i data-lucide="clipboard-list" aria-hidden="true"></i></div>
        <div><h4>Written Scope &amp; Invoicing</h4><p>Every commercial job is documented with a written scope, job record, and itemized invoice — ready for your files or HOA board.</p></div>
      </li>
      <li>
        <div class="feat-icon"><i data-lucide="layers" aria-hidden="true"></i></div>
        <div><h4>Multi-Property Programs</h4><p>Annual maintenance cycles across multiple properties with consolidated billing and a single point of contact.</p></div>
      </li>
    </ul>
  </div>
</section>

<section class="cta-banner-service">
  <div class="container" style="position:relative;z-index:1;">
    <div class="eyebrow-label" style="color:var(--color-accent);margin-bottom:var(--space-3);" data-animate="fade-up">Commercial Tree Service Watertown MA</div>
    <h2 data-animate="fade-up">Managing a Property with Trees That Need Attention?</h2>
    <p data-animate="fade-up">Request a commercial site assessment for your Watertown-area property. We'll document the scope, provide insurance certificates, and give you a firm price.</p>
    <div class="cta-banner-actions" data-animate="fade-up">
      <a href="/contact" class="btn-primary">Request a Commercial Assessment</a>
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
      <h2 class="section-title" data-animate="fade-up">From First Contact to Finished Job</h2>
      <div class="process-steps" style="margin-top:var(--space-8);" data-animate="fade-up">
        <div class="process-step">
          <div class="step-num">1</div>
          <div class="step-body">
            <h3>Commercial Site Walk</h3>
            <p>We visit the property, assess all trees and green space, identify hazards and maintenance needs, and develop a scope document for your review.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">2</div>
          <div class="step-body">
            <h3>Proposal &amp; Documentation</h3>
            <p>You receive a written proposal with itemized pricing, a certificate of insurance, and a suggested schedule. No work begins without written approval.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">3</div>
          <div class="step-body">
            <h3>Scheduled Execution</h3>
            <p>Our crew arrives on the confirmed date with proper equipment and setup. We communicate with your site contact throughout the job and flag anything unexpected immediately.</p>
          </div>
        </div>
        <div class="process-step">
          <div class="step-num">4</div>
          <div class="step-body">
            <h3>Site Cleanup &amp; Closeout</h3>
            <p>The property is cleaned to commercial standard before we leave. You receive a job completion record and invoice within 48 hours.</p>
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
      <h2 class="section-title" data-animate="fade-up">Commercial Tree Service FAQs</h2>
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
    <div class="eyebrow-label" style="color:var(--color-accent);" data-animate="fade-up">Commercial Tree Service Watertown MA</div>
    <h2 style="color:#fff;font-size:clamp(1.8rem,4vw,2.6rem);margin-bottom:var(--space-4);" data-animate="fade-up">Let's Talk About Your Property's Tree Needs</h2>
    <p style="color:rgba(255,255,255,0.75);max-width:520px;margin:0 auto var(--space-8);line-height:1.7;" data-animate="fade-up">From single-property assessments to multi-site annual programs, BBD Tree Service works the way commercial clients need — documented, insured, and reliable.</p>
    <div class="cta-banner-actions" data-animate="fade-up">
      <a href="/contact#estimate" class="btn-primary">Get a Commercial Quote</a>
      <?php if (!empty($phone)): ?>
      <a href="tel:<?= preg_replace('/\D/','',$phone) ?>" class="btn-secondary" style="border-color:rgba(255,255,255,0.3);color:#fff;">
        <i data-lucide="phone" aria-hidden="true"></i> <?= htmlspecialchars(formatPhone($phone)) ?>
      </a>
      <?php endif; ?>
    </div>
    <p style="color:rgba(255,255,255,0.4);font-size:0.8rem;margin-top:var(--space-6);">Serving businesses across Watertown, Cambridge, Newton, Waltham &amp; Greater Boston</p>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
