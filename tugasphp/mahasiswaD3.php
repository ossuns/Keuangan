<?php
require ('mahasiswa.php');
class mahasiswaD3 extends mahasiswa {
private $TA;

public function __construct(){
	parent::__construct();
	$this->TA="Judul TA";
	}
	public function cetakdata(){
		echo "Cetak Nama didalam Class :".$this->nama."</br>";
		echo "Cetak Nim didalam Class  :".$this->nim."</br>";
		echo "Cetak TA didalam Class  :".$this->TA."</br>";
	}
}