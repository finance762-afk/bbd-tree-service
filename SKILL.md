---
name: pageone-web-builder
description: Build production-grade local business websites for Page One Insights clients. Use this skill whenever building, editing, auditing, or generating prompts for client websites — including static HTML/CSS/JS sites and PHP-include sites deployed via GitHub to Hostinger. Covers the full build pipeline (tiered site structures, PHP component architecture, CSS design system, premium visual techniques, logo analysis, animations), plus cutting-edge 2026 local SEO and Answer Engine Optimization (AEO). Trigger this skill for any mention of client sites, website builds, CLAUDE.md standards, SEO audits, AEO optimization, schema markup, llms.txt, entity blocks, service area pages, or the Page One Insights web design workflow — even if the user doesn't explicitly name the skill.
---

# Page One Web Builder — Build Standards & SEO/AEO System

This skill defines the complete build system for Page One Insights client websites. Every site follows these standards. No exceptions.

Before starting any build, read the relevant reference files:
- `references/design-system.md` — CSS architecture, logo analysis, premium visual techniques, nav standards, animations (read FIRST — this drives all visual decisions)
- `references/seo-aeo-2026.md` — Full SEO and AEO specification
- `references/build-phases.md` — Phased build workflow, PHP architecture, and deployment

---

## Website Tier System

Always confirm the tier before building.

### BASIC
Home, Services (single page), Service Area (single page), About, Contact

### STANDARD
Home, Services Main + Individual Service Pages, Service Area (single page), About, Contact

### PREMIUM
Home, Services Main + Individual Service Pages, Service Areas Main + Individual Area Pages, About, Contact, FAQ

---

## PHP Component Architecture (Required)

```
/includes/
  head.php       ← doctype, <head>, meta, OG, schema, CSS, preloads
  nav.php        ← fixed navbar with transparent-to-solid scroll, logo analysis sizing, aria
  footer.php     ← entity block, dofollow link, contact, social, scripts
/assets/
  /css/styles.css
  /js/animations.js
  /js/effects.js
  /images/
  /svg/            ← section dividers, floating accents, decorative elements
index.php
[all other pages as .php]
.htaccess
sitemap.xml, sitemap-images.xml, robots.txt
llms.txt, llms-full.txt
404.php, thank-you.php
```

**Every include uses absolute paths:**
```php
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
```
Never relative paths. They break on Hostinger.

**Every page declares SEO variables before including head.php:**
```php
<?php
$pageTitle       = "Service Name | Company | City, State";
$pageDescription = "150-160 char description with keyword and CTA";
$canonicalUrl    = "https://domain.com/services/service-name";
$ogImage         = "/assets/images/og-service.jpg";
$currentPage     = "service-slug";
$schemaMarkup    = '{...}';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
```

---

## Critical Build Rules

1. **Logo analysis first.** Before choosing colors, fonts, or nav style — analyze the client logo. See `references/design-system.md` Logo Analysis section.
2. **Build in phases.** Never attempt a full site in one session. See `references/build-phases.md`.
3. **CSS first.** Complete styles.css (including all premium visual technique classes) before any page markup.
4. **Homepage review gate.** Build index.php, review it, fix issues before continuing.
5. **No meta keywords tag.** Google has ignored it since 2009.
6. **No Twitter/X card tags.** No discovery value for local home service businesses.
7. **Dofollow link required in every footer:**
   ```html
   <a href="https://pageoneinsights.com" rel="dofollow" target="_blank">Web Design & Hosting by Page One Insights, LLC</a>
   ```
8. **Formsubmit.co for all forms** with honeypot, captcha off, table template, styled success page.
9. **NAP consistency** — Name, address, phone must be character-for-character identical to Google Business Profile listing everywhere they appear.
10. **All images:** lazy loading, explicit width/height, descriptive alt with keyword + location.
11. **Internal linking:** every page links to 2-3 other pages naturally. No orphan pages.
12. **No template look.** Every page must use at least 2 premium visual techniques from the design system (SVG dividers, asymmetric layouts, floating accents, custom image shapes, tinted cards, mixed typography scales). See the Visual Quality Checklist in `references/design-system.md`.

---

## Premium Visual Standards (Quick Reference)

The full specification lives in `references/design-system.md`. Every build must include:

**Logo-driven design:**
- Colors extracted from logo → site palette
- Logo sizing based on aspect ratio analysis
- Nav background matched to logo edge colors

**Custom-built feel (required techniques):**
- SVG section dividers (min 2 per homepage — wave, angle, curve, torn edge, multi-wave)
- Floating decorative accents (industry-appropriate, 4-8% opacity, animated)
- At least 1 asymmetric/broken-grid layout section per page
- Overlapping image compositions in About or hero sections
- Tinted card backgrounds (not all-white cards)
- Mixed typography: heading font + body font + accent script/italic font
- Multi-directional scroll reveals (not all fade-up)

**Premium nav (every build):**
- Desktop: transparent-to-glassmorphism scroll transition, animated underline hovers, CTA button
- Mobile: full-screen overlay menu with staggered fade-in, animated hamburger→X, sticky bottom CTA bar

**Conversion elements:**
- Before/after image sliders (for visual trades)
- Sticky mobile CTA bar ("Call Now" + "Free Estimate")
- Large stat blocks ("15+ Years", "500+ Projects") with big numbers + small labels
- Click-to-call on every phone number

---

## SEO & AEO Quick Reference

The full specification lives in `references/seo-aeo-2026.md`. Read it before every build. Here's the minimum:

**On every page:**
- Unique `<title>`: "Page Name | Company | City, State"
- Unique `<meta description>` 150-160 chars with keyword + CTA
- One H1 with primary keyword, proper H2/H3 hierarchy
- Self-referencing canonical tag
- LocalBusiness JSON-LD schema
- Entity block in visible body content (first 100 words) AND footer
- BreadcrumbList schema (all pages except homepage)
- Answer-first copy structure

**AEO files at root:**
- `llms.txt` — structured business summary for AI crawlers
- `llms-full.txt` — expanded version with service details, FAQ pairs, all URLs

**Schema stacking per page type** — see reference file for full JSON-LD specs.

---

## Deployment Pipeline

```
Mac Terminal / Ubuntu PC → Claude Code → GitHub → Hostinger (auto-deploy webhook)
```

All projects live in `~/client-sites/` under GitHub account `finance762-afk`.

```bash
# New site
cd ~/client-sites && ./new-site.sh

# Deploy
cd ~/client-sites && ./deploy.sh
```

Hostinger Git panel connects to repo, branch `main`, auto-deploy webhook configured.
