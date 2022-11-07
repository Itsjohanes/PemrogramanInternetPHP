<?php
$servername = "localhost";
$username = "root";
$password = "";
$namadb = "hewan";
$conn = new mysqli($servername,$username,$password,$namadb);
if(!$conn)
{
    die("koneksi anda gagal".$conn->connect_error());

}
?>