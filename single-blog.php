<?php
include 'includes/db_connect.php';

// --- 1. REDIRECT OLD QUERY LINKS TO PRETTY URLS ---
// If a user accesses single-blog.php?slug=abc, push them to /blog/abc
if (isset($_GET['slug']) && strpos($_SERVER['REQUEST_URI'], 'single-blog') !== false) {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: /blog/" . $_GET['slug']);
    exit;
}

// Get slug from the URL (The .htaccess handles mapping /blog/xyz to single-blog.php?slug=xyz)
if (!isset($_GET['slug'])) {
    header('Location: /blogs');
    exit;
}

$slug = $_GET['slug'];

// 2. GET CURRENT POST
$stmt = $conn->prepare("SELECT p.*, u.full_name FROM posts p LEFT JOIN users u ON p.author_id = u.id WHERE p.slug = ? AND p.status = 'published'");
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();
$post = $result->fetch_assoc();

if (!$post) {
    header('Location: /blogs');
    exit;
}

$current_id = $post['id'];

// 3. GET PREVIOUS POST
$prev_stmt = $conn->prepare("SELECT slug, title, featured_image, created_at FROM posts WHERE id < ? AND status = 'published' ORDER BY id DESC LIMIT 1");
$prev_stmt->bind_param("i", $current_id);
$prev_stmt->execute();
$prev_post = $prev_stmt->get_result()->fetch_assoc();

// 4. GET NEXT POST
$next_stmt = $conn->prepare("SELECT slug, title, featured_image, created_at FROM posts WHERE id > ? AND status = 'published' ORDER BY id ASC LIMIT 1");
$next_stmt->bind_param("i", $current_id);
$next_stmt->execute();
$next_post = $next_stmt->get_result()->fetch_assoc();

// Read Time Calculation
$word_count = str_word_count(strip_tags($post['content']));
$read_time = max(1, ceil($word_count / 200)) . ' min read';

// Meta Description & SEO Setup
$clean_content = strip_tags($post['content']);
$auto_desc = substr($clean_content, 0, 150) . '...';
$metaDesc = !empty($post['meta_description']) ? $post['meta_description'] : $auto_desc;

$pageTitle = $post['title'] . " | Danono's Blog";
$customCss = "single-blog.css";

// Include header
include 'includes/header.php';

