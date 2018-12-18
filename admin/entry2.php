<?php include 'header3.php'; ?>

<h3><span class="glyphicon glyphicon-upload"></span>  Entry Menu</h3>
<br/>
<br/>

<?php 
$periksa=mysqli_query($conn_mysql,"select * from barang where stok_barang <=10");
while($q=mysqli_fetch_array($periksa)){	
	if($q['stok_barang']<=10){	
		?>	
		<script>
			$(document).ready(function(){
				$('#pesan_sedia').css("color","red");
				$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
			});
		</script>
		<?php
		echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['nama_barang']."</a> yang tersisa sudah kurang dari 10</div>";	
	}
}
?>
<div class="col-md-12">
	<a style="margin-bottom:10px" href="lap_entry.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">Kode</th>
				<th class="col-md-2">ID pegawai</th>
		<th class="col-md-3">Nama Menu</th>
		<th class="col-md-3">Harga Beli</th>
		<th class="col-md-1">Jumlah</th>
		<th class="col-md-4">Tanggal</th>
	</tr>
	<?php 
		$brg=mysqli_query($conn_mysql,"select * from suplai INNER JOIN barang ON barang.kode_barang = suplai.kode_barang");
		while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $b['kode_barang'] ?></td>
			<td><?php echo $b['id_pegawai'] ?></td>
			<td><?php echo $b['nama_barang'] ?></td>
			<td>Rp.<?php echo number_format($b['harga_beli']) ?>,-</td>
			<td><?php echo $b['jumlah_barang'] ?></td>
			<td><?php echo $b['tgl_suplai'] ?></td>
		</tr>		
		<?php 
	}
	?>
<?php 
include 'footer.php';

?>