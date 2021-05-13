<?php
include "./config.php";
// Check user login or not
session_start();
error_reporting(0);
if($_SESSION['loggedinuser']==""){
    header("location: /LoginPage.php");
}

// check if Club name has been sent  When user click on Club name from Club page
if(isset($_GET["clubname"]))
{
    $clubname = $_GET["clubname"];
    $_SESSION['clubname'] = $clubname;
}
?>


<html lang="en">
<head> <meta charset="utf-8" http-equiv="refresh">
    <title>
        Club Users
    </title>

    <!-- This line will give the instruction on how the browser control the page how suppose to show the content in Tablet, Phone-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="css/mijares.css" type="text/css" rel="stylesheet">
    <link href="css/responsive_setting.css" type="text/css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merienda+One&display=swap" rel="stylesheet">
    <!-- JS and jQuery -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- <link href="css/login_form.css" rel="stylesheet" type="text/css"> -->
    <link href="css/userhomepage.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-light badge-dark " style="background-color:#04091e;">

        <div class="conatainer-fluid">
            <img id="logo" src="images/ubslogo.png" alt="Logo" class="navbar-brand">
        </div>

        <div class=" conatainer-fluid" style="background-color:seagreen;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" ></span>
            </button>
        </div>



        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/UserHomePage.php"  style="color: lightblue;">HOME</a>
                </li>
                <li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/sales.php"  style="color: lightblue;">SALES</a>
                </li>
                <li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/Clubs.php"  style="color: lightblue;text-decoration: underline;text-decoration-style:wavy;text-decoration-color:#00a6ff;">CLUBS</a>
                </li>
                <li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/exchange.php"  style="color: lightblue;">EXCHANGE</a>
                </li>
                <li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/messages.php"  style="color: lightblue;">MESSAGES</a>
                </li>
                <li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/advs.php" style="color: lightblue;">ADVS</a>
                </li>

                <li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/profile.php" style="color: lightblue;">Profile</a>
                </li>
            </ul>
            <ul class="navbar-nav">


                <li class="nav-item p-1">
                    <a class="nav-link " href="/Logout.php"  style="color: lightblue;">LOGOUT</a>
                </li></ul>
            <canvas id="canvas" width="100" height="100">
            </canvas>

        </div>


    </nav>
</header>

<center>
    <div class="middlebody">
        <div class="container">
            <div class="justify-content-center">
                <div class="clubdivs col-lg-5 col-md-5 col-sm-12 col-xs-6">
                    <div class="container">
                        <div class="row content">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 mhead">
                                <span class="textheading mttle"><?php echo $_SESSION['clubname'] ?> Users</span>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <!-- PRINT ALL USERS OF Club  -->
                    <?php
                    include "./config.php";
                    $sql = "SELECT * FROM clubmemberships WHERE clubname ='".$_SESSION['clubname']."' ";
                    $result = $connection->query($sql);

                    while($row = $result->fetch_assoc())
                    {
                    ?>
                        <div class="container">
                            <div class="row content">
                                    <?php
                                    if ($row['useremail'] !== $_SESSION['loggedinuser']){
                                    echo '<div class="clubdivs allclubs col-lg-9 col-md-9 col-sm-8 col-xs-8 bg-outline-primary" style="display:flex; align-items:center;
                                justify-content:center; background-color: #1c8cd7 ">'.$row['useremail'].'</div>';

                                  echo '<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                          <form class="needs-validation " method="POST" action="/addToFriendList.php?clubname='.$row["clubname"].'& useremail='.$row['useremail'].'" novalidate  id="form">
                                <button class="btn btn-primary submitbutton" type="submit " name="submit" id="sub">Add</button>
                                </form>
                            </div>';
                                    }
                                    ?>
                    <?php

                    }
                    ?>
                        </div>
                        </div>

                </div>



            </div>
        </div>
    </div>
</center>

<footer class="container-fluid foot">
    <div class="container-fluid foot_div">
        <p class="h6 foot_text">Copyright &copy;2021 All rights reserved | This project is developed by <span id="name">Aiman Abdullah</span> </p>
    </div>

</footer>
<script src="js/clock.js"> </script>
</body>
</html>
