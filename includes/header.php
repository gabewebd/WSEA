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

  <title><?php echo isset($pageTitle) ? $pageTitle : "Danono's Doughnuts and Brownies - Best Donuts in Angeles City"; ?>
  </title>
  <meta name="description"
    content="<?php echo isset($metaDesc) ? $metaDesc : "Freshly baked brioche donuts and treats every day. Order online or visit us in Angeles City!"; ?>">

  <link rel="canonical" href="<?php echo $canonicalUrl; ?>">

  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo $canonicalUrl; ?>">
  <meta property="og:title" content="<?php echo isset($pageTitle) ? $pageTitle : "Danono's Doughnuts and Brownies"; ?>">
  <meta property="og:description"
    content="<?php echo isset($metaDesc) ? $metaDesc : "Freshly baked donuts every day."; ?>">
  <meta property="og:image" content="<?php echo $socialImage; ?>">

  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $baseUrl; ?>apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $baseUrl; ?>favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $baseUrl; ?>favicon-16x16.png">
  <link rel="manifest" href="<?php echo $baseUrl; ?>site.webmanifest">
  <link rel="shortcut icon" href="<?php echo $baseUrl; ?>favicon.ico">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Fredoka:wght@300..700&family=Fredoka+One&display=swap"
    rel="stylesheet">
  <script src="https://unpkg.com/@phosphor-icons/web"></script>

  <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/css/style.css">
  <?php if (isset($customCss)): ?>
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>assets/css/<?php echo $customCss; ?>">
  <?php endif; ?>

  <script type="application/ld+json">
    [
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "Danono's Doughnuts and Brownies",
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
            "name": "Danono's Doughnuts and Brownies",
            "image": "<?php echo $baseUrl; ?>assets/img/danonos-logo.jpg",
            "url": "https://danonos.com/",
            "telephone": "+63 927 365 0789",
            "servesCuisine": "Brioche Doughnuts, Coffee, Pastries",
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

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'primary-orange': '#EF7D32',
            'dark-brown': '#431407',
            'cream': '#FFF9F3',
            'gold': '#FFC107',
          },
          keyframes: {
            shine: {
              'to': { 'background-position': '200% center' },
            },
            float: {
              '0%, 100%': { transform: 'translateY(0px)' },
              '50%': { transform: 'translateY(-15px)' },
            },
            familyGradient: {
              '0%, 100%': { 'background-position': '0% 50%' },
              '50%': { 'background-position': '100% 50%' },
            },
            containerPop: {
              '0%': { opacity: '0', transform: 'translate(-50%, -50%) scale(0.9)', 'z-index': '1' },
              '5%': { opacity: '1', transform: 'translate(-50%, -50%) scale(1)', 'z-index': '5' },
              '33.33%': { opacity: '1', transform: 'translate(-50%, -50%) scale(1)', 'z-index': '5' },
              '38%': { opacity: '0', transform: 'translate(-50%, -50%) scale(1.05)', 'z-index': '1' },
              '100%': { opacity: '0', transform: 'translate(-50%, -50%) scale(0.9)', 'z-index': '0' },
            },
            fadeInDown: {
              'from': { opacity: '0', transform: 'translateY(-30px)' },
              'to': { opacity: '1', transform: 'translateY(0)' },
            },
            slideInDown: {
              'from': { opacity: '0', transform: 'translateY(-10px)' },
              'to': { opacity: '1', transform: 'translateY(0)' },
            },
            popIn: {
              '0%': { opacity: '0', transform: 'scale(0) rotate(-180deg)' },
              '100%': { opacity: '1', transform: 'scale(1) rotate(0)' },
            },
            blobBounce: {
              '0%': { 'border-radius': '44% 56% 41% 59% / 54% 39% 61% 46%' },
              '100%': { 'border-radius': '54% 46% 51% 49% / 44% 49% 51% 56%' },
            },
            cardLoad: {
              'from': { opacity: '0', transform: 'translateY(40px) scale(0.92)' },
              'to': { opacity: '1', transform: 'translateY(0) scale(1)' },
            }
          },
          animation: {
            'shine': 'shine 4s linear infinite',
            'float': 'float 4s ease-in-out infinite',
            'family-gradient': 'familyGradient 10s ease-in-out infinite',
            'container-pop': 'containerPop 9s infinite ease-in-out',
            'fade-in-down': 'fadeInDown 0.8s ease-out',
            'slide-in-down': 'slideInDown 0.8s ease-out',
            'pop-in': 'popIn 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55)',
            'blob-bounce': 'blobBounce 8s infinite ease-in-out alternate',
            'card-load': 'cardLoad 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards',
          }
        }
      }
    }
  </script>
  <style type="text/tailwindcss">
    @layer utilities {
      .pop-out-text, .pop-out-text-sm {
        @apply font-black uppercase text-transparent bg-clip-text animate-shine;
        background-image: linear-gradient(to right, #EF7D32 0%, #FFC107 50%, #EF7D32 100%);
        background-size: 200% auto;
      }
    }
  </style>

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