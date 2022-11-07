<?php
include ('MAKEDB.PHP');
$conn = new mysqli($servername,$username,$password,"maba");
$createtable = "CREATE TABLE maba(
    ID int(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(7) NOT NULL,
    nama VARCHAR(100) NOT NULL
    )";
$koneksikan = $conn->query($createtable);  
?>