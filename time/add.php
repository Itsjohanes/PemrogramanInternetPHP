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
$nama = "";
$namaerr = "";
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
    $insert = "INSERT INTO time (nama) VALUE ('$nama')";
    if(!empty($nama))
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

<input type = "submit" value = "submit">
</form>
</body>
</html>