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

  <link rel="stylesheet" href="/danonos/assets/css/style.css">

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
    <div class="logo">danono's</div>
    <nav>
      <a href="/danonos/index.php">Home</a>
      <a href="/danonos/about.php">About</a>
      <a href="/danonos/menu.php">Menu</a>
      <a href="/danonos/blogs.php">Blogs</a>
      <a href="/danonos/locations.php">Locations</a>
      <a href="/danonos/franchise.php">Franchise</a>
    </nav>
  </header>