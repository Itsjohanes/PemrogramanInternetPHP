<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
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
        $insert = "INSERT INTO arai (hobi) value ('$hobi')";
        if(!empty($hobi))
        {
            $conn->query($insert);
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

    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
    Hobi : </br>
    <input type  = "checkbox" name = "hobi[]" value = "main" <?php if(isset($_POST["hobi"]) == "main") {echo "checked";} ?> > Bermain <br>
    <input type = "checkbox" name = "hobi[]" value = "jalan"<?php if(isset($_POST["hobi"]) == "jalan" ){echo "checked";} ?>> jalan <br>
    <input type = "submit" value  = "submit"> </br>
</form>  
</body>
</html>