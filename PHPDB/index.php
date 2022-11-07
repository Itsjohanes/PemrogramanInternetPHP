<?php
$servername = "localhost";
$username = "root";
$password = "";

$sql = "CREATE DATABASE konz";
$conn = mysqli_connect($servername,$username,$password,'konz');
$tabel = "CREATE table MAHASISWA
(
   NIM                  char(8)   ,
   NAMA                 char(40)   ,
   EMAIL                char(100)  ,
   ALAMAT               TEXT   ,
   JENIS_KELAMIN        char(10)  ,
   primary key (NIM)
)";
$QUER = mysqli_query($conn,$tabel);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Tabel</title>
</head>
<body>
<a href = "ADD.php">Input</a>
</body>
</html>