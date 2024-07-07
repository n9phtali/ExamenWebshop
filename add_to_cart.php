<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "balenciaga"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$product_id = 0;
$customer_id = 1; 
$quantity = 1; 


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);

    
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


$conn->close();


header("Location: cart.php");
exit;
?>
