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
<title>CakMans Member Area</title>
<link rel="stylesheet" type="text/css" href="styles.css"/>
<link rel="shortcut icon" href="images/parkir.png">
</head>
<body>
<img src="images/logoku.png"/>
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
	$id = $_GET['id'];
	$query_mysql = mysqli_query($connect,"SELECT * FROM user WHERE id='$id'");
	$nomor = 1;
	while($data = mysqli_fetch_array($query_mysql)){
	?>
  <form action="update-karyawan.php" method="post">
	<label for="id"></label>
    <input type="hidden" id="id" name="id" value="<?php echo $data['id'] ?>">

	<label for="namalengkap">Name Lengkap</label>
    <input type="text" id="namalengkap" name="namalengkap" value="<?php echo $data['namalengkap'] ?>">

	<label for="kelamin">Jenis Kelamin</label>
    <select id="kelamin" name="kelamin">
	  <? if($data['kelamin']=='Laki-laki')
		{
	  ?>
	  <option selected value="Laki-laki">Laki-laki</option>
      <option value="Perempuan">Perempuan</option>
	  <?
		}else{
	  ?>
		<option value="Laki-laki">Laki-laki</option>
      <option selected value="Perempuan">Perempuan</option>
		<?}
		?>
    </select>

	<label for="no_hp">Nomor Handphone</label>
    <input type="text" id="no_hp" name="no_hp" value="<?php echo $data['no_hp'] ?>">

	<label for="shift">Shift</label>
    <select id="shift" name="shift" value="<?php echo $data['shift'] ?>">
	  <? if($data['shift']=='Pagi')
		{
	  ?>
      <option selected value="Pagi">Pagi</option>
      <option value="Sore">Sore</option>
	  <option value="Malam">Malam</option>
		<?}elseif($data['shift']=='Sore')
		{
		?><option value="Pagi">Pagi</option>
      <option selected value="Sore">Sore</option>
	  <option value="Malam">Malam</option>
		<?}else{
		?>
		<option value="Pagi">Pagi</option>
      <option value="Sore">Sore</option>
	  <option selected value="Malam">Malam</option>
		<?}?>
    </select>

	<label for="username">Username</label>
    <input type="text" id="username" name="username" value="<?php echo $data['username'] ?>">

	<label for="password">Password</label>
    <input type="password" id="password" name="password" value="<?php echo $data['password'] ?>">

	<input type="submit" value="Submit">
  </form>
	<?php } ?>
</div>
</body>
</html>
