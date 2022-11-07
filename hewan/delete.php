<?php
include ('dbconn.php');
$ids = $_GET["id"];
$delete = "DELETE FROM hewan where id = '$ids'";
$conn->query($delete);
Header('location:index.php');
?>