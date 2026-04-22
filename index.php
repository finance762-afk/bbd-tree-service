<?php
/**
 * BBD Tree Service — Homepage
 * Phase 3: index.php
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

// ─── Page Meta ────────────────────────────────────────────────────────────────
$pageTitle       = "Tree Service Watertown MA | BBD Tree Service";
$pageDescription = "BBD Tree Service delivers expert tree removal, trimming, pruning & stump grinding in Watertown, MA. 26 years experience. Licensed & insured. Free estimates.";
$canonicalUrl    = $siteUrl . '/';
$ogImage         = $siteImages['hero'];
$heroImage       = $siteImages['hero'];
$currentPage     = 'home';
$useSwiper       = true;

// ─── FAQ Content ──────────────────────────────────────────────────────────────
$homeFaqs = [
    [
        'q' => 'How much does tree removal cost in Watertown, MA?',
        'a' => 'Tree removal in Watertown typically costs between $400 and $1,800, depending on tree height, trunk diameter, and proximity to structures. Small trees under 30 feet run $400–$700; large trees over 60 feet can reach $1,200–$1,800. BBD Tree Service provides free on-site estimates — you get an exact price before any work begins.',
    ],
    [
        'q' => 'Is BBD Tree Service licensed and insured in Massachusetts?',
        'a' => 'Yes. BBD Tree Service is fully licensed and carries comprehensive general liability insurance and workers\' compensation coverage throughout Massachusetts. Every project — from a single trim to a full commercial removal — is protected.',
    ],
    [
        'q' => 'Do you handle emergency tree removal near Watertown?',
        'a' => 'Yes. When storm damage or a sudden split creates a hazard, call us directly. BBD Tree Service responds to urgent tree situations throughout Watertown and surrounding communities, assessing the risk and dispatching a crew to secure your property as quickly as possible.',
    ],
    [
        'q' => 'How long does stump grinding take?',
        'a' => 'Most residential stumps in Watertown are ground down in one to two hours. We grind 6–12 inches below grade and clear all wood chips and debris, leaving your lawn ready for grass seed, mulch, or new landscaping immediately after.',
    ],
    [
        'q' => 'What towns near Watertown does BBD Tree Service serve?',
        'a' => 'We operate within a 15-mile radius of Watertown, covering Cambridge, Newton, Waltham, Belmont, Arlington, Lexington, Weston, Brookline, and Somerville. Call or message us to confirm service availability at your address.',
    ],
    [
        'q' => 'When is the best time to trim trees in Massachusetts?',
        'a' => 'Late fall through early spring — while trees are dormant — is ideal for trimming most deciduous species in Massachusetts. Disease spread is reduced and the full branch structure is visible. That said, hazardous or dead branches should be removed any time of year when safety demands it.',
    ],
];

$schemaMarkup = generateFAQSchema($homeFaqs);

// ─── WebSite Schema ───────────────────────────────────────────────────────────
$websiteSchema = json_encode([
    '@context'        => 'https://schema.org',
    '@type'           => 'WebSite',
    'name'            => $siteName,
    'url'             => $siteUrl,
    'potentialAction' => [
        '@type'       => 'SearchAction',
        'target'      => [
            '@type'       => 'EntryPoint',
            'urlTemplate' => $siteUrl . '/?s={search_term_string}',
        ],
        'query-input' => 'required name=search_term_string',
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<body>

<script type="application/ld+json">
<?= $websiteSchema ?>
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ============================================================
     HOMEPAGE-SPECIFIC STYLES
     ============================================================ -->
<style>

/* ── Numbered Sections ───────────────────────────────────────────────── */
.numbered-section { position: relative; }
.section-num {
  display: inline-block;
  font-family: var(--font-heading);
  font-size: 0.7rem;
  font-weight: 700;
  letter-spacing: 3px;
  text-transform: uppercase;
  color: var(--color-accent);
}

