<!DOCTYPE html>
<?php
include 'db.php';
if (isset($_SESSION['IS_LOGIN'])) {
    header('location:index.php');
    exit; 
}
$errors = [
    'email' => false,
    'username' => false,
    'password' => false
];

if (isset($_POST['submit'])) {
    $form_email = $_POST['email'];
    $form_username = $_POST['username'];
    $form_password = $_POST['password'];

    if (empty($form_email)) {$errors['email'] = true;}
    if (empty($form_username)) {$errors['username'] = true;}
    if (empty($form_password)) {$errors['password'] = true;}

    if (!in_array(true, $errors)) {
        $username_check = mysqli_query($con, "SELECT * FROM `userinfo` WHERE `username` = '$form_username'");
        $email_check = mysqli_query($con, "SELECT * FROM `userinfo` WHERE `email` = '$form_email'");

        if (mysqli_num_rows($username_check) == 0 && mysqli_num_rows($email_check) == 0) {
            $form_password = password_hash($form_password, PASSWORD_DEFAULT);
            mysqli_query($con, "INSERT INTO `userinfo`(`username`, `email`, `password`) VALUES ('$form_username','$form_email','$form_password')");
            $_SESSION['IS_LOGIN'] = true;
            $_SESSION['username'] = $form_username;
            header('location:index.php');
            exit;
        } else {
            $username_used = (mysqli_num_rows($username_check) > 0);
            $email_used = (mysqli_num_rows($email_check) > 0);
        }
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
            <div class="<?php if ($errors['email']) {echo 'email-null-error ';} if ($email_used) {echo 'email-error';} ?>">
                <label for="email">Email address*</label>
                <input type="text" id="email" class="form-input" name="email" autocomplete="off">
            </div>
            <div class="<?php if ($errors['username']) {echo 'username-null-error ';} if($username_used) {echo 'username-error';} ?>">
                <label for="username">Username*</label>
                <input type="text" id="username" class="form-input" name="username" autocomplete="off">
            </div>
            <div class="password_div <?php if ($errors['password']) {echo 'password-error';} ?>">
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