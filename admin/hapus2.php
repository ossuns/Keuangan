<?php 
include 'config.php';
$id=$_GET['id'];
mysqli_query($conn_mysql,"delete from barang where kode_barang='$id'"); //Query Untuk Menghapus
header("location:barang3.php");

?>