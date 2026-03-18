<?php
$pageTitle = "About Danono's | The Best Donut Brand in Pampanga";
$customCss = "about.css";
$metaDesc = "Discover the story behind Danono's, the top-rated artisan donut shop in Pampanga. Learn why our premium brioche donuts are the fluffiest in the Philippines.";
?>
<?php include 'includes/header.php'; ?>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    /* =========================================
       ABOUT PAGE INLINE STYLES (Mobile Responsive Fixed)
       ========================================= */

    /* --- HERO SECTION --- */
    .about-hero {
        position: relative;
        height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background-color: var(--dark-brown);
    }

    .story-content {
        display: flex;
        align-items: center;
        gap: 80px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .story-image {
        flex: 1;
        min-width: 300px;
        position: relative;
        border-radius: 30px;
        overflow: visible;
    }

    .story-image img {
        width: 100%;
        height: auto;
        display: block;
        object-fit: cover;
        border-radius: 30px;
        border: 8px solid var(--dark-brown);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .story-badge {
        position: absolute;
        bottom: -20px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--gold);
        border: 5px solid var(--dark-brown);
        width: 90px;
        height: 90px;
        border-radius: 18px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: var(--dark-brown);
        z-index: 4;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
    }

    .story-badge:hover {
        transform: translateX(-50%) scale(1.1) rotate(5deg);
    }

    .story-badge-year {
        font-size: 26px;
        font-weight: 900;
        line-height: 1;
    }

    .story-badge-label {
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: -2px;
    }

    .story-text {
        flex: 1.2;
    }

    .story-text h2 {
        font-size: 48px;
        line-height: 1.1;
        margin-bottom: 24px;
        color: var(--dark-brown);
    }

    .story-text p {
        font-size: 17px;
        line-height: 1.6;
        color: #666;
        margin-bottom: 25px;
    }

    .story-signature {
        margin-top: 30px;
        font-family: cursive;
        color: var(--primary-orange);
        font-size: 24px;
        transform: rotate(-2deg);
    }

    /* --- 3. VALUES SECTION --- */
    .values-section {
        padding: 80px 5%;
        background-color: var(--bg-light);
    }

    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 50px auto 0;
    }

    .value-card {
        background: white;
        padding: 40px 30px;
        border-radius: 20px;
        text-align: center;
        border: 2px solid #FFF8F0;
        box-shadow: 0 5px 15px rgba(67, 20, 7, 0.05);
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        height: 100%;
    }

    .value-card:hover {
        transform: translateY(-10px);
        border-color: var(--primary-orange);
        box-shadow: 0 15px 30px rgba(67, 20, 7, 0.1);
    }

    .value-icon {
        font-size: 40px;
        color: var(--primary-orange);
        margin-bottom: 20px;
        transition: transform 0.3s;
    }

    .value-card:hover .value-icon {
        transform: scale(1.2);
    }

    .value-card h3 {
        font-size: 22px;
        color: var(--dark-brown);
        margin-bottom: 15px;
    }

    .value-card p {
        font-size: 15px;
        color: var(--text-gray);
        line-height: 1.6;
    }

    /* --- 4. GALLERY SECTION (Sweet Moments) --- */
    .gallery-section {
        padding: 100px 5%;
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        gap: 60px;
        align-items: center;
        justify-content: center;
        overflow: visible;
    }

    .gallery-text {
        flex: 1;
        max-width: 450px;
        z-index: 10;
    }

    .gallery-text h2 {
        font-size: 48px;
        color: var(--dark-brown);
        margin-bottom: 20px;
        line-height: 1.1;
    }

    .pop-carousel-wrapper {
        flex: 1.2;
        position: relative;
        height: 550px;
        width: 100%;
        max-width: 650px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .slide-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 90%;
        height: 90%;
        max-height: 500px;
        border: 8px solid white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(67, 20, 7, 0.2);
        background: white;
        opacity: 0;
        z-index: 0;
        animation: containerPop 9s infinite ease-in-out;
    }

    /* Fixed: Ensure images fill the container */
    .slide-container img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        border-radius: 12px;
        display: block;
    }

    .slide-1 {
        animation-delay: 0s;
    }

    .slide-2 {
        animation-delay: 3s;
    }

    .slide-3 {
        animation-delay: 6s;
    }

    @keyframes containerPop {
        0% {
            opacity: 0;
            transform: translate(-50%, -50%) scale(0.9);
            z-index: 1;
        }

        5% {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
            z-index: 5;
        }

        33.33% {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
            z-index: 5;
        }

        38% {
            opacity: 0;
            transform: translate(-50%, -50%) scale(1.05);
            z-index: 1;
        }

        100% {
            opacity: 0;
            z-index: 0;
            transform: translate(-50%, -50%) scale(0.9);
        }
    }

    /* --- 5. FAMILY BANNER (Buttons Fixed) --- */
    .family-banner {
        background: linear-gradient(90deg, #EF7D32 0%, #FFC107 25%, #D8651E 50%, #FFC107 75%, #EF7D32 100%);
        background-size: 300% 100%;
        animation: familyGradient 10s ease-in-out infinite;
        color: white;
        padding: 80px 5%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    @keyframes familyGradient {

        0%,
        100% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }
    }

    .family-banner::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml,%3Csvg width='50' height='50' viewBox='0 0 50 50' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23000000' fill-opacity='0.05'%3E%3Ccircle cx='12' cy='12' r='1.5'/%3E%3Ccircle cx='37' cy='12' r='1'/%3E%3Ccircle cx='12' cy='37' r='1'/%3E%3Ccircle cx='37' cy='37' r='1.5'/%3E%3Ccircle cx='25' cy='25' r='1'/%3E%3C/g%3E%3C/svg%3E");
        pointer-events: none;
        z-index: 0;
    }

    .family-banner-content {
        position: relative;
        z-index: 2;
        max-width: 600px;
    }

    .family-banner-content h2 {
        font-size: 58px;
        font-weight: 700;
        line-height: 1.1;
        margin-bottom: 20px;
        white-space: nowrap;
    }

    .family-highlight {
        color: #FFF;
        text-shadow: 2px 2px 0 rgba(0, 0, 0, 0.15);
    }

    .family-banner .family-buttons {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    /* White filled button */
    .family-banner .btn-white {
        background: white;
        color: #EF7D32;
        padding: 14px 32px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        font-size: 15px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
        border: 2px solid white;
    }

    .family-banner .btn-white:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    /* Outline button for Find a Branch */
    .btn-outline-white {
        background: transparent;
        color: white;
        padding: 14px 32px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        font-size: 15px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
        border: 2px solid white;
    }

    .btn-outline-white:hover {
        background: white;
        color: #EF7D32;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .pop-out-text,
    .pop-out-text-sm {
        font-weight: 900;
        text-transform: uppercase;
        background: linear-gradient(to right, #EF7D32 0%, #FFC107 50%, #EF7D32 100%);
        background-size: 200% auto;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: shine 4s linear infinite;
    }

    @keyframes shine {
        to {
            background-position: 200% center;
        }
    }

    .double-stroke {
        color: transparent;
        -webkit-text-stroke: 1px var(--dark-brown);
        font-weight: 900;
        position: relative;
    }

    .double-stroke::after {
        content: attr(data-text);
        position: absolute;
        left: 0;
        top: 0;
        color: var(--dark-brown);
        opacity: 0;
        transform: translate(4px, 4px);
        transition: 0.3s;
    }

    .gallery-text:hover .double-stroke::after {
        opacity: 0.4;
        transform: translate(8px, 8px);
    }


    /* =================================================================
       RESPONSIVE STYLES (TABLET & MOBILE)
       ================================================================= */

    /* --- TABLET (max-width: 1024px) --- */
    @media (max-width: 1024px) {
        .about-hero {
            height: 380px;
        }

        .about-hero-content h1 {
            font-size: 42px;
        }

        .story-section {
            padding: 80px 5%;
        }

        .story-content {
            flex-direction: column;
            gap: 50px;
            text-align: center;
        }

        .story-image {
            min-width: unset;
            max-width: 500px;
            width: 100%;
            margin: 0 auto;
        }

        .story-text h2 {
            font-size: 40px;
        }

        .story-signature {
            justify-content: center;
            display: flex;
        }

        .gallery-section {
            flex-direction: column;
            text-align: center;
            gap: 40px;
            padding: 60px 20px;
        }

        .gallery-text {
            margin-bottom: 0;
            max-width: 100%;
        }

        .pop-carousel-wrapper {
            width: 100%;
            height: 450px;
        }
    }

    /* --- MOBILE (max-width: 768px) --- */
    @media (max-width: 768px) {
        .about-hero {
            height: 320px;
        }

        .about-hero-content h1 {
            font-size: 38px;
            line-height: 1.2;
        }

        .about-hero-content .section-subtitle {
            font-size: 11px;
            letter-spacing: 2px;
        }

        /* FIX: Story Section Vertical Stack */
        .story-section {
            padding: 60px 20px;
        }

        .story-content {
            flex-direction: column !important;
            gap: 40px;
        }

        .story-image {
            width: 100%;
            max-width: 350px;
            margin: 0 auto;
        }

        .story-image img {
            border-width: 6px;
            border-radius: 20px;
        }

        /* FIX: Badge placement on mobile */
        .story-badge {
            width: 70px;
            height: 70px;
            border-width: 4px;
            border-radius: 14px;
            bottom: -15px;
        }

        .story-badge-year {
            font-size: 20px;
        }

        .story-badge-label {
            font-size: 9px;
        }

        .story-text {
            text-align: center;
        }

        .story-text h2 {
            font-size: 32px;
            margin-bottom: 15px;
        }

        .story-text p {
            font-size: 15px;
        }

        .values-section {
            padding: 50px 20px;
        }

        .values-grid {
            grid-template-columns: 1fr;
            gap: 25px;
            margin-top: 30px;
        }

        .value-card {
            padding: 30px 20px;
        }

        /* FIX: Gallery Carousel Height */
        .gallery-section {
            padding: 50px 20px;
            gap: 30px;
        }

        .gallery-text h2 {
            font-size: 32px;
        }

        /* Increased height to ensure images don't disappear */
        .pop-carousel-wrapper {
            height: 380px;
            width: 100%;
            max-width: 350px;
        }

        .slide-container {
            border-width: 5px;
            border-radius: 16px;
            width: 95%;
            height: 95%;
        }

        /* FIX: Family Banner Buttons */
        .family-banner {
            padding: 60px 20px;
            flex-direction: column;
            text-align: center;
        }

        .family-banner-content h2 {
            font-size: 32px;
            white-space: normal;
        }

        .family-banner .family-buttons {
            flex-direction: column;
            width: 100%;
            max-width: 300px;
            margin: 25px auto 0;
            gap: 15px;
        }

        .family-banner .btn {
            width: 100%;
            justify-content: center;
        }
    }

    /* --- SMALL MOBILE (max-width: 480px) --- */
    @media (max-width: 480px) {
        .about-hero {
            height: 280px;
        }

        .about-hero-content h1 {
            font-size: 28px;
        }

        .story-text h2 {
            font-size: 28px;
        }

        .gallery-text h2 {
            font-size: 28px;
        }

        /* Ensure carousel fits small screens */
        .pop-carousel-wrapper {
            height: 320px;
        }

        .family-banner-content h2 {
            font-size: 28px;
        }
    }
</style>

<section class="about-hero">
    <div class="floating-shape shape-1" data-speed="4"></div>
    <div class="floating-shape shape-2" data-speed="-2"></div>

    <div class="about-hero-content">
        <span class="section-subtitle" data-aos="fade-down">ESTABLISHED 2018</span>
        <h1 data-aos="fade-up" data-aos-delay="100">Pampanga's Most Loved <br><span class="pop-out-text">BRIOCHE
                DONUTS</span> & The Story of Danono's</h1>
    </div>
    <div class="about-hero-bg" data-speed="1">
        <img src="assets/img/danonos-hero.jpg" alt="Danonos Bakery Background"
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
            <img src="assets/img/sans-rival-temptation.jpg" alt="Sans Rival Temptation">
        </div>

        <div class="slide-container slide-2">
            <img src="assets/img/sweet-cherry-crave.jpg" alt="Sweet Cherry Crave">
        </div>

        <div class="slide-container slide-3">
            <img src="assets/img/ube-bliss.jpg" alt="Ube Bliss">
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