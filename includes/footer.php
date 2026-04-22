<?php
/**
 * BBD Tree Service — Site Footer Include
 * Phase 2: Header, Footer, Head, Functions
 *
 * Outputs: closes </main>, <footer>, entity block, scripts, back-to-top,
 *          mobile floating CTA bar, closes </body></html>
 *
 * Conditional script loading:
 *   $useSwiper      — loads Swiper CDN
 *   $useVanillaTilt — loads VanillaTilt CDN
 */

if (!isset($siteName)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
}
if (!function_exists('isActivePage')) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
}

// Split services for two-column footer layout
$_footServicesA = array_slice($services, 0, 5);  // col 2
$_footServicesB = array_slice($services, 5);      // col 3 (remaining)

// Build area served string for entity block
$_primaryAreas = array_filter($serviceAreas, fn($a) => $a['primary']);
$_otherAreas   = array_filter($serviceAreas, fn($a) => !$a['primary']);
$_areaList     = implode(', ', array_column(array_values($_otherAreas), 'city'));
?>

</main><!-- /#main-content -->

<!-- ============================================================
     SITE FOOTER
     ============================================================ -->
<footer class="site-footer" aria-label="Site footer">

  <!-- Footer Top Grid -->
  <div class="footer-top">
    <div class="container">
      <div class="footer-grid">

        <!-- Col 1: Brand -->
        <div class="footer-col footer-brand">
          <a href="/" class="footer-logo" aria-label="<?= htmlspecialchars($siteName) ?> — Home">
            <span class="logo-mark">BBD</span>
            <span class="logo-text">
              <span class="logo-name">Tree Service</span>
            </span>
          </a>
          <p class="footer-tagline"><?= htmlspecialchars($tagline) ?></p>
          <p class="footer-desc">
            Serving Watertown and Greater Boston for <?= $yearsInBusiness ?> years.
            Licensed, insured, and committed to safe, professional tree care.
          </p>
          <div class="footer-trust-badges">
            <span class="trust-badge">
              <i data-lucide="shield-check" aria-hidden="true"></i> Licensed &amp; Insured
            </span>
            <span class="trust-badge">
              <i data-lucide="clock" aria-hidden="true"></i> <?= $yearsInBusiness ?>+ Years Experience
            </span>
            <span class="trust-badge">
              <i data-lucide="tag" aria-hidden="true"></i> Free Estimates
            </span>
          </div>
        </div><!-- /.footer-brand -->

        <!-- Col 2: Services (first 5) -->
        <div class="footer-col">
          <h3 class="footer-heading">Our Services</h3>
          <ul class="footer-links" role="list">
            <?php foreach ($_footServicesA as $svc): ?>
            <li>
              <a href="/services/<?= htmlspecialchars($svc['slug']) ?>">
                <i data-lucide="chevron-right" aria-hidden="true"></i>
                <?= htmlspecialchars($svc['name']) ?>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </div><!-- /.footer-col -->

        <!-- Col 3: More Services + Service Areas -->
        <div class="footer-col">
          <h3 class="footer-heading">More Services</h3>
          <ul class="footer-links" role="list">
            <?php foreach ($_footServicesB as $svc): ?>
            <li>
              <a href="/services/<?= htmlspecialchars($svc['slug']) ?>">
                <i data-lucide="chevron-right" aria-hidden="true"></i>
                <?= htmlspecialchars($svc['name']) ?>
              </a>
            </li>
            <?php endforeach; ?>
            <li class="footer-links-divider" aria-hidden="true"></li>
          </ul>
          <h3 class="footer-heading">Service Areas</h3>
          <ul class="footer-links footer-areas" role="list">
            <?php foreach ($serviceAreas as $area): ?>
            <li>
              <a href="/service-area#<?= htmlspecialchars(getAreaSlug($area['city'])) ?>">
                <i data-lucide="map-pin" aria-hidden="true"></i>
                <?= htmlspecialchars($area['city']) ?>, <?= htmlspecialchars($area['state']) ?>
                <?php if ($area['primary']): ?>
                <span class="badge-primary">Primary</span>
                <?php endif; ?>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
          <a href="/service-area" class="footer-view-all">
            View All Service Areas <i data-lucide="arrow-right" aria-hidden="true"></i>
          </a>
        </div><!-- /.footer-col -->

        <!-- Col 4: Contact -->
        <div class="footer-col footer-contact">
          <h3 class="footer-heading">Contact Us</h3>
          <ul class="footer-contact-list" role="list">
            <?php if (!empty($phone)): ?>
            <li>
              <i data-lucide="phone" aria-hidden="true"></i>
              <div>
                <span class="contact-label">Phone</span>
                <a href="tel:<?= preg_replace('/\D/', '', $phone) ?>" class="contact-value">
                  <?= htmlspecialchars(formatPhone($phone)) ?>
                </a>
              </div>
            </li>
            <?php endif; ?>
            <?php if (!empty($email)): ?>
            <li>
              <i data-lucide="mail" aria-hidden="true"></i>
              <div>
                <span class="contact-label">Email</span>
                <a href="mailto:<?= htmlspecialchars($email) ?>" class="contact-value">
                  <?= htmlspecialchars($email) ?>
                </a>
              </div>
            </li>
            <?php endif; ?>
            <li>
              <i data-lucide="map-pin" aria-hidden="true"></i>
              <div>
                <span class="contact-label">Address</span>
                <address class="contact-value">
                  <?= htmlspecialchars($address['street']) ?><br>
                  <?= htmlspecialchars($address['city']) ?>, <?= htmlspecialchars($address['state']) ?> <?= htmlspecialchars($address['zip']) ?>
                </address>
              </div>
            </li>
            <li>
              <i data-lucide="clock" aria-hidden="true"></i>
              <div>
                <span class="contact-label">Hours</span>
                <div class="contact-value">
                  Mon–Fri: 7:00 AM – 6:00 PM<br>
                  Sat: 8:00 AM – 4:00 PM
                </div>
              </div>
            </li>
          </ul>
          <a href="/contact" class="btn-primary btn-block footer-cta-btn">
            <i data-lucide="clipboard-list" aria-hidden="true"></i>
            Get a Free Estimate
          </a>
        </div><!-- /.footer-contact -->

      </div><!-- /.footer-grid -->
    </div><!-- /.container -->
  </div><!-- /.footer-top -->

  <!-- ─── AEO Entity Block ─────────────────────────────────────────────────── -->
  <div class="footer-entity"
    itemscope
    itemtype="https://schema.org/LocalBusiness">

    <meta itemprop="name"      content="<?= htmlspecialchars($siteName) ?>">
    <meta itemprop="url"       content="<?= htmlspecialchars($siteUrl) ?>">
    <?php if (!empty($phone)): ?>
    <meta itemprop="telephone" content="<?= htmlspecialchars($phone) ?>">
    <?php endif; ?>
    <?php if (!empty($email)): ?>
    <meta itemprop="email"     content="<?= htmlspecialchars($email) ?>">
    <?php endif; ?>

    <div class="container">
      <p class="entity-text">
        <strong><?= htmlspecialchars($siteName) ?></strong> is a professional tree service company
        based in <?= htmlspecialchars($address['city']) ?>, <?= htmlspecialchars($address['state']) ?>,
        serving Watertown and surrounding communities including <?= htmlspecialchars($_areaList) ?>.
        With <?= $yearsInBusiness ?> years of experience, <?= htmlspecialchars($siteName) ?> specializes in
        tree removal, tree trimming, and stump grinding.
        <?php if (!empty($phone)): ?>
        Contact: <a href="tel:<?= preg_replace('/\D/', '', $phone) ?>"><?= htmlspecialchars(formatPhone($phone)) ?></a> |
        <?php endif; ?>
        <?php if (!empty($email)): ?>
        <a href="mailto:<?= htmlspecialchars($email) ?>"><?= htmlspecialchars($email) ?></a> |
        <?php endif; ?>
        <a href="<?= htmlspecialchars($siteUrl) ?>"><?= htmlspecialchars($domain) ?></a>.
        Licensed and insured.
      </p>
    </div>
  </div><!-- /.footer-entity -->

  <!-- ─── Footer Bottom Bar ────────────────────────────────────────────────── -->
  <div class="footer-bottom-bar">
    <div class="container">
      <div class="footer-bottom-inner">
        <p class="footer-copyright">
          &copy; <?php echo date('Y'); ?> <?= htmlspecialchars($siteName) ?>. All rights reserved.
        </p>
        <nav class="footer-legal-links" aria-label="Legal navigation">
          <a href="/privacy-policy">Privacy Policy</a>
          <a href="/sitemap">Sitemap</a>
        </nav>
        <p class="footer-credit">
          <a href="https://pageoneinsights.com" rel="dofollow" target="_blank"
            aria-label="Web Design and Hosting by Page One Insights, LLC">
            Web Design &amp; Hosting by Page One Insights, LLC
          </a>
        </p>
      </div>
    </div>
  </div><!-- /.footer-bottom-bar -->

