<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form untuk menampilkan</title>
</head>
<body>
<?php
include ('dbconn.php');
$sql_select = "SELECT *  FROM mhs";
$result = mysqli_query($koneksibaru,$sql_select);
if($result->num_rows > 0)
{
?>

<table>
    <thead>
<tr>
<th>No </th>
<th>Nim </th>
<th>nama </th>
<th> kelamin <th>
</tr> 
</thead>
<tbody>
<?php
$i = 0;
while($row = $result->fetch_assoc())
{
   $i++;

?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row["nim"]; ?> </td>
<td><?php echo $row["nama"]; ?> </td>
<td><?php echo $row["kelamin"]; ?> </td>
<td><a href = "delete.php?id=<?php echo $row["id"];?>" onclick="confirm('yakin?')"> Hapus </a>
<td> <a href = "update.php?id=<?php echo $row["id"];?>"> edit </a>


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