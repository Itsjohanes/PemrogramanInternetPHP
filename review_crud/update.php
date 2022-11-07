
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


if(!empty($nim) and !empty($nama) and !empty($kelamin) and empty($nimerr) and empty($namaerr) and empty($kelaminerr))
{ 
    $id_asw = $_POST["id"];
     $updateketabel = "UPDATE mhs SET  nim = '$nim', nama = '$nama', kelamin = '$kelamin'  WHERE id = '$id_asw'";
    $koneksibaru->query($updateketabel);
    header("location: formtampilan.php");
    $koneksibaru->close();
   
}



?>
<?php
if(isset($_GET["id"]) && !empty($_GET["id"]))
{
    $id_mhs = $_GET["id"];
}else
{
    $id_mhs = $_POST["id"];
}
$sql_select = "SELECT * FROM mhs WHERE id = '$id_mhs'";
$result = $koneksibaru->query($sql_select);
while($row = $result->fetch_assoc())
{




?>

<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
Nama : <input type = "text" name = "nama" value = "<?php echo $row["nama"];?>"> <span class = "error"> * <?php echo $namaerr; ?> </span> </br>
Kelamin: </br><span class = "error"> * <?php echo $kelaminerr;?> </span>

<input type = "radio" value = "laki-laki" name = "kelamin" <?php if ( $row["kelamin"] == "laki-laki"){echo "checked";} ?> > Laki-laki 
<input type = "radio" value = "perempuan" name = "kelamin" <?php if(  $row["kelamin"] == "perempuan"){echo "checked";} ?> > Perempuan
<br>
NIM : <BR> <input type = "text" name = "nim" value = "<?php echo $row['nim']; ?>"> <span class = "error"> * <?php echo $nimerr;?> </span> <br>
<input type =  "hidden" name = "id" value = "<?php echo $row["id"]; ?>">
<button type = "submit" value = "submit"> UBAH </button>
</form>
<?php
}
?>
</body>
</html>