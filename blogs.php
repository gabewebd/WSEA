<?php
$pageTitle = "Blogs - Danono's Doughnuts and Brownies";
$metaDesc = "Read the latest news, recipes, and stories from Danono's Doughnuts & Brownies.";
$customCss = "blogs.css";
include 'includes/header.php';
include 'includes/db_connect.php';
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- Blog Hero Section -->
<section class="blog-hero">
    <div class="floating-shape shape-1" data-speed="4"></div>
    <div class="floating-shape shape-2" data-speed="-2"></div>

    <div class="blog-hero-content">
        <span class="section-subtitle" data-aos="fade-down">FROM OUR KITCHEN</span>
        <h1 data-aos="fade-up" data-aos-delay="100">Sweet Stories &<br>Latest <span class="pop-out-text">NEWS</span>
        </h1>
        <p class="hero-description" data-aos="fade-up" data-aos-delay="200">Stay updated with the sweetest news, new
            flavor launches, and behind-the-scenes stories from the Danono's kitchen.</p>
    </div>
    <div class="blog-hero-bg" data-speed="1">
        <img src="assets/img/danonos-craving.jpg" alt="Danono's Blog Background"
            onerror="this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?w=1200&h=600&fit=crop'">
    </div>
</section>

<div class="blog-container">

    <!-- Blog Grid -->
    <div class="blog-grid">
        <?php
        $sql = "SELECT * FROM posts WHERE status = 'published' ORDER BY created_at DESC";
        $result = $conn->query($sql);

        $blogCount = 0;

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $blogCount++;
                $id = $row['id'];
                $title = htmlspecialchars($row["title"]);

                // Clean content for excerpt
                $clean_content = $row['content'];
                $clean_content = str_replace('&nbsp;', ' ', $clean_content);
                $clean_content = strip_tags($clean_content);
                $clean_content = html_entity_decode($clean_content);
                $excerpt = substr($clean_content, 0, 120) . '...';

                $date = date('M d, Y', strtotime($row["created_at"]));
                $image = !empty($row["featured_image"]) ? "uploads/" . $row["featured_image"] : "https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=280&fit=crop";
                $slug = isset($row["slug"]) ? $row["slug"] : $id;
                ?>
                <div class="blog-card">
                    <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"
                        onerror="this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=280&fit=crop'">
                    <div class="blog-card-content">
                        <p class="blog-card-meta">
                            <i class="fas fa-calendar-alt"></i> <?php echo $date; ?>
                        </p>
                        <h3><?php echo $title; ?></h3>
                        <p><?php echo $excerpt; ?></p>
                        <a href="/blog/<?php echo urlencode($slug); ?>" class="btn-read-more" aria-label="Read the full article: <?php echo $title; ?>">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <?php
            }
        }

        if ($blogCount === 0) {
            ?>
            <div class="no-posts">
                <h3>No blogs created yet</h3>
                <p>Check back soon for the latest news and stories from our kitchen</p>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Initialize AOS
    AOS.init({
        once: true,
        offset: 100,
        duration: 800,
        easing: 'ease-out-cubic',
    });

    // Mouse Parallax Logic for floating shapes
    document.addEventListener("mousemove", parallax);
    function parallax(e) {
        document.querySelectorAll(".floating-shape").forEach(function (move) {
            var moving_value = move.getAttribute("data-speed");
            var x = (e.clientX * moving_value) / 250;
            var y = (e.clientY * moving_value) / 250;
            move.style.transform = "translateX(" + x + "px) translateY(" + y + "px)";
        });
    }

    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.15,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('in-view')) {
                entry.target.classList.add('in-view');
                // Optional: stop observing after animation
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Initialize animations on page load
    document.addEventListener('DOMContentLoaded', () => {
        const cards = document.querySelectorAll('.blog-card');
        cards.forEach(card => {
            observer.observe(card);
        });

        // Stagger entrance animations
        cards.forEach((card, index) => {
            card.style.setProperty('--card-index', index);
        });
    });

    // Enhanced hover effect with perspective
    document.addEventListener('mousemove', (e) => {
        const cards = document.querySelectorAll('.blog-card');

        cards.forEach(card => {
            const rect = card.getBoundingClientRect();
            const cardCenterX = rect.left + rect.width / 2;
            const cardCenterY = rect.top + rect.height / 2;

            const mouseX = e.clientX;
            const mouseY = e.clientY;

            const distX = (mouseX - cardCenterX) * 0.015;
            const distY = (mouseY - cardCenterY) * 0.015;

            // Only apply effect if mouse is relatively close
            if (Math.abs(distX) < 8 && Math.abs(distY) < 8) {
                card.style.transform = `perspective(1200px) rotateX(${distY}deg) rotateY(${distX}deg)`;
            }
        });
    });

    // Reset perspective on mouse leave
    document.addEventListener('mouseleave', () => {
        document.querySelectorAll('.blog-card').forEach(card => {
            card.style.transform = '';
        });
    });

    // Link smooth transitions
    document.querySelectorAll('.btn-read-more').forEach(btn => {
        btn.addEventListener('mouseenter', function () {
            this.style.letterSpacing = '1.5px';
        });
        btn.addEventListener('mouseleave', function () {
            this.style.letterSpacing = '1px';
        });
    });
</script>

<?php include 'includes/footer.php'; ?>
