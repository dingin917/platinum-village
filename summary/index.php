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

        <h3>Review your successful booking(s)</h3>

        <?php 
        foreach ($_SESSION['cart'] as $key => $id){
            if(is_array($id)){
                $seat_select = '';
                foreach($id as $key2 => $seat){
                    $seat_select = $seat_select.','.$seat;
                }
                $seat_select = substr($seat_select,1);
                $timeslotid = intval($key);

                include "../dbconnect.php";
                $query = "select * from showtime where timeslotid=".$timeslotid;
                $result = $db->query($query);
                if (!$result) {
                    echo "An error has occurred. Cannot read from showtime table.";
                } else {
                    $row = $result->fetch_assoc();
                    $movieid = $row['movieid'];
                    $showdate = $row['showdate'];
                    $timeslot = $row['timeslot'];
                }
                $result->free();

                $query = "select name from movie where movieid=".$movieid;
                $result = $db->query($query);
                if (!$result) {
                    echo "An error has occurred. Cannot read from movie table.";
                } else {
                    $row = $result->fetch_assoc();
                    $name = $row['name'];
                }
                $result->free();
                $db->close();
                
                echo "<div class='booking-details'>
                        <h4>Booking Details</h4>
                        <table>
                            <tr><td class='left-col'>Movie:</td><td>".$name."</td></tr>
                            <tr><td class='left-col'>Hall Information:</td><td>Platinum Suites</td></tr>
                            <tr><td class='left-col'>Date and Time:</td><td>".$showdate." ".$timeslot."</td></tr>
                            <tr><td class='left-col'>Seat Information:</td><td>".$seat_select."</td></tr>
                        </table>
                    </div>";
            }
        }
        unset($_SESSION['cart']);
        ?>

    </div>

<?php include '../footer.php' ?>