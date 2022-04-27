<?php


$namalengkap = $_POST['namalengkap'];
$kelamin = $_POST['kelamin'];
$no_hp = $_POST['no_hp'];
$shift = $_POST['shift'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

mysqli_query($connect,"INSERT INTO user VALUES('', '$username', '$password' ,'$namalengkap','$kelamin','$no_hp','$shift','$level')");

header("location:daftar-karyawan.php");
?>
