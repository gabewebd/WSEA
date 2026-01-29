<?php
$pageTitle = "Franchise - Danono's";
$metaDesc = "Join the Danono's family! Learn about franchise opportunities and how to bring our delicious doughnuts to your community.";
?>
<?php include 'includes/header.php'; ?>

<!-- Hero Section for Franchise -->
<section class="hero" style="background: linear-gradient(135deg, var(--cream) 0%, #FFF8F0 100%);">
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
<section id="learn-more" style="background: white; padding: 100px 20px;">
    <div class="container" style="max-width: 1250px; margin: 0 auto;">
        <div style="display: grid; grid-template-columns: 1.3fr 1fr; gap: 70px; align-items: center;">
            <!-- Image Side -->
            <div>
                <img src="assets/img/perfect-spot.jpg" alt="Perfect Spot for your Franchise"
                    style="width: 100%; border-radius: 20px; box-shadow: 0 4px 12px rgba(67, 20, 7, 0.08);">
            </div>

            <!-- Content Side -->
            <div>
                <span class="section-label">Business Opportunity</span>
                <h2 style="margin: 12px 0 20px; font-size: 42px; white-space: nowrap;">Why Choose <span
                        class="highlight-orange">Danono's?</span></h2>
                <p style="color: #666; font-size: 16px; line-height: 1.7; margin-bottom: 35px;">
                    Danono's isn't just a doughnut shop; it's a destination for happiness. Our proven business model,
                    combined with high-quality ingredients and a strong brand identity, makes us the perfect partner for
                    aspiring entrepreneurs.
                </p>

                <!-- Benefits Grid -->
                <div style="display: grid; gap: 25px;">
                    <div style="display: flex; gap: 15px; align-items: start;">
                        <div
                            style="background: #FFF8F0; width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="ph-fill ph-check-circle"
                                style="color: var(--primary-orange); font-size: 26px;"></i>
                        </div>
                        <div>
                            <h4 style="margin: 0 0 6px; font-size: 17px; color: var(--dark-brown);">Proven Business
                                Model</h4>
                            <p style="margin: 0; color: #666; font-size: 14px; line-height: 1.6;">Operational systems
                                tested and perfected across multiple locations.</p>
                        </div>
                    </div>

                    <div style="display: flex; gap: 15px; align-items: start;">
                        <div
                            style="background: #FFF8F0; width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="ph-fill ph-star" style="color: var(--primary-orange); font-size: 26px;"></i>
                        </div>
                        <div>
                            <h4 style="margin: 0 0 6px; font-size: 17px; color: var(--dark-brown);">Premium Quality
                                Products</h4>
                            <p style="margin: 0; color: #666; font-size: 14px; line-height: 1.6;">Only the finest
                                ingredients for our signature brioche doughnuts and brownies.</p>
                        </div>
                    </div>

                    <div style="display: flex; gap: 15px; align-items: start;">
                        <div
                            style="background: #FFF8F0; width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="ph-fill ph-chart-line-up"
                                style="color: var(--primary-orange); font-size: 26px;"></i>
                        </div>
                        <div>
                            <h4 style="margin: 0 0 6px; font-size: 17px; color: var(--dark-brown);">Growing Brand
                                Recognition</h4>
                            <p style="margin: 0; color: #666; font-size: 14px; line-height: 1.6;">Leverage our
                                established reputation and loyal customer base in Pampanga.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Franchise Form -->
