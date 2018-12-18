<?php include 'header.php'; 
include 'config.php';
$user =$_SESSION['username'] ;
?>
<h3><span class="glyphicon glyphicon-shopping-cart"></span>  Troli Anda</h3>
<br/>
<div class="col-md-12">
	<a style="margin-bottom:10px" href="cetak_nota.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div>
<table class="table table-striped">
	<tr>
		<td class="col-md-1">Kode Menu</td>
		<td class="col-md-4">Nama Menu</td>
		<td class="col-md-3">Tanggal Beli</td>
		<td class="col-md-3">Harga</td>
	</tr>
	<?php 
		$data=mysqli_query($conn_mysql,"SELECT * FROM user INNER JOIN pelanggan 
		ON user.username = pelanggan.username INNER JOIN pembelian 
		ON pembelian.id_pelanggan = pelanggan.id_pelanggan INNER JOIN barang 
		ON barang.kode_barang = pembelian.kode_barang WHERE user.username = '$user'");
		while($d=mysqli_fetch_array($data)){

		?>
		<tr>
			<th><?php echo $d['kode_barang'] ?></th>
			<th><?php echo $d['nama_barang'] ?></th>
			<th><?php echo $d['tgl_pembelian'] ?></th>
			<th><?php echo "Rp.". number_format($d['harga_jual']).",-"?></th>
		</tr>		
		<?php 
	}
	?>
	<tr>
		<td colspan= "3">Total Bayar</td>
		<?php 
			$x=mysqli_query($conn_mysql,"SELECT SUM(harga_jual) as total FROM user INNER JOIN pelanggan 
		ON user.username = pelanggan.username INNER JOIN pembelian 
		ON pembelian.id_pelanggan = pelanggan.id_pelanggan INNER JOIN barang 
		ON barang.kode_barang = pembelian.kode_barang WHERE user.username = '$user'");	
			$xx=mysqli_fetch_array($x);			
			echo "<td><b> Rp.". number_format($xx['total']).",-</b></td>";
		?>
	</tr>
</table>
	<?php 
include 'footer.php';

?>