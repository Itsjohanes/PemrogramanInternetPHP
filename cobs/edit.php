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
    $hobi;
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        if(!empty($_POST["hobi"]))
        {
            $hobi = implode(",",$_POST["hobi"]);
        }
        $idx = $_POST["id"];
        $update = "UPDATE arai SET hobi = '$hobi' where id = '$idx'";
        if(!empty($hobi))
        {
            $conn->query($update);
           Header("location:index.php");
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

    }else {
        
        $id = $_POST["id"];
    }
     $select = "SELECT * from arai where id = '$id'";
     $liat = $conn->query($select);
     while($row = $liat->fetch_assoc())
     {




    ?>
    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
    Hobi : </br>
    <input type  = "checkbox" name = "hobi[]" value = "main"> Bermain <br>
    <input type = "checkbox" name = "hobi[]" value = "jalan"> jalan <br>  
    <?php echo $row["hobi"];?>
    <br>
    <input type = "hidden" name = "id" value = "<?php echo $row["id"]; ?>">
    <input type = "submit" value  = "submit"> </br>
</form> 
<?php
     }
?> 
</body>
</html>