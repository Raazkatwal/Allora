<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'links.php'?>
    <title>Signup | Allora</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <?php require 'navbar.php'?>
    <main id="main-content">
    <form action="" method="post" class="login-form">
        <h1 class="form-title">
            Create an account
        </h1>
        <div class="login-section">
            <div>
                <label for="email">Email address*</label>
                <input type="text" id="email" class="form-input" name="regemail" autocomplete="off">
            </div>
            <div>
                <label for="username">Username*</label>
                <input type="text" id="username" class="form-input" name="username" autocomplete="off">
            </div>
            <div class="password_div">
                <label for="password">Password*</label>
                <input type="password" id="password" class="form-input" autocomplete="off">
                <i class="fa-regular fa-eye-slash eye-icon"></i>
            </div>
            <div>
                <input type="checkbox" id="terms-and-policy"><label for="terms-and-policy"> I agree with all the Terms and conditions</label>
            </div>
            <input type="submit" value="Register" class="form-btn">
        </div>
        <p class="linktext">Already have a account ? <a href="login.php">Login here</a></p>
    </form>
</main>
    <?php require 'footer.php'?>
</body>
</html>