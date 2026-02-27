<?php include('header.php'); ?>
<?php
$conn = new mysqli("localhost", "root", "", "cottage_booking");

// Handle contact form submission
if(isset($_POST['send_message'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO inquiries (name, email, subject, message) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    $stmt->execute();

    // Optional: send email notification to admin
    require 'mail/mailer.php';
    sendMail("admin@gmail.com", "New User Inquiry",
        "<p>New inquiry from <b>$name</b> (<i>$email</i>)</p>
         <p>Subject: $subject</p>
         <p>Message: $message</p>");

    echo "<script>alert('Your message has been sent successfully!');</script>";
}
?>

<!-- ABOUT HERO -->
<section class="py-5 text-center text-white" style="background:linear-gradient(135deg,#2193b0,#6dd5ed);">
  <div class="container">
    <h1 class="fw-bold">About Happy HomeStays</h1>
    <p class="lead">Comfort • Nature • Local Hospitality</p>
  </div>
</section>

<!-- ABOUT CONTENT -->
<section class="py-5">
  <div class="container">
    <div class="row align-items-center">

      <div class="col-md-6 mb-4">
        <h3 class="fw-bold mb-3">Who We Are</h3>
        <p class="text-muted">
          Happy HomeStays connects travelers with beautiful cottages,
          homestays, and nature retreats across Maharashtra.
        </p>
        <p class="text-muted">
          We believe in authentic travel experiences, warm hospitality,
          and peaceful stays surrounded by nature.
        </p>
      </div>

      <div class="col-md-6 mb-4">
        <div class="card shadow border-0 rounded-4">
          <div class="card-body">
            <h5 class="fw-bold mb-3">Why Choose Us?</h5>
            <ul class="list-unstyled">
              <li class="mb-2">✔ Verified & trusted homestays</li>
              <li class="mb-2">✔ Affordable pricing</li>
              <li class="mb-2">✔ Scenic destinations</li>
              <li class="mb-2">✔ Easy & secure booking</li>
              <li class="mb-2">✔ Friendly customer support</li>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- MISSION & VISION -->
<section class="py-5 bg-light">
  <div class="container">
    <div class="row text-center">

      <div class="col-md-6 mb-3">
        <div class="card h-100 shadow-sm border-0 rounded-4">
          <div class="card-body">
            <h4 class="fw-bold text-success">Our Mission</h4>
            <p class="text-muted">
              To make travel comfortable, affordable, and memorable by
              promoting quality homestays and local tourism.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <div class="card h-100 shadow-sm border-0 rounded-4">
          <div class="card-body">
            <h4 class="fw-bold text-primary">Our Vision</h4>
            <p class="text-muted">
              To become the most trusted homestay booking platform
              connecting travelers with nature-friendly stays.
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- CONTACT / QUERY SECTION -->
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">

      <div class="col-md-8">
        <div class="card shadow border-0 rounded-4">
          <div class="card-body p-4">
            <h3 class="fw-bold mb-4 text-center">Send Us a Message</h3>

            <form method="POST">
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Your Email" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Subject</label>
                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Message</label>
                <textarea name="message" rows="4" class="form-control" placeholder="Write your message..." required></textarea>
              </div>

              <div class="text-center">
                <button type="submit" name="send_message" class="btn btn-success px-4">
                  Send Message
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<?php include('footer.php'); ?>

