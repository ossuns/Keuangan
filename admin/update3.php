<?php 
include 'config.php';
$kode_barang=$_POST['kode'];
$nama_barang=$_POST['nama'];
$harga_jual=$_POST['harga'];

mysqli_query($conn_mysql,"update barang set kode_barang='$kode_barang', nama_barang='$nama_barang', harga_jual='$harga_jual' where kode_barang='$kode_barang'");
header("location:barang3.php");

?>