<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Home Cleaning | HouseHero</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body >

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    
      <img src="imgs/worker.png" alt="Logo" style="height: 50px; margin-right: 30px;">
    <a class="navbar-brand fw-bold" >HouseHero</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="home.html">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="FAQ.html">FAQs</a></li>
        <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Cleaners Section -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-5 fw-bold">Available Cleaners</h2>
    <div class="row g-4">

      <!-- Cleaner 1 -->
      <div class="col-md-4">
        <div class="card shadow-sm">
          <img src="imgs/clean.jpg" class="card-img-top object-fit-cover"  height="163px" alt="Cleaner Image">
          <div class="card-body">
            <h5 class="card-title">Sarah Johnson</h5>
            <p class="card-text">5+ years experience in deep cleaning, and office services.</p>
            <a href="book_now.html" class="btn btn-primary">Book Now</a>
          </div>
        </div>
      </div>

      <!-- Cleaner 2 -->
      <div class="col-md-4">
        <div class="card shadow-sm">
          <img src="imgs/dark.jpg" class="card-img-top object-fit-cover" height="163px"  alt="Cleaner Image">
          <div class="card-body">
            <h5 class="card-title">Ali Mansour</h5>
            <p class="card-text">Specializes in eco-friendly products and fast turnaround service. Fluent in Arabic and English.</p>
            <a href="book_now.html" class="btn btn-primary">Book Now</a>
          </div>
        </div>
      </div>

      <!-- Cleaner 3 -->
      <div class="col-md-4">
        <div class="card shadow-sm">
          <img src="imgs/table.jpg" class="card-img-top object-fit-cover" height="163px" alt="Cleaner Image">
          <div class="card-body">
            <h5 class="card-title">Fatima Youssef</h5>
            <p class="card-text">Trusted by families, expert in kid-safe and pet-friendly cleaning solutions.</p>
            <a href="book_now.html" class="btn btn-primary">Book Now</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">

</footer>

</body>
</html>
