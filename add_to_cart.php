<?php
// Database connection
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "balenciaga"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$product_id = 0;
$customer_id = 1; // Assuming a default customer ID for now
$quantity = 1; // Assuming a default quantity of 1 for each product added

// Validate if product_id is set and is a valid integer
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);

    // Prepare SQL statement to insert into cart table
    $sql = "INSERT INTO cart (CustomerID, ProductID, Quantity, CreatedAt) 
            VALUES ($customer_id, $product_id, $quantity, NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Product added to cart successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request.";
}

// Close connection
$conn->close();

// Redirect back to the product page
header("Location: men.php");
exit;
?>
