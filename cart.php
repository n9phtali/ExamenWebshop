<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

include 'db_connect.php';

$userID = $_SESSION["id"];
$sql = "SELECT FirstName, LastName FROM product WHERE CustomerID = ?";
if ($stmt = mysqli_prepare($conn, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $userID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $firstName, $lastName);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
}

// Retrieve user's orders from the database
$sql_orders = "SELECT productID, Name, Price, image_path FROM `order` WHERE CustomerID = ?";
$orders = array();
if ($stmt_orders = mysqli_prepare($conn, $sql_orders)) {
    mysqli_stmt_bind_param($stmt_orders, "i", $userID);
    mysqli_stmt_execute($stmt_orders);
    mysqli_stmt_bind_result($stmt_orders, $orderID, $orderDate, $totalAmount);
    while (mysqli_stmt_fetch($stmt_orders)) {
        $orders[] = array(
            "OrderID" => $orderID,
            "OrderDate" => $orderDate,
            "TotalAmount" => $totalAmount
        );
    }
    mysqli_stmt_close($stmt_orders);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
<?php include 'header.php'; ?>

<div class="container">
    <h2>Welcome, <?= $firstName . " " . $lastName ?></h2>
    <h1 ><i class='bx bx-cart-add'></i></h1>
    <table>
        <thead>
        <tr>
            <th>Product</th>
            <th>Product Name</th>
            <th>Total Amount</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $product['productID'] ?></td>
                <td><?= $product['OrderDate'] ?></td>
                <td><?= $product['TotalAmount'] ?></td>
            </tr>
        </tbody>
    </table>
</div>
</body>
</html>
