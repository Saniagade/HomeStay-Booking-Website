<?php
// Include your mailer
include('../mail/mailer.php'); // make sure path is correct

// Test email
$to = "swatigade137@gmail.com";   // <-- replace with your real email
$subject = "Test Email from HomeStays";
$body = "Hello! This is a test email to check if sendMail() works.";

// Send mail
if(sendMail($to, $subject, $body)){
    echo "✅ Email sent successfully!";
} else {
    echo "❌ Email failed!";
}
?>