</footer><!-- /.site-footer -->

<!-- ─── Back-to-Top Button ─────────────────────────────────────────────────── -->
<button class="back-to-top" aria-label="Scroll back to top" title="Back to top">
  <i data-lucide="chevron-up" aria-hidden="true"></i>
</button>

<!-- ─── Mobile Floating CTA Bar (< 768px) ────────────────────────────────── -->
<div class="mobile-cta-bar" aria-label="Quick contact actions">
  <?php if (!empty($phone)): ?>
  <a href="tel:<?= preg_replace('/\D/', '', $phone) ?>"
    class="mobile-cta-call"
    aria-label="Call BBD Tree Service now">
    <i data-lucide="phone" aria-hidden="true"></i>
    <span>Call Now</span>
  </a>
  <?php endif; ?>
  <a href="/contact#estimate"
    class="mobile-cta-estimate"
    aria-label="Get a free tree service estimate">
    <i data-lucide="clipboard-list" aria-hidden="true"></i>
    <span>Free Estimate</span>
  </a>
</div><!-- /.mobile-cta-bar -->

<!-- ─── Scripts ───────────────────────────────────────────────────────────── -->
<script src="/assets/js/main.js" defer></script>
<script src="/assets/js/animations.js" defer></script>
<script src="/assets/js/effects.js" defer></script>

