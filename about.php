<?php
$pageTitle = "About Us - Danono's";
$customCss = "about.css";
$metaDesc = "Learn about Danono's story - from a small home kitchen in 2019 to Angeles City's favorite doughnut destination.";
?>
<?php include 'includes/header.php'; ?>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<section class="about-hero">
    <div class="floating-shape shape-1" data-speed="4"></div>
    <div class="floating-shape shape-2" data-speed="-2"></div>

    <div class="about-hero-content">
        <span class="section-subtitle" data-aos="fade-down">ESTABLISHED 2019</span>
        <h1 data-aos="fade-up" data-aos-delay="100">Spreading Happiness,<br>One <span
                class="pop-out-text">DOUGHNUT</span> at a Time.</h1>
    </div>
    <div class="about-hero-bg" data-speed="1">
        <img src="assets/img/danonos-login-bg.jpg" alt="Danonos Bakery Background"
            onerror="this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=500&fit=crop'">

    </div>
</section>

<section class="story-section">
    <div class="story-content">
        <div class="story-image" data-aos="fade-right">
            <img src="assets/img/about-story.jpg" alt="Danono's humble beginnings"
                onerror="this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=500&fit=crop'">

            <div class="story-badge">
                <span class="story-badge-label">SINCE</span>
                <span class="story-badge-year">2019</span>
            </div>
        </div>

        <div class="story-text" data-aos="fade-left">
            <span class="section-label">OUR JOURNEY</span>
            <h2>From Nono's to <span class="pop-out-text-sm">DANONO'S</span></h2>
            <p>What started as a passionate home kitchen project has blossomed into Angeles City’s favorite destination
                for premium treats. We didn't just want to make doughnuts; we wanted to elevate them.</p>
            <p>Using our signature brioche dough recipe—rich, fluffy, and buttery—we spent months perfecting the balance
                of texture and flavor. Today, Danono's is more than just a bakery; it's a place where friends gather.
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
        <h2>The Danono's <span class="pop-out-text-sm">DIFFERENCE</span></h2>
    </div>

    <div class="values-grid">
        <div class="value-card" data-aos="fade-up" data-aos-delay="100">
            <div class="value-icon">
                <i class="ph ph-doughnut"></i>
            </div>
            <h3>Signature Brioche</h3>
            <p>We don't use shortcuts. Our dough is fermented for 24 hours to achieve that distinctively light, airy,
                and buttery brioche texture.</p>
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
        <p>From our kitchen to your hands. See the treats that made us Angeles City's favorite.</p>
        <a href="menu" class="btn btn-orange btn-shine" style="margin-top: 20px;">Order Now</a>
    </div>
    <div class="gallery-grid">
        <div class="gallery-item large" data-aos="zoom-in" data-aos-delay="100">
            <img src="assets/img/sans-rival-temptation.jpg" alt="Danonos Sans Rival"
                onerror="this.src='https://images.unsplash.com/photo-1551024506-0bccd828d307?w=600&h=800&fit=crop'">
        </div>
        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200">
            <img src="assets/img/sweet-cherry-crave.jpg" alt="Sweet Cherry Cave"
                onerror="this.src='https://images.unsplash.com/photo-1631397834789-32263f357564?w=400&h=400&fit=crop'">
        </div>
        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
            <img src="assets/img/ube-bliss.jpg" alt="Ube Bliss"
                onerror="this.src='https://images.unsplash.com/photo-1461023058943-07fcbe16d735?w=400&h=400&fit=crop'">
        </div>
    </div>
</section>

<section class="about-cta">
    <div class="cta-content" data-aos="zoom-in-up">
        <h2>Taste the Love Today</h2>
        <p>Ready to experience the best brioche doughnuts in Pampanga?</p>
        <div class="cta-buttons">
            <a href="menu" class="btn btn-orange btn-shine">View Menu</a>
            <a href="locations" class="btn btn-outline-dark">Find a Branch</a>
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