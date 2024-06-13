<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>BALENCIAGA</title>
    <link rel="stylesheet"  href="css/men.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="mentitle">
    <h1>BALENCIAGA MEN</h1>
    <h3>Explore our Menswear Collection to discover men’s t-shirts, shirts, sweatshirts, hoodies,
        pants and jackets plus shoes and accessories featuring signature <br>
        BALENCIAGA styles and detailing. </h3>
</div>
<div class="menbanner">
    <img src="img/banner1.jpg" alt="menbanner">
</div>
<div class="mentitle2">
    <h2>SS24 LE CITY</h2>
</div>
<div class="productcontainer">
    <div class="product-item">
        <img src="img/bomber.jpg" alt="bikerjacket">
        <h2>BIKER JACKET</h2>
        <p>Price: $4 900</p>
        <form method="post" action="add_to_cart.php">
            <input type="hidden" name="product_id" value="1">
            <button type="submit">Add to Cart</button>
        </form>
    </div>
    <div class="product-item">
        <img src="img/jacket.jpg" alt="zipup">
        <h2>BIKER JACKET</h2>
        <p>Price: $4 900</p>
        <form method="post" action="add_to_cart.php">
            <input type="hidden" name="product_id" value="2">
            <button type="submit">Add to Cart</button>
        </form>
    </div>
    <div class="product-item">
        <img src="img/sleeveless.jpg" alt="zipup">
        <h2>BIKER JACKET</h2>
        <p>Price: $4 900</p>
        <form method="post" action="add_to_cart.php">
            <input type="hidden" name="product_id" value="3">
            <button type="submit">Add to Cart</button>
        </form>
    </div>
    <div class="product-item">
        <img src="img/mirror.jpg" alt="zipup">
        <h2>BIKER JACKET</h2>
        <p>Price: $4 900</p>
        <form method="post" action="add_to_cart.php">
            <input type="hidden" name="product_id" value="4">
            <button type="submit">Add to Cart</button>
        </form>
    </div>

    <!-- Repeat similar structure for other product items -->

</div>

<script src="js/script.js"></script>
</body>
</html>
