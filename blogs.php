<?php
$pageTitle = "Blogs - Danono's";
$metaDesc = "Read the latest news, recipes, and stories from Danono's Doughnuts & Brownies.";
include 'includes/db_connect.php';
?>
<?php include 'includes/header.php'; ?>

<style>
    /* Blog Page Container */
    .blog-container {
        max-width: 1200px;
        margin: 0 auto;
        width: 90%;
        padding: 60px 0;
    }

    /* Blog Grid - 3 Columns on Desktop */
    .blog-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 30px;
        margin-top: 40px;
    }

    @media (min-width: 768px) {
        .blog-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 1024px) {
        .blog-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    /* Blog Card */
    .blog-card {
        background: #ffffff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(67, 20, 7, 0.08);
        border: 1px solid var(--cream, #FFEDD4);
        transition: all 0.3s ease;
    }

    .blog-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(67, 20, 7, 0.12);
    }

    .blog-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .blog-card-content {
        padding: 25px;
    }

    .blog-card-meta {
        font-size: 12px;
        color: #EF7D32;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .blog-card h3 {
        font-family: 'Fredoka', sans-serif;
        font-size: 20px;
        color: #431407;
        margin-bottom: 12px;
        line-height: 1.3;
    }

    .blog-card p {
        font-family: 'Barlow', sans-serif;
        font-size: 14px;
        color: #666;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    /* READ MORE BUTTON */
    .btn-read-more {
        display: inline-block;
        background-color: #EF7D32;
        color: white;
        padding: 10px 20px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .btn-read-more:hover {
        background-color: #d66a22;
        transform: translateY(-2px);
    }

    .btn-read-more i {
        margin-left: 6px;
    }

    /* No Posts Message */
    .no-posts {
        text-align: center;
        padding: 80px 20px;
        color: #888;
    }

    .no-posts h3 {
        font-family: 'Fredoka', sans-serif;
        color: #431407;
        font-size: 24px;
    }
</style>

<div class="blog-container">
    <!-- Page Header -->
    <div class="section-header">
        <span class="section-label">From Our Kitchen</span>
        <h1 class="page-title">Latest <span>News</span></h1>
        <p class="page-description"
            style="color: #666; max-width: 600px; margin: 0 auto; font-family: 'Barlow', sans-serif; font-size: 18px;">
            Stay updated with the sweetest news, new flavor launches, and behind-the-scenes stories from the Danono's
            kitchen.
        </p>
    </div>

    <!-- Blog Grid -->
    <div class="blog-grid">
        <?php
        $sql = "SELECT * FROM posts WHERE status = 'published' ORDER BY created_at DESC";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $title = htmlspecialchars($row["title"]);

                // Clean content for excerpt
                $clean_content = $row['content'];
                $clean_content = str_replace('&nbsp;', ' ', $clean_content);
                $clean_content = strip_tags($clean_content);
                $clean_content = html_entity_decode($clean_content);
                $excerpt = substr($clean_content, 0, 120) . '...';

                $date = date('M d, Y', strtotime($row["created_at"]));
                $image = !empty($row["featured_image"]) ? "uploads/" . $row["featured_image"] : "https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=250&fit=crop";
                $slug = isset($row["slug"]) ? $row["slug"] : $id;
                ?>
                <div class="blog-card">
                    <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"
                        onerror="this.src='https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400&h=250&fit=crop'">
                    <div class="blog-card-content">
                        <p class="blog-card-meta">
                            <i class="ph ph-calendar"></i> <?php echo $date; ?>
                        </p>
                        <h3><?php echo $title; ?></h3>
                        <p><?php echo $excerpt; ?></p>
                        <a href="single-blog.php?slug=<?php echo $slug; ?>" class="btn-read-more">
                            Read More <i class="ph ph-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <?php
            }
        } else {
            // No posts - simple message, no fallback/dummy posts
            ?>
            <div class="no-posts" style="grid-column: 1 / -1;">
                <h3>No blogs created yet.</h3>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>