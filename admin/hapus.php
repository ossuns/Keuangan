<?php 
include 'config.php';
$id=$_GET['id'];
mysqli_query($conn_mysql,"delete from barang where kode_barang='$id'");
header("location:barang2.php");

?>