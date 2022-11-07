<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href = "add.php">tambah data </a>
<?php
     include ('dbconn.php');
    $select = "SELECT * from hewan";
    $lihat = $conn->query($select);
    if($lihat->num_rows > 0)
    {
 ?>
    <table>
    <thead>
    <tr>
    <th>no</th>
    <th>nama</th>
    <th>kelamin</th>
    </tr>
    </thead>
    <tbody>
    <?php
    
    $i = 0;
    while($row = $lihat->fetch_assoc())
    {
        $i++;



    
    ?>
   <tr>
    <td> <?php echo $i; ?> </td>
    <td> <?php echo $row["nama"];?> </td>
    <td> <?php echo $row["kelamin"];?> </td>
    <td> <a href = "delete.php?id=<?php echo $row["id"];?>" onclick = "return confirm('yakin hapus?')"> Delete </a> </td>
    <td> <a href = "edit.php?id=<?php echo $row["id"];?>" > edit </a> </td>

    </tr>
    <?php
        }
        ?>
    </tbody>
    
   
    </table>
<?php
}else
{
    echo "kosong";
}
?>
</body>
</html>