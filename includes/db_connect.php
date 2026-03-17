<?php
// HOSTINGER PRODUCTION DATABASE CONFIGURATION
// Check if we are running on localhost
$is_local = in_array($_SERVER['HTTP_HOST'], ['localhost', '127.0.0.1']);

if ($is_local) {
    // Local Development (XAMPP)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "danonos";
} else {
    // Production (Hostinger)
    $servername = "localhost";
    $username = "u697443091_danonos";
    $password = "r!GtK$|e0gy5";
    $dbname = "u697443091_danonos";
}

// 2. Simple Connection (SSL is not needed for localhost connections)
$conn = new mysqli($servername, $username, $password, $dbname);

// 3. Check Connection
if ($conn->connect_error) {
    // Show error during setup, but hide this in final production for security
    die("Database Connection failed: " . $conn->connect_error);
}

// 4. Set Charset to handle special characters (Emojis/Accents) properly
$conn->set_charset("utf8mb4");
?>