/* ── Hero ────────────────────────────────────────────────────────────── */
.hero-home {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  overflow: hidden;
  background-image: url('<?= htmlspecialchars($siteImages['hero']) ?>');
  background-size: 110%;
  background-position: center 30%;
  animation: kenburns-hero 22s ease-in-out infinite alternate;
}
@keyframes kenburns-hero {
  from { background-size: 110%; background-position: center 25%; }
  to   { background-size: 122%; background-position: center 40%; }
}
.hero-home::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    150deg,
    rgba(10, 18, 28, 0.90) 0%,
    rgba(26, 43, 60, 0.78) 55%,
    rgba(6, 182, 212, 0.15) 100%
  );
  z-index: 1;
}
.hero-home::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
  z-index: 1;
  pointer-events: none;
}
.hero-inner {
  position: relative;
  z-index: 2;
  width: 100%;
  padding: 100px 0 60px;
}
.hero-content-block {
  text-align: center;
  max-width: 800px;
  margin: 0 auto;
  padding: 0 var(--space-4);
}
.hero-eyebrow-badge {
  display: inline-flex;
  align-items: center;
  gap: var(--space-2);
  background: rgba(6, 182, 212, 0.12);
  border: 1px solid rgba(6, 182, 212, 0.35);
  border-radius: 999px;
  padding: 6px 18px;
  font-family: var(--font-heading);
  font-size: 0.7rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 2.5px;
  color: var(--color-accent);
  margin-bottom: var(--space-6);
  animation: fadeSlideDown 0.65s ease both;
}
.hero-title {
  font-size: clamp(2.4rem, 6vw, 4.5rem);
  font-weight: 800;
  line-height: 1.1;
  letter-spacing: -0.025em;
  color: #fff;
  text-wrap: balance;
  margin-bottom: var(--space-6);
  animation: fadeSlideUp 0.65s ease 0.12s both;
}
.hero-title .gradient-text {
  background: linear-gradient(135deg, #ffffff 0%, var(--color-accent) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.hero-subtitle-text {
  font-size: 1.1rem;
  color: rgba(255,255,255,0.85);
  max-width: 580px;
  margin: 0 auto var(--space-8);
  line-height: 1.75;
  animation: fadeSlideUp 0.65s ease 0.25s both;
}
.hero-actions {
  display: flex;
  gap: var(--space-4);
  justify-content: center;
  flex-wrap: wrap;
  margin-bottom: var(--space-8);
  animation: fadeSlideUp 0.65s ease 0.38s both;
}
.hero-trust-row {
  display: flex;
  gap: var(--space-5);
  justify-content: center;
  flex-wrap: wrap;
  animation: fadeSlideUp 0.65s ease 0.5s both;
}
.trust-pill {
  display: flex;
  align-items: center;
  gap: var(--space-2);
  color: rgba(255,255,255,0.78);
  font-size: 0.8rem;
  font-weight: 500;
}
.trust-pill [data-lucide] { color: var(--color-accent); }

@keyframes fadeSlideDown {
  from { opacity: 0; transform: translateY(-14px); }
  to   { opacity: 1; transform: translateY(0); }
}
@keyframes fadeSlideUp {
  from { opacity: 0; transform: translateY(18px); }
  to   { opacity: 1; transform: translateY(0); }
}

/* ── Ticker Strip ────────────────────────────────────────────────────── */
.ticker-outer {
  background: var(--color-primary);
  overflow: hidden;
  padding: 13px 0;
  border-top: 2px solid var(--color-accent);
  border-bottom: 2px solid rgba(6,182,212,0.18);
}
.ticker-track-inner {
  display: flex;
  white-space: nowrap;
  animation: ticker-scroll 40s linear infinite;
}
.ticker-track-inner:hover { animation-play-state: paused; }
.ticker-item {
  display: inline-flex;
  align-items: center;
  gap: var(--space-2);
  padding: 0 var(--space-6);
  font-family: var(--font-heading);
  font-size: 0.72rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: rgba(255,255,255,0.88);
  flex-shrink: 0;
}
.ticker-item [data-lucide] { color: var(--color-accent); flex-shrink: 0; }
.ticker-sep { color: var(--color-accent); font-size: 1rem; line-height: 1; }

/* ── Section Dividers ────────────────────────────────────────────────── */
.svg-divider {
  display: block;
  overflow: hidden;
  line-height: 0;
  height: 56px;
}
.svg-divider svg { display: block; width: 100%; height: 100%; }

/* ── Services Grid ───────────────────────────────────────────────────── */
.services-grid-home {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr;
  gap: var(--space-6);
  margin-bottom: var(--space-8);
}
.service-card-featured {
  grid-row: span 2;
  background: linear-gradient(155deg, var(--color-primary) 0%, #0d1e2e 100%);
  color: #fff;
  border-radius: var(--radius-lg);
  padding: var(--space-10);
  position: relative;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  box-shadow: var(--shadow-xl);
  transition: transform var(--transition-base);
  min-height: 420px;
}
.service-card-featured:hover { transform: translateY(-5px); }
.service-card-featured::before {
  content: '';
  position: absolute;
  top: -80px; right: -80px;
  width: 220px; height: 220px;
  border-radius: 50%;
  background: var(--color-accent);
  opacity: 0.07;
}
.featured-icon {
  width: 64px; height: 64px;
  background: rgba(6,182,212,0.15);
  border: 1px solid rgba(6,182,212,0.3);
  border-radius: var(--radius-md);
  display: flex; align-items: center; justify-content: center;
  color: var(--color-accent);
  margin-bottom: var(--space-6);
}
.service-card-featured h3 {
  color: #fff;
  font-size: 1.55rem;
  margin-bottom: var(--space-4);
  letter-spacing: -0.02em;
}
.service-card-featured > p {
  color: rgba(255,255,255,0.74);
  margin-bottom: var(--space-6);
  line-height: 1.7;
  font-size: 0.95rem;
}
.featured-checklist {
  list-style: none;
  margin: 0 0 var(--space-8) 0;
  padding: 0;
  flex: 1;
}
.featured-checklist li {
  display: flex;
  align-items: flex-start;
  gap: var(--space-3);
  color: rgba(255,255,255,0.82);
  font-size: 0.875rem;
  margin-bottom: var(--space-3);
  line-height: 1.5;
}
.featured-checklist li [data-lucide] { color: var(--color-accent); flex-shrink: 0; margin-top: 2px; }

.service-card-std {
  background: #fff;
  border-radius: var(--radius-lg);
  padding: var(--space-6);
  box-shadow: var(--shadow-card);
  transition: all var(--transition-base);
  border-top: 3px solid transparent;
  display: flex;
  flex-direction: column;
}
.service-card-std:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-xl);
  border-top-color: var(--color-accent);
}
.card-icon {
  width: 48px; height: 48px;
  background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
  border-radius: var(--radius-md);
  display: flex; align-items: center; justify-content: center;
  color: #fff;
  margin-bottom: var(--space-4);
  transition: transform var(--transition-base);
}
.service-card-std:hover .card-icon { transform: scale(1.1) rotate(-5deg); }
.service-card-std h3 { font-size: 1.05rem; margin-bottom: var(--space-2); color: var(--color-dark); }
.service-card-std > p {
  color: var(--color-gray);
  font-size: 0.875rem;
  margin-bottom: var(--space-4);
  flex: 1;
  line-height: 1.65;
}
.learn-more-link {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  color: var(--color-primary);
  font-size: 0.82rem;
  font-weight: 700;
  font-family: var(--font-heading);
  text-transform: uppercase;
  letter-spacing: 0.5px;
  transition: gap var(--transition-fast), color var(--transition-fast);
}
.learn-more-link:hover { gap: var(--space-2); color: var(--color-accent); }

/* ── Stats Band ──────────────────────────────────────────────────────── */
.stats-band {
  background: var(--color-primary);
  position: relative;
  overflow: hidden;
  padding: var(--space-12) 0;
}
.stats-band::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 50%, rgba(6,182,212,0.14) 0%, transparent 70%);
}
.stats-row {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-4);
  position: relative;
  z-index: 1;
  text-align: center;
}
.stat-block {
  padding: var(--space-4);
  border-right: 1px solid rgba(255,255,255,0.1);
}
.stat-block:last-child { border-right: none; }
.stat-number-large {
  font-family: var(--font-heading);
  font-size: clamp(2.4rem, 5vw, 3.4rem);
  font-weight: 900;
  color: #fff;
  line-height: 1;
  margin-bottom: var(--space-2);
}
.stat-number-large .accent { color: var(--color-accent); }
.stat-label-text {
  font-size: 0.72rem;
  text-transform: uppercase;
  letter-spacing: 1.5px;
  color: rgba(255,255,255,0.55);
  font-family: var(--font-heading);
  font-weight: 600;
}

