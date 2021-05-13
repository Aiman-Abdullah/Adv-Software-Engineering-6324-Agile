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

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0" nonce="2wwi7O1Z"></script>


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
	<script src="js/facebook.js"></script>
	 

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link href="css/userhomepage.css" rel="stylesheet" type="text/css">

    <style>
        body{
            background: url(https://placeimg.com/img/bg-2.svg) repeat;

        }
		
		.fbmock{
			/*box-shadow: 0 0 0px 1px #04091e14; */
			border-top: 1px solid #dad8d8;
			border-bottom: 1px solid #dad8d8;
			margin-bottom:30px;
			display:flex;
			padding:2px;

		}
		 
		.fbitems{
			margin:auto;
			cursor:pointer;
			align:center;
			padding:4px;
			color:#65676b;
			font-family:inherit;
			font-size:.9375rem;
			font-weight:600;
		}
		
		.fbitems:hover{
		background-color:#04091e14;
		border-radius:5px;
		}
		
		.liked{
			color: blue;
			fill:blue;
		}
		
		.disabled
		{
			cursor:not-allowed;
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
                  <a class="nav-link" href="<?php
                  
                  if($_GET['page']=='exchange')
                  {
                      echo "/exchange.php";
                  }
                  else if($_GET['page']=='advs')
                  {
                      echo "/advs.php";
                  }
                  else{
                      echo "/retrieve_search.php?keyword=".$_GET['keyword'];
                  }
                  ?>" style="color: lightblue;">BACK</a>
              </li>
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

<?php
include "./config.php";
$user = $_SESSION['loggedinuser'];

    $get_id=$_GET['id'];
    $table = $_GET['category'];




    if($table=="advs")
    {
      $table="advertisement";
    }

    $sql="SELECT * from $table WHERE id=$get_id limit 1";
    $results = $connection->query($sql);

?>

<form id="facebookform" hidden action="">
<input type="hidden" name="table" value="<?php 
if($_GET['category']=="advs")
    {
      echo "advertisement";
    }
	else{
		echo $_GET['category'];
	}?>"/>
<input type="hidden" name="id"    value="<?php echo $_GET['id']; ?>"/> 
<input type="submit"></input>
</form>

<center>
    <div class="middlebody">
        <div class="container cbg">
            <div class="row content">
                <div class="clubdivs col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <?php

                    if ($results != "")
                    {
                        $row = $results->fetch_assoc();
                         ?>
						 
                 <div class="container">
							
							

	<div class="row content">
			<div class="messagepic col-lg-2 col-md-3 col-sm-3 col-xs-3"> 
			<div class="advimage">
			<img src="<?php echo $row["image"] ?>"/>
			
</div> 
			</div> 
			
			<div class="col-lg-8 col-md-7 col-sm-7 col-xs-7">
			<div class="messagedivs messagebody col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 30px 0px; padding: 20px 20px;"><span class="textheading">
			<span class="mtitle"><?php echo $row["title"] ?></span> <br>
			<span class="mbody"><strong class="sender">Posted by : </strong>
			<?php echo $row["email"] ?></span><br>
			<span class="mbody"><strong class="sender">Post Description : </strong><?php echo $row["description"] ?></span></span>
                                    </div>
			
			<div class="fbmock col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
			
			
			 <div class="fbitems col-lg-4 col-md-4 col-sm-4 col-xs-4 facebookbuttons" id="like">
			 <svg xmlns="http://www.w3.org/2000/svg" id="likeicon" width="18" height="18" fill="#65676b" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
  <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
</svg>       
			 <span id="liketext">Like</span> <span id="likecount"><?php echo $row["like"]; ?></span> 
			 </div>
			 
			 
			 
			 <div class="fbitems  col-lg-4 col-md-4 col-sm-4 col-xs-4 facebookbuttons" id="dislike">
			  <svg xmlns="http://www.w3.org/2000/svg" id="dislikeicon" width="18" height="18" fill="#65676b" style="transform:rotate(180deg);" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
  <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
</svg>
			 <span id="disliketext">DisLike</span> <span id="dislikecount"><?php echo $row["dislike"]; ?></span>
			 </div>
			 
			 
			 
			 <div class="fbitems col-lg-4 col-md-4 col-sm-4 col-xs-4" id="share">
			 <svg width="38" height="38" version="1.1" viewBox="0 0 48 48" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">
	.st0{display:none;}
	.st1{fill:none;stroke:#65676b;stroke-width:1;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
	.st2{fill:#303030;}
</style><g class="st0" id="Padding__x26__Artboard"/><g id="Icons"><path class="st1" d="M25.03771,20.73605v-3.72068c0-0.37989,0.41341-0.60336,0.72626-0.40224l9.38551,5.92181   c0.30167,0.18995,0.30167,0.61453,0,0.80447l-5.18438,3.27375l-1.86593,1.18436l-2.33521,1.47487   c-0.31285,0.20112-0.72626-0.03352-0.72626-0.40224v-3.24024v-0.49162"/><path class="st1" d="M29.96511,26.61317l-1.86593,1.18436l-2.33521,1.47487c-0.31285,0.20112-0.72626-0.03352-0.72626-0.40224   v-3.24024l0-0.49162c-2.5759,0.10566-5.71802-0.35782-7.84392,0.6112c-1.96628,0.89627-3.54569,2.56389-4.26663,4.60153   c-0.12819,0.3623-0.22955,0.73407-0.3029,1.11132v-2.97208c0-1.12794,0.24487-2.25127,0.7168-3.27587   c0.4588-0.9961,1.12709-1.89266,1.94799-2.61962c0.82495-0.73054,1.80136-1.28686,2.85232-1.61889   c1.5111-0.4774,3.15323-0.41175,4.71545-0.30955c0.72522,0.04744,1.45389,0.06971,2.18089,0.06971"/><path class="st1" d="M19.58749,22.12313c0.56024-0.10583,1.13245-0.15318,1.70671-0.16586"/><path class="st1" d="M15.99155,23.71498c0.5257-0.66081,1.5829-1.17309,2.19002-1.18366"/></g></svg>Share</div>
			</div>
									
							</div>		
									
									
                                    <div class="messagepic col-lg-2 col-md-2 col-sm-2 col-xs-2"><span class="textheading"><h5><?php if($table=="advertisement")
									{
										echo 'Location :';
									}
									else{
										echo 'Posted on:';
									}
									?>
									<br></h5></span>
                                        <h6><?php
										if($table=="advertisement"){
											 echo $row["location"];
										}
										else{
											
                                            $fulldate = $row["posttime"];
                                            $datearray = explode(" ",$fulldate);
                                            $date = $datearray[0];
                                            $time = $datearray[1];
                                            $datearray =  explode("-",$date);
                                            $day = $datearray[2];
                                            $year =$datearray[0];


                                            echo date("M", strtotime($fulldate))." ".$day.", ".$year."<br>";
										echo date('h:i A', strtotime($fulldate)); }
                                            ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
				<?php
                    } ?>
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script><script  src="js/copylink.js"></script>

</body>

</html>
