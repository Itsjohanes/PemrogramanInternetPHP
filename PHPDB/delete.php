<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername,$username,$password,'konz');
$NIM = $_GET['id'];
$hapus = "DELETE FROM Mahasiswa  WHERE NIM= $NIM";
$result = mysqli_query($conn, $hapus );
if($result)
{
    echo "data Berhasil dihapus";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus</title>
</head>
<body>
    <a href = "tampilkan.php">kembali ke menu tampilan </a>
</body>
</html>