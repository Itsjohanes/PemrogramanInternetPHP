<?php
include ('makedb.php');
$conn = new mysqli($servername,$username,$password,"arai");
$buattable = "CREATE TABLE arai(
    id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    hobi VARCHAR(100) NOT NULL
    )";
$membuat = $conn->query($buattable);
?>