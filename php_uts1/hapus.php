<?php
    // Memanggil file koneksi db
	include('dbconn/dbconn.php');
	$id = $_GET["id"];
    $hapus = "DELETE from transaksi where id = '$id'";
    $conn->query($hapus);
    header("location: index.php");
?>