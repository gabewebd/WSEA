<?php
// process_franchise.php - Handle Franchise Applications
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $location = isset($_POST['location']) ? trim($_POST['location']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    // Basic validation
    if (empty($name) || empty($email) || empty($phone) || empty($location)) {
        $_SESSION['franchise_error'] = "Please fill in all required fields.";
        header("Location: ../franchise.php#apply");
        exit;
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['franchise_error'] = "Please provide a valid email address.";
        header("Location: ../franchise.php#apply");
        exit;
    }

    // --- EMAIL SETTINGS ---

    // 1. WHERE TO SEND IT (personal email)
    $to = "eiyadwnlds@gmail.com";

    // 2. SUBJECT LINE
    $subject = "New Franchise Application - " . $name;

    // 3. EMAIL BODY
    $email_body = "
    NEW FRANCHISE APPLICATION
    ========================
    
    Full Name: $name
    Email: $email
    Phone: $phone
    Preferred Location: $location
    
    Message:
    $message
    
    ========================
    Submitted: " . date('F j, Y, g:i a') . "
    ";

    // We use 'noreply@' just for sending. 
    $server_domain = $_SERVER['SERVER_NAME']; // This gets 'danonos.com' automatically
    $headers = "From: noreply@" . $server_domain . "\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send email
    if (mail($to, $subject, $email_body, $headers)) {
        $_SESSION['franchise_success'] = "Thank you! Your franchise application has been submitted. Our team will contact you soon.";
    } else {
        $_SESSION['franchise_error'] = "Sorry, there was an error submitting your application. Please try again or email us directly at eiyadwnlds@gmail.com";
    }

    header("Location: ../franchise.php#apply");
    exit;
} else {
    header("Location: ../franchise.php");
    exit;
}
?>