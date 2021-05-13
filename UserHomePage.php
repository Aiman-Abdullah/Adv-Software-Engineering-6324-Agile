<?php
// Check user login or not
session_start();
if($_SESSION['loggedinuser']==""){
    header("location: /LoginPage.php");
}
?> 
<html lang="en">

<head>
    <title>
        USER HOME 
    </title>
    <meta charset="utf-8" http-equiv="referesh">
    <!-- This line will give the instruction on how the browser control the page how suppose to show the content in Tablet, Phone-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!-- CSS only -->
	<link href="http://ianlunn.github.io/Hover/css/hover.css" rel="stylesheet" media="all">
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
                    <a class="nav-link " href="/UserHomePage.php"  style="color: lightblue;text-decoration: underline;text-decoration-style:wavy;text-decoration-color:#00a6ff;">HOME</a>
                </li>
 
            </ul>
			<ul class="navbar-nav">
			<li class="p-1">
				<form action="retrieve_search.php" method="get">
  <div class="form-row align-items-center">
    <div class="col-sm-7 my-1">
      <label class="sr-only" for="inlineFormInputName">search</label>
      <input type="text" class="form-control searchinput" required id="inlineFormInputName" placeholder="clubs/posts/etc" name="keyword">
    </div>
    

    <div class="col-auto my-1 hvr-icon-spin" >
      <button type="submit" class="btn btn-info"> <img style="max-height:25px; margin-right:10px;" class="hvr-icon" src="https://img.icons8.com/pastel-glyph/64/ffffff/search--v2.png"/>Search</button>
    </div>
  </div>
</form>
                </li>
			
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
	<div class="container containerbox">
  <div class="row justify-content-around">
	  <div class="col mx-3 sales hvr-grow-shadow border border-secondary"><a class="linknodecoration" style= "color: black; text-decoration: none;" href= "/sales.php">SALES</a></div>
    <div class="col mx-3 clubs hvr-grow-shadow border border-secondary"><a  class="linknodecoration" style= "color: black; text-decoration: none;" href="/Clubs.php">CLUBS</a></div>
    <div class="w-100 h-10">&nbsp;</div>
    <div class="col mx-3 exchange hvr-grow-shadow border border-secondary"><a class="linknodecoration" style= "color: black; text-decoration: none;" href= "/exchange.php">EXCHANGE</a></div>
    <div class="col mx-3 messages hvr-grow-shadow border border-secondary"><a class="linknodecoration" style= "color: black; text-decoration: none;" href= "/messages.php">MESSAGES</a></div>
	  <div class="w-100 h-10">&nbsp;</div>
    <div class="col mx-3 advs hvr-grow-shadow border border-secondary"><a class="linknodecoration" style= "color: black; text-decoration: none;" href= "/advs.php">ADVS</a></div>
    <div class="col mx-3 myprofile hvr-grow-shadow border border-secondary"><a class="linknodecoration" style= "color: black; text-decoration: none;" href= "/profile.php">MY PROFILE</a></div>

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