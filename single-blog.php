<?php
include 'includes/db_connect.php';

if (!isset($_GET['slug'])) {
    header('Location: blogs');
    exit;
}

$slug = $_GET['slug'];

// 1. GET CURRENT POST
$stmt = $conn->prepare("SELECT p.*, u.full_name FROM posts p LEFT JOIN users u ON p.author_id = u.id WHERE p.slug = ? AND p.status = 'published'");
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();
$post = $result->fetch_assoc();

if (!$post) {
    header('Location: blogs');
    exit;
}

$current_id = $post['id'];

// 2. GET PREVIOUS POST (ID < Current ID)
$prev_stmt = $conn->prepare("SELECT slug, title, featured_image, created_at FROM posts WHERE id < ? AND status = 'published' ORDER BY id DESC LIMIT 1");
$prev_stmt->bind_param("i", $current_id);
$prev_stmt->execute();
$prev_post = $prev_stmt->get_result()->fetch_assoc();

// 3. GET NEXT POST (ID > Current ID)
$next_stmt = $conn->prepare("SELECT slug, title, featured_image, created_at FROM posts WHERE id > ? AND status = 'published' ORDER BY id ASC LIMIT 1");
$next_stmt->bind_param("i", $current_id);
$next_stmt->execute();
$next_post = $next_stmt->get_result()->fetch_assoc();

// Read Time Calculation
$word_count = str_word_count(strip_tags($post['content']));
$read_time = max(1, ceil($word_count / 200)) . ' min read';

// Meta Description
$clean_content = strip_tags($post['content']);
$auto_desc = substr($clean_content, 0, 150) . '...';
$metaDesc = !empty($post['meta_description']) ? $post['meta_description'] : $auto_desc;

$pageTitle = $post['title'] . " | Danono's Blog";
$customCss = "single-blog.css";
include 'includes/header.php';

// Author Name
$author_name = !empty($post['full_name']) ? $post['full_name'] : 'Danonos Team';
?>

