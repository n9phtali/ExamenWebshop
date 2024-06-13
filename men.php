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
        <h2>ZIP UP JACKET</h2>
        <p>$2 500</p>
        <form method="post" action="add_to_cart.php">
            <input type="hidden" name="product_id" value="2">
            <button type="submit">Add to Cart</button>
        </form>
    </div>
    <div class="product-item">
        <img src="img/sleeveless.jpg" alt="zipup">
        <h2>SLEEVELESS</h2>
        <p>$4 900</p>
        <form method="post" action="add_to_cart.php">
            <input type="hidden" name="product_id" value="3">
            <button type="submit">Add to Cart</button>
        </form>
    </div>
    <div class="product-item">
        <img src="img/mirror.jpg" alt="zipup">
        <h2>MIRROR</h2>
        <p>$4 900</p>
        <form method="post" action="add_to_cart.php">
            <input type="hidden" name="product_id" value="4">
            <button type="submit">Add to Cart</button>
        </form>
    </div>
    <div class="product-item">
        <img src="img/LARGECAMOPANTS.jpg" alt="LARGE CAMO PANTS">
        <h2>LARGE CAMO PANTS</h2>
        <p>$2 300</p>
        <form method="post" action="add_to_cart.php">
            <input type="hidden" name="product_id" value="5">
            <button type="submit">Add to Cart</button>
        </form>
    </div>
    <div class="product-item">
        <img src="img/jeanjacket.jpg" alt="JEAN JACKET">
        <h2>JEAN JACKET</h2>
        <p>$1 500</p>
        <form method="post" action="add_to_cart.php">
            <input type="hidden" name="product_id" value="6">
            <button type="submit">Add to Cart</button>
        </form>
    </div>
    <div class="product-item">
        <img src="img/3XL.jpg" alt="3XL SNEAKER">
        <h2>3XL SNEAKER</h2>
        <p>$1 050</p>
        <form method="post" action="add_to_cart.php">
            <input type="hidden" name="product_id" value="7">
            <button type="submit">Add to Cart</button>
        </form>
    </div>
    <div class="product-item">
        <img src="img/bikerboot.jpg" alt="biker over knee boot">
        <h2>BIKER OVER KNEE BOOT</h2>
        <p>$6 900</p>
        <form method="post" action="add_to_cart.php">
            <input type="hidden" name="product_id" value="8">
            <button type="submit">Add to Cart</button>
        </form>
    </div>


</div>

<script src="js/script.js"></script>
</body>
</html>
