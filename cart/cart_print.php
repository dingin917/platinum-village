<?php 
    include "../dbconnect.php";
    $query = "select * from ticket_price Order by priceid DESC limit 1";
    $result = $db->query($query);
    if (!$result) {
        echo "An error has occurred. Cannot read ticket price from database.";
    } else {
        $row = $result->fetch_assoc();
        $price = $row['price'];
    }
    $result->free();

    foreach($tmid as $timeslotid){
        $amount = 0;
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

        echo "<tr>";
            echo "<td class='poster_td'><img class='poster' src='..".$poster."'></td>";
            echo "<td class='movie_info'>";
                echo "<table class='small_table' border = 0>";
                    echo "<tr>";
                        echo "<td>Name:&nbsp;&nbsp;</td>";
                        echo "<td>".$name."<td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>Date:&nbsp;&nbsp;</td>";
                        echo "<td>".$showdate."<td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>Time:&nbsp;&nbsp;</td>";
                        echo "<td>".$timeslot."<td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>Seat:&nbsp;&nbsp;</td>";
                        echo "<td>";
                            foreach($seat_select[$timeslotid] as $seat){
                                echo $seat." ";
                                $amount = $amount + $price;
                            }
                        echo "<td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td>Total Price:&nbsp;&nbsp;</td>";
                        echo "<td>$ ".number_format($amount,2)."</td>";
                    echo "</tr>";
                echo "</table>";
            echo "</td>";
            echo "<td class='Remove'>";
                echo "<a href='".$_SERVER['PHP_SELF']."?timeslotid=".$timeslotid."&empty=1'>";
                    echo "<button class='remove_button'>Remove Item</button>";
                echo "</a>";
            echo "</td>";
        echo "</tr>";
            



    }
    $db->close();
?>