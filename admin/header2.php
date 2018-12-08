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

	<!-- modal input -->
	<div id="modalpesan" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Pesan Notification</h4>
				</div>
				<div class="modal-body">
					<?php 
					$periksa=mysqli_query($conn_mysql,"select * from barang where stok_barang <=10");
					while($q=mysqli_fetch_array($periksa)){	
						if($q['stok_barang']<=10){			
							echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['nama_barang']."</a> yang tersisa sudah kurang dari 10</div>";	
						}
					}
					?>
				</div>
				<div class="modal-body">
					<?php 
					$periksa2=mysqli_query($conn_mysql,"select * from pembelian");
					while($s=mysqli_fetch_array($periksa2)){	
					$ceking =$s['id_pelanggan'];
						if(empty($ceking)== false ){			
							echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Ada  <a style='color:red'>Pesanan</a> yang Harus dilayani</div>";	
						}
					}
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>						
				</div>
				
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="index2.php"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>			
			<li><a href="barang2.php"><span class="glyphicon glyphicon-briefcase"></span>  Daftar Barang </a></li> 
			<li><a href="entry.php"><span class="glyphicon glyphicon-upload"></span>  Entry Barang </a></li> 
			<li><a id="pesan" href="pembelian.php"><span class="glyphicon glyphicon-file"></span>  Pesanan</a></li>     
			<li><a href="profil2.php"><span class="glyphicon glyphicon-user"></span>  Profil Anda</a></li> 
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>			
		</ul>
	</div>
	<div class="col-md-10">
	<?php 
$periksa2=mysqli_query($conn_mysql,"select * from pembelian");
while($s=mysqli_fetch_array($periksa2)){	
	$ceking =$s['id_pelanggan'];
	if(empty($ceking)==false){	
		?>	
		<script>
			$(document).ready(function(){
				$('#pesan').css("color","red");
				$('#pesan').append("<span class='glyphicon glyphicon-asterisk'></span>");
			});
		</script>
		<?php
	}
}
?>