<?php
include 'config.php';
require('../assets/pdf/fpdf.php');
session_start();
$user =$_SESSION['username'] ;
$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'TOKO E-MART TOKO ONLINE SERBA ADA',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 021454635363',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. FMIPA UNS kelurahan D3 TI ',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : www.kelompokPemweb.com email : kelompokPemweb@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Barang ",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(4, 0.8, 'Kode Barang', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'ID pegawai', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Harga Beli', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Jumlah ', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Tanggal Suplai ', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$query=mysqli_query($conn_mysql,"select * from suplai INNER JOIN barang ON barang.kode_barang = suplai.kode_barang");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(4, 0.8, $lihat['kode_barang'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['id_pegawai'], 1,0,'C');
	$pdf->Cell(4, 0.8, $lihat['nama_barang'],1, 0, 'C');
	$pdf->Cell(4, 0.8, number_format($lihat['harga_beli']),1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['jumlah_barang'],1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['tgl_suplai'],1, 1, 'C');
}

$pdf->Output("Laporan_Barang.pdf","I");

?>

