<?php
session_start();

// Connect to DB
$conn = new mysqli("localhost", "root", "", "househero1");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

// Get service categories
$categoryResult = $conn->query("SELECT * FROM ServiceCategory");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $providerName = trim($_POST['providerName'] ?? '');
    $providerEmail = trim($_POST['providerEmail'] ?? '');
    $providerPhone = trim($_POST['providerPhone'] ?? '');
    $providerPassword = $_POST['providerPassword'] ?? '';
    $providerCity = trim($_POST['providerCity'] ?? '');
    $category_id = $_POST['category_id'] ?? null;

    if (!$providerName || !$providerEmail || !$providerPhone || !$providerPassword || !$category_id) {
        $message = "Please fill in all required fields.";
    } else {
        $stmt = $conn->prepare("SELECT id FROM providers WHERE email = ?");
        if (!$stmt) die("Prepare failed: " . $conn->error);

        $stmt->bind_param("s", $providerEmail);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $message = "This email is already registered.";
        } else {
            $hashedPassword = password_hash($providerPassword, PASSWORD_DEFAULT);

            $insert = $conn->prepare("INSERT INTO providers (providerName, email, phone, providerPassword, city, category_id) VALUES (?, ?, ?, ?, ?, ?)");
            if (!$insert) die("Prepare failed: " . $conn->error);

            $insert->bind_param("sssssi", $providerName, $providerEmail, $providerPhone, $hashedPassword, $providerCity, $category_id);

            if ($insert->execute()) {
                $newProviderId = $insert->insert_id;
                $_SESSION['provider_id'] = $newProviderId;
                header("Location: editProfileProvider.php");
                exit;
            } else {
                $message = "Error: " . $conn->error;
            }
            $insert->close();
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up as Provider | TaskerApp</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #ffc75f;
    }
    .register-container {
      max-width: 500px;
      margin-top: 80px;
      padding: 2rem;
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
  <div class="register-container">

    <img src="imgs/worker.png" alt="Logo" class="d-block mx-auto mb-4" style="height: 100px;">
    <h3 class="text-center mb-4">Sign Up as Provider</h3>

    <?php if (!empty($message)): ?>
        <div class="alert alert-info text-center"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <form method="post" action="" autocomplete="off">
      <div class="mb-3">
        <label for="providerName" class="form-label">Name</label>
        <input type="text" class="form-control" id="providerName" name="providerName" placeholder="Your name"
               value="<?= htmlspecialchars($_POST['providerName'] ?? '') ?>" required autocomplete="off">
      </div>

      <div class="mb-3">
        <label for="providerEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="providerEmail" name="providerEmail" placeholder="example@email.com"
               value="<?= htmlspecialchars($_POST['providerEmail'] ?? '') ?>" required autocomplete="off">
      </div>

      <div class="mb-3">
        <label for="providerPhone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="providerPhone" name="providerPhone" placeholder="07XXXXXXXX"
               value="<?= htmlspecialchars($_POST['providerPhone'] ?? '') ?>" required autocomplete="off">
      </div>

      <div class="mb-3">
        <label for="providerPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="providerPassword" name="providerPassword" placeholder="********" required autocomplete="new-password">
      </div>

      <div class="mb-3">
        <label for="providerCity" class="form-label">City</label>
        <input type="text" class="form-control" id="providerCity" name="providerCity" placeholder="City name"
               value="<?= htmlspecialchars($_POST['providerCity'] ?? '') ?>" autocomplete="off">
      </div>

      <div class="mb-3">
        <label for="category_id" class="form-label">Service Category</label>
        <select class="form-select" id="category_id" name="category_id" required>
          <option value="">Select a category</option>
          <?php if ($categoryResult): ?>
              <?php while ($row = $categoryResult->fetch_assoc()): ?>
                <option value="<?= $row['category_id'] ?>" <?= (isset($_POST['category_id']) && $_POST['category_id'] == $row['category_id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($row['category_name']) ?>
                </option>
              <?php endwhile; ?>
          <?php endif; ?>
        </select>
      </div>

      <button type="submit" class="btn btn-primary w-100">Sign Up</button>
    </form>

    <div class="text-center mt-3">
      <a href="home.html" class="btn btn-link">Back to Home</a>
    </div>

  </div>
</div>

</body>
</html>
