<?php
// Check user login or not
session_start();
if($_SESSION['loggedinuser']==""){
    header("location: /LoginPage.php");
}
?>
<html lang="en">

<head> <meta charset="utf-8" http-equiv="refresh">
    <title>
        Search Results
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

		.mttle{
		margin-left : 0px !important;
		font-family: cursive;
		}

		.mhead
		{
		    margin-top: 10px;
            margin-bottom: -15px;
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
                    <a class="nav-link " href="/exchange.php"  style="color: lightblue;">EXCHANGE</a>
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

<?php
include "./config.php";
$user = $_SESSION['loggedinuser'];
if(isset($_GET["keyword"]))
{
  $keyword = $_GET["keyword"];
}
else
{
  $keyword ="";
}




$tables = array("exchange","advertisement");

$results = [];
$counter = 0;

foreach($tables as $feature){

    $sql = "select * from ".$feature." where description like '%".$keyword."%' or title like '%".$keyword."%'";

        $temp = $connection->query($sql);
        if($temp->num_rows)
        {
            $results[$counter] = $temp;
        }
        else
        {
            $results[$counter] = "";
        }
    $counter++;

}

?>

<center>
    <div class="middlebody">
        <div class="container cbg">
            <div class="row content">
                <div class="clubdivs col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="container">
                        <div class="row content">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mhead">
                                <span class="mttle">

                                <?php
                                if (empty($results[0]))
                                {
                                    echo "No Results from Exchange";
                                }
                                else{
                                    echo "Search Results from Exchange";
                                }


                                ?>



                                </span>
                            </div>


                        </div>
                    </div>

                    <hr>

                    <?php

                    if ($results[0] != "")
                    {


                        while($row = $results[0]->fetch_assoc())
                    { ?>
                        <a href="/viewlisting.php?page=search&category=exchange&id=<?php echo $row['id']; ?>&keyword=<?php echo $keyword; ?>" class="linknodecoration">

                            <div class="container">



                                <div class="row content">
                                    <div class="messagepic col-lg-2 col-md-3 col-sm-3 col-xs-3"><span class="textheading">
			<div class="advimage">
			<img src="<?php echo $row["image"] ?>"/>

</div></span>
                                    </div>



                                    <div class="messagedivs messagebody col-lg-8 col-md-7 col-sm-7 col-xs-7"><span class="textheading">
			<span class="mtitle"><?php echo $row["title"]; ?></span> <br>
			<span class="mbody sender">
			<?php echo $row["email"]; ?></span><br>
			<span class="mbody"><?php echo $row["description"]; ?></span></span>
                                    </div>
                                    <div class="messagepic col-lg-2 col-md-2 col-sm-2 col-xs-2"><span class="textheading"><h5>Posted on:<br></h5></span>
                                        <h6><?php
                                            $fulldate = $row["posttime"];
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

                        </a> <hr>
                        <?php

                    }} ?>
                </div>


            </div>
        </div>
    </div>
    <div class="middlebody">
        <div class="container cbg">
            <div class="row content">
                <div class="clubdivs col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="container">
                        <div class="row content">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mhead">
                                <span class="mttle">
                                      <?php
                                if (empty($results[1]))
                                {
                                    echo "No Results from Advs";
                                }
                                else{
                                    echo "Search Results from Advs";
                                }
                                ?>
                            </div>


                        </div>
                    </div>

                    <hr>

                    <?php


                    if ($results[1] != "")
                    {


                    while($row = $results[1]->fetch_assoc())
                    { ?>


                        <a href="/viewlisting.php?page=search&category=advs&id=<?php echo $row['id']; ?>&keyword=<?php echo $keyword; ?>" class="linknodecoration">

                            <div class="container">
                                <div class="row content">
                                    <div class="messagepic col-lg-2 col-md-3 col-sm-3 col-xs-3"><span class="textheading">
			<div class="advimage">
			<img src="<?php echo $row["image"] ?>"/>

</div></span>
                                    </div>
                                    <div class="messagedivs messagebody col-lg-8 col-md-7 col-sm-7 col-xs-7"><span class="textheading">
			<span class="mtitle"><?php echo $row["title"] ?></span> <br>
			<span class="mbody sender">
			<?php

            echo "From: ".explode("@",$row["email"])[0];
            echo "<br>Location: ".$row["location"];
            ?></span>
            <br>
			<span class="mbody"><?php echo $row["description"] ?></span>
                </span>
                                    </div>

                                    <div class="messagepic col-lg-2 col-md-2 col-sm-2 col-xs-2" ><span class="textheading"><h6>View More</h6></span> </div>
                                </div>
                            </div>

                        </a>
                        <hr>
                        <?php

                    }} ?>

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
