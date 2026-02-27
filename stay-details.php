<?php 
include('header.php');  

/* STAY DATA (NO DATABASE) */
$stays = [
  1 => [
    "name" => "Sea Breeze Cottage",
    "location" => "Alibaug, Konkan",
    "price" => "₹3,500 / night",
    "rating" => "⭐⭐⭐⭐☆ (4.3)",
    "description" => "A peaceful seaside cottage near Alibaug beach. Perfect for families and couples looking for a calm Konkan experience.",
    "amenities" => ["🌊 Sea View", "📶 Free WiFi", "🚗 Parking", "🍽 Home-style meals"],
    "host" => "Nilesh Patil",
    "contact" => "+91 9372467802",
    "images" => [
      "image/alibaug1.jpg",
      "image/alibaug2.jpg"
    ]
  ],

  2 => [
    "name" => "Green Valley Stay",
    "location" => "Mahabaleshwar, Western Ghats",
    "price" => "₹5,200 / night",
    "rating" => "⭐⭐⭐⭐⭐ (4.8)",
    "description" => "A scenic hilltop stay surrounded by valleys, strawberry farms and misty mornings.",
    "amenities" => ["🌄 Valley View", "🔥 Bonfire", "📶 Free WiFi", "🚗 Parking"],
    "host" => "Amit Kulkarni",
    "contact" => "+91 8237887233",
    "images" => [
      "image/mahabaleshwar1.jpeg",
      "image/mahabaleshwar2.jpeg"
      
    ]
  ],

   3 => [
    "name" => "Forest Retreat",
    "location" => "Tadoba, Vidarbha",
    "price" => "₹4,000 / night",
    "rating" => "⭐⭐⭐⭐☆ (4.4)",
    "description" => "A jungle-side eco stay close to Tadoba Tiger Reserve, ideal for wildlife lovers.",
    "amenities" => ["🐯 Jungle Safari", "🔥 Campfire", "🍽 Local Food", "🚗 Parking"],
    "host" => "Ramesh Deshmukh",
    "contact" => "+91 7236789402",
    "images" => [
      "image/tadoba1.jpeg",
      "image/tadoba2.jpeg"
      
    ]
  ],

   4 => [
    "name" => "Hill Escape Cottage",
    "location" => "Lonavala, near Pune",
    "price" => "₹3,000 / night",
    "rating" => "⭐⭐⭐⭐☆ (4.5)",
    "description" => "A cozy hill cottage surrounded by misty mountains and waterfalls, perfect for weekend getaways.",
    "amenities" => ["⛰ Mountain View", "🔥 Bonfire", "📶 Free WiFi", "🚗 Parking"],
    "host" => "Sanjay Kulkarni",
    "contact" => "+91 9370442666",
    "images" => [
      "image/lonavala1.jpeg",
      "image/lonavala2.jpg"
    ]
  ],

  5  => [
    "name" => " Cityside Retreat",
    "location" => "Mulshi, Pune Region",
    "price" => "₹3,800 / night",
    "rating" => "⭐⭐⭐⭐☆ (4.3)",
    "description" => "A peaceful nature retreat near Mulshi lake surrounded by greenery and hills.",
    "amenities" => ["🌿 Nature View", "🔥 Bonfire", "📶 Free WiFi", "🚗 Parking"],
    "host" => "Rahul Joshi",
    "contact" => "+91 8237897344",
    "images" => [
      "image/pune1.jpeg",
      "image/pune2.jpeg"
    ]
  ],

];

/* GET STAY KEY */
$stay_id = $_GET['stay_id'] ?? 0;  // default 0 if not set

if (!isset($stays[$stay_id])) {
  echo "<div class='container py-5 text-center'><h3>Stay not found</h3></div>";
  include('footer.php');
  exit;
}

$stay = $stays[$stay_id];
?>

<!-- PAGE HEADER -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="fw-bold"><?= $stay['name']; ?></h2>
    <p class="text-muted"><?= $stay['location']; ?></p>
  </div>
</section>

<!-- DETAILS -->
<section class="py-5">
  <div class="container">
    <div class="row g-4">

      <!-- LEFT -->
      <div class="col-lg-8">
        <p><?= $stay['rating']; ?></p>

        <div class="row g-3">
          <?php foreach($stay['images'] as $img): ?>
            <div class="col-md-4">
              <img src="<?= $img; ?>" class="img-fluid rounded">
            </div>
          <?php endforeach; ?>
        </div>

        <h5 class="mt-4">About this stay</h5>
        <p><?= $stay['description']; ?></p>

        <h6>Amenities</h6>
        <ul>
          <?php foreach($stay['amenities'] as $item): ?>
            <li><?= $item; ?></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- RIGHT -->
      <div class="col-lg-4">
        <div class="border rounded p-4 shadow-sm">
          <h4 class="text-success"><?= $stay['price']; ?></h4>
          <a href="booking.php?stay_id=<?= $stay_id; ?>" class="btn btn-success w-100 my-2">Book Now</a>
    
          <hr>
          <h6>Host</h6>
          <p>👤 <?= $stay['host']; ?></p>
          <p>📞 <?= $stay['contact']; ?></p>
        </div>
      </div>

    </div>
  </div>
</section>

<?php include('footer.php'); ?>
