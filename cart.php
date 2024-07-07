<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "balenciaga"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$products_in_cart = [];
$total_price = 0; 


$customer_id = 1; 


$sql = "SELECT c.CartID, p.ProductID, p.Name, p.Price, p.image_path, c.Quantity
        FROM cart c
        INNER JOIN product p ON c.ProductID = p.ProductID
        WHERE c.CustomerID = $customer_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
        
        $products_in_cart[] = $row;
        
        $total_price += $row['Price'] * $row['Quantity'];
    }
} else {
    $no_products_message = "No products found in cart.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="css/cart.css">
    <style>
        .no-products-message {
            text-align: center;
            font-size: 18px;
            color: #ff0000; 
            margin: 20px 0;
        }
        .product-image {
            max-width: 100px;
            height: auto;
        }
        .total-price {
            text-align: right;
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>

<div class="container">
    <h1><i class='bx bx-cart-add'></i> Shopping Cart</h1>
    <?php if (!empty($products_in_cart)): ?>
        <table>
            <thead>
            <tr>
                <th>Product</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products_in_cart as $product): ?>
                <tr>
                    <td><img src="<?php echo $product['image_path']; ?>" alt="Product Image" class="product-image"></td>
                    <td><?php echo $product['Name']; ?></td>
                    <td>$<?php echo number_format($product['Price'], 2); ?></td>
                    <td><?php echo $product['Quantity']; ?></td>
                    <td>
                        <form method="post" action="remove_from_cart.php">
                            <input type="hidden" name="cart_id" value="<?php echo $product['CartID']; ?>">
                            <button type="submit" class="remove">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="total-price">
            Total Price: $<?php echo number_format($total_price, 2); ?>
        </div>
    <div class="checkout">
        <button class="button">checkout</button>
    </div>
    <?php else: ?>
        <div class="no-products-message"><?php echo $no_products_message; ?></div>
    <?php endif; ?>
</div>
</body>
</html>
