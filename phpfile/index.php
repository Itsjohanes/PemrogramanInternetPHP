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
    $myfile = fopen("tes.txt","r") or die("tidak dapat dibuka");
    $txt =  "joe\n";
    echo fread($myfile,filesize("tes.txt"));

    fclose($myfile);
    ?>

</body>
</html
