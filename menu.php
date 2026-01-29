<?php include 'includes/db_connect.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Menu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <div class="container">
        <h1 class="page-title">Most Loved <span>TREATS</span></h1>

        <div class="grid">
            <?php
            $sql = "SELECT * FROM menu_items";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card">';
                    // Using placeholder if no image exists
                    echo '<img src="https://via.placeholder.com/150" style="border-radius:50%;">';
                    echo '<h3>' . $row["name"] . '</h3>';
                    echo '<p style="font-weight:bold; color:#F28C28;">P ' . $row["price"] . '</p>';
                    echo '</div>';
                }
            } else {
                echo "<p>No items available.</p>";
            }
            ?>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>

</html>