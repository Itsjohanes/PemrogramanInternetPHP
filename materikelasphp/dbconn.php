<?php
$servername = "localhost";
$username = "root";
$password = "";
$namadb = "tamu";

// Create connection
$conn = new mysqli($servername, $username, $password,$namadb);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . mysqli_connect_error());
}else
{
    echo "Connected successfully";
}
if(!$conn)
