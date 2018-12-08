<!DOCTYPE html>
<html>
<head>
	<?php 
	session_start();
	include 'cek.php';
	include 'config.php';
	?>
	<title>Aplikasi Penjualan Sederhana</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>	
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand">Aplikasi Penjualan</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">				
				<ul class="nav navbar-nav navbar-right">
					<li><a id="pesan_sedia" href="#" data-toggle="modal" data-target="#modalpesan"><span class='glyphicon glyphicon-comment'></span>  Pesan</a></li>
					<li><a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#">Hi, <?php echo $_SESSION['username']  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="index3.php"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>			
			<li><a href="barang3.php"><span class="glyphicon glyphicon-briefcase"></span>  Daftar Barang </a></li> 
			<li><a href="entry2.php"><span class="glyphicon glyphicon-upload"></span>  Entry Barang </a></li>   
			<li><a href="riwayat.php"><span class="glyphicon glyphicon-file"></span>  Riwayat Layanan </a></li>
			<li><a href="registrasi.php"><span class="glyphicon glyphicon-plus-sign"></span>  Tambah Pegawai</a></li>
			<li><a href="profil_pegawai.php"><span class="glyphicon glyphicon-user"></span>  Profil Pegawai</a></li> 
			<li><a href="profil_pelanggan.php"><span class="glyphicon glyphicon-user"></span>  Profil Pelanggan</a></li> 
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
	</div>
	<div class="col-md-10">