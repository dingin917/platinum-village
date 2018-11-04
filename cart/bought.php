<?php 
    // ini_set('display_errors',1);
    include "../dbconnect.php";
    session_start();
    $_SESSION['cart'] = array();

    $query = "select * from member where username ='".$_SESSION['valid_user']."'";
    $result = $db->query($query);
    if (!$result) {
        echo "An error has occurred. Cannot read poster from database.";
    } else {
        $row = $result->fetch_assoc();
        $memberid = $row['memberid'];
    }
    $result->free();
    
    $date = date("Y-m-d");
    foreach ($_SESSION['cart'] as $key => $id){
        if(is_array($id)){
            $seat_select = '';
            foreach($id as $key2 => $seat){
                $seat_select = $seat_select.','.$seat;
            }
            $seat_select = substr($seat_select,1);
            $query = "insert into transaction values (NULL,".intval($key).",".$memberid.",'".$seat_select."','".$date."')";
            $db->query($query);
        }  
    }
    $db->close();
    //unset($_SESSION['cart']);
    header('location: ../summary/index.php');
    exit();
?>