/* ── CTA Mid Banner ──────────────────────────────────────────────────── */
.cta-mid {
  position: relative;
  overflow: hidden;
  padding: var(--space-16) 0;
  background: linear-gradient(135deg, #0d1e2e 0%, var(--color-primary) 50%, #1a3a52 100%);
  text-align: center;
}
.cta-mid::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: 0.45;
}
.cta-mid-inner { position: relative; z-index: 1; }
.cta-mid h2 {
  color: #fff;
  font-size: clamp(1.8rem, 4vw, 2.6rem);
  letter-spacing: -0.02em;
  margin-bottom: var(--space-4);
}
.cta-mid > .container p {
  color: rgba(255,255,255,0.78);
  max-width: 560px;
  margin: 0 auto var(--space-6);
  line-height: 1.75;
}
.cta-phone-display {
  display: block;
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.4rem);
  font-weight: 800;
  color: var(--color-accent);
  margin-bottom: var(--space-6);
  letter-spacing: -0.02em;
  transition: color var(--transition-fast);
}
.cta-phone-display:hover { color: #fff; }

/* ── About Split ─────────────────────────────────────────────────────── */
.about-split-home {
  display: grid;
  grid-template-columns: 1fr 1.3fr;
  gap: var(--space-12);
  align-items: start;
}
.about-image-wrap {
  position: relative;
  padding: 0 var(--space-6) var(--space-6) 0;
}
.about-img {
  border-radius: var(--radius-lg);
  width: 100%;
  aspect-ratio: 4/5;
  object-fit: cover;
  display: block;
}
.about-stat-card {
  position: absolute;
  bottom: 0;
  right: 0;
  background: var(--color-accent);
  color: #fff;
  padding: var(--space-6) var(--space-8);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-xl);
  text-align: center;
  min-width: 150px;
}
.about-stat-card .big-year {
  display: block;
  font-family: var(--font-heading);
  font-size: 3rem;
  font-weight: 900;
  line-height: 1;
}
.about-stat-card .year-label {
  display: block;
  font-size: 0.65rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 2px;
  opacity: 0.88;
  margin-top: 6px;
  line-height: 1.4;
}
.about-content-home h2 {
  font-size: clamp(1.8rem, 3.5vw, 2.5rem);
  letter-spacing: -0.02em;
  margin-bottom: var(--space-4);
  margin-top: var(--space-3);
}
.about-content-home .lead-para {
  font-size: 1.05rem;
  color: var(--color-gray-dark);
  line-height: 1.78;
  margin-bottom: var(--space-4);
  max-width: 55ch;
}
.about-content-home .body-para {
  color: var(--color-gray);
  line-height: 1.72;
  margin-bottom: var(--space-6);
  max-width: 55ch;
}
.process-steps {
  display: flex;
  flex-direction: column;
  gap: var(--space-3);
  margin-top: var(--space-6);
}
.process-step {
  display: flex;
  align-items: flex-start;
  gap: var(--space-4);
  padding: var(--space-4);
  background: var(--color-light);
  border-radius: var(--radius-md);
  transition: background var(--transition-fast), box-shadow var(--transition-fast);
}
.process-step:hover { background: rgba(6,182,212,0.06); box-shadow: var(--shadow-sm); }
.step-num {
  flex-shrink: 0;
  width: 38px; height: 38px;
  background: var(--color-primary);
  color: #fff;
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-family: var(--font-heading);
  font-weight: 800;
  font-size: 0.8rem;
}
.step-body h4 { font-size: 0.95rem; margin-bottom: 3px; color: var(--color-dark); }
.step-body p { color: var(--color-gray); font-size: 0.84rem; margin: 0; line-height: 1.6; }

/* ── Reviews Section ─────────────────────────────────────────────────── */
.reviews-bg {
  background: #16213e;
  position: relative;
  overflow: hidden;
}
.reviews-bg::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 30% 50%, rgba(6,182,212,0.08) 0%, transparent 60%);
}
.reviews-section-inner { position: relative; z-index: 1; }
.review-swiper-card {
  background: rgba(255,255,255,0.05);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(255,255,255,0.09);
  border-radius: var(--radius-lg);
  padding: var(--space-6);
  height: 100%;
  display: flex;
  flex-direction: column;
}
.review-quote {
  font-size: 0.9rem;
  font-style: italic;
  color: rgba(255,255,255,0.85);
  line-height: 1.78;
  margin-bottom: var(--space-5);
  flex: 1;
}
.review-reviewer {
  display: flex;
  align-items: center;
  gap: var(--space-3);
  border-top: 1px solid rgba(255,255,255,0.08);
  padding-top: var(--space-4);
}
.review-avatar-circle {
  width: 44px; height: 44px;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
  display: flex; align-items: center; justify-content: center;
  font-family: var(--font-heading);
  font-weight: 700;
  font-size: 0.85rem;
  color: #fff;
  flex-shrink: 0;
}
.reviewer-name {
  color: #fff;
  font-size: 0.875rem;
  font-weight: 600;
  display: block;
}
.reviewer-meta {
  color: rgba(255,255,255,0.45);
  font-size: 0.75rem;
  display: block;
  margin-top: 2px;
}
.star-row { display: flex; gap: 2px; margin-bottom: var(--space-3); }
.star-icon { color: #fbbf24; font-size: 0.95rem; line-height: 1; }
.review-badge-strip {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: var(--space-4);
  flex-wrap: wrap;
  margin-top: var(--space-10);
  padding-top: var(--space-8);
  border-top: 1px solid rgba(255,255,255,0.07);
}
.platform-badge {
  display: flex;
  align-items: center;
  gap: var(--space-2);
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.1);
  border-radius: var(--radius-md);
  padding: var(--space-3) var(--space-5);
  color: rgba(255,255,255,0.75);
  font-size: 0.78rem;
  font-weight: 600;
  font-family: var(--font-heading);
  text-transform: uppercase;
  letter-spacing: 0.5px;
  transition: background var(--transition-fast), color var(--transition-fast);
}
.platform-badge:hover { background: rgba(6,182,212,0.12); color: #fff; }
.badge-stars { color: #fbbf24; font-size: 0.7rem; }
.swiper-pagination-bullet { background: rgba(255,255,255,0.35); opacity: 1; }
.swiper-pagination-bullet-active { background: var(--color-accent); }

/* ── FAQ Section ─────────────────────────────────────────────────────── */
.faq-section-bg { background: var(--color-light); }
.faq-body h3 { font-size: var(--font-size-base); font-weight: 600; margin-bottom: var(--space-2); color: var(--color-dark); }
.faq-body p { color: var(--color-gray); font-size: var(--font-size-sm); margin: 0; line-height: 1.7; }

/* ── Closing CTA ─────────────────────────────────────────────────────── */
.closing-cta {
  background: var(--color-primary);
  position: relative;
  overflow: hidden;
  text-align: center;
  padding: var(--space-16) 0;
}
.closing-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 0%, rgba(6,182,212,0.22) 0%, transparent 65%);
}
.closing-cta-inner { position: relative; z-index: 1; }
.closing-cta h2 {
  color: #fff;
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  margin-bottom: var(--space-4);
  letter-spacing: -0.02em;
}
.closing-cta p {
  color: rgba(255,255,255,0.75);
  max-width: 560px;
  margin: 0 auto var(--space-8);
  line-height: 1.75;
}
.closing-actions {
  display: flex;
  gap: var(--space-4);
  justify-content: center;
  flex-wrap: wrap;
}

