<?php
    include "../dbconnect.php";
    session_start();
    ini_set('display_errors', 1);

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);

        $query = "select * from member where username='".$username."' and password='".$password."'";
        $result = $db->query($query);

        if (!$result) {
            echo "An error has occurred. Cannot read poster from database.";
        } else {
            if($result->num_rows>0){
                $_SESSION['valid_user'] = $username;
            } else {
                if(isset($_SESSION['valid_user'])){
                    unset($_SESSION['valid_user']);
                    session_destroy();
                }
            }
        }
        $result->free();
        $db->close();
    }
?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Platinum Village</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="./index.css" />
</head>
<body>

    <div class="main-body">
        <?php if(isset($_SESSION['valid_user'])): ?>
        <p>
            Welcome back, dear <span class="username"><?php echo $_SESSION['valid_user'] ?></span>!<br><br>
            The page will be automatically re-navigated to Homepage in <span id="count">3</span> seconds.<br>
            If it does not direct you to Homepage automatically, please kindly <a href="../index.php">click here</a>.
        </p>
        <script type="text/javascript" src="../counter.js"></script>
        <?php endif; ?>
        <?php if(!isset($_SESSION['valid_user'])): ?>
        <p>You are not a valid user, please <a href='login.php'>login</a> again or back to <a href='../index.php'>Homepage</a>..</p>
        <?php endif; ?>
    </div>

<?php include "../footer.php" ?>