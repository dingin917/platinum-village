<?php
    @ $db = new mysqli('localhost', 'f36ee', 'f36ee', 'f36ee');
    if (mysqli_connect_errno()) {
        echo "Error: Could not connect to database.  Please try again later.";
        exit;
    }
?>