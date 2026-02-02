<?php
// Start session if not already started (Good practice for login later)
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

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link
    href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Fredoka:wght@300..700&family=Fredoka+One&display=swap"
    rel="stylesheet">

  <script src="https://unpkg.com/@phosphor-icons/web"></script>

  <link rel="stylesheet" href="/danonos/assets/css/style.css">

  <?php if (isset($customCss)): ?>
    <link rel="stylesheet" href="/danonos/assets/css/<?php echo $customCss; ?>">
  <?php endif; ?>

  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Bakery",
      "name": "Danonos Donuts",
      "image": "http://localhost/danonos/assets/img/logo.png", 
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Manila"
      }
    }
    </script>
</head>

<body>
  <header>
    <div class="logo">
      <img src="/danonos/assets/img/danonos-logo.jpg" alt="Danono's" style="height: 50px; border-radius: 50%;">
    </div>
    <nav>
      <a href="/danonos/index.php">Home</a>
      <a href="/danonos/about.php">About</a>
      <a href="/danonos/menu.php">Menu</a>
      <a href="/danonos/blogs.php">Blogs</a>
      <a href="/danonos/locations.php">Locations</a>
      <a href="/danonos/franchise.php">Franchise</a>
    </nav>
  </header>