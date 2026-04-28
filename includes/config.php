<?php
/**
 * BBD Tree Service — Site Configuration
 * Generated from build-plan.json | Phase 1 Scaffold
 * Last updated: April 2026
 */

// ─── Business Identity ────────────────────────────────────────────────────────
$siteName        = "BBD Tree Service";
$companyName     = "BBD Tree Service";
$tagline         = "Your Trees, Our Expertise";
$ownerName       = "";
$yearEstablished = 2000;   // 2026 − 26 years in business
$yearsInBusiness = 26;
$industry        = "tree_service";

// ─── Contact Information ──────────────────────────────────────────────────────
$phone           = "";     // TBD — confirm with client
$phoneSecondary  = "";
$email           = "";     // TBD — confirm with client

// ─── Address (must match GBP character-for-character) ─────────────────────────
$address = [
    'street' => '44 Bacon St',
    'city'   => 'Watertown',
    'state'  => 'MA',
    'zip'    => '02472',
];

// ─── Online Presence ──────────────────────────────────────────────────────────
$domain      = "bbdtreeservice.com";            // confirm before launch
$siteUrl     = "https://bbdtreeservice.com";
$clientSlug  = "bbd-tree-service";

// ─── Analytics & Tracking ─────────────────────────────────────────────────────
$googleAnalyticsId = "";                         // add GA4 measurement ID before launch
$gscVerification   = "";                         // GSC meta verification value

// ─── Social Links ─────────────────────────────────────────────────────────────
$socialLinks = [
    // 'facebook'  => 'https://facebook.com/...',
    // 'instagram' => 'https://instagram.com/...',
    // 'yelp'      => 'https://yelp.com/biz/...',
    // 'google'    => '',  // GBP URL
];

// ─── Brand Colors ─────────────────────────────────────────────────────────────
$colors = [
    'primary'    => '#2d6a00',
    'primaryRgb' => '45, 106, 0',
    'primaryDark'=> '#1c4800',
    'secondary'  => '#4a7a1e',
    'accent'     => '#6cc200',
    'accentRgb'  => '108, 194, 0',
    'bgDark'     => '#1a2d00',
];

// ─── SEO Keywords ─────────────────────────────────────────────────────────────
$primaryKeyword    = "tree service watertown ma";
$secondaryKeywords = [
    "tree removal watertown ma",
    "tree trimming watertown ma",
    "tree service near me",
    "stump removal watertown ma",
    "arborist watertown ma",
    "tree cutting watertown ma",
    "tree pruning watertown massachusetts",
    "commercial tree service watertown",
    "residential tree service watertown",
    "stump grinding watertown ma",
    "tree care services watertown",
    "emergency tree removal watertown ma",
];

