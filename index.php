<?php
include('header.php');
?>
<style>
.hero {
    background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
                url('carousel/4.png') center/cover no-repeat;
    height: 85vh;
    color: #fff;
    display: flex;
    align-items: center;
}

.hero h1 {
    font-size: 3rem;
    font-weight: 600;
}

.region-card img,
.stay-card img {
    height: 200px;
    object-fit: cover;
    border-radius: 10px;
}

.region-card, .stay-card {
    transition: transform 0.3s;
}

.region-card:hover, .stay-card:hover {
    transform: translateY(-5px);
}
</style>

<!-- HERO SECTION -->
<section class="hero">
    <div class="container text-center">
        <h1>Discover cottage stays across Maharashtra’s most beautiful regions</h1>
        <p class="lead mt-3">Book cottages, homestays & local experiences inspired by MTDC</p>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <form class="d-flex">
                    <input type="text" class="form-control me-2" placeholder="Enter location (e.g. Lonavala)">
                    <button class="btn btn-success">Search</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- AVAILABILITY FORM -->
<div class="container my-5">
    <div class="bg-white shadow p-4 rounded">
        <h4 class="mb-4 text-center">CHECK BOOKING AVAILABILITY</h4>

        <form method="POST" action="stays.php">
            <div class="row g-3">
                
                <div class="col-md-3">
                    <label class="form-label">Check-in</label>
                    <input type="date" name="checkin" id="checkin" class="form-control" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Check-out</label>
                    <input type="date" name="checkout" id="checkout" class="form-control" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Adults</label>
                    <select name="adults" class="form-select">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>

                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" name="checkAvailability" class="btn btn-success w-100">
                        Check Availability
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>

<script>
let today = new Date().toISOString().split('T')[0];
document.getElementById("checkin").setAttribute("min", today);
document.getElementById("checkout").setAttribute("min", today);
document.getElementById("checkin").addEventListener("change", function () {
    document.getElementById("checkout").setAttribute("min", this.value);
});
</script>

<!-- REGIONS SECTION -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Explore by Region</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="region-card">
                    <img src="Image/konkan Coast.jpeg" class="img-fluid">
                    <h5 class="mt-2 text-center">Konkan Coast</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="region-card">
                    <img src="Image/Hill station.jpeg" class="img-fluid">
                    <h5 class="mt-2 text-center"> Hill Stations</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="region-card">
                    <img src="Image/vidarbha.jpeg" class="img-fluid">
                    <h5 class="mt-2 text-center"> Tadoba Forest </h5>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- FEATURED STAYS -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4">Featured HomeStays</h2>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="card stay-card p-3">
                    <img src="Image/Sea Breeze.jpeg" class="img-fluid">
                    <h5 class="mt-2">Sea Breeze Cottage</h5>
                    <p>Alibaug</p>
                    <!-- <p>₹2,500 / night</p> -->
                    <a href="#" class="btn btn-success btn-sm">View Details</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card stay-card p-3">
                    <img src="Image/Stay4.jpeg" class="img-fluid">
                    <h5 class="mt-2">Green Valley Stay</h5>
                    <p>Mahabaleshwar</p>
                    <!-- <p>₹3,200 / night</p> -->
                    <a href="#" class="btn btn-success btn-sm">View Details</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card stay-card p-3">
                    <img src="Image/Stay7.jpg" class="img-fluid">
                    <h5 class="mt-2">Hill Escape Cottage</h5>
                    <p>Lonavala</p>
                    <a href="#" class="btn btn-success btn-sm">View Details</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card stay-card p-3">
                    <img src="Image/Stay8.jpeg" class="img-fluid">
                    <h5 class="mt-2">Nature View Homestay</h5>
                    <p>Mulshi</p>
                    <!-- <p>₹2,800 / night</p> -->
                    <a href="#" class="btn btn-success btn-sm">View Details</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- WHY CHOOSE US -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Why Happy HomeStays?</h2>
        <br>
        <div class="row text-center">
            <div class="col-md-3">🌿 Authentic Local Stays</div>
            <div class="col-md-3">📍 Maharashtra Focused</div>
            <div class="col-md-3">💰 Budget Friendly</div>
            <div class="col-md-3">⭐ Verified Hosts</div>
        </div>
    </div>
</section>
<?php include('footer.php'); ?>
