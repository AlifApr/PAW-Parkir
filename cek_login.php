<html>
<head>
  <title>PA Web Parkir</title>
  <link rel="shortcut icon" href="images/parkir.png">
</head>
<body>
<style>
body {
    background-color: #FA5858;
    font-family:arial;
    font-size:20px;
}
</style>
<?php
error_reporting(0);
include 'koneksi.php'; //connect the connection page

  $username = $_POST['username'];
  $password = $_POST['password'];

if(empty($_SESSION)) // if the session not yet started
   session_start();
if(!isset($_POST['submit'])) { // if the form not yet submitted
   header("Location: login.php");
   exit;
}

  $query = "SELECT * FROM user WHERE username='$username' and password='$password'";
	$result = mysqli_query($connect,$query) ;
	$rows = mysqli_num_rows($result);
        if($rows==1){
		    $row2  = mysqli_fetch_array($result);

        		$_SESSION['username'] = $_POST['username'];
                $_SESSION['level'] = $row2['level'];
		        $_SESSION['namalengkap']= $row2['namalengkap'];
                 header("Location: home.php");


        } else{ // if not a valid user
            echo "<script>alert('Username dan password salah');window.location = 'login.php';</script>";
        }


?>

</body>
</html>
