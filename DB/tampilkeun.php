<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href = "add.php">add keun</a>
 

<table border = "10px">
    <thead>
    <tr>
        <th>id</th>
        <th>nim</th>
        <th>nama</th>
        <th> aksi </th>
    </tr>

    </thead>
   
    <tbody>
    <?php
    include ('dbconn.php');
    $tampilkan = "SELECT * FROM maba";
    $hubungkan= $conn->query($tampilkan);
    
    while($row = $hubungkan->fetch_assoc())
    {

    
    ?>
    <tr>
   
        <td><?php echo $row["ID"]; ?> </td>
        <td><?php echo $row["nim"]; ?> </td>
        <td><?php echo $row["nama"]; ?> </td>
        <td><a  href = "hapus.php?id=<?php echo $row["ID"];?>" onclick = "return confirm('delete?')"> delete? </a> </td>
        <td><a href = "edit.php?id=<?php echo $row["ID"];?>">EDIT  </a> <td> 
    </tr>
    <?php
    }
    ?>
    </tbody>
    </table>
</body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
</html>