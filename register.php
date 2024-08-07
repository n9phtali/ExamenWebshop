<?php
include 'db_connect.php'; 

// form gesubmit?
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // form data krijgen!
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password-repeat'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postalcode = $_POST['postalcode'];
    $country = $_POST['country'];
    $phone = $_POST['phonenumber'];

    
    if ($password !== $password_repeat) {
        echo "Passwords do not match!";
    } else {
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        
        $stmt = $conn->prepare("INSERT INTO customer (FirstName, LastName, Email, PasswordHash, Address, City, PostalCode, Country, Phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        
        if ($stmt === false) {
            die("Error preparing SQL statement: " . $conn->error);
        }
        // sql attack voorkomen
        $stmt->bind_param("sssssssss", $firstname, $lastname, $email, $hashed_password, $address, $city, $postalcode, $country, $phone);

        
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error executing statement: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/register.css">
    <title>Register</title>
</head>
<body>
<?php include 'header.php'; ?>

<div class="text">
    <h1>Register for free today.</h1>
</div>
<div class="container">
    <form action="register.php" method="post" >
        <div class="register">
            <div class="input-box">
                <input type="text" placeholder="Enter First name" name="firstname" required>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Enter Last name" name="lastname" required>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Enter Email" name="email" required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Enter Password" name="password" required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Repeat Password" name="password-repeat" required>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Enter Address" name="address" required>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Enter city" name="city" required>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Enter Postal Code" name="postalcode" required>
            </div>
            <div class="select-container">
                <select class="select-box" name="country" required>
                    <option value="" selected disabled>Select Country</option>
                    <option value="NL">Netherlands</option>
                    <option value="BE">Belgium</option>
                    <option value="DE">Germany</option>
                </select>
            </div>
            <div class="input-box">
                <input type="tel" placeholder="Enter Phone Number" name="phonenumber" required>
            </div>
            <div class="input-box-button">
                <button type="submit"
                        class="registerbtn">
                    <p> REGISTER </p>
                </button>
            </div>
        </div>
    </form>
</div>
</body>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="js/script.js"></script>
</html>
