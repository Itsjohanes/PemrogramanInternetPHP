<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add baru</title>
    <style>
        .error 
        {
            color: red;
        }
        </style>
</head>
<body>
<?php
include ('dbconn.php');
$nim = $nama = "";
$nimerr = $namaerr = "";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST["nim"]))
    {
        $nimerr = "Masukan nim";

    }else
    {
        $nim = test_input($_POST["nim"]);
        if(!preg_match("/^[0-9]{7}$/",$nim))
        {
            $nimerr = "G SESUAI";
        }

        
    }
    if(empty($_POST["nama"]))
    {
        $namaerr = "masukan nama";
    }else
    {
        $nama = test_input($_POST["nama"]);
        if(!preg_match("/^[a-zA-Z-' ]*$/",$nama))
        {
            $namaerr = "salah goblok";

        }
    }
$masukandata = "INSERT into maba (nim,nama) value ('$nim','$nama')";
if(!empty($nama) and !empty($nim) and empty($nimerr) and empty($namaerr))
{
    $inputkeun = $conn->query($masukandata);
    echo "data masuk";
    $conn->close();
    header("location: tampilkeun.php");

}


    
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    
}















?>
<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
NIM : <input type = "text" name = "nim" value = "<?php echo $nim; ?>" >  <span class = "error"> * <?php echo $nimerr; ?>  </span> <br>
NAMA : <input type  = "text" name = "nama" value = "<?php echo $nama; ?>">  <span class = "error"> * <?php echo $namaerr; ?>  </span> <br>
<input type  = "submit" value = "submit">
</form>
</body>
</html>