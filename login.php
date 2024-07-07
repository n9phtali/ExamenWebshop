<?php

session_start();


include 'db_connect.php';


$email = $password = "";
$email_err = $password_err = $login_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter email.";
    } else {
        $email = trim($_POST["email"]);
    }

    
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    
    if (empty($email_err) && empty($password_err)) {
        
        $sql = "SELECT CustomerID, Email, PasswordHash FROM customer WHERE Email = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            
            $param_email = $email;

            
            if (mysqli_stmt_execute($stmt)) {
               
                mysqli_stmt_store_result($stmt);

                
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        
                        echo "<pre>";
                        echo "Entered password: $password\n";
                        echo "Hashed password from DB: $hashed_password\n";
                        echo "</pre>";

                        if (password_verify($password, $hashed_password)) {
                            
                            session_start();

                           
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

                            
                            header("location: home.php");
                            exit;
                        } else {
                           
                            $login_err = "Invalid email or password.";
                        }
                    }
                }  else {
                    
                    $login_err = "Invalid email or password.";
                }

            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

           
            mysqli_stmt_close($stmt);
        }
    }

   
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/login.css">
    <title>LOGIN</title>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <!-- veiligheeidd tegen attacks ofzo -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="login">
            <?php
            if (!empty($login_err)) {
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }
            ?>
            <div class="input-box">
                <input type="text" placeholder="Enter Email" name="email" required>
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Enter Password" name="password" required>
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="input-box-button">
                <button type="submit" class="registerbtn">
                    <p> LOGIN </p>
                </button>
            </div>
        </div>
    </form>
</div>
</body>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="js/script.js"></script>
</html>
