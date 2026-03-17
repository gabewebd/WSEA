<?php
include 'includes/db_connect.php';

if (!isset($_GET['slug'])) {
    header('Location: /blogs');
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
    header('Location: /blogs');
    exit;
}

$current_id = $post['id'];

// 2. GET PREVIOUS POST
$prev_stmt = $conn->prepare("SELECT slug, title, featured_image, created_at FROM posts WHERE id < ? AND status = 'published' ORDER BY id DESC LIMIT 1");
$prev_stmt->bind_param("i", $current_id);
$prev_stmt->execute();
$prev_post = $prev_stmt->get_result()->fetch_assoc();

// 3. GET NEXT POST
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

// FIXED: Force the Pretty URL for Schema and Canonicals
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$prettyUrl = $protocol . "://danonos.com/blog/" . urlencode($slug);

$pageTitle = $post['title'] . " | Danono's Blog";
$customCss = "single-blog.css";
include 'includes/header.php';

// Author Name
$author_name = !empty($post['full_name']) ? $post['full_name'] : 'Danonos Team';

// --- ARTICLE SCHEMA START ---
$schemaImage = !empty($post["featured_image"]) ? "/uploads/" . $post["featured_image"] : "/assets/img/danonos-hero.jpg";
$schemaDate = date('c', strtotime($post['created_at'])); 
?>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "<?php echo $prettyUrl; ?>"
  },
  "headline": "<?php echo htmlspecialchars($post['title']); ?>",
  "image": [
    "<?php echo $schemaImage; ?>"
  ],
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
      "url": "/assets/img/danonos-logo.jpg"
    }
  }
}
</script>

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
        <?php 
            $content = $post['content'];
            // Fix local image paths if they missed the leading slash
            $content = preg_replace('/src="uploads\//', 'src="/uploads/', $content);
            echo $content; 
        ?>
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
            $prev_img = !empty($prev_post["featured_image"]) ? "/uploads/" . $prev_post["featured_image"] : "https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=280&fit=crop";
            ?>
            <a href="/blog/<?php echo urlencode($prev_post['slug']); ?>" class="nav-card prev-card">
                <div class="nav-card-img">
                    <div class="nav-card-label">Previous</div>
                    <img src="<?php echo $prev_img; ?>" alt="<?php echo htmlspecialchars($prev_post['title']); ?>">
                    <div class="nav-card-overlay">
                        <span><i class="ph ph-arrow-left"></i> Previous</span>
                    </div>
                </div>
                <div class="nav-card-content">
                    <span class="nav-date"><?php echo date('M d, Y', strtotime($prev_post['created_at'])); ?></span>
                    <h4 class="nav-title"><?php echo htmlspecialchars($prev_post['title']); ?></h4>
                </div>
            </a>
        <?php endif; ?>

        <?php if ($next_post): 
            $next_img = !empty($next_post["featured_image"]) ? "/uploads/" . $next_post["featured_image"] : "https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=280&fit=crop";
            ?>
            <a href="/blog/<?php echo urlencode($next_post['slug']); ?>" class="nav-card next-card">
                <div class="nav-card-img">
                    <div class="nav-card-label">Next</div>
                    <img src="<?php echo $next_img; ?>" alt="<?php echo htmlspecialchars($next_post['title']); ?>">
                    <div class="nav-card-overlay">
                        <span>Next <i class="ph ph-arrow-right"></i></span>
                    </div>
                </div>
                <div class="nav-card-content">
                    <span class="nav-date"><?php echo date('M d, Y', strtotime($next_post['created_at'])); ?></span>
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
            <a href="#" class="share-btn facebook" target="_blank" rel="noopener noreferrer">
                <i class="ph ph-facebook-logo"></i> Facebook
            </a>
            <a href="#" class="share-btn twitter" target="_blank" rel="noopener noreferrer">
                <i class="ph ph-twitter-logo"></i> Twitter
            </a>
            <a href="#" class="share-btn whatsapp" target="_blank" rel="noopener noreferrer">
                <i class="ph ph-whatsapp-logo"></i> WhatsApp
            </a>
            <button type="button" class="share-btn copy-link" onclick="copyToClipboard()">
                <i class="ph ph-link"></i> Copy Link
            </button>
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
        const originalColor = btn.style.backgroundColor;

        btn.innerHTML = '<i class="ph ph-check"></i> Copied!';
        btn.style.backgroundColor = '#10B981';

        setTimeout(() => {
            btn.innerHTML = originalHTML;
            btn.style.backgroundColor = originalColor;
        }, 2000);
    }
</script>

<?php include 'includes/footer.php'; ?>
