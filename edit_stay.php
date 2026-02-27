<?php
include('../db.php');
include('header.php');
include('sidebar.php');

$id = $_GET['id'];
$stay = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM stays WHERE id=$id"));

if(isset($_POST['update_stay'])){
    $name = $_POST['name'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $rating = $_POST['rating'];
    $description = $_POST['description'];
    $amenities = implode(", ", $_POST['amenities']);

    mysqli_query($conn,"UPDATE stays SET 
        name='$name',
        location='$location',
        price='$price',
        rating='$rating',
        description='$description',
        amenities='$amenities'
        WHERE id=$id
    ");

    header("Location: stays.php");
    exit;
}
?>

<div class="content">
    <h3 class="page-title">✏ Edit Stay</h3>

    <div class="bg-white p-4 rounded shadow-sm" style="max-width:700px;">
        <form method="POST">

            <div class="mb-3">
                <label>Stay Name</label>
                <input type="text" name="name" value="<?= $stay['name']; ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Location</label>
                <input type="text" name="location" value="<?= $stay['location']; ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Price (₹)</label>
                <input type="number" name="price" value="<?= $stay['price']; ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Rating</label>
                <input type="number" step="0.1" name="rating" value="<?= $stay['rating']; ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="3" required><?= $stay['description']; ?></textarea>
            </div>

            <div class="mb-3">
                <label>Amenities</label><br>
                <?php
                $amenitiesArr = explode(", ", $stay['amenities']);
                foreach(["WiFi","AC","Parking","Pool","Breakfast",] as $a):
                ?>
                    <input type="checkbox" name="amenities[]" value="<?= $a ?>"
                        <?= in_array($a,$amenitiesArr) ? 'checked' : '' ?>> <?= $a ?>
                <?php endforeach; ?>
            </div>

            <button name="update_stay" class="btn btn-primary">Update Stay</button>
            <a href="stays.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

</body>
</html>
