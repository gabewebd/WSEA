<?php
$pageTitle = "About Us - Danono's";
$customCss = "about.css";
$metaDesc = "Learn about Danono's story - from a small home kitchen in 2019 to Angeles City's favorite doughnut destination.";
?>
<?php include 'includes/header.php'; ?>

<section class="about-hero">
    <div class="about-hero-content">
        <span class="section-subtitle">ESTABLISHED 2019</span>
        <h1>Spreading Happiness,<br>One <span class="highlight-orange">Doughnut</span> at a Time.</h1>
    </div>
    <div class="about-hero-bg">
        <img src="uploads/danonos-login-bg.jpg" alt="Danonos Bakery Background"
             onerror="this.src='assets/img/danonos-login-bg.jpg'"> 
    </div>
</section>

<section class="story-section">
    <div class="story-content">
        <div class="story-image">
            <img src="uploads/about-story.jpg" alt="Danono's humble beginnings"
                onerror="this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=500&fit=crop'">
            <div class="story-badge">
                <span class="story-badge-label">SINCE</span>
                <span class="story-badge-year">2019</span>
            </div>
        </div>

        <div class="story-text">
            <span class="section-label">OUR JOURNEY</span>
            <h2>From Nono's to <span class="highlight-orange">Danono's</span></h2>
            <p>What started as a passionate home kitchen project has blossomed into Angeles City’s favorite destination for premium treats. We didn't just want to make doughnuts; we wanted to elevate them.</p>
            <p>Using our signature brioche dough recipe—rich, fluffy, and buttery—we spent months perfecting the balance of texture and flavor. Today, Danono's is more than just a bakery; it's a place where friends gather, cravings are satisfied, and every bite tells a story of dedication.</p>
            
            <div class="story-signature">
                <p>The Danono's Team</p>
            </div>
        </div>
    </div>
</section>

<section class="values-section">
    <div class="section-header center-text">
        <span class="section-label">WHY CHOOSE US</span>
        <h2>The Danono's <span class="highlight-orange">Difference</span></h2>
    </div>
    
    <div class="values-grid">
        <div class="value-card">
            <div class="value-icon">
                <i class="ph ph-wheat"></i>
            </div>
            <h3>Signature Brioche</h3>
            <p>We don't use shortcuts. Our dough is fermented for 24 hours to achieve that distinctively light, airy, and buttery brioche texture.</p>
        </div>

        <div class="value-icon-card">
            <div class="value-icon">
                <i class="ph ph-heart"></i> 
            </div>
            <h3>Made Fresh Daily</h3>
            <p>No leftovers here. Our bakers start at 4 AM every single morning to ensure your box is fresh, warm, and perfect.</p>
        </div>

        <div class="value-card">
            <div class="value-icon">
                <i class="ph ph-star"></i>
            </div>
            <h3>Premium Ingredients</h3>
            <p>From Belgian chocolates to real fruit preserves, we source only the finest ingredients to top our creations.</p>
        </div>
    </div>
</section>

<section class="gallery-section">
    <div class="gallery-text">
        <h2>Sweet <span class="highlight-orange">Moments</span></h2>
        <p>From our kitchen to your hands. See the treats that made us Angeles City's favorite.</p>
    </div>
    <div class="gallery-grid">
        <div class="gallery-item large">
            <img src="uploads/danonos-treats.jpg" alt="Danonos Box of Treats"
                 onerror="this.src='https://images.unsplash.com/photo-1551024506-0bccd828d307?w=600&h=800&fit=crop'">
        </div>
        <div class="gallery-item">
            <img src="uploads/danonos-donuts.jpg" alt="Fresh Doughnuts"
                 onerror="this.src='https://images.unsplash.com/photo-1631397834789-32263f357564?w=400&h=400&fit=crop'">
        </div>
        <div class="gallery-item">
            <img src="uploads/danonos-iced-spanish-latte.jpg" alt="Spanish Latte"
                 onerror="this.src='https://images.unsplash.com/photo-1461023058943-07fcbe16d735?w=400&h=400&fit=crop'">
        </div>
    </div>
</section>

<section class="about-cta">
    <div class="cta-content">
        <h2>Taste the Love Today</h2>
        <p>Ready to experience the best brioche doughnuts in Pampanga?</p>
        <div class="cta-buttons">
            <a href="menu.php" class="btn btn-orange">View Menu</a>
            <a href="locations.php" class="btn btn-outline-dark">Find a Branch</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>