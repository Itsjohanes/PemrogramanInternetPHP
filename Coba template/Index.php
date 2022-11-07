<!DOCTYPE html> 
<html>
<head>
<style>
    .error{color:red;}
</style>
<link rel = "Stylesheet" href = "style.css">
<title>Form Sign Up </title>  
</head>
<body>
<?php
$namaerr = $emailerr = $kelaminerr = $alamaterr  = $nimerr = "";
$nama = $email = $kelamin = $alamat= $nim =  "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST["nama"]))
    {
        $namaerr  = "Nama Perlu diisi";
    }else {
        $nama = test_input($_POST["nama"]);

    }
    if(empty($_POST["alamat"]))
    {
        $alamaterr  = "alamat Perlu diisi";
    }else {
        $alamat = test_input($_POST["alamat"]);

    }
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
        if (!preg_match('/^[0-9]*$/', $nim)) {
        $nimerr = "error format";
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

<div class = "formulir">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<h2 style="text-align: left;">Inputkan Data Anda</h2>
<h5 style ="text-align : left">Pastikan data anda sudah benar </h5>
Nama   <br> <input type="text" name="nama" value="<?php echo $nama;?>"><br><span class="error">* <?php echo $namaerr;?></span><br><br>   
Nim    <br> <input type = "text" name = "nim" value  = "<?php echo $nim;?>"><br><span class = "error">* <?php echo $nimerr;?></span><br><br>
Alamat <br> <textarea row = "1" column = "4" name = "alamat" value="<?php echo $alamat;?>"> </textarea> <br> <span class="error">* <?php echo $alamaterr;?></span><br><br> 
E-mail <br> <input type="text" name="email" value="<?php echo $email;?>"><br> <span class="error">* <?php echo $emailerr;?></span><br><br>
Kelamin: <br>
<input type = "radio" name = "kelamin" value = "Laki-Laki"> Laki-Laki <?php if (isset($kelamin) and ($kelamin == "Laki-laki")) {echo "checked"; } ?> <br><span class = "error">* <?php echo $kelaminerr ?> </span> <br> <br>
<input type = "radio" name = "kelamin" value = "perempuan"> Perempuan <?php if (isset($kelamin) and ($kelamin == "perempuan")) {echo "checked"; } ?> <br> <span class = "error">* <?php echo $kelaminerr ?> </span> <br> <br>

<button type = "reset" value = "Reset" class = "cancelbtn">Reset</button>
<button type = "submit" value = "Submit" class = "signupbtn">Sign Up</button>
</div>

<?php 
echo "<br>";
echo  "Nama: $nama ";
echo "<br>";
echo "Nim:$nim";
echo "<br>";
echo "Email:$email";
echo "<br>";
echo "Alamat:$alamat";
echo "<br>";
echo "Jenis Kelamin: $kelamin";
?>
</body>
</html>