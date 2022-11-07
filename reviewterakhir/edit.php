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
    $nim = $nama = $alamat = $kelamin = $ids = "";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        if(!empty($_POST["nim"]))
        {
            $nim = $_POST["nim"];
        }
        if(!empty($_POST["nama"]))
        {
            $nama = test_input($_POST["nama"]);
        }
        if(!empty($_POST["alamat"]))
        {
            $alamat = test_input($_POST["alamat"]);
        }
        if(!empty($_POST["kelamin"]))
        {
            $kelamin = test_input($_POST["kelamin"]);
        }
        $ids = $_POST["id"];
        echo $ids;
        $update = "UPDATE maba3 set nim = '$nim', nama = '$nama' ,alamat = '$alamat' , kelamin = '$kelamin' WHERE id= '$ids' ";
    
        if(!empty($nama) and !empty($nim) and !empty($alamat) and !empty("kelamin"))
        {
           $conek =  $conn->query($update);
           $conn->close();
             echo "<script>alert('dataedit');window.location= 'index.php'; </script>";
                
                
           
          
           
    
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
    if(!empty($_GET["id"]))
    {
        $id = $_GET["id"];
    }else
    {
        $id = $_POST["id"];
    }
    $selectcuy = "SELECT * from maba3 where id = '$id'";
    $quer = $conn->query($selectcuy);
    while($row = $quer->fetch_assoc())
    {
    ?>
    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
    Nim : </br>
    <input type  = "text" value = "<?php echo $row["nim"];?>" name  = "nim"></br>
    Nama:</br>
    <input type  = "text" value = "<?php echo $row["nama"];?>" name  = "nama"></br>
    Alamat:</br>
    <input type  = "text" value = "<?php echo $row["alamat"];?>" name  = "alamat"></br>
    Kelamin:</br>
    <input type  = "radio" name  = "kelamin" value = "laki-laki" <?php if(!empty($row["kelamin"]) and $row["kelamin"] == "laki-laki") {echo "checked";} ?>> </br>
    <input type = "radio"  name  = "kelamin" value = "perempuan" <?php if(!empty($row["kelamin"]) and $row["kelamin"] == "perempuan") {echo "checked";} ?>> </br>
    <input type="hidden" name="id" value="<?php echo $row["id"];?>" class="form-control">
    <input type = "submit" value  = "submit"> </br>
    <?php
    }
    ?>
</form>  
</body>
</html>