<section id="apply" style="background: #FFFDF9; padding: 100px 20px;">
    <div class="container" style="max-width: 800px; margin: 0 auto;">
        <!-- Section Header -->
        <div style="text-align: center; margin-bottom: 50px;">
            <span class="section-label" style="display: inline-block;">Join Our Network</span>
            <h2 style="margin: 12px 0 15px; font-size: 42px;">Start Your <span class="highlight-orange">Journey</span>
            </h2>
            <p style="color: #666; font-size: 16px; max-width: 550px; margin: 0 auto;">
                Ready to take the next step? Fill out the form below and our franchise team will get in touch within 2
                business days.
            </p>
        </div>

        <!-- Success/Error Messages -->
        <?php if (isset($_SESSION['franchise_success'])): ?>
            <div
                style="background: #d4edda; border: 2px solid #28a745; color: #155724; padding: 16px 20px; border-radius: 12px; margin-bottom: 30px; display: flex; align-items: center; gap: 12px;">
                <i class="ph-fill ph-check-circle" style="font-size: 24px;"></i>
                <span><?php echo $_SESSION['franchise_success'];
                unset($_SESSION['franchise_success']); ?></span>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['franchise_error'])): ?>
            <div
                style="background: #f8d7da; border: 2px solid #dc3545; color: #721c24; padding: 16px 20px; border-radius: 12px; margin-bottom: 30px; display: flex; align-items: center; gap: 12px;">
                <i class="ph-fill ph-warning-circle" style="font-size: 24px;"></i>
                <span><?php echo $_SESSION['franchise_error'];
                unset($_SESSION['franchise_error']); ?></span>
            </div>
        <?php endif; ?>

        <!-- Form Card -->
        <div style="background: white; padding: 50px 55px; border-radius: 12px; border: 1px solid #E8D5C4;">
            <form action="admin/process_franchise.php" method="POST">
                <!-- 2-Column Grid for Name and Email -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px;">
                    <div>
                        <label for="name" style="display: block; font-weight: 600; margin-bottom: 10px; color: #431407; font-size: 14px; letter-spacing: 0.3px;">
                            Full Name <span style="color: #EF7D32;">*</span>
                        </label>
                        <input type="text" id="name" name="name" placeholder="Juan Dela Cruz" required
                               style="width: 100%; padding: 13px 16px; border: 1.5px solid #DBC4B0; border-radius: 8px; font-size: 15px; transition: all 0.2s; font-family: 'Barlow', sans-serif; background: #FEFDFB;"
                               onfocus="this.style.borderColor='#EF7D32'; this.style.background='white'"
                               onblur="this.style.borderColor='#DBC4B0'; this.style.background='#FEFDFB'">
                    </div>
                    
                    <div>
                        <label for="email" style="display: block; font-weight: 600; margin-bottom: 10px; color: #431407; font-size: 14px; letter-spacing: 0.3px;">
                            Email Address <span style="color: #EF7D32;">*</span>
                        </label>
                        <input type="email" id="email" name="email" placeholder="juan@example.com" required
                               style="width: 100%; padding: 13px 16px; border: 1.5px solid #DBC4B0; border-radius: 8px; font-size: 15px; transition: all 0.2s; font-family: 'Barlow', sans-serif; background: #FEFDFB;"
                               onfocus="this.style.borderColor='#EF7D32'; this.style.background='white'"
                               onblur="this.style.borderColor='#DBC4B0'; this.style.background='#FEFDFB'">
                    </div>
                </div>

                <!-- 2-Column Grid for Phone and Location -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px;">
                    <div>
                        <label for="phone" style="display: block; font-weight: 600; margin-bottom: 10px; color: #431407; font-size: 14px; letter-spacing: 0.3px;">
                            Phone Number <span style="color: #EF7D32;">*</span>
                        </label>
                        <input type="tel" id="phone" name="phone" placeholder="+63 912 345 6789" required
                               style="width: 100%; padding: 13px 16px; border: 1.5px solid #DBC4B0; border-radius: 8px; font-size: 15px; transition: all 0.2s; font-family: 'Barlow', sans-serif; background: #FEFDFB;"
                               onfocus="this.style.borderColor='#EF7D32'; this.style.background='white'"
                               onblur="this.style.borderColor='#DBC4B0'; this.style.background='#FEFDFB'">
                    </div>

                    <div>
                        <label for="location" style="display: block; font-weight: 600; margin-bottom: 10px; color: #431407; font-size: 14px; letter-spacing: 0.3px;">
                            Preferred Location <span style="color: #EF7D32;">*</span>
                        </label>
                        <input type="text" id="location" name="location" placeholder="San Fernando, Pampanga" required
                               style="width: 100%; padding: 13px 16px; border: 1.5px solid #DBC4B0; border-radius: 8px; font-size: 15px; transition: all 0.2s; font-family: 'Barlow', sans-serif; background: #FEFDFB;"
                               onfocus="this.style.borderColor='#EF7D32'; this.style.background='white'"
                               onblur="this.style.borderColor='#DBC4B0'; this.style.background='#FEFDFB'">
                    </div>
                </div>

                <!-- Full Width Message Field -->
                <div style="margin-bottom: 30px;">
                    <label for="message" style="display: block; font-weight: 600; margin-bottom: 10px; color: #431407; font-size: 14px; letter-spacing: 0.3px;">
                        Tell Us About Yourself  <span style="color: #888; font-weight: 400;">(Optional)</span>
                    </label>
                    <textarea id="message" name="message" rows="5" placeholder="Share your business experience, goals, and why you're interested in partnering with Danono's..."
                              style="width: 100%; padding: 13px 16px; border: 1.5px solid #DBC4B0; border-radius: 8px; font-size: 15px; transition: all 0.2s; font-family: 'Barlow', sans-serif; resize: vertical; background: #FEFDFB; line-height: 1.6;"
                              onfocus="this.style.borderColor='#EF7D32'; this.style.background='white'"
                              onblur="this.style.borderColor='#DBC4B0'; this.style.background='#FEFDFB'"></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                        style="width: 100%; padding: 16px; font-size: 16px; font-weight: 600; background: #EF7D32; border: none; border-radius: 8px; color: white; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 10px; transition: all 0.2s; letter-spacing: 0.5px;"
                        onmouseover="this.style.background='#D66A22'"
                        onmouseout="this.style.background='#EF7D32'">
                    <i class="ph ph-paper-plane-right"></i>
                    Submit Application
                </button>

                <!-- Privacy Notice -->
                <p style="text-align: center; margin-top: 24px; font-size: 13px; color: #999; line-height: 1.5;">
                    <i class="ph ph-lock" style="margin-right: 5px;"></i>
                    Your information is secure. We'll only use it to contact you about franchise opportunities.
                </p>
            </form>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>