<?php
include 'db_connect.php'; // Include your database connection script

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postalcode = $_POST['postalcode'];
    $country = $_POST['country'];
    $phone = $_POST['phonenumber'];

    // Validate passwords match
    if ($password !== $password_repeat) {
        echo "Passwords do not match!";
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO customer (FirstName, LastName, Email, PasswordHash, Address, City, PostalCode, Country, Phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        // Check if prepare() returned false
        if ($stmt === false) {
            die("Error preparing SQL statement: " . $conn->error);
        }
        
        $stmt->bind_param("sssssssss", $firstname, $lastname, $email, $hashed_password, $address, $city, $postalcode, $country, $phone);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error executing statement: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body class="register">
    <div class="header clearfix">
        <a href="#default" class="logo"><img src="img/logo.jpg" alt="BALENCIAGA"></a>
        <div class="header-right">
            <a href="home.html">Home</a>
            <a href="men.html">Men</a>
            <a href="#">Women</a>
            <a href="#">Kids</a>
            <a href="account.html">Account</a>
            <a href="login.html">Login</a>
            <a href="register.php">Register</a>
            <a href="cart.html">Cart</a>
        </div>
    </div>
        <div class="form-container">
            <form action="register.php" method="post">
                <div class="registerform">
                    <div class="name-fields">
                        <div class="name-field">
                            <label for="firstname"><b>First Name</b></label>
                            <input type="text" placeholder="Enter First Name" name="firstname" required>
                        </div>
                        <div class="name-field">
                            <label for="lastname"><b>Last Name</b></label>
                            <input type="text" placeholder="Enter Last Name" name="lastname" required>
                        </div>
                    </div>

                    <label for="email"><b>Email</b></label>
                    <input type="email" placeholder="Enter Email" name="email" required>

                    <label for="password"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>

                    <label for="password_repeat"><b>Repeat Password</b></label>
                    <input type="password" placeholder="Repeat Password" name="password_repeat" required>

                    <label for="address"><b>Address</b></label>
                    <input type="text" placeholder="Enter Address" name="address" required>

                    <label for="city"><b>City</b></label>
                    <input type="text" placeholder="Enter City" name="city" required>

                    <label for="postalcode"><b>Postal Code</b></label>
                    <input type="text" placeholder="Enter Postal Code" name="postalcode" required>

                    <label for="country"><b>Country</b></label>
                    <select name="country" required>
                        <option value=""></option>
                        <option value="NL">Netherlands</option>
                        <option value="BLG">Belgium</option>
                        <option value="UK">United Kingdom</option>
                        <option value="DE">Germany</option>
                    </select>

                    <label for="phonenumber"><b>Phone Number</b></label>
                    <input type="tel" placeholder="Enter Phone Number" name="phonenumber" required>

                    <button type="submit" class="registerbtn">Register</button>
                </div>
                <div class="alreadyaccount">
                    <p>Already have an account? <a href="login.html">Sign in</a>.</p>
                </div>
            </form>
        </div>
</body>
</html>
