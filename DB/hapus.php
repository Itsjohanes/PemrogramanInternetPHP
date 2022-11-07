<?php
include("dbconn.php");
$id_delete = $_GET["id"];
$delete = "DELETE from maba where ID = '$id_delete'";
$deletequery = $conn->query($delete);
$conn->close();

header("location:tampilkeun.php");
echo "<script> window.alert('delete berhasil'); window.location.href = 'tampilkeun.php'; <script>";



?>