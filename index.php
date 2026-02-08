<?php
$pageTitle = "Danono's | Home";
$metaDesc = "Welcome to Danono's! Home of the best brioche doughnuts and brownies in Angeles City. Freshly baked daily.";
$customCss = "index.css";
?>
<?php include 'includes/header.php'; ?>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    .story-section {
        padding: 100px 5%;
        background-color: transparent;
        position: relative;
    }

    .story-content {
        display: flex !important;
        flex-direction: row !important;
        flex-wrap: nowrap !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 80px !important;
        max-width: 1200px;
        margin: 0 auto;
    }

    .story-image {
        flex: 1 !important;
        min-width: 0 !important;
        max-width: 450px;
        position: relative;
        border-radius: 30px;
        border: 8px solid #431407;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .story-image img {
        width: 100%;
        height: auto;
        display: block;
        object-fit: cover;
    }

    /* ANIMATED BADGE */
    .story-badge {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background: #FFC107;
        border: 5px solid #431407;
        width: 90px;
        height: 90px;
        border-radius: 18px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: #431407;
        z-index: 2;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
    }

    .story-badge:hover {
        transform: translateX(-50%) scale(1.1) rotate(3deg);
        cursor: pointer;
    }

    .story-badge-label {
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: -2px;
    }

    .story-badge-year {
        font-size: 26px;
        font-weight: 900;
        line-height: 1;
    }

    .story-text {
        flex: 1.2 !important;
        min-width: 0 !important;
    }

    .story-text h2 {
        font-size: 48px;
        line-height: 1.1;
        margin-bottom: 24px;
        color: #431407;
    }

    .story-text p {
        font-size: 17px;
        line-height: 1.6;
        color: #666;
        margin-bottom: 25px;
    }
</style>

<section class="hero">
    <div class="floating-shape shape-1" data-speed="4"></div>
    <div class="floating-shape shape-2" data-speed="-2"></div>

    <div class="hero-text">
        <h1 data-aos="fade-up">More Choices,<br><span class="pop-out-text">MORE VALUE.</span></h1>
        <p data-aos="fade-up" data-aos-delay="100">Indulge in our famous Glazed Donuts and refreshing Spanish Latte.
            Crafted fresh daily in Los Angeles.</p>
        <div class="hero-buttons" data-aos="fade-up" data-aos-delay="200">
            <a href="menu" class="btn btn-orange"><i class="ph ph-bicycle"></i> Order Delivery</a>
            <a href="locations" class="btn btn-outline"><i class="ph ph-map-pin"></i> Find a branch</a>
        </div>
        <p class="tagline" data-aos="fade-in" data-aos-delay="400">
            AVAILABLE ON: <span class="tagline-available">GrabFood</span>
        </p>
    </div>
    <div class="hero-image" data-aos="zoom-in-left" data-aos-duration="1000">
        <img src="assets/img/danonos-image.png" alt="Danono's Donuts Box" class="float-img">
    </div>
</section>

<section class="treats-section">
    <div class="section-header" data-aos="fade-up">
        <span class="section-label">FEATURED FAVORITES</span>
        <h2>Most Loved <span class="pop-out-text-sm">TREATS</span></h2>
        <a href="menu" class="view-all">View full menu <span>→</span></a>
    </div>
    <div class="treats-carousel">

        <div class="treat-card" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/choco-caviar.jpg" alt="Choco Caviar Creation">
            <h3>Choco Caviar Creation</h3>
            <p>Our ultimate choco-loaded treat that’s rich, crunchy, and irresistibly indulgent.</p>
            <a href="menu" class="btn btn-small">PKG</a>
        </div>

        <div class="treat-card" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/biscoff.jpg" alt="Biscoff Bite">
            <h3>Biscoff Bite</h3>
            <p>Fluffy brioche donut, rich peanut butter glaze, and a generous topping of Lotus Biscoff.</p>
            <a href="menu" class="btn btn-small">PKG</a>
        </div>

        <div class="treat-card" data-aos="fade-up" data-aos-delay="300">
            <img src="assets/img/double-choco-delight.jpg" alt="Double Choco Delight">
            <h3>Double Choco Delight</h3>
            <p>Double Choco Delight is here, and it’s everything your chocolate dreams are made of.</p>
            <a href="menu" class="btn btn-small">PKG</a>
        </div>

        <div class="treat-card" data-aos="fade-up" data-aos-delay="400">
            <img src="assets/img/almond-amore.jpg" alt="Almond Amore">
            <h3>Almond Amore</h3>
            <p>Light, fluffy, and loaded with almond love, this one’s a certified heart-stealer.</p>
            <a href="menu" class="btn btn-small">PKG</a>
        </div>

    </div>
