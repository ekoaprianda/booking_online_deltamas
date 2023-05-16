<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="libs/css/bootstrap.v3.3.6.css">

<title>Proses Booking</title>
</head>
<style>
.tblctk {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;

  background-color:#fff;
  font-size:14px;
  
}

.tblctk td, .tblctk th {
  border: 1px solid #ddd;
  padding: 5px;
}

.tblctk tr:nth-child(even){background-color: #f2f2f2;}

.tblctk tr:hover {background-color: #ddd;}

.tblctk th {
  padding-top: 5px;
  padding-bottom: 5px;
  text-align: center;
  background-color: #04AA6D;
  color: white;
}

</style>
<body style="padding:10px;"><div style="float:left;">
<center><h3>Proses Booking Service Online Toyota Deltamas Medan</h3></center></div>
<div style="float:right;">
<a  href="http://ekoaprianda.skom.id/laporan_booking_online.php " target="_blank" class="btn btn-warning" >Cetak Laporan</button></a>
</a></div>
<table class="tblctk"align="center"border="1" >
<tr>
<th>No</th>
<th>Kode Booking</th>
<th>Nama Pelanggan</th>
<th>No. WA Pelanggan</th>
<th>Alamat Pelanggan</th>
<th>Nama Mobil</th>
<th>Nomor Polisi</th>
<th>Keluhan</th>
<th>Waktu Rencana Datang</th>
<th>Diproses Oleh</th>
<th>Waktu Proses</th>
<th>Diselesaikan Oleh</th>
<th>Waktu Selesai</th>
<th>Keterangan</th>
<th>Opsi</th>
</tr>
<?php
include 'koneksi.php';
$sqllihat=mysqli_query($con,"select* from ORDER_IN order by WAKTU asc ");
$i=1;
	while($tampil=mysqli_fetch_array($sqllihat)){
	echo "<tr><td>$i</td><td>$tampil[KODE_BOOKING]</td>
	<td>$tampil[NAMA_PELANGGAN]</td>
	<td>$tampil[WA_PELANGGAN]</td>
	<td>$tampil[ALAMAT_PELANGGAN]</td>
	<td>$tampil[NAMA_MOBIL]</td>
	<td>$tampil[NOMOR_POLISI]</td>
	<td>$tampil[KELUHAN]</td>
	<td>$tampil[TANGGAL_DATANG] $tampil[JAM_DATANG]</td>
	<td>$tampil[USER_PROSES]</td>
	<td>$tampil[WAKTU_PROSES]</td>
	<td>$tampil[USER_SELESAI]</td>
	<td>$tampil[WAKTU_SELESAI]</td>
	<td>$tampil[KETERANGAN]<br>";
	if($tampil['USER_SELESAI']!='' && $tampil['USER_PROSES']!=''):
		echo "Service Sudah Selesai</td>";
		elseif($tampil['USER_SELESAI']=='' && $tampil['USER_PROSES']!=''):
		echo "Service Sudah Diproses</td>";
		elseif($tampil['USER_SELESAI']=='' && $tampil['USER_PROSES']==''):
		echo "Belum Ada Penanganan</td>";endif;
		
	echo "<td><a href=\"http://wa.me/$tampil[WA_PELANGGAN]\" target=\"_BLANK\" class=\"btn btn-success\" >Hub. WA</button></a>";
	
	if($tampil['USER_PROSES']==''):	
	echo"<a href=\"simpan_proses.php?KODE_BOOKING=$tampil[KODE_BOOKING]\" class=\"btn btn-primary\" >Proses</button></a>";
	elseif($tampil['USER_PROSES']!=''):	
	echo"<a href=\"simpan_proses.php?KODE_BOOKING=$tampil[KODE_BOOKING]\" style=\"display:none\" class=\"btn btn-primary\" >Proses</button></a>";
	endif;
	
	
	if($tampil['USER_PROSES']==''):
	 echo "<a href=\"simpan_selesai.php?KODE_BOOKING=$tampil[KODE_BOOKING]\" style=\"display:none\" class=\"btn btn-warning\" >Selesaikan</button></a></td>";
	 elseif($tampil['USER_PROSES']!='' && $tampil['USER_SELESAI']==''):
	echo "<a href=\"simpan_selesai.php?KODE_BOOKING=$tampil[KODE_BOOKING]\" class=\"btn btn-warning\" >Selesaikan</button></a></td>";
	
	elseif($tampil['USER_SELESAI']!='' && $tampil['USER_PROSES']!=''):
	echo "<a href=\"simpan_selesai.php?KODE_BOOKING=$tampil[KODE_BOOKING]\" style=\"display:none;\" class=\"btn btn-warning\" >Selesaikan</button></a></td>";
	endif;
	

	
	
	echo "</tr>";
	$i++;
		
		
	}


?>



</body>
</html>