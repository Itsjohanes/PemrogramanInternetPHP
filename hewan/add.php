<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
include ('dbconn.php');
$nama = $kelamin = "";
    $namaerr = $kelaminerr = "";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    

    if(!empty($_POST["nama"]))
    {
        $nama = testing($_POST["nama"]);
        if(!preg_match("/^[a-zA-Z-' ]*$/",$nama))
        {
                $namaerr = "error tipe";
        }
        

    }else
    {
        $namaerr = "error kosong";
    }
    if(!empty($_POST["kelamin"]))
    {
        $kelamin = testing($_POST["kelamin"]);

    }else
    {
        $kelaminer = "kosong";
    }
    $insert = "INSERT INTO hewan (nama,kelamin) VALUE ('$nama','$kelamin')";
    if(!empty($nama) and !empty($kelamin) and empty($kelaminerr) and empty($namaerr))
    {
        if($conn->query($insert) == "TRUE")
          {
            echo "<script>alert('Data Berhasil Ditambah');window.location='index.php';</script>";

          }
        


       

          
    
          
    

              
          
          $conn->close();

    }


}
function testing($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}
?>
<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "POST">
Nama : <?php echo $namaerr ?>; </br>
<input type = "text" name = "nama" value = "<?php echo $nama; ?>"> 
kelamin : </br> <?php echo $kelaminerr ?>;
<select name = "kelamin"> 
<option value = "laki"  >Laki-laki </option> 
<option value = "perempuan"  >perempuan</option>

</select>
<input type = "submit" value = "submit">
</form>
</body>
</html>