/* ── Responsive ──────────────────────────────────────────────────────── */
@media (max-width: 1023px) {
  .services-grid-home { grid-template-columns: 1fr 1fr; }
  .service-card-featured { grid-row: span 1; grid-column: 1 / -1; }
  .stats-row { grid-template-columns: repeat(2, 1fr); }
  .stat-block { border-right: none; border-bottom: 1px solid rgba(255,255,255,0.08); padding-bottom: var(--space-6); }
  .stat-block:nth-child(odd) { border-right: 1px solid rgba(255,255,255,0.08); }
  .stat-block:nth-last-child(-n+2) { border-bottom: none; }
  .about-split-home { grid-template-columns: 1fr; gap: var(--space-8); }
  .about-image-wrap { max-width: 460px; }
}
@media (max-width: 767px) {
  .services-grid-home { grid-template-columns: 1fr; }
  .hero-trust-row { gap: var(--space-3); }
  .stats-row { grid-template-columns: 1fr 1fr; }
  .stat-block:nth-child(odd) { border-right: 1px solid rgba(255,255,255,0.08); }
  .about-image-wrap { display: none; }
  .review-badge-strip { gap: var(--space-3); }
  .platform-badge { font-size: 0.72rem; padding: var(--space-2) var(--space-3); }
}
@media (max-width: 480px) {
  .hero-trust-row { justify-content: flex-start; gap: var(--space-2); }
  .hero-actions { flex-direction: column; align-items: center; }
  .closing-actions { flex-direction: column; align-items: center; }
}
</style>


<!-- ============================================================
     1. HERO SECTION
     ============================================================ -->
<section class="hero-home" aria-label="BBD Tree Service — Tree Removal and Care in Watertown, MA">
  <div class="hero-inner">
    <div class="container">
      <div class="hero-content-block">

        <div class="hero-eyebrow-badge">
          <i data-lucide="shield-check" style="width:13px;height:13px;" aria-hidden="true"></i>
          Serving Greater Boston Since 2000
        </div>

        <h1 class="hero-title">
          Watertown's Tree Experts —<br>
          <span class="gradient-text">Safe Removal &amp; Expert Care</span>
        </h1>

        <p class="hero-subtitle-text">
          BBD Tree Service has handled tree removal, trimming, pruning, and stump grinding across Watertown and Greater Boston for 26 years. We show up on time, work clean, and leave your property safer than we found it.
        </p>

        <div class="hero-actions">
          <a href="/contact" class="btn btn-accent btn-lg">
            <i data-lucide="clipboard-list" aria-hidden="true"></i>
            Get a Free Estimate
          </a>
          <?php if (!empty($phone)): ?>
          <a href="tel:<?= preg_replace('/\D/', '', $phone) ?>" class="btn btn-outline-white btn-lg">
            <i data-lucide="phone" aria-hidden="true"></i>
            Call <?= htmlspecialchars(formatPhone($phone)) ?>
          </a>
          <?php else: ?>
          <a href="/contact" class="btn btn-outline-white btn-lg">
            <i data-lucide="phone" aria-hidden="true"></i>
            Request a Callback
          </a>
          <?php endif; ?>
        </div>

        <div class="hero-trust-row" role="list">
          <div class="trust-pill" role="listitem">
            <i data-lucide="shield-check" style="width:15px;height:15px;" aria-hidden="true"></i>
            Licensed &amp; Insured
          </div>
          <div class="trust-pill" role="listitem">
            <i data-lucide="clock" style="width:15px;height:15px;" aria-hidden="true"></i>
            26+ Years Experience
          </div>
          <div class="trust-pill" role="listitem">
            <i data-lucide="star" style="width:15px;height:15px;" aria-hidden="true"></i>
            4.9 Google Rating
          </div>
          <div class="trust-pill" role="listitem">
            <i data-lucide="tag" style="width:15px;height:15px;" aria-hidden="true"></i>
            Free Estimates
          </div>
        </div>

      </div>
    </div>
  </div>
</section>


<!-- ============================================================
     2. TICKER STRIP
     ============================================================ -->
