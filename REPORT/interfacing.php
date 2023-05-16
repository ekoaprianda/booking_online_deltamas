<?php


session_start();
$cabang=$_SESSION['cabang'];
if ($_SESSION['isLoggedIn']!=1) {
echo("<script language=\"javascript\">
	window.alert(\"Silahkan Login\");
	window.location.href=\"../session_login\";
	</script>");}
	

$USER_ID =$_SESSION['USER_ID'];
include "..\koneksi\konekmachine.php";

$module_id='laporaninterfacing';
$query_cek_otoritas="SELECT MODULE_ID,TAMPIL from NEW_MODULE_USER where USER_ID='$USER_ID' and MODULE_ID='$module_id'";
$execute=sqlsrv_query($conn,$query_cek_otoritas) or die(sqlsrv_errors()); 
$cekotoritas=sqlsrv_fetch_array($execute);
if($cekotoritas['TAMPIL']==1):;
	else:echo "<script language=javascript>window.alert(\"Anda Tidak Punya Otoritas\")</script>";
		 echo "<script language=javascript>var prev=document.referrer; window.location.href=prev</script>"; endif; 

require 'cellfit.php';
$bulan_lab_num=$_GET['bulan_lab_num'];
$tahun_lab_num=substr($_GET['tahun'],3);
$tahun=$_GET['tahun'];

if($bulan_lab_num=='01'):$bulan='Januari';
elseif($bulan_lab_num=='02'):$bulan='Februari';
elseif($bulan_lab_num=='03'):$bulan='Maret';
elseif($bulan_lab_num=='04'):$bulan='April';
elseif($bulan_lab_num=='05'):$bulan='Mei';
elseif($bulan_lab_num=='06'):$bulan='Juni';
elseif($bulan_lab_num=='07'):$bulan='Juli';
elseif($bulan_lab_num=='08'):$bulan='Agustus';
elseif($bulan_lab_num=='09'):$bulan='September';
elseif($bulan_lab_num=='10'):$bulan='Oktober';
elseif($bulan_lab_num=='11'):$bulan='November';
elseif($bulan_lab_num=='12'):$bulan='Desember';
endif;


//Membuat file PDF
$pdf = new FPDF_CellFit('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true);
$pdf->SetTitle('Interfacing '.$bulan.' '.$tahun.' '.$cabang);
$pdf->SetFont('Times','B',14);

//Mencetak kalimat 






$pdf->Image("../image/$cabang/logo.png", 10, 5, 15, 15, "png"); 
$pdf->Cell(190,5,'Laporan Verifikasi dan Validasi Hasil Program',0,1,'C'); 		
$pdf->Ln(1);

$pdf->SetFont('Times','B',12); 
$pdf->Cell(190,5.7,'Periode : '.$bulan.' '.$tahun.'                Cabang : '.$cabang,0,1,'C'); 

$pdf->SetFont('Times','B',12);	 
$pdf->Cell(10,8,'No','TB',0,'L');
$pdf->Cell(22,8,'Kode Lab','TB',0,'L');
$pdf->Cell(25,8,'Tanggal','TB',0,'C');
$pdf->Cell(33,8,'Dikerjakan','TB',0,'C');
$pdf->Cell(33,8,'Diverifikasi','TB',0,'C');
$pdf->Cell(33,8,'Divalidasi','TB',0,'C');
$pdf->Cell(33,8,'Keterangan','TB',1,'C');
$substring_bulan="SUBSTRING(LAB_NUM, 7, 2)";
$substring_tahun="SUBSTRING(LAB_NUM, 9,1)";
//SUBSTRING(LAB_NUM, 7, 2)='$bulan_lab_num' and $substring_tahun='$tahun_lab_num'

$sqli="Select*from KODE_LAB where validated='Y' and SUBSTRING(LAB_NUM, 9, 2)='$tahun_lab_num' and SUBSTRING(LAB_NUM, 7, 2)='$bulan_lab_num' order by SUBSTRING(LAB_NUM, 5, 2),SUBSTRING(LAB_NUM, 7, 2) asc";
$query=sqlsrv_query($conn,$sqli);
$i=1; 
$pdf->SetFont('Times','',12);

while($data0=sqlsrv_fetch_array($query)){
$tgl=substr($data0['LAB_NUM'],4,2);
$bln=substr($data0['LAB_NUM'],6,2);
$pdf->CellFitScale(10,7,$i.'.',0,0,'L');
$pdf->CellFitScale(22,7,$data0['LAB_NUM'],0,0,'L');
$pdf->CellFitScale(25,7,$tgl.'-'.$bln.'-'.$tahun,0,0,'C');
$pdf->CellFitScale(33,7,$data0['USER_ID'],0,0,'L');
$pdf->CellFitScale(33,7,$data0['VERIF_BY'],0,0,'L');
$pdf->CellFitScale(33,7,$data0['VALIDATED_BY'],0,0,'L');
$pdf->CellFitScale(33,7,$data0['INFO'],0,1,'L');
$i++;
}

$query_hitung="SELECT count(*) from LAB_DATA_MACHINE.dbo.KODE_LAB where INFO='Valid' and validated='Y' and YEAR(TIME)='$tahun' and SUBSTRING(LAB_NUM, 7, 2)='$bulan_lab_num'";
$hitung=sqlsrv_query($conn,$query_hitung) or die(sqlsrv_errors());
$data_valid=sqlsrv_fetch_array($hitung);
$data_tidak_valid=($i-1)-$data_valid[0];
$jumlah=$i-1;
$data_valid=$data_valid[0];
$pencapaian= ($data_valid/$jumlah)*100 ;
$pdf->SetFont('Times','',12);
$pdf->Cell(190,5,'Jumlah Kode Lab : '.$jumlah,'T',1,'L');
$pdf->Cell(190,5,'Jumlah Kode Lab Valid : '.$data_valid,0,1,'L');
$pdf->Cell(190,5,'Jumlah Kode Lab Tidak Valid : '.$data_tidak_valid,0,1,'L');
$pdf->Cell(190,5,'Pencapaian : '.$pencapaian.'%',0,1,'L'); 
$pdf->Cell(190,5,'Dicetak Oleh : '.$USER_ID,'T',1,'L'); 	

 	

//Menutup dokumen dan dikirim ke browser

 sqlsrv_close($conn);
 ob_start();
$pdf->Output('Interfacing '.$bulan.' '.$tahun.' '.$cabang.'.pdf','I');


?>