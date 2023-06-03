<?php
if (isset($_POST['register'])) {
    include ('db.php');
    $user = $_POST['regusername'];
    $mail = $_POST['regemail'];
    $pass = $_POST['regpassword'];
    if (empty($pass)) {
        echo '
        <script src = "script.js" defer>
            password_is_null();
        <script>
        ';
    }else{
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $query = "INSERT INTO `userinfo`(`username`, `email`, `password`) VALUES ('$user','$mail','$pass')";
        mysqli_query($con, $query);
        header('location:index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalabe=no">
    <link rel="icon" href="img/logo.png">
    <title>Login / Sign up - Allora</title>
    <?php require 'links.php'?>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<?php require 'navbar.php' ?>
<main id="main-content">
    <form action="" method="post" class="login-form">
        <h1 class="form-title">
            <button class="login-form-btn active-btn">Login</button> or <button class="register-form-btn">Register</button>
        </h1>
        <div class="login-swipe">
            <div class="login-section">
                <div>
                    <label for="logemail">Email address*</label>
                    <input type="text" id="logemail" class="form-input" autocomplete="off">
                </div>
                <div class="login_password_div">
                    <label for="logpassword">Password*</label>
                    <input type="password" id="logpassword" class="form-input" autocomplete="off">
                    <i class="fa-regular fa-eye-slash eye-icon"></i>
                </div>
                <input type="submit" value="Login" class="form-btn">
            </div>
            <div class="register-section">
                <div>
                    <label for="regemail">Email address*</label>
                    <input type="text" id="regemail" class="form-input" name="regemail" autocomplete="off">
                </div>
                <div>
                    <label for="reusername">Username*</label>
                    <input type="text" id="reusername" class="form-input" name="regusername" autocomplete="off">
                </div>
                <div>
                    <label for="regpassword">Password*</label>
                    <input type="password" id="regpassword" class="form-input" name="regpassword" autocomplete="off">
                    <i class="fa-regular fa-eye-slash eye-icon"></i>
                </div>
                <div>
                    <input type="checkbox" id="terms-and-policy"><label for="terms-and-policy"> I agree with all the Terms and conditions</label>
                </div>
                <input type="submit" value="Register" class="form-btn" name="register" id="register-submit-btn">
            </div>
        </div>
    </form>
</main>
<?php require 'footer.php' ?>
</body>
</html>