<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE  MyGuests SET lastname = 'LOL' WHERE id = 2";
if(mysqli_query($conn,$sql))
{
    echo "berhasil ubah";
}else
{
    echo "gagal ubah ";
}



mysqli_close($conn);
?>