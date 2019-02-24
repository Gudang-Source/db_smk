<?php
include('../../database/config.php');
?>

<html>

<head>
	<title>Admin - <?php echo $_SESSION['nama'] ?></title>
	<link rel="stylesheet" type="text/css" href="assets/css/main.css" />
	<link rel='shortcut icon' href='../../assets/icon/favicon.png'>
</head>

<body bgcolor="#0D9F5">
	<h1>
		<center class="judul">ADMIN</center>
	</h1>
	<hr>
	<div class="menuatas">
		<!-- <div class="dropdown">
			<button class="dropbtn">MENU</button>
			<div class="dropdown-content">
				<a href="index.php">HOME</a>
				<a href="mobil.php">Mobil Tersedia</a>
				<a href="mobil_dipinjam.php">Mobil Dipinjam</a>
				<a href="riwayat_pinjam.php">Riwayat Pinjam</a>
				<a href="action/logout.php">LogOut</a>
			</div>
		</div> -->
		<a href="../../index.php"><button class="btnatas-warning">◀</button></a>
		<a href="index.php"><button class="btnatas-success">BERANDA</button></a>
		<a href="siswa.php"><button class="btnatas-success">SISWA</button></a>
		<a href="guru.php"><button class="btnatas-success">GURU</button></a>
		<a href="admin.php"><button class="btnatas-success">ADMIN</button></a> --
		<a href="kelas.php"><button class="btnatas-success">KELAS</button></a>
		<a href="mapel.php"><button class="btnatas-success">MAPEL</button></a>
		<a href="pengajar.php"><button class="btnatas-success">PENGAJAR</button></a>
		<a href="action/logout.php"><button class="btnatas-danger" style="float: right;">LOGOUT</button></a>
	</div>

	<!-- <div class="sidebar">
		<br><br>
		<div class="font">
			<h2>MENU</h2>
			<a href="profil.php"><button class="button button1">Profile</button></a>
			<a href="action/logout.php"><button class="button button3">LogOut</button></a><br>
			<a href="mobil.php"><button class="button button1">Mobil Tersedia</button></a><br>
			<a href="mobil_dipinjam.php"><button class="button button1">Mobil Dipinjam</button></a><br>
			<a href="riwayat_pinjam.php"><button class="button button1">Riwayat Pinjam</button></a><br>
		</div>
	</div> -->
