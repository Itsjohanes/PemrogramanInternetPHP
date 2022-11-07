<?php
include ('dbconn.php');
$id = $_GET["id"];
$delete = "DELETE FROM maba3 WHERE id = '$id'";
$gas = $conn->query($delete);
Header("location:index.php");

?>