<?php
session_start();
include("db.php");

// Check if provider is logged in
if (!isset($_SESSION['provider_id'])) {
    echo "You need to be logged in to update your profile.";
    exit; // Stop further processing if not logged in
}

$provider_id = $_SESSION['provider_id']; // Use the logged-in provider's ID for updates

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data safely
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $bio = $_POST['bio'];

    // Update the profile in the database
 try {
    $stmt = $conn->prepare("UPDATE providers SET email = ?, phone = ?, bio = ? WHERE id = ?");
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("sssi", $email, $phone, $bio, $provider_id);
    $stmt->execute();

    // Redirect to profileprovider.php after successful update
    header("Location: profileprovider.php");
    exit;
} catch (Exception $e) {
    $error = "Error updating profile: " . $e->getMessage();
}




}

// Fetch the current provider data
try {
    $stmt = $conn->prepare("SELECT * FROM providers WHERE id = ?");
    if (!$stmt) {
        throw new Exception("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("i", $provider_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $provider = $result->fetch_assoc();
} catch (Exception $e) {
    echo "Error fetching provider data: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Edit Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<div class="container mt-5">
  <h2>Edit Your Profile</h2>

  <?php if (isset($success)): ?>
    <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
  <?php elseif (isset($error)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form action="updateProfileProvider.php" method="POST">
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input id="email" type="email" name="email" class="form-control" value="<?= htmlspecialchars($provider['email']) ?>" required />
    </div>
    <div class="mb-3">
      <label for="phone" class="form-label">Phone</label>
      <input id="phone" type="text" name="phone" class="form-control" value="<?= htmlspecialchars($provider['phone']) ?>" required />
    </div>
    <div class="mb-3">
      <label for="bio" class="form-label">Bio</label>
      <textarea id="bio" name="bio" class="form-control" rows="4"><?= htmlspecialchars($provider['bio'] ?? '') ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Update Profile</button>
    <a href="profileprovider.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>

</body>
</html>
