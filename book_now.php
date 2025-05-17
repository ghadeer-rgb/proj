<?php
// book_now.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "househero1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $customer_name = $_POST['customer_name'] ?? '';
    $customer_phone = $_POST['customer_phone'] ?? '';
    $service_type = $_POST['service_type'] ?? '';
    $service_date = $_POST['service_date'] ?? '';
    $service_details = $_POST['service_details'] ?? null; // optional

    // Sanitize data (optional but recommended)
    $customer_name = trim($customer_name);
    $customer_phone = trim($customer_phone);
    $service_type = trim($service_type);
    $service_date = trim($service_date);
    $service_details = trim($service_details);

    // Validate required fields
    if (empty($customer_name) || empty($customer_phone) || empty($service_type) || empty($service_date)) {
        echo "<script>alert('Please fill in all required fields.'); window.history.back();</script>";
        exit;
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO bookings (customer_name, customer_phone, service_type, service_details, service_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $customer_name, $customer_phone, $service_type, $service_details, $service_date);

    // Execute and handle result
    if ($stmt->execute()) {
        echo "<script>alert('Booking successful!'); window.location.href = 'services.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
