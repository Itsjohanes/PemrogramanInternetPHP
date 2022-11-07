<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <a href = "add.php"> Tambah </a>
    <?php
    include ('dbconn.php');
    $sql_select = "SELECT * FROM arai";
    $result = $conn->query($sql_select);

    if($result->num_rows>0)
    {


    

    ?>
    <table>
    <thead>
    <tr>
        <th> NO </th>
        <th> hobi</th>
    </tr>
    </thead>
    <tbody>
    <?php 
    $i = 0;
    while($row = $result->fetch_assoc())
    {
        $i++;

    
    ?>
    <td><?php echo $i ;?> </td>
    <td><?php echo $row["hobi"]; ?> </td>
    <td><a href = "delete.php?id=<?php echo $row["id"]; ?>" onclick = "return confirm('yakin delete?')" > delete </a> </td>
    <td><a href = "edit.php?id=<?php echo $row["id"]; ?>" > edit </a> </td>
    </tbody>
    <?php
    }
    ?>
    </table>
<?php
    }
    else
    {
        echo "data anda kosong";
    } 
?>    
</body>

</html>