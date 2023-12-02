<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalabe=no">
    <title>Login | Allora</title>
    <?php include 'links.php' ?>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<?php require 'navbar.php' ?>
<main id="main-content">
    <form action="" method="post" class="login-form">
        <h1 class="form-title">
            Welcome Back
        </h1>
            <div class="login-section">
                <div>
                    <label for="logemail">Email address*</label>
                    <input type="text" id="logemail" class="form-input" autocomplete="off" required>
                </div>
                <div class="password_div">
                    <label for="logpassword">Password*</label>
                    <input type="password" id="password" class="form-input" autocomplete="off" required>
                    <i class="fa-regular fa-eye-slash eye-icon"></i>
                </div>
                <input type="submit" value="Login" class="form-btn">
            </div>
            <p class="gotosignup">Dont have a account ? <a href="signup.php">Register here</a></p>
    </form>
</main>
<?php require 'footer.php' ?>
</body>
</html>