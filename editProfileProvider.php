<?php
session_start();

// ✅ Use the correct session key
if (!isset($_SESSION['provider_id'])) {
    die("Unauthorized access. Please log in first.");
}

$provider_id = $_SESSION['provider_id'];

// ✅ Connect to DB (use the same style as your other file)
$conn = new mysqli("localhost", "root", "", "househero1");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ✅ Safely prepare and execute query
$stmt = $conn->prepare("SELECT * FROM providers WHERE id = ?");
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("i", $provider_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h2>Edit Your Profile</h2>

  <form action="updateProfileProvider.php" method="POST">
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Phone</label>
      <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($user['phone']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Bio</label>
      <textarea name="bio" class="form-control" rows="4"><?= htmlspecialchars($user['bio'] ?? '') ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update Profile</button>
    <a href="Profileprovider.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>

</body>
</html>
