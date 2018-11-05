<?php 
ini_set('display_errors',1);
    $customer = $_POST['customer'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    if (!$customer || !$email || !$comment) {
        echo "You have not entered all the required details. <br>";
        echo "Please try again.";
        exit();
    }

    if (!get_magic_quotes_gpc()) {
        $customer = addslashes($customer);
        $email = addslashes($email);
        $comment = addslashes($comment);
    }

    include "../dbconnect.php";
    $query = "insert into feedback values (NULL,'".$customer."','".$email."','".$comment."')";
    $db->query($query);
    $db->close();

    ini_set('display_errors',1);
    header('location: index.php');
    exit();
?>