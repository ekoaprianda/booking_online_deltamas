<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ORDER_IN";

$con = mysqli_connect($servername, $username, $password, $dbname);
  if($con){
   echo "";
    }else{
        echo "koneksi gagal";
    }
?>
