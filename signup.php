<!DOCTYPE html>
<?php
if (isset($_POST['test'])) 
{
     $password = $_POST['password'];
    if (empty($password)) {
    echo'
    <script defer>
    console.log("gadbad hai baba");
        const password_input = document.querySelector("#password_textbox");
        password_input.classList.add("input-error");
        password_input.parentElement.classList.add("password-error");
        password_input.value = "";
    </script>
    ';
    }
}
?>
<html lang="en">
<head>
    <?php require 'links.php'?> 
    <title>Signup | Allora</title>
    <link rel="stylesheet" href="login.css">
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
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
                <input type="password" name="password" id="password_textbox" class="form-input password-error" autocomplete="off">
                <i class="fa-regular fa-eye-slash eye-icon"></i>
            </div>
            <div>
                <input type="checkbox" id="terms-and-policy"><label for="terms-and-policy"> I agree with all the Terms and conditions</label>
            </div>
            <input type="submit" value="Register" class="form-btn" name="test">
        </div>
        <p class="linktext">Already have a account ? <a href="login.php">Login here</a></p>
    </form>
</main>
    <?php require 'footer.php'?>
</body>
</html>