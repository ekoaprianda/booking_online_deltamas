<!DOCTYPE html>
<html>
<title>Deltamas Booking Service</title>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="libs/css/bootstrap.v3.3.6.css">
	<script type="text/javascript" src="assets/signature.js"></script>




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
<p>Jl. Balai Kota No. 2A</p>
<h3> Booking Service Online</h3></center>


<form method="post"  name="simpanbooking" action="save_booking.php"  >

<label for="NAMA_PELANGGAN">Nama Lengkap</label>
<input  type="text" name="NAMA_PELANGGAN" autofocus  placeholder="Nama lengkap anda" required ><br/>

<label for="ALAMAT_PELANGGAN">Alamat Lengkap</label>
<input  type="text" name="ALAMAT_PELANGGAN" autofocus  placeholder="Contoh: Jl. Balai Kota No. 2A Medan"  required ><br/>

<label for="WA_PELANGGAN">No WhatsApp</label>
<input  type="text" name="WA_PELANGGAN" autofocus  placeholder="Contoh: 082123456789" required ><br/>

<label for="NAMA_MOBIL">Nama / Tipe Mobil</label>
<input  type="text" name="NAMA_MOBIL" autofocus  placeholder="Contoh: Kijang Innova Reborn Tahun 2022"required ><br/>

<label for="NOMOR_POLISI">Nomor Polisi</label>
<input  type="text" name="NOMOR_POLISI" autofocus  placeholder="Contoh: BK 1234 AA" required ><br/>

<label for="KELUHAN">Keluhan / Kerusakan</label>
<textarea name="KELUHAN" cols="40" rows="5" placeholder="Contoh: Mesin Kasar" required></textarea><br/>

<label for="RENCANA_SERVICE">Rencana Service</label><br>
<label for="TANGGAL_DATANG">Tanggal</label><input type="text" placeholder="Klik 2x Untuk Pilih Tanggal" onBlur="this.type='text'" onclick="this.type='date'" required name="TANGGAL_DATANG">
<label for="JAM_DATANG">Jam</label><input type="text" placeholder="Klik 2x Untuk Pilih Jam" onBlur="this.type='text'" onclick="this.type='time';this.click='click'"  required name="JAM_DATANG"><br><br>

<button type="submit" id="save_btn" class="btn btn-success btn-lg" data-action="save-png"><span class="glyphicon glyphicon-hand-up"></span> Booking Service</button>
<br><br><br>
<center>&copy;Eko Aprianda 2023


        </form>

 </div>      
 
</body>