// ─── Services ─────────────────────────────────────────────────────────────────
$services = [
    [
        'name'        => "Tree Removal",
        'slug'        => "tree-removal",
        'icon'        => "tree",
        'description' => "Professional tree removal services in Watertown, MA for dangerous, diseased, or unwanted trees. Our certified arborists safely remove trees of any size with proper equipment and cleanup.",
        'keywords'    => [
            "tree removal Watertown MA",
            "tree removal service Watertown",
            "emergency tree removal Watertown",
            "professional tree removal Massachusetts",
        ],
    ],
    [
        'name'        => "Tree Trimming",
        'slug'        => "tree-trimming",
        'icon'        => "scissors",
        'description' => "Expert tree trimming and pruning services to maintain healthy, beautiful trees in Watertown, Massachusetts. We enhance tree structure, safety, and aesthetic appeal.",
        'keywords'    => [
            "tree trimming Watertown MA",
            "tree pruning Watertown",
            "tree trimming service Massachusetts",
            "professional tree trimming Watertown",
        ],
    ],
    [
        'name'        => "Tree Pruning Service",
        'slug'        => "tree-pruning",
        'icon'        => "git-branch",
        'description' => "Specialized tree pruning services in Watertown, MA to promote tree health, growth, and safety. Our arborists use proper techniques to maintain your trees' structural integrity.",
        'keywords'    => [
            "tree pruning Watertown MA",
            "pruning service Watertown",
            "tree pruning Massachusetts",
            "professional tree pruning Watertown",
        ],
    ],
    [
        'name'        => "Stump Grinding",
        'slug'        => "stump-grinding",
        'icon'        => "circle-slash",
        'description' => "Complete stump grinding services in Watertown, Massachusetts to remove unsightly tree stumps from your property. We grind stumps below ground level and clean up all debris.",
        'keywords'    => [
            "stump grinding Watertown MA",
            "stump grinding service Watertown",
            "stump grinding Massachusetts",
            "tree stump removal Watertown",
        ],
    ],
    [
        'name'        => "Stump Removal",
        'slug'        => "stump-removal",
        'icon'        => "minus-circle",
        'description' => "Professional stump removal services in Watertown, MA to completely eliminate tree stumps and roots. We restore your landscape to a clean, usable condition.",
        'keywords'    => [
            "stump removal Watertown MA",
            "stump removal service Watertown",
            "complete stump removal Massachusetts",
            "tree stump removal Watertown",
        ],
    ],
    [
        'name'        => "Commercial Tree Service",
        'slug'        => "commercial-tree-service",
        'icon'        => "building-2",
        'description' => "Comprehensive commercial tree services in Watertown, Massachusetts for businesses, municipalities, and property managers. We provide reliable, professional tree care solutions.",
        'keywords'    => [
            "commercial tree service Watertown MA",
            "business tree service Watertown",
            "commercial tree care Massachusetts",
            "municipal tree service Watertown",
        ],
    ],
    [
        'name'        => "Residential Tree Service",
        'slug'        => "residential-tree-service",
        'icon'        => "home",
        'description' => "Full-service residential tree care in Watertown, MA for homeowners seeking professional tree maintenance and removal. We enhance your property's safety and curb appeal.",
        'keywords'    => [
            "residential tree service Watertown MA",
            "home tree service Watertown",
            "residential tree care Massachusetts",
            "homeowner tree service Watertown",
        ],
    ],
    [
        'name'        => "Hedge Trimming",
        'slug'        => "hedge-trimming",
        'icon'        => "align-justify",
        'description' => "Professional hedge trimming and shaping services in Watertown, Massachusetts to maintain beautiful, healthy hedges and shrubs. We keep your landscape looking pristine year-round.",
        'keywords'    => [
            "hedge trimming Watertown MA",
            "hedge cutting Watertown",
            "shrub trimming Massachusetts",
            "hedge maintenance Watertown",
        ],
    ],
    [
        'name'        => "Brush Removal",
        'slug'        => "brush-removal",
        'icon'        => "trash-2",
        'description' => "Efficient brush removal services in Watertown, MA to clear overgrown vegetation and debris from your property. We handle all cleanup and disposal for a clean landscape.",
        'keywords'    => [
            "brush removal Watertown MA",
            "brush clearing Watertown",
            "vegetation removal Massachusetts",
            "brush cleanup service Watertown",
        ],
    ],
    [
        'name'        => "Tree Care Services",
        'slug'        => "tree-care",
        'icon'        => "heart",
        'description' => "Comprehensive tree care services in Watertown, Massachusetts including health assessments, disease treatment, and maintenance programs. We keep your trees healthy and thriving.",
        'keywords'    => [
            "tree care Watertown MA",
            "tree health services Watertown",
            "arborist services Massachusetts",
            "tree maintenance Watertown",
        ],
    ],
];

// ─── Service Areas (15-mile radius from Watertown, MA) ────────────────────────
$serviceAreas = [
    ['city' => 'Watertown',  'state' => 'MA', 'zip' => '02472', 'primary' => true],
    ['city' => 'Cambridge',  'state' => 'MA', 'zip' => '02139', 'primary' => false],
    ['city' => 'Newton',     'state' => 'MA', 'zip' => '02458', 'primary' => false],
    ['city' => 'Waltham',    'state' => 'MA', 'zip' => '02453', 'primary' => false],
    ['city' => 'Belmont',    'state' => 'MA', 'zip' => '02478', 'primary' => false],
    ['city' => 'Arlington',  'state' => 'MA', 'zip' => '02476', 'primary' => false],
    ['city' => 'Lexington',  'state' => 'MA', 'zip' => '02421', 'primary' => false],
    ['city' => 'Weston',     'state' => 'MA', 'zip' => '02493', 'primary' => false],
    ['city' => 'Brookline',  'state' => 'MA', 'zip' => '02445', 'primary' => false],
    ['city' => 'Somerville', 'state' => 'MA', 'zip' => '02143', 'primary' => false],
];

