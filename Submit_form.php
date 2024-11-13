<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Capture form data
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required. Please go back and fill out the form completely.";
        exit;
    }

    // Prepare email information
    $to = "ahlawataryan008@gmail.com";  // Replace with your email address
    $subject = "New Contact Form Submission from $name";
    $email_body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $email_body, $headers)) {
        echo "Thank you, $name! Your message has been sent successfully.";
    } else {
        echo "Sorry, there was an issue sending your message. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
