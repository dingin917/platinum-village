<?php
    include "../dbconnect.php";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password != $password2) {
        echo "Sorry passwords do not match";
        echo "<br><a href='login.php'>Back To Registration..</a>";
	    exit;
    }

    $password = md5($password);

    $query = "select * from member where username='".$username."' or email='".$email."';";
    $result = $db->query($query);
    if (!$result) {
        echo "An error has occurred. Cannot read member from database.";
    } else {
        $num_results = $result->num_rows;
        if($num_results>0){
            echo "Sorry that your username or email address has been registered, please try another one.";
            $result->free();
            echo "<br><a href='login.php'>Back To Registration Page..</a>";
            exit;
        } else {
            $query = "insert into member values(NULL,'".$username."','".$email."','".$name."','".$password."')";
            $result = $db->query($query);
            if(!$result)
                echo "Your register query failed.";
            else 
                echo "Welcome to Platinum Village, dear ".$username.". You are now registered.";
                echo "<br><a href='login.php'>Move To Login Page..</a>";
        }
    }
    $result->free();
    $db->close();
?>