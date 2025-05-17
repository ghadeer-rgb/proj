<?php
// database connection
$host = 'localhost';
$dbname = 'househero1';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // fetch feedback from the database
    $stmt = $pdo->query("SELECT * FROM feedback ORDER BY created_at DESC");
    $feedbackList = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Customer Feedback</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container my-5">
    <h2 class="mb-4">Customer Feedback</h2>
    <table class="table table-bordered table-hover">
      <thead class="table-light">
        <tr>
          <th>Customer</th>
          <th>Service</th>
          <th>Provider</th>
          <th>Rating</th>
          <th>Comment</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($feedbackList)): ?>
          <?php foreach ($feedbackList as $feedback): ?>
            <tr>
              <td><?= htmlspecialchars($feedback['customer_name']) ?></td>
              <td><?= htmlspecialchars($feedback['service_type']) ?></td>
              <td><?= htmlspecialchars($feedback['provider_name']) ?></td>
              <td><?= str_repeat("⭐", (int)$feedback['rating']) ?></td>
              <td><?= htmlspecialchars($feedback['comment']) ?></td>
              <td><?= htmlspecialchars($feedback['created_at']) ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="6" class="text-center">No feedback found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
    
    <a href="admindashboard.php" class="btn btn-secondary">Back to Dashboard</a>
  </div>
</body>
</html>
