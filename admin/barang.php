<?php include 'header.php'; ?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Daftar Menu</h3>
<br/>
<br/>
<br/>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">Kode</th>
		<th class="col-md-4">Nama Menu</th>
		<th class="col-md-3">Harga Jual</th>
		<th class="col-md-1">Stok yang Tersedia</th>
		<th class="col-md-3">Pemesanan</th>
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
				<a onclick="if(confirm('Apakah anda yakin ingin membeli ini ??')){ location.href='beli_act.php?id=<?php echo $b['kode_barang'];?>' }" class="btn btn-info">Beli</a>
			</td>
		</tr>		
		<?php 
	}
	?>
</table>
<?php 
	if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "tambah"){
			?>	
			<script>
			$(document).ready(function(){
				$('#troli').css("color","green");
				$('#troli').append("<span class='glyphicon glyphicon-asterisk'></span>");
			});
			</script>
			<?php
			}
		
}
?>
<?php 
include 'footer.php';

?>