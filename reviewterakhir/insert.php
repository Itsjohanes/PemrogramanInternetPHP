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
    $nim = $nama = $alamat = $kelamin = "";
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
        $insert = "INSERT into maba3 (nim,nama,alamat,kelamin) VALUE ('$nim','$nama','$alamat','$kelamin')";

        if(!empty($nama) and !empty($nim) and !empty($alamat) and !empty("kelamin"))
        {
           $conek =  $conn->query($insert) === "TRUE";
            
             echo "<script>alert('datamasuk');window.location= 'index.php'; </script>";
                $conn->close();
    
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
    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
    Nim : </br>
    <input type  = "text" value = "<?php echo $nim;?>" name  = "nim"></br>
    Nama:</br>
    <input type  = "text" value = "<?php echo $nama;?>" name  = "nama"></br>
    Alamat:</br>
    <input type  = "text" value = "<?php echo $alamat;?>" name  = "alamat"></br>
    Kelamin:</br>
    <input type  = "radio" name  = "kelamin" value = "laki-laki"  <?php if(isset($kelamin) == "laki-laki" and !empty($kelamin)) {echo "checked";} ?>>LAKI </br> 
    <input type = "radio"  name  = "kelamin" value = "perempuan" <?php if(isset($kelamin) == "perempuan" and !empty($kelamin)) {echo "checked";} ?>> pere  </br>
    <input type = "submit" value  = "submit"> </br>
</form>  
</body>
</html>