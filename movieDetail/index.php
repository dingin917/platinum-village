<?php 
    include "../dbconnect.php";
    $query = "select * from movie where name='".$_GET['movie']."'";
    $result = $db->query($query);
    if (!$result) {
        echo "An error has occurred. Cannot read movie from database.";
    } else {
        $row = $result->fetch_assoc();
        $movieid = $row['movieid'];
        $path = $row['poster'];
        $name = $row['name'];
        $class = $row['class'];
        $cast = $row['cast'];
        $release = $row['releasedate'];
        $director = $row['director'];
        $length = $row['length'];
        $genre = $row['genre'];
        $language = $row['language'];
        $synopsis = $row['synopsis'];
        $trailer = $row['trailer'];
    }
    $result->free();

    $query = "select * from showtime where movieid=".$movieid;
    $result = $db->query($query);
    $showdate = [];
    $timeslot = [];
    if (!$result) {
        echo "An error has occurred. Cannot read showtime from database.";
    } else {
        $num_results = $result->num_rows;
        for($i=0; $i<$num_results; $i++) {
            $row = $result->fetch_assoc();
            $timeslotid[$i] = $row['timeslotid'];
            $showdate[$i] = $row['showdate'];
            $timeslot[$i] = $row['timeslot']; 
        }
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
</head>
<body>
    <?php include "../header.php" ?>

    <div class="main-body">

        <div class="movie-detail">
           <h3 class="movie-name"><?php echo $name ?></h3>
           <div class="movie-poster">
                <img class="movie-img" alt="Movie Poster" src="<?php echo '..'.$path ?>">
           </div>
           <div class="movie-description">
               <table class="desc-table">
                   <th>Details</th>
                   <tr>
                       <td>Cast: <?php echo $cast ?></td>
                       <td>Release: <?php echo $release ?></td>
                    </tr>
                    <tr>
                       <td>Director: <?php echo $director ?></td>
                       <td>Running Time: <?php echo $length ?> mins</td>
                    </tr>
                    <tr>
                       <td>Genre: <?php echo $genre ?></td>
                       <td>Language: <?php echo $language ?></td>
                    </tr>
                   <th>Synopsis</th>
                   <tr><td colspan='2'><?php echo $synopsis ?></td></tr>
               </table>
               <form action="<?php echo $trailer ?>">
                   <input type="submit" class="trailer" value="trailer">
                </form>
           </div>
        </div>

        <div class="time-slots">
            <h3>Available Time Slots</h3>
            <table class='timeslot-table' align='center'>
            <?php 
                if (!empty($timeslot)){
                    for($i=0; $i<sizeof($timeslot); $i++){
                        echo "<tr><td><a href='../seatSelection/index.php?timeslotid=".$timeslotid[$i]."'><span>".$showdate[$i]." ".$timeslot[$i]."</span></a></td></tr>";
                    }
                } else {
                    echo "<tr>Upcoming...</tr>";
                }
            ?>
            </table>
        </div>
        
    </div>

<?php include '../footer.php' ?>