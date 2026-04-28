<?php
/**
 * BBD Tree Service — Contact
 * Phase 4: contact.php
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

// ─── Page Meta ────────────────────────────────────────────────────────────────
$pageTitle       = "Contact BBD Tree Service | Free Estimates Watertown MA";
$pageDescription = "Contact BBD Tree Service in Watertown, MA for a free tree removal, trimming, or stump grinding estimate. Call or fill out our form — same-day response.";
$pageKeywords    = "contact bbd tree service, free estimate watertown ma, tree service quote watertown, tree removal estimate massachusetts";
$canonicalUrl    = $siteUrl . '/contact';
$ogImage         = $siteImages['hero'];
$heroImage       = $siteImages['photo7'];
$currentPage     = 'contact';

$breadcrumbSchema = json_encode([
    '@context' => 'https://schema.org',
    '@type'    => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $siteUrl],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Contact', 'item' => $siteUrl . '/contact'],
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<body>

<script type="application/ld+json"><?= $breadcrumbSchema ?></script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ============================================================
     CONTACT — PAGE STYLES
     ============================================================ -->
<style>

/* ── Page Hero ───────────────────────────────────────────────────────── */
.page-hero {
    position: relative;
    min-height: 48vh;
    display: flex;
    align-items: center;
    background-image: url('<?= $heroImage ?>');
    background-size: cover;
    background-position: center;
    overflow: hidden;
}
.page-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(45,106,0,0.86) 0%, rgba(28,72,0,0.75) 100%);
    z-index: 1;
}
.page-hero .noise {
    position: absolute;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='1'/%3E%3C/svg%3E");
    opacity: 0.04;
    z-index: 2;
}
.page-hero-content {
    position: relative;
    z-index: 3;
    color: white;
    padding: var(--section-pad);
    width: 100%;
}
.page-hero-content .container {
    display: flex;
    flex-direction: column;
    gap: var(--space-lg);
}
.page-hero h1 {
    font-size: clamp(2.2rem, 5vw, 3.8rem);
    font-weight: 800;
    line-height: 1.1;
    text-wrap: balance;
    letter-spacing: -0.02em;
}
.page-hero h1 span {
    display: block;
    background: linear-gradient(90deg, #fff 40%, var(--color-accent));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.breadcrumb {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    font-size: 0.85rem;
    opacity: 0.75;
    color: white;
}
.breadcrumb a { color: white; text-decoration: underline; text-underline-offset: 3px; }
.breadcrumb-sep { opacity: 0.5; }

/* ── Contact Layout ──────────────────────────────────────────────────── */
.contact-section {
    padding: var(--section-pad);
    background: var(--color-bg);
}
.contact-grid {
    display: grid;
    grid-template-columns: 1fr 420px;
    gap: var(--space-4xl);
    align-items: start;
}

/* ── Contact Form ────────────────────────────────────────────────────── */
.contact-form-wrap {
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    padding: var(--space-3xl);
    border-top: 4px solid var(--color-accent);
}
.contact-form-wrap h2 {
    font-size: clamp(1.4rem, 3vw, 1.9rem);
    font-weight: 800;
    color: var(--color-text);
    margin-bottom: var(--space-sm);
    letter-spacing: -0.02em;
}
.contact-form-wrap .form-sub {
    font-size: 0.92rem;
    color: var(--color-text-light);
    line-height: 1.55;
    margin-bottom: var(--space-2xl);
}
.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-lg);
}
.form-group {
    position: relative;
    margin-bottom: var(--space-xl);
}
.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 18px 16px 8px;
    border: 2px solid #e0e0e0;
    border-radius: var(--radius-md);
    font-size: 0.95rem;
    font-family: var(--font-body);
    color: var(--color-text);
    background: white;
    transition: border-color var(--transition), box-shadow var(--transition);
    outline: none;
    -webkit-appearance: none;
    appearance: none;
}
.form-group select {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23666' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 14px center;
    background-size: 18px;
    padding-right: 40px;
    cursor: pointer;
}
.form-group textarea {
    min-height: 120px;
    resize: vertical;
    padding-top: 22px;
}
.form-group label {
    position: absolute;
    top: 50%;
    left: 16px;
    transform: translateY(-50%);
    font-size: 0.9rem;
    color: #999;
    pointer-events: none;
    transition: top 0.2s ease, font-size 0.2s ease, color 0.2s ease;
    background: white;
    padding: 0 4px;
    line-height: 1;
}
.form-group.textarea-group label {
    top: 22px;
    transform: none;
}
.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px rgba(45,106,0,0.12);
}
.form-group input:focus + label,
.form-group input:not(:placeholder-shown) + label,
.form-group select:focus + label,
.form-group select.has-value + label,
.form-group textarea:focus + label,
.form-group textarea:not(:placeholder-shown) + label {
    top: 4px;
    font-size: 0.72rem;
    color: var(--color-primary);
    transform: none;
}
.form-group input:focus-visible,
.form-group select:focus-visible,
.form-group textarea:focus-visible {
    outline: 2px solid var(--color-accent);
    outline-offset: 2px;
}
.form-submit-btn {
    width: 100%;
    padding: 16px 32px;
    background: var(--color-primary);
    color: white;
    font-family: var(--font-heading);
    font-size: 1rem;
    font-weight: 700;
    letter-spacing: 0.04em;
    border: none;
    border-radius: var(--radius-md);
    cursor: pointer;
    box-shadow: 0 4px 0 var(--color-primary-dark);
    transition: transform var(--transition), box-shadow var(--transition);
    overflow: hidden;
    position: relative;
}
.form-submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 0 var(--color-primary-dark);
}
.form-submit-btn:active {
    transform: translateY(2px);
    box-shadow: 0 2px 0 var(--color-primary-dark);
}
.form-privacy {
    text-align: center;
    font-size: 0.75rem;
    color: #999;
    margin-top: var(--space-md);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-sm);
}

