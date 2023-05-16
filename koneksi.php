<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ORDER_IN";

$con = mysqli_connect($servername, $username, $password, $dbname);
  if($con){
   echo "berhasil";
    }else{
        echo "koneksi internet gagal";
    }
?>