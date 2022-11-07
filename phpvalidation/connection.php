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
<?php
$nameerr = "";
$emailerr = "";
$name = "";
$email = "";


    if(empty($_POST["name"]))
    {
        $nameerr = "Name is Required";
    }else
    {
        $name = $_POST["name"];

    }
    if(empty($_POST["email"]))
    {
        $emailerr = "Email is required";

    }else
    {
        $email = $_POST["email"];
    }

?>

<p>  <span class = "error">  <? echo $namerr ?>  </span> </p>
<p>   <? echo $name; ?></p>
<p><span class  = "error"> <?php echo $emailerr ?> </span> </p>
<p> <?php  $email; ?> </p>

</body>
</html>