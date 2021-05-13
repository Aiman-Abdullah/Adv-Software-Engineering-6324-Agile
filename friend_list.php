<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Friend List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/friendList.css" type="text/css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="css/mijares.css" type="text/css" rel="stylesheet">
    <link href="css/responsive_setting.css" type="text/css" rel="stylesheet">
    <style>body{background: url(https://placeimg.com/img/bg-2.svg) repeat;}</style>
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


<div class="container-fluid">
    <div class="row" style="display: flex">
                <?php
                include "./config.php";
                session_start();
                if($_SESSION['loggedinuser']==""){
                    header("location: /LoginPage.php");
                }
                $sql = "SELECT friendemail FROM friendlist WHERE email ='".$_SESSION['loggedinuser']."'";
                $result = $connection->query($sql);
                while($row = $result->fetch_assoc())
                {
                $sql2= "SELECT * FROM users WHERE email ='".$row['friendemail']."'";
                $result2 = $connection->query($sql2);
                $row2 = $result2->fetch_assoc();
                ?>
            <div class="col-lg-4" style=" float: left;display:grid">
                <div class="text-center card-box">
                  <div class="member-card pt-2 pb-2" style="margin: auto;position: relative;display:inline-grid;max-height:100%; max-width:100%; border-radius:30px; padding:15px;border-top: 1px solid #f8aaaa;border-bottom: 1px solid #f8aaaa;">
                      <div class="p-4">
                        <div class=" text-center mb-3"><img class="rounded-circle img-thumbnail" src="<?php echo $row2['image']?>"  alt="profile-image"></div>
                      </div>
                        <div class="">
                            <h4 style="color: #00a6ff"><?php echo $row2['firstname'].' '.$row2['lastname']; ?></h4>
                            <p class="text-muted">Email <span>| </span><span style="color: red;"><?php echo $row2['email'];?></span></p>
                        </div>
                        <ul class="social-links list-inline">
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" onClick="window.open('<?php echo $row2['facebook']; ?>');" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" onClick="window.open('<?php echo $row2['twitter'];?>');"  data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a title="" data-placement="top" data-toggle="tooltip" class="tooltips" href="#" onClick="window.open('<?php echo $row2['linkedin'];?>');" data-original-title="Skype"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                        <a href="/messages.php" style="color: whitesmoke"> <button type="button" class="btn btn-outline-primary mt-3 btn-rounded waves-effect w-md waves-light">Message Now</button></a>
                      <a href="deleteFriend.php?email=<?php echo $row2['email']; ?>" name="deleteFirend" style="color: whitesmoke"> <button type="button" class="btn btn-outline-danger mt-3 btn-rounded waves-effect w-md waves-light">Remove Friendship</button></a>

                  </div>
                    </div>


                </div>
                <?php
                }
                ?>
            </div>

    </div>

</div>



<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>