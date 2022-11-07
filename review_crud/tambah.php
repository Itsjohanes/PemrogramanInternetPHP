
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form tambah</title>
    <style>
        .error
        {
            color:red;
        }
    </style>
</head>
<body>
<?php
include ('dbconn.php');
$namaerr = $kelaminerr = $nimerr = "";
$nama = $kelamin = $nim = "";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST["nama"]))
    {
        $namaerr = "ISIKAN NAMA ANDA";
    }else
    {
        $nama = test_input($_POST["nama"]);
        if(!preg_match("/^[a-zA-Z-' ]*$/",$nama))
        {
            $namaerr = "format nama tidak sesuai";
        }

    }
    if(empty($_POST["kelamin"]))
    {
        $kelaminerr = "isi kelamin dulu";
    }else
    {
        $kelamin = test_input($_POST["kelamin"]);
    }
    if(empty($_POST["nim"]))
    {
        $nimerr = "isi nim dulu";
    }else
    {
        $nim = test_input($_POST["nim"]);
        if(!preg_match("/^[0-9]{7}$/",$nim))
        {
            $nimerr = "isikan nim dgn benar";
        }
    }
   
}
function test_input($data)
{
    $data = trim($data);
    $data  = stripslashes($data);
    $data = htmlspecialchars($data);
return $data;
}
$insertketabel = "INSERT INTO mhs (nama,kelamin,nim) VALUES ('$nama','$kelamin','$nim')";
if(!empty($nim) and !empty($nama) and !empty($kelamin) and empty($nimerr) and empty($namaerr) and empty($kelaminerr))
{ 
    $koneksibaru->query($insertketabel);
    header("location: formtampilan.php");
   
}

$koneksibaru->close();

?>

<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
Nama : <input type = "text" name = "nama" value = "<?php echo $nama;?>"> <span class = "error"> * <?php echo $namaerr; ?> </span> </br>
Kelamin: </br><span class = "error"> * <?php echo $kelaminerr ?> </span>

<input type = "radio" value = "laki-laki" name = "kelamin" <?php if(isset($kelamin) && $kelamin == "laki-laki"){echo "checked";} ?> > Laki-laki 
<input type = "radio" value = "perempuan" name = "kelamin" <?php if(isset($kelamin) && $kelamin == "perempuan"){echo "checked";} ?> > Perempuan
<br>
NIM : <BR> <input type = "text" name = "nim" value = "<?php echo $nim; ?>"> <span class = "error"> * <?php echo $nimerr;?> </span> <br>
<button type = "submit" value = "submit"> Button anjay </button>
</form>
</body>
</html>