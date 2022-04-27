<?php
include 'koneksi.php';

$idparkir = $_POST['idparkir'];
$plat_nomor = $_POST['plat_nomor'];
$waktu_masuk_parkir = $_POST['waktu_masuk_parkir'];
$waktu_keluar_parkir =$_POST['waktu_keluar_parkir'];

$userku = $_POST['userku'];

mysqli_query($connect,"UPDATE parkir SET plat_nomor='', status='1' WHERE idparkir='$idparkir'");

mysqli_query($connect,"UPDATE tbmobil SET waktu_keluar_ruang='$waktu_keluar_parkir', status='Keluar Parkir' WHERE waktu_masuk_ruang='$waktu_masuk_parkir'");

mysqli_query($connect,"INSERT INTO aktifitas VALUES('', '$waktu_keluar_parkir','$waktu_keluar_parkir', '$userku mencatat bahwa mobil<br>dengan plat nomor $plat_nomor <br>keluar dari ruangan')");

header("location:data-parkir.php");
?>
