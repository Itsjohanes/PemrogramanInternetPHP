
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
$idedit = $_POST['id'];
$editdata = "UPDATE maba SET nim = '$nim' , nama = '$nama' where ID = '$idedit'";
if(!empty($nama) and !empty($nim) and empty($nimerr) and empty($namaerr))
{
    $editkeun = $conn->query($editdata);
    echo "data masuk";

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
<?php
if(isset($_GET['id']) and !empty($_GET['id']))
{
    $id = $_GET['id'];

}else
{
    $id = $_POST['id'];
}
$buka = "SELECT * from maba where id = '$id'";
$querkeun = $conn->query($buka);
while($row = $querkeun->fetch_assoc())
{
?>

<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
NIM : <input type = "text" name = "nim" value = "<?php echo $row["nim"]; ?>" >  <span class = "error"> * <?php echo $nimerr; ?>  </span> <br>
NAMA : <input type  = "text" name = "nama" value = "<?php echo $row["nama"]; ?>">  <span class = "error"> * <?php echo $namaerr; ?>  </span> <br>
<input type = "hidden" name = "id" value = "<?php echo $row["ID"]; ?>">
<input type  = "submit" value = "submit">
</form>
<?php
}
?>
</body>
</html>