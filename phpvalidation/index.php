<!DOCTYPE html> 
<html>
<head>
<style>
.error{color :red};
</style>
<title>
</title>
</head>
<body>
<form action = "connection.php" method = "post">
<input type  = "text" name = "name"> <br>
<input type  = "email" name = "email"> <br>
<input type = "submit" value = "submit">
<?php
$hari = date("l");
echo $hari;
?>

</form>

</body>
</html>