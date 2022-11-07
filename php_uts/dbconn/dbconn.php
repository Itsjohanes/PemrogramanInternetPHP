<?php
$namaserver = "localhost";
$username = "root";
$password = "";
$namadb = "my_resto"; 

include('makedb.php');
$conn = new mysqli($namaserver,$username,$password,$namadb);

//Mencek Koneksi
if(!$conn)
{
    die("Koneksi gagal : " . $conn->connect_error);
}
$buat = "CREATE TABLE transaksi(
    id int(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(250) NOT NULL,
    email VARCHAR(250) NOT NULL,
    nohp VARCHAR(12) NOT NULL,
    paket VARCHAR(250) NOT NULL,
    pembayaran VARCHAR(250) NOT NULL,
    total decimal(15,2) NOT NULL,
    tanggal date NOT NULL,
    alamat TEXT

    )";
$conn->query($buat);

?>