<?php
// Hidden logic file: Deletes post & redirects back
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: index.php');
    exit;
}

include '../includes/db_connect.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM blogs WHERE id = ?");
$stmt->execute([$id]);

header('Location: dashboard.php');
exit;
?>
