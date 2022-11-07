<?php
$namaserver = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($namaserver,$username,$password);
$created = "CREATE DATABASE mahasiswa";
$koneksi = mysqli_query($conn,$created);
?>