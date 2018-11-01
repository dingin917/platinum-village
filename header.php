<?php
    session_start();
    $username = $_SESSION['valid_user'];
?>
    <div class="wrapper">
        <header>
            <div class="logo-box">
                <img class="logo-img" src="../img/logo.png"> 
            </div>
            <nav class="nav-block">
                <?php if(!isset($_SESSION['valid_user'])): ?>
                    <button type='button' class='nav-member' onclick="location.href='../membership/login.php'">Login / Join Us</button>
                <?php endif; ?>
                <?php if(isset($_SESSION['valid_user'])): ?>
                    <button type='button' class='nav-member' onclick="location.href='../membership/logout.php'">Logout</button>
                    <p class='nav-member'>Welcome back, dear <?php echo $_SESSION['valid_user'] ?>!</p>
                <?php endif; ?>
                <ul class="nav-bar">
                    <li class="nav-li"><a href="../index.php">Home</a></li>
                    <li class="nav-li"><a href="../movies/index.php">Movies</a></li>
                    <li class="nav-li"><a href="../cart/index.php">Cart</a></li>
                    <li class="nav-li"><a href="../contact/index.php">Contact Us</a></li>
                </ul>
            </nav>     
        </header>
    </div>