<?php 
include('header.php');  ?>


<!-- PAGE HEADER -->
<section class="py-5 bg-light text-center">
  <div class="container">
    <h2 class="fw-bold">Our Featured Homestays</h2>
    <p class="text-muted">Handpicked cottages & nature stays across Maharashtra</p>
  </div>
</section>

<!-- STAYS + FILTERS -->
<section class="py-5">
  <div class="container">
    <div class="row">

      <!-- FILTER SIDEBAR -->
      <div class="col-lg-3 mb-4">
        <div class="card shadow-sm p-4 sticky-top" style="top:20px;">
          <h5 class="fw-bold mb-3">Filter Stays</h5>

          <!-- PRICE FILTER -->
          <label class="form-label">Price Range</label>
          <select class="form-select mb-3" id="priceFilter">
            <option value="all">All</option>
            <option value="3000">Below ₹3,000</option>
            <option value="4000">Below ₹4,000</option>
            <option value="5000">Below ₹5,000</option>
          </select>

          <!-- STAR FILTER -->
          <label class="form-label">Star Rating</label>
          <select class="form-select mb-3" id="starFilter">
            <option value="all">All</option>
            <option value="4">4 ⭐ & above</option>
            <option value="5">5 ⭐ only</option>
          </select>

          <!-- USER RATING -->
          <label class="form-label">User Rating</label>
          <select class="form-select" id="ratingFilter">
            <option value="all">All</option>
            <option value="4.3">4.3+</option>
            <option value="4.5">4.5+</option>
          </select>
        </div>
      </div>

      <!-- STAYS GRID -->
      <div class="col-lg-9">
        <div class="row g-4" id="stayList">

          <!-- ALIBAUG -->
          <div class="col-md-6 col-lg-4 stay-card" data-price="3500" data-stars="4" data-rating="4.3">
            <div class="card shadow-sm h-100 border-0">
              <img src="image/Sea Breeze.jpeg" class="img-fluid" style="height:220px; object-fit:cover;">
              <div class="card-body text-center">
                <span class="badge bg-warning mb-2">Konkan</span>
                <h5 class="card-title">Sea Breeze Cottage</h5>
                <p class="text-muted mb-1">📍 Alibaug</p>
                <p class="mb-1">⭐⭐⭐⭐☆ (4.3)</p>
                <p class="fw-bold text-success">₹3,500 / night</p>
                <a href="stay-details.php?stay_id=1" class="btn btn-success w-100">View Details</a>
                <!-- <a href="stay-details.php?stay=alibaug" class="btn btn-success w-100">View Details</a> -->
              </div>
            </div>
          </div>

          <!-- MAHABALESHWAR -->
          <div class="col-md-6 col-lg-4 stay-card" data-price="5200" data-stars="5" data-rating="4.7">
            <div class="card shadow-sm h-100 border-0">
              <img src="image/Stay4.jpeg" class="img-fluid" style="height:220px; object-fit:cover;">
              <div class="card-body text-center">
                <span class="badge bg-success mb-2">Western Ghats</span>
                <h5 class="card-title">Green Valley Stay</h5>
                <p class="text-muted mb-1">📍 Mahabaleshwar</p>
                <p class="mb-1">⭐⭐⭐⭐⭐ (4.7)</p>
                <p class="fw-bold text-success">₹5,200 / night</p>
                <a href="stay-details.php?stay_id=2" class="btn btn-success w-100">View Details</a>
              </div>
            </div>
          </div>

          <!-- TADOBA -->
          <div class="col-md-6 col-lg-4 stay-card" data-price="4000" data-stars="4" data-rating="4.4">
            <div class="card shadow-sm h-100 border-0">
              <img src="image/vidarbha.jpeg" class="img-fluid" style="height:220px; object-fit:cover;">
              <div class="card-body text-center">
                <span class="badge bg-danger mb-2">Vidarbha</span>
                <h5 class="card-title">Forest Retreat</h5>
                <p class="text-muted mb-1">📍 Tadoba</p>
                <p class="mb-1">⭐⭐⭐⭐☆ (4.4)</p>
                <p class="fw-bold text-success">₹4,000 / night</p>
                <a href="stay-details.php?stay_id=3" class="btn btn-success w-100">View Details</a>
              </div>
            </div>
          </div>

          <!-- LONAVALA -->
          <div class="col-md-6 col-lg-4 stay-card" data-price="4500" data-stars="4" data-rating="4.5">
            <div class="card shadow-sm h-100 border-0">
              <img src="image/Stay7.jpg" class="img-fluid" style="height:220px; object-fit:cover;">
              <div class="card-body text-center">
                <span class="badge bg-info mb-2">Western Ghats</span>
                <h5 class="card-title">Hilltop Cottage</h5>
                <p class="text-muted mb-1">📍 Lonavala</p>
                <p class="mb-1">⭐⭐⭐⭐☆ (4.5)</p>
                <p class="fw-bold text-success">₹4,500 / night</p>
                <a href="stay-details.php?stay_id=4" class="btn btn-success w-100">View Details</a>
              </div>
            </div>
          </div>

          <!-- PUNE -->
          <div class="col-md-6 col-lg-4 stay-card" data-price="3800" data-stars="4" data-rating="4.2">
            <div class="card shadow-sm h-100 border-0">
              <img src="Image/Stay8.jpeg" class="img-fluid" style="height:220px; object-fit:cover;">
              <div class="card-body text-center">
                <span class="badge bg-primary mb-2">Deccan</span>
                <h5 class="card-title">Cityside Retreat</h5>
                <p class="text-muted mb-1">📍 Pune</p>
                <p class="mb-1">⭐⭐⭐⭐☆ (4.3)</p>
                <p class="fw-bold text-success">₹3,800 / night</p>
                <a href="stay-details.php?stay_id=5" class="btn btn-success w-100">View Details</a>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<!-- FILTER SCRIPT -->
<script>
  const priceFilter = document.getElementById("priceFilter");
  const starFilter = document.getElementById("starFilter");
  const ratingFilter = document.getElementById("ratingFilter");
  const stays = document.querySelectorAll(".stay-card");

  function filterStays() {
    stays.forEach(stay => {
      const price = parseInt(stay.dataset.price);
      const stars = parseInt(stay.dataset.stars);
      const rating = parseFloat(stay.dataset.rating);

      const priceMatch = priceFilter.value === "all" || price <= priceFilter.value;
      const starMatch = starFilter.value === "all" || stars >= starFilter.value;
      const ratingMatch = ratingFilter.value === "all" || rating >= ratingFilter.value;

      stay.style.display = (priceMatch && starMatch && ratingMatch) ? "block" : "none";
    });
  }

  priceFilter.addEventListener("change", filterStays);
  starFilter.addEventListener("change", filterStays);
  ratingFilter.addEventListener("change", filterStays);
</script>

<?php include('footer.php'); ?>
