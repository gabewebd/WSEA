<?php
/**
 * Critical CSS for above-the-fold content.
 * Extracted from style.css and index.css to eliminate render-blocking.
 */
?>
<style>
:root {
    --font-heading: "Fredoka", sans-serif;
    --font-body: "Barlow", sans-serif;
    --primary-orange: #EF7D32;
    --dark-brown: #431407;
    --cream: #FFEDD4;
    --white: #FFFFFF;
    --hero-height: 500px;
}
@media (max-width: 768px) { :root { --hero-height: 350px; } }
* { margin: 0; padding: 0; box-sizing: border-box; }
body { font-family: var(--font-body); background-color: #FFFDF9 !important; color: var(--dark-brown); line-height: 1.6; font-display: swap; }
h1, h2, h3, h4, h5, h6 { font-family: var(--font-heading); font-weight: 600; }
header { background: #ffffff; padding: 15px 5%; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 15px rgba(67, 20, 7, 0.08); position: sticky; top: 0; z-index: 1000; height: 80px; }
.logo img { height: 50px; width: auto; border-radius: 50%; display: block; }
.nav-menu { display: flex; align-items: center; gap: 30px; }
.nav-menu a { text-decoration: none; color: var(--dark-brown); font-weight: 700; font-size: 13px; text-transform: uppercase; }
.hero { display: flex; flex-direction: row; min-height: 85vh; background: #FFEDD4; position: relative; overflow: hidden; }
.hero-text { flex: 1; z-index: 2; padding: 0 40px 0 80px; display: flex; flex-direction: column; justify-content: center; }
.hero-text h1 { font-size: 68px; line-height: 1.15; margin: 0 0 25px 0; color: #431407; }
.hero-image { flex: 0 0 50%; z-index: 2; position: relative; }
.hero-image img { width: 100%; height: 100%; object-fit: cover; }
@media (max-width: 968px) {
    .hero { flex-direction: column; }
    .hero-text { padding: 30px 5%; order: 2; }
    .hero-text h1 { font-size: 44px; }
    .hero-image { order: 1; width: 100%; max-height: 380px; }
    .hero-image img { height: 380px; }
}
.pop-out-text, .pop-out-text-sm { font-weight: 900; text-transform: uppercase; background: linear-gradient(to right, #EF7D32 0%, #FFC107 50%, #EF7D32 100%); background-size: 200% auto; -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; animation: shine 4s linear infinite; }
.badge-pill { display: inline-flex !important; width: fit-content !important; padding: 8px 20px; border-radius: 50px; font-size: 11px; font-weight: 800; letter-spacing: 1.5px; text-transform: uppercase; margin-bottom: 25px; background: #FBEDD5; color: #D8651E; }
@keyframes shine { to { background-position: 200% center; } }
</style>
