<?php
include 'koneksi.php';

$idparkir = $_POST['idparkir'];
$ruang = $_POST['ruang'];
$plat_nomor = $_POST['plat_nomor'];
$posisi = $_POST['posisi'];

$userku = $_POST['userku'];

$ok = $_POST['ok'];

$waktu_masuk_parkir = $_POST['waktu_masuk_parkir'];

mysqli_query($connect,"UPDATE parkir SET ruang ='$ruang', plat_nomor='$plat_nomor', posisi='$posisi', waktu_masuk_parkir='$waktu_masuk_parkir', status='0' WHERE idparkir='$idparkir'");

mysqli_query($connect,"UPDATE tbmobil SET ruang ='$ruang', waktu_masuk_ruang='$waktu_masuk_parkir', status='Masuk Ruangan' WHERE waktu_masuk='$ok'");

mysqli_query($connect,"INSERT INTO aktifitas VALUES('', '$waktu_masuk_parkir','$waktu_masuk_parkir', '$userku mencatat bahwa mobil<br>dengan plat nomor $plat_nomor <br>berada di ruang $ruang')");

header("location:data-parkir.php");
?>
