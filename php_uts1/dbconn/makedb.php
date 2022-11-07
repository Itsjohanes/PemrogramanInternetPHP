<?php
$servername  = "localhost";
$username = "root";
$password = "";
$koneksi = new mysqli($servername,$username,$password);
$makedb = "CREATE DATABASE my_resto";
$koneksiquery = $koneksi->query($makedb);
?>