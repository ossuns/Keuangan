<?php include 'header3.php'; ?>

<h3><span class="glyphicon glyphicon-file"></span>  Riwayat Layanan</h3>
<br/>
<br/>

<div class="col-md-12">
	<a style="margin-bottom:10px" href="lap_riwayat.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">ID Pelanggan</th>
		<th class="col-md-1">ID Pegawai</th>
		<th class="col-md-2">Tanggal Pelayanan</th>
	</tr>
	<?php 
		$brg=mysqli_query($conn_mysql,"select * from pelayanan ");
		while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $b['id_pelanggan'] ?></td>
			<td><?php echo $b['id_pegawai'] ?></td>
			<td><?php echo $b['tgl_pelayanan'] ?></td>
		</tr>		
		<?php 
	}
	?>

<?php 
include 'footer.php';

?>