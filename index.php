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
    <script src="main.js"></script>
</head>
<body>
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
                    <p class='nav-member'>Welcome back, dear <?php echo $_SESSION['valid_user'] ?>!</p>
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

        <div class="movie-overview">
            <table border="1" class="movie-posters">
                <tr>
                <?php 
                    @ $db = new mysqli('localhost', 'f36ee', 'f36ee', 'f36ee');
                    if (mysqli_connect_errno()) {
                        echo "Error: Could not connect to database.  Please try again later.";
                        exit;
                    }
                    $query = "select * from movie";
                    $result = $db->query($query);
                    if (!$result) {
                        echo "An error has occurred. Cannot read poster from database.";
                    } else {
                        $num_results = $result->num_rows;
                        for($i=0; $i<$num_results; $i++) {
                            if($i>7) break;
                            $row = $result->fetch_assoc();
                            $path = $row['poster'];
                            $name = $row['name'];
                            echo "<td><a href='./movieDetail/index.php?movie=".$name."'><img class='poster' src='.".$path."'></a></td>";
                            if($i==3) echo "</tr><tr>";
                        }
                    }
                    $result->free();
                    $db->close();
                ?>
                </tr>
            </table>
        </div>

        <div class="quick-book">
            <form class="book-form">
                <label>Select Movie</label>
                <select>
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
                            $row = $result->fetch_assoc();
                            $name = $row['name'];
                            $movieid = $row['movieid'];
                            echo "<option value='".$movieid."'>".$name."</option>";
                        }
                    }
                    $result->free();
                    $db->close();
                ?>
                </select><br>
                <label>Select Date</label>
                <input type="date"><br>
                <label>Select Time</label>
                <select>
                    <option value="time1">Time 1</option>
                    <option value="time2">Time 2</option>
                </select><br>
                <input type="submit" class="quick-book-now" value="Book Now">
            </form>  
        </div>

    </div>

<?php include 'footer.php' ?>