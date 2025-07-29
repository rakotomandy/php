<?php
// ================================
// PHP MAIL SENDING LESSON
// ================================

// The `mail()` function is used to send emails directly from a PHP script.
// Syntax: mail(to, subject, message, headers, parameters);

// -------------------------------
// Step 1: Define the recipient email address
$to = "recipient@example.com"; 
// Replace with the actual recipient's email address

// -------------------------------
// Step 2: Define the subject of the email
$subject = "Welcome to Our Website!";
// This will appear as the email subject in the recipient's inbox

// -------------------------------
// Step 3: Define the message body of the email
$message = "Hello,\n\nThank you for registering on our website. We are glad to have you!\n\nRegards,\nYour Company";
// The "\n" creates a new line in the email body

// -------------------------------
// Step 4: Define the email headers
$headers = "From: admin@yourdomain.com\r\n"; // Sender email
$headers .= "Reply-To: support@yourdomain.com\r\n"; // Reply address
$headers .= "X-Mailer: PHP/" . phpversion(); // Shows that PHP is used to send the mail

// -------------------------------
// Step 5: Send the email
$sent = mail($to, $subject, $message, $headers);

// -------------------------------
// Step 6: Check if the email was sent successfully
if ($sent) {
    echo "Email successfully sent to $to";
} else {
    echo "Email sending failed.";
}
?>
