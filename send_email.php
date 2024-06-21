<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Set recipient email address
    $to = 'ashtonbrissonwork@gmail.com'; // Replace with your email address
    
    // Set email subject
    $subject = 'New Message from Contact Form';
    
    // Compose email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";
    
    // Set headers
    $headers = "From: $name <$email>";
    
    // Send email
    if (mail($to, $subject, $email_content, $headers)) {
        // Email sent successfully
        echo json_encode(array('status' => 'success', 'message' => 'Thank you! Your message has been sent.'));
    } else {
        // Email sending failed
        echo json_encode(array('status' => 'error', 'message' => 'Oops! Something went wrong. Please try again later.'));
    }
} else {
    // Handle other request methods if needed
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request method.'));
}
?>
