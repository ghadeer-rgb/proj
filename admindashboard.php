<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }
    .main-content {
      margin-left: 220px;
      padding: 2rem;
    }
    .card {
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      transition: transform 0.2s;
    }
    .card:hover {
      transform: scale(1.02);
    }
    .sidebar {
      width: 220px;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #343a40;
      color: white;
    }
    .sidebar .nav-link {
      color: #ddd;
    }
    .sidebar .nav-link:hover {
      background-color: #495057;
      color: white;
    }
  </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar d-flex flex-column p-3">
  <h5 class="text-center border-bottom pb-2">Admin Panel</h5>
  <ul class="nav flex-column">
    <li class="nav-item"><a class="nav-link" href="home.html">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="customers.php">Users</a></li>
    <li class="nav-item"><a class="nav-link" href="serviceprovider.php">Service Providers</a></li>
    <li class="nav-item"><a class="nav-link" href="servicesadmin.php">Job requests</a></li>
    <li class="nav-item"><a class="nav-link" href="avaliableService.php">avaliable services</a></li>
  </ul>
</div>

<!-- Main Content -->
<div class="main-content">
  <h2 class="mb-4">Welcome, Admin!</h2>

  <!-- Summary Cards -->
  <div class="row g-4 mb-4">
    <div class="col-md-3">
      <div class="card text-white bg-primary">
        <div class="card-body">
          <h5 class="card-title">Users</h5>
          <p class="card-text fs-4">15</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-white bg-success">
        <div class="card-body">
          <h5 class="card-title">Service Providers</h5>
          <p class="card-text fs-4">5</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-white bg-warning">
        <div class="card-body">
          <h5 class="card-title">Services</h5>
          <p class="card-text fs-4">3</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-white bg-danger">
        <div class="card-body">
          <h5 class="card-title">job_requests</h5>
          <p class="card-text fs-4">43</p>
        </div>
      </div>
    </div>
  </div>


    
  </div>
</div>

</body>
</html>
