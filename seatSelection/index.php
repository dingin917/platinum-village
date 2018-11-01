<?php 
    @ $db = new mysqli('localhost', 'f36ee', 'f36ee', 'f36ee');
    if (mysqli_connect_errno()) {
        echo "Error: Could not connect to database.  Please try again later.";
        exit;
    }

    $query = "select * from showtime where timeslotid=".$_GET['timeslotid'];
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
        echo "An error has occurred. Cannot read showtime from database.";
    } else {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $poster = $row['poster'];
    }
    $result->free();

    $db->close();

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

        <div class="poster">
            <img alt="poster" class="poster-img" src="<?php echo '..'.$poster ?>">
        </div>

        <div class="ticket-info">
            <h3>Ticket Information</h3>
            <ul>
                <li>Movie: <?php echo $name ?></li>
                <li>Date & Time: <?php echo $showdate." ".$timeslot ?></li>
                <li>Seat No.: <span></span></li>
                <li>Total Amount: <span></span></li>
            </ul>
            <button type="submit" class="addto-cart">Add to cart</button>
            <div class="confirm-cancel">
                <button type="submit" class="confirm">Confirm</button>
                <button type="submit" class="cancel">Cancel</button>
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
                <table>
                <?php 
                for($i=0;$i<5;$i++) {
                    echo "<tr>";
                    for($j=0;$j<10;$j++){
                        echo "<td><input type='checkbox' id='".chr($i+65).$j."'>".chr($i+65).$j."</td>";
                    }
                    echo "</tr>";
                }
                ?>
                </table>
            </div>

        </div>

    </div>

<?php include '../footer.php' ?>