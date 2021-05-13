<?php
include "./config.php";
if(count($_POST)>0){

    if($_POST['type']==1){

        $item_type=$_POST['name1'];
        $price=$_POST['department1'];
        $description=$_POST['date1'];
        $email=$_POST['time1'];

        $target_dir = "images/";
        $target_file = $target_dir.$_FILES["ticket1"]["name"];



        $sql = "INSERT INTO `sales`( `sale_type`, `price`, `description`, `email`, `image`) VALUES('$item_type', '$price', '$description','$email', '$target_file')";
        if (mysqli_query($connection, $sql)) {
            echo json_encode(array("statusCode"=>200));
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
        mysqli_close($connection);
    }
}

if(count($_POST)>0){
    if($_POST['type']==2){
        $id=$_POST['id'];
        $name=$_POST['name'];
        $department=$_POST['department'];
        $date=$_POST['date'];
        $time=$_POST['time'];
        $ticket=$_POST['ticket'];
        $location=$_POST['location'];
        $sql = "UPDATE `events` SET `name`='$name', `department`='$department', `date`='$date', `time`='$time', `ticket`='$ticket', `location`='$location' WHERE id=$id";
        if (mysqli_query($connection, $sql)) {
            echo json_encode(array("statusCode"=>200));
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
        mysqli_close($connection);
    }
}
if(count($_POST)>0){
    if($_POST['type']==3){
        $id=$_POST['id'];
        $sql = "DELETE FROM `events` WHERE id=$id ";
        if (mysqli_query($connection, $sql)) {
            echo $id;
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
        mysqli_close($connection);
    }
}
if(count($_POST)>0){
    if($_POST['type']==4){
        $id=$_POST['id'];
        $sql = "DELETE FROM 'student' WHERE id in ($id)";
        if (mysqli_query($connection, $sql)) {
            echo $id;
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
        mysqli_close($connection);
    }
}

?>