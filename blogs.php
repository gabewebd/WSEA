<?php
$pageTitle = "Blogs - Danono's Doughnuts and Brownies";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/blogs.css">
    
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
            --primary-orange: #EF7D32;
            --accent: #8B4513;
            --cream: #FFF9F3;
            --dark: #2C1810;
            --dark-brown: #431407;
            --text: #3D2817;
            --border: #E8D4C0;
            --gold: #FFC107;
            --success: #C67C4E;
            --shadow-sm: 0 4px 12px rgba(76, 34, 14, 0.08);
            --shadow-md: 0 12px 32px rgba(76, 34, 14, 0.12);
            --shadow-lg: 0 20px 48px rgba(76, 34, 14, 0.15);
        }

        body {
            background: linear-gradient(135deg, #FFF9F3 0%, #FFF3E6 100%);
            color: var(--text);
            line-height: 1.6;
            overflow-x: hidden;
        }

        html {
            scroll-behavior: smooth;
        }

        /* ===== BLOG HERO SECTION ===== */
        .blog-hero {
            position: relative;
            height: 450px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background-color: var(--dark-brown);
        }

        .blog-hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            opacity: 0.4;
            transition: transform 0.1s linear;
        }

        .blog-hero-bg img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Floating Shapes */
        .floating-shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            z-index: 2;
            opacity: 0.6;
            transition: transform 0.1s linear;
            pointer-events: none;
        }

        .shape-1 {
            top: -50px;
            left: -50px;
            width: 300px;
            height: 300px;
            background: #EF7D32;
        }

        .shape-2 {
            bottom: -50px;
            right: 10%;
            width: 250px;
            height: 250px;
            background: #FFC107;
        }

        .blog-hero-content {
            position: relative;
            z-index: 3;
            text-align: center;
            color: white;
            padding: 0 20px;
            max-width: 800px;
        }

        .blog-hero-content h1 {
            font-size: 56px;
            line-height: 1.1;
            font-weight: 700;
        }

        .blog-hero-content .section-subtitle {
            display: block;
            font-family: 'Barlow', sans-serif;
            letter-spacing: 4px;
            font-size: 14px;
            margin-bottom: 15px;
            opacity: 0.9;
            font-weight: 700;
        }

        .blog-hero-content .hero-description {
            font-size: 16px;
            opacity: 0.9;
            margin-top: 20px;
            line-height: 1.7;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Text Effects */
        .pop-out-text {
            font-weight: 900;
            text-transform: uppercase;
            background: linear-gradient(to right, #EF7D32 0%, #FFC107 50%, #EF7D32 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shine 4s linear infinite;
        }

        @keyframes shine {
            to {
                background-position: 200% center;
            }
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
            background: linear-gradient(135deg, var(--primary-orange) 0%, var(--gold) 100%);
            z-index: -1;
            transition: left 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .btn-read-more:hover {
            color: white;
            transform: translateX(6px);
            border-color: var(--primary-orange);
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

            0%,
            100% {
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
        @media (max-width: 1024px) {
            .blog-hero-content h1 {
                font-size: 36px;
            }
        }

        @media (max-width: 768px) {
            .blog-hero {
                height: 380px;
            }

            .blog-hero-content h1 {
                font-size: 32px;
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

            .blog-hero-content .hero-description {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .blog-hero {
                height: 350px;
            }

            .blog-hero-content h1 {
                font-size: 28px;
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
        }

        /* ===== SCROLL ANIMATIONS ===== */
        .blog-card {
            opacity: 0;
        }

        .blog-card.in-view {
            animation: cardLoad 0.7s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        }

        /* ===== HOVER EFFECTS ===== */
        button,
        a {
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
        .blog-card:nth-child(1) {
            animation-delay: 0.05s;
        }

        .blog-card:nth-child(2) {
            animation-delay: 0.1s;
        }

        .blog-card:nth-child(3) {
            animation-delay: 0.15s;
        }

        .blog-card:nth-child(4) {
            animation-delay: 0.2s;
        }

        .blog-card:nth-child(5) {
            animation-delay: 0.25s;
        }

        .blog-card:nth-child(6) {
            animation-delay: 0.3s;
        }

        .blog-card:nth-child(7) {
            animation-delay: 0.35s;
        }

        .blog-card:nth-child(8) {
            animation-delay: 0.4s;
        }

        .blog-card:nth-child(9) {
            animation-delay: 0.45s;
        }

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
                    
                    // FIXED: Ensure we use the slug for the pretty URL
                    $slug = (!empty($row["slug"])) ? $row["slug"] : $id;
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
                            
                            <a href="/blog/<?php echo $slug; ?>" class="btn-read-more">
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
        AOS.init({ once: true, offset: 100, duration: 800, easing: 'ease-out-cubic' });

        document.addEventListener("mousemove", parallax);
        function parallax(e) {
            document.querySelectorAll(".floating-shape").forEach(function (move) {
                var moving_value = move.getAttribute("data-speed");
                var x = (e.clientX * moving_value) / 250;
                var y = (e.clientY * moving_value) / 250;
                move.style.transform = "translateX(" + x + "px) translateY(" + y + "px)";
            });
        }

        const observerOptions = { threshold: 0.15, rootMargin: '0px 0px -50px 0px' };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains('in-view')) {
                    entry.target.classList.add('in-view');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.blog-card');
            cards.forEach(card => observer.observe(card));
        });
    </script>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
