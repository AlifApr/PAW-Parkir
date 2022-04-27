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
    <style>
      table {
          border-collapse: collapse;
          width: 100%;
          border: 1px solid black;
      }

      th, td {
          text-align: left;
          padding: 8px;
      }

      tr:nth-child(even){background-color: #fff}

      th {
          background-color: #0d6efd;
          color: white;
      }
    </style>
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
      <table class="table" height=90% width=90% align=center>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>Nomor Handphone</th>
          <th>Shift</th>
          <th>Level</th>
          <th>Aksi</th>
        </tr>
        <?php
        $query_mysql = mysqli_query($connect,"SELECT * FROM user");
        $nomor = 1;
        while($data = mysqli_fetch_array($query_mysql)){
          if($data['level']=='admin')
          {
          }else{
        ?>
        <tr>
          <td><?php echo $nomor++; ?></td>
          <td><?php echo $data['namalengkap']; ?></td>
          <td><?php echo $data['kelamin']; ?></td>
          <td><?php echo $data['no_hp']; ?></td>
          <td><?php echo $data['shift']; ?></td>
          <?php if ($data['level'] == 'kr'){
          ?>
          <td>Karyawan Ruang</td>
        <?php }elseif ($data['level'] == 'kp1'){
          ?>
          <td>Karyawan Parkir Depan</td>
      <?php }elseif ($data['level'] == 'kp2'){
        ?>
        <td>Karyawan Parkir Belakang</td>
      <?php } ?>
          <td>
            <a href="edit-karyawan.php?id=<?php echo $data['id']; ?>"><img src="images/edit.png" height=7% width=7%></a> |
            <a href="hapus-karyawan.php?id=<?php echo $data['id']; ?>"><img src="images/delete.png" height=7% width=7%></a>
          </td>
        </tr>
        <?php }} ?>
      </table>
    </div>
  </body>
</html>