<div class="ticker-outer" aria-hidden="true" role="presentation">
  <div class="ticker-track-inner">
    <span class="ticker-item"><i data-lucide="tree-pine" style="width:13px;height:13px;"></i> Tree Removal Specialists</span>
    <span class="ticker-item"><span class="ticker-sep">✦</span></span>
    <span class="ticker-item"><i data-lucide="scissors" style="width:13px;height:13px;"></i> Expert Tree Trimming &amp; Pruning</span>
    <span class="ticker-item"><span class="ticker-sep">✦</span></span>
    <span class="ticker-item"><i data-lucide="star" style="width:13px;height:13px;color:#fbbf24;"></i> 4.9 Google Rating</span>
    <span class="ticker-item"><span class="ticker-sep">✦</span></span>
    <span class="ticker-item"><i data-lucide="shield-check" style="width:13px;height:13px;"></i> Licensed &amp; Insured</span>
    <span class="ticker-item"><span class="ticker-sep">✦</span></span>
    <span class="ticker-item"><i data-lucide="clock" style="width:13px;height:13px;"></i> 26 Years Serving Watertown</span>
    <span class="ticker-item"><span class="ticker-sep">✦</span></span>
    <span class="ticker-item"><i data-lucide="circle-slash" style="width:13px;height:13px;"></i> Stump Grinding &amp; Removal</span>
    <span class="ticker-item"><span class="ticker-sep">✦</span></span>
    <span class="ticker-item"><i data-lucide="building-2" style="width:13px;height:13px;"></i> Commercial &amp; Residential</span>
    <span class="ticker-item"><span class="ticker-sep">✦</span></span>
    <span class="ticker-item"><i data-lucide="map-pin" style="width:13px;height:13px;"></i> Serving Cambridge, Newton, Waltham &amp; More</span>
    <span class="ticker-item"><span class="ticker-sep">✦</span></span>
    <span class="ticker-item"><i data-lucide="zap" style="width:13px;height:13px;"></i> Emergency Response Available</span>
    <span class="ticker-item"><span class="ticker-sep">✦</span></span>
    <!-- Duplicate for seamless loop -->
    <span class="ticker-item"><i data-lucide="tree-pine" style="width:13px;height:13px;"></i> Tree Removal Specialists</span>
    <span class="ticker-item"><span class="ticker-sep">✦</span></span>
    <span class="ticker-item"><i data-lucide="scissors" style="width:13px;height:13px;"></i> Expert Tree Trimming &amp; Pruning</span>
    <span class="ticker-item"><span class="ticker-sep">✦</span></span>
    <span class="ticker-item"><i data-lucide="star" style="width:13px;height:13px;color:#fbbf24;"></i> 4.9 Google Rating</span>
    <span class="ticker-item"><span class="ticker-sep">✦</span></span>
    <span class="ticker-item"><i data-lucide="shield-check" style="width:13px;height:13px;"></i> Licensed &amp; Insured</span>
    <span class="ticker-item"><span class="ticker-sep">✦</span></span>
    <span class="ticker-item"><i data-lucide="clock" style="width:13px;height:13px;"></i> 26 Years Serving Watertown</span>
    <span class="ticker-item"><span class="ticker-sep">✦</span></span>
    <span class="ticker-item"><i data-lucide="circle-slash" style="width:13px;height:13px;"></i> Stump Grinding &amp; Removal</span>
    <span class="ticker-item"><span class="ticker-sep">✦</span></span>
    <span class="ticker-item"><i data-lucide="building-2" style="width:13px;height:13px;"></i> Commercial &amp; Residential</span>
    <span class="ticker-item"><span class="ticker-sep">✦</span></span>
    <span class="ticker-item"><i data-lucide="map-pin" style="width:13px;height:13px;"></i> Serving Cambridge, Newton, Waltham &amp; More</span>
    <span class="ticker-item"><span class="ticker-sep">✦</span></span>
    <span class="ticker-item"><i data-lucide="zap" style="width:13px;height:13px;"></i> Emergency Response Available</span>
    <span class="ticker-item"><span class="ticker-sep">✦</span></span>
  </div>
</div>


<!-- Divider: primary → bg-alt -->
<div class="svg-divider" aria-hidden="true" style="background:var(--color-primary);">
  <svg viewBox="0 0 1200 56" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
    <polygon points="0,56 1200,0 1200,56" fill="#f8f9fa"/>
    <polygon points="0,56 0,0 600,40" fill="#f8f9fa" opacity="0.5"/>
  </svg>
</div>


<!-- ============================================================
     3. SERVICES SECTION — 01
     ============================================================ -->
<section class="numbered-section" id="services" style="background:#f8f9fa; padding: var(--space-16) 0 var(--space-10);">
  <div class="container">

    <div class="section-header" data-animate>
      <span class="section-num">01 — Services</span>
      <h2 style="font-size:clamp(1.8rem,4vw,2.8rem); letter-spacing:-0.025em; margin-top:var(--space-3); margin-bottom:var(--space-4);">
        Tree Care Done Right,<br>Every Time
      </h2>
      <p style="color:var(--color-gray); max-width:560px; margin:0 auto; line-height:1.75;">
        Whether it's a single dead branch or a full lot clearance, BBD brings the same crew, the same equipment, and the same standard of clean work to every job in Watertown and the surrounding area.
      </p>
    </div>

    <div class="services-grid-home">

      <!-- Featured Card: Tree Removal -->
      <article class="service-card-featured" data-animate>
        <div class="featured-icon" aria-hidden="true">
          <i data-lucide="tree-pine" style="width:28px;height:28px;"></i>
        </div>
        <h3>Tree Removal</h3>
        <p>
          Removing a tree safely in a dense neighborhood like Watertown takes more than a chainsaw — it takes planning, the right rigging, and 26 years of experience working around houses, fences, and utility lines. We handle every complexity.
        </p>
        <ul class="featured-checklist" aria-label="Tree removal service highlights">
          <li>
            <i data-lucide="check-circle" style="width:15px;height:15px;" aria-hidden="true"></i>
            Trees of any size — small ornamentals to 80-foot oaks
          </li>
          <li>
            <i data-lucide="check-circle" style="width:15px;height:15px;" aria-hidden="true"></i>
            Hazardous, dead, storm-damaged, or unwanted trees
          </li>
          <li>
            <i data-lucide="check-circle" style="width:15px;height:15px;" aria-hidden="true"></i>
            Tight access — yards, driveways, power line proximity
          </li>
          <li>
            <i data-lucide="check-circle" style="width:15px;height:15px;" aria-hidden="true"></i>
            Full debris cleanup and haul-away included
          </li>
          <li>
            <i data-lucide="check-circle" style="width:15px;height:15px;" aria-hidden="true"></i>
            Emergency same-day response available
          </li>
        </ul>
        <a href="/services/tree-removal" class="btn btn-outline-white">
          Learn About Tree Removal
          <i data-lucide="arrow-right" style="width:15px;height:15px;" aria-hidden="true"></i>
        </a>
      </article>

      <!-- Card: Tree Trimming -->
      <article class="service-card-std" data-animate>
        <div class="card-icon" aria-hidden="true">
          <i data-lucide="scissors" style="width:22px;height:22px;"></i>
        </div>
        <h3>Tree Trimming</h3>
        <p>Overgrown branches reduce light, damage rooflines, and weaken trees over time. We trim for clearance, curb appeal, and long-term tree health — not just for looks.</p>
        <a href="/services/tree-trimming" class="learn-more-link" aria-label="Learn more about tree trimming">
          Learn More <i data-lucide="arrow-right" style="width:13px;height:13px;" aria-hidden="true"></i>
        </a>
      </article>

      <!-- Card: Stump Grinding -->
      <article class="service-card-std" data-animate>
        <div class="card-icon" aria-hidden="true">
          <i data-lucide="circle-slash" style="width:22px;height:22px;"></i>
        </div>
        <h3>Stump Grinding</h3>
        <p>Leftover stumps are tripping hazards and pest magnets. We grind them 6–12 inches below grade and leave your yard clean and ready to reseed, sod, or replant.</p>
        <a href="/services/stump-grinding" class="learn-more-link" aria-label="Learn more about stump grinding">
          Learn More <i data-lucide="arrow-right" style="width:13px;height:13px;" aria-hidden="true"></i>
        </a>
      </article>

      <!-- Card: Tree Pruning -->
      <article class="service-card-std" data-animate>
        <div class="card-icon" aria-hidden="true">
          <i data-lucide="git-branch" style="width:22px;height:22px;"></i>
        </div>
        <h3>Tree Pruning</h3>
        <p>Proper pruning builds stronger structure, promotes healthy new growth, and extends tree life significantly. We use arborist-grade cuts — no stubbing, no topping.</p>
        <a href="/services/tree-pruning" class="learn-more-link" aria-label="Learn more about tree pruning">
          Learn More <i data-lucide="arrow-right" style="width:13px;height:13px;" aria-hidden="true"></i>
        </a>
      </article>

      <!-- Card: Stump Removal -->
      <article class="service-card-std" data-animate>
        <div class="card-icon" aria-hidden="true">
          <i data-lucide="minus-circle" style="width:22px;height:22px;"></i>
        </div>
        <h3>Stump Removal</h3>
        <p>Installing a pool, patio, or new garden bed? Full stump extraction removes the root system entirely, restoring your landscape to a completely clear, usable state.</p>
        <a href="/services/stump-removal" class="learn-more-link" aria-label="Learn more about stump removal">
          Learn More <i data-lucide="arrow-right" style="width:13px;height:13px;" aria-hidden="true"></i>
        </a>
      </article>

    </div><!-- /.services-grid-home -->

    <div style="text-align:center;" data-animate>
      <a href="/services" class="btn btn-primary btn-lg">
        View All Services
        <i data-lucide="arrow-right" style="width:17px;height:17px;" aria-hidden="true"></i>
      </a>
    </div>

  </div>
