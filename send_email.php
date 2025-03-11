<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form fields
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Email settings
    $to = "ps4066367@gmail.com"; // Replace with your email
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n"; // Optional for better formatting

    // Email subject and message
    $email_subject = "New Contact Form Submission: " . $subject;
    $email_message = "<html><body>";
    $email_message .= "<h2>Contact Form Submission</h2>";
    $email_message .= "<p><strong>Name:</strong> " . $name . "</p>";
    $email_message .= "<p><strong>Email:</strong> " . $email . "</p>";
    $email_message .= "<p><strong>Subject:</strong> " . $subject . "</p>";
    $email_message .= "<p><strong>Message:</strong></p><p>" . nl2br($message) . "</p>";
    $email_message .= "</body></html>";

    // Send email
    if (mail($to, $email_subject, $email_message, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Message failed to send.";
    }
}
?>
