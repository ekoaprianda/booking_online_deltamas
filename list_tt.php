<meta name="viewport" content="width=device-width, initial-scale=1.0">

        
        <link rel="stylesheet" href="js-lib/jquery.signature.css" />
        <link rel="stylesheet" href="js-lib/jquery-ui.css" />
        <link rel="stylesheet" href="js-lib/jquery.signature.css" />
        
        <script src="js-lib/jquery.min.js" type="text/javascript" ></script>
        <script src="js-lib/jquery-ui.min.js" type="text/javascript" > </script>
        <script src="js-lib/jquery.signature.js" type="text/javascript" ></script>
        <script src="js-lib/jquery.ui.touch-punch.min.js" type="text/javascript" ></script>
        
        
        <!--[if IE]>
        <script type="text/javascript" src="js-lib/excanvas.js"></script>
        <![endif]-->
     
        
       
<?php

?>


<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
.ttd{ 
border:1px solid #ccc;
background-color:#FFF;
width:100px;
}

</style>

	 
<?php include("konekcloud.php");
$ID=$_GET['ID'];
$sql=mysqli_query($con,"select count(*) as JUMLAH from ABSENSI  where ID='$ID'");
$tampil1=mysqli_fetch_array($sql);
$jlh=$tampil1['JUMLAH'];
 
$sql1=mysqli_query($con,"select NAMA_KEGIATAN, WAKTU_KEGIATAN from AGENDA where ID='$ID'");
$tampil3=mysqli_fetch_array($sql1); 
$TANGGAL_KEGIATAN= date("d-m-Y",strtotime($tampil3['WAKTU_KEGIATAN']));
$HARI_KEGIATAN= date("l",strtotime($tampil3['WAKTU_KEGIATAN']));
$HARI="";
if($HARI_KEGIATAN=="Sunday"): $HARI="Minggu";
elseif($HARI_KEGIATAN=="Monday"): $HARI="Senin";
elseif($HARI_KEGIATAN=="Tuesday"): $HARI="Selasa";
elseif($HARI_KEGIATAN=="Wednesday"): $HARI="Rabu";
elseif($HARI_KEGIATAN=="Thrusday"): $HARI="Kamis";
elseif($HARI_KEGIATAN=="Friday"): $HARI="Jumat";
elseif($HARI_KEGIATAN=="Saturday"): $HARI="Sabtu";endif;
$JAM_KEGIATAN= date("H:i",strtotime($tampil3['WAKTU_KEGIATAN']));
?>
<title>Daftar Absensi Online <?php echo $tampil3['NAMA_KEGIATAN'] .' '. $tampil3['WAKTU_KEGIATAN'] ; ?></title>
</head>
<body>

<center>
<h3>Daftar Absensi Online <?php echo $tampil3['NAMA_KEGIATAN']?></h3>
<h4><?php echo $HARI.', '.$TANGGAL_KEGIATAN.' '.$JAM_KEGIATAN; ?></h4></center>
<h4>Jumlah : <?php echo $jlh ?> Orang</h4>
<table id="customers">
  <tr>
 <th width="30">No</th>
    <th >Nama</th>
    <th >Unit</th>
    <th width="80" >Cabang</th>
    <th >Jam Absen</th>
     <th>Tanda tangan</th>
   
  </tr>
  
 <?php
 include("konekcloud.php");
$sql=mysqli_query($con,"select * from ABSENSI where ID='$ID' order by WAKTU_TT ASC ");
$i=1;
while($tampil=mysqli_fetch_array($sql)){
echo("<tr><td>$i</td>");
echo("<td>$tampil[NAMA]</td>");
echo("<td>$tampil[UNIT]</td>");
echo("<td align=\"left\">$tampil[CABANG]</td>");
$tgl= date("d-m-Y H:i",strtotime($tampil['WAKTU_TT']));
echo("<td align=\"left\">$tgl</td>");
echo("<td align=\"left\"><img class=\"ttd\" src=\"$tampil[TT]\"> </td></tr>"); 
$i++;
}
?> 
</table>

</body>
</html>
