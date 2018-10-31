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
            <img alt="poster" class="poster-img">
        </div>

        <div class="ticket-info">
            <h3>Ticket Information</h3>
            <ul>
                <li>Movie: <span></span></li>
                <li>Date & Time: <span></span></li>
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
                <h3>Movie Name</h3>
                <ul>
                    <li>Hall Information: <span></span></li>
                    <li>Date and Time: <span></span></li>
                </ul>
            </div>
            <div class="selection-table">
                <h3>Seat Selection</h3>
            </div>
        </div>

    </div>

<?php include '../footer.php' ?>