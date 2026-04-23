<?php
/**
 * BBD Tree Service — Thank You / Form Confirmation
 * Phase 4: thank-you.php
 * noindex — do not include in sitemap
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$pageTitle       = "Request Received — BBD Tree Service";
$pageDescription = "Your estimate request has been received. BBD Tree Service will be in touch the same day.";
$canonicalUrl    = $siteUrl . '/thank-you';
$ogImage         = $siteImages['hero'];
$currentPage     = '';
$noindex         = true; // head.php uses this for robots meta

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<style>

.thank-you-section {
    padding: 100px 20px 80px;
    background: var(--color-bg);
    min-height: 70vh;
    display: flex;
    align-items: center;
    text-align: center;
}
.thank-you-inner {
    max-width: 680px;
    margin: 0 auto;
}
.success-icon {
    width: 88px;
    height: 88px;
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-accent) 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto var(--space-2xl);
    box-shadow: 0 0 0 12px rgba(45,106,0,0.1);
    animation: pulse-ring 2s ease-in-out infinite;
}
@keyframes pulse-ring {
    0%, 100% { box-shadow: 0 0 0 12px rgba(45,106,0,0.1); }
    50%       { box-shadow: 0 0 0 20px rgba(45,106,0,0.05); }
}
.success-icon i { color: white; }
.thank-you-inner h1 {
    font-size: clamp(1.8rem, 5vw, 3rem);
    font-weight: 800;
    color: var(--color-text);
    margin-bottom: var(--space-md);
    letter-spacing: -0.02em;
    text-wrap: balance;
}
.thank-you-inner .sub {
    font-size: 1.1rem;
    color: var(--color-text-light);
    line-height: 1.7;
    margin-bottom: var(--space-3xl);
    max-width: 54ch;
    margin-inline: auto;
}

/* ── What Happens Next ───────────────────────────────────────────────── */
.next-steps {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--space-xl);
    margin-bottom: var(--space-3xl);
    text-align: left;
}
.next-step {
    background: white;
    border-radius: var(--radius-lg);
    padding: var(--space-xl);
    box-shadow: var(--shadow-sm);
    border-top: 3px solid var(--color-accent);
    position: relative;
}
.step-number {
    width: 36px;
    height: 36px;
    background: var(--color-primary);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: var(--font-heading);
    font-size: 0.9rem;
    font-weight: 800;
    margin-bottom: var(--space-md);
}
.next-step h3 {
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--color-text);
    margin-bottom: var(--space-sm);
}
.next-step p {
    font-size: 0.85rem;
    color: var(--color-text-light);
    line-height: 1.6;
}

/* ── Actions ─────────────────────────────────────────────────────────── */
.ty-actions {
    display: flex;
    justify-content: center;
    gap: var(--space-md);
    flex-wrap: wrap;
    margin-bottom: var(--space-3xl);
}
.ty-phone-cta {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-md);
    padding: var(--space-xl);
    background: rgba(45,106,0,0.05);
    border: 1px solid rgba(45,106,0,0.15);
    border-radius: var(--radius-md);
    margin-bottom: var(--space-xl);
}
.ty-phone-cta p {
    font-size: 0.9rem;
    color: var(--color-text-light);
    margin: 0;
}
.ty-phone-cta a {
    font-size: 1.2rem;
    font-weight: 800;
    color: var(--color-primary);
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    white-space: nowrap;
}

/* ── Service links ───────────────────────────────────────────────────── */
.explore-services {
    border-top: 1px solid var(--color-bg-alt);
    padding-top: var(--space-2xl);
}
.explore-services p {
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--color-text-light);
    font-weight: 600;
    margin-bottom: var(--space-lg);
}
.service-links-compact {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: var(--space-sm);
}
.service-link-chip {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: white;
    border: 1px solid rgba(45,106,0,0.15);
    border-radius: 999px;
    padding: 6px 14px;
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--color-text);
    transition: background var(--transition), color var(--transition), border-color var(--transition);
    box-shadow: var(--shadow-sm);
}
.service-link-chip:hover {
    background: var(--color-primary);
    color: white;
    border-color: var(--color-primary);
}

@media (max-width: 767px) {
    .next-steps { grid-template-columns: 1fr; }
    .thank-you-section { padding: 70px 16px 60px; min-height: 60vh; }
    .ty-phone-cta { flex-direction: column; gap: var(--space-sm); text-align: center; }
}

</style>

<!-- ════════════════════════════════════════════════════════════
     THANK YOU CONTENT
     ════════════════════════════════════════════════════════════ -->
<section class="thank-you-section" aria-label="Request confirmation">
    <div class="thank-you-inner">

        <div class="success-icon" aria-hidden="true">
            <i data-lucide="check" width="40" height="40"></i>
        </div>

        <h1>Your Request Is In — We'll Be in Touch</h1>
        <p class="sub prose-centered">BBD Tree Service has received your estimate request. A member of our team will review the details and reach out to you the same day during business hours to schedule your on-site assessment.</p>

        <!-- What Happens Next -->
        <div class="next-steps" role="list" aria-label="What happens next">
            <div class="next-step" role="listitem">
                <div class="step-number" aria-hidden="true">1</div>
                <h3>We Review Your Request</h3>
                <p>Your inquiry goes directly to our team — no automated queue. We read every submission and confirm coverage at your address before calling.</p>
            </div>
            <div class="next-step" role="listitem">
                <div class="step-number" aria-hidden="true">2</div>
                <h3>We Schedule an On-Site Visit</h3>
                <p>Every BBD estimate is done in person. We visit your property, assess the scope of work, and answer any questions you have — at no cost.</p>
            </div>
            <div class="next-step" role="listitem">
                <div class="step-number" aria-hidden="true">3</div>
                <h3>You Receive a Written Quote</h3>
                <p>The written estimate you receive is the price you pay — no adjustments on-site, no cleanup charges added after the fact. If you approve it, we schedule the work.</p>
            </div>
        </div>

        <!-- Phone CTA for urgent situations -->
        <?php if ($phone): ?>
        <div class="ty-phone-cta">
            <p>Need faster help or have a tree emergency?</p>
            <a href="tel:<?= preg_replace('/\D/', '', $phone) ?>">
                <i data-lucide="phone-call" width="20" height="20" aria-hidden="true"></i>
                <?= formatPhone($phone) ?>
            </a>
        </div>
        <?php else: ?>
        <div class="ty-phone-cta">
            <p>For urgent or emergency tree situations, contact us directly through the form on our <a href="/contact" style="color:var(--color-primary);font-weight:700;">contact page</a>.</p>
        </div>
        <?php endif; ?>

        <!-- Action buttons -->
        <div class="ty-actions">
            <a href="/" class="btn-primary">Return to Homepage</a>
            <a href="/services" class="btn-secondary">Browse Our Services</a>
        </div>

        <!-- Explore service links -->
        <div class="explore-services">
            <p>Explore specific services</p>
            <nav class="service-links-compact" aria-label="Service pages">
                <?php foreach ($services as $svc): ?>
                <a href="/services/<?= $svc['slug'] ?>" class="service-link-chip">
                    <i data-lucide="<?= htmlspecialchars($svc['icon']) ?>" width="13" height="13" aria-hidden="true"></i>
                    <?= htmlspecialchars($svc['name']) ?>
                </a>
                <?php endforeach; ?>
            </nav>
        </div>

    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
