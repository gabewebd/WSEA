<?php
// Start session
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

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

$currentUrl = $protocol . "://" . $host . $_SERVER['REQUEST_URI'];
$socialImage = isset($pageImage) ? $pageImage : $baseUrl . "assets/img/danonos-hero.jpg";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php echo isset($pageTitle) ? $pageTitle : "Danono's - Best Donuts in Angeles City"; ?></title>
  <meta name="description"
    content="<?php echo isset($metaDesc) ? $metaDesc : "Freshly baked brioche donuts and treats every day. Order online or visit us in Angeles City!"; ?>">

  <link rel="canonical" href="<?php echo $currentUrl; ?>">

  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo $currentUrl; ?>">
  <meta property="og:title" content="<?php echo isset($pageTitle) ? $pageTitle : "Danono's"; ?>">
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
            "name": "Danono's",
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
            "name": "Danono's",
            "image": "<?php echo $baseUrl; ?>assets/img/logo.png",
            "url": "https://danonos.com/",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "Angeles City",
                "addressRegion": "Pampanga",
                "addressCountry": "PH"
            },
            "priceRange": "₱₱"
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
</head>

<body>
  <header>
    <!-- <div class="logo">
      <a href="index">
        <img src="<?php echo $baseUrl; ?>assets/img/danonos-logo.jpg" alt="Danono's">
      </a>
    </div> -->

    <button class="mobile-toggle" aria-label="Open Menu">
      <i class="ph ph-list"></i>
    </button>

    <nav class="nav-menu">
      <button class="mobile-close" aria-label="Close Menu">
        <i class="ph ph-x"></i>
      </button>

      <a href="index">Home</a>
      <a href="about">About</a>
      <a href="menu">Menu</a>
      <a href="blogs">Blogs</a>
      <a href="locations">Locations</a>
      <a href="franchise">Franchise</a>
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