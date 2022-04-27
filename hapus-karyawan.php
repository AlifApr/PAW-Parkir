<?php 
include 'koneksi.php';
include 'connect.php';

$id = $_GET['id'];
mysqli_query($connect,"DELETE FROM user WHERE id='$id'");

header("location:daftar-karyawan.php");
?>