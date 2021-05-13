<?php
include "./config.php";
$title=$_POST['title'];
$description = $_POST['description'];
$contactemail=$_POST['contactemail'];
$filename = $_FILES['image']['name'];
$tempname = $_FILES['image']['tmp_name'];
$target_filepath = "images/exchange/".$filename;

$sql = "INSERT INTO `exchange`( `title`, `description`, `email`, `image`) VALUES('$title', '$description',  '$contactemail', '$target_filepath')";
if (mysqli_query($connection, $sql)) {
move_uploaded_file($tempname, $target_filepath);
header("location: /exchange.php");
}
else {
echo 'Data Not uploaded';
echo '<a href="/exchange.php">Go Back</a>';
header("location: /exchange.php");
}

?>