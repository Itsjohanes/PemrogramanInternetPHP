<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername,$username,$password);
$buatdb = "CREATE DATABASE konz";
$conn->query($buatdb);

?>