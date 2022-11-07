<?php
$namaserver = "localhost";
$username = "root";
$password = "";
$koneksi = mysqli_connect($namaserver,$username,$password);
$makedb = "CREATE DATABASE  mahasiswa";
$buatkoneksi = mysqli_query($koneksi,$makedb);


?>