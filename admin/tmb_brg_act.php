<?php 
include 'config.php';
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$harga=$_POST['harga'];
$stok=$_POST['stok'];

mysqli_query($conn_mysql,"insert into barang values('$kode','$nama','$harga','$stok')");
header("location:barang3.php");

 ?>