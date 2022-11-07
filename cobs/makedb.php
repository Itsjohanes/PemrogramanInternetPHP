<?php
$servername = "localhost";
$username = "root";
$password = "";
$koneksi = new mysqli($servername,$username,$password);
$create = "CREATE DATABASE arai";
$koneksi->query($create);

?>