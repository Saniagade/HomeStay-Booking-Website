<?php
include 'mail/mailer.php';

$to = 'gadesania@gmail.com';
$subject = 'PHPMailer Test';
$body = '<h2>Success 🎉</h2><p>Your HomeStays mail system is working.</p>';

$result = sendMail($to, $subject, $body);

echo $result === true ? 'Mail Sent Successfully ✅' : $result;
?>
