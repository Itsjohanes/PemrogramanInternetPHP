<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "konz";
$conn = mysqli_connect($servername,$username,$password,$db);
$sql = "SELECT *  FROM mahasiswa";
$konz = mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel = "Stylesheet" href = "style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class = "formulir">
    <p>Tampilkan Data</p>
    <center>
    <table width  = '100 % ' border = 1>
    <tr>
     <th>NIM</th> <th>Nama</th> <th>Alamat</th> <th>Email</th ><th>Kelamin</th>
    </tr>
    <?php
    while($konzz = mysqli_fetch_array($konz))
    {
        echo "<tr>";
        echo "<td>".$konzz['NIM']. "</td>";
        echo "<td>".$konzz['NAMA']."</td>";
        echo "<td>".$konzz['ALAMAT']."</td>";
        echo "<td>".$konzz['EMAIL']."</td>";
        echo "<td>".$konzz['JENIS_KELAMIN']."</td>";
        echo "<td><a href='edit.php?id=$konzz[NIM]'>Edit</a> | <a href='delete.php?id=$konzz[NIM]'>Delete</a></td></tr>";        
        echo "</tr>";
    }
    ?>
    </center>
    
</table>
<a href = "ADD.php">Kembali ke Tambah Data </a>
</div>

</body>
</html>