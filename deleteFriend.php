
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="sweetalert/jquery-3.5.1.min.js"></script>
</head>
</html>


<?php
include "./config.php";
session_start();
if($_SESSION['loggedinuser']==""){
    header("location: /LoginPage.php");
}

// check if Club name has been sent  When user click on Club name from Club page
if(isset($_GET["email"]))
{
    $email = $_GET["email"];
    $_SESSION['email'] = $email;


    $sql = "SELECT id FROM friendlist WHERE friendemail ='".$email."'";
    $query = mysqli_query($connection, $sql);
    $row = $query->fetch_assoc();

    // DELETE Record By using ID number
    if ($connection == true) {
        $DELETE = "DELETE FROM friendlist WHERE id ='".$row['id']."'";
        $switch=1;
        $connection->query($DELETE);
    }



    # Check if data inserted to DB. If yes, then redirect user to clubs page. Otherwise stay on Addclubs page.
    if($switch==1){
        confirmed();
        header( "refresh:2;url= ./friend_list.php" );

    }

}


function confirmed() {
    echo "<script type='text/javascript'>
let timerInterval
Swal.fire({
  title: ' Successfully removed Friend!',
  html: 'You will redirect in <b></b> milliseconds to Friends Page.',
  timer: 4000,
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
    }, 3000)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('')
  }
})

</script>";
}

