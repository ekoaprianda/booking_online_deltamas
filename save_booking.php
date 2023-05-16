<?php
 include "koneksi.php";
$NAMA_PELANGGAN=$_POST['NAMA_PELANGGAN'];
$ALAMAT_PELANGGAN=$_POST['ALAMAT_PELANGGAN'];
$WA_PELANGGAN=$_POST['WA_PELANGGAN'];
$NAMA_MOBIL=$_POST['NAMA_MOBIL'];
$NOMOR_POLISI=$_POST['NOMOR_POLISI'];
$KELUHAN=$_POST['KELUHAN'];
$TANGGAL_DATANG=$_POST['TANGGAL_DATANG'];
$JAM_DATANG=$_POST['JAM_DATANG'];



$sql="insert into ORDER_IN
 (KODE_BOOKING,NAMA_PELANGGAN,ALAMAT_PELANGGAN,WA_PELANGGAN,NAMA_MOBIL,NOMOR_POLISI,KELUHAN,TANGGAL_DATANG,JAM_DATANG,WAKTU) VALUES 
 (UUID_SHORT(),'$NAMA_PELANGGAN','$ALAMAT_PELANGGAN','$WA_PELANGGAN','$NAMA_MOBIL','$NOMOR_POLISI','$KELUHAN','$TANGGAL_DATANG','$JAM_DATANG', CURRENT_TIMESTAMP())"; 
$query=mysqli_query($con,$sql);

if($query){
	
	
$sqllihat=mysqli_query($con,"select* from ORDER_IN where NAMA_PELANGGAN='$NAMA_PELANGGAN' and ALAMAT_PELANGGAN='$ALAMAT_PELANGGAN'and NAMA_MOBIL='$NAMA_MOBIL' and NOMOR_POLISI='$NOMOR_POLISI' and KELUHAN='$KELUHAN' and TANGGAL_DATANG='$TANGGAL_DATANG' and JAM_DATANG='$JAM_DATANG' ");
	$tampil=mysqli_fetch_array($sqllihat);
		echo("
		<script language=\"javascript\">
		window.alert(\"Kode Booking anda adalah $tampil[KODE_BOOKING] Silahkan Lanjutkan Lalu Screen Shoot QR-Qode di halaman setelah ini\");
		window.location.href=\"konfirmasi.php?KODE_BOOKING=$tampil[KODE_BOOKING]\";
		
		</script>
		");
		
		} 
			
			else{
				echo("
			<script language=\"javascript\">
			
			window.alert(\"GAGAL\");
			//window.location.href=\"index.php\";
			</script>");
				
				}
	 
?>

