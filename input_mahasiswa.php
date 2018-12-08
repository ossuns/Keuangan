<?php
require('mahasiswa.php');
$objectmhs=new mahasiswa;
if(isset($_POST['tombol'])){
	$objectmhs->terimadata();
	$objectmhs->cetakdata();
}else {
	$objectmhs->inputdata();
}
?>