<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Platinum Village</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="./index.css" />
    <script type= "text/javascript" src="../validation.js"></script>
</head>
<body>
    <?php include "../header.php" ?>

    <div class="main-body">
        <div class="login">
            <form class="login-form" action="handle-login.php" method="post">
                <h2>Welcome back, login here! </h2>
                <label>Username</label>
                <input type="text" name="username" id="myusername" required><br>
                <label>Password</label>
                <input type="password" name="password" id="mypassword" required><br>
                <input type="submit" value="Login">
            </form>
        </div>

        <div class="register">
            <form class="register-form" action="handle-register.php" method="post">
                <h2>Registration here to enjoy our exclusive discount!</h2>
                <label>Your name: </label>
                <input type="text" name="name" id="name" required><br>
                <label>Your email address: </label>
                <input type="email" name="email" id="email" required><br>
                <label>Your username: </label>
                <input type="text" name="username" id="username" required><br>
                <label>Your password: </label>
                <input type="password" name="password" id="password" required><br>
                <label>Re-enter your password: </label>
                <input type="password" name="password2" id="password2" required><br>
                <input type="reset" value="Reset" class="reset-button">
                <input type="submit" value="Submit">
            </form>
            <script type = "text/javascript" src = "index.js"></script>
        </div>
    </div>

<?php include '../footer.php' ?>