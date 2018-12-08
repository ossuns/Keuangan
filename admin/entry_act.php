<?php 

include 'config.php';
session_start();
$user = $_SESSION['username'];
$kode=$_POST['kode'];
$harga=$_POST['harga'];
$jumlah=$_POST['jumlah'];
//menambahkan tanggal beli
$tgl=date('Y-m-d');
//update stok ke tabel barang
$dt=mysqli_query($conn_mysql,"select * from barang INNER JOIN suplai ON suplai.kode_barang = barang.kode_barang where barang.kode_barang='$kode'");
$data=mysqli_fetch_array($dt);
$tambah=$data['stok_barang']+ $jumlah;
mysqli_query($conn_mysql,"update barang set stok_barang='$tambah' where kode_barang='$kode'");

$tmb = mysqli_query($conn_mysql,"SELECT * FROM pegawai INNER JOIN suplai ON pegawai.id_pegawai = suplai.id_pegawai WHERE username = '$user'");
$pg=mysqli_fetch_array($tmb);
$id_pg=$pg['id_pegawai'];
// mngisi data ke suplai
mysqli_query($conn_mysql,"insert into suplai values('$kode','$jumlah','$id_pg','$harga','$tgl')")or die(mysql_error());
header("location:entry.php");

?>