/* ── Contact Sidebar ─────────────────────────────────────────────────── */
.contact-sidebar {
    display: flex;
    flex-direction: column;
    gap: var(--space-xl);
}
.contact-info-card {
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    padding: var(--space-2xl);
}
.contact-info-card h3 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--color-text);
    margin-bottom: var(--space-xl);
    padding-bottom: var(--space-md);
    border-bottom: 2px solid var(--color-bg-alt);
}
.contact-detail {
    display: flex;
    align-items: flex-start;
    gap: var(--space-md);
    margin-bottom: var(--space-lg);
}
.contact-detail:last-child { margin-bottom: 0; }
.contact-detail-icon {
    width: 40px;
    height: 40px;
    background: rgba(45,106,0,0.08);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-primary);
    flex-shrink: 0;
}
.contact-detail-text .label {
    font-size: 0.72rem;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: var(--color-text-light);
    font-weight: 600;
    display: block;
    margin-bottom: 2px;
}
.contact-detail-text .value {
    font-size: 0.95rem;
    color: var(--color-text);
    font-weight: 600;
    line-height: 1.4;
}
.contact-detail-text a {
    color: var(--color-primary);
    font-weight: 700;
}
.contact-detail-text a:hover { text-decoration: underline; }

/* ── Hours Table ─────────────────────────────────────────────────────── */
.hours-list {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: var(--space-sm);
}
.hours-list li {
    display: flex;
    justify-content: space-between;
    font-size: 0.88rem;
    padding-bottom: var(--space-sm);
    border-bottom: 1px solid var(--color-bg-alt);
    color: var(--color-text);
}
.hours-list li:last-child { border-bottom: none; }
.hours-list .day { color: var(--color-text-light); }
.hours-list .time { font-weight: 600; }
.hours-list .emergency { color: var(--color-primary); font-weight: 700; font-size: 0.8rem; }

/* ── Map Placeholder ─────────────────────────────────────────────────── */
.map-wrap {
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    aspect-ratio: 4/3;
    background: var(--color-bg-alt);
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}
.map-wrap iframe {
    width: 100%;
    height: 100%;
    border: 0;
    position: absolute;
    inset: 0;
}

