<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer files
// require 'PHPMailer/Exception.php';
// require 'PHPMailer/PHPMailer.php';
// require 'PHPMailer/SMTP.php';

// Load PHPMailer safely using absolute paths
require_once __DIR__ . '/PHPMailer/Exception.php';
require_once __DIR__ . '/PHPMailer/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/SMTP.php';

// Function to send email
function sendMail($to, $subject, $body, $from = 'gadesania@gmail.com', $fromName = 'HomeStays') {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'gadesania@gmail.com';               // SMTP username
        $mail->Password   = 'lhkc mgcp jmob lhfk';                  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption
        $mail->Port       = 587;                                    // TCP port (usually 587 for TLS)

        //Recipients
        $mail->setFrom('gadesania@gmail.com', 'HomeStays');
        $mail->addAddress($to);                                     // Add a recipient

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Example usage (remove/comment in production)

?>
