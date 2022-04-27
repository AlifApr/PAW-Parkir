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
		<title>Andri Member Area</title>
		<link rel="shortcut icon" href="images/logo.png">
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/w3.css">
		<link rel="stylesheet" href="css/w3-theme-teal.css">
		<link rel="stylesheet" href="css.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<style>
			body {font-family: "Roboto", sans-serif}
			.w3-bar-block .w3-bar-item{padding:16px;font-weight:bold}
		</style>
	</head>
	<body>
		<nav class="w3-sidebar w3-bar-block w3-collapse w3-animate-left w3-card" style="z-index:3;width:250px;" id="mySidebar">
			<a class="w3-bar-item w3-button w3-border-bottom w3-large" href="#"><img src="images/logo.png" style="width:80%;"></a>
			<a class="w3-bar-item w3-button w3-hide-large w3-large" href="javascript:void(0)" onclick="w3_close()">Close <i class="fa fa-remove"></i></a>
			<div class="dropdown-content">
				<?php
					if($_SESSION['level'] == "admin") echo '<a class="w3-bar-item w3-button"  href="home.php">HOME</a>';
					else if($_SESSION['level'] == "kp") echo '<a class="w3-bar-item w3-button"  href="home.php">HOME</a>';
					else if($_SESSION['level'] == "kr") echo '<a class="w3-bar-item w3-button"  href="home.php">HOME</a>';
					else if($_SESSION['level'] == "kel") echo '<a class="w3-bar-item w3-button"  href="home.php">HOME</a>';
				?>
			</div>
			<div class="dropdown-content">
				<?php
					if($_SESSION['level'] == "admin") echo '<a class="w3-bar-item w3-button"  href="data_ruang.php">Data Ruang</a>';
					else if($_SESSION['level'] == "kp") echo '<a class="w3-bar-item w3-button"  href="data_ruang.php">Data Ruang</a>';
				?>
			</div>
			<div class="dropdown-content">
				<?php
					if($_SESSION['level'] == "admin") echo '<a class="w3-bar-item w3-button"  href="log-parkir.php">Laporan Parkir</a>';
					else if($_SESSION['level'] == "kp") echo '<a class="w3-bar-item w3-button"  href="log-parkir.php">Laporan Parkir</a>';
					else if($_SESSION['level'] == "kr") echo '<a class="w3-bar-item w3-button"  href="log-parkir.php">Laporan Parkir</a>';
					else if($_SESSION['level'] == "kel") echo '<a class="w3-bar-item w3-button"  href="log-parkir.php">Laporan Parkir</a>';
				?>
			</div>
			<div class="dropdown-content">
				<?php
					if($_SESSION['level'] == "admin") echo '<a class="w3-bar-item w3-button"  href="entry-mobil.php">Entry Mobil Masuk</a>';
					else if($_SESSION['level'] == "kp") echo '<a class="w3-bar-item w3-button"  href="entry-mobil.php">Entry Mobil Masuk</a>';
				?>
			</div>
			<div class="dropdown-content">
				<?php
					if($_SESSION['level'] == "admin") echo '<a class="w3-bar-item w3-button"  href="data-parkir.php">Lantai 1</a>';
					else if($_SESSION['level'] == "kr") echo '<a class="w3-bar-item w3-button"  href="data-parkir.php">Lantai 1</a>';
				?>
			</div>
			<div class="dropdown-content">
				<?php
					if($_SESSION['level'] == "admin") echo '<a class="w3-bar-item w3-button"  href="Lantai_2.php">Lantai 2</a>';
					else if($_SESSION['level'] == "kr") echo '<a class="w3-bar-item w3-button"  href="Lantai_2.php">Lantai 2</a>';
				?>
			</div>
			<div class="dropdown-content">
				<?php
					if($_SESSION['level'] == "admin") echo '<a class="w3-bar-item w3-button"  href="Lantai_3.php">Lantai 3</a>';
					else if($_SESSION['level'] == "kr") echo '<a class="w3-bar-item w3-button"  href="Lantai_3.php">Lantai 3</a>';
				?>
			</div>
			<div class="dropdown-content">
				<?php
					if($_SESSION['level'] == "admin") echo '<a class="w3-bar-item w3-button"  href="mobilaktif.php">Data Mobil Aktif</a>';
					else if($_SESSION['level'] == "kel") echo '<a class="w3-bar-item w3-button"  href="mobilaktif.php">Data Mobil Aktif</a>';
				?>
			</div>
			<div class="dropdown-content">
				<?php
					if($_SESSION['level'] == "admin") echo '<a class="w3-bar-item w3-button"  href="logout.php">Logout</a>';
					else if($_SESSION['level'] == "kp") echo '<a class="w3-bar-item w3-button"  href="logout.php">Logout</a>';
					else if($_SESSION['level'] == "kr") echo '<a class="w3-bar-item w3-button"  href="logout.php">Logout</a>';
					else if($_SESSION['level'] == "kel") echo '<a class="w3-bar-item w3-button"  href="logout.php">Logout</a>';
				?>
			</div>
			
			
			<div>
				<a class="w3-bar-item w3-button" onclick="myAccordion('demo')" href="javascript:void(0)">Lainnya<i class="fa fa-caret-down"></i></a>
				<div id="demo" class="w3-hide">
					<div class="dropdown-content">
						<?php
							if($_SESSION['level'] == "admin") echo '<a class="w3-bar-item w3-button"  href="tambah-parkir.php">Tambah Ruang Parkir</a>';
						?>
					</div>
					<div class="dropdown-content">
						<?php
						if($_SESSION['level'] == "admin") echo '<a class="w3-bar-item w3-button"  href="tambah-karyawan.php">Buat Karyawan Baru</a>';
						?>
					</div>
					<div class="dropdown-content">
						<?php
							if($_SESSION['level'] == "admin") echo '<a class="w3-bar-item w3-button"  href="daftar-karyawan.php">Daftar Karyawan</a>';
						?>
					</div>
					<div class="dropdown-content">
						<?php
							if($_SESSION['level'] == "admin") echo '<a class="w3-bar-item w3-button"  href="log-keuangan.php">Laporan Keuangan</a>';
						?>	
					</div>
					<div class="dropdown-content">
						<?php
							if($_SESSION['level'] == "admin") echo '<a class="w3-bar-item w3-button" href="log-aktifitas.php">Laporan Aktifitas</a>';
						?>
					</div>
				</div>
			</div>
		</nav>

		<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>

		<div class="w3-main" style="margin-left:250px;">

			<div id="myTop" class="w3-container w3-top w3-theme w3-large">
				<p><i class="fa fa-bars w3-button w3-teal w3-hide-large w3-xlarge" onclick="w3_open()"></i>
				<span id="myIntro" class="w3-hide">Andri Parkir</span></p>
			</div>

			<header class="w3-container w3-theme" style="padding:64px 32px">
				<h1 class="w3-xxxlarge">Andri Parkir</h1>
			</header>

			<div class="w3-container" style="padding:32px">

				<h2>Welcome <?php echo $_SESSION['namalengkap']; ?></h2>

				<p>Status : <?php echo $_SESSION['level']; ?> </p>
				
				<div>
					<table border = "0" class="table" height=90% width=90% align=center>
						<tr>
							<th>Jumlah Ruang Keseluruhan</th>
							<th>Jumlah Ruang Terisi</th>
							<th>Jumlah Ruang Kosong</th>
						</tr>	
							
						
						
						<?php
						$query_mysql = mysqli_query($connect,"SELECT * FROM parkir");
						$jumlah_ruang = 0;
						$jumlah_terisi = 0;
						$jumlah_Kosong = 0;

						while($data = mysqli_fetch_array($query_mysql)){ ?>
							<tr>
								<th><input type = "hidden" value = "<?php echo $data['jumlah_ruang']; $jumlah_ruang += $data['jumlah_ruang'] ?>"></th>
								<th><input type = "hidden" value = "<?php echo $data['jumlah']; $jumlah_terisi += $data['jumlah'] ?>"></th>
								<th><input type = "hidden" value = "<?php echo $jumlah_Kosong = $jumlah_ruang - $jumlah_terisi ?>"></th>
							</tr>
						<?php } ?>
						<tr>
							<th><?php echo $jumlah_ruang; ?></th>
							<th><?php echo $jumlah_terisi; ?></th>
							<th><?php echo $jumlah_Kosong; ?></th>
							
						</tr>
					</table>
				</div>

			<footer class="w3-container w3-theme" style="padding:32px">
				<p>Andri Eka Wahyudianto</p>
			</footer>
		</div>

		<script>
			// Open and close the sidebar on medium and small screens
			function w3_open() {
				document.getElementById("mySidebar").style.display = "block";
				document.getElementById("myOverlay").style.display = "block";
			}
			function w3_close() {
				document.getElementById("mySidebar").style.display = "none";
				document.getElementById("myOverlay").style.display = "none";
			}

			// Change style of top container on scroll
			window.onscroll = function() {myFunction()};
			function myFunction() {
				if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
					document.getElementById("myTop").classList.add("w3-card-4", "w3-animate-opacity");
					document.getElementById("myIntro").classList.add("w3-show-inline-block");
				} else {
					document.getElementById("myIntro").classList.remove("w3-show-inline-block");
					document.getElementById("myTop").classList.remove("w3-card-4", "w3-animate-opacity");
				}
			}

			// Accordions
			function myAccordion(id) {
				var x = document.getElementById(id);
				if (x.className.indexOf("w3-show") == -1) {
					x.className += " w3-show";
					x.previousElementSibling.className += " w3-theme";
				} else { 
					x.className = x.className.replace("w3-show", "");
					x.previousElementSibling.className = 
					x.previousElementSibling.className.replace(" w3-theme", "");
				}
			}
		</script>
	</body>
</html>
