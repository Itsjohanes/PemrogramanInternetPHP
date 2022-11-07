<?php
$servername = "localhost";
$username = "root";
$password = "";
$buatkoneksi = new mysqli($servername,$username,$password);
$buatdb = "CREATE DATABASE maba";
$sambung = $buatkoneksi->query($buatdb);
?>