/* ── Trust Badge Strip ───────────────────────────────────────────────── */
.trust-strip {
    display: flex;
    gap: var(--space-md);
    flex-wrap: wrap;
    padding: var(--space-xl);
    background: rgba(45,106,0,0.05);
    border-radius: var(--radius-md);
    border: 1px solid rgba(45,106,0,0.1);
    margin-top: var(--space-md);
}
.trust-item {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--color-primary);
}

/* ── Responsive ──────────────────────────────────────────────────────── */
@media (max-width: 1023px) {
    .contact-grid { grid-template-columns: 1fr; }
    .contact-sidebar { flex-direction: row; flex-wrap: wrap; }
    .contact-info-card { flex: 1; min-width: 280px; }
}
@media (max-width: 767px) {
    .page-hero { min-height: 55vh; }
    .form-row { grid-template-columns: 1fr; }
    .contact-form-wrap { padding: var(--space-xl); }
    .contact-sidebar { flex-direction: column; }
}

</style>

<!-- ════════════════════════════════════════════════════════════
     PAGE HERO
     ════════════════════════════════════════════════════════════ -->
<section class="page-hero" aria-label="Contact hero">
    <div class="noise" aria-hidden="true"></div>
    <div class="page-hero-content">
        <div class="container">
            <nav class="breadcrumb" aria-label="Breadcrumb">
                <a href="/">Home</a>
                <span class="breadcrumb-sep" aria-hidden="true">/</span>
                <span aria-current="page">Contact</span>
            </nav>
            <h1 data-animate="fade-up">
                <span>Get a Free Estimate —</span>
                Same-Day Response
            </h1>
            <p style="font-size:1.1rem; opacity:0.9; max-width:52ch; line-height:1.6;" class="prose" data-animate="fade-up">
                Fill out the form below or call directly. BBD Tree Service responds to every inquiry the same day and schedules on-site assessments at your convenience.
            </p>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     CONTACT FORM + SIDEBAR
     ════════════════════════════════════════════════════════════ -->