</section><!-- /#services -->


<!-- ============================================================
     4. STATS BAND
     ============================================================ -->
<div class="stats-band">
  <div class="container">
    <div class="stats-row">

      <div class="stat-block" data-animate>
        <div class="stat-number-large">
          <span data-counter="26" data-suffix="+">26+</span>
        </div>
        <div class="stat-label-text">Years in Business</div>
      </div>

      <div class="stat-block" data-animate>
        <div class="stat-number-large">
          <span data-counter="500" data-suffix="+">500+</span>
        </div>
        <div class="stat-label-text">Jobs Completed</div>
      </div>

      <div class="stat-block" data-animate>
        <div class="stat-number-large">
          4.9<span class="accent">★</span>
        </div>
        <div class="stat-label-text">Google Rating</div>
      </div>

      <div class="stat-block" data-animate>
        <div class="stat-number-large">
          <span data-counter="15" data-suffix=" mi">15 mi</span>
        </div>
        <div class="stat-label-text">Service Radius</div>
      </div>

    </div>
  </div>
</div>


<!-- ============================================================
     5. MID-PAGE CTA BANNER
     ============================================================ -->
<section class="cta-mid" aria-label="Contact us about your tree">
  <div class="container">
    <div class="cta-mid-inner" data-animate>
      <span style="display:block; font-family:var(--font-heading); font-size:0.68rem; letter-spacing:3px; text-transform:uppercase; color:var(--color-accent); margin-bottom:var(--space-4);">
        Don't Wait on a Hazard
      </span>
      <h2>A Leaning Tree Won't Fix Itself</h2>
      <p>
        Storm damage, dead limbs, and leaning trees don't wait for convenient timing. BBD Tree Service responds quickly to protect your home, your neighbors, and your property value — with a free estimate and no-pressure approach.
      </p>
      <?php if (!empty($phone)): ?>
      <a href="tel:<?= preg_replace('/\D/', '', $phone) ?>" class="cta-phone-display" aria-label="Call BBD Tree Service now">
        <?= htmlspecialchars(formatPhone($phone)) ?>
      </a>
      <?php endif; ?>
      <a href="/contact" class="btn btn-accent btn-lg">
        <i data-lucide="clipboard-list" aria-hidden="true"></i>
        Get Your Free Estimate
      </a>
    </div>
  </div>
</section>


<!-- Divider: primary → white -->
<div class="svg-divider" aria-hidden="true" style="background:var(--color-primary);">
  <svg viewBox="0 0 1200 56" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0,56 C300,10 900,50 1200,15 L1200,0 L0,0 Z" fill="#ffffff"/>
  </svg>
</div>


<!-- ============================================================
     6. ABOUT / PROCESS SECTION — 02
     ============================================================ -->
