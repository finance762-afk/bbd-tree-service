<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
$pageTitle = 'Terms of Service | BBD Tree Service';
$pageDescription = 'The terms governing use of the BBD Tree Service website, including estimates, communications consent, disclaimers, and governing law.';
$currentPage = 'legal';
$noindex = false;
$ogImage = $ogImage ?? '';
$heroImage = $heroImage ?? '';
$pageKeywords = $pageKeywords ?? '';
$useSwiper = false;
$useTilt = false;
$useTyped = false;
$schemaMarkup = <<<'JSON'
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Terms of Service",
  "description": "The terms governing use of the BBD Tree Service website, including estimates, communications consent, disclaimers, and governing law."
}
JSON;
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>
<style>
.p1-legal{max-width:820px;margin:0 auto;padding:48px 20px 64px;line-height:1.7;font-size:16px}
.p1-legal h1{font-size:2rem;margin:0 0 8px}
.p1-legal .p1-legal-updated{font-size:14px;opacity:.7;margin:0 0 32px}
.p1-legal h2{font-size:1.25rem;margin:36px 0 10px}
.p1-legal p,.p1-legal li{margin:0 0 12px}
.p1-legal ul{padding-left:22px;margin:0 0 16px}
.p1-legal a{text-decoration:underline}
.p1-legal .p1-legal-note{padding:14px 16px;border-left:3px solid currentColor;opacity:.9;margin:0 0 20px}
</style>
<main id="main-content">
  <article class="p1-legal">
      <h1>Terms of Service</h1>
      <p class="p1-legal-updated">Last updated: July 22, 2026</p>

      <p>These Terms of Service (&ldquo;Terms&rdquo;) govern your use of this website operated by
      BBD Tree Service (&ldquo;we,&rdquo; &ldquo;us,&rdquo; or &ldquo;our&rdquo;). By accessing the
      site or submitting a form, you agree to these Terms. If you do not agree, please do not use
      the site.</p>

      <h2>Our Services</h2>
      <p>This website provides information about our services and lets you request an estimate or
      contact us. Submitting a form does not create a contract or guarantee that we will perform
      work for you.</p>

      <h2>Estimates and Pricing</h2>
      <p>Any pricing, timelines, or availability shown on this site are general information, not
      binding offers. Project pricing depends on scope, site conditions, materials, and access, and
      is confirmed only in a written estimate or agreement we provide to you. Work performed is
      governed by that written agreement, which controls if it conflicts with these Terms.</p>

      <h2>Use of This Site</h2>
      <p>You agree not to use this site to submit false or misleading information, to submit
      automated or bulk requests, to attempt to gain unauthorized access to our systems, or to
      interfere with the site&rsquo;s operation or security.</p>

      <h2>Communications Consent</h2>
      <p>When you submit a form, you consent to be contacted about your request using the contact
      details you provide, according to the consent options you select. Marketing text messages
      require separate opt-in and are never a condition of purchase. See our
      <a href="/privacy-policy/">Privacy Policy</a> for details on how we handle your information.</p>

      <h2>Intellectual Property</h2>
      <p>The content on this site — text, photographs, graphics, and logos — is owned by us or our
      licensors and is protected by copyright and trademark law. You may not copy, republish, or use
      it commercially without our written permission.</p>

      <h2>Third-Party Links</h2>
      <p>This site may link to third-party websites. We do not control and are not responsible for
      their content, products, or privacy practices.</p>

      <h2>Disclaimer of Warranties</h2>
      <p>This website is provided &ldquo;as is&rdquo; and &ldquo;as available.&rdquo; To the fullest
      extent permitted by law, we disclaim all warranties, express or implied, including
      merchantability, fitness for a particular purpose, and non-infringement. We do not warrant
      that the site will be uninterrupted, error-free, or that the information on it is complete or
      current. <strong>This section applies to your use of the website and does not limit any
      warranty we provide in a signed agreement for work we perform.</strong></p>

      <h2>Limitation of Liability</h2>
      <p>To the fullest extent permitted by law, we are not liable for indirect, incidental,
      special, consequential, or punitive damages arising from your use of this website. Nothing in
      these Terms limits liability that cannot be limited under applicable law.</p>

      <h2>Indemnification</h2>
      <p>You agree to indemnify and hold us harmless from claims arising out of your misuse of this
      site or your violation of these Terms or applicable law.</p>

      <h2>Governing Law</h2>
      <p>These Terms are governed by the laws of the State of Massachusetts, without regard to its
      conflict-of-laws rules. Any dispute relating to this website will be brought in the state or
      federal courts located in Massachusetts, and you consent to their jurisdiction.</p>

      <h2>Changes to These Terms</h2>
      <p>We may update these Terms at any time. Changes take effect when posted on this page, and
      the &ldquo;last updated&rdquo; date will reflect the revision.</p>

      <h2>Contact Us</h2>
      <ul>
        <li>Email: <a href="mailto:bob@bbdtree.com">bob@bbdtree.com</a></li>
      <li>Phone: <a href="tel:+17815899902">(781) 589-9902</a></li>
      </ul>
  </article>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
