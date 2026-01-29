<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username='$user' AND password='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $user;
        header("Location: admin_panel.php");
    } else {
        $error = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Admin Login</title><link rel="stylesheet" href="style.css"></head>
<body style="display:flex; justify-content:center; align-items:center; height:100vh;">
    
    <div class="card" style="width: 300px;">
        <h2 style="color:var(--primary-orange);">Admin Login</h2>
        <?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required style="width:90%; padding:10px; margin:10px 0;"><br>
            <input type="password" name="password" placeholder="Password" required style="width:90%; padding:10px; margin:10px 0;"><br>
            <button type="submit" class="btn" style="width:100%;">Login</button>
        </form>
        <br>
        <a href="index.php">Back to Website</a>
    </div>

</body>
</html>