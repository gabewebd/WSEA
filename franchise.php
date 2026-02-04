<?php
$pageTitle = "Franchise - Danono's";
$metaDesc = "Join the Danono's family! Learn about franchise opportunities and how to bring our delicious doughnuts to your community.";
$customCss = "franchise.css";
?>
<?php include 'includes/header.php'; ?>

<!-- Hero Section for Franchise -->
<section class="franchise-hero">
    <div class="hero-text">
        <p class="tagline tagline-orange">Partner With Us</p>
        <h1>Be Part of Our <span>Family</span></h1>
        <p>Join the growing Danono's franchise network and bring the sweetest treats to your community. We provide the
            recipe for success — you bring the passion!</p>
        <div class="hero-buttons">
            <a href="#apply" class="btn btn-orange">
                <i class="ph ph-handshake"></i> Apply Now
            </a>
            <a href="#learn-more" class="btn btn-outline">
                <i class="ph ph-info"></i> Learn More
            </a>
        </div>
    </div>
    <div class="hero-image">
        <img src="assets/img/franchise.jpg" alt="Danono's Franchise Opportunity">
    </div>
</section>

<!-- Why Franchise Section -->
<section id="learn-more" class="why-franchise-section">
    <div class="container why-franchise-container">
        <div class="why-franchise-grid">
            <!-- Image Side -->
            <div>
                <img src="assets/img/perfect-spot.jpg" alt="Perfect Spot for your Franchise"
                    class="why-franchise-image">
            </div>

            <!-- Content Side -->
            <div>
                <span class="section-label">Business Opportunity</span>
                <h2 class="why-franchise-title">Why Choose <span class="highlight-orange">Danono's?</span></h2>
                <p class="why-franchise-description">
                    Danono's isn't just a doughnut shop; it's a destination for happiness. Our proven business model,
                    combined with high-quality ingredients and a strong brand identity, makes us the perfect partner for
                    aspiring entrepreneurs.
                </p>

                <!-- Benefits Grid -->
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <div class="benefit-icon-box">
                            <i class="ph-fill ph-check-circle benefit-icon"></i>
                        </div>
                        <div>
                            <h4 class="benefit-title">Proven Business Model</h4>
                            <p class="benefit-desc">Operational systems tested and perfected across multiple locations.
                            </p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon-box">
                            <i class="ph-fill ph-star benefit-icon"></i>
                        </div>
                        <div>
                            <h4 class="benefit-title">Premium Quality Products</h4>
                            <p class="benefit-desc">Only the finest ingredients for our signature brioche doughnuts and
                                brownies.</p>
                        </div>
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon-box">
                            <i class="ph-fill ph-chart-line-up benefit-icon"></i>
                        </div>
                        <div>
                            <h4 class="benefit-title">Growing Brand Recognition</h4>
                            <p class="benefit-desc">Leverage our established reputation and loyal customer base in
                                Pampanga.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Franchise Form -->
<section id="apply" class="franchise-form-section">
    <div class="container franchise-form-container">
        <!-- Section Header -->
        <div class="form-header">
            <span class="section-label form-header-label">Join Our Network</span>
            <h2 class="form-header-title">Start Your <span class="highlight-orange">Journey</span></h2>
            <p class="form-header-desc">
                Ready to take the next step? Fill out the form below and our franchise team will get in touch within 2
                business days.
            </p>
        </div>

        <!-- Success/Error Messages -->
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

        <!-- Form Card -->
        <div class="form-card-box">
            <form action="admin/process_franchise.php" method="POST">
                <!-- 2-Column Grid for Name and Email -->
                <div class="form-grid-2">
                    <div>
                        <label for="name" class="form-label">
                            Full Name <span class="form-required">*</span>
                        </label>
                        <input type="text" id="name" name="name" placeholder="Juan Dela Cruz" required
                            class="form-input" onfocus="this.style.borderColor='#EF7D32'; this.style.background='white'"
                            onblur="this.style.borderColor='#DBC4B0'; this.style.background='#FEFDFB'">
                    </div>

                    <div>
                        <label for="email" class="form-label">
                            Email Address <span class="form-required">*</span>
                        </label>
                        <input type="email" id="email" name="email" placeholder="juan@example.com" required
                            class="form-input" onfocus="this.style.borderColor='#EF7D32'; this.style.background='white'"
                            onblur="this.style.borderColor='#DBC4B0'; this.style.background='#FEFDFB'">
                    </div>
                </div>

                <!-- 2-Column Grid for Phone and Location -->
                <div class="form-grid-2">
                    <div>
                        <label for="phone" class="form-label">
                            Phone Number <span class="form-required">*</span>
                        </label>
                        <input type="tel" id="phone" name="phone" placeholder="+63 912 345 6789" required
                            class="form-input" onfocus="this.style.borderColor='#EF7D32'; this.style.background='white'"
                            onblur="this.style.borderColor='#DBC4B0'; this.style.background='#FEFDFB'">
                    </div>

                    <div>
                        <label for="location" class="form-label">
                            Preferred Location <span class="form-required">*</span>
                        </label>
                        <input type="text" id="location" name="location" placeholder="San Fernando, Pampanga" required
                            class="form-input" onfocus="this.style.borderColor='#EF7D32'; this.style.background='white'"
                            onblur="this.style.borderColor='#DBC4B0'; this.style.background='#FEFDFB'">
                    </div>
                </div>

                <!-- Full Width Message Field -->
                <div class="form-field-group">
                    <label for="message" class="form-label">
                        Tell Us About Yourself <span class="form-optional">(Optional)</span>
                    </label>
                    <textarea id="message" name="message" rows="5"
                        placeholder="Share your business experience, goals, and why you're interested in partnering with Danono's..."
                        class="form-textarea" onfocus="this.style.borderColor='#EF7D32'; this.style.background='white'"
                        onblur="this.style.borderColor='#DBC4B0'; this.style.background='#FEFDFB'"></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="form-submit-btn">
                    <i class="ph ph-paper-plane-right"></i>
                    Submit Application
                </button>

                <!-- Privacy Notice -->
                <p class="privacy-notice">
                    <i class="ph ph-lock privacy-icon"></i>
                    Your information is secure. We'll only use it to contact you about franchise opportunities.
                </p>
            </form>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
</body>

</html>