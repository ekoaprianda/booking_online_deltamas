<?php
 include "koneksi.php";
$KODE_BOOKING=$_GET['KODE_BOOKING'];



$sql="update ORDER_IN set USER_PROSES='ADMIN', WAKTU_PROSES=CURRENT_TIMESTAMP() where KODE_BOOKING='$KODE_BOOKING'"; 
$query=mysqli_query($con,$sql);

if($query){
	
		echo("
		<script language=\"javascript\">
		window.alert(\"Berhasil Proses\");
		window.location.href=\"proses.php\";
		
		</script>
		");
		
		} 
			
			else{
				echo("
			<script language=\"javascript\">
			
			window.alert(\"GAGAL\");
			window.location.href=\"proses.php\";
			</script>");
				
				}
	 
?>