
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
$switch=0;
    $clubname = $_GET["clubname"];
    $useremail = $_GET['useremail'];
    $currentUser = $_SESSION['loggedinuser'];
    if($connection){
    $sql = "INSERT INTO friendlist(clubname, friendemail, email) VALUES ('$clubname', '$useremail', '$currentUser')";
    $connection->query($sql);
        $switch=1;
    }

if($switch==1){
    alert();
}


function alert() {
    echo "<script type='text/javascript'>
let timerInterval
Swal.fire({
  title: ' Successful process!',
  html: 'Process will be done in <b></b> milliseconds.',
  icon: 'success',
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
    }, 3000)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    window.location.href='/SingleClub.php';
  }
})
</script>";
}
?>
