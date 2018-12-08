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
$pdf->Cell(25.5,0.7,"Nota Pembelian Barang",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(4, 0.8, 'Kode Barang', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Harga', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$query=mysqli_query($conn_mysql,"SELECT * FROM user INNER JOIN pelanggan 
		ON user.username = pelanggan.username INNER JOIN pembelian 
		ON pembelian.id_pelanggan = pelanggan.id_pelanggan INNER JOIN barang 
		ON barang.kode_barang = pembelian.kode_barang WHERE user.username = '$user'");
while($lihat=mysqli_fetch_array($query)){
	$pdf->Cell(4, 0.8, $lihat['kode_barang'],1, 0, 'C');
	$pdf->Cell(7, 0.8, $lihat['nama_barang'], 1,0,'C');
	$pdf->Cell(4, 0.8, $lihat['harga_jual'],1, 1, 'C');
	
}
$x=mysqli_query($conn_mysql,"SELECT SUM(harga_jual) as total FROM user INNER JOIN pelanggan 
		ON user.username = pelanggan.username INNER JOIN pembelian 
		ON pembelian.id_pelanggan = pelanggan.id_pelanggan INNER JOIN barang 
		ON barang.kode_barang = pembelian.kode_barang WHERE user.username = '$user'");	
		$xx=mysqli_fetch_array($x);	
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Total Bayar			 :  Rp.". number_format($xx['total']).",-");

$pdf->Output("Nota_Pembelian.pdf","I");

?>

