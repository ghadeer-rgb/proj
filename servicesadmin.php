<?php
require 'db.php';

// Query all tasks
$sql = "SELECT id, title, status, posted_on FROM job_requests ORDER BY posted_on DESC";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Job Requests</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5">
  <h2>Job Requests</h2>
  <table class="table table-bordered table-hover mt-3">
    <thead class="table-light">
      <tr>
        <th>#</th>
        <th>Service Name</th>
        <th>Status</th>
        <th>Posted On</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td>
              <span class="badge 
                <?= $row['status'] === 'completed' ? 'bg-success' : 
                    ($row['status'] === 'in-progress' ? 'bg-primary' : 'bg-warning') ?>">
                <?= ucfirst($row['status']) ?>
              </span>
            </td>
            <td><?= $row['posted_on'] ?></td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="4" class="text-center">No services found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
  
    <a href="admindashboard.php" class="btn btn-secondary">Back to Dashboard</a>
</div>
</body>
</html>
