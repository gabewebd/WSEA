<?php
session_start();
include '../includes/db_connect.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['submit_post'])) {
    $title = $_POST['title'];
    $content = $_POST['content']; // In a real app, sanitize this!
    $meta_desc = $_POST['meta_description'];
    $alt_text = $_POST['alt_text']; // SEO Field
    $slug = strtolower(str_replace(' ', '-', $title)); // Simple slug generator

    // Image Upload Logic
    $image_filename = "default.jpg";
    if (isset($_FILES['featured_image']) && $_FILES['featured_image']['error'] == 0) {
        $target_dir = "../uploads/";
        $image_filename = time() . "_" . basename($_FILES["featured_image"]["name"]);
        $target_file = $target_dir . $image_filename;
        move_uploaded_file($_FILES["featured_image"]["tmp_name"], $target_file);
    }

    // Insert into Database
    $stmt = $conn->prepare("INSERT INTO posts (title, slug, content, meta_description, featured_image, image_alt_text, status) VALUES (?, ?, ?, ?, ?, ?, 'published')");
    $stmt->bind_param("ssssss", $title, $slug, $content, $meta_desc, $image_filename, $alt_text);

    if ($stmt->execute()) {
        header("Location: dashboard.php"); // Redirect to dashboard after success
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<?php include 'header.php'; ?>
<div style="padding: 20px;">
    <h2>Write a New Blog</h2>
    <form method="POST" enctype="multipart/form-data">

        <label>Blog Title:</label><br>
        <input type="text" name="title" required style="width: 100%;"><br><br>

        <label>Meta Description (SEO):</label><br>
        <textarea name="meta_description" maxlength="160" required style="width: 100%;"></textarea><br><br>

        <label>Featured Image:</label><br>
        <input type="file" name="featured_image" required><br><br>

        <label>Image Alt Text (SEO):</label><br>
        <input type="text" name="alt_text" placeholder="Describe the image..." required style="width: 100%;"><br><br>

        <label>Content:</label><br>
        <textarea name="content" rows="10" required style="width: 100%;"></textarea><br><br>

        <button type="submit" name="submit_post">Publish Blog</button>
    </form>
</div>