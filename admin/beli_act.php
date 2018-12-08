<?php 
include 'config.php';
//membuat session
session_start();
//menangkap data dari barang.php
$id=$_GET['id'];
//menambahkan tanggal beli
$tgl=date('Y-m-d');
//membuat session ke pembeli yang membeli
$user =$_SESSION['username'] ;
//mengambil id_pelanggan
$beli = mysqli_query($conn_mysql,"SELECT pelanggan.id_pelanggan FROM user INNER JOIN pelanggan ON user.username = pelanggan.username WHERE user.username = '$user'");
$plg=mysqli_fetch_array($beli);
$id_plg=$plg['id_pelanggan'];
//pengurangan stok barang
$operasi = mysqli_query($conn_mysql,"SELECT stok_barang FROM barang WHERE kode_barang = '$id'");
$mengurangi=mysqli_fetch_array($operasi);
$id_beli=$mengurangi['stok_barang']-1;
//mengirim data ke table pembelian 
mysqli_query($conn_mysql,"insert into pembelian values('$id_plg','$id','$tgl')");
//update stok barang
$query="UPDATE barang SET stok_barang='$id_beli' where kode_barang='$id'";
mysqli_query($conn_mysql, $query);
header("location:barang.php?pesan=tambah");
?>