<?php
include './config.php';
$senderemail = $_GET['senderemail'];
$senderusername = $_GET['senderusername'];
$users=$_GET['users'];
$title = $_GET['title'];
$messageContent = $_GET['messagecontent'];
$finalreturn = true;
$users = explode(',', $users);
$insertquery ="asdf";
foreach($users as $user) {
    if(is_numeric($user)){
        $user = strval($user);
        $clubquery = "SELECT `clubname` FROM `clubs` where `clubid`='$user' limit 1";
        $clubnames = $connection->query($clubquery);
        
        if ($clubnames)
            {
            $row = $clubnames->fetch_assoc();
            $clubname = $row["clubname"];
            $insertquery = "INSERT INTO `messages` (`messagetitle`,`messagedescription`,`sender`,`senderemail`,`recipient`,`clubmessage`,`clubname`) VALUES ('$title','$messageContent','$clubname','$clubname','All users','1','$clubname')";
            } 
    }
    else{
        if($user){
    $insertquery = "INSERT INTO `messages` (`messagetitle`,`messagedescription`,`sender`,`senderemail`,`recipient`,`clubmessage`,`clubname`) VALUES ('$title','$messageContent','$senderusername','$senderemail','$user','0','null')";
    }
    }
     if (mysqli_query($connection,$insertquery)) {
          
        }
        else {
            header("HTTP/1.1 404 Not Found");
            echo("Error description: " . mysqli_error($connection));
            $finalreturn = false;
        
    }  
}  

if($finalreturn){
    echo "ok";
}
else{
   header("HTTP/1.1 404 Not Found");
}

?>