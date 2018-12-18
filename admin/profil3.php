<?php include 'header3.php'; 
include 'config.php';
?>
<h3><span class="glyphicon glyphicon-user"></span>  Profile Anda</h3>
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
		<td class="col-md-3">E-Mail</td>
	</tr>
	<?php 
	$user = $_SESSION['username'];
		$data=mysqli_query($conn_mysql,"select * from pegawai where username = '$user' ");

		while($d=mysqli_fetch_array($data)){

		?>
		<tr>
			<th><?php echo $d['id_pegawai'] ?></th>
			<th><?php echo $d['username'] ?></th>
			<th><?php echo $d['nama'] ?></th>
			<th><?php echo $d['alamat'] ?></th>
			<th><?php echo $d['no_telp'] ?></th>
			<th><?php echo $d['email'] ?></th>
		</tr>		
		<?php 
	}
	?>
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
	}
}
?>
</table>
		
	<?php 
include 'footer.php';

?>