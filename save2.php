<?php
include "./config.php";
?>
<html>
<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
</head>
</html>
<?php
 $item_type=$_POST['name1'];
        $location = $_POST['department1'];
        $description=$_POST['date1'];
        $email=$_POST['time1'];
        $filename = $_FILES['ticket']['name'];
        $tempname = $_FILES['ticket']['tmp_name'];
        $folder = "images/".$filename;
$supported_image = array(
    'gif',
    'jpg',
    'jpeg',
    'png'
);
$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION)); // Using strtolower to overcome case sensitive
$check = 0;
if (in_array($ext, $supported_image)) {
$sql = "INSERT INTO `advertisement`( `title`, `description`, `location`, `email`, `image`) VALUES('$item_type', '$description', '$location', '$email', '$folder')";
if (mysqli_query($connection, $sql)) {
    move_uploaded_file($tempname, $folder);
    echo "<script>window.location.href='/advs.php';</script>";
    exit();
}
else {
    echo "<script type='text/javascript'>alert('Data Not uploaded');</script>";
    exit();
}
}
else
{
    cehck_image();
}
function cehck_image() {
    echo "<script type='text/javascript'>
Swal.fire({
  title: 'Warning!!',
  text: 'File not an Image.',
  imageUrl: '/images/error.png',
  imageWidth: 400,
  imageHeight: 200,
  imageAlt: 'Custom image',
  confirmButtonText: 'Okay!'},
  function(isConfirm) {
            alert('ok');
});
 $('.swal2-confirm').click(function(){
                window.location.href='/advs.php';
          });</script>";
}
?>