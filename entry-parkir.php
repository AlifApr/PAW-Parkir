<?php
include "koneksi.php";

if(empty($_SESSION))
   session_start();

if(!isset($_SESSION['username'])) {
   header("Location: login.php");
   exit;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>PA Web Parkir (Admin)</title>
<link rel="stylesheet" type="text/css" href="styles.css"/>
<link rel="shortcut icon" href="images/parkir.png">
</head>
<body>
<ul class="topnav">
	<?php if($_SESSION['level'] == 'admin'){ ?>
  <li><a href="home.php">Beranda</a></li>
  <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">Laporan</a>
  	<div class="dropdown-content">
  		<a href="log-parkir.php">Laporan Parkir</a>
  		<a href="log-keuangan.php">Laporan Keuangan</a>
  		<a href="log-aktifitas.php">Laporan Aktifitas</a>
  	</div>
  </li>
  <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">Mobil</a>
      <div class="dropdown-content">
        <a href="entry-mobil.php">Entry Mobil Masuk</a>
        <a href="mobilaktif.php">Data Mobil Aktif</a>
      </div>
  </li>
    <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">Parkir</a>
      <div class="dropdown-content">
        <a href="tambah-parkir.php">Tambah Ruang Parkir</a>
        <a href="data-parkir.php">Data Ruang Parkir</a>
      </div>
    </li>
    <li class="dropdown">
      <a href="javascript:void(0)" class="dropbtn">Pengaturan Karyawan</a>
      <div class="dropdown-content">
        <a href="tambah-karyawan.php">Buat Karyawan Baru</a>
        <a href="daftar-karyawan.php">Daftar Karyawan</a>
      </div>
    </li>


    <li class="right"><a href="logout.php">Logout</a></li>
    <li class="right"><font style="display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none;"><? echo "Welcome  "?><font style="color: #FA5882;"><? echo $_SESSION['namalengkap'] ?></font></font></li>

  <?php }if($_SESSION['level'] == 'kr'){ ?>
    <li><a href="home.php">Beranda</a></li>
    <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">Laporan</a>
      <div class="dropdown-content">
        <a href="log-parkir.php">Laporan Parkir</a>
      </div>
    </li>
      <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">Parkir</a>
        <div class="dropdown-content">
          <a href="tambah-parkir.php">Tambah Ruang Parkir</a>
          <a href="data-parkir.php">Data Ruang Parkir</a>
        </div>
      </li>

      <li class="right"><a href="logout.php">Logout</a></li>
      <li class="right"><font style="display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none;"><? echo "Welcome  "?><font style="color: #FA5882;"><? echo $_SESSION['namalengkap'] ?></font></font></li>

<?php }if($_SESSION['level'] == 'kp1' || $_SESSION['level'] == 'kp2'){?>

  <li><a href="home.php">Beranda</a></li>
  <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">Laporan</a>
    <div class="dropdown-content">
      <a href="log-parkir.php">Laporan Parkir</a>
          </div>
  </li>
  <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">Mobil</a>
      <div class="dropdown-content">
        <a href="entry-mobil.php">Entry Mobil Masuk</a>
        <a href="mobilaktif.php">Data Mobil Aktif</a>
      </div>
  </li>


    <li class="right"><a href="logout.php">Logout</a></li>
    <li class="right"><font style="display: block;color: white;text-align: center;padding: 14px 16px;text-decoration: none;"><? echo "Welcome  "?><font style="color: #FA5882;"><? echo $_SESSION['namalengkap'] ?></font></font></li>
    <?php }?>
  </ul>
<div>
	<?php
	$idparkir = $_GET['idparkir'];
	$query_mysql = mysqli_query($connect,"SELECT * FROM parkir WHERE idparkir='$idparkir'");
	$nomor = 1;
	while($data = mysqli_fetch_array($query_mysql)){
	?>
  <form action="proses-entry.php" method="post">
	<label for="idparkir"></label>
    <input type="hidden" id="idparkir" name="idparkir" value="<?php echo $data['idparkir'] ?>">

	<label for="ruang">Ruang</label>
    <input type="text" id="ruang" name="ruang" value="<?php echo $data['ruang'] ?>">

  <label for="plat_nomor">Nomor Plat</label>
  <?php
  $cogan = "SELECT * FROM mobilaktif";
  $cogan2 = mysqli_query($connect,$cogan);

  echo "<select name='ok'>";
	while ($cakman = mysqli_fetch_array($cogan2)) {
    echo "<option value='".$cakman['waktu_masuk']."'>" . $cakman['plat_nomor'] ."</option>";
	}
echo "</select>";
  ?>
  <?php
  $cogan = "SELECT * FROM mobilaktif";
  $cogan2 = mysqli_query($connect,$cogan);

  echo "<select name='plat_nomor'>";
while ($cakman = mysqli_fetch_array($cogan2)) {
    echo "<option value='".$cakman['plat_nomor']."'>" . $cakman['plat_nomor'] ."</option>";
}
echo "</select>";
  ?>
	<label for="posisi"></label>
    <input type="hidden" id="posisi" name="posisi" value="<?php echo $data['posisi'] ?>">

    <label for="waktu_masuk_parkir">Waktu Masuk Parkir</label>
      <input type="text" id="waktu_masuk_parkir" name="waktu_masuk_parkir" value="<?php date_default_timezone_set('Asia/Jakarta'); $tgl=date('Y-m-d h:i:s'); echo $tgl;?>">

<input type="hidden" name="userku" value="<?php echo $_SESSION['namalengkap'];?>">
	<input type="submit" value="Submit">
  </form>
	<?php } ?>
</div>
</body>
</html>
