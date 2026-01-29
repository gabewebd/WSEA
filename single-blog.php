<?php
include 'includes/db_connect.php';

if (!isset($_GET['slug'])) {
    header('Location: blogs.php');
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
    header('Location: blogs.php');
    exit;
}

// Read Time Calculation
$word_count = str_word_count(strip_tags($post['content']));
$read_time = max(1, ceil($word_count / 200)) . ' min read';

$page_title = $post['title'] . " | Danono's Blog";
include 'includes/header.php';

// Featured Image Source
$img_src = '';
if ($post['featured_image']) {
    $img_src = (strpos($post['featured_image'], 'http') === 0 || strpos($post['featured_image'], '/') === 0)
        ? $post['featured_image']
        : "uploads/" . $post['featured_image'];
}

// Author Name with fallback
$author_name = !empty($post['full_name']) ? $post['full_name'] : 'Danono Team';
?>

<style>
    body {
        background-color: #FFFDF9;
        /* Subtle warm white */
        font-family: 'Barlow', sans-serif;
    }

    .blog-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 80px 20px;
    }

    .blog-header {
        text-align: center;
        margin-bottom: 60px;
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
        margin-bottom: 10px;
    }

    .blog-title {
        font-family: 'Fredoka', sans-serif;
        font-size: 56px;
        color: #431407;
        line-height: 1.1;
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

    .featured-image-container {
        width: 100%;
        height: 550px;
        border-radius: 16px;
        overflow: hidden;
        margin-bottom: 60px;
    }

    .featured-image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .blog-content {
        max-width: 1000px;
        margin: 0 auto;
        font-size: 20px;
        line-height: 1.8;
        color: #374151;
    }

    .blog-content * {
        font-family: 'Barlow', sans-serif !important;
    }

    .blog-content h1,
    .blog-content h2,
    .blog-content h3,
    .blog-content h4 {
        font-family: 'Fredoka', sans-serif !important;
        color: #EF7D32;
        margin-top: 40px;
        margin-bottom: 20px;
    }

    .blog-content p {
        margin-bottom: 24px;
    }

    .blog-content img {
        border-radius: 8px;
        margin: 40px auto;
        display: block;
        max-width: 45%;
        height: auto;
    }

    .blog-content a {
        color: #EF7D32;
        text-decoration: underline;
    }

    .blog-content ul,
    .blog-content ol {
        margin-bottom: 24px;
        padding-left: 30px;
    }

    .blog-content li {
        margin-bottom: 10px;
    }

    .blog-footer {
        max-width: 1000px;
        /* MATCHES .blog-content EXACTLY */
        margin: 60px auto 0;
        padding-top: 30px;
        border-top: 1px solid #E5E7EB;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .back-link {
        text-decoration: none;
        color: #431407;
        font-weight: 600;
        font-size: 18px;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: color 0.2s;
    }

    .back-link:hover {
        color: #EF7D32;
    }

    .btn-share {
        background: #FFF;
        border: 2px solid #EF7D32;
        color: #EF7D32;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 700;
        font-family: 'Barlow', sans-serif;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-share:hover {
        background: #EF7D32;
        color: white;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .blog-wrapper {
            padding: 40px 20px;
        }

        .blog-title {
            font-size: 36px;
        }

        .featured-image-container {
            height: 300px;
            border-radius: 12px;
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

    <!-- Header: Meta, Title, Author -->
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

    <!-- Featured Image -->
    <?php if ($img_src): ?>
        <div class="featured-image-container">
            <img src="<?php echo htmlspecialchars($img_src); ?>"
                alt="<?php echo htmlspecialchars($post['image_alt_text'] ?? $post['title']); ?>">
        </div>
    <?php endif; ?>

    <!-- Content -->
    <div class=" blog-content">
        <?php echo $post['content']; ?>
    </div>

    <!-- Footer: Back & Share -->
    <div class="blog-footer">
        <a href="blogs.php" class="back-link">
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