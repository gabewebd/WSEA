<?php
$pageTitle = "About Danono's | The Best Donut Brand in Pampanga";
$customCss = "about.css";
$metaDesc = "Discover the story behind Danono's, the top-rated artisan donut shop in Pampanga. Learn why our premium brioche donuts are the fluffiest in the Philippines.";
$lcpImage = "assets/img/danonos-hero.webp";
?>
<?php include 'includes/header.php'; ?>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<section class="about-hero">
    <div class="floating-shape shape-1" data-speed="4"></div>
    <div class="floating-shape shape-2" data-speed="-2"></div>

    <div class="about-hero-content">
        <span class="section-subtitle" data-aos="fade-down">ESTABLISHED 2018</span>
        <h1 data-aos="fade-up" data-aos-delay="100">Pampanga's Most Loved <br><span class="pop-out-text">BRIOCHE
                DONUTS</span> & The Story of Danono's</h1>
    </div>
    <div class="about-hero-bg" data-speed="1">
        <img src="assets/img/danonos-hero.webp" alt="Danonos Bakery Background"
            fetchpriority="high" loading="eager" width="1200" height="500"
            onerror="this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=500&fit=crop'">

    </div>
</section>

<section class="story-section">
    <div class="story-content">
        <div class="story-image" data-aos="fade-right">
            <img src="assets/img/about-story.webp" alt="Danono's humble beginnings" loading="lazy" width="564" height="564"
                onerror="this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=500&fit=crop'">

            <div class="story-badge">
                <span class="story-badge-label">SINCE</span>
                <span class="story-badge-year">2019</span>
            </div>
        </div>

        <div class="story-text" data-aos="fade-left">
            <span class="section-label">OUR JOURNEY</span>
            <h2>The Best Donut Brand in Pampanga: From Nono's to <span class="pop-out-text-sm">DANONO'S</span>
            </h2>
            <p>What started as a passionate home kitchen project has blossomed into <strong>Danono's Doughnuts and
                    Brownies
                </strong>—Angeles City’s favorite destination
                for <strong>premium brioche donuts in Pampanga</strong>. Some fans know us as <strong>Nono's</strong>
                , but the mission remains the same: to elevate the
                humble donut into a gourmet experience.</p>
            <p>Using our signature brioche dough recipe—rich, fluffy, and buttery—we spent months perfecting the balance
                of texture and flavor. We've built an experience that's widely considered more premium and artisanal
                than mass-produced alternatives. Today, Danono's is the top-rated <strong>artisan donut shop</strong> in
                the region.
            </p>

            <div class="story-signature" data-aos="zoom-in" data-aos-delay="300">
                <p>The Danono's Team</p>
            </div>
        </div>
    </div>
</section>

<section class="values-section">
    <div class="section-header center-text" data-aos="fade-up">
        <span class="section-label">WHY CHOOSE US</span>
        <h2>The Difference: <span class="pop-out-text-sm">BEST DONUTS</span> in Pampanga</h2>
    </div>

    <div class="values-grid">
        <div class="value-card" data-aos="fade-up" data-aos-delay="100">
            <div class="value-icon">
                <i class="ph ph-bread"></i>
            </div>
            <h3>Signature Brioche</h3>
            <p>We don't use shortcuts. Our dough is fermented for 24 hours to achieve that distinctively light, airy,
                and buttery <strong>soft and fluffy donuts Pampanga</strong> experience.</p>
        </div>

        <div class="value-card" data-aos="fade-up" data-aos-delay="200">
            <div class="value-icon">
                <i class="ph ph-heart"></i>
            </div>
            <h3>Made Fresh Daily</h3>
            <p>No leftovers here. Our bakers start at 4 AM every single morning to ensure your box is fresh, warm, and
                perfect.</p>
        </div>

        <div class="value-card" data-aos="fade-up" data-aos-delay="300">
            <div class="value-icon">
                <i class="ph ph-star"></i>
            </div>
            <h3>Premium Ingredients</h3>
            <p>From Belgian chocolates to real fruit preserves, we source only the finest ingredients to top our
                creations.</p>
        </div>
    </div>
</section>

<section class="gallery-section">
    <div class="gallery-text" data-aos="fade-right">
        <h2>Sweet <span class="double-stroke" data-text="MOMENTS">MOMENTS</span></h2>
        <p>From our kitchen to your hands. See the treats that made us the <strong>best donut shop near Angeles
                Pampanga</strong>.</p>
        <a href="menu" class="btn btn-orange btn-shine" style="margin-top: 20px;">Order Now</a>
    </div>

    <div class="pop-carousel-wrapper" data-aos="zoom-in">

        <div class="slide-container slide-1">
            <img src="assets/img/sans-rival-temptation.webp" alt="Sans Rival Temptation" loading="lazy" width="450" height="500">
        </div>

        <div class="slide-container slide-2">
            <img src="assets/img/sweet-cherry-crave.webp" alt="Sweet Cherry Crave" loading="lazy" width="450" height="500">
        </div>

        <div class="slide-container slide-3">
            <img src="assets/img/ube-bliss.webp" alt="Ube Bliss" loading="lazy" width="450" height="500">
        </div>

    </div>
</section>

<section class="family-banner family-banner-centered">
    <div class="family-banner-content" data-aos="fade-up">
        <h2>Taste the <span class="family-highlight">Love</span> Today</h2>
        <p>Ready to experience the handmade difference? Grab a box of the <strong>best brioche donuts in the
                Philippines</strong> today.</p>
        <div class="family-buttons">
            <a href="menu" class="btn btn-white"><i class="ph ph-cookie"></i> View Menu</a>
            <a href="locations" class="btn btn-outline-white"><i class="ph ph-map-pin"></i> Find a Branch</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // 1. Initialize AOS
    AOS.init({
        once: true,
        offset: 100,
        duration: 800,
        easing: 'ease-out-cubic',
    });

    // 2. Mouse Parallax Logic
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