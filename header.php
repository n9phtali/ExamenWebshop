<?php
// Check if session is not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="header clearfix">
    <a href="#default" class="logo"><img src="img/logo.jpg" alt="BALENCIAGA"></a>
    <div class="header-right">
        <a href="home.php">Home</a>
        <a href="men.php">Men</a>
        <a href="women.php">Women</a>

        <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
            <a href="cart.php">Cart</a>

        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php endif; ?>

    </div>
</div>
<!--<div class="popup" id="popup">
    <button class="nl" onclick="updateContent('dutch')"></button>
    <button class="eng" onclick="updateContent('english')"></button>
</div> -->
<link rel="stylesheet" href="css/header.css">
<script src="js/script.js"></script>
