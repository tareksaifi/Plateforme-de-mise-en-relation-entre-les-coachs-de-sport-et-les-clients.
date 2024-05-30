<?php
$servername = "localhost";
$username = "root"; // Change to your database username
$password = ""; // Change to your database password
$dbname = "online";

// Create connection
$pro = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($pro->connect_error) {
    die("Connection failed: " . $pro->connect_error);
}
?>
