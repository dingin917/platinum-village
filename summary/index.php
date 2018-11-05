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
    <?php include "../header.php" ?>

    <div class="main-body">

        <h3>Review your successful booking(s)</h3>

        <?php 
        $email_message = "Review your successful booking(s) with Platinum Village! ";
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

                $email_message = "Movie: ".$name."; Hall: Platinum Suites; Date and Time: ".$showdate." ".$timeslot."; Seat: ".$seat_select.".";
            }
        }
        /*
            Send confirmation email to member 
        */
        $memberid = $_GET['memberid'];
        include "../dbconnect.php";
        $query = "select email from member where memberid=".$memberid;
        $result = $db->query($query);
        if (!$result) {
            echo "An error has occurred. Cannot read from member table.";
        } else {
            $row = $result->fetch_assoc();
            $email = $row['email'];
            $subject = "Movie Ticket Confirmation Letter";
            $headers = 'From: f36ee@localhost' . "\r\n" .
                'Reply-To: f36ee@localhost' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($email, $subject, $email_message, $headers,'-ff36ee@localhost');
            echo "<p>A confirmation email has been sent to your email address ".$email.".</p>";
        }
        $result->free();
        $db->close();
        
        unset($_SESSION['cart']);
        ?>
    </div>

<?php include '../footer.php' ?>