<section id="estimate" class="contact-section" aria-label="Contact form and information">
    <div class="container">
        <div class="contact-grid">

            <!-- Form -->
            <div data-animate="fade-up">
                <div class="contact-form-wrap">
                    <h2>Request Your Free Estimate</h2>
                    <p class="form-sub">Tell us about your project and we'll be in touch the same day. No obligation — just a straight answer on what your trees need and what it costs.</p>

                    <form
                        action="<?= htmlspecialchars($formAction) ?>"
                        method="POST"
                        novalidate
                        aria-label="Contact form"
                    >
                        <!-- Honeypot -->
                        <input type="text" name="_honeypot" style="display:none" tabindex="-1" autocomplete="off">

                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" id="first_name" name="first_name" placeholder=" " title="Enter your first name" required autocomplete="given-name">
                                <label for="first_name">First Name *</label>
                            </div>
                            <div class="form-group">
                                <input type="text" id="last_name" name="last_name" placeholder=" " title="Enter your last name" required autocomplete="family-name">
                                <label for="last_name">Last Name *</label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <input type="tel" id="phone" name="phone" placeholder=" " title="Enter your phone number" required autocomplete="tel">
                                <label for="phone">Phone Number *</label>
                            </div>
                            <div class="form-group">
                                <input type="email" id="email" name="email" placeholder=" " title="Enter your email address" autocomplete="email">
                                <label for="email">Email Address</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" id="address_field" name="property_address" placeholder=" " title="Enter your property address" autocomplete="street-address">
                            <label for="address_field">Property Address</label>
                        </div>

                        <div class="form-group">
                            <select id="service_requested" name="service_requested" title="Select the service you need" required>
                                <option value="" disabled selected></option>
                                <?php foreach ($services as $svc): ?>
                                <option value="<?= htmlspecialchars($svc['name']) ?>"><?= htmlspecialchars($svc['name']) ?></option>
                                <?php endforeach; ?>
                                <option value="Emergency Tree Service">Emergency Tree Service</option>
                                <option value="Not Sure / Other">Not Sure / Other</option>
                            </select>
                            <label for="service_requested">Service Needed *</label>
                        </div>

                        <div class="form-group textarea-group">
                            <textarea id="message" name="message" placeholder=" " title="Describe your tree service project"></textarea>
                            <label for="message">Tell Us About Your Project</label>
                        </div>

                        <script>
                        (function(){
                            var sel = document.getElementById('service_requested');
                            if (sel) {
                                function updateLabel() {
                                    sel.classList.toggle('has-value', sel.value !== '');
                                }
                                sel.addEventListener('change', updateLabel);
                                updateLabel();
                            }
                        })();
                        </script>

                        <button type="submit" class="form-submit-btn">
                            Send My Free Estimate Request
                        </button>

                        <p class="form-privacy">
                            <i data-lucide="lock" width="13" height="13" aria-hidden="true"></i>
                            Your information is never shared or sold.
                        </p>
                    </form>
                </div>

                <div class="trust-strip" data-animate="fade-up" style="margin-top:var(--space-xl);">
                    <span class="trust-item"><i data-lucide="shield-check" width="16" height="16" aria-hidden="true"></i> Licensed &amp; Insured</span>
                    <span class="trust-item"><i data-lucide="clock" width="16" height="16" aria-hidden="true"></i> Same-Day Response</span>
                    <span class="trust-item"><i data-lucide="star" width="16" height="16" aria-hidden="true"></i> 4.9★ Rating</span>
                    <span class="trust-item"><i data-lucide="check-circle" width="16" height="16" aria-hidden="true"></i> Free On-Site Estimate</span>
                    <span class="trust-item"><i data-lucide="trash-2" width="16" height="16" aria-hidden="true"></i> Full Cleanup Included</span>
                </div>
            </div>

            <!-- Sidebar -->
            <aside class="contact-sidebar" data-animate="fade-up">

                <!-- Contact Details -->
                <div class="contact-info-card">
                    <h3>Contact Information</h3>

                    <?php if ($phone): ?>
                    <div class="contact-detail">
                        <div class="contact-detail-icon" aria-hidden="true">
                            <i data-lucide="phone" width="20" height="20"></i>
                        </div>
                        <div class="contact-detail-text">
                            <span class="label">Phone</span>
                            <a href="tel:<?= preg_replace('/\D/', '', $phone) ?>" class="value"><?= formatPhone($phone) ?></a>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if ($email): ?>
                    <div class="contact-detail">
                        <div class="contact-detail-icon" aria-hidden="true">
                            <i data-lucide="mail" width="20" height="20"></i>
                        </div>
                        <div class="contact-detail-text">
                            <span class="label">Email</span>
                            <a href="mailto:<?= htmlspecialchars($email) ?>" class="value"><?= htmlspecialchars($email) ?></a>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="contact-detail">
                        <div class="contact-detail-icon" aria-hidden="true">
                            <i data-lucide="map-pin" width="20" height="20"></i>
                        </div>
                        <div class="contact-detail-text">
                            <span class="label">Address</span>
                            <span class="value"><?= $address['street'] ?><br><?= $address['city'] ?>, <?= $address['state'] ?> <?= $address['zip'] ?></span>
                        </div>
                    </div>

                    <div class="contact-detail">
                        <div class="contact-detail-icon" aria-hidden="true">
                            <i data-lucide="map" width="20" height="20"></i>
                        </div>
                        <div class="contact-detail-text">
                            <span class="label">Service Area</span>
                            <span class="value">Watertown, Cambridge, Newton,<br>Waltham, Belmont &amp; more</span>
                        </div>
                    </div>
                </div>

                <!-- Hours -->
                <div class="contact-info-card">
                    <h3>Business Hours</h3>
                    <ul class="hours-list" role="list">
                        <li><span class="day">Monday – Friday</span><span class="time">7:00 AM – 6:00 PM</span></li>
                        <li><span class="day">Saturday</span><span class="time">8:00 AM – 4:00 PM</span></li>
                        <li><span class="day">Sunday</span><span class="time">By Appointment</span></li>
                        <li><span class="day">Emergencies</span><span class="time emergency">24/7 Response</span></li>
                    </ul>
                </div>

                <!-- Map -->
                <div class="map-wrap">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2948.5929543248356!2d-71.18226868454127!3d42.36553037918725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e3773b1d5e2ac7%3A0x0!2sWatertown%2C%20MA%2002472!5e0!3m2!1sen!2sus!4v1680000000000!5m2!1sen!2sus"
                        title="BBD Tree Service — Watertown, MA service area map"
                        loading="lazy"
                        allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                </div>

            </aside>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     CTA BANNER (MID-PAGE)
     ════════════════════════════════════════════════════════════ -->
