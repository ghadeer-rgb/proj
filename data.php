<?php
// save_coupon.php
$conn = new mysqli("localhost", "root", "", "househero1");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$description = $_POST['description'];
$code = $_POST['code'];
$valid_until = $_POST['valid_until'];

$stmt = $conn->prepare("INSERT INTO coupons (title, description, code, valid_until) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $title, $description, $code, $valid_until);

if ($stmt->execute()) {
    echo "Coupon saved successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();



?>


