<?php


// Check user login or not
session_start();
error_reporting(0);
if($_SESSION['loggedinuser']==""){
    header("location: /LoginPage.php");
}
?>
<html lang="en">

<head> <meta charset="utf-8" http-equiv="refresh">
    <title>
        Exchange
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
    <link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text&display=swap" rel="stylesheet">
    <!-- JS and jQuery -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>


    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/saveExchange.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 
    <link href="css/userhomepage.css" rel="stylesheet" type="text/css">

    <style>
        body{
            background: url(https://placeimg.com/img/bg-2.svg) repeat;

        }
    </style>
     
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
                    <a class="nav-link " href="/Clubs.php"  style="color: lightblue;">CLUBS</a>
                </li>
                <li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/exchange.php"  style="color: lightblue;text-decoration: underline;text-decoration-style:wavy;text-decoration-color:#00a6ff;">EXCHANGE</a>
                </li>
                <li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/messages.php"  style="color: lightblue;">MESSAGES</a>
                </li>
                <li class="nav-item p-1 lihoverme">
                    <a class="nav-link " href="/advs.php" style="color: lightblue;">ADVS</a>
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
        <div class="container cbg">
            <div class="row content">
                <div class="clubdivs col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="container">
                        <div class="row content">
                            <div class="col-lg-10 col-md-8 col-sm-10 col-xs-10 mhead">
                                <span class="textheading mttle">Purchase History</span>
                            </div>

                            <div class="col-lg-2 col-md-4 col-sm-2 col-xs-2 mhead">


                                    <div class="newmessage">
                                    </div>


                            </div>
                        </div>
                    </div>

                    <hr>
                    
                  
                    <?php
                     include "./config.php";
                    $user = $_SESSION['loggedinuser'];


                    $sql = "SELECT * from UBS.checkout WHERE user= '$user'";
                    $resultfrom_checkout = $connection ->query($sql);


                    while($purchaserows = $resultfrom_checkout->fetch_assoc())
                    {
                        $id =$purchaserows['item_selected_id'];

					    $resultfromsale = mysqli_query($connection,"SELECT * FROM sales where id ='$id'");
					while($row = mysqli_fetch_array($resultfromsale))

					{
					?>


                            <div class="container">

						  <div class="row content">
                                     <div class="messagepic col-lg-2 col-md-3 col-sm-3 col-xs-3"><span class="textheading"> 
			<div class="advimage">
			
			<img src="<?php echo $row["image"] ?>"/>
			
</div></span>
			</div>
									
									
									
                                    <div class="messagedivs messagebody col-lg-8 col-md-7 col-sm-7 col-xs-7"><span class="textheading">
			<span class="mtitle"><?php echo $row["itemname"] ?></span> <br>
			<span class="mbody sender">
			<?php echo  "Seller Email : ". $row["email"] ?></span><br>

			<span class="mbody"><?php echo "Shipped to : ".$purchaserows["adress"] ?></span><br>
			<span class="mbody"><?php echo "Payment Method : ".$purchaserows["payment_type"]." Card" ?></span><br>
            <span class="mbody"><?php echo "Card number: ".str_pad(substr($purchaserows["card_number"], -4), strlen($purchaserows["card_number"]), '*', STR_PAD_LEFT)?></span>
			</span>
			
                                    </div>
                                    <div class="messagepic col-lg-2 col-md-2 col-sm-2 col-xs-2"><span class="textheading"><h5>Purchased on:<br></h5></span>
                                        <h6><?php
                                            $fulldate = $purchaserows["purchasetime"];
                                            $datearray = explode(" ",$fulldate);
                                            $date = $datearray[0];
                                            $time = $datearray[1];
                                            $datearray =  explode("-",$date);
                                            $day = $datearray[2];
                                            $year =$datearray[0];


                                            echo date("M", strtotime($fulldate))." ".$day.", ".$year."<br>";
                                            echo date('h:i A', strtotime($fulldate));
                                            ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>



                        <hr>
                        <?php

                    } }
                    ?>


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