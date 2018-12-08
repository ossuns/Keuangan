<?php include 'header2.php'; 
include 'config.php';
?>
<h3><span class="glyphicon glyphicon-file"></span> Pesanan</h3>
<br/>
<br/>
<br/>
<table class="table table-striped">
	<tr>
		<td class="col-md-1">Kode barang</td>
		<td class="col-md-3">Tanggal Pesan</td>
		<td class="col-md-3">Nama Barang</td>
		<td class="col-md-3">Nama pelanggan</td>
		<td class="col-md-3">Alamat pengiriman</td>
		<td class="col-md-3">Telephone</td>
		<td class="col-md-3">Opsi</td>
	</tr>
	<?php 
		$data=mysqli_query($conn_mysql,"select * from pelanggan INNER JOIN pembelian
		ON pelanggan.id_pelanggan = pembelian.id_pelanggan INNER JOIN barang ON pembelian.kode_barang = barang.kode_barang ");
		while($d=mysqli_fetch_array($data)){

		?>
		<tr>
			<th><?php echo $d['kode_barang'] ?></th>
			<th><?php echo $d['tgl_pembelian'] ?></th>
			<th><?php echo $d['nama_barang'] ?></th>
			<th><?php echo $d['nama'] ?></th>
			<th><?php echo $d['alamat'] ?></th>
			<th><?php echo $d['no_telp'] ?></th>
			<th>
				<a onclick="if(confirm('Apakah semua pesanan dari pelanggan ini sudah tersedia?')){ location.href='layanan.php?id=<?php echo $d['id_pelanggan'];?>' }" class="btn btn-info">Layani</a>
			</th>
		</tr>		
		<?php 
	}
	?>
</table>
		
	<?php 
include 'footer.php';

?>