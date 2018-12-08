<?php 
include 'header3.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Barang</h3>
<a class="btn" href="barang2.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$id_brg=mysql_real_escape_string($_GET['id']);
$det=mysqli_query($conn_mysql,"select * from barang where kode_barang='$id_brg'")or die(mysql_error());
while($d=mysqli_fetch_array($det)){
?>					
	<form action="update.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id'] ?>"></td>
			</tr>
			<tr>
				<td>Kode Barang</td>
				<td><input type="text" class="form-control" name="kode" value="<?php echo $d['kode_barang'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Barang</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama_barang'] ?>"></td>
			</tr>
			<tr>
				<td>Harga Jual</td>
				<td><input type="text" class="form-control" name="harga" value="<?php echo $d['harga_jual'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
<?php include 'footer.php'; ?>