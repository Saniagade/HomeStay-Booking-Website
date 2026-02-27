<?php
include('../db.php');
include('header.php');
include('sidebar.php');

if(isset($_POST['add_stay'])){
    $name = $_POST['name'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $rating = $_POST['rating'];
    $description = $_POST['description'];
    $amenities = implode(", ", $_POST['amenities']);

    mysqli_query($conn,"INSERT INTO stays 
        (name, location, price, rating, description, amenities)
        VALUES 
        ('$name','$location','$price','$rating','$description','$amenities')
    ");

    header("Location: stays.php");
    exit;
}
?>

<div class="content">
    <h3 class="page-title">➕ Add New Stay</h3>

    <div class="bg-white p-4 rounded shadow-sm" style="max-width:700px;">
        <form method="POST">

            <div class="mb-3">
                <label>Stay Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Location</label>
                <input type="text" name="location" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Price (₹)</label>
                <input type="number" name="price" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Rating</label>
                <input type="number" step="0.1" name="rating" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label>Amenities</label><br>
                <input type="checkbox" name="amenities[]" value="WiFi"> WiFi
                <input type="checkbox" name="amenities[]" value="AC"> AC
                <input type="checkbox" name="amenities[]" value="Parking"> Parking
                <input type="checkbox" name="amenities[]" value="Pool"> Pool
                <input type="checkbox" name="amenities[]" value="Breakfast"> Breakfast
            </div>

            <button name="add_stay" class="btn btn-success">Save Stay</button>
            <a href="stays.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

</body>
</html>
