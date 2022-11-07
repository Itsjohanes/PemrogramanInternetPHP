<?php
$servername = "localhost";
$username = "root";
$password = "";
$namadb = "password";
$newdb = new mysqli($servername,$username,$password,$namadb);
$user = $_POST['username'];
$pass = $_POST['password'];
$insert = "INSERT INTO password (username,password) VALUE ('$user','$pass')";
$newdb->query($insert);
header("location : index.php");
?>
