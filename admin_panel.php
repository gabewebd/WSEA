<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Handle New Blog Post
if (isset($_POST['post_blog'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sql = "INSERT INTO blogs (title, content) VALUES ('$title', '$content')";
    $conn->query($sql);
    $message = "Blog posted successfully!";
}
?>

<!DOCTYPE html>
<html>
<head><title>Admin Panel</title><link rel="stylesheet" href="style.css"></head>
<body>
    <header>
        <h2>Admin Panel</h2>
        <nav>
            <a href="index.php" target="_blank">View Site</a>
            <a href="logout.php" style="color:red;">Logout</a>
        </nav>
    </header>

    <div class="container">
        <h3>Welcome, <?php echo $_SESSION['admin']; ?></h3>

        <div class="card" style="text-align:left; max-width:600px; margin:0 auto;">
            <h3 style="color:var(--primary-orange);">Post a New Blog</h3>
            <?php if(isset($message)) echo "<p style='color:green'>$message</p>"; ?>
            
            <form method="post">
                <label>Blog Title:</label><br>
                <input type="text" name="title" required style="width:100%; padding:8px; margin-bottom:10px;"><br>
                
                <label>Content:</label><br>
                <textarea name="content" rows="5" required style="width:100%; padding:8px; margin-bottom:10px;"></textarea><br>
                
                <button type="submit" name="post_blog" class="btn">Publish Blog</button>
            </form>
        </div>
    </div>
</body>
</html>