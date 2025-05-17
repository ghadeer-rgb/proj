<?php
session_start();
include("db.php");

if (!isset($_SESSION['provider_id'])) {
    header("Location: login.php");
    exit;
}

$provider_id = $_SESSION['provider_id'];

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $bio = $_POST['bio'] ?? '';
    $skills = $_POST['skills'] ?? '';
    $experience = $_POST['experience'] ?? '';

    try {
        // Update providers table
        $stmt = $conn->prepare("UPDATE providers SET email = ?, phone = ?, bio = ? WHERE id = ?");
        $stmt->bind_param("sssi", $email, $phone, $bio, $provider_id);
        $stmt->execute();

        // Check if providerDetails entry exists
        $checkStmt = $conn->prepare("SELECT * FROM providerDetails WHERE providerDetailID = ?");
        $checkStmt->bind_param("i", $provider_id);
        $checkStmt->execute();
        $result = $checkStmt->get_result();

        if ($result->num_rows > 0) {
            // Update existing providerDetails
            $updateDetails = $conn->prepare("UPDATE providerDetails SET Experience = ?, Skills = ? WHERE providerDetailID = ?");
            $updateDetails->bind_param("ssi", $experience, $skills, $provider_id);
            $updateDetails->execute();
        } else {
            // Insert new details
            $insertDetails = $conn->prepare("INSERT INTO providerDetails (providerDetailID, Experience, Skills) VALUES (?, ?, ?)");
            $insertDetails->bind_param("iss", $provider_id, $experience, $skills);
            $insertDetails->execute();
        }

        // Redirect after successful update
        header("Location: Providerprofile.php");
        exit;

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
}

// Fetch provider info to populate form
$stmt = $conn->prepare("
    SELECT p.*, pd.Experience, pd.Skills
    FROM providers p
    LEFT JOIN providerDetails pd ON p.id = pd.providerDetailID
    WHERE p.id = ?
");
$stmt->bind_param("i", $provider_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "Provider not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Provider Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-header {
            background-color: #f8f9fa;
            padding: 2rem;
            text-align: center;
        }
        .profile-pic {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #fff;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
        .profile-info {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="profile-header mb-4">
        <img src="imgs/elect.jpg" class="profile-pic mb-2" alt="User Profile Picture">
        <h3 class="mb-0"><?= htmlspecialchars($user['Name_u'] ?? 'No Name') ?></h3>
        <p class="text-muted"><?= htmlspecialchars($user['city'] ?? '') ?> | <?= htmlspecialchars(($user['gender'] ?? '') == 'M' ? 'Male' : 'Female') ?></p>
        <span class="badge bg-success">Top Tasker</span>
    </div>

    <div class="profile-info">
        <form method="POST">
            <h5 class="mb-3">Update Your Information</h5>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email'] ?? '') ?>" required>
                </div>
                <div class="col-md-6">
                    <label>Phone:</label>
                    <input type="tel" name="phone" class="form-control" value="<?= htmlspecialchars($user['phone'] ?? '') ?>">
                </div>
            </div>
            <div class="mb-3">
                <label>Bio:</label>
                <textarea name="bio" class="form-control" rows="3"><?= htmlspecialchars($user['bio'] ?? '') ?></textarea>
            </div>
            <div class="mb-3">
                <label>Skills:</label>
                <input type="text" name="skills" class="form-control" value="<?= htmlspecialchars($user['Skills'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label>Experience:</label>
                <input type="text" name="experience" class="form-control" value="<?= htmlspecialchars($user['Experience'] ?? '') ?>">
            </div>
            <div class="text-end">
                <a href="editProfileProvider.php" class="btn btn-warning">Edit Profile</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
