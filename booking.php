<?php
include('header.php');

$conn = new mysqli("localhost", "root", "", "cottage_booking");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Force strict mode (prevents 0000-00-00)
$conn->query("SET SESSION sql_mode = 'STRICT_ALL_TABLES,NO_ZERO_DATE,NO_ZERO_IN_DATE'");

if(isset($_POST['book_now'])){

    // Safe inputs
    $stay_name = trim($_POST['stay_name'] ?? '');
    $name      = trim($_POST['name'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $phone     = trim($_POST['phone'] ?? '');
    $checkin   = trim($_POST['checkin'] ?? '');
    $checkout  = trim($_POST['checkout'] ?? '');
    $guests    = (int)($_POST['guests'] ?? 0);
    $children  = (int)($_POST['children'] ?? 0);

    // ---------------- BACKEND VALIDATION ----------------
    if ($stay_name === '' || $name === '' || $email === '' || $phone === '') {
        echo "<p class='text-danger text-center'>All fields are required.</p>";
        exit;
    }

    if ($checkin === '' || $checkout === '') {
        echo "<p class='text-danger text-center'>Please select both check-in and check-out dates.</p>";
        exit;
    }

    if (!strtotime($checkin) || !strtotime($checkout)) {
        echo "<p class='text-danger text-center'>Invalid date received.</p>";
        exit;
    }

    if ($checkout <= $checkin) {
        echo "<p class='text-danger text-center'>Check-out date must be after check-in date.</p>";
        exit;
    }

    if ($guests < 1) {
        echo "<p class='text-danger text-center'>Guests must be at least 1.</p>";
        exit;
    }
    // ----------------------------------------------------

    // Insert booking into database (NO stay_id)
    $stmt = $conn->prepare("
        INSERT INTO bookings 
        (stay_name, user_name, email, phone, checkin, checkout, guests, children) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ");

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param(
        "ssssssii",
        $stay_name,
        $name,
        $email,
        $phone,
        $checkin,
        $checkout,
        $guests,
        $children
    );

    if (!$stmt->execute()) {
        die("DB Error: " . $stmt->error);
    }

    if($stmt->affected_rows > 0){

        require 'mail/mailer.php';

        // -------------------- USER MAIL --------------------
        $subject = "Booking Request Received – Happy HomeStays";

        $body = "
        <div style='font-family: Arial, sans-serif; line-height: 1.6;'>
            <h2 style='color:#2c3e50;'>Hello $name 👋</h2>
            <p>Thank you for choosing <b>Happy HomeStays</b>.</p>

            <table cellpadding='8' cellspacing='0' border='1' style='border-collapse:collapse;'>
                <tr><th align='left'>Stay Name</th><td>$stay_name</td></tr>
                <tr><th align='left'>Check-in</th><td>$checkin</td></tr>
                <tr><th align='left'>Check-out</th><td>$checkout</td></tr>
                <tr><th align='left'>Guests</th><td>$guests</td></tr>
                <tr><th align='left'>Children</th><td>$children</td></tr>
                <tr><th align='left'>Status</th><td><b style='color:orange;'>Pending</b></td></tr>
            </table>

            <p style='margin-top:15px;'>Our team will confirm shortly.</p>
            <p>Regards,<br><b>Happy HomeStays Team</b></p>
        </div>";

        sendMail($email, $subject, $body);

        // -------------------- ADMIN MAIL --------------------
        sendMail(
            "gadesania@gmail.com",
            "New Booking Received",
            "<p>New booking by <b>$name</b><br>
            Stay: $stay_name<br>
            Check-in: $checkin<br>
            Check-out: $checkout<br>
            Guests: $guests<br>
            Children: $children</p>"
        );

        $booking_success = true;
    }

    $stmt->close();
}

$conn->close();
?>

<div class="container py-5">
  <h2 class="fw-bold mb-4 text-center">Book Your Stays</h2>

  <form method="POST" class="row g-3 shadow p-4 rounded bg-white">

    <div class="col-md-6">
      <label>Select Stay</label>
      <select name="stay_name" class="form-select" required>
        <option value="">--Choose Your Stay--</option>
        <option value="Sea Breeze Cottage">Sea Breeze Cottage</option>
        <option value="Green Valley Stay">Green Valley Stay</option>
        <option value="Forest Retreat">Forest Retreat</option>
        <option value="Hill Escape Cottage">Hill Escape Cottage</option>
        <option value="Cityside Retreat">Cityside Retreat</option>
      </select>
    </div>

    <div class="col-md-6">
      <label>Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>

    <div class="col-md-6">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>

    <div class="col-md-6">
      <label>Phone</label>
      <input type="text" name="phone" class="form-control" pattern="\d{10}" required>
    </div>

    <div class="col-md-3">
      <label>Check-in</label>
      <input type="date" id="checkin" name="checkin" class="form-control" required>
    </div>

    <div class="col-md-3">
      <label>Check-out</label>
      <input type="date" id="checkout" name="checkout" class="form-control" required>
    </div>

    <div class="col-md-6">
      <label>Guests</label>
      <input type="number" name="guests" class="form-control" min="1" required>
    </div>

    <div class="col-md-3">
      <label>Children</label>
      <input type="number" name="children" class="form-control" min="0" value="0">
    </div>

    <div class="col-12 text-center">
      <button type="submit" name="book_now" class="btn btn-success px-5">Confirm Booking</button>
    </div>

  </form>
</div>

<!-- ===================== BOOKING SUCCESS MODAL ===================== -->
<?php if(isset($booking_success) && $booking_success): ?>

<!-- Modal HTML -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="bookingModalLabel">🎉 Booking Successful</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <p><b>Stay:</b> <?= htmlspecialchars($stay_name) ?></p>
        <p><b>Name:</b> <?= htmlspecialchars($name) ?></p>
        <p><b>Email:</b> <?= htmlspecialchars($email) ?></p>
        <p><b>Check-in:</b> <?= htmlspecialchars($checkin) ?></p>
        <p><b>Check-out:</b> <?= htmlspecialchars($checkout) ?></p>
        <p><b>Guests:</b> <?= htmlspecialchars($guests) ?></p>
        <p><b>Children:</b> <?= htmlspecialchars($children) ?></p>

        <hr>
        <p class="text-success fw-bold">
          ✅ Your booking has been submitted successfully.  
          Our team will contact you soon.
        </p>
      </div>

      <div class="modal-footer">
        <a href="index.php" class="btn btn-success">OK</a>
      </div>

    </div>
  </div>
</div>

<!-- Bootstrap 5 JS (Make sure this is included in your page) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Ensure the modal is in the DOM before showing
    var bookingModalEl = document.getElementById('bookingModal');
    var bookingModal = new bootstrap.Modal(bookingModalEl);
    bookingModal.show();
});
</script>

<?php endif; ?>
<script>
let today = new Date().toISOString().split('T')[0];
document.getElementById("checkin").min = today;
document.getElementById("checkout").min = today;

document.getElementById("checkin").addEventListener("change", function () {
  let checkout = document.getElementById("checkout");
  checkout.value = "";
  checkout.min = this.value;
});
</script>

<?php include('footer.php'); ?>
