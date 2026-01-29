<?php include 'includes/db_connect.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Blogs</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <div class="container">
        <h1 class="page-title">Latest <span>NEWS</span></h1>

        <?php
        $sql = "SELECT * FROM blogs ORDER BY date DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="card" style="text-align: left; margin-bottom: 20px;">';
                echo '<h2 style="color:#F28C28;">' . $row["title"] . '</h2>';
                echo '<small>' . $row["date"] . '</small>';
                echo '<p>' . $row["content"] . '</p>';
                echo '</div>';
            }
        } else {
            echo "<p>No blogs posted yet.</p>";
        }
        ?>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>

</html>