<?php include 'header2.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Daftar Barang</h3>
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
	<a style="margin-bottom:10px" href="lap_barang.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">Kode</th>
		<th class="col-md-4">Nama Barang</th>
		<th class="col-md-3">Harga Jual</th>
		<th class="col-md-1">Stok yang Tersedia</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-3">Opsi</th>
	</tr>
	<?php 
		$brg=mysqli_query($conn_mysql,"select * from barang ");
		while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $b['kode_barang'] ?></td>
			<td><?php echo $b['nama_barang'] ?></td>
			<td>Rp.<?php echo number_format($b['harga_jual']) ?>,-</td>
			<td><?php echo $b['stok_barang'] ?></td>
			<td>
				<a href="edit.php?id=<?php echo $b['kode_barang']; ?>" class="btn btn-warning">Edit</a>
				<a onclick="if(confirm('Apakah anda yakin ingin Menghapus barang ini ?')){ location.href='hapus.php?id=<?php echo $b['kode_barang'];?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
<?php 
include 'footer.php';

?>