<?php
ob_start();
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
    $loggedinuser=$_POST["loggedinuser"];
    $clubname=$_POST["clubname"];

    // Query to Fetch ID of Current user by using Email
    $query = "SELECT membershipid FROM clubmemberships where useremail='".$loggedinuser."'";
    $result = $connection->query($query);
    $row = $result->fetch_assoc();

    // DELETE Record By using ID number
    if ($connection == true) {
            $DELETE = "DELETE FROM clubmemberships WHERE membershipid ='".$row['membershipid']."'";
            $switch=1;
            $connection->query($DELETE);
    }



    # Check if data inserted to DB. If yes, then redirect user to clubs page. Otherwise stay on Addclubs page.
    if($switch==1){
        confirmed();
        header( "refresh:2;url= ./Clubs.php" );

    }

}



else{
    echo "Loose Connection to the Data Base. Please, call Support!";
}




function confirmed() {
    echo "<script type='text/javascript'>
let timerInterval
Swal.fire({
  title: 'Congrats!  You Un-joined a club!',
  html: 'You will redirect in <b></b> milliseconds to Clubs Page.',
  timer: 3000,
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
    console.log('Club name Already Exist. Replace it with different club name')
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
</body>
</html>
