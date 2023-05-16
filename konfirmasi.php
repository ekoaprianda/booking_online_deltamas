<!DOCTYPE html>
<html>
<title>Konfirmasi Booking Service</title>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="libs/css/bootstrap.v3.3.6.css">

    <script src="script/qrcode.js" type="text/javascript"></script>




        <style>
input[type=text],input[type=date],input[type=time], select,textarea {
  width: 100%;
  padding: 12px 20px;
  margin: 1px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
		body{
		padding: 15px;
		background-color:#FFC;
		}
		#note{position:absolute;left:50px;top:35px;padding:0px;margin:0px;cursor:default;}


</style>
    </head>
   
  <body>  

  
<div>
<center><p style="font-size:xx-large; font-weight:bold;"><img src="Toyota.png" style="width:15%;">Deltamas Medan</p>
<h3> Booking Service Online</h3>
<h4>Silahkan Screen Shoot Halaman Ini</h4></center>


<?php

 include "koneksi.php";
$KODE_BOOKING=$_GET['KODE_BOOKING'];
require_once("phpqrcode/qrlib.php");
QRcode::png("$KODE_BOOKING","img/$KODE_BOOKING.png");
$sqllihat=mysqli_query($con,"select* from ORDER_IN where KODE_BOOKING='$KODE_BOOKING' ");
	$tampil=mysqli_fetch_array($sqllihat);
?>
<center> <img src="img/<?php echo"$KODE_BOOKING.png"; ?>" style="width:60%"><br>
<table >
<tr style="font-size:large;vertical-align:top;border-bottom:1px solid black; font-weight:bold;"><td width="150">Kode Booking </td><td>: <?php echo $tampil['KODE_BOOKING'];?> </td></tr>
<tr style="font-size:large;vertical-align:top;border-bottom:1px solid black; font-weight:bold;"><td>Atas Nama </td><td>: <?php echo $tampil['NAMA_PELANGGAN'];?> </td></tr>
<tr style="font-size:large; vertical-align:top;border-bottom:1px solid black; font-weight:bold;"><td>Alamat </td><td>: <?php echo $tampil['ALAMAT_PELANGGAN'];?> </td></tr>
<tr style="font-size:large;vertical-align:top;border-bottom:1px solid black; font-weight:bold;"><td>Nama / Type Mobil </td><td>: <?php echo $tampil['NAMA_MOBIL'];?> </td></tr>
<tr style="font-size:large;vertical-align:top; border-bottom:1px solid black;font-weight:bold;"><td>Nomor Polisi </td><td>: <?php echo $tampil['NOMOR_POLISI'];?> </td></tr>
<tr style="font-size:large;vertical-align:top;border-bottom:1px solid black; font-weight:bold;"><td>Keluhan / Kerusakan </td><td>: <?php echo $tampil['KELUHAN'];?> </td></tr>
<tr style="font-size:large;vertical-align:top;border-bottom:1px solid black; font-weight:bold;"><td>Rencana Service  </td><td>: <?php echo $tampil['TANGGAL_DATANG'];?>    <?php echo $tampil['JAM_DATANG'];?> </td></tr>
<tr style="font-size:large; border:1px solid black; font-weight:bold;"><td colspan="2"><center>Costumer Service Kami Akan Segera Menghubungi Anda Via WhatsApp</td></tr>
</table>





 </div>      
 
</body>

<?php

//hapus barcode
//$target="$KODE_BOOKING.png";
//unlink($target);

?>