// For Schema & Author
$author_name = !empty($post['full_name']) ? $post['full_name'] : 'Danonos Team';
$currentUrl = "https://danonos.com/blog/" . $post['slug'];
$schemaImage = !empty($post["featured_image"]) ? $baseUrl . "uploads/" . $post["featured_image"] : $baseUrl . "assets/img/danonos-hero.jpg";
$schemaDate = date('c', strtotime($post['created_at'])); 
?>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "<?php echo $currentUrl; ?>"
  },
  "headline": "<?php echo htmlspecialchars($post['title']); ?>",
  "image": ["<?php echo $schemaImage; ?>"],
  "datePublished": "<?php echo $schemaDate; ?>",
  "dateModified": "<?php echo $schemaDate; ?>",
  "author": {
    "@type": "Person",
    "name": "<?php echo htmlspecialchars($author_name); ?>"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Danono's Doughnuts and Brownies",
    "logo": {
      "@type": "ImageObject",
      "url": "<?php echo $baseUrl; ?>assets/img/danonos-logo.jpg"
    }
  }
}
</script>

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
        padding: 80px 20px 40px;
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

    /* --- ACTION BAR (Back & Share) --- */
    .blog-action-bar {
        max-width: 850px;
        margin: 0 auto;
        padding-top: 40px;
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

    /* --- DIVIDER --- */
    .section-divider {
        max-width: 1000px;
        margin: 60px auto;
        border: 0;
        border-top: 1px solid #E5E7EB;
    }

    /* --- MORE STORIES SECTION --- */
    .more-stories-section {
        max-width: 1000px;
        margin: 0 auto 80px;
        padding: 0 20px;
    }

    .more-stories-title {
        font-family: 'Fredoka', sans-serif;
        font-size: 32px;
        color: #431407;
        margin-bottom: 30px;
        text-align: center;
    }

    .post-navigation-cards {
        display: grid;
        grid-template-columns: 1fr;
        gap: 30px;
    }

    @media (min-width: 768px) {
        .post-navigation-cards {
            grid-template-columns: 1fr 1fr;
        }
    }

    /* --- NAV CARD (Hover Effect Restored) --- */
    .nav-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        text-decoration: none;
        display: flex;
        flex-direction: column;
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        position: relative;
        border: 2px solid transparent;
        cursor: pointer;
    }

    .nav-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 48px rgba(76, 34, 14, 0.15);
        border-color: #E8B88D;
    }

    .nav-card-img {
        height: 220px;
        position: relative;
        overflow: hidden;
    }

    .nav-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    /* Hover Animation: Zoom Image */
    .nav-card:hover img {
        transform: scale(1.1);
    }

    /* Hover Animation: Overlay & Arrow */
    .nav-card-overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        /* Darken Image */
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 10;
    }

    .nav-card:hover .nav-card-overlay {
        opacity: 1;
    }

    .nav-card-overlay span {
        color: white;
        font-weight: 700;
        font-size: 18px;
        text-transform: uppercase;
        letter-spacing: 1px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* Label Tags */
    .nav-card-label {
        position: absolute;
        top: 10px;
        left: 10px;
        background: rgba(239, 125, 50, 0.9);
        color: white;
        padding: 5px 12px;
        border-radius: 5px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        z-index: 5;
    }

    .nav-card.next-card .nav-card-label {
        left: auto;
        right: 10px;
    }

    .nav-card-content {
        padding: 24px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .nav-date {
        font-size: 12px;
        color: #EF7D32;
        font-weight: 600;
        text-transform: uppercase;
    }

    .nav-title {
        font-family: 'Fredoka', sans-serif;
        font-size: 20px;
        color: #431407;
        margin: 0;
        line-height: 1.3;
    }

    /* --- SHARE MODAL --- */
    .share-modal {
        position: fixed;
        inset: 0;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
    }

    .share-modal.active {
        opacity: 1;
        pointer-events: auto;
    }

    .share-modal-backdrop {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(4px);
    }

    .share-modal-content {
        background: white;
        width: 90%;
        max-width: 450px;
        padding: 30px;
        border-radius: 20px;
        position: relative;
        z-index: 2;
        text-align: center;
        transform: translateY(20px);
        transition: transform 0.3s;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
    }

    .share-modal.active .share-modal-content {
        transform: translateY(0);
    }

    .close-modal {
        position: absolute;
        top: 15px;
        right: 15px;
        background: transparent;
        border: none;
        font-size: 20px;
        color: #999;
        cursor: pointer;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .close-modal:hover {
        color: #EF7D32;
        background: #FFF9F3;
    }

    .share-options {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-top: 20px;
    }

    .share-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 12px;
        border-radius: 10px;
        text-decoration: none;
        color: white;
        font-weight: 600;
        font-size: 14px;
        transition: transform 0.2s;
        border: none;
        cursor: pointer;
    }

    .share-btn:hover {
        transform: translateY(-2px);
        opacity: 0.9;
    }

    .share-btn.facebook {
        background: #1877F2;
    }

    .share-btn.twitter {
        background: #1DA1F2;
    }

    .share-btn.whatsapp {
        background: #25D366;
    }

    .share-btn.copy-link {
        background: #4B5563;
    }

    .share-btn.copy-link.copied {
        background: #10B981;
    }

    /* RESPONSIVE */
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

        .blog-action-bar {
            flex-direction: column;
            gap: 25px;
            text-align: center;
        }

        .share-options {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="blog-wrapper">
    <div class="blog-header">
        <div class="blog-meta">
            <?php echo date('F j, Y', strtotime($post['created_at'])); ?> • <?php echo $read_time; ?>
        </div>
        <h1 class="blog-title"><?php echo htmlspecialchars($post['title']); ?></h1>
        <div class="blog-author">
            Written by <strong><?php echo htmlspecialchars($author_name); ?></strong>
        </div>
    </div>

    <div class="blog-content">
        <?php echo $post['content']; ?>
    </div>

    <div class="blog-action-bar">
        <a href="/blogs" class="back-link">
            <i class="ph ph-squares-four"></i> View All Stories
        </a>
        <button type="button" onclick="openShareModal()" class="btn-share">
            <i class="ph ph-share-network"></i> Share this Post
        </button>
    </div>
</div>

<hr class="section-divider">

<div class="more-stories-section">
    <h3 class="more-stories-title">More from the Kitchen</h3>
    <div class="post-navigation-cards">

        <?php if ($prev_post):
            $prev_img = !empty($prev_post["featured_image"]) ? "uploads/" . $prev_post["featured_image"] : "assets/img/default.jpg";
            $prev_date = date('M d, Y', strtotime($prev_post['created_at']));
            ?>
            <a href="/blog/<?php echo $prev_post['slug']; ?>" class="nav-card prev-card">
                <div class="nav-card-img">
                    <div class="nav-card-label">Previous</div>
                    <img src="<?php echo $prev_img; ?>" alt="<?php echo htmlspecialchars($prev_post['title']); ?>">
                    <div class="nav-card-overlay">
                        <span><i class="ph ph-arrow-left"></i> Previous</span>
                    </div>
                </div>
                <div class="nav-card-content">
                    <span class="nav-date"><?php echo $prev_date; ?></span>
                    <h4 class="nav-title"><?php echo htmlspecialchars($prev_post['title']); ?></h4>
                </div>
            </a>
        <?php endif; ?>

        <?php if ($next_post):
            $next_img = !empty($next_post["featured_image"]) ? "uploads/" . $next_post["featured_image"] : "assets/img/default.jpg";
            $next_date = date('M d, Y', strtotime($next_post['created_at']));
            ?>
            <a href="/blog/<?php echo $next_post['slug']; ?>" class="nav-card next-card">
                <div class="nav-card-img">
                    <div class="nav-card-label">Next</div>
                    <img src="<?php echo $next_img; ?>" alt="<?php echo htmlspecialchars($next_post['title']); ?>">
                    <div class="nav-card-overlay">
                        <span>Next <i class="ph ph-arrow-right"></i></span>
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

<div id="shareModal" class="share-modal">
    <div class="share-modal-backdrop"></div>
    <div class="share-modal-content">
        <button type="button" class="close-modal" aria-label="Close modal"><i class="ph ph-x"></i></button>
        <div class="modal-header">
            <h3>Share this Post</h3>
            <p>Spread the sweetness with your friends!</p>
        </div>
        <div class="share-options">
            <a href="#" class="share-btn facebook" target="_blank" rel="noopener noreferrer"><i class="ph ph-facebook-logo"></i> Facebook</a>
            <a href="#" class="share-btn twitter" target="_blank" rel="noopener noreferrer"><i class="ph ph-twitter-logo"></i> Twitter</a>
            <a href="#" class="share-btn whatsapp" target="_blank" rel="noopener noreferrer"><i class="ph ph-whatsapp-logo"></i> WhatsApp</a>
            <button type="button" class="share-btn copy-link" onclick="copyToClipboard()"><i class="ph ph-link"></i> Copy Link</button>
        </div>
    </div>
</div>

<script>
    const shareModal = document.getElementById('shareModal');
    const modalBackdrop = document.querySelector('.share-modal-backdrop');
    const closeModalBtn = document.querySelector('.close-modal');

    function openShareModal() {
        if (shareModal) shareModal.classList.add('active');
        const currentUrl = encodeURIComponent(window.location.href);
        const pageTitle = encodeURIComponent(document.title);

        document.querySelector('.share-btn.facebook').href = `https://www.facebook.com/sharer/sharer.php?u=${currentUrl}`;
        document.querySelector('.share-btn.twitter').href = `https://twitter.com/intent/tweet?url=${currentUrl}&text=${pageTitle}`;
        document.querySelector('.share-btn.whatsapp').href = `https://api.whatsapp.com/send?text=${pageTitle}%20${currentUrl}`;
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
        btn.style.backgroundColor = '#10B981';
        setTimeout(() => {
            btn.innerHTML = originalHTML;
            btn.style.backgroundColor = '';
        }, 2000);
    }
</script>

<?php include 'includes/footer.php'; ?>
