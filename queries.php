<?php
include('../db.php');
include('header.php');
include('sidebar.php');

/* DELETE QUERY */
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn,"DELETE FROM inquiries WHERE id=$id");
    header("Location: queries.php");
    exit;
}

/* FETCH QUERIES */
$queries = mysqli_query($conn,"SELECT * FROM inquiries ORDER BY created_at DESC");
?>

<div class="content">
    <h3 class="page-title">📩 Contact Inquiries</h3>

    <div class="table-responsive bg-white p-3 rounded shadow-sm">
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th width="180">Action</th>
                </tr>
            </thead>

            <tbody>
            <?php if(mysqli_num_rows($queries) > 0){ ?>
                <?php while($row = mysqli_fetch_assoc($queries)){ ?>
                <tr>
                    <td>#<?= $row['id']; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= substr($row['message'],0,40); ?>...</td>
                    <td><?= date("d M Y", strtotime($row['created_at'])); ?></td>
                    <td>
                        <!-- DELETE -->
                        <a href="?delete=<?= $row['id']; ?>"
                           onclick="return confirm('Delete this inquiry?')"
                           class="btn btn-sm btn-danger">
                           🗑
                        </a>
                    </td>
                </tr>

                <!-- VIEW MODAL -->
                <div class="modal fade" id="view<?= $row['id']; ?>">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Inquiry Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p><b>Name:</b> <?= $row['name']; ?></p>
                                <p><b>Email:</b> <?= $row['email']; ?></p>
                                <p><b>Subject:</b> <?= $row['subject']; ?></p>
                                <p><b>Message:</b><br><?= $row['message']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="6" class="text-center">No inquiries found</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
