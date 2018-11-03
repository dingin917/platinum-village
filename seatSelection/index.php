<?php 
    include "../dbconnect.php";
    $timeslotid = $_GET['timeslotid'];
    $timeslotid_str = strval ($timeslotid);
    $query = "select * from showtime where timeslotid=".$timeslotid;
    $result = $db->query($query);
    if (!$result) {
        echo "An error has occurred. Cannot read showtime from database.";
    } else {
        $row = $result->fetch_assoc();
        $movieid = $row['movieid'];
        $showdate = $row['showdate'];
        $timeslot = $row['timeslot'];
    }
    $result->free();

    $query = "select * from movie where movieid=".$movieid;
    $result = $db->query($query);
    if (!$result) {
        echo "An error has occurred. Cannot read movie from database.";
    } else {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $poster = $row['poster'];
    }
    $result->free();

    $query = "select * from transaction where timeslotid=".$timeslotid;
    $result = $db->query($query);
    if (!$result) {
        echo "An error has occurred. Cannot read transaction from database.";
    } else {
        $num_results = $result->num_rows;
        for($i=0; $i<$num_results; $i++) {
            $row = $result->fetch_assoc();
            $seat = $row['seat'];
            $seats = explode(',', $seat);
            // $seatsconut = count($seats);
        }
    }
    $result->free();

    $query = "select * from ticket_price Order by priceid DESC limit 1";
    $result = $db->query($query);
    if (!$result) {
        echo "An error has occurred. Cannot read ticket price from database.";
    } else {
        $row = $result->fetch_assoc();
        $price = $row['price'];
    }
    $result->free();
    $db->close();

    session_start();
    if (!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }

    if (isset($_GET['seat'])) {
        $seatarray = explode(",", $_GET['seat']);
        
        $timeslot_str = strval($timeslotid);
        foreach($seatarray as $seatid){
            $_SESSION['cart'][$timeslot_str][] = $seatid;
        }
        header('location: ' . $_SERVER['PHP_SELF']. '?' . SID.'&timeslotid='.$timeslotid);
        exit();
    }

    if (isset($_GET['seat_confirm'])) {

        $seatarray = explode(",", $_GET['seat_confirm']);

        if (empty($_GET['seat_confirm'])){

            header('location: ../cart/index.php?'.SID);
            exit();
        }else{
            $timeslot_str = strval($timeslotid);
            foreach($seatarray as $seatid){
                $_SESSION['cart'][$timeslot_str][] = $seatid;
            }
            header('location: ../cart/index.php?'.SID);
            exit();
        }
    }

    // var_dump($_SESSION);

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
<body onload="pageLoad()">
    <?php include "../header.php" ?>

    <div class="main-body">

        <div class="poster">
            <img alt="poster" class="poster-img" src="<?php echo '..'.$poster ?>">
        </div>

        <div class="ticket-info">
            <h3>Ticket Information</h3>
            <ul>
                <li>Movie: <?php echo $name ?></li>
                <?php echo "<li id='hidden'>".$timeslotid."</li>" ?>
                <li>Date & Time:    <?php echo $showdate." ".$timeslot ?></li>
                <li>Ticket Price:   $ <?php echo "<span id='ticket_price'>".$price."</span>" ?></li>
                <li>Seat No.:       <span id="seatsNo"></span></li>
                <li>Total Amount:   $ <span id="toAmount"></span></li>
            </ul>
            

            <button id="addto-cart" onclick="add_to_cart()" disabled>Add to cart</button>           
            <div class="confirm-cancel">
                <button id="confirm" onclick="confirm()">Confirm</button>        
                <a href="../movies/index.php">
                    <button id="cancel">Cancel</button>
                </a>
            </div>  
        </div>

        <div class="movie">
            <div class="movie-info">
                <h3><?php echo $name ?></h3>
                <ul>
                    <li>Hall Information: Platinum Suites</li>
                    <li>Date and Time: <?php echo $showdate." ".$timeslot ?></li>
                </ul>
            </div>
            <div class="selection-table">
                <h3>Seat Selection</h3>
                <div class="color">
                    <div class="foo white"></div><span>Available</span>
                    <div class="foo gray"></div><span>Sold</span>
                    <div class="foo skyblue"></div><span>Reserved</span>
                    <div class="foo yellow"></div><span>Your Selection</span>
                </div>
                <div class="seats">
                    <hr class="screenhr">
                    <p class="screen">
                        Screen
                    </p>
                    <table>
                    <?php 

                    for($i=0;$i<5;$i++) {
                        echo "<tr class='seatrow'>";
                        for($j=0;$j<10;$j++){
                            foreach ($seats as $block_seat){
                                if ($block_seat == chr($i+65).$j ) {
                                    echo "<td><input type='checkbox' value='".chr($i+65).$j."' id='".chr($i+65).$j."'disabled>";
                                    echo "<label for='".chr($i+65).$j."'>".chr($i+65).$j."</label>";
                                    echo "</td>";
                                    $disable = 1;
                                    break;   
                                }
                            }
                            if ($disable == 1){
                                $disable = 0;
                                continue;
                            }
                            if ($_SESSION['cart']){
                                if (array_key_exists($timeslotid_str,$_SESSION['cart'])){
                                    foreach($_SESSION['cart'][$timeslotid_str] as $seat_reserved){
                                        if ($seat_reserved == chr($i+65).$j){
                                            echo "<td><input type='checkbox' name='reserved' value='".chr($i+65).$j."' id='".chr($i+65).$j."'disabled>";
                                            echo "<label for='".chr($i+65).$j."'>".chr($i+65).$j."</label>";
                                            echo "</td>";
                                            $disable = 1;
                                            break; 
                                        }
                                    }
                                }

                                if ($disable == 1){
                                    $disable = 0;
                                    continue;
                                }
                            }

                            echo "<td><input type='checkbox' onclick='seatClick()' class='chked' value='".chr($i+65).$j."' id='".chr($i+65).$j."'>";
                            echo "<label for='".chr($i+65).$j."'>".chr($i+65).$j."</label>";
                            echo "</td>";
                            
                        }
                        echo "</tr>";
                    }

                    // echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                            echo ' <script src="index.js"></script>'

                    ?>
                    </table>
                </div>
            </div>

        </div>

    </div>

<?php include '../footer.php' ?>