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
            <div class="container">
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
                <label for="PostalCode"><b>Postal Code</b></label>
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