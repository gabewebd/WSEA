<?php
$pageTitle = "Franchise Opportunities | Best Donut Franchise in the Philippines";
$metaDesc = "Join the Danono's family! Learn about donut franchise opportunities in the Philippines and how to bring our premium brioche donuts to your community.";
$customCss = "franchise.css";
?>
<?php include 'includes/header.php'; ?>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [{
    "@type": "Question",
    "name": "How much does a Danono's franchise cost?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Please contact us directly through our Franchise page for our updated package rates and inclusions for Central Luzon and beyond."
    }
  }, {
    "@type": "Question",
    "name": "Do you deliver donuts in Angeles City?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Yes! We offer delivery within Angeles City, San Fernando, and Mabalacat. You can also find us on major food delivery apps."
    }
  }, {
    "@type": "Question",
    "name": "Are your donuts baked fresh daily?",
    "acceptedAnswer": {
      "@type": "Answer",
      "text": "Absolutely. All Danono's brioche donuts and brownies are crafted and baked fresh every single morning across all our Pampanga branches."
    }
  }]
}
</script>

<style>
    /* =========================================
       FRANCHISE RESPONSIVE FIXES (HERO & FORM ONLY)
       ========================================= */
    html,
    body {
        overflow-x: visible !important;
        /* Allow sticky header */
    }

    .franchise-hero {
        position: relative;
        min-height: 95vh;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        padding: 40px 5% 40px;
        background: #FFFAF5;
        overflow: hidden;
        gap: 15px;
        width: 100%;
        max-width: 100%;
    }

    .hero-text {
        flex: 1.2;
        max-width: 700px;
        z-index: 10;
        text-align: left;
        padding: 0 5%;
    }

    .hero-text h1 {
        font-family: var(--font-heading), "Fredoka", sans-serif;
        font-size: 68px;
        line-height: 1.1;
        color: #431407;
        margin-bottom: 25px;
        font-weight: 900;
        letter-spacing: -1.5px;
    }

    .hero-text p {
        font-size: 18px;
        line-height: 1.7;
        color: #6D4C41;
        margin: 0 0 40px;
        max-width: 550px;
    }

    .hero-buttons {
        display: flex;
        gap: 16px;
        align-items: center;
        justify-content: flex-start;
    }

    .btn-primary {
        background: #EF7D32;
        color: white !important;
        padding: 16px 35px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 15px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: none;
        box-shadow: 0 10px 20px rgba(239, 125, 50, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(239, 125, 50, 0.4);
    }

    .btn-secondary {
        background: white;
        color: #431407 !important;
        padding: 16px 35px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 15px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
        border: 2px solid #EEE5DE;
    }

    .btn-secondary:hover {
        background: #FDFBFA;
        border-color: #431407;
        transform: translateY(-3px);
    }

    /* --- HERO IMAGE & BLOB --- */
    /* --- HERO SIDE IMAGES --- */
    .hero-side-wrapper {
        flex: 1;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 5;
        padding-right: 5%;
    }

    .image-blob-bg {
        position: absolute;
        width: 120%;
        height: 120%;
        background: #FEE7C8;
        border-radius: 50%;
        z-index: 1;
        opacity: 0.8;
        filter: blur(60px);
    }

    .premium-image-container {
        position: relative;
        z-index: 2;
        transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .premium-image-container:hover {
        transform: scale(1.02);
    }

    .floating-img {
        width: 100%;
        max-width: 600px;
        border-radius: 30px;
        display: block;
        box-shadow: 0 40px 100px rgba(67, 20, 7, 0.15);
    }

    .floating-card {
        position: absolute;
        bottom: 20px;
        left: -30px;
        background: white;
        padding: 15px 22px;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(67, 20, 7, 0.12);
        display: flex;
        align-items: center;
        gap: 15px;
        z-index: 20;
        animation: floatCard 4s infinite ease-in-out;
    }

    @keyframes floatCard {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    .floating-card i {
        font-size: 28px;
        color: #EF7D32;
        background: #FFF5EE;
        padding: 10px;
        border-radius: 12px;
    }

    .floating-card span {
        display: block;
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        color: #A1887F;
        letter-spacing: 1px;
    }

    .floating-card strong {
        font-size: 18px;
        color: #431407;
        font-weight: 900;
    }

    .form-submit-btn:hover {
        opacity: 0.9;
        transform: translateY(-2px);
    }

    /* --- MOBILE RESPONSIVE FIXES --- */
    @media (max-width: 968px) {
        .franchise-hero {
            flex-direction: column !important;
            text-align: center !important;
            padding: 40px 20px 60px !important;
            gap: 20px;
            min-height: 0 !important;
            height: auto !important;
            justify-content: flex-start !important;
            margin-top: 0 !important;
            overflow: hidden;
            /* Extra safety for horizontal scroll */
        }

        .hero-text {
            text-align: center !important;
            padding: 0;
            order: 1;
        }

        .hero-text h1 {
            font-size: 38px;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .hero-text p {
            margin: 0 auto 30px;
        }

        .hero-buttons {
            justify-content: center;
        }

        .hero-side-wrapper {
            order: 2;
            padding-right: 0;
            width: 100%;
        }

        .premium-image-container {
            transform: rotate(0deg);
            max-width: 450px;
        }

        .floating-card {
            left: 50%;
            transform: translateX(-50%) !important;
            bottom: -15px;
            /* Adjust to sit below image on mobile center */
            animation: none !important;
            position: relative;
            /* Switch to relative on mobile to prevent overlap */
            margin: 20px auto 0;
        }

        /* Second section separation */
        .why-franchise-section {
            padding-top: 60px !important;
            margin-top: 0 !important;
            overflow-x: hidden;
        }

        .franchise-stats-testimonials {
            overflow-x: hidden;
        }

        .franchise-form-section {
            overflow-x: hidden;
        }
    }

    @media (min-width: 1600px) {
        .franchise-hero {
            padding: 100px 12% 80px;
        }
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
    <!-- <div class="floating-shape shape-1" data-speed="4"></div>
    <div class="floating-shape shape-2" data-speed="-2"></div> -->

    <div class="hero-text" data-aos="fade-right" data-aos-duration="1000">
        <span class="badge-pill" data-aos="fade-up">Partner With Us</span>
        <h1 data-aos="fade-up" data-aos-delay="100">The Best <span class="pop-out-text">DONUT FRANCHISE</span>
            Opportunity in the Philippines</h1>
        <p data-aos="fade-up" data-aos-delay="200">Join the growing Danono's network and explore the <strong>best donut
                franchise in the Philippines</strong>. We provide the recipe for success — you bring the passion for
            business growth!</p>

        <div class="hero-buttons">
            <a href="#apply" class="btn btn-primary">
                <i class="ph-fill ph-handshake"></i> Apply Now
            </a>
            <a href="#learn-more" class="btn btn-secondary">
                <i class="ph-bold ph-info"></i> Learn More
            </a>
        </div>
    </div>

    <div class="hero-side-wrapper" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
        <div class="image-blob-bg"></div>
        <div class="premium-image-container">
            <img src="assets/img/franchise.jpg" alt="Danono's Franchise Opportunity" class="floating-img">
            <div class="floating-card" data-aos="zoom-in" data-aos-delay="600">
                <i class="ph-fill ph-trend-up"></i>
                <div>
                    <span>Potential ROI</span>
                    <strong>High Growth</strong>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="learn-more" class="why-franchise-section">
    <div class="why-franchise-container">
        <div class="why-franchise-grid">
            <div data-aos="fade-right" data-aos-duration="800">
                <img src="assets/img/perfect-spot.jpg" alt="Perfect Spot for your Franchise" class="floating-img"
                    style="transform: rotate(2deg); width: 100%; max-width: 600px; border-radius: 25px; border: 12px solid white; box-shadow: 0 30px 60px rgba(67, 20, 7, 0.15);">
            </div>

            <div data-aos="fade-left" data-aos-duration="800">
                <span class="badge-pill" data-aos="fade-down" data-aos-delay="100">Business Opportunity</span>
                <h2 style="font-size: 3.2rem; color: var(--dark-brown); font-weight: 900; margin-bottom: 25px; line-height: 1.1; white-space: normal;"
                    data-aos="fade-up" data-aos-delay="200">
                    Why Choose <span class="pop-out-text-sm">Danono's?</span>
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

<div style="background-color: var(--cream); margin-bottom: -2px; width: 100%; overflow: hidden;">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="width: 100%; height: auto; display: block;">
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

<div style="background-color: var(--cream); margin-top: -2px; width: 100%; overflow: hidden;">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
        style="width: 100%; height: auto; display: block; transform: rotate(180deg);">
        <path fill="#431407" fill-opacity="1"
            d="M0,224L48,213.3C96,203,192,181,288,181.3C384,181,480,203,576,224C672,245,768,267,864,250.7C960,235,1056,181,1152,165.3C1248,149,1344,171,1392,181.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>
</div>


<!-- =========================================
     FAQ SECTION (VISUAL SCHEMA VALIDATION)
     ========================================= -->
<section class="faq-premium-section">
    <div class="container faq-container">
        <div class="faq-header" data-aos="fade-up">
            <span class="badge-pill">Have Questions?</span>
            <h2 class="faq-main-title">Franchise <span class="pop-out-text-sm">FAQs</span></h2>
            <p class="faq-subtitle">Everything you need to know about starting your Danono's journey.</p>
        </div>

        <div class="faq-staggered-grid">
            <!-- Item 1 -->
            <div class="faq-card" data-aos="fade-up" data-aos-delay="100">
                <div class="faq-question">
                    <h3>How much does a Danono's franchise cost?</h3>
                    <div class="faq-icon-wrap">
                        <i class="ph ph-caret-down"></i>
                    </div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        <p>Please contact us directly through our Franchise page for our updated package rates and inclusions for Central Luzon and beyond.</p>
                    </div>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="faq-card" data-aos="fade-up" data-aos-delay="200">
                <div class="faq-question">
                    <h3>Do you deliver donuts in Angeles City?</h3>
                    <div class="faq-icon-wrap">
                        <i class="ph ph-caret-down"></i>
                    </div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        <p>Yes! We offer delivery within Angeles City, San Fernando, and Mabalacat. You can also find us on major food delivery apps.</p>
                    </div>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="faq-card" data-aos="fade-up" data-aos-delay="300">
                <div class="faq-question">
                    <h3>Are your donuts baked fresh daily?</h3>
                    <div class="faq-icon-wrap">
                        <i class="ph ph-caret-down"></i>
                    </div>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-inner">
                        <p>Absolutely. All Danono's brioche donuts and brownies are crafted and baked fresh every single morning across all our Pampanga branches.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .faq-premium-section {
        padding: 100px 0;
        background-color: var(--cream);
        position: relative;
        overflow: hidden;
    }

    .faq-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .faq-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .faq-main-title {
        font-family: 'Fredoka', sans-serif;
        font-size: 3.5rem;
        color: var(--dark-brown);
        margin: 15px 0;
        font-weight: 900;
        line-height: 1.1;
    }

    .faq-subtitle {
        font-family: 'Barlow', sans-serif;
        font-size: 1.2rem;
        color: #6D4C41;
        max-width: 600px;
        margin: 0 auto;
    }

    /* Center Layout */
    .faq-staggered-grid {
        display: flex;
        flex-direction: column;
        gap: 20px;
        align-items: center; /* Center the cards */
    }

    .faq-card {
        width: 100%;
        max-width: 800px; /* Limit width for better readability when centered */
        background: #FFFFFF;
        border-radius: 20px;
        padding: 5px;
        box-shadow: 0 10px 30px rgba(67, 20, 7, 0.05);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        cursor: pointer;
        border: 1px solid rgba(239, 125, 50, 0.08);
        position: relative;
    }

    .faq-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 35px rgba(67, 20, 7, 0.1);
        border-color: var(--primary-orange);
    }

    .faq-question {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 22px 28px;
    }

    .faq-question h3 {
        font-family: 'Fredoka', sans-serif !important;
        font-size: 1.4rem;
        color: var(--dark-brown);
        margin: 0;
        font-weight: 700;
        line-height: 1.3;
        flex: 1;
    }

    .faq-icon-wrap {
        width: 38px;
        height: 38px;
        background: var(--cream);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-orange);
        font-size: 18px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        flex-shrink: 0;
        margin-left: 20px;
    }

    .faq-card.active {
        border-color: var(--primary-orange);
        box-shadow: 0 20px 40px rgba(239, 125, 50, 0.12);
    }

    .faq-card.active .faq-icon-wrap {
        transform: rotate(180deg);
        background: var(--primary-orange);
        color: #FFFFFF;
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        opacity: 0;
    }

    .faq-card.active .faq-answer {
        max-height: 300px;
        opacity: 1;
    }

    .faq-answer-inner {
        padding: 0 28px 25px;
    }

    .faq-answer p {
        font-family: 'Barlow', sans-serif !important;
        font-size: 1.15rem;
        color: #5D4037;
        line-height: 1.6;
        margin: 0;
    }

    @media (max-width: 968px) {
        .faq-premium-section {
            padding: 80px 0;
        }
        .faq-main-title {
            font-size: 3rem;
        }
        .faq-subtitle {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 768px) {
        .faq-premium-section {
            padding: 60px 0;
        }
        .faq-main-title {
            font-size: 2.4rem;
        }
        .faq-question h3 {
            font-size: 1.2rem;
        }
        .faq-question {
            padding: 18px 22px;
        }
        .faq-icon-wrap {
            width: 32px;
            height: 32px;
            font-size: 16px;
        }
        .faq-answer-inner {
            padding: 0 22px 20px;
        }
        .faq-answer p {
            font-size: 1rem;
        }
    }

    @media (max-width: 480px) {
        .faq-main-title {
            font-size: 2rem;
        }
        .faq-question h3 {
            font-size: 1.1rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const faqCards = document.querySelectorAll('.faq-card');
        
        faqCards.forEach(card => {
            card.addEventListener('click', () => {
                const isActive = card.classList.contains('active');
                
                // Close all other cards for a clean accordion experience
                faqCards.forEach(otherCard => {
                    otherCard.classList.remove('active');
                });
                
                // If the clicked card wasn't active, open it
                if (!isActive) {
                    card.classList.add('active');
                }
            });
        });
    });
</script>

<section id="apply" class="franchise-form-section">
    <div class="container franchise-form-container">

        <div class="form-header" data-aos="fade-up">
            <span class="badge-pill">Join Our Network</span>
            <h2 class="form-header-title">Start Your <span class="pop-out-text-sm">Journey</span></h2>
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

        <div class="form-layout-wrapper">
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
                            <input type="tel" id="phone" name="phone" placeholder="+63 962 558 5616" required
                                class="form-input">
                        </div>

                        <div class="input-group">
                            <label for="location" class="form-label">Preferred Location <span
                                    class="required">*</span></label>
                            <input type="text" id="location" name="location" placeholder="San Fernando, Pampanga"
                                required class="form-input">
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

            <!-- Contact Sidebar -->
            <aside class="contact-sidebar" data-aos="fade-left" data-aos-delay="300">
                <div class="sidebar-blob-bg"></div>
                <div class="sidebar-backplate"></div>

                <div class="contact-sidebar-card">
                    <img src="assets/img/mini-doughnut.png" alt="Danono's" class="sidebar-floating-donut"
                        onerror="this.style.display='none'">

                    <h3 class="pop-out-text-sm" style="font-size: 1.8rem; margin-bottom: 30px;">Direct Contact</h3>

                    <div class="contact-method-list">
                        <a href="tel:+639625585616" class="contact-method-card">
                            <div class="method-icon-wrap">
                                <i class="ph-fill ph-phone"></i>
                            </div>
                            <div class="method-info">
                                <span class="method-label">CALL OUT TO US</span>
                                <strong class="method-value">+63 962 558 5616</strong>
                            </div>
                        </a>

                        <a href="mailto:nonosdoughnuts@gmail.com" class="contact-method-card">
                            <div class="method-icon-wrap">
                                <i class="ph-fill ph-envelope"></i>
                            </div>
                            <div class="method-info">
                                <span class="method-label">DROP A MESSAGE</span>
                                <strong class="method-value"
                                    style="font-size: 14px; word-break: break-all;">nonosdoughnuts@gmail.com</strong>
                            </div>
                        </a>

                        <div class="contact-method-card no-hover">
                            <div class="method-icon-wrap">
                                <i class="ph-fill ph-map-pin"></i>
                            </div>
                            <div class="method-info">
                                <span class="method-label">OUR HEADQUARTERS</span>
                                <strong class="method-value">Angeles City, Pampanga</strong>
                            </div>
                        </div>
                    </div>

                    <div class="contact-socials-box">
                        <p>Join the Family Online</p>
                        <div class="sidebar-social-icons">
                            <a href="https://www.facebook.com/danonosdoughnuts" class="sidebar-social-link"
                                target="_blank" title="Facebook"><i class="ph-fill ph-facebook-logo"></i></a>
                            <a href="https://www.instagram.com/danonosdoughnuts" class="sidebar-social-link"
                                target="_blank" title="Instagram"><i class="ph-fill ph-instagram-logo"></i></a>
                            <a href="https://www.tiktok.com/@danonosdoughnuts" class="sidebar-social-link"
                                target="_blank" title="TikTok"><i class="ph-fill ph-tiktok-logo"></i></a>
                        </div>
                    </div>
                </div>
            </aside>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const franchiseForm = document.querySelector('form[action="admin/process_franchise.php"]');
        if (franchiseForm) {
            franchiseForm.addEventListener('submit', function () {
                if (typeof gtag === 'function') {
                    gtag('event', 'generate_lead', {
                        form_name: 'franchise_application'
                    });
                }
            });
        }
    });
</script>

<?php include 'includes/footer.php'; ?>