// ─── Form ─────────────────────────────────────────────────────────────────────
$formAction    = "https://design.pageone.cloud/api/leads/bbd-tree-service";
$thankYouUrl   = "https://bbdtreeservice.com/thank-you";

// ─── Asset URLs ───────────────────────────────────────────────────────────────
$logoUrl = "https://db.pageone.cloud/storage/v1/object/public/client-assets/bbd-tree-service/logo/1776899007390-oq02qd-LOGO.jpg";

$siteImages = [
    'hero'      => "https://db.pageone.cloud/storage/v1/object/public/client-assets/bbd-tree-service/photos/1776899152754-h3pt6v-Photo_of_tree_removal.png",
    'staff'     => "https://db.pageone.cloud/storage/v1/object/public/client-assets/bbd-tree-service/photos/1776899165395-ib39yo-Photo_of_personable_staff.png",
    'trimmed1'  => "https://db.pageone.cloud/storage/v1/object/public/client-assets/bbd-tree-service/photos/1776899132063-btyvop-Photo_of_trimmed__1_.png",
    'trimmed2'  => "https://db.pageone.cloud/storage/v1/object/public/client-assets/bbd-tree-service/photos/1776899161729-ozelmu-Photo_of_trimmed.png",
    'branches1' => "https://db.pageone.cloud/storage/v1/object/public/client-assets/bbd-tree-service/photos/1776899124438-s742uz-Photo_of_branches__1_.png",
    'branches2' => "https://db.pageone.cloud/storage/v1/object/public/client-assets/bbd-tree-service/photos/1776899126803-nkmfdb-Photo_of_branches.png",
    'branches3' => "https://db.pageone.cloud/storage/v1/object/public/client-assets/bbd-tree-service/photos/1776899163625-imkizr-Photo_of_branches__3_.png",
    'branches4' => "https://db.pageone.cloud/storage/v1/object/public/client-assets/bbd-tree-service/photos/1776899162735-7w3x2u-Photo_of_branches__4_.png",
    'photo1'    => "https://db.pageone.cloud/storage/v1/object/public/client-assets/bbd-tree-service/photos/1776899128712-yscgem-Photo__1_.png",
    'photo2'    => "https://db.pageone.cloud/storage/v1/object/public/client-assets/bbd-tree-service/photos/1776899127863-agb2jd-Photo__2_.png",
    'photo3'    => "https://db.pageone.cloud/storage/v1/object/public/client-assets/bbd-tree-service/photos/1776899167145-t8mmjq-Photo__3_.png",
    'photo4'    => "https://db.pageone.cloud/storage/v1/object/public/client-assets/bbd-tree-service/photos/1776899166275-uizhax-Photo__4_.png",
    'photo5'    => "https://db.pageone.cloud/storage/v1/object/public/client-assets/bbd-tree-service/photos/1776899164535-7vu0p4-Photo__5_.png",
    'photo6'    => "https://db.pageone.cloud/storage/v1/object/public/client-assets/bbd-tree-service/photos/1776899160754-f3mukc-Photo__6_.png",
    'photo7'    => "https://db.pageone.cloud/storage/v1/object/public/client-assets/bbd-tree-service/photos/1776899159034-zldcbs-Photo__7_.png",
    'photo8'    => "https://db.pageone.cloud/storage/v1/object/public/client-assets/bbd-tree-service/photos/1776899157244-ocdv69-Photo__8_.png",
    'photo9'    => "https://db.pageone.cloud/storage/v1/object/public/client-assets/bbd-tree-service/photos/1776899155422-imqa74-Photo__9_.png",
    'photo10'   => "https://db.pageone.cloud/storage/v1/object/public/client-assets/bbd-tree-service/photos/1776899154563-m1tr99-Photo__10_.png",
];
