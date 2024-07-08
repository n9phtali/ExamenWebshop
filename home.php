<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>BALENCIAGA</title>
    <link rel="stylesheet"  href="css/home.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="hero">
    <img src="img/Large-EDITO_DK_BAG_CLOSET_15_3200x1800_16x9.jpg">
</div>
<h1 class="title">GIFTS FOR HER</h1>
<div class="container">
    <div class="product">
        <img src="img/100MMBOOTIE.jpg" alt="HOURGLASS 100 MM BOOTIE">
        <h2>HOURGLASS 100MM BOOTIE</h2>
        <p>$1 500</p>
        <form method="post" action="add_to_cart.php">
            <input type="hidden" name="product_id" value="18">
            <button type="submit">Add to Cart</button>
        </form>
    </div>
    <div class="product">
        <img src="img/bootie.jpg" alt="sock90mmbootie">
        <h2>SOCK 90MM BOOTIE</h2>
        <p>$1 100</p>
        <form method="post" action="add_to_cart.php">
            <input type="hidden" name="product_id" value="19">
            <button type="submit">Add to Cart</button>
        </form>
    </div>
    <div class="morequiet">
        <img src="img/Large-HP_DK_ITS_DIFFERENT_RODEO_2600x1300px_2x1.jpg" alt="abitmorequiet">
        <div class="overlay">
            <h2 class="text">RODEO BAG</h2>
            <button class="button">Shop Now</button>
        </div>
    </div>


<script src="js/script.js"></script>
</body>
</html>