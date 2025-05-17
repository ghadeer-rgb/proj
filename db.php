<?php
$servername = "localhost";        // Usually localhost
$username = "root";
$password = "";
$dbname = "househero1";            // Your MySQL database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//echo "Connected successfully";
?>