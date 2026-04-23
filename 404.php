<?php
/**
 * BBD Tree Service — 404 Not Found
 * Phase 4: 404.php
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

http_response_code(404);

$pageTitle       = "Page Not Found | BBD Tree Service";
$pageDescription = "The page you were looking for doesn't exist. Return to BBD Tree Service to find tree removal, trimming, and stump grinding services in Watertown, MA.";
$canonicalUrl    = $siteUrl . '/404';
$ogImage         = $siteImages['hero'];
$currentPage     = '';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<style>

.not-found-section {
    padding: 100px 20px;
    background: var(--color-bg);
    text-align: center;
    min-height: 70vh;
    display: flex;
    align-items: center;
}
.not-found-inner {
    max-width: 640px;
    margin: 0 auto;
}
.error-code {
    font-family: var(--font-heading);
    font-size: clamp(6rem, 18vw, 12rem);
    font-weight: 800;
    line-height: 0.9;
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-accent) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    display: block;
    margin-bottom: var(--space-lg);
    user-select: none;
}
.not-found-icon {
    width: 80px;
    height: 80px;
    background: rgba(45,106,0,0.08);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-primary);
    margin: 0 auto var(--space-xl);
}
.not-found-inner h1 {
    font-size: clamp(1.5rem, 4vw, 2.2rem);
    font-weight: 800;
    color: var(--color-text);
    margin-bottom: var(--space-md);
    letter-spacing: -0.02em;
    text-wrap: balance;
}
.not-found-inner p {
    font-size: 1rem;
    color: var(--color-text-light);
    line-height: 1.7;
    margin-bottom: var(--space-2xl);
    max-width: 52ch;
    margin-inline: auto;
}
.not-found-actions {
    display: flex;
    justify-content: center;
    gap: var(--space-md);
    flex-wrap: wrap;
    margin-bottom: var(--space-3xl);
}
.popular-links-label {
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--color-text-light);
    font-weight: 600;
    margin-bottom: var(--space-lg);
}
.popular-links {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: var(--space-md);
}
.popular-link {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    background: white;
    border: 2px solid rgba(45,106,0,0.12);
    border-radius: var(--radius-md);
    padding: var(--space-md) var(--space-lg);
    font-size: 0.88rem;
    font-weight: 600;
    color: var(--color-text);
    transition: border-color var(--transition), background var(--transition), color var(--transition), transform var(--transition);
    box-shadow: var(--shadow-sm);
}
.popular-link:hover {
    border-color: var(--color-primary);
    background: var(--color-primary);
    color: white;
    transform: translateY(-2px);
}
.popular-link i { color: var(--color-primary); transition: color var(--transition); }
.popular-link:hover i { color: var(--color-accent); }

/* ── Emergency strip ─────────────────────────────────────────────────── */
.emergency-strip-404 {
    padding: var(--space-2xl) var(--space-lg);
    background: var(--color-bg-dark);
    text-align: center;
    color: white;
}
.emergency-strip-404 p {
    font-size: 0.95rem;
    opacity: 0.85;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-md);
    flex-wrap: wrap;
}
.emergency-strip-404 strong {
    color: var(--color-accent);
}
.emergency-strip-404 a {
    color: var(--color-accent);
    font-weight: 700;
    text-decoration: underline;
    text-underline-offset: 3px;
}

@media (max-width: 767px) {
    .not-found-section { min-height: 60vh; padding: 60px 16px; }
}

</style>

<!-- ════════════════════════════════════════════════════════════
     404 CONTENT
     ════════════════════════════════════════════════════════════ -->
<section class="not-found-section" aria-label="Page not found">
    <div class="not-found-inner">
        <span class="error-code" aria-hidden="true">404</span>

        <div class="not-found-icon" aria-hidden="true">
            <i data-lucide="tree" width="36" height="36"></i>
        </div>

        <h1>That Page Has Left the Tree</h1>

        <p class="prose-centered">The page you're looking for has been moved, removed, or may never have existed. Head back to any of our main sections below — or give us a call if you're trying to reach us directly.</p>

        <div class="not-found-actions">
            <a href="/" class="btn-primary">Back to Home</a>
            <a href="/contact" class="btn-secondary">Contact Us</a>
        </div>

        <p class="popular-links-label">Or go to one of these popular pages</p>
        <nav class="popular-links" aria-label="Popular pages">
            <a href="/services" class="popular-link">
                <i data-lucide="layout-grid" width="16" height="16" aria-hidden="true"></i>
                All Services
            </a>
            <a href="/services/tree-removal" class="popular-link">
                <i data-lucide="tree" width="16" height="16" aria-hidden="true"></i>
                Tree Removal
            </a>
            <a href="/services/tree-trimming" class="popular-link">
                <i data-lucide="scissors" width="16" height="16" aria-hidden="true"></i>
                Tree Trimming
            </a>
            <a href="/services/stump-grinding" class="popular-link">
                <i data-lucide="circle-slash" width="16" height="16" aria-hidden="true"></i>
                Stump Grinding
            </a>
            <a href="/service-area" class="popular-link">
                <i data-lucide="map-pin" width="16" height="16" aria-hidden="true"></i>
                Service Area
            </a>
            <a href="/about" class="popular-link">
                <i data-lucide="users" width="16" height="16" aria-hidden="true"></i>
                About Us
            </a>
        </nav>
    </div>
</section>

<!-- Emergency strip -->
<div class="emergency-strip-404">
    <p>
        <i data-lucide="zap" width="18" height="18" aria-hidden="true"></i>
        <strong>Tree emergency?</strong>
        BBD Tree Service responds to urgent situations across Greater Boston — &nbsp;
        <?php if ($phone): ?>
        <a href="tel:<?= preg_replace('/\D/', '', $phone) ?>"><?= formatPhone($phone) ?></a>
        <?php else: ?>
        <a href="/contact">contact us here</a>
        <?php endif; ?>
        — 24/7.
    </p>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
