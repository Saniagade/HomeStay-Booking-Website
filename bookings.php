<?php
include('../db.php');
include('header.php');
include('sidebar.php');

/* APPROVE */
// if (isset($_GET['approve'])) {
//     $id = $_GET['approve'];
//     mysqli_query($conn, "UPDATE bookings SET status='Confirmed' WHERE id=$id");
//     header("Location: bookings.php");
// }

/* APPROVE */
if (isset($_GET['approve'])) {
    $id = $_GET['approve'];

    // 1️⃣ Update booking status
    mysqli_query($conn, "UPDATE bookings SET status='Confirmed' WHERE id=$id");

    // 2️⃣ Fetch booking details
    $q = mysqli_query($conn, "SELECT * FROM bookings WHERE id=$id");
    $b = mysqli_fetch_assoc($q);

    // 3️⃣ Send confirmation email
    //include('send_mail.php');
    include('../mail/mailer.php'); // make sure path is correct
    // You can move the email code from send_mail.php here directly if you want:
    $subject = "Booking Confirmed - Happy HomeStays";
    $body = "
Hello {$b['user_name']},  

Your booking for <b>{$b['stay_name']}</b> is CONFIRMED 🎉  

Check-in: {$b['checkin']}  
Check-out: {$b['checkout']}   

Thank you for choosing Happy HomeStays!
";
    sendMail($b['email'], $subject, $body);

    // 4️⃣ Redirect back
    header("Location: bookings.php");
    exit;
}

/* REJECT */
if (isset($_GET['reject'])) {
    $id = $_GET['reject'];
    mysqli_query($conn, "UPDATE bookings SET status='Cancelled' WHERE id=$id");
    header("Location: bookings.php");
}

/* DELETE */
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM bookings WHERE id=$id");
    header("Location: bookings.php");
}

/* FETCH BOOKINGS */
$bookings = mysqli_query($conn, "
    SELECT * FROM bookings 
    ORDER BY created_at DESC
");
?>

<div class="content">
    <h3 class="page-title">📅 Bookings</h3>

    <div class="table-responsive bg-white p-3 rounded shadow-sm">
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Stay</th>
                    <th>Guest</th>
                    <th>Phone</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Guests</th>
                    <th>Status</th>
                    <th width="240">Action</th>
                </tr>
            </thead>

            <tbody>
            <?php while($row = mysqli_fetch_assoc($bookings)) { ?>
                <tr>
                    <td>#<?= $row['id']; ?></td>
                    <td><?= $row['stay_name']; ?></td>
                    <td><?= $row['user_name']; ?></td>
                    <td><?= $row['phone']; ?></td>
                    <td><?= $row['checkin']; ?></td>
                    <td><?= $row['checkout']; ?></td>
                    <td><?= $row['guests']; ?></td>

                    <!-- STATUS -->
                    <td>
                        <?php if($row['status'] == 'Pending'){ ?>
                            <span class="badge bg-warning text-dark">Pending</span>
                        <?php } elseif($row['status'] == 'Confirmed'){ ?>
                            <span class="badge bg-success">Confirmed</span>
                        <?php } else { ?>
                            <span class="badge bg-danger">Cancelled</span>
                        <?php } ?>
                    </td>

                    <!-- ACTIONS -->
                    <td>
        

                        <?php if($row['status'] == 'Pending'){ ?>
                            <a href="?approve=<?= $row['id']; ?>" class="btn btn-sm btn-success">✔</a>
                            <a href="?reject=<?= $row['id']; ?>" class="btn btn-sm btn-warning">✖</a>
                        <?php } ?>

                        <a href="?delete=<?= $row['id']; ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Delete this booking?')">
                           🗑
                        </a>
                    </td>
                </tr>

                <!-- VIEW MODAL -->
                <div class="modal fade" id="view<?= $row['id']; ?>" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Booking Details</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <p><strong>Stay:</strong> <?= $row['stay_name']; ?></p>
                                <p><strong>Guest:</strong> <?= $row['user_name']; ?></p>
                                <p><strong>Email:</strong> <?= $row['email']; ?></p>
                                <p><strong>Phone:</strong> <?= $row['phone']; ?></p>
                                <p><strong>Check-in:</strong> <?= $row['checkin']; ?></p>
                                <p><strong>Check-out:</strong> <?= $row['checkout']; ?></p>
                                <p><strong>Guests:</strong> <?= $row['guests']; ?></p>
                                <p><strong>Children:</strong> <?= $row['children']; ?></p>
                                <p><strong>Status:</strong> <?= $row['status']; ?></p>
                            </div>
                                <button class="btn btn-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
