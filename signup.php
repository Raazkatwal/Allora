<!DOCTYPE html>
<?php
$email_null = null;
$email_used = null;
$username_null = null;
$username_used = null;
$password_null = null;
if (isset($_POST['submit'])) 
{
    include 'db.php';
    $form_email = $_POST['email'];
    $form_username = $_POST['username'];
    $form_password = $_POST['password'];
    if (empty($form_email)) {
        $email_null = true;
    }
    if (empty($form_username)) {
        $username_null = true;
    }
    if (empty($form_password)) {
        $password_null = true;
    }
    $username_check = mysqli_query($con, "SELECT * FROM `userinfo` WHERE `username` = '$form_username'");
    $email_check = mysqli_query($con, "SELECT * FROM `userinfo` WHERE `username` = '$form_username'");
    if (mysqli_num_rows($username_check)==0 && mysqli_num_rows($email_check)==0) {
        $form_password = password_hash($form_password, PASSWORD_DEFAULT);
        mysqli_query($con, "INSERT INTO `userinfo`(`username`, `email`, `password`) VALUES ('$form_username','$form_email','$form_password')");
        header('location:index.php');
    }elseif (mysqli_num_rows($username_check)>0) {
        $username_used = true;
        if (mysqli_num_rows($email_check)>0) {
            $email_used = true;
        }
    }else {
        $email_used = true;
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
            <div class="<?php if ($email_null == true) {echo 'email-null-error';} if($email_used == true) {echo 'email-error';}?>">
                <label for="email">Email address*</label>
                <input type="text" id="email" class="form-input" name="email" autocomplete="off">
            </div>
            <div class="<?php if ($username_null == true) {echo 'username-null-error';} if($username_used == true) {echo 'username-error';}?>">
                <label for="username">Username*</label>
                <input type="text" id="username" class="form-input" name="username" autocomplete="off">
            </div>
            <div class="password_div <?php if ($password_null == true) {echo 'password-error';}?>">
                <label for="password">Password*</label>
                <input type="password" name="password" id="password" class="form-input" autocomplete="off">
                <i class="fa-regular fa-eye-slash eye-icon"></i>
            </div>
            <div>
                <input type="checkbox" id="terms-and-policy"><label for="terms-and-policy"> I agree with all the Terms and conditions</label>
            </div>
            <input type="submit" value="Register" class="form-btn" name="submit">
        </div>
        <p class="linktext">Already have a account ? <a href="login.php">Login here</a></p>
    </form>
</main>
    <?php require 'footer.php'?>
</body>
</html>