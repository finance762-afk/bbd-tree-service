<?php
/**
 * BBD Tree Service — Site Header + Nav Include
 * Phase 2: Header, Footer, Head, Functions
 *
 * Outputs: skip-link, <header>, glassmorphism navbar, mobile menu, opens <main>
 * Requires: config.php already loaded (via head.php)
 */

if (!isset($siteName)) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
}
if (!function_exists('isActivePage')) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
}

// Split services into two columns for the dropdown (5 + 5)
$_navServicesA = array_slice($services, 0, 5);
$_navServicesB = array_slice($services, 5);
?>
<!-- Skip to Main Content (Accessibility) -->
<a href="#main-content" class="skip-link">Skip to main content</a>

<header class="site-header" data-header>
  <nav class="navbar" aria-label="Main navigation">
    <div class="navbar-inner container">

      <!-- Logo -->
      <a href="/" class="navbar-logo" aria-label="<?= htmlspecialchars($siteName) ?> — Home">
        <span class="logo-mark">BBD</span>
        <span class="logo-text">
          <span class="logo-name">Tree Service</span>
          <span class="logo-tagline"><?= htmlspecialchars($tagline) ?></span>
        </span>
      </a>

      <!-- Desktop Nav Links -->
      <ul class="navbar-links" role="list">

        <li>
          <a href="/"
            <?= isActivePage('home') ? 'aria-current="page" class="active"' : '' ?>>
            Home
          </a>
        </li>

        <!-- Services Mega-Dropdown -->
        <li class="has-dropdown">
          <a href="/services"
            <?= isActivePage('services') ? 'aria-current="page" class="active"' : '' ?>
            aria-haspopup="true"
            aria-expanded="false">
            Services <i data-lucide="chevron-down" class="nav-chevron" aria-hidden="true"></i>
          </a>
          <div class="dropdown-menu" role="region" aria-label="Services submenu">
            <div class="dropdown-inner">
              <div class="dropdown-col">
                <?php foreach ($_navServicesA as $svc): ?>
                <a href="/services/<?= htmlspecialchars($svc['slug']) ?>"
                  class="dropdown-link"
                  <?= isActivePage($svc['slug']) ? 'aria-current="page"' : '' ?>>
                  <i data-lucide="<?= htmlspecialchars($svc['icon']) ?>" aria-hidden="true"></i>
                  <?= htmlspecialchars($svc['name']) ?>
                </a>
                <?php endforeach; ?>
              </div>
              <div class="dropdown-col">
                <?php foreach ($_navServicesB as $svc): ?>
                <a href="/services/<?= htmlspecialchars($svc['slug']) ?>"
                  class="dropdown-link"
                  <?= isActivePage($svc['slug']) ? 'aria-current="page"' : '' ?>>
                  <i data-lucide="<?= htmlspecialchars($svc['icon']) ?>" aria-hidden="true"></i>
                  <?= htmlspecialchars($svc['name']) ?>
                </a>
                <?php endforeach; ?>
                <a href="/services" class="dropdown-all-link">
                  View All Services <i data-lucide="arrow-right" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </li>

        <li>
          <a href="/service-area"
            <?= isActivePage('service-area') ? 'aria-current="page" class="active"' : '' ?>>
            Service Area
          </a>
        </li>

        <li>
          <a href="/about"
            <?= isActivePage('about') ? 'aria-current="page" class="active"' : '' ?>>
            About
          </a>
        </li>

        <li>
          <a href="/contact"
            <?= isActivePage('contact') ? 'aria-current="page" class="active"' : '' ?>>
            Contact
          </a>
        </li>

      </ul><!-- /.navbar-links -->

      <!-- Desktop CTA -->
      <div class="navbar-cta">
        <?php if (!empty($phone)): ?>
        <a href="tel:<?= preg_replace('/\D/', '', $phone) ?>" class="navbar-phone" aria-label="Call BBD Tree Service">
          <i data-lucide="phone" aria-hidden="true"></i>
          <?= htmlspecialchars(formatPhone($phone)) ?>
        </a>
        <?php endif; ?>
        <a href="/contact" class="btn btn-primary btn-sm">Free Estimate</a>
      </div>

      <!-- Hamburger (mobile) -->
      <button
        class="hamburger"
        aria-label="Open navigation menu"
        aria-expanded="false"
        aria-controls="mobile-menu">
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
      </button>

    </div><!-- /.navbar-inner -->
  </nav><!-- /.navbar -->
</header><!-- /.site-header -->

<!-- Mobile Full-Screen Menu -->
<div class="mobile-menu" id="mobile-menu" role="dialog" aria-label="Navigation menu" aria-hidden="true">
  <div class="mobile-menu-inner">

    <!-- Close Button -->
    <button class="mobile-menu-close" aria-label="Close navigation menu">
      <i data-lucide="x" aria-hidden="true"></i>
    </button>

    <!-- Mobile Nav Links -->
    <nav aria-label="Mobile navigation">
      <ul class="mobile-nav-list" role="list">

        <li>
          <a href="/" class="mobile-nav-link <?= isActivePage('home') ? 'active' : '' ?>">
            Home
          </a>
        </li>

        <li class="mobile-has-sub">
          <button class="mobile-nav-link mobile-sub-toggle" aria-expanded="false">
            Services <i data-lucide="chevron-down" aria-hidden="true"></i>
          </button>
          <ul class="mobile-sub-list" role="list">
            <?php foreach ($services as $svc): ?>
            <li>
              <a href="/services/<?= htmlspecialchars($svc['slug']) ?>"
                class="mobile-sub-link <?= isActivePage($svc['slug']) ? 'active' : '' ?>">
                <?= htmlspecialchars($svc['name']) ?>
              </a>
            </li>
            <?php endforeach; ?>
            <li>
              <a href="/services" class="mobile-sub-link mobile-sub-all">All Services</a>
            </li>
          </ul>
        </li>

        <li>
          <a href="/service-area" class="mobile-nav-link <?= isActivePage('service-area') ? 'active' : '' ?>">
            Service Area
          </a>
        </li>

        <li>
          <a href="/about" class="mobile-nav-link <?= isActivePage('about') ? 'active' : '' ?>">
            About
          </a>
        </li>

        <li>
          <a href="/contact" class="mobile-nav-link <?= isActivePage('contact') ? 'active' : '' ?>">
            Contact
          </a>
        </li>

      </ul>
    </nav>

    <!-- Mobile CTA Block -->
    <div class="mobile-cta-block">
      <?php if (!empty($phone)): ?>
      <a href="tel:<?= preg_replace('/\D/', '', $phone) ?>" class="btn btn-primary btn-block">
        <i data-lucide="phone" aria-hidden="true"></i>
        Call <?= htmlspecialchars(formatPhone($phone)) ?>
      </a>
      <?php endif; ?>
      <a href="/contact" class="btn btn-secondary btn-block">
        <i data-lucide="clipboard-list" aria-hidden="true"></i>
        Get a Free Estimate
      </a>
    </div>

  </div><!-- /.mobile-menu-inner -->
</div><!-- /.mobile-menu -->
<div class="mobile-menu-overlay" aria-hidden="true"></div>

<main id="main-content">
