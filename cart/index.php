<?php 
    ini_set('display_errors',1);
    session_start();
    if (!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    // var_dump($_SESSION);
    $tmid = [];
    $seat_select = [[],[]];
    foreach ($_SESSION['cart'] as $key => $id){
        $tmid[] = $key;
        if(is_array($id)){
            foreach($id as $key2 => $seat){
                $seat_select[$key][] = $seat;
            }
        }
    }
    // var_dump($seat_select);

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
    <script src="index.js"></script>
</head>
<body>
    <?php include "../header.php" ?>
    <div class="main-body">
        <table class="cart_table" border="1">
            <thead>
               <tr>
                   <th colspan="3">Items In your booking cart</th>
               </tr>
            </thead>
            <tbody>
                <?php include "cart_print.php" ?>
            </tbody>
        </table>
    </div>

    <?php include '../footer.php' ?>