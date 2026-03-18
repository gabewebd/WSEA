<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
ob_start();

// --- 1. DYNAMIC URL SETUP (Fixes Favicon & SEO Links) ---
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = $_SERVER['HTTP_HOST'];

// Detect if we are in a subdirectory (like localhost/danonos) or root
$scriptDir = dirname($_SERVER['SCRIPT_NAME']);
$baseUrl = $protocol . "://" . $host . ($scriptDir == '/' ? '' : $scriptDir);

// Ensure base url ends with a slash for appending assets
if (substr($baseUrl, -1) !== '/') {
  $baseUrl .= '/';
}

// --- SEO FIX: Improved Canonical Logic (SOLVES GSC DUPLICATE ERROR) ---
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$host = "danonos.com"; // Force non-www
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// 1. Force index/home variations to exactly match the root "/"
if ($requestPath == '/index.php' || $requestPath == '/index' || $requestPath == '/home') {
  $requestPath = '/';
}

// 2. Remove trailing slashes from inner pages (e.g., /about/ becomes /about)
if ($requestPath != '/' && substr($requestPath, -1) == '/') {
  $requestPath = rtrim($requestPath, '/');
}

// 3. Generate final canonical URL
if (isset($_GET['slug']) && strpos($_SERVER['REQUEST_URI'], 'single-blog') !== false) {
  // If it's a blog post using the new or old structure, point to the "Pretty" version.
  $canonicalUrl = $protocol . "://" . $host . "/blog/" . $_GET['slug'];
} else {
  // Otherwise, use the strictly formatted request path
  $canonicalUrl = $protocol . "://" . $host . $requestPath;
}

// Fallback for social images
$socialImage = isset($pageImage) ? $pageImage : $baseUrl . "assets/img/danonos-hero.jpg";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php echo isset($pageTitle) ? $pageTitle : "Danono's Donuts & Brownies - Best Donuts in Angeles City"; ?>
  </title>
  <meta name="description"
    content="<?php echo isset($metaDesc) ? $metaDesc : "Freshly baked brioche donuts and treats every day. Order online or visit us in Angeles City!"; ?>">

  <link rel="canonical" href="<?php echo $canonicalUrl; ?>">
  <link rel="preload" fetchpriority="high" as="image" href="<?php echo $baseUrl; ?>assets/img/danonos.jpg"
    type="image/jpeg">

  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo $canonicalUrl; ?>">
  <meta property="og:title" content="<?php echo isset($pageTitle) ? $pageTitle : "Danono's Donuts & Brownies"; ?>">
  <meta property="og:description"
    content="<?php echo isset($metaDesc) ? $metaDesc : "Freshly baked brioche donuts every day. Best donuts in Pampanga."; ?>">
  <meta property="og:image" content="<?php echo $socialImage; ?>">

  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $baseUrl; ?>assets/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $baseUrl; ?>assets/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $baseUrl; ?>assets/favicons/favicon-16x16.png">
  <link rel="manifest" href="<?php echo $baseUrl; ?>assets/favicons/site.webmanifest">
  <link rel="shortcut icon" href="<?php echo $baseUrl; ?>assets/favicons/favicon.ico">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Fredoka:wght@300..700&family=Fredoka+One&display=swap"
    rel="stylesheet">
  <script src="https://unpkg.com/@phosphor-icons/web"></script>

  <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/css/style.css?v=1.1">
  <?php if (isset($customCss)): ?>
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/css/<?php echo $customCss; ?>?v=1.1">
  <?php endif; ?>

  <script type="application/ld+json">
    [
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "Danono's Donuts & Brownies",
            "url": "https://danonos.com/",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://danonos.com/search?q={search_term_string}",
                "query-input": "required name=search_term_string"
            }
        },
        {
            "@context": "https://schema.org",
            "@type": "Bakery",
            "name": "Danono's Donuts & Brownies",
            "image": "<?php echo $baseUrl; ?>assets/img/danonos-logo.jpg",
            "url": "https://danonos.com/",
            "telephone": "+63 927 365 0789",
            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "4.8",
                "reviewCount": "156"
            },
            "description": "Premium brioche donuts, brownies, and coffee in Angeles City, Pampanga. Best donuts in Mexico and San Fernando.",
            "servesCuisine": "Brioche Donuts, Coffee, Pastries",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "#1 Holy Angel Avenue, Sto. Rosario",
                "addressLocality": "Angeles City",
                "postalCode": "2009",
                "addressRegion": "Pampanga",
                "addressCountry": "PH"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": 15.134, 
                "longitude": 120.590
            },
            "priceRange": "₱₱",
            "openingHoursSpecification": [
                {
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": [
                        "Monday",
                        "Tuesday",
                        "Wednesday",
                        "Thursday",
                        "Friday",
                        "Saturday",
                        "Sunday"
                    ],
                    "opens": "10:00",
                    "closes": "19:00"
                }
            ]
        }
    ]
  </script>

  <script async src="https://www.googletagmanager.com/gtag/js?id=G-F39H5M2LGJ"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', 'G-F39H5M2LGJ');
  </script>

  <meta name="google-site-verification" content="ICn4_I4gNkh5hC1Aqd3kYOm9DZhQAAJyXaCPgI9sMbM" />

  <script src="https://analytics.ahrefs.com/analytics.js" data-key="8bGj2TNE59261+17GxiipA" async></script>
</head>

<body>
  <header>
    <div class="logo">
      <a href="<?php echo $baseUrl; ?>">
        <img src="<?php echo $baseUrl; ?>assets/img/danonos-logo.jpg" alt="Danono's">
      </a>
    </div>

    <button class="mobile-toggle" aria-label="Open Menu">
      <i class="ph ph-list"></i>
    </button>

    <nav class="nav-menu">
      <button class="mobile-close" aria-label="Close Menu">
        <i class="ph ph-x"></i>
      </button>

      <a href="<?php echo $baseUrl; ?>">Home</a>
      <a href="<?php echo $baseUrl; ?>about">About</a>
      <a href="<?php echo $baseUrl; ?>menu">Menu</a>
      <a href="<?php echo $baseUrl; ?>blogs">Blogs</a>
      <a href="<?php echo $baseUrl; ?>locations">Locations</a>
      <a href="<?php echo $baseUrl; ?>franchise">Franchise</a>
    </nav>

    <div class="nav-overlay"></div>
  </header>

  <script>
    const mobileToggle = document.querySelector('.mobile-toggle');
    const mobileClose = document.querySelector('.mobile-close');
    const navMenu = document.querySelector('.nav-menu');
    const navOverlay = document.querySelector('.nav-overlay');

    function toggleMenu() {
      navMenu.classList.toggle('active');
      navOverlay.classList.toggle('active');
      document.body.classList.toggle('no-scroll');
    }

    mobileToggle.addEventListener('click', toggleMenu);
    mobileClose.addEventListener('click', toggleMenu);
    navOverlay.addEventListener('click', toggleMenu);
  </script>