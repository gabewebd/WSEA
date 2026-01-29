<?php
// Security Check: If user is not logged in, kick them out!
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Go back to login if not authorized
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Danonos</title>

    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        body {
            background-color: #f4f4f4;
        }

        .admin-nav {
            background: #3E2723;
            padding: 15px;
            color: white;
            display: flex;
            justify-content: space-between;
        }

        .admin-nav a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
        }

        .admin-nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="admin-nav">
        <div class="brand">Danonos Admin Panel</div>
        <div class="links">
            <a href="dashboard.php">Dashboard</a>
            <a href="post-create.php">Write New Blog</a>
            <a href="../index.php" target="_blank">View Live Site</a> <a href="logout.php"
                style="color: #ffcccc;">Logout</a>
        </div>
    </div>

    <div class="content-wrapper" style="padding: 20px;">