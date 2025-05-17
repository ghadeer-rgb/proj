<!-- serviceproviders.php -->
<?php
// Example: Replace with actual database connection and fetching
$serviceProviders = [
  ['name' => 'Khaled Mansour', 'email' => 'khaled@example.com', 'service' => 'Plumbing'],
  ['name' => 'Ali Mansour', 'email' => 'al@example.com', 'service' => 'Cleaning'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Service Providers</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
</head>
<body>
  <div class="container mt-5">
    <h2>Service Providers</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Service</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($serviceProviders as $provider): ?>
          <tr>
            <td><?= $provider['name'] ?></td>
            <td><?= $provider['email'] ?></td>
            <td><?= $provider['service'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <a href="admindashboard.php" class="btn btn-secondary">Back to Dashboard</a>
  </div>
</body>
</html>
