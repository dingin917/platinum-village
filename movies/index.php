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

        <div class="now-showing">
            <h3>Now Showing</h3>
            <table>
                <tr>
                <?php 
                    @ $db = new mysqli('localhost', 'f36ee', 'f36ee', 'f36ee');
                    if (mysqli_connect_errno()) {
                        echo "Error: Could not connect to database.  Please try again later.";
                        exit;
                    }
                    $query = "select * from movie where showing='nowshowing'";
                    $result = $db->query($query);
                    if (!$result) {
                        echo "An error has occurred. Cannot read poster from database.";
                    } else {
                        $num_results = $result->num_rows;
                        for($i=0; $i<$num_results; $i++) {
                            if($i>5) break;
                            $row = $result->fetch_assoc();
                            $path = $row['poster'];
                            $name = $row['name'];
                            $class = $row['class'];
                            $length = $row['length'];
                            $rating = $row['rating'];
                            echo "<td><a href='../movieDetail/index.php?movie=".$name."'><img class='poster' src='..".$path."'></a><br><br>
                                        <span>Name: ".$name."</span><br>
                                        <span>Class: ".$class."</span><br>
                                        <span>Running Time: ".$length."mins</span><br>
                                        <span>Rating: ".$rating."/10</span>
                                </td>";
                        }
                    }
                    $result->free();
                    $db->close();
                ?>
                </tr>
            </table>
        </div>
        <div class="upcoming">
            <h3>Upcoming</h3>
            <table>
                <tr>
                <?php 
                    @ $db = new mysqli('localhost', 'f36ee', 'f36ee', 'f36ee');
                    if (mysqli_connect_errno()) {
                        echo "Error: Could not connect to database.  Please try again later.";
                        exit;
                    }
                    $query = "select * from movie where showing='upcoming'";
                    $result = $db->query($query);
                    if (!$result) {
                        echo "An error has occurred. Cannot read poster from database.";
                    } else {
                        $num_results = $result->num_rows;
                        for($i=0; $i<$num_results; $i++) {
                            if($i>5) break;
                            $row = $result->fetch_assoc();
                            $path = $row['poster'];
                            $name = $row['name'];
                            $class = $row['class'];
                            $length = $row['length'];
                            $rating = $row['rating'];
                            echo "<td><a href='../movieDetail/index.php?movie=".$name."'><img class='poster' src='..".$path."'></a><br><br>
                                        <span>Name: ".$name."</span><br>
                                        <span>Class: ".$class."</span><br>
                                        <span>Running Time: ".$length."mins</span><br>
                                        <span>Rating: ".$rating."/10</span>
                                </td>";
                        }
                    }
                    $result->free();
                    $db->close();
                ?>
                </tr>
            </table>
        </div>

    </div>

<?php include '../footer.php' ?>