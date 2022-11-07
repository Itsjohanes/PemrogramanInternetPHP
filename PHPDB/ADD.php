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
if(!empty($nama)and !empty($nim) and !empty($email) and !empty($alamat) and !empty($kelamin) and empty($nimerr) and empty($namaerr))
{


$insert = "INSERT INTO mahasiswa (NIM,NAMA,EMAIL,ALAMAT,JENIS_KELAMIN) VALUES  ( '$nim', '$nama', '$email', '$alamat',  '$kelamin')";
$conn->query($insert);

echo "<script>alert('Data Berhasil Ditambah');window.location='Tampilkan.php';</script>";


mysqli_close($conn);
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

<div class = "formulir">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<h2 style="text-align: left;">Inputkan Data Anda</h2>
<h5 style ="text-align : left">Pastikan data anda sudah benar </h5>
Nama   <br> <input type="text" name="nama" value = "<?php echo $nama ;?>"><br><span class="error">* <?php echo $namaerr;?></span><br><br>   
NIM    <br> <input type = "text" name = "nim" value = "<?php echo $nim; ?>"><br><span class = "error">* <?php echo $nimerr;?></span><br><br>
Alamat <br> <textarea row = "1" column = "4" name = "alamat" value = "<?php echo $alamat; ?>"> <?php echo $alamat; ?> </textarea> <br> 
E-mail <br> <input type="text" name="email" value = "<?php echo $email ?>"><br> <span class="error">* <?php echo $emailerr;?></span><br><br>
Kelamin: <br>
<input type = "radio" name = "kelamin" value = "laki" <?php if (!empty(($kelamin)) and ($kelamin == "laki")) {echo "checked"; } ?>> Laki-Laki <br><span class = "error">* <?php echo $kelaminerr ?> </span> <br> <br>
<input type = "radio" name = "kelamin" value = "perempuan"<?php if (!empty(($kelamin)) and ($kelamin == "perempuan")) {echo "checked"; } ?>> Perempuan  <br> <span class = "error">* <?php echo $kelaminerr ?> </span> <br> <br>

<button type = "reset" value = "Reset" class = "cancelbtn">Reset</button>
<button type = "submit" value = "Submit" class = "signupbtn">Sign Up</button>
<a href = "Tampilkan.php" class = "cancelbtn">show tabel</button>
</div>

<?php


?>
</body>


</html>