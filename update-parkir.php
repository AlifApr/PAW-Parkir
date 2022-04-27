<?php

include "koneksi.php"; 

$ruang_parkir = $_POST['ruang'];
$plat_nomor =$_POST['plat_nomor'];

$query="UPDATE tbparkir SET plat_nomor='$plat_nomor', status='1' where ruang='$ruang_parkir'";

mysqli_query($connect,$query);

$query="UPDATE tbmobil SET status='mr' where plat_nomor='$plat_nomor'";
mysqli_query($connect,$query);

header("location:mobilruang.php");
?>