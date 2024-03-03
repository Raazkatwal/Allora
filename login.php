<!DOCTYPE html>
<?php
include 'db.php';
if (isset($_SESSION['IS_LOGIN'])) {
    header('location:index.php');
}
$errors = [
    'email' => false,
    'password' => false
];
if (isset($_POST['submit'])) 
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = mysqli_query($con, "SELECT * FROM `userinfo` WHERE email = '$email';");
    if (mysqli_num_rows($query)>0) {
        $res = mysqli_fetch_assoc($query);
        $verify = password_verify($password, $res['password']);
        if ($verify) {
            $_SESSION['IS_LOGIN']=true;
            $_SESSION['username']=$res['username'];
            header('location:index.php');
            exit;
        }else {
            $errors['password'] = true;
        }
    }else {
        $errors['email'] = true;
    }
}
?>
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
            <div class="<?php if ($errors['email']) {echo 'email-not-found-error ';} ?>">
                <label for="email">Email address*</label>
                <input type="text" name="email" id="email" class="form-input" autocomplete="off">
            </div>
            <div class="password_div <?php if ($errors['password']) {echo 'password-not-match-error ';} ?>">
                <label for="password">Password*</label>
                <input type="password" name="password" id="password" class="form-input" autocomplete="off">
                <i class="fa-regular fa-eye-slash eye-icon"></i>
            </div>
            <input type="submit" name="submit" value="Login" class="form-btn">
        </div>
        <p class="linktext">Dont have a account ? <a href="signup.php">Register here</a></p>
    </form>
</main>
<?php require 'footer.php' ?>
</body>
</html>