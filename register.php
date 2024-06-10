<?php
include 'db_connect.php'; // Include your database connection script

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['Lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password-repeat'];
    $address = $_POST['Address'];
    $city = $_POST['city']; // Assuming you will add this field in your form
    $postalcode = $_POST['PostalCode'];
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
<body>
        <div class="test">
        <h2>Register</h2>
        </div>
        <form action="register.php" method="post">
            <div class="formcontainerregister">
                <label for="FirstName"><b>First name</b></label>
                <input type="text" placeholder="Enter First name" name="firstname" required>

                <label for="LastName"><b>Last name</b></label>
                <input type="text" placeholder="Enter First name" name="Lastname" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <label for="password-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="password-repeat" required>

                <label for="Address"><b>Address</b></label>
                <input type="text" placeholder="Enter Address" name="Address" required>

                <label for="city"><b>city</b></label>
                <input type="text" placeholder="Enter city" name="city" required>

                <label for="Country"><b>Country</b></label>
                <input type="text" placeholder="Enter PostalCode" name="PostalCode" required>

                <label for="Country"><b>Country</b></label>
                <select name="country" required>
                    <option value=""></option>
                    <option value="USA">United States</option>
                    <option value="CAN">Netherlands</option>
                    <option value="UK">United Kingdom</option>
                </select>

                <label for="PhoneNumber"><b>Phone Number</b></label>
                <input type="tel" placeholder="Enter Phone Number" name="phonenumber" required>
                
                <button type="submit" class="registerbtn">Register</button>
            </div>
            <div class="container signin">
                <p>Already have an account? <a href="login.html">Sign in</a>.</p>
            </div>
</html>