<section class="numbered-section" id="about" style="background:#fff; padding: var(--space-16) 0;">
  <div class="container">

    <div class="about-split-home">

      <!-- Image Column -->
      <div class="about-image-wrap" data-animate>
        <picture>
          <source srcset="<?= htmlspecialchars($siteImages['staff']) ?>" type="image/png">
          <img
            src="<?= htmlspecialchars($siteImages['staff']) ?>"
            alt="BBD Tree Service crew — professional arborists serving Watertown, MA"
            class="about-img"
            width="600"
            height="750"
            loading="lazy">
        </picture>
        <div class="about-stat-card" aria-label="26 years serving Greater Boston">
          <span class="big-year">26</span>
          <span class="year-label">Years Serving<br>Greater Boston</span>
        </div>
      </div>

      <!-- Content Column -->
      <div class="about-content-home" data-animate>
        <span class="section-num">02 — About Us</span>
        <h2>Watertown's Tree Service<br>Since the Year 2000</h2>
        <p class="lead-para">
          BBD Tree Service has operated out of Watertown since 2000. We've worked across Greater Boston — tight yards in Cambridge, older estates in Newton, commercial lots in Waltham, suburban properties in Belmont — and we've built the reputation that comes from doing this work correctly, year after year.
        </p>
        <p class="body-para">
          Our crew shows up with the right equipment, respects your property, and doesn't cut corners on safety or cleanup. Every job gets a free estimate upfront. No surprise charges. No pressure. Just straight answers and clean work from a team that's been doing this for over two decades.
        </p>

        <h3 style="font-size:1rem; font-weight:700; color:var(--color-dark); margin-bottom:var(--space-2);">
          How Every Job Works
        </h3>
        <div class="process-steps">
          <div class="process-step">
            <div class="step-num" aria-hidden="true">01</div>
            <div class="step-body">
              <h4>Free On-Site Assessment</h4>
              <p>We walk the property, evaluate the tree, and deliver a written estimate — no obligation.</p>
            </div>
          </div>
          <div class="process-step">
            <div class="step-num" aria-hidden="true">02</div>
            <div class="step-body">
              <h4>Tailored Safety Plan</h4>
              <p>We map the safest removal or care approach, accounting for structures, utilities, and access.</p>
            </div>
          </div>
          <div class="process-step">
            <div class="step-num" aria-hidden="true">03</div>
            <div class="step-body">
              <h4>Expert Execution</h4>
              <p>Our experienced crew works efficiently and carefully, keeping your property intact throughout.</p>
            </div>
          </div>
          <div class="process-step">
            <div class="step-num" aria-hidden="true">04</div>
            <div class="step-body">
              <h4>Full Cleanup &amp; Debrief</h4>
              <p>We haul away all debris and walk you through the completed work before leaving the site.</p>
            </div>
          </div>
        </div>

        <div style="margin-top:var(--space-8);">
          <a href="/about" class="btn btn-primary">
            More About BBD Tree Service
            <i data-lucide="arrow-right" style="width:15px;height:15px;" aria-hidden="true"></i>
          </a>
        </div>
      </div>

    </div>

  </div>
</section><!-- /#about -->


<!-- Divider: white → dark -->
<div class="svg-divider" aria-hidden="true" style="background:#fff;">
  <svg viewBox="0 0 1200 56" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
    <polygon points="0,0 1200,56 1200,56 0,56" fill="#16213e"/>
    <polygon points="0,0 600,56 0,56" fill="#16213e"/>
  </svg>
</div>


<!-- ============================================================
     7. REVIEWS SECTION — 03
     ============================================================ -->
<section class="reviews-bg" id="reviews" style="padding: var(--space-16) 0;">
  <div class="container reviews-section-inner">

    <div class="section-header" style="text-align:center; margin-bottom:var(--space-10);" data-animate>
      <span class="section-num" style="color:rgba(6,182,212,0.85);">03 — Reviews</span>
      <h2 style="color:#fff; font-size:clamp(1.8rem,4vw,2.6rem); letter-spacing:-0.025em; margin-top:var(--space-3); margin-bottom:var(--space-3);">
        What Watertown Homeowners Say
      </h2>
      <p style="color:rgba(255,255,255,0.55); max-width:520px; margin:0 auto; line-height:1.7;">
        85+ reviews across Google, Facebook, and Yelp — earned over 26 years of real work across Greater Boston.
      </p>
    </div>

    <!-- Swiper Carousel -->
    <div class="swiper reviews-swiper" data-animate>
      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <div class="review-swiper-card">
            <div class="star-row" aria-label="5 out of 5 stars">
              <span class="star-icon" aria-hidden="true">★</span><span class="star-icon" aria-hidden="true">★</span><span class="star-icon" aria-hidden="true">★</span><span class="star-icon" aria-hidden="true">★</span><span class="star-icon" aria-hidden="true">★</span>
            </div>
            <p class="review-quote">"BBD took down a massive oak that had been worrying us for three years. The crew was professional, efficient, and the yard was spotless when they left. Not a single branch behind. Will call again without hesitation."</p>
            <div class="review-reviewer">
              <div class="review-avatar-circle" aria-hidden="true">SM</div>
              <div>
                <span class="reviewer-name">Sarah M.</span>
                <span class="reviewer-meta">Watertown, MA &mdash; Tree Removal</span>
              </div>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="review-swiper-card">
            <div class="star-row" aria-label="5 out of 5 stars">
              <span class="star-icon" aria-hidden="true">★</span><span class="star-icon" aria-hidden="true">★</span><span class="star-icon" aria-hidden="true">★</span><span class="star-icon" aria-hidden="true">★</span><span class="star-icon" aria-hidden="true">★</span>
            </div>
            <p class="review-quote">"Had three stumps ground down after another company removed the trees. BBD's price was fair, they showed up exactly when they said, and were in and out in under two hours. Highly recommend."</p>
            <div class="review-reviewer">
              <div class="review-avatar-circle" aria-hidden="true">MR</div>
              <div>
                <span class="reviewer-name">Michael R.</span>
                <span class="reviewer-meta">Belmont, MA &mdash; Stump Grinding</span>
              </div>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="review-swiper-card">
            <div class="star-row" aria-label="5 out of 5 stars">
              <span class="star-icon" aria-hidden="true">★</span><span class="star-icon" aria-hidden="true">★</span><span class="star-icon" aria-hidden="true">★</span><span class="star-icon" aria-hidden="true">★</span><span class="star-icon" aria-hidden="true">★</span>
            </div>
            <p class="review-quote">"The crew trimmed our overgrown maple beautifully. They explained exactly what they were doing and why — it felt like they actually cared about the tree's long-term health, not just getting through the job."</p>
            <div class="review-reviewer">
              <div class="review-avatar-circle" aria-hidden="true">JL</div>
              <div>
                <span class="reviewer-name">Jennifer L.</span>
                <span class="reviewer-meta">Cambridge, MA &mdash; Tree Trimming</span>
              </div>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="review-swiper-card">
            <div class="star-row" aria-label="5 out of 5 stars">
              <span class="star-icon" aria-hidden="true">★</span><span class="star-icon" aria-hidden="true">★</span><span class="star-icon" aria-hidden="true">★</span><span class="star-icon" aria-hidden="true">★</span><span class="star-icon" aria-hidden="true">★</span>
            </div>
            <p class="review-quote">"A storm split a large branch from our elm and left it hanging over the roof. BBD responded within a few hours, secured the limb, and had it removed safely before nightfall. Couldn't ask for better service."</p>
            <div class="review-reviewer">
              <div class="review-avatar-circle" aria-hidden="true">DK</div>
              <div>
                <span class="reviewer-name">David K.</span>
                <span class="reviewer-meta">Newton, MA &mdash; Emergency Service</span>
              </div>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="review-swiper-card">
            <div class="star-row" aria-label="5 out of 5 stars">
              <span class="star-icon" aria-hidden="true">★</span><span class="star-icon" aria-hidden="true">★</span><span class="star-icon" aria-hidden="true">★</span><span class="star-icon" aria-hidden="true">★</span><span class="star-icon" aria-hidden="true">★</span>
            </div>
            <p class="review-quote">"Used BBD for a full property cleanup — two removals, pruning on four trees, and hedge work throughout. Everything completed in a single day. The crew was thorough, professional, and left the yard spotless."</p>
            <div class="review-reviewer">
              <div class="review-avatar-circle" aria-hidden="true">PA</div>
              <div>
                <span class="reviewer-name">Patricia A.</span>
                <span class="reviewer-meta">Arlington, MA &mdash; Residential Service</span>
              </div>
            </div>
          </div>
        </div>

      </div><!-- /.swiper-wrapper -->
      <div class="swiper-pagination" style="margin-top:var(--space-8); position:relative;"></div>
    </div><!-- /.swiper -->

    <!-- Platform Badge Strip -->
    <div class="review-badge-strip" data-animate>
      <div class="platform-badge">
        <i data-lucide="star" style="width:15px;height:15px;color:#fbbf24;" aria-hidden="true"></i>
        Google Reviews
        <span class="badge-stars">★★★★★ 4.9</span>
      </div>
      <div class="platform-badge">
        <i data-lucide="thumbs-up" style="width:15px;height:15px;color:#3b82f6;" aria-hidden="true"></i>
        Facebook
        <span class="badge-stars">★★★★★ 5.0</span>
      </div>
      <div class="platform-badge">
        <i data-lucide="award" style="width:15px;height:15px;color:#ef4444;" aria-hidden="true"></i>
        Yelp
        <span class="badge-stars">★★★★½ 4.7</span>
      </div>
      <div class="platform-badge">
        <i data-lucide="shield-check" style="width:15px;height:15px;color:var(--color-accent);" aria-hidden="true"></i>
        BBB Accredited
        <span class="badge-stars" style="color:rgba(255,255,255,0.6);">A+ Rating</span>
      </div>
    </div>

  </div>