</section>

<section class="drinks-choco">
    <div class="drinks-content">
        <div class="drinks-image" data-aos="fade-right">
            <img src="assets/img/Refreshers.jpg" alt="Danono's Refreshers">
        </div>
        <div class="drinks-text" data-aos="fade-up">
            <span class="section-label">PERFECT PAIRING</span>
            <h2>Refreshers & Choco Circles<br><span class="pop-out-text-sm">PERFECT MATCH</span></h2>
            <p>Beat the heat with our ice-cold, sparkling Refreshers, crafted to pair flawlessly with the rich, velvety
                indulgence of our signature Choco Circle doughnuts.</p>
            <a href="menu" class="btn btn-dark"><i class="ph ph-cookie"></i> See Full Menu</a>
        </div>
        <div class="choco-image" data-aos="fade-left">
            <img src="assets/img/choco-circle.jpg" alt="Choco Circle Donuts">
        </div>
    </div>
</section>

<section class="story-section">
    <div class="story-content">
        <div class="story-image" data-aos="fade-right">
            <img src="https://images.unsplash.com/photo-1507048331197-7d4ac70811cf?w=400&h=500&fit=crop"
                alt="Danono's Kitchen">
            <div class="story-badge">
                <div class="story-badge-label">SINCE</div>
                <div class="story-badge-year">2018</div>
            </div>
        </div>
        <div class="story-text" data-aos="fade-left">
            <span class="section-label">OUR STORY</span>
            <h2>From Nono's to<br><span class="pop-out-text-sm">DANONO'S</span></h2>
            <p>What started as a small home kitchen project in 2018 has grown into Danono's Doughnuts. Our mission: to
                create treats that bring happiness and sweetness in every bite.</p>
            <p>Every morning at 6AM we'll be baking hand-cut donuts with pride, using, filling, and frying in small
                batches.</p>
            <a href="about" class="btn btn-orange">Read Our Full Story <span>→</span></a>
        </div>
    </div>
</section>

<section class="nav-cards-section">
    <div class="nav-cards-container">
        <div class="nav-card" data-aos="zoom-in-up" data-aos-delay="100">
            <img src="assets/img/perfect-spot.jpg" alt="Our Locations">
            <div class="nav-card-overlay">
                <h3>Our Locations</h3>
                <a href="locations" class="btn btn-orange"><i class="ph ph-map-pin"></i> Find a Branch</a>
            </div>
        </div>
        <div class="nav-card" data-aos="zoom-in-up" data-aos-delay="300">
            <img src="assets/img/three-girls-danonos.png" alt="The Danono's Team">
            <div class="nav-card-overlay">
                <h3>Our Blogs</h3>
                <a href="blogs" class="btn btn-orange"><i class="ph ph-read-cv-logo"></i> Read Blogs</a>
            </div>
        </div>
    </div>
</section>

<section class="family-section">
    <div class="family-content" data-aos="fade-right">
        <h2>BE PART OF OUR<br><span class="double-stroke">GROWING FAMILY</span></h2>
        <p>Ready to taste the handmade? Join a box today and make your day a little sweeter.</p>
        <div class="family-buttons">
            <a href="franchise" class="btn btn-white">Partner With Us</a>
            <a href="locations" class="btn btn-white">Find a Branch</a>
        </div>
    </div>
    <div class="family-image" data-aos="zoom-in-left">
        <img src="assets/img/danonos-donuts.jpg" alt="Family of Donuts">
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // 1. Initialize Moving Scroll (AOS)
    AOS.init({
        once: true,
        offset: 120,
        duration: 800,
        easing: 'ease-out-back', // This gives it a slight bounce on entry
    });

    // 2. Mouse Parallax for Hero Shapes
    document.addEventListener("mousemove", parallax);
    function parallax(e) {
        document.querySelectorAll(".floating-shape").forEach(function (move) {
            var moving_value = move.getAttribute("data-speed");
            var x = (e.clientX * moving_value) / 250;
            var y = (e.clientY * moving_value) / 250;
            move.style.transform = "translateX(" + x + "px) translateY(" + y + "px)";
        });
    }
</script>
</body>

</html>