<style>
    /* =========================================
       SINGLE BLOG INLINE STYLES
       ========================================= */

    body {
        background-color: #FFFDF9;
        font-family: 'Barlow', sans-serif;
        color: #374151;
        line-height: 1.6;
    }

    .blog-wrapper {
        max-width: 1000px;
        margin: 0 auto;
        padding: 80px 20px;
    }

    /* --- HEADER SECTION --- */
    .blog-header {
        text-align: center;
        margin-bottom: 50px;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
        padding-bottom: 30px;
        border-bottom: 1px solid #f0f0f0;
    }

    .blog-meta {
        color: #EF7D32;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .blog-title {
        font-family: 'Fredoka', sans-serif;
        font-size: 48px;
        color: #431407;
        line-height: 1.2;
        margin-bottom: 20px;
    }

    .blog-author {
        font-size: 18px;
        color: #6B7280;
        font-weight: 500;
    }

    .blog-author strong {
        color: #431407;
    }

    /* --- CONTENT AREA --- */
    .blog-content {
        max-width: 850px;
        margin: 0 auto;
        font-size: 20px;
        line-height: 1.8;
    }

    .blog-content h1,
    .blog-content h2,
    .blog-content h3,
    .blog-content h4 {
        font-family: 'Fredoka', sans-serif;
        color: #EF7D32;
        margin-top: 50px;
        margin-bottom: 25px;
        line-height: 1.3;
    }

    .blog-content h2 {
        font-size: 32px;
    }

    .blog-content h3 {
        font-size: 26px;
    }

    .blog-content p {
        margin-bottom: 24px;
    }

    .blog-content ul,
    .blog-content ol {
        margin-bottom: 30px;
        padding-left: 20px;
    }

    .blog-content li {
        margin-bottom: 12px;
    }

    .blog-content img {
        border-radius: 8px;
        margin: 40px auto;
        display: block;
        max-width: 100%;
        height: auto;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .blog-content a {
        color: #EF7D32;
        text-decoration: underline;
        font-weight: 600;
    }

    .blog-content a:hover {
        color: #431407;
    }

    /* --- POST NAVIGATION (Next/Prev) --- */
    .post-navigation {
        max-width: 850px;
        margin: 60px auto 40px;
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }

    .nav-btn {
        display: inline-flex;
        align-items: center;
        padding: 12px 20px;
        background: white;
        border: 1px solid #eee;
        border-radius: 8px;
        color: #555;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.2s;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        max-width: 45%;
    }

    .nav-btn:hover {
        border-color: #EF7D32;
        color: #EF7D32;
        transform: translateY(-2px);
    }

    .nav-label {
        font-size: 12px;
        color: #999;
        display: block;
        margin-bottom: 2px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .nav-title {
        display: block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* --- FOOTER SECTION --- */
    .blog-footer {
        max-width: 850px;
        margin: 0 auto;
        padding-top: 40px;
        border-top: 2px solid #F3F4F6;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .back-link {
        text-decoration: none;
        color: #431407;
        font-weight: 700;
        font-size: 18px;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: color 0.2s;
    }

    .back-link:hover {
        color: #EF7D32;
    }

    .btn-share {
        background: transparent;
        border: 2px solid #EF7D32;
        color: #EF7D32;
        padding: 12px 25px;
        border-radius: 50px;
        font-weight: 700;
        font-family: 'Barlow', sans-serif;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 16px;
    }

    .btn-share:hover {
        background: #EF7D32;
        color: white;
    }

    /* --- RESPONSIVE --- */
    @media (max-width: 768px) {
        .blog-wrapper {
            padding: 40px 20px;
        }

        .blog-title {
            font-size: 36px;
        }

        .blog-content {
            font-size: 18px;
        }

        .blog-footer {
            flex-direction: column;
            gap: 25px;
            text-align: center;
        }

        .post-navigation {
            flex-direction: column;
            gap: 15px;
        }

        .nav-btn {
            max-width: 100%;
            justify-content: center;
            text-align: center;
        }
    }
</style>

<div class="blog-wrapper">

    <div class="blog-header">
        <div class="blog-meta">
            <?php echo date('F j, Y', strtotime($post['created_at'])); ?> •
            <?php echo $read_time; ?>
        </div>
        <h1 class="blog-title"><?php echo htmlspecialchars($post['title']); ?></h1>
        <div class="blog-author">
            Written by <strong><?php echo htmlspecialchars($author_name); ?></strong>
        </div>
    </div>

    <div class="blog-content">
        <?php echo $post['content']; ?>
    </div>



    <div class="blog-footer">
        <a href="blogs" class="back-link">
            <i class="ph ph-squares-four"></i> View All Stories
        </a>
        <button onclick="openShareModal()" class="btn-share">
            <i class="ph ph-share-network"></i> Share this Post
        </button>
    </div>

    <!-- NEW NAVIGATION CARDS -->
    <div class="more-stories-section">
        <h3 class="more-stories-title">More from the Kitchen</h3>
        <div class="post-navigation-cards">
            <?php if ($prev_post):
                $prev_img = !empty($prev_post["featured_image"]) ? "uploads/" . $prev_post["featured_image"] : "https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=280&fit=crop";
                $prev_date = date('M d, Y', strtotime($prev_post['created_at']));
                ?>
                <a href="single-blog?slug=<?php echo $prev_post['slug']; ?>" class="nav-card prev-card">
                    <div class="nav-card-img">
                        <img src="<?php echo $prev_img; ?>" alt="<?php echo htmlspecialchars($prev_post['title']); ?>"
                            onerror="this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=280&fit=crop'">
                        <div class="nav-card-overlay">
                            <span><i class="ph ph-arrow-left"></i> Previous Post</span>
                        </div>
                    </div>
                    <div class="nav-card-content">
                        <span class="nav-date"><?php echo $prev_date; ?></span>
                        <h4 class="nav-title"><?php echo htmlspecialchars($prev_post['title']); ?></h4>
                    </div>
                </a>
            <?php else: ?>
                <div class="nav-card-placeholder"></div>
            <?php endif; ?>

            <?php if ($next_post):
                $next_img = !empty($next_post["featured_image"]) ? "uploads/" . $next_post["featured_image"] : "https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=280&fit=crop";
                $next_date = date('M d, Y', strtotime($next_post['created_at']));
                ?>
                <a href="single-blog?slug=<?php echo $next_post['slug']; ?>" class="nav-card next-card">
                    <div class="nav-card-img">
                        <img src="<?php echo $next_img; ?>" alt="<?php echo htmlspecialchars($next_post['title']); ?>"
                            onerror="this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=280&fit=crop'">
                        <div class="nav-card-overlay">
                            <span>Next Post <i class="ph ph-arrow-right"></i></span>
                        </div>
                    </div>
                    <div class="nav-card-content">
                        <span class="nav-date"><?php echo $next_date; ?></span>
                        <h4 class="nav-title"><?php echo htmlspecialchars($next_post['title']); ?></h4>
                    </div>
                </a>
            <?php endif; ?>
        </div>

    </div>

    <script>
        // Modal Elements
        const shareModal = document.getElementById('shareModal');
        const modalBackdrop = document.querySelector('.share-modal-backdrop');
        const closeModalBtn = document.querySelector('.close-modal');

        function openShareModal() {
            if (shareModal) shareModal.classList.add('active');

            // Update Social Links based on current URL
            const currentUrl = encodeURIComponent(window.location.href);
            const pageTitle = encodeURIComponent(document.title);

            const facebookBtn = document.querySelector('.share-btn.facebook');
            if (facebookBtn) facebookBtn.href = `https://www.facebook.com/sharer/sharer.php?u=${currentUrl}`;

            const twitterBtn = document.querySelector('.share-btn.twitter');
            if (twitterBtn) twitterBtn.href = `https://twitter.com/intent/tweet?url=${currentUrl}&text=${pageTitle}`;

            const whatsappBtn = document.querySelector('.share-btn.whatsapp');
            if (whatsappBtn) whatsappBtn.href = `https://api.whatsapp.com/send?text=${pageTitle}%20${currentUrl}`;
        }

        function closeShareModal() {
            if (shareModal) shareModal.classList.remove('active');
        }

        if (modalBackdrop) modalBackdrop.addEventListener('click', closeShareModal);
        if (closeModalBtn) closeModalBtn.addEventListener('click', closeShareModal);

        function copyToClipboard() {
            navigator.clipboard.writeText(window.location.href);
            const btn = document.querySelector('.share-btn.copy-link');
            const originalHTML = btn.innerHTML;

            btn.innerHTML = '<i class="ph ph-check"></i> Copied!';
            btn.classList.add('copied');

            setTimeout(() => {
                btn.innerHTML = originalHTML;
                btn.classList.remove('copied');
            }, 2000);
        }
    </script>

    <!-- Share Modal HTML -->
    <div id="shareModal" class="share-modal">
        <div class="share-modal-backdrop"></div>
        <div class="share-modal-content">
            <button class="close-modal" aria-label="Close modal"><i class="ph ph-x"></i></button>
            <div class="modal-header">
                <h3>Share this Post</h3>
                <p>Spread the sweetness with your friends!</p>
            </div>

            <div class="share-options">
                <a href="#" class="share-btn facebook" target="_blank" rel="noopener noreferrer">
                    <i class="ph ph-facebook-logo"></i> Facebook
                </a>
                <a href="#" class="share-btn twitter" target="_blank" rel="noopener noreferrer">
                    <i class="ph ph-twitter-logo"></i> Twitter
                </a>
                <a href="#" class="share-btn whatsapp" target="_blank" rel="noopener noreferrer">
                    <i class="ph ph-whatsapp-logo"></i> WhatsApp
                </a>
                <button class="share-btn copy-link" onclick="copyToClipboard()">
                    <i class="ph ph-link"></i> Copy Link
                </button>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>