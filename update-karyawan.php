<?php 

include 'koneksi.php';
include 'connect.php';

$id = $_POST['id'];
$namalengkap = $_POST['namalengkap'];
$kelamin = $_POST['kelamin'];
$no_hp = $_POST['no_hp'];
$shift = $_POST['shift'];
$username = $_POST['username'];
$password = $_POST['password'];

mysqli_query($connect,"UPDATE user SET username ='$username', password='$password', namalengkap='$namalengkap', kelamin='$kelamin', no_hp='$no_hp', shift='$shift' WHERE id='$id'");

header("location:daftar-karyawan.php");

?>