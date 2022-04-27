<?php
include 'koneksi.php';

$idmobilaktif = $_POST['idmobilaktif'];
$plat_nomor = $_POST['plat_nomor'];
$jenis = $_POST['jenis'];
$waktu_masuk =$_POST['waktu_masuk'];
$waktu_keluar = $_POST['waktu_keluar'];

$userku = $_POST['userku'];

mysqli_query($connect,"UPDATE tbmobil SET waktu_keluar='$waktu_keluar', status='Keluar' WHERE waktu_masuk='$waktu_masuk'");

mysqli_query($connect,"DELETE FROM mobilaktif WHERE idmobilaktif='$idmobilaktif'");

mysqli_query($connect,"INSERT INTO aktifitas VALUES('', '$waktu_keluar','$waktu_keluar', '$userku mencatat bahwa mobil berjenis $jenis <br>dengan plat nomor $plat_nomor ini<br>sudah keluar dari tempat parkir')");
  
header("location:log-parkir.php");
?>
