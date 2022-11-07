<?php
$servername = "localhost";
$username = "root";
$password = "";
$namadb = "time";
$conn = new mysqli($servername,$username,$password,$namadb);
if(!$conn)
{
    die("koneksi anda gagal".$conn->connect_error());

}
?>