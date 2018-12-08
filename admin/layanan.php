<?php 
include 'config.php';
session_start();
		$id=$_GET['id'];
		//menambahkan tanggal beli
		$tgl=date('Y-m-d');
		$id2 = $_SESSION['username'];
		$konek = mysqli_query($conn_mysql,"SELECT id_pegawai FROM  pegawai WHERE username = '$id2'");
		$pgw = mysqli_fetch_array($konek);
		$idpgw = $pgw['id_pegawai'];
		//memasukkan data ke table pelayanan
		mysqli_query($conn_mysql,"insert into pelayanan values ('$id','$idpgw','$tgl')");
		//menghapus data dari tabel pembelian 
		mysqli_query($conn_mysql,"delete from pembelian where id_pelanggan='$id'");
echo ("$id $pgw $tgl");
header("location:pembelian.php");
?>