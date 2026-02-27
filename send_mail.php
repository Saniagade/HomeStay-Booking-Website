<?php
// Absolute path includes (BEST PRACTICE)
require_once($_SERVER['DOCUMENT_ROOT'].'/HomeStays/admin/db.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/HomeStays/mail/mailer.php');

// Validate ID
if (!isset($_GET['id'])) {
    header("Location: ../admin/bookings.php");
    exit;
}

$id = intval($_GET['id']); // security

// Fetch booking details
$q = mysqli_query($conn, "SELECT * FROM bookings WHERE id = $id");

if (!$q || mysqli_num_rows($q) == 0) {
    header("Location: ../admin/bookings.php");
    exit;
}

$b = mysqli_fetch_assoc($q);

// Email content
$subject = "Booking Confirmed - HomeStays";
$body = "
Hello {$b['user_name']},<br><br>

Your booking for <b>{$b['stay_name']}</b> is <b>CONFIRMED 🎉</b><br><br>

<b>Check-in:</b> {$b['checkin']}<br>
<b>Check-out:</b> {$b['checkout']}<br><br>

Thank you for choosing <b>HomeStays</b>!<br>
We look forward to hosting you 😊
";

// Send mail
sendMail($b['email'], $subject, $body);

// Redirect back
header("Location: ../admin/bookings.php?mail=success");
exit;

