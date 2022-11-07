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
    $iddata = $_POST["id"];
    $update = "UPDATE hewan SET nama = '$nama', kelamin = '$kelamin' where id = $iddata" ;
    if(!empty($nama) and !empty($kelamin) and empty($kelaminerr) and empty($namaerr))
    {
          if($conn->query($update) == "TRUE")
          {
            echo "<script>alert('Data Berhasil diedit');window.location='index.php';</script>";

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
<?php
if(!empty($_GET["id"]))
{
    $idx = $_GET["id"];
}else
{
    $idx = $_POST["id"];
}
$update = "SELECT * from hewan where id = '$idx'";
$kuer = $conn->query($update);
while($row = $kuer->fetch_assoc())
{
?>
<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "POST">
Nama : <?php echo $namaerr ?>; </br>
<input type = "text" name = "nama" value = "<?php echo $row["nama"]; ?>"> 
kelamin : </br> <?php echo $kelaminerr ?>; "<?php echo 'yg dipilih'.$row["kelamin"];  ?>
<select name = "kelamin"> 
<option value = "laki"  >Laki-laki </option> 
<option value = "perempuan"  >perempuan</option> 

</select>
<input type = "hidden" name = "id" value = "<?php echo $row["id"]; ?>">
<input type = "submit" value = "submit">
</form>
<?php
}
?>
</body>
</html>