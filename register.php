<?php
include 'db_connect.php'; // Include your database connection script

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
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
    <link rel="stylesheet" href="css/register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Register</title>
</head>
<body>
<?php include 'header.php'; ?>

<div class="text">
    <h1>Are you ready for a premium experience?</h1>
</div>
<div class="container">
    <form action="register.php" method="post" >
        <div class="register">
            <div class="input-box">
                <input type="text" placeholder="Enter First name" name="firstname" required>
                <input type="text" placeholder="Enter Last name" name="lastname" required>
            </div>
            
            <div class="input-box">
                <input type="text" placeholder="Enter Email" name="email" required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Enter Password" name="password" required>
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
                    <i class='bx bx-check-double'></i>
                    <p> Register </p>
                </button>
            </div>
        </div>
    </form>
</div>
</body>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="js/script.js"></script>
</html>
