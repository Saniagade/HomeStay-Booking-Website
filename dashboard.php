<?php
include('../db.php');
include('header.php');
include('sidebar.php');

$stays = mysqli_num_rows(mysqli_query($conn,"SELECT id FROM stays"));
$bookings = mysqli_num_rows(mysqli_query($conn,"SELECT id FROM bookings"));
$pending = mysqli_num_rows(mysqli_query($conn,"SELECT id FROM bookings WHERE status='Pending'"));

$recent = mysqli_query($conn,"
    SELECT user_name, stay_name, checkin, checkout, status 
    FROM bookings 
    ORDER BY created_at DESC 
    LIMIT 5
");
?>

<!-- <div class="content">
<h3>Dashboard</h3>

<div class="row">
    <div class="col-md-3"><div class="card p-3">Total Stays<br><b><?= $stays ?></b></div></div>
    <div class="col-md-3"><div class="card p-3">Total Bookings<br><b><?= $bookings ?></b></div></div>
    <div class="col-md-3"><div class="card p-3">Pending<br><b><?= $pending ?></b></div></div>
</div>
</div> -->

<div class="content">
    <h3 class="page-title">Dashboard</h3>

    <!-- DASHBOARD CARDS -->
    <div class="dashboard-cards">
        <div class="dash-card stays">
            <p>Total Stays</p>
            <h2><?= $stays ?></h2>
        </div>

        <div class="dash-card bookings">
            <p>Total Bookings</p>
            <h2><?= $bookings ?></h2>
        </div>

        <div class="dash-card pending">
            <p>Pending</p>
            <h2><?= $pending ?></h2>
        </div>
    </div>

    <!-- ✅ RECENT BOOKINGS (NOW DOWN PROPERLY) -->
    <div class="recent-bookings mt-5">
        <h4 class="mb-3">Recent Bookings</h4>

        <table class="table table-bordered bg-white shadow-sm">
            <thead class="table-light">
                <tr>
                    <th>User</th>
                    <th>Stay</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
            <?php if(mysqli_num_rows($recent) > 0): ?>
                <?php while($row = mysqli_fetch_assoc($recent)): ?>
                <tr>
                    <td><?= $row['user_name'] ?></td>
                    <td><?= $row['stay_name'] ?></td>
                    <td><?= $row['checkin'] ?></td>
                    <td><?= $row['checkout'] ?></td>
                    <td>
                        <?php if($row['status'] == 'Pending'): ?>
                            <span class="badge bg-warning">Pending</span>
                        <?php elseif($row['status'] == 'Confirmed'): ?>
                            <span class="badge bg-success">Confirmed</span>
                        <?php else: ?>
                            <span class="badge bg-danger">Cancelled</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No bookings found</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

</div> <!-- END content -->
</body></html>
