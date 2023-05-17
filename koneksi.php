<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "barang_it";

$con = mysqli_connect($servername, $username, $password, $dbname);
  if($con){
   echo "";
    }else{
        echo "koneksi gagal";
    }
?>
