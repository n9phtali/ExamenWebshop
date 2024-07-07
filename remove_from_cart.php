<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "balenciaga"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cart_id'])) {
    $cart_id = intval($_POST['cart_id']);

   
    $sql = "DELETE FROM cart WHERE CartID = $cart_id";

    if ($conn->query($sql) === TRUE) {
       
        header("Location: cart.php");
        exit;
    } else {
        echo "Error removing item from cart: " . $conn->error;
    }
}

$conn->close();
?>
