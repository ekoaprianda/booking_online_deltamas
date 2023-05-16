
<?php
require "..\koneksi.php";


require('../REPORT/fpdf.php');
class PDF extends FPDF
{
// Page header
function Header()
{	$this->SetY(+10);
 $this->SetX(5);

$this->SetFont('Times','B',12); 
$this->Cell(346,5,'LAPORAN BOOKING SERVICE ONLINE','0',1,'C');
 $this->SetX(5);
$this->SetFont('Times','B',14); 
$this->Cell(346,5,'TOYOTA DELTAMAS','0',1,'C');
$this->SetFont('Times','',12); 
$this->SetX(5);
$this->Cell(346,5,'Jl. Balai Kota No. 2A Medan','B',1,'C'); 
 $this->SetX(5);
$this->SetFont('Times','B',10); 
$this->Cell(8,5,'No','TB',0,'C'); 
$this->Cell(30,5,'Kode Booking','TB',0,'C'); 
$this->Cell(28,5,'Nama Pelanggan','TB',0,'C'); 
$this->Cell(21,5,'No. WA','TB',0,'C'); 
$this->Cell(35,5,'Alamat Pelanggan','TB',0,'C'); 
$this->Cell(30,5,'Nama/Tipe Mobil','TB',0,'C'); 
$this->Cell(20,5,'No. Polisi','TB',0,'C'); 
$this->Cell(25,5,'Keluhan','TB',0,'C'); 
$this->Cell(30,5,'Rencana Datang','TB',0,'C'); 
$this->Cell(15,5,'Diproses','TB',0,'C'); 
$this->Cell(30,5,'Waktu Proses','TB',0,'C'); 
$this->Cell(21,5,'Diselesaikan','TB',0,'C'); 
$this->Cell(30,5,'Waktu Selesai','TB',0,'C'); 
$this->Cell(23,5,'Keterangan','TB',1,'C');
 $this->SetX(5);
$this->Cell(23,1,'','T',1,'C'); 
		


}

// Page footer
function Footer()
{  
  // Posisi 6 cm dari bawah
    $this->SetY(-25);
 $this->SetX(5);
    
    // Arial italic 8
    $this->SetFont('Times','',12);
	$this->Cell(346,7,'','B',1,'L'); 
	$this->Cell(23,5,'Dicetak Oleh',0,0,'L'); 	
	$this->Cell(3,5,':',0,0,'L');
	$this->Cell(114,5,'ADMIN',0,1,'L');
	$this->Cell(23,5,'Halaman',0,0,'L'); 	
	$this->Cell(3,5,':',0,0,'L');								
	$this->Cell(74,5,$this->PageNo().' / {nb}',0,1,'L');	
 
}
}

//Membuat file PDF
$pdf = new PDF('L','mm',array(215.9,355.60));
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',9);
$pdf->SetAutoPageBreak(true,21);
$pdf->SetTitle('Laporan Booking Service Online');


//Mencetak kalimat 

 
$sqlorder=mysqli_query($con,"select * from ORDER_IN order by WAKTU asc");

$i=1;

while($order=mysqli_fetch_array($sqlorder)){
$pdf->SetX(5);
$pdf->Cell(8,5,$i,'B',0,'L'); 
$pdf->Cell(30,5,$order['KODE_BOOKING'],'B',0,'L'); 
$pdf->Cell(28,5,$order['NAMA_PELANGGAN'],'B',0,'L'); 
$pdf->Cell(21,5,$order['WA_PELANGGAN'],'B',0,'L'); 
$pdf->Cell(35,5,$order['ALAMAT_PELANGGAN'],'B',0,'L'); 
$pdf->Cell(30,5,$order['NAMA_MOBIL'],'B',0,'L'); 
$pdf->Cell(20,5,$order['NOMOR_POLISI'],'B',0,'L'); 
$pdf->Cell(25,5,$order['KELUHAN'],'B',0,'L'); 
$pdf->Cell(30,5,$order['TANGGAL_DATANG'].' '.$order['JAM_DATANG'],'B',0,'C'); 
$pdf->Cell(15,5,$order['USER_PROSES'],'B',0,'L'); 
$pdf->Cell(30,5,$order['WAKTU_PROSES'],'B',0,'C'); 
$pdf->Cell(21,5,$order['USER_SELESAI'],'B',0,'L'); 
$pdf->Cell(30,5,$order['WAKTU_SELESAI'],'B',0,'C'); 
if($order['USER_PROSES']=='' && $order['USER_SELESAI']==''):
$pdf->Cell(23,5,'PENDING','B',1,'L'); 
elseif($order['USER_PROSES']!='' && $order['USER_SELESAI']==''):
$pdf->Cell(23,5,'ON PROC','B',1,'L'); 
elseif($order['USER_PROSES']!='' && $order['USER_SELESAI']!=''):
$pdf->Cell(23,5,'SELESAI','B',1,'L'); 

endif; 

$i++;
	 
	 }

	 
	 

//Menutup dokumen dan dikirim ke browser


$pdf->Output('Laporan Booking Service Online.pdf','I');


?>