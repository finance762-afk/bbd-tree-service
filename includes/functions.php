<?php
/**
 * BBD Tree Service — Helper Functions
 * Phase 2: Header, Footer, Head, Functions
 */

// ─── Page State ───────────────────────────────────────────────────────────────

/**
 * Returns true if the given slug matches the current page.
 * Requires $currentPage to be defined before including head.php.
 */
function isActivePage(string $page): bool {
    global $currentPage;
    return isset($currentPage) && $currentPage === $page;
}

// ─── Formatting ───────────────────────────────────────────────────────────────

/**
 * Formats a raw phone number string for display: (617) 123-4567
 * Accepts 10-digit strings, optionally with country code.
 */
function formatPhone(string $phone): string {
    $digits = preg_replace('/\D/', '', $phone);
    if (strlen($digits) === 11 && $digits[0] === '1') {
        $digits = substr($digits, 1);
    }
    if (strlen($digits) !== 10) {
        return $phone; // return as-is if unrecognised
    }
    return '(' . substr($digits, 0, 3) . ') ' . substr($digits, 3, 3) . '-' . substr($digits, 6);
}

/**
 * Converts a service name to a URL-friendly slug.
 * "Tree Removal" → "tree-removal"
 */
function getServiceSlug(string $name): string {
    return strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $name), '-'));
}

/**
 * Converts a city name to a URL-friendly slug.
 * "Newton Centre" → "newton-centre"
 */
function getAreaSlug(string $city): string {
    return strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $city), '-'));
}

// ─── Schema Helpers ───────────────────────────────────────────────────────────

/**
 * Generates a Service JSON-LD schema block for a given service array.
 * Expected keys: name, description, slug (optional), keywords (optional)
 */
function generateServiceSchema(array $service): string {
    global $siteName, $siteUrl, $address;

    $name        = $service['name'] ?? '';
    $description = $service['description'] ?? '';
    $slug        = $service['slug'] ?? getServiceSlug($name);
    $url         = ($siteUrl ?? '') . '/services/' . $slug;

    $schema = [
        '@context'    => 'https://schema.org',
        '@type'       => 'Service',
        'name'        => $name,
        'description' => $description,
        'url'         => $url,
        'provider'    => [
            '@type'  => 'LocalBusiness',
            'name'   => $siteName ?? '',
            'url'    => $siteUrl ?? '',
            'address' => [
                '@type'           => 'PostalAddress',
                'addressLocality' => $address['city'] ?? '',
                'addressRegion'   => $address['state'] ?? '',
                'postalCode'      => $address['zip'] ?? '',
                'addressCountry'  => 'US',
            ],
        ],
        'areaServed' => [
            '@type'   => 'State',
            'name'    => 'Massachusetts',
        ],
        'serviceType' => $name,
    ];

    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

/**
 * Generates a FAQPage JSON-LD schema block from an array of Q&A pairs.
 * Expected: [['q' => '...', 'a' => '...'], ...]
 */
function generateFAQSchema(array $faqs): string {
    $entities = array_map(function ($faq) {
        return [
            '@type'          => 'Question',
            'name'           => $faq['q'] ?? '',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => $faq['a'] ?? '',
            ],
        ];
    }, $faqs);

    $schema = [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => $entities,
    ];

    return json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

// ─── SEO Helpers ──────────────────────────────────────────────────────────────

/**
 * Returns an array of <meta> HTML strings for a page.
 * Used when head.php is not available (e.g., API responses, embeds).
 */
function generateMetaTags(string $title, string $description, string $canonical): string {
    $t = htmlspecialchars($title, ENT_QUOTES);
    $d = htmlspecialchars($description, ENT_QUOTES);
    $c = htmlspecialchars($canonical, ENT_QUOTES);

    return implode("\n  ", [
        "<title>$t</title>",
        "<meta name=\"description\" content=\"$d\">",
        "<link rel=\"canonical\" href=\"$c\">",
        "<meta property=\"og:title\" content=\"$t\">",
        "<meta property=\"og:description\" content=\"$d\">",
        "<meta property=\"og:url\" content=\"$c\">",
    ]);
}
