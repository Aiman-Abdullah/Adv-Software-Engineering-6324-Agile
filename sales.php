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
        Sale
    </title>
<link href="https://ianlunn.github.io/Hover/css/hover.css" rel="stylesheet" media="all">
    <!-- This line will give the instruction on how the browser control the page how suppose to show the content in Tablet, Phone-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="../css/mijares.css" type="text/css" rel="stylesheet">
    <link href="../css/responsive_setting.css" type="text/css" rel="stylesheet">
    <link href="../css/eventshape.css" type="text/css" rel="stylesheet" >
    <link href="css/userhomepage.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- JS and jQuery -->
    <script src="js/jquery-3.5.1.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- <link href="css/login_form.css" rel="stylesheet" type="text/css"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/js/ajax.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
 



<body>

<header>
    <div class="container-fluid" style="background-color:#04091e">
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
                    <a class="nav-link " href="/sales.php"  style="color: lightblue;text-decoration: underline;text-decoration-style:wavy;text-decoration-color:#00a6ff;">SALES</a>
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
    </div>
</header>

 
<style>
    body {
        padding-right: 0 !important;
		 background-color: #c5daec82;
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        margin: auto;
        text-align: center;
        font-family: arial;
		border-radius: 30px;
    }

    .price {
        color: grey;
        font-size: 22px;
    }

.centerbtn{
	margin:auto;
}
     
    .card button:hover {
        opacity: 0.7;
    }

    tr { display: inline; }
    th, td { display: inline-flex; border: none; margin: 0%;}
</style>


<div class="container-fluid" style="width: auto; height: auto;">
    <p id="success"></p>

    <div class="table-title">
        <div class="row">

            <div class="col-lg-12 col-sm-6">
                <a href="#addEmployeeModal" class="btn btn-info centerbtn" data-toggle="modal"><i class="material-icons"></i> <span>Add Sale Item</span></a>
                
            </div>
        </div>
    </div>



    <!-- Add Modal HTML -->

    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <form enctype="multipart/form-data" action="/save3.php" method="POST" id="saleitemform">
                    <div class="modal-header">
                        <h4 class="modal-title">New Item</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label><b style="color: #1c8cd7">Item name:</b></label>
                            <input type="text" id="name" name="item" required class="form-control"  placeholder=" item name" style="color: #04091e">
                        </div>

                        <div class="form-group">
                            <label><b style="color: #1c8cd7">Price:</b></label>
                            <input type="number" id="department" name="price" required class="form-control"  placeholder="Enter price">
                        </div>
                        
                         <div class="form-group">
                            <label><b style="color: #1c8cd7">Do you like to: </b></label>
                            <select id="saletype" class="form-control" name="salefeature" form="saleitemform">
                              <option value="Sell">Sell</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label><b style="color: #1c8cd7">Description:</b></label>
                            <input type="text" id="date" name="description" required class="form-control"   placeholder="Please describe">
                        </div>

                        <div class="form-group">
                            <label><b style="color: #1c8cd7">Seller Name:</b></label>
                            <input type="text" id="time" name="sellername" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label><b style="color: #1c8cd7">Contact Email:</b></label>
                            <input type="email" id="time" name="time1" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label><b style="color: #1c8cd7" >Image:</b></label>
                            <input type="file" id="ticket" name="ticket" class="form-control" alt="Image Not Available">
                        </div>



                    </div>
                    <div class="modal-footer">

                        <input type="button" class="btn btn-default " data-dismiss="modal" value="Cancel">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <div class="container-fluid">
<br>
        <div class="container-fluid">
            <table class="table border-0" style="max-width: 70%; margin:auto;">

                <tbody>
                <?php
                include "./config.php";

                $disable_button = $connection->query("SELECT * FROM checkout where flag='true'");
                $result = mysqli_query($connection,"SELECT * FROM sales");
                $item_id ='';


                while($row = mysqli_fetch_array($result)){
                    $id = $row['id'];


                ?>
                <tr>
                    <td>
                        <br>
                        <div class="card hvr-float-shadow">
                           <div style="min-height:400px;min-width:300px; position:relative;"> 
						   <img style="max-height:100%; max-width:100%; border-radius:30px; padding:15px;border-top: 1px solid #f8aaaa;border-bottom: 1px solid #f8aaaa;" src="<?php echo $row['image'] ?>"> </div>
						   <hr>
                            <h5 style="text-align: left; margin-left:15px;  color:black;"><span style="font-size:1rem;color:grey;">Item :</span> <?php echo $row["itemname"] ?></h5>
                            <br>
                            <p style="text-align: left; margin-left:15px;color:black; " class="price"><span style="font-size:1rem;color:grey;">Price: </span> $<?php echo $row["price"] ?></p>
                            <h5 style="text-align: left;margin-left:15px; color:black; "><span style="font-size:1rem;color:grey;">Seller Name: </span> <?php echo $row["sellerName"] ?></h5>
                            <h5 style="text-align: left;margin-left:15px; color:black; "><span style="font-size:1rem;color:grey;">Email: </span> <?php echo $row["email"] ?></h5>
                            <h5 style="text-align: left;margin-left:15px; color:black; "><span style="font-size:1rem;color:grey;">Description: </span> <?php echo $row["description"] ?></h5>

                            <hr>
                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

						   <div class="col-lg-6	 col-md-6 col-sm-6 col-xs-6" style="float:left;">

                               <!-- disable The Button when Item Sold -->
                               <?php

                               while($row2 = $disable_button->fetch_assoc()){

                                   $item_id = $row2['item_selected_id'];
                                   if ($item_id == $id){
                                       $id  = '';
                                       $item_id = '';
                                       break;
                                   }
                                   else{

                                       continue;
                                   }

                               }

                               ?>

                               <form method="POST" action="payment.php">
                                   <input type="hidden" value="<?php echo $row["id"]?>" name="sale">
						   <button type="submit" class="btn btn-outline-danger hvr-buzz-out" style="padding: .375rem .675rem;"  <?php
                           if($item_id == $id){ ?>
                               disabled

                           <?php
                           }

                           ?>
                           ><a>


                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
  <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"></path>
  <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path>
</svg>

            <?php

            if($item_id == $id){
                echo "SOLD";
            }
            if($item_id != $id){
                echo "Buy";
            }

             ?>

                       </a></button></form>
                    </div>


			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="float:left;"> 
			   <a href="/sales.php"><p><button type="button" class="btn btn-outline-danger hvr-icon-pulse"><a href="/messages.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-chat-dots hvr-icon" viewBox="0 0 16 16">
  <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
  <path d="M2.165 15.803l.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
</svg>
                Text
                           </a></button></p></a> </div>

			  </div>
                        </div>
                    </td>

                </tr>
                <?php


                    }



                    ?>



                </tbody>
            </table>



        </div>










</div>







<footer class="container-fluid foot">
    <div class="container-fluid foot_div">
        <p class="h6 foot_text">Copyright &copy;2021 All rights reserved | This project is developed by <span id="name">Aiman Abdullah</span> </p>
    </div>

</footer>

<script src="js/clock.js"> </script>
</body>

</html>

<script>
    function disableButton() {
        $("#button").attr("disabled","disabled")
    }

</script>