<!DOCTYPE html> 
<html>
<head>
<style>
    .error{color:red;}
</style>
<link rel = "logo" href = "upi.png">
<link rel = "Stylesheet" href = "style.css">
<title>Form Sign Up</title>  
</head>
<body>
<?php
include ('index.php');


$namaerr = $emailerr = $kelaminerr = $nimerr = "";
$nama = $email = $kelamin = $alamat= $nim =  "";


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST["nama"]))
    {
        $namaerr  = "Nama Perlu diisi";
    }else {
        $nama = test_input($_POST["nama"]);
        if(!preg_match("/^[a-zA-Z- ]*$/",$nama))
        {
            $namaerr = "Format nama salah. Format yang benar hanya menampung abjad";
        }

    }
    
    
        $alamat = test_input($_POST["alamat"]);
  
    
    if(empty($_POST["email"]))
    {
        $emailerr = "Alamat Email perlu anda isi";

    }else {
        $email  = test_input(($_POST["email"]));
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $emailerr = "Email tidak sesuai format";

        }
    }
    if(empty($_POST["kelamin"]))
    {
        $kelaminerr = "Pilih kelamin dengan benar";

    }else {
        
            $kelamin = test_input($_POST["kelamin"]);
        
    }
    if(empty ($_POST["nim"]))
    {
        $nimerr = "Nim kosong";
    }else {
        $nim = test_input($_POST["nim"]);
        if(!preg_match("/^[0-9]{7}$/", $nim)) {
            $nimerr = "Format salah. Hanya Menampung 8 digit angka";
        }
       
    
     
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
if(isset($_GET["id"]) and !empty($_GET["id"]))
{
    $nimmasukan = $_GET["id"];
}else
{
    $nimmasukan = $_POST["nim"];
}
$select  = "SELECT * from mahasiswa where NIM ='$nimmasukan'";

$querrr = mysqli_query($conn,$select);
while($row = $querrr->fetch_assoc())
{

?>
<div class = "formulir">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<h2 style="text-align: left;">Inputkan Data Anda</h2>
<h5 style ="text-align : left">Pastikan data anda sudah benar </h5>

Nama   <br> <input type="text" name="nama" value = "<?php echo $row["NAMA"];?>"><br><span class="error">* <?php echo $namaerr;?></span><br><br>   
NIM    <br> <input type = "text" name = "nim" value = "<?php echo  $row["NIM"]; ?>"><br><span class = "error">* <?php echo $nimerr;?></span><br><br>
Alamat <br> <textarea row = "1" column = "4" name = "alamat" value = "<?php echo  $row["ALAMAT"]; ?>"> <?php echo $row["ALAMAT"];?> </textarea> <br> 
E-mail <br> <input type="text" name="email" value = "<?php echo  $row["EMAIL"] ?>"><br> <span class="error">* <?php echo $emailerr;?></span><br><br>
Kelamin: <br>
<input type = "radio" name = "kelamin" value = "laki" <?php if (isset($row["JENIS_KELAMIN"]) && $row["JENIS_KELAMIN"] == "laki") {echo "checked"; } ?>> Laki-Laki  <br> <span class = "error">* <?php echo $kelaminerr ?> </span> <br> <br>
<input type = "radio" name = "kelamin" value = "perempuan" <?php if (isset($row["JENIS_KELAMIN"]) && $row["JENIS_KELAMIN"] == "perempuan") {echo "checked"; } ?>> Perempuan  <br> <span class = "error">* <?php echo $kelaminerr ?> </span> <br> <br>
<input type = "hidden" name = "nim" value = "<?php echo $row["NIM"]; ?>">
<?php
}
?>
<button type = "reset" value = "Reset" class = "cancelbtn">Reset</button>
<button type = "submit" value = "Submit"  class = "signupbtn" onclick = "return confirm('Sudah benar?')">Sign Up</button> 
<a href = "Tampilkan.php" class = "cancelbtn">show tabel</button>
</div>

<?php

if(!empty($nama)and !empty($nim) and !empty($email) and !empty($alamat) and !empty($kelamin) and empty($nimerr) and empty($namaerr))
{



$insert = "UPDATE Mahasiswa SET NIM = '$nim',NAMA = '$nama', ALAMAT = '$alamat',JENIS_KELAMIN = '$kelamin' where NIM = '$nimmasukan'";

if($conn->query($insert))
{
    mysqli_query($conn,$insert);
echo "<script>alert('Data Berhasil Diubah');window.location='Tampilkan.php';</script>";
header("location: Tampilkan.php");

}

}

mysqli_close($conn);

?>
</body>


</html>