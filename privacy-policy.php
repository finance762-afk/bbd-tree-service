<?php
/**
 * BBD Tree Service — Privacy Policy
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$pageTitle       = "Privacy Policy | BBD Tree Service";
$pageDescription = "BBD Tree Service privacy policy — how we collect, use, and protect your personal information when you contact us or request a free estimate.";
$canonicalUrl    = $siteUrl . '/privacy-policy';
$ogImage         = $siteImages['hero'];
$currentPage     = '';
$noindex         = true;

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<style>
.policy-section {
    padding: 80px 20px 80px;
    background: var(--color-bg);
    min-height: 60vh;
}
.policy-inner {
    max-width: 780px;
    margin: 0 auto;
}
.policy-inner h1 {
    font-size: clamp(1.8rem, 4vw, 2.8rem);
    font-weight: 800;
    color: var(--color-text);
    margin-bottom: var(--space-sm);
    letter-spacing: -0.02em;
}
.policy-inner .policy-date {
    font-size: 0.85rem;
    color: var(--color-text-light);
    margin-bottom: var(--space-3xl);
}
.policy-inner h2 {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--color-primary);
    margin-top: var(--space-3xl);
    margin-bottom: var(--space-md);
}
.policy-inner p {
    font-size: 0.95rem;
    color: var(--color-text-light);
    line-height: 1.75;
    margin-bottom: var(--space-lg);
    max-width: 65ch;
}
.policy-inner ul {
    margin: 0 0 var(--space-lg) var(--space-xl);
    display: flex;
    flex-direction: column;
    gap: var(--space-sm);
}
.policy-inner ul li {
    font-size: 0.95rem;
    color: var(--color-text-light);
    line-height: 1.65;
}
.policy-contact-box {
    background: rgba(45,106,0,0.05);
    border: 1px solid rgba(45,106,0,0.12);
    border-radius: var(--radius-md);
    padding: var(--space-2xl);
    margin-top: var(--space-3xl);
}
.policy-contact-box p {
    margin-bottom: var(--space-sm);
}
.policy-contact-box a {
    color: var(--color-primary);
    font-weight: 600;
}
</style>

<section class="policy-section" aria-label="Privacy policy">
    <div class="policy-inner">
        <h1>Privacy Policy</h1>
        <p class="policy-date">Last updated: April 2026</p>

        <p>BBD Tree Service ("we," "us," or "our") operates <?= htmlspecialchars($domain) ?> and is committed to protecting the personal information you share with us. This policy explains what information we collect, how we use it, and your rights.</p>

        <h2>Information We Collect</h2>
        <p>When you contact us or request a free estimate, we may collect:</p>
        <ul>
            <li>Your name, phone number, and email address</li>
            <li>Your property address or service location</li>
            <li>Details about the tree service work you need</li>
            <li>Any messages you send us through our contact form</li>
        </ul>
        <p>We do not collect payment information through our website. We do not use tracking cookies or third-party advertising scripts beyond standard analytics.</p>

        <h2>How We Use Your Information</h2>
        <p>We use the information you provide solely to:</p>
        <ul>
            <li>Respond to your estimate requests and service inquiries</li>
            <li>Schedule on-site assessments and follow up on estimates</li>
            <li>Contact you about your tree service project</li>
        </ul>
        <p>We do not sell, rent, or share your personal information with third parties for marketing purposes.</p>

        <h2>Form Submissions</h2>
        <p>Contact form submissions on this website are processed securely. Your information is transmitted directly to BBD Tree Service for follow-up. We retain your contact information only as long as needed to complete your service request.</p>

        <h2>Analytics</h2>
        <p>We may use Google Analytics to understand how visitors use our website. This collects anonymized usage data (pages visited, time on site, general location) and does not identify individual users. You can opt out of Google Analytics tracking at any time using the <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener">Google Analytics opt-out browser add-on</a>.</p>

        <h2>Data Security</h2>
        <p>We take reasonable precautions to protect your information. However, no method of internet transmission is 100% secure, and we cannot guarantee absolute security of data transmitted through our website.</p>

        <h2>Your Rights</h2>
        <p>You may request that we delete your personal information at any time by contacting us directly. We will honor deletion requests for information we hold, except where we are required by law to retain it.</p>

        <h2>Children's Privacy</h2>
        <p>Our website is not directed to children under 13. We do not knowingly collect personal information from children.</p>

        <h2>Changes to This Policy</h2>
        <p>We may update this privacy policy from time to time. The date at the top of this page reflects the most recent revision. Continued use of our website after any changes constitutes acceptance of the updated policy.</p>

        <div class="policy-contact-box">
            <p><strong>Questions about this policy?</strong></p>
            <p>Contact BBD Tree Service directly:</p>
            <?php if (!empty($email)): ?>
            <p>Email: <a href="mailto:<?= htmlspecialchars($email) ?>"><?= htmlspecialchars($email) ?></a></p>
            <?php endif; ?>
            <?php if (!empty($phone)): ?>
            <p>Phone: <a href="tel:<?= preg_replace('/\D/', '', $phone) ?>"><?= htmlspecialchars(formatPhone($phone)) ?></a></p>
            <?php endif; ?>
            <p>Address: <?= htmlspecialchars($address['street']) ?>, <?= htmlspecialchars($address['city']) ?>, <?= htmlspecialchars($address['state']) ?> <?= htmlspecialchars($address['zip']) ?></p>
        </div>
    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