<section style="padding:var(--section-pad); background:linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%); position:relative; overflow:hidden; text-align:center;" aria-label="Emergency contact">
    <div style="position:absolute;inset:0;background-image:url(\"data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='1'/%3E%3C/svg%3E\");opacity:0.06;" aria-hidden="true"></div>
    <div class="container" style="position:relative;z-index:2;">
        <p style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.12em;color:var(--color-accent);font-weight:700;margin-bottom:var(--space-md);" data-animate="fade-up">Storm Damage? Emergency?</p>
        <h2 style="font-size:clamp(1.8rem,4vw,2.6rem);font-weight:800;color:white;margin-bottom:var(--space-md);text-wrap:balance;" data-animate="fade-up">We Respond to Tree Emergencies in Watertown 24/7</h2>
        <p style="font-size:1.05rem;color:rgba(255,255,255,0.85);max-width:55ch;margin:0 auto var(--space-2xl);line-height:1.6;" data-animate="fade-up">A fallen limb or cracked trunk can't wait until Monday. BBD Tree Service handles urgent tree situations across Greater Boston any time, any day.</p>
        <div style="display:flex;align-items:center;justify-content:center;gap:var(--space-xl);flex-wrap:wrap;" data-animate="fade-up">
            <?php if ($phone): ?>
            <a href="tel:<?= preg_replace('/\D/', '', $phone) ?>" class="btn-primary" style="background:var(--color-accent);color:var(--color-primary-dark);">
                <i data-lucide="phone" aria-hidden="true"></i> Call Now — Emergency Line
            </a>
            <?php else: ?>
            <span style="color:var(--color-accent);font-size:1.4rem;font-weight:800;display:flex;align-items:center;gap:var(--space-sm);">
                <i data-lucide="phone" aria-hidden="true"></i> Call for Emergency Response
            </span>
            <?php endif; ?>
            <a href="/services/tree-removal" style="color:rgba(255,255,255,0.85);font-size:0.95rem;text-decoration:underline;text-underline-offset:3px;">Emergency Tree Removal →</a>
        </div>
    </div>
</section>

<!-- ════════════════════════════════════════════════════════════
     CLOSING CTA
     ════════════════════════════════════════════════════════════ -->
<section style="padding:var(--section-pad);background:var(--color-bg-alt);text-align:center;" aria-label="Service area note">
    <div class="container">
        <p style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.12em;color:var(--color-primary);font-weight:700;margin-bottom:var(--space-md);" data-animate="fade-up">Our Coverage Area</p>
        <h2 style="font-size:clamp(1.5rem,3vw,2.2rem);font-weight:800;color:var(--color-text);margin-bottom:var(--space-md);text-wrap:balance;" data-animate="fade-up">Serving Watertown and 10+ Greater Boston Communities</h2>
        <p style="font-size:1rem;color:var(--color-text-light);max-width:60ch;margin:0 auto var(--space-2xl);line-height:1.7;" data-animate="fade-up">We operate within a 15-mile radius of Watertown, MA — covering Cambridge, Newton, Waltham, Belmont, Arlington, Lexington, Weston, Brookline, and Somerville. Not sure if we reach you? Just ask.</p>
        <a href="/service-area" class="btn-primary" data-animate="fade-up">View Full Service Area</a>
    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</body>
</html>
