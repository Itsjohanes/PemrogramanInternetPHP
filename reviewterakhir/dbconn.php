<?php
 $servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername,$username,$password,"maha3");
if(!$conn)
{
    die("koneksi error".$conn->connect_error());
}

?>