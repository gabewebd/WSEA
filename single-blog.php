<?php
include 'includes/db_connect.php';

if (!isset($_GET['slug'])) {
    header('Location: blogs');
    exit;
}

$slug = $_GET['slug'];

// SQL: Get Post + Author Full Name
$stmt = $conn->prepare("SELECT p.*, u.full_name FROM posts p LEFT JOIN users u ON p.author_id = u.id WHERE p.slug = ? AND p.status = 'published'");
$stmt->bind_param("s", $slug);
$stmt->execute();
$result = $stmt->get_result();
$post = $result->fetch_assoc();

if (!$post) {
    header('Location: blogs');
    exit;
}

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

// Featured Image Source
$img_src = '';
if ($post['featured_image']) {
    $img_src = (strpos($post['featured_image'], 'http') === 0 || strpos($post['featured_image'], '/') === 0)
        ? $post['featured_image']
        : "uploads/" . $post['featured_image'];
}

// Author Name
$author_name = !empty($post['full_name']) ? $post['full_name'] : 'Danonos Team';
?>

<style>
    /* =========================================
       SINGLE BLOG INLINE STYLES (Image Fix)
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

    /* --- FEATURED IMAGE (FIXED) --- */
    .featured-image-container {
        width: 100%;
        /* Removed max-height to allow full image height */
        height: auto;
        border-radius: 16px;
        overflow: hidden;
        margin-bottom: 60px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        background: #f9f9f9;
        /* Subtle bg in case of transparency */
    }

    .featured-image-container img {
        width: 100%;
        height: auto;
        /* Follows original aspect ratio */
        display: block;
        /* Ensures entire image is visible, not cropped */
        object-fit: contain;
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

    /* --- FOOTER SECTION --- */
    .blog-footer {
        max-width: 850px;
        margin: 80px auto 0;
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

        .featured-image-container {
            margin-bottom: 40px;
        }

        .blog-content {
            font-size: 18px;
        }

        .blog-footer {
            flex-direction: column;
            gap: 25px;
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

    <?php if ($img_src): ?>
        <div class="featured-image-container">
            <img src="<?php echo htmlspecialchars($img_src); ?>"
                alt="<?php echo htmlspecialchars($post['image_alt_text'] ?? $post['title']); ?>">
        </div>
    <?php endif; ?>

    <div class="blog-content">
        <?php echo $post['content']; ?>
    </div>

    <div class="blog-footer">
        <a href="blogs" class="back-link">
            <i class="ph ph-arrow-left"></i> Back to Stories
        </a>
        <button onclick="copyLink()" class="btn-share">
            <i class="ph ph-share-network"></i> Share this Post
        </button>
    </div>

</div>

<script>
    function copyLink() {
        navigator.clipboard.writeText(window.location.href);
        const btn = document.querySelector('.btn-share');
        const originalText = btn.innerHTML;
        btn.innerHTML = '<i class="ph ph-check"></i> Link Copied!';
        btn.style.background = '#16a34a';
        btn.style.borderColor = '#16a34a';
        btn.style.color = 'white';
        setTimeout(() => {
            btn.innerHTML = originalText;
            btn.style.background = '';
            btn.style.borderColor = '';
            btn.style.color = '';
        }, 2000);
    }
</script>

<?php include 'includes/footer.php'; ?>