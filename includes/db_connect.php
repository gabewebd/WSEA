<?php
// HOSTINGER PRODUCTION DATABASE CONFIGURATION

// 1. Hostinger Credentials (Found in hPanel > Databases > MySQL)
$servername = "localhost"; 
$username   = "u697443091_danonos"; // Hostinger DB Username
$password   = "r!GtK$|e0gy5"; // Hostinger DB Password
$dbname     = "u697443091_danonos"; // Hostinger DB Name

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