<?php

include_once 'source/session.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UCSI Education Event</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    <link rel="stylesheet" href="css/mainpage.style.css">
</head>
<body>

    <!--If the "username" is not set, redirect the use to "logout.php".-->
    <!--Also, it is to ensure that the user doesn't enter the page by editing the url on the browser.-->
    <?php if(!isset($_SESSION['username'])): header("location: logout.php");?>
    <?php else: ?>
    <?php endif ?> <!--The endif keyword is used to mark the end of an if condition.-->


    <!--Navigation-->
    <nav>
      <label class="logo">UCSI University</label>
      <ul>
        <li><a class="active" href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Feedback</a></li>
      </ul>
    </nav>

    <div class="container">
        <div class="d-info">
            <?php echo "<h2> User: ".$_SESSION['username']."</h2>"?>
        </div>
        
        <!--Main Section-->
        <main class="main">
            <div class="event-info">
                <h1>Apply for UCSI Education Event!</h1>
                <h3>Event Name: Data Analysis Course</h3>
                <p><span>Description:</span> The main goal of this event is to provide students with a comprehensive understanding of data analysis.</p>
                <p><span>Date:</span> 21 July 2021</p>
                <p><span>Location:</span> UCSI University, Block G (Level 12)</p>
            </div>

            <div class="event-form">
                <form action="register_participant.php" method="POST">
                    <input type="text" class="input-box" name="user-firstname" placeholder="First Name">
                    <input type="text" class="input-box" name="user-lastname" placeholder="Last Name">
                    <input type="text" class="input-box" name="user-email" placeholder="E-mail">
                    <input type="text" class="input-box" name="user-phone" placeholder="Phone Number">
                    <input type="text" class="input-box" name="user-address" placeholder="Address">
                    <input type="submit" name="register-btn" class="btn" value="Register">
                </form>
            </div>
    
        </main>

    </div>


    <!--Display Information. (Footer)-->
    <h2><a href="logout.php">Logout</a></h2>

</body>
</html>