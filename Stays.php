<?php
include('../db.php');
include('header.php');
include('sidebar.php');

/* DELETE STAY */
if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM stays WHERE id=$id");
    header("Location: stays.php");
    exit;
}

/* FETCH STAYS */
$stays = mysqli_query($conn, "SELECT * FROM stays ORDER BY id DESC");
?>

<div class="content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="page-title">🏠 Stays</h3>
        <a href="add_stay.php" class="btn btn-primary">➕ Add Stay</a>
    </div>

    <div class="table-responsive bg-white p-3 rounded shadow-sm">
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Stay Name</th>
                    <th>Location</th>
                    <th>Price (₹)</th>
                    <th>Rating</th>
                    <th>Description</th>
                    <th>Amenities</th>
                    <th width="160">Action</th>
                </tr>
            </thead>

            <tbody>
            <?php if(mysqli_num_rows($stays) > 0){ ?>
                <?php while($row = mysqli_fetch_assoc($stays)){ ?>
                <tr>
                    <td>#<?= $row['id']; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= ucfirst($row['location']); ?></td>
                    <td>₹<?= number_format($row['price']); ?></td>
                    <td><?= $row['rating']; ?> ⭐</td>
                    <td><?= substr($row['description'], 0, 50); ?>...</td>
                    <td><?= $row['amenities']; ?></td>
                    <td>
                        <a href="edit_stay.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">✏</a>
                        <a href="?delete=<?= $row['id']; ?>"
                           onclick="return confirm('Delete this stay?')"
                           class="btn btn-sm btn-danger">🗑</a>
                    </td>
                </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="8" class="text-center">No stays found</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

