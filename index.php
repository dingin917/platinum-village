<?php
    session_start();
    $username = $_SESSION['valid_user'];
?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Platinum Village</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    <div class="body-wrapper">
        <div class="wrapper">
            <header>
                <div class="logo-box">
                    <img class="logo-img" src="./img/logo.png"> 
                </div>
                <nav class="nav-block">
                    <?php if(!isset($_SESSION['valid_user'])): ?>
                        <button type='button' class='nav-member' onclick="location.href='./membership/login.php'">Login / Join Us</button>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['valid_user'])): ?>
                        <button type='button' class='nav-member' onclick="location.href='./membership/logout.php'">Logout</button>
                        <p class='nav-member-text'>Welcome back, dear <?php echo $_SESSION['valid_user'] ?>!</p>
                    <?php endif; ?>
                    <ul class="nav-bar">
                        <li class="nav-li"><a href="index.php">Home</a></li>
                        <li class="nav-li"><a href="./movies/index.php">Movies</a></li>
                        <li class="nav-li"><a href="./cart/index.php">Cart</a></li>
                        <li class="nav-li"><a href="./contact/index.php">Contact Us</a></li>
                    </ul>
                </nav>     
            </header>
        </div>

        <div class="main-body">
        <div class="quick-book">
                <form class="book-form" action="./movies/filterResult.php" method="post">
                    <label>Select Movie</label>
                    <select name="selected-movie">
                    <option value=0>select a movie</option>
                    <?php
                        include "dbconnect.php";
                        $query = "select * from movie where showing='nowshowing'";
                        $result = $db->query($query);
                        if (!$result) {
                            echo "An error has occurred. Cannot read from movie table.";
                        } else {
                            $num_results = $result->num_rows;
                            for($i=0; $i<$num_results; $i++) {
                                $row = $result->fetch_assoc();
                                $name = $row['name'];
                                echo "<option value='".$name."'>".$name."</option>";
                            }
                        }
                        $result->free();
                        $db->close();
                    ?>
                    </select><br>
                    <label>Select Genre</label>
                    <select name="selected-genre">
                    <option value=0>select a category</option>
                    <?php 
                        include "dbconnect.php";
                        $query = "select distinct genre from movie";
                        $result = $db->query($query);
                        if (!$result) {
                            echo "An error has occurred. Cannot read from movie table.";
                        } else {
                            $num_results = $result->num_rows;
                            for($i=0; $i<$num_results; $i++) {
                                $row = $result->fetch_assoc();
                                $genre = $row['genre'];
                                echo "<option value='".$genre."'>".$genre."</option>";
                            }
                        }
                        $result->free();
                        $db->close();
                    ?>
                    </select><br>
                    <label>Select Director</label>
                    <select name="selected-director">
                    <option value=0>select a director</option>
                    <?php 
                        include "dbconnect.php";
                        $query = "select distinct director from movie";
                        $result = $db->query($query);
                        if (!$result) {
                            echo "An error has occurred. Cannot read from movie table.";
                        } else {
                            $num_results = $result->num_rows;
                            for($i=0; $i<$num_results; $i++) {
                                $row = $result->fetch_assoc();
                                $director = $row['director'];
                                echo "<option value='".$director."'>".$director."</option>";
                            }
                        }
                        $result->free();
                        $db->close();
                    ?>
                    </select><br>
                    <input type="submit" class="quick-book-now" value="Search Now">
                </form>  
            </div>
            <div class="movie-overview">
                <table border="1" class="movie-posters">
                    <tr>
                    <?php 
                        include "dbconnect.php";
                        $query = "select * from movie";
                        $result = $db->query($query);
                        if (!$result) {
                            echo "An error has occurred. Cannot read from movie table.";
                        } else {
                            $num_results = $result->num_rows;
                            for($i=0; $i<$num_results; $i++) {
                                if($i>7) break;
                                $row = $result->fetch_assoc();
                                $path = $row['poster'];
                                $name = $row['name'];
                                echo "<td><a href='./movieDetail/index.php?movie=".$name."'><img class='poster' src='.".$path."'></a><br><br><span>".$name."</span></td>";
                                if($i==3) echo "</tr><tr>";
                            }
                        }
                        $result->free();
                        $db->close();
                    ?>
                    </tr>
                </table>
            </div>
        </div>

    <?php include 'footer.php' ?>