<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Electrician Service | HouseHero</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    .service-card {
      padding: 30px;
      background-color: #fff3cd;
      border-radius: 12px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;
    }
    
    .service-card:hover {
      transform: scale(1.05);
    }

    .service-icon {
      font-size: 4rem;
      color: #f48c06;
    }

    section {
      padding: 60px 0;
    }
  </style>
</head>
<body style="background-color:rgb(250, 237, 196);">


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    
      <img src="imgs/worker.png" alt="Logo" style="height: 50px; margin-right: 30px;">
    <a class="navbar-brand fw-bold" href="index.php">HouseHero</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="home.html">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="FAQ.html">FAQs</a></li>
        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Electrician Service Section -->
<section class="bg-light">
   <div class="container">
    
    <h2 class="text-center mb-5 fw-bold">Available Electricians</h2>
     <div class="row justify-content-center"> <!-- Added row and justify-content-center to center the card -->
        <div class="col-md-4">
          <div class="card shadow-sm">
            <img src="imgs/elect.jpg" class="card-img-top" alt="electrician Image"> <!-- Updated image source for electrician -->
            <div class="card-body">
              <h5 class="card-title">Ahmed Al-Sayed</h5> <!-- Changed to Electrician's name -->
              <p class="card-text">He provides reliable electrical solutions for homes and businesses.</p> <!-- Updated description -->
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
