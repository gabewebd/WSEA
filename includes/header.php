<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php echo isset($pageTitle) ? $pageTitle : "Danonos Donuts - Best Donuts in Manila"; ?></title>
  <meta name="description"
    content="<?php echo isset($metaDesc) ? $metaDesc : "Freshly baked donuts every day. Order online or visit us!"; ?>">

  <!-- Favicon -->
  <link rel="icon" type="image/jpeg" href="assets/img/danonos-logo.jpg">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link
    href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Fredoka:wght@300..700&family=Fredoka+One&display=swap"
    rel="stylesheet">

  <script src="https://unpkg.com/@phosphor-icons/web"></script>

  <link rel="stylesheet" href="assets/css/style.css">

  <?php if (isset($customCss)): ?>
    <link rel="stylesheet" href="assets/css/<?php echo $customCss; ?>">
  <?php endif; ?>

  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Bakery",
      "name": "Danonos Donuts",
      "image": "assets/img/logo.png", 
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Manila"
      }
    }
    </script>

  <script async src="https://www.googletagmanager.com/gtag/js?id=G-7B381CPCZK"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', 'G-7B381CPCZK');
  </script>

  <meta name="google-site-verification" content="Xl7SjAbdH5sySew0zAOHdzu410dFzPMe7up3yKONQ9I" />
</head>

<body>
  <header>
    <div class="logo">
      <a href="index">
        <img src="assets/img/danonos-logo.jpg" alt="Danono's">
      </a>
    </div>

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
      document.body.classList.toggle('no-scroll'); // Prevents scrolling when menu is open
    }

    mobileToggle.addEventListener('click', toggleMenu);
    mobileClose.addEventListener('click', toggleMenu);
    navOverlay.addEventListener('click', toggleMenu);
  </script>