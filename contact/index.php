<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Platinum Village</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="./index.css" />
    <script type= "text/javascript" src="../validation.js"></script>
</head>
<body>
    <?php include "../header.php" ?>

    <div class="main-body">

        <h3>Contact Us</h3>

        <div class="cinema-info">
            <ul>
                <li>Our Address: <Address>38 Nanyang Crescent, 636866</Address></li><br>
                <li>Contact Number: <Address>+65 6700 0076</Address></li><br>
                <li>Email: <Address>contactus@platinumvillage.com</Address></li><br>
                <li>Office Operating Hours: <Address>09:00 to 18:00 Mon to Fri</Address></li>
            </ul>
        </div>
        <div class="survey-block">
            <p>Any immediate feedback or enquiry?</p>
            <p>Drop us your comment here?</p>
            <br>
            <form class="survey" method="post" action="feedback.php">
                <label>Your name: </label>
                <input type="text" name='customer' id='customer' required><br>
                <label>Your email: </label>
                <input type="email" name='email' id='email' required><br>
                <label>Your comment: </label><br>
                <textarea name='comment' required></textarea><br>
                <input type="submit" value="Submit" onclick=infoPopup()>
            </form>
            <script type = "text/javascript" src = "index.js"></script>
        </div>

    </div>

<?php include '../footer.php' ?>