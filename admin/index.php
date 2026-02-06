<?php
$pageTitle = "Danono's | Home";
$metaDesc = "Welcome to Danono's! Home of the best brioche doughnuts and brownies in Angeles City. Freshly baked daily.";
$customCss = "index.css";
include 'includes/db_connect.php'; // Optional, but consistent
?>
<?php include 'includes/header.php'; ?>
<style>
    /* Ensure the includes/header.php or css loads Phosphor Icons */
    /* If not, uncomment the line below in your head tag manually */
    /* @import url("https://unpkg.com/@phosphor-icons/web"); */
    
    /* Small override to ensure hero shapes stay behind */
    .hero {
        position: relative;
        z-index: 1;
        overflow: visible; /* Allow shapes to bleed out slightly if needed, but 'hidden' in css usually controls layout */
    }
</style>

<section class="hero">
    <div class="floating-shape shape-1"></div>
    <div class="floating-shape shape-2"></div>

    <div class="hero-text">
        <h1>Josh Aguiluz</h1> <h1>More Choices,<br><span class="pop-out-text">MORE VALUE.</span></h1>
        <p>Indulge in our famous Glazed Donuts and refreshing Spanish Latte. Crafted fresh daily in Los Angeles.</p>
        <div class="hero-buttons">
            <a href="menu.php" class="btn btn-orange"><i class="ph ph-bicycle"></i> Order Delivery</a>
            <a href="locations.php" class="btn btn-outline"><i class="ph ph-map-pin"></i> Find a branch</a>
        </div>
        <p class="tagline">
            AVAILABLE ON: <span class="tagline-available">GrabFood</span>
        </p>
    </div>
    
    <div class="hero-image">
        <img src="assets/img/danonos-image.png" alt="Danono's Donuts Box">
        
        <div class="floating-card">
            <i class="ph-fill ph-star"></i>
            <div>
                <span>Customer Rating</span>
                <strong>4.8/5 Stars</strong>
            </div>
        </div>
    </div>
</section>

<section class="features-section">
    <div class="section-header">
        <span class="section-label">THE DANONO'S DIFFERENCE</span>
        <h2>Why We Are <span class="highlight-orange">SPECIAL</span></h2>
    </div>
    
    <div class="features-grid">
        <div class="feature-item">
            <div class="feature-icon-box">
                <i class="ph-fill ph-clock"></i>
            </div>
            <div class="feature-text">
                <h4>Baked Fresh Daily</h4>
                <p>We start baking at 4 AM every single day to ensure every bite is warm, soft, and perfect.</p>
            </div>
        </div>

        <div class="feature-item">
            <div class="feature-icon-box">
                <i class="ph-fill ph-heart"></i>
            </div>
            <div class="feature-text">
                <h4>Handmade with Love</h4>
                <p>No machines here. Every doughnut is hand-cut, rolled, and decorated by our passionate team.</p>
            </div>
        </div>

        <div class="feature-item">
            <div class="feature-icon-box">
                <i class="ph-fill ph-sparkle"></i>
            </div>
            <div class="feature-text">
                <h4>Premium Ingredients</h4>
                <p>We use only real butter, high-quality chocolate, and locally sourced ingredients.</p>
            </div>
        </div>
    </div>
</section>

<section class="treats-section">
    <div class="section-header">
        <span class="section-label">FEATURED FAVORITES</span>
        <h2>Most Loved <span class="pop-out-text-sm">TREATS</span></h2>
        <a href="menu.php" class="view-all">View full menu <span>→</span></a>
    </div>
    <div class="treats-carousel">
        <div class="treat-card">
            <img src="uploads/chococaviar.jpg"
                alt=" Choco Caviar Creation">
            <h3> Choco Caviar Creation</h3>
            <p>Our ultimate choco-loaded treat that’s rich, crunchy, and irresistibly indulgent.</p>
            <a href="menu.php" class="btn btn-small">PKG</a>
        </div>
        <div class="treat-card">
            <img src="uploads/biscoff.jpg"
                alt="Biscoff Bite">
            <h3>Biscoff Bite</h3>
            <p>Fluffy brioche donut, rich peanut butter glaze, and a generous topping of Lotus Biscoff biscuits.</p>
            <a href="menu.php" class="btn btn-small">PKG</a>
        </div>
        <div class="treat-card">
            <img src="uploads/doublechocodelight.jpg"
                alt="Double Choco Delight">
            <h3>Double Choco Delight</h3>
            <p>Double Choco Delight is here, and it’s everything your chocolate dreams are made of.
