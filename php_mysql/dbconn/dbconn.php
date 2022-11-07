<?php
$namaserver = "localhost";
$username = "root";
$password = "";
$namadb = "tamu"; 

//Membuat koneksi
$conn = new mysqli($namaserver,$username,$password,$namadb);

//Mencek Koneksi
if(!$conn)
{
    die("Koneksi gagal : " . $conn->connect_error);
}

?>