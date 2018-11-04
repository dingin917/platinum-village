<?php 
    session_start();
    if (!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    // ini_set('display_errors',1);
    include "../dbconnect.php";
    $date = date("Y-m-d");
    foreach ($_SESSION['cart'] as $key => $id){
        if(is_array($id)){
            $seat_select = '';
            foreach($id as $key2 => $seat){
                $seat_select = $seat_select.','.$seat;
            }
            $seat_select = substr($seat_select,1);
            $query = "insert into transaction values (NULL,".intval($key).",NULL,'".$seat_select."','".$date."')";
            var_dump($query);
            $db->query($query);
        }   
    }
    $db->close();
    unset($_SESSION['cart']);
    header('location: ../summary/index.php');
    exit();
?>