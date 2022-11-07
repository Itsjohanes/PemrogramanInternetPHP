<?php
include ('buatdb.php');
$namadb = "konz"; 
$koneksibaru = new mysqli($servername,$username,$password,$namadb);
if(!$koneksibaru)
{
    echo "error";
}else
{
    echo "success";
}
$buattabel = "CREATE TABLE mhs(
    id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    kelamin VARCHAR(20) NOT NULL,
    nim VARCHAR(10) NOT NULL

    )";
$conn = $koneksibaru->query($buattabel);


?>