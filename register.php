<?php
/*
  * ob_start(); Open buffer function which use to prevent (Header Already sent) issue
  * error_reporting(0);  Disappear any PHP warning
  */
ob_start();
error_reporting(0);

include "./config.php";

?>

<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="sweetalert/jquery-3.5.1.min.js"></script>
</head>
</html>

<?php
# isset() this function use to check if any data sent to server by using "form" action
if(isset($_POST['submit'])){
    $switch=0;
    $firstname = $_POST["firstname"];
    $secondname = $_POST["lastname"];
    $password = $_POST["Password22"];
    $password = md5($password);
    $email = $_POST["email"];
    $city = $_POST["city"];
    $states= $_POST["select"];
    $zipcode = $_POST["zipcode"];

    // Insert all information to DB
    if ($connection == true) {

        $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $query = mysqli_query($connection, $sql);
        $result = mysqli_num_rows($query);
        if ($result > 0) {
            $switch=2;
        }
        if ($result == 0) {
            $insert = "INSERT INTO users (firstname, lastname, password, email, city, states, zipcode) VALUES ('$firstname', '$secondname', '$password', '$email', '$city', '$states', '$zipcode')";
            $switch=1;
            $connection->query($insert);
        }

    }
    else {
        failregistered();
        header("location: Register.html");

    }


    # Check if data inserted to DB. If yes, then redirect user to Login page. Otherwise stay on Register page.
if($switch==1){
    # Redirect page after sometime
    header( "refresh:2;url= ./LoginPage.php" );
 
}
if ($switch==2){
    alert();
    header( "refresh:5;url= ./Register.html" );

}


    }



function alert() {
    echo "<script type='text/javascript'>
let timerInterval
Swal.fire({
  title: 'A user with this email address already exists. Please try a different email address',
  html: 'You will redirect in <b></b> milliseconds to Register Page.',
  timer: 5000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 500)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('Email Already Exist. Replace it with different Email')
  }
})

</script>";
}

function failregistered() {
    echo "<script type='text/javascript'>
Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Something went wrong!',
  footer: '<a href='Register.html'>Click here to repeat again</a>'
})
</script>";
} ?>
