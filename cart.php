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

// Initialize an empty array to store products in cart
$products_in_cart = [];
$total_price = 0; // Initialize total price outside of any conditionals

// Check if the customer is logged in (you should have a session variable or similar)
$customer_id = 1; // Assuming the customer ID; you would get this dynamically in a real application

// Query to fetch products in cart for the logged-in customer
$sql = "SELECT c.CartID, p.ProductID, p.Name, p.Price, p.image_path, c.Quantity
        FROM cart c
        INNER JOIN product p ON c.ProductID = p.ProductID
        WHERE c.CustomerID = $customer_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop through each row (each product in cart)
    while ($row = $result->fetch_assoc()) {
        // Store product details in the array
        $products_in_cart[] = $row;
        // Calculate total price
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
            color: #ff0000; /* Red color for emphasis */
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
                <th>Action</th> <!-- New column for Remove button -->
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
                            <button type="submit">Remove</button>
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
        <button> checkout </button>
    </div>
    <?php else: ?>
        <div class="no-products-message"><?php echo $no_products_message; ?></div>
    <?php endif; ?>
</div>
</body>
</html>
