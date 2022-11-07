<?php
$servername = "localhost";
$username = "root";
$password = "";
$namadb = "myDBS";

// Create connection
$conn = mysqli_connect ($servername, $username, $password,$namadb);
$sql = "CREATE TABLE tamu(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname  VARCHAR(30) NOT NULL,
    email VARCHAR(50),
)";
if(mysqli_query($conn,$sql))
{
    echo "tabel berhasil";
}