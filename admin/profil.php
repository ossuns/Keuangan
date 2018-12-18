<?php include 'header.php'; 
include 'config.php';
?>
<h3><span class="glyphicon glyphicon-user"></span>Profile Anda</h3>
<br/>
<br/>
<br/>
<table class="table table-striped">
	<tr>
		<td class="col-md-1">ID</td>
		<td class="col-md-4">Username</td>
		<td class="col-md-3">Nama</td>
		<td class="col-md-1">Alamat</td>
		<td class="col-md-3">Telephone</td>
		<td class="col-md-3">Email</td>
	</tr>
	<?php 
	$user = $_SESSION['username'];
		$data=mysqli_query($conn_mysql,"select * from pelanggan where username = '$user' ");

		while($d=mysqli_fetch_array($data)){

		?>
		<tr>
			<th><?php echo $d['id_pelanggan'] ?></th>
			<th><?php echo $d['username'] ?></th>
			<th><?php echo $d['nama'] ?></th>
			<th><?php echo $d['alamat'] ?></th>
			<th><?php echo $d['no_telp'] ?></th>
		</tr>		
		<?php 
	}
	?>
</table>
		
	<?php 
include 'footer.php';

?>