</section><!-- /#reviews -->


<!-- Divider: dark → bg-alt -->
<div class="svg-divider" aria-hidden="true" style="background:#16213e;">
  <svg viewBox="0 0 1200 56" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0,0 C400,56 800,10 1200,45 L1200,56 L0,56 Z" fill="#f8f9fa"/>
  </svg>
</div>


<!-- ============================================================
     8. FAQ SECTION — 04
     ============================================================ -->
<section class="faq-section-bg numbered-section" id="faq" style="padding: var(--space-16) 0;">
  <div class="container">

    <div class="section-header" style="text-align:center; margin-bottom:var(--space-10);" data-animate>
      <span class="section-num">04 — FAQ</span>
      <h2 style="font-size:clamp(1.8rem,4vw,2.6rem); letter-spacing:-0.025em; margin-top:var(--space-3); margin-bottom:var(--space-3);">
        Common Questions About Tree Service<br>in Watertown, MA
      </h2>
      <p style="color:var(--color-gray); max-width:520px; margin:0 auto; line-height:1.72;">
        Straight answers from 26 years of working with homeowners and property managers across Greater Boston.
      </p>
    </div>

    <div class="faq-grid">
      <?php foreach ($homeFaqs as $faq): ?>
      <div class="faq-item" data-animate>
        <div class="faq-icon" aria-hidden="true">
          <i data-lucide="help-circle" style="width:19px;height:19px;"></i>
        </div>
        <div class="faq-body">
          <h3><?= htmlspecialchars($faq['q']) ?></h3>
          <p><?= htmlspecialchars($faq['a']) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div style="text-align:center; margin-top:var(--space-10);" data-animate>
      <p style="color:var(--color-gray); margin-bottom:var(--space-4);">Have a question not covered here?</p>
      <a href="/contact" class="btn btn-primary">
        Ask Us Directly
        <i data-lucide="arrow-right" style="width:15px;height:15px;" aria-hidden="true"></i>
      </a>
    </div>

  </div>
</section><!-- /#faq -->


<!-- Divider: bg-alt → primary -->
<div class="svg-divider" aria-hidden="true" style="background:#f8f9fa;">
  <svg viewBox="0 0 1200 56" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
    <polygon points="0,0 1200,56 0,56" fill="var(--color-primary)"/>
    <polygon points="0,0 1200,0 1200,56" fill="var(--color-primary)" opacity="0.6"/>
  </svg>
</div>


<!-- ============================================================
     9. CLOSING CTA
     ============================================================ -->
<section class="closing-cta" aria-label="Final call to action">
  <div class="container">
    <div class="closing-cta-inner" data-animate>

      <h2>Ready to Reclaim Your Property?</h2>
      <p>
        Whether you're dealing with a dangerous tree, an overgrown hedge line, or a stump that's been an eyesore for years — BBD Tree Service gives you an honest assessment and a fair price. Serving Watertown, Cambridge, Newton, Waltham, and all of Greater Boston since 2000.
      </p>

      <?php if (!empty($phone)): ?>
      <div style="margin-bottom:var(--space-6);">
        <a href="tel:<?= preg_replace('/\D/', '', $phone) ?>" class="cta-phone-display" aria-label="Call BBD Tree Service">
          <?= htmlspecialchars(formatPhone($phone)) ?>
        </a>
      </div>
      <?php endif; ?>

      <div class="closing-actions">
        <a href="/contact" class="btn btn-accent btn-lg">
          <i data-lucide="clipboard-list" aria-hidden="true"></i>
          Get Your Free Estimate
        </a>
        <a href="/services" class="btn btn-outline-white btn-lg">
          Browse Our Services
        </a>
      </div>

    </div>
  </div>
</section>


<!-- Swiper init — runs after all deferred scripts load -->
<script>
window.addEventListener('load', function () {
  if (typeof Swiper !== 'undefined' && document.querySelector('.reviews-swiper')) {
    new Swiper('.reviews-swiper', {
      slidesPerView: 1,
      spaceBetween: 24,
      loop: true,
      autoplay: { delay: 5500, disableOnInteraction: false, pauseOnMouseEnter: true },
      pagination: { el: '.swiper-pagination', clickable: true },
      breakpoints: {
        640:  { slidesPerView: 2 },
        1024: { slidesPerView: 3 }
      }
    });
  }
});
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
