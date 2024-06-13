<?php
// Database connection (similar to your existing code)
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "balenciaga"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if CartID is received via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cart_id'])) {
    $cart_id = intval($_POST['cart_id']);

    // SQL to delete the item from cart
    $sql = "DELETE FROM cart WHERE CartID = $cart_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to cart page or refresh current page
        header("Location: cart.php");
        exit;
    } else {
        echo "Error removing item from cart: " . $conn->error;
    }
}

$conn->close();
?>
