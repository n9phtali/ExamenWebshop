<?php
$servername = "localhost";
$username = "root"; // Default username for XAMPP/MAMP/WAMP
$password = ""; // Default password for XAMPP/MAMP/WAMP
$dbname = "balenciaga"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Connection successful
?>
