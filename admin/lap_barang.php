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
$pdf->MultiCell(19.5,0.5,'Warung Es Ndelik',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 021454635363',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. FMIPA UNS kelurahan D3 TI ',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : www.kelompokOpenSource.com email : kelompokOpenSource@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Stok Menu ",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(4, 0.8, 'Kode Menu', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'Nama Menu', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Harga', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Stok yang Tersedia', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$query=mysqli_query($conn_mysql,"SELECT * FROM barang");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(4, 0.8, $lihat['kode_barang'],1, 0, 'C');
	$pdf->Cell(7, 0.8, $lihat['nama_barang'], 1,0,'C');
	$pdf->Cell(4, 0.8, $lihat['harga_jual'],1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['stok_barang'],1, 1, 'C');
	
}

$pdf->Output("Laporan_Barang.pdf","I");

?>

