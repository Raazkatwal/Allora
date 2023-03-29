<?php
if (isset($_POST['register'])) {
    include ('db.php');
    $user = $_POST['regusername'];
    $mail = $_POST['regemail'];
    $pass = $_POST['regpassword'];
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $query = "INSERT INTO `userinfo`(`username`, `email`, `password`) VALUES ('$user','$mail','$pass')";
    mysqli_query($con, $query);
    header('location:index.php');
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
    <script src="https://kit.fontawesome.com/a3c06e4acc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
    <script src="script.js" defer></script>
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
                    <input type="text" id="logemail" class="form-input">
                </div>
                <div>
                    <label for="logpassword">Password*</label>
                    <input type="password" id="logpassword" class="form-input">
                </div>
                <input type="submit" value="Login" class="form-btn">
            </div>
            <div class="register-section">
                <div>
                    <label for="regemail">Email address*</label>
                    <input type="text" id="regemail" class="form-input" name="regemail">
                </div>
                <div>
                    <label for="reusername">Username*</label>
                    <input type="text" id="reusername" class="form-input" name="regusername">
                </div>
                <div>
                    <label for="regpassword">Password*</label>
                    <input type="password" id="regpassword" class="form-input" name="regpassword">
                </div>
                <div>
                    <input type="checkbox" id="terms-and-policy"><label for="terms-and-policy"> I agree with all the Terms and conditions</label>
                </div>
                <input type="submit" value="Register" class="form-btn" name="register">
            </div>
        </div>
    </form>
</main>
<?php require 'footer.php' ?>
</body>
</html>