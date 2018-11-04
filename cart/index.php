<?php 
    // ini_set('display_errors',1);
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

    $timeslotid = $_GET['timeslotid'];
    $empty = $_GET['empty'];
    $empty_all = $_GET['empty_all'];

    if ($empty){
        unset($_SESSION['cart'][$timeslotid]);
        $empty = 0;
        header('location: ' . $_SERVER['PHP_SELF']. '?' . SID);
        exit();
    }

    if ($empty_all){
        unset($_SESSION['cart']);
        $empty_all = 0;
        header('location: ' . $_SERVER['PHP_SELF']. '?' . SID);
        exit();
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
        <table class="cart_table" border="0">
            <thead>
               <tr id="descript_part">
                   <th colspan="2" id="Describe">Items In your booking cart</th>
                   <?php echo "<th class='Remove_all' align='right'>";
                            if($_SESSION['cart']){
                                echo "<a href='".$_SERVER['PHP_SELF']."?&empty_all=1'>";
                                    echo "<button class='remove_all_button'>Remove All Items</button>";
                                echo "</a>";
                            }
                            else{
                                echo "<button class='remove_all_button' disabled>Remove All Items</button>";
                            }
                            
                        echo "</th>";
                    ?>
               </tr>
            </thead>
            <tbody>
                <?php include "cart_print.php" ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2" align='right'>Total Price:</th><br>
                    <th align='center'>$ <?php 
                    if ($total_amount) {
                        echo number_format($total_amount, 2); 
                    }
                    else{
                        echo '0.00';
                    }
                    ?>
                    </th>
                </tr>
                <tr id="confirm_part">
                    <th colspan="2" align='right'>
                        <a href="../movies/index.php">
                            <button id="shopping">Continue Shopping</button>
                        </a>
                    </th>
                    <th align='right'>
                        <?php
                        if ($_SESSION['cart']){
                            if(!isset($_SESSION['valid_user'])){
                                echo '<a href="bought.php">
                                        <button id="summary" onclick="popup()">Confirm</button>
                                    </a>';
                            }
                            else {
                                echo '<a href="bought.php">
                                        <button id="summary" >Confirm</button>
                                    </a>';
                            }
                        }
                        else {
                            echo '<button id="summary" disabled>Confirm</button>';
                        }
                        ?>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>

    <?php include '../footer.php' ?>