Soft, fudgy,satisfying.</p>
            <a href="menu.php" class="btn btn-small">PKG</a>
        </div>
        <div class="treat-card">
            <img src="uploads/almondamore.jpg">
            <h3>Almond Amore</h3>
            <p>Light, fluffy, and loaded with almond love, this one’s a certified heart-stealer.</p>
            <a href="menu.php" class="btn btn-small">PKG</a>
        </div>
    </div>
</section>

<section class="drinks-choco"> <div class="drinks-content">
        <div class="drinks-image">
            <img src="uploads/Refreshers.jpg" alt="Danono's Refreshers">
        </div>
        <div class="drinks-text">
            <span class="section-label">PERFECT PAIRING</span>
            <h2>Refreshers & Choco Circles<br><span class="pop-out-text-sm">PERFECT MATCH</span></h2>
            <p>Beat the heat with our ice-cold, sparkling Refreshers, crafted to pair flawlessly with the rich, velvety indulgence of our signature Choco Circle doughnuts.</p>
            <a href="menu.php" class="btn btn-dark"><i class="ph ph-cookie"></i> See Full Menu</a>
        </div>
        <div class="choco-image"> <img src="uploads/chococircle.jpg" alt="Choco Circle Donuts">
        </div>
    </div>
</section>

<section class="story-section">
    <div class="story-content">
        <div class="story-image">
            <img src="https://images.unsplash.com/photo-1507048331197-7d4ac70811cf?w=400&h=500&fit=crop"
                alt="Danono's Kitchen">
            <div class="story-badge">
                <div class="story-badge-label">SINCE</div>
                <div class="story-badge-year">2018</div>
            </div>
        </div>
        <div class="story-text">
            <span class="section-label">OUR STORY</span>
            <h2>From Nono's to<br><span class="pop-out-text-sm">DANONO'S</span></h2>
            <p>What started as a small home kitchen project in 2018 has grown into Danono's Doughnuts. Our mission:
                to create treats that bring happiness and sweetness in every bite.</p>
            <p>Every morning at 6AM we'll be baking hand-cut donuts with pride, using, filling, and frying in small
                batches to ensure perfection in every bite.</p>
            <a href="about.php" class="btn btn-orange">Read Our Full Story <span>→</span></a>
        </div>
    </div>
</section>

<section class="nav-cards-section">
    <div class="nav-cards-container">
        <div class="nav-card">
            <img src="https://images.unsplash.com/photo-1555507036-ab1f40388085?w=600&h=400&fit=crop"
                alt="Our Locations">
            <div class="nav-card-overlay">
                <h3>Our Locations</h3>
                <a href="locations.php" class="btn btn-orange"><i class="ph ph-map-pin"></i> Find a Branch</a>
            </div>
        </div>
        <div class="nav-card">
            <img src="https://images.unsplash.com/photo-1483389127517-711bc0d54b2c?w=600&h=400&fit=crop"
                alt="Our Blogs">
            <div class="nav-card-overlay">
                <h3>Our Blogs</h3>
                <a href="blogs.php" class="btn btn-orange"><i class="ph ph-read-cv-logo"></i> Read Blogs</a>
            </div>
        </div>
    </div>
</section>

<section class="family-section">
    <div class="family-content">
        <h2>BE PART OF OUR<br><span class="double-stroke" data-text="GROWING FAMILY">GROWING FAMILY</span></h2>
        <p>Ready to taste the handmade? Join a box today and make your day a little sweeter.</p>
        <div class="family-buttons">
            <a href="franchise.php" class="btn btn-white">Partner With Us</a>
            <a href="locations.php" class="btn btn-white">Find a Branch</a>
        </div>
    </div>
    <div class="family-image">
        <img src="https://images.unsplash.com/photo-1517486430290-356570d17c92?w=500&h=600&fit=crop"
            alt="Family of Donuts">
    </div>
</section>

<?php include 'includes/footer.php'; ?>
</body>

</html>