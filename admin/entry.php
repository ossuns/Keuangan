<?php include 'header2.php'; ?>

<h3><span class="glyphicon glyphicon-upload"></span>  Entry Barang</h3>
<br/>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-pencil"></span>  Entry</button>
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
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">Kode</th>
		<th class="col-md-4">Nama Barang</th>
		<th class="col-md-3">Harga Beli</th>
		<th class="col-md-1">Jumlah</th>
		<th class="col-md-1">Tanggal</th>
	</tr>
	<?php 
		$brg=mysqli_query($conn_mysql,"select * from suplai INNER JOIN barang ON barang.kode_barang = suplai.kode_barang");
		while($b=mysqli_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $b['kode_barang'] ?></td>
			<td><?php echo $b['nama_barang'] ?></td>
			<td>Rp.<?php echo number_format($b['harga_beli']) ?>,-</td>
			<td><?php echo $b['jumlah_barang'] ?></td>
			<td><?php echo $b['tgl_suplai'] ?></td>
		</tr>		
		<?php 
	}
	?>
	<!-- module input -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Entry Barang
				</div>
				<div class="modal-body">				
					<form action="entry_act.php" method="post">
						<div class="form-group">
							<label>Kode Barang</label>								
							<select class="form-control" name="kode">
								<?php 
								$brg=mysqli_query($conn_mysql,"select * from barang");
								while($b=mysqli_fetch_array($brg)){
									?>	
									<option value="<?php echo $b['kode_barang']; ?>"><?php echo $b['kode_barang'] ?></option>
									<?php 
								}
								?>
							</select>

						</div>									
						<div class="form-group">
							<label>Harga beli</label>
							<input name="harga" type="text" class="form-control" placeholder="Harga" >
						</div>	
						<div class="form-group">
							<label>Jumlah</label>
							<input name="jumlah" type="text" class="form-control" placeholder="Jumlah">
						</div>																	
					<p>nb : Masukkan data Terlebih dahulu, jika Barang belum ada pada daftar Stok<p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>											
						<input type="submit" class="btn btn-primary" value="Simpan">
					</div>
					
				</form>
			</div>
		</div>
	</div>
<?php 
include 'footer.php';

?>