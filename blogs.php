<?php
$pageTitle = "Blogs - Danono's";
$metaDesc = "Read the latest news, recipes, and stories from Danono's Doughnuts & Brownies.";
$customCss = "blogs.css";
include 'includes/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $metaDesc; ?>">
    <title><?php echo $pageTitle; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #D4945E;
            --primary-dark: #A67346;
            --primary-light: #E8B88D;
            --accent: #8B4513;
            --cream: #FFF9F3;
            --dark: #2C1810;
            --text: #3D2817;
            --border: #E8D4C0;
            --success: #C67C4E;
            --shadow-sm: 0 4px 12px rgba(76, 34, 14, 0.08);
            --shadow-md: 0 12px 32px rgba(76, 34, 14, 0.12);
            --shadow-lg: 0 20px 48px rgba(76, 34, 14, 0.15);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #FFF9F3 0%, #FFF3E6 100%);
            color: var(--text);
            line-height: 1.6;
            overflow-x: hidden;
        }

        html {
            scroll-behavior: smooth;
        }

        /* ===== HEADER SECTION ===== */
        .header-section {
            text-align: center;
            padding: 100px 20px 60px;
            position: relative;
            overflow: hidden;
        }

        .header-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(212, 148, 94, 0.12) 0%, transparent 70%);
            border-radius: 50%;
            animation: float 10s ease-in-out infinite;
            pointer-events: none;
        }

        .header-section::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -5%;
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, rgba(212, 148, 94, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: float 12s ease-in-out infinite reverse;
            pointer-events: none;
        }

        .header-content {
            position: relative;
            z-index: 1;
            max-width: 900px;
            margin: 0 auto;
        }

        .section-label {
            display: inline-block;
            font-family: 'Raleway', sans-serif;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 2.5px;
            color: var(--primary);
            text-transform: uppercase;
            margin-bottom: 15px;
            animation: slideInDown 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.1s both;
        }

        .page-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 72px;
            font-weight: 700;
            color: var(--dark);
            line-height: 1.1;
            margin-bottom: 20px;
            animation: slideInUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s both;
        }

        .page-title span {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: inline-block;
        }

        .page-description {
            font-size: 16px;
            color: #666;
            font-weight: 400;
            margin-top: 20px;
            line-height: 1.8;
            animation: fadeIn 0.8s ease 0.4s both;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        /* ===== CONTAINER ===== */
        .blog-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px 100px;
        }

        /* ===== BLOG GRID ===== */
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 36px;
            margin-top: 60px;
        }

        @media (min-width: 768px) {
            .blog-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 40px;
            }
        }

        @media (min-width: 1024px) {
            .blog-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 36px;
            }
        }

        /* ===== BLOG CARD ===== */
        .blog-card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            border: 2px solid transparent;
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
            opacity: 0;
            animation: cardLoad 0.7s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
            overflow: visible;
        }

        @keyframes cardLoad {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .blog-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(212, 148, 94, 0.15) 0%, transparent 100%);
            pointer-events: none;
            z-index: 5;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .blog-card:hover::before {
            opacity: 1;
        }

        .blog-card:hover {
            transform: translateY(-16px) scale(1.02);
            box-shadow: var(--shadow-lg);
            border-color: var(--primary-light);
        }

        /* Image Container */
        .blog-card img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            display: block;
            transition: transform 0.7s cubic-bezier(0.34, 1.56, 0.64, 1), filter 0.5s ease;
            filter: brightness(1.05) contrast(1.05);
        }

        .blog-card:hover img {
            transform: scale(1.15) rotate(-3deg);
            filter: brightness(1.2) contrast(1.15) saturate(1.15);
        }

        /* Content */
        .blog-card-content {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            padding: 32px 28px;
            position: relative;
            z-index: 2;
        }

        .blog-card-meta {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            font-weight: 600;
            color: var(--primary);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
            transition: all 0.3s ease;
        }

        .blog-card:hover .blog-card-meta {
            color: var(--primary-dark);
            transform: translateX(4px);
        }

        .blog-card-meta i {
            font-size: 14px;
        }

        .blog-card h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 26px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 14px;
            line-height: 1.3;
            transition: color 0.3s ease;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .blog-card:hover h3 {
            color: var(--primary);
        }

        .blog-card p {
            font-size: 14px;
            color: #777;
            line-height: 1.7;
            margin-bottom: 20px;
            flex-grow: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            font-weight: 400;
        }

        /* Read More Button */
        .btn-read-more {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--primary);
            text-decoration: none;
            font-weight: 700;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 12px 16px;
            border-radius: 50px;
            background: linear-gradient(135deg, rgba(212, 148, 94, 0.1) 0%, rgba(232, 184, 141, 0.05) 100%);
            border: 2px solid transparent;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            overflow: hidden;
            width: fit-content;
        }

        .btn-read-more::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            z-index: -1;
            transition: left 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .btn-read-more:hover {
            color: white;
            transform: translateX(6px);
            border-color: var(--primary);
            box-shadow: 0 8px 20px rgba(212, 148, 94, 0.3);
        }

        .btn-read-more:hover::before {
            left: 0;
        }

        .btn-read-more i {
            font-size: 14px;
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .btn-read-more:hover i {
            transform: translateX(3px);
        }

        /* ===== NO POSTS STATE ===== */
        .no-posts {
            grid-column: 1 / -1;
            text-align: center;
            padding: 100px 40px;
            opacity: 0;
            animation: fadeIn 0.8s ease 0.3s both;
        }

        .no-posts::before {
            content: '📖';
            display: block;
            font-size: 80px;
            margin-bottom: 20px;
            opacity: 0.3;
        }

        .no-posts h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 32px;
            color: var(--dark);
            font-weight: 600;
            margin-bottom: 10px;
        }

        .no-posts p {
            font-size: 16px;
            color: #999;
            font-weight: 400;
        }

        /* ===== ANIMATIONS ===== */
        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) translateX(0px);
            }
            50% {
                transform: translateY(30px) translateX(15px);
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -1000px 0;
            }
            100% {
                background-position: 1000px 0;
            }
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .page-title {
                font-size: 52px;
            }

            .blog-grid {
                grid-template-columns: 1fr;
                gap: 28px;
            }

            .blog-card-content {
                padding: 24px 20px;
            }

            .blog-card h3 {
                font-size: 22px;
            }

            .page-description {
                font-size: 15px;
            }
        }

        @media (max-width: 480px) {
            .header-section {
                padding: 70px 20px 50px;
            }

            .page-title {
                font-size: 40px;
            }

            .blog-card img {
                height: 240px;
            }

            .blog-card h3 {
                font-size: 20px;
            }

            .blog-card-content {
                padding: 20px 18px;
            }

            .page-description {
                font-size: 14px;
            }
        }

        /* ===== SCROLL ANIMATIONS ===== */
        .blog-card {
            opacity: 0;
        }

        .blog-card.in-view {
            animation: cardLoad 0.7s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        }

        /* ===== HOVER EFFECTS ===== */
        button, a {
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        /* Smooth transitions */
        * {
            transition-property: background-color, border-color, color, fill, stroke;
            transition-timing-function: cubic-bezier(0.34, 1.56, 0.64, 1);
            transition-duration: 0.3s;
        }

        img {
            transition-property: transform, filter;
            transition-duration: 0.7s;
        }

        /* ===== STAGGER ANIMATION DELAYS ===== */
        .blog-card:nth-child(1) { animation-delay: 0.05s; }
        .blog-card:nth-child(2) { animation-delay: 0.1s; }
        .blog-card:nth-child(3) { animation-delay: 0.15s; }
        .blog-card:nth-child(4) { animation-delay: 0.2s; }
        .blog-card:nth-child(5) { animation-delay: 0.25s; }
        .blog-card:nth-child(6) { animation-delay: 0.3s; }
        .blog-card:nth-child(7) { animation-delay: 0.35s; }
        .blog-card:nth-child(8) { animation-delay: 0.4s; }
        .blog-card:nth-child(9) { animation-delay: 0.45s; }

        /* ===== DECORATIVE ACCENTS ===== */
        .blog-card {
            position: relative;
        }

        .blog-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--primary-light) 100%);
            transition: width 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            z-index: 10;
        }

        .blog-card:hover::after {
            width: 100%;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="blog-container">
        <!-- Page Header -->
        <div class="header-section">
            <div class="header-content">
                <span class="section-label">📝 From Our Kitchen</span>
                <h1 class="page-title">Latest <span>News</span></h1>
                <p class="page-description">
                    Stay updated with the sweetest news, new flavor launches, and behind-the-scenes stories from the Danono's kitchen. Discover the art and passion behind every treat we create.
                </p>
            </div>
        </div>

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
                            <a href="single-blog.php?slug=<?php echo urlencode($slug); ?>" class="btn-read-more">
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

    <script>
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
            btn.addEventListener('mouseenter', function() {
                this.style.letterSpacing = '1.5px';
            });
            btn.addEventListener('mouseleave', function() {
                this.style.letterSpacing = '1px';
            });
        });
    </script>

    <?php include 'includes/footer.php'; ?>
</body>
</html>