<?php
include 'db_connect.php';

// Assuming you want to fetch the product with id 1
$product_id = 2;

$sql = "SELECT Name, Price, image_path FROM product WHERE ProductID = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    die("Product not found.");
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
</head>
<body>
<h1><?php echo htmlspecialchars($product['Name']); ?></h1>
<p>Price: $<?php echo number_format($product['Price'], 2); ?></p>
<img src="<?php echo htmlspecialchars($product['image_path']); ?>" alt="<?php echo htmlspecialchars($product['Name']); ?>" style="width:200px;height:200px;">
</body>
</html>
