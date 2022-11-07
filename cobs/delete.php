<?php
include ('dbconn.php');
$id = $_GET["id"];
$delete = "DELETE FROM arai WHERE id = '$id'";
$conn->query($delete);
Header("location:index.php");

?>