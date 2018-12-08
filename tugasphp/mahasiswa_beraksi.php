<?php
require('mahasiswa.php');
$objectmhs=new mahasiswa;
$coba=new mahasiswa;
$objectmhs->isidata("Jujur Dewa Pamungkas","M3116083");
echo "Cetak Nama Diluar Class : ".$objectmhs->nama."</br>";
echo "Cetak Nim Diluar Class : ".$objectmhs->nim."</br>";
$objectmhs->cetakdata();
echo "Cetak Nama Diluar Class : ".$coba->nama."</br>";
echo "Cetak Nim Diluar Class : ".$coba->nim."</br>";
$coba->cetakdata();
?>