<?php
$host = "localhost"; // Server name
$user = "root"; // Default user
$password = ""; // Default password blank hota hai
$database = "country_escape"; // Database name

// Connection create karo
$conn = mysqli_connect($host, $user, $password, $database);

// Agar connection fail ho to error show karo
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
