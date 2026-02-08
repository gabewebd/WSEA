<?php
$pageTitle = "Franchise - Danono's Doughnuts and Brownies";
$metaDesc = "Join the Danono's family! Learn about franchise opportunities and how to bring our delicious doughnuts to your community.";
$customCss = "franchise.css";
?>
<?php include 'includes/header.php'; ?>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    /* =========================================
       FRANCHISE RESPONSIVE FIXES (HERO & FORM ONLY)
       ========================================= */
    :root {
        --primary-orange: #EF7D32;
        --dark-brown: #431407;
        --cream: #FFF9F2;
    }

    /* --- HERO SECTION STYLES --- */
    .franchise-hero {
        position: relative;
        min-height: 85vh;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 120px 5% 80px;
        overflow: hidden;
        background: linear-gradient(135deg, #FFFdf9 0%, #FFF0E6 100%);
    }

    .hero-text {
        flex: 1;
        max-width: 600px;
        z-index: 2;
    }

    .hero-text h1 {
        font-size: 64px;
        line-height: 1.1;
        color: var(--dark-brown);
        margin-bottom: 25px;
        font-weight: 800;
    }

    .text-gradient {
        color: var(--primary-orange);
    }

    .hero-image-wrapper {
        flex: 1;
        position: relative;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .floating-img {
        width: 100%;
        max-width: 550px;
        border-radius: 30px;
        border: 8px solid white;
        box-shadow: 0 20px 50px rgba(67, 20, 7, 0.15);
        transform: rotate(3deg);
    }

    .floating-card {
        position: absolute;
        bottom: 40px;
        left: 0;
        background: white;
        padding: 15px 25px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        gap: 15px;
        z-index: 3;
    }

    .hero-buttons {
        display: flex;
        gap: 15px;
    }

    /* --- FORM BUTTON STYLES --- */
    .form-submit-btn {
        background: var(--primary-orange);
        color: white;
        width: 100%;
        padding: 16px;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
        margin-top: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .form-submit-btn:hover {
        opacity: 0.9;
        transform: translateY(-2px);
    }

    /* --- MOBILE RESPONSIVE FIXES --- */
    @media (max-width: 968px) {

        /* 1. Fix Hero Section Stacking */
        .franchise-hero {
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            justify-content: flex-start !important;
            text-align: center;
            padding: 100px 20px 60px;
            min-height: auto !important;
            height: auto !important;
            gap: 40px;
        }

        /* 2. Text First (Order: 1) */
        .hero-text {
            order: 1 !important;
            width: 100%;
            max-width: 100%;
            flex: none !important;
            margin-bottom: 30px;
        }

        .hero-text h1 {
            font-size: 32px;
            /* Mobile header size */
            margin-bottom: 15px;
        }

        .hero-text p {
            font-size: 16px;
            margin: 0 auto 25px;
            max-width: 100%;
        }

        .hero-buttons {
            display: flex;
            flex-direction: column;
            gap: 12px;
            width: 100%;
            max-width: 280px;
            margin: 0 auto;
        }

        .hero-buttons .btn {
            width: 100%;
            justify-content: center;
            padding: 14px 24px;
        }

        /* 3. Image Second (Order: 2) */
        .hero-image-wrapper {
            order: 2 !important;
            width: 100%;
            max-width: 320px;
            flex: none !important;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0 auto;
        }

        .hero-image-wrapper img.floating-img {
            width: 100%;
            max-width: 100%;
            transform: rotate(0deg) !important;
            animation: none !important;
            border-width: 5px;
            border-radius: 20px;
        }

        .floating-card {
            position: relative;
            bottom: auto;
            left: auto;
            transform: none;
            width: 100%;
            max-width: 260px;
            margin-top: 15px;
            animation: none !important;
            z-index: 5;
        }

        /* Hide decorative shapes on mobile to avoid overflow */
        .floating-shape {
            display: none !important;
        }

        /* 4. Fix Submit Button */
        .form-submit-btn {
            width: 100%;
        }

        .form-grid {
            display: flex;
            flex-direction: column;
        }
    }
</style>

<section class="franchise-hero">
    <div class="floating-shape shape-1" data-speed="4"></div>
    <div class="floating-shape shape-2" data-speed="-2"></div>

    <div class="hero-text" data-aos="fade-right" data-aos-duration="800">
        <div class="badge-pill" data-aos="fade-down" data-aos-delay="100">Partner With Us</div>
        <h1 data-aos="fade-up" data-aos-delay="200">Be Part of Our <span class="text-gradient">Family</span></h1>
        <p data-aos="fade-up" data-aos-delay="300">Join the growing Danono's franchise network and bring the sweetest
            treats to your community. We provide the
            recipe for success — you bring the passion!</p>

        <div class="hero-buttons">
            <a href="#apply" class="btn btn-primary">
                <i class="ph-fill ph-handshake"></i> Apply Now
            </a>
            <a href="#learn-more" class="btn btn-secondary">
                <i class="ph-bold ph-info"></i> Learn More
            </a>
        </div>
    </div>

    <div class="hero-image-wrapper" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
        <div class="image-blob-bg"></div>

        <img src="assets/img/franchise.jpg" alt="Danono's Franchise Opportunity" class="floating-img">

        <div class="floating-card" data-aos="zoom-in" data-aos-delay="600">
            <i class="ph-fill ph-trend-up"></i>
            <div>
                <span>Potential ROI</span>
                <strong>High Growth</strong>
            </div>
        </div>
    </div>
</section>

<div class="section-divider">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#FFF9F2" fill-opacity="1"
            d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,122.7C960,149,1056,203,1152,208C1248,213,1344,171,1392,149.3L1440,128L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
        </path>
    </svg>
</div>

<section id="learn-more" class="why-franchise-section">
    <div class="why-franchise-container">
        <div class="why-franchise-grid">
            <div data-aos="fade-right" data-aos-duration="800">
                <img src="assets/img/perfect-spot.jpg" alt="Perfect Spot for your Franchise" class="floating-img"
                    style="transform: rotate(2deg);">
            </div>

            <div data-aos="fade-left" data-aos-duration="800">
                <span class="badge-pill" data-aos="fade-down" data-aos-delay="100">Business Opportunity</span>
                <h2 style="font-size: 2.5rem; color: var(--chocolate); font-weight: 900; margin-bottom: 20px;"
                    data-aos="fade-up" data-aos-delay="200">
                    Why Choose <span class="text-gradient">Danono's?</span>
                </h2>
                <p style="margin-bottom: 30px; font-size: 1.1rem; line-height: 1.6;" data-aos="fade-up"
                    data-aos-delay="300">
                    Danono's isn't just a doughnut shop; it's a destination for happiness. Our proven business model,
                    combined with high-quality ingredients and a strong brand identity, makes us the perfect partner for
                    aspiring entrepreneurs.
                </p>

                <div class="benefits-grid">
                    <div class="benefit-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="benefit-icon-box">
                            <i class="ph-fill ph-check-circle"></i>
                        </div>
                        <div>
                            <h4 class="benefit-title">Proven Business Model</h4>
                            <p class="benefit-desc">Operational systems tested and perfected across multiple locations.
                            </p>
                        </div>
                    </div>

                    <div class="benefit-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="benefit-icon-box">
                            <i class="ph-fill ph-star"></i>
                        </div>
                        <div>
                            <h4 class="benefit-title">Premium Quality Products</h4>
                            <p class="benefit-desc">Only the finest ingredients for our signature brioche doughnuts.</p>
                        </div>
                    </div>

                    <div class="benefit-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="benefit-icon-box">
                            <i class="ph-fill ph-chart-line-up"></i>
                        </div>
                        <div>
                            <h4 class="benefit-title">Growing Brand Recognition</h4>
                            <p class="benefit-desc">Leverage our established reputation and loyal customer base.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div style="background-color: var(--cream); margin-bottom: -2px;">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#431407" fill-opacity="1"
            d="M0,224L48,213.3C96,203,192,181,288,181.3C384,181,480,203,576,224C672,245,768,267,864,250.7C960,235,1056,181,1152,165.3C1248,149,1344,171,1392,181.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>
</div>

<section class="franchise-stats-testimonials">
    <div class="container">
        <div class="stats-row">
            <div class="stat-item" data-aos="zoom-in" data-aos-delay="100">
                <h3>120+</h3>
                <p>Successful outlets</p>
            </div>
            <div class="stat-item" data-aos="zoom-in" data-aos-delay="200">
                <h3>24K</h3>
                <p>Social followers</p>
            </div>
            <div class="stat-item" data-aos="zoom-in" data-aos-delay="300">
                <h3>4.8</h3>
                <p>Average rating</p>
            </div>
            <div class="stat-item" data-aos="zoom-in" data-aos-delay="400">
                <h3>10</h3>
                <p>Years of excellence</p>
            </div>
        </div>

        <div class="testimonial-card" data-aos="fade-up" data-aos-duration="800">
            <div class="testimonial-avatar">
                <img src="assets/img/franchise.jpg" alt="Owner testimonial">
            </div>
            <div class="testimonial-content" style="text-align: left;">
                <p class="quote">"Partnering with Danono's transformed my life. The support, training, and product
                    quality made opening a breeze — customers keep coming back!"</p>
                <p class="author">— Maria Santos, Danono's Angeles</p>
            </div>
        </div>
    </div>
</section>

<div style="background-color: var(--cream); margin-top: -2px;">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="transform: rotate(180deg);">
        <path fill="#431407" fill-opacity="1"
            d="M0,224L48,213.3C96,203,192,181,288,181.3C384,181,480,203,576,224C672,245,768,267,864,250.7C960,235,1056,181,1152,165.3C1248,149,1344,171,1392,181.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>
</div>

<section id="apply" class="franchise-form-section">
    <div class="container franchise-form-container">

        <div class="form-header" data-aos="fade-up">
            <span class="badge-pill">Join Our Network</span>
            <h2 class="form-header-title">Start Your <span class="text-highlight">Journey</span></h2>
            <p class="form-header-desc">
                Ready to take the next step? Fill out the form below and our franchise team will get in touch within 2
                business days.
            </p>
        </div>

        <?php if (isset($_SESSION['franchise_success'])): ?>
            <div class="alert alert-success">
                <i class="ph-fill ph-check-circle alert-icon"></i>
                <span><?php echo $_SESSION['franchise_success'];
                unset($_SESSION['franchise_success']); ?></span>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['franchise_error'])): ?>
            <div class="alert alert-error">
                <i class="ph-fill ph-warning-circle alert-icon"></i>
                <span><?php echo $_SESSION['franchise_error'];
                unset($_SESSION['franchise_error']); ?></span>
            </div>
        <?php endif; ?>

        <div class="form-card-box" data-aos="fade-up" data-aos-delay="200">
            <div class="decoration-doughnut"></div>

            <form action="admin/process_franchise.php" method="POST">
                <div class="form-grid">

                    <div class="input-group">
                        <label for="name" class="form-label">Full Name <span class="required">*</span></label>
                        <input type="text" id="name" name="name" placeholder="Juan Dela Cruz" required
                            class="form-input">
                    </div>

                    <div class="input-group">
                        <label for="email" class="form-label">Email Address <span class="required">*</span></label>
                        <input type="email" id="email" name="email" placeholder="juan@example.com" required
                            class="form-input">
                    </div>

                    <div class="input-group">
                        <label for="phone" class="form-label">Phone Number <span class="required">*</span></label>
                        <input type="tel" id="phone" name="phone" placeholder="+63 912 345 6789" required
                            class="form-input">
                    </div>

                    <div class="input-group">
                        <label for="location" class="form-label">Preferred Location <span
                                class="required">*</span></label>
                        <input type="text" id="location" name="location" placeholder="San Fernando, Pampanga" required
                            class="form-input">
                    </div>

                    <div class="input-group full-width">
                        <label for="message" class="form-label">Tell Us About Yourself <span
                                class="optional">(Optional)</span></label>
                        <textarea id="message" name="message" rows="4"
                            placeholder="Share your business experience, goals, and why you're interested in partnering with Danono's..."
                            class="form-input"></textarea>
                    </div>
                </div>

                <div class="form-footer">
                    <button type="submit" class="form-submit-btn">
                        Submit Application <i class="ph-bold ph-paper-plane-right"></i>
                    </button>
                    <p class="privacy-notice">
                        <i class="ph-fill ph-lock-key"></i> Your information is secure.
                    </p>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        once: true,
        offset: 120,
        duration: 800,
        easing: 'ease-out-back'
    });
</script>

<?php include 'includes/footer.php'; ?>