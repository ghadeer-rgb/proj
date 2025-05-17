<!-- services.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Available Services</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .service-section {
      margin-bottom: 3rem;
    }
    .card {
      transition: transform 0.2s;
    }
    .card:hover {
      transform: scale(1.02);
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4">Available Services</h2>

    <!-- Plumbing Section -->
    <div class="service-section">
      <h4>Plumbing Services</h4>
      <div class="card p-3 bg-light">
        <p>Includes installation, repair, and maintenance of water pipes, faucets, and drainage systems.</p>
      </div>
    </div>

    <!-- Electrician Section -->
    <div class="service-section">
      <h4>Electrician Services</h4>
      <div class="card p-3 bg-light">
        <p>Includes wiring, light installation, circuit breaker repairs, and general electrical troubleshooting.</p>
      </div>
    </div>

    <!-- Cleaning Section -->
    <div class="service-section">
      <h4>Cleaning Services</h4>
      <div class="card p-3 bg-light">
        <p>Includes home cleaning, office cleaning, deep cleaning, and disinfection services.</p>
      </div>
    </div>

    <a href="admindashboard.php" class="btn btn-secondary mt-4">Back to Dashboard</a>
  </div>
</body>
</html>
