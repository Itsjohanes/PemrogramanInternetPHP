<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
$select = "";
$gana = "";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $select = $_POST["konz"];
    print_r($select);
    $gana = $_POST["lol"];
    echo $gana;
}
?>
<form method = "post" action  = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<input type = "checkbox" name = "konz[]" value = "i love u">I love u <br>
<input type = "checkbox" name = "konz[]" value = "i hate u">i hate u </br>

<select  name = "lol">
<option  value = "gans">gans
</option>
<option value = "gana">gana
</option>
</select>
<input type = "submit" value = "submit">


</form>


<body>
    
</body>
</html>