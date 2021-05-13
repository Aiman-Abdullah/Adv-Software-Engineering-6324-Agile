<html>
<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
</head>
</html>
<?php
   include "./config.php";
    # This code is to upload info from Sales page to DB include Images


    $item_type=$_POST['item'];
    $price = $_POST['price'];
    $salefeature = $_POST['salefeature'];
    $description=$_POST['description'];
    $email=$_POST['time1'];
    $sellername = $_POST['sellername'];
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
    if (in_array($ext, $supported_image)) {


        $sql = "INSERT INTO `sales`( `email`, `description`, `price`, `salefeature` , `itemname`, `image`, `sellerName`) VALUES('$email', '$description', '$price', '$salefeature', '$item_type', '$folder','$sellername')";
        if (mysqli_query($connection, $sql)) {
            move_uploaded_file($tempname, $folder);
            echo "<script>window.location.href='/sales.php';</script>";
            exit();
        } else {
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
                window.location.href = '/sales.php';
          });
</script>";}
?>