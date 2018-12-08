<?php
//begain class
//cth class
class mahasiswa {
//properti class
public $nama;
public $nim;
//method
public function __construct(){
//echo"Dipanggil ketika membuat objek mahasiswa </br>";
$this->nama="Belum diketahui";
$this->nim="M31160xx";
	}
	public function inputdata(){
		echo "<form action='' method='post'>
		Nama :<input type='text' name='nama'></br>
		Nim  :<input type='text' name='nim'></br>
		<input type='submit' name='tombol' value='input'>";  
	}
	public function isidata ($nama,$nim){
		$this->nama=$nama;
		$this->nim=$nim;
	}
	public function terimadata(){
		$this->nama=$_POST['nama'];
		$this->nim=$_POST['nim'];
	}
	public function cetakdata(){
		echo "Cetak Nama didalam Class :".$this->nama."</br>";
		echo "Cetak Nim didalam Class  :".$this->nim."</br>";
		
	}
}
//end class
?>