<?php if (isset($useSwiper) && $useSwiper): ?>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
<?php endif; ?>

<?php if (isset($useVanillaTilt) && $useVanillaTilt): ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js" defer></script>
<?php endif; ?>

<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>

<!-- Inline: Lucide init + Mobile Menu + Back-to-Top + Dropdown -->
<script>
(function () {
  'use strict';

  // ── Lucide Icons ────────────────────────────────────────────────
  if (typeof lucide !== 'undefined') {
    lucide.createIcons();
  }

  // ── Back-to-Top ─────────────────────────────────────────────────
  var btt = document.querySelector('.back-to-top');
  if (btt) {
    window.addEventListener('scroll', function () {
      btt.classList.toggle('visible', window.scrollY > 400);
    }, { passive: true });
    btt.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // ── Mobile Menu ─────────────────────────────────────────────────
  var hamburger  = document.querySelector('.hamburger');
  var mobileMenu = document.querySelector('.mobile-menu');
  var overlay    = document.querySelector('.mobile-menu-overlay');
  var closeBtn   = document.querySelector('.mobile-menu-close');

  function openMenu() {
    mobileMenu.classList.add('open');
    overlay.classList.add('open');
    document.body.style.overflow = 'hidden';
    hamburger.setAttribute('aria-expanded', 'true');
    mobileMenu.setAttribute('aria-hidden', 'false');
    closeBtn && closeBtn.focus();
  }

  function closeMenu() {
    mobileMenu.classList.remove('open');
    overlay.classList.remove('open');
    document.body.style.overflow = '';
    hamburger.setAttribute('aria-expanded', 'false');
    mobileMenu.setAttribute('aria-hidden', 'true');
    hamburger && hamburger.focus();
  }

  if (hamburger && mobileMenu) {
    hamburger.addEventListener('click', function () {
      mobileMenu.classList.contains('open') ? closeMenu() : openMenu();
    });
  }
  if (overlay)  overlay.addEventListener('click', closeMenu);
  if (closeBtn) closeBtn.addEventListener('click', closeMenu);

  // Close on nav link tap
  document.querySelectorAll('.mobile-nav-link:not(.mobile-sub-toggle), .mobile-sub-link').forEach(function (link) {
    link.addEventListener('click', closeMenu);
  });

  // Mobile sub-menu accordion
  document.querySelectorAll('.mobile-sub-toggle').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var expanded = this.getAttribute('aria-expanded') === 'true';
      this.setAttribute('aria-expanded', (!expanded).toString());
      var sub = this.closest('.mobile-has-sub').querySelector('.mobile-sub-list');
      if (sub) {
        sub.style.maxHeight = expanded ? null : sub.scrollHeight + 'px';
        sub.classList.toggle('open', !expanded);
      }
    });
  });

  // Escape key closes mobile menu
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && mobileMenu && mobileMenu.classList.contains('open')) {
      closeMenu();
    }
  });

  // ── Desktop Dropdown ─────────────────────────────────────────────
  document.querySelectorAll('.has-dropdown').forEach(function (item) {
    var toggle = item.querySelector('a[aria-haspopup]');
    var menu   = item.querySelector('.dropdown-menu');
    if (!toggle || !menu) return;

    item.addEventListener('mouseenter', function () {
      toggle.setAttribute('aria-expanded', 'true');
      menu.classList.add('open');
    });
    item.addEventListener('mouseleave', function () {
      toggle.setAttribute('aria-expanded', 'false');
      menu.classList.remove('open');
    });

    // Keyboard support
    toggle.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        var isOpen = menu.classList.toggle('open');
        toggle.setAttribute('aria-expanded', isOpen.toString());
        if (isOpen) {
          var first = menu.querySelector('a');
          first && first.focus();
        }
      }
    });
  });

  // Close dropdowns on outside click
  document.addEventListener('click', function (e) {
    if (!e.target.closest('.has-dropdown')) {
      document.querySelectorAll('.dropdown-menu.open').forEach(function (m) {
        m.classList.remove('open');
        var t = m.closest('.has-dropdown').querySelector('a[aria-haspopup]');
        t && t.setAttribute('aria-expanded', 'false');
      });
    }
  });

  // ── Scroll-based header ──────────────────────────────────────────
  var header = document.querySelector('.site-header');
  if (header) {
    window.addEventListener('scroll', function () {
      header.classList.toggle('scrolled', window.scrollY > 60);
    }, { passive: true });
  }

})();
</script>

</body>
</html>
