<!-- send-email.php -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = 'prageethchamara960@gmail.com';
    $subject = 'New Contact Form Submission';
    $body = "Name: $name\nEmail: $email\nMessage: $message";

    if (mail($to, $subject, $body)) {
        echo 'Message sent successfully';
    } else {
        echo 'There was an error sending the message';
    }
}
?>

<?php

// Input validation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
        echo "Please enter a valid name.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter a valid email address.";
    }

    // Email verification
    $verification_code = md5($email);
    $to = $email;
    $subject = "Email Verification";
    $message = "Click the following link to verify your email address: https://example.com/verify.php?email=$email&code=$verification_code";
    $headers = "From: webmaster@example.com" . "\r\n" . "Reply-To: webmaster@example.com" . "\r\n" . "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo "An email has been sent to your email address. Please click the verification link to confirm your email address.";
    } else {
        echo "Failed to send email. Please try again later.";
    }
}

// Email verification
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['email']) && isset($_GET['code'])) {
    $email = $_GET['email'];
    $verification_code = $_GET['code'];

    // Validate email and verification code
    // Update database to indicate that email has been verified
}

?>