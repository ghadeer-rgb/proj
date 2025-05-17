<?php
include 'db.php'; // Make sure this connects to MySQL

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure password

   // $sql = "INSERT INTO users (full_name, email, phone, password) 
         //   VALUES ('$fullName', '$email', '$phone', '$password')";
$sql ="INSERT INTO users (name_u, email, phone, password_u)
        VALUES ('$fullName', '$email', '$phone', '$password')";
    if (mysqli_query($conn, $sql)) {
       header("Location: services.php");
  exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

?>
