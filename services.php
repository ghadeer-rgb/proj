<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Services | HouseHero</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    .service-box {
      padding: 30px;
      background-color: #fff3cd;
      border-radius: 12px;
      transition: transform 0.2s;
    }

    .service-box:hover {
      transform: scale(1.02);
    }

    .service-icon {
      font-size: 3rem;
      color: #f48c06;
    }

    section {
      padding: 60px 0;
    }
  </style>
</head>
<body>

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
        <li class="nav-item"><a class="nav-link active" href="services.php">Services</a></li>
        <li class="nav-item"><a class="nav-link" href="FAQ.html">FAQs</a></li>
        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Services Section -->
<section class="bg-light">
  <div class="container">
    <h2 class="text-center mb-5 fw-bold">What We Offer</h2>
    <div class="row g-4">

      <div class="col-md-4">
        <a href="cleaning.php" class="text-decoration-none text-dark">
          <div class="service-box text-center shadow-sm">
            <div class="service-icon mb-3"><i class="bi bi-bucket"></i></div>
            <h5>Home Cleaning</h5>
            <p>Professional and reliable cleaning services for your home or office.</p>
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="plumping.php" class="text-decoration-none text-dark">
          <div class="service-box text-center shadow-sm">
            <div class="service-icon mb-3"><i class="bi bi-tools"></i></div>
            <h5>Plumbing</h5>
            <p>Quick fixes, installations, and emergency repairs done by certified plumbers.</p>
          </div>
        </a>
      </div>

      <div class="col-md-4">
        <a href="electrician.php" class="text-decoration-none text-dark">
          <div class="service-box text-center shadow-sm">
            <div class="service-icon mb-3"><i class="bi bi-lightning-charge"></i></div>
            <h5>Electrical</h5>
            <p>Safe and expert electrical repairs, installations, and maintenance for your home.</p>
          </div>
        </a>
      </div>

    </div>
  </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
 
</footer>

</body>
</html>
