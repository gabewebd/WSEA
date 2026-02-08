<?php
$pageTitle = "Danono's | Home";
$metaDesc = "Welcome to Danono's! Home of the best brioche doughnuts and brownies in Angeles City. Freshly baked daily.";
$customCss = "index.css";
?>
<?php include 'includes/header.php'; ?>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<section class="hero">
    <div class="hero-text">
        <h1 data-aos="fade-up">More Choices,<br><span class="pop-out-text">MORE VALUE.</span></h1>
        <p data-aos="fade-up" data-aos-delay="100">Indulge in our famous Glazed Donuts and refreshing Spanish Latte.
            Crafted fresh daily in Angeles City.</p>
        <div class="hero-buttons" data-aos="fade-up" data-aos-delay="200">
            <a href="menu" class="btn btn-orange"><i class="ph ph-bicycle"></i> Order Delivery</a>
            <a href="locations" class="btn btn-outline"><i class="ph ph-map-pin"></i> Find a branch</a>
        </div>
        <p class="tagline" data-aos="fade-in" data-aos-delay="400">
            AVAILABLE ON: <span class="tagline-available">GrabFood</span>
        </p>
    </div>
    <div class="hero-image" data-aos="zoom-in-left" data-aos-duration="1000">
        <img src="assets/img/danonos.jpg" alt="Danono's Donuts Box" class="float-img">
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
            <p>Our ultimate choco-loaded treat that's rich, crunchy, and irresistibly indulgent.</p>
            <a href="menu" class="btn btn-small">₱40</a>
        </div>

        <div class="treat-card" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/biscoff.jpg" alt="Biscoff Bite">
            <h3>Biscoff Bite</h3>
            <p>Fluffy brioche donut, rich peanut butter glaze, and a generous topping of Lotus Biscoff.</p>
            <a href="menu" class="btn btn-small">₱60</a>
        </div>

        <div class="treat-card" data-aos="fade-up" data-aos-delay="300">
            <img src="assets/img/double-choco-delight.jpg" alt="Double Choco Delight">
            <h3>Double Choco Delight</h3>
            <p>Double Choco Delight is here, and it's everything your chocolate dreams are made of.</p>
            <a href="menu" class="btn btn-small">₱40</a>
        </div>

        <div class="treat-card" data-aos="fade-up" data-aos-delay="400">
            <img src="assets/img/almond-amore.jpg" alt="Almond Amore">
            <h3>Almond Amore</h3>
            <p>Light, fluffy, and loaded with almond love, this one's a certified heart-stealer.</p>
            <a href="menu" class="btn btn-small">₱40</a>
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
            <img src="assets/img/danonos-kitchen.jpg" alt="Danonos Kitchen">
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
            <img src="assets/img/danonos-branches.jpg" alt="Our Locations">
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

<section class="family-banner family-banner-centered">
    <div class="family-banner-content" data-aos="fade-up">
        <h2>Be Part of Our <span class="family-highlight">FAMILY</span></h2>
        <p>Ready to taste the handmade? Join a box today and make your day a little sweeter.</p>
        <div class="family-buttons">
            <a href="franchise" class="btn btn-white"><i class="ph ph-handshake"></i> Partner With Us</a>
            <a href="locations" class="btn btn-outline-white"><i class="ph ph-map-pin"></i> Find a Branch</a>
        </div>
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