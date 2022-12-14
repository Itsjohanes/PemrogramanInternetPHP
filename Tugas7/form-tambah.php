<?php
	// Memanggil file koneksi db
	include('dbconn/dbconn.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Form Tambah</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<link rel="stylesheet" href="assets/css/bootstrap.css"> 
    <style>
        .error{color: #FF0000;}
    </style>
 
	</head>    
<body>
    <script>swal("Silakan masukan data");</script>
<?php
   
    //mendefinisikan variable dan menset variabel kosong
    $nimErr = $namaErr = $emailErr = $kelaminErr = $alamatErr = "";
    $nim =  $nama = $email = $kelamin = $alamat = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["nim"]))
        {
            $namaErr = "Nim harus diisi";
        }
        else
        {
            $nim = test_input($_POST["nim"]);
            //Cek validasi inputan harus huruf dan spasi putih
            if(!preg_match("/^[0-9]{7}$/", $nim)) {
                $nimErr = "Format salah. Hanya Menampung 7 digit angka";
            }
        }
        if(empty($_POST["nama"]))
        {
            $namaErr = "Nama harus diisi";
        }
        else
        {
            $nama = test_input($_POST["nama"]);
            //Cek validasi inputan harus huruf dan spasi putih
            if(!preg_match("/^[a-zA-Z-' ]*$/",$nama))
            {
                $namaErr = "Hanya huruf besar, kecil dan spasi putih yang diizinkan";
            }
        }

        if(empty($_POST["email"]))
        {
            $emailErr = "Email harus diisi";
        }
        else
        {
            $email = test_input($_POST["email"]);
            //Cek Validasi e-mail
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $emailErr = "Format email salah";
            }
        }

        $alamat = test_input($_POST["alamat"]);

        if(empty($_POST["kelamin"]))
        {
            $kelaminErr = "Jenis kelamin harus diisi";
        }
        else
        {
            $kelamin = test_input($_POST["kelamin"]);
        }

        if(!empty($nim) and !empty($nama) and !empty($email) and !empty($alamat) and !empty($kelamin))
        {
            $sql_insert = "INSERT INTO mahasiswa (nim,nama,email,alamat,kelamin) VALUE ('$nim','$nama','$email','$alamat','$kelamin')";
            if($conn->query($sql_insert) === TRUE)
             {
                
                
                header("location: index.php");
             }
           else
           {
            echo "Error : ". $sql_insert . "<br>" . $conn->error;
           }        
            
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
<div class="container">
    <h2><center>Form Tambah</center></h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-group">
		<label for="nim">NIM</label><span class="error"> * <?php echo $nimErr;?></span>
		<input type="text" name="nim" value="<?php echo $nim;?>" class="form-control">
	</div>	
    <div class="form-group">
		<label for="nama">Nama</label><span class="error"> * <?php echo $namaErr;?></span>
		<input type="text" name="nama" value="<?php echo $nama;?>" class="form-control">
	</div>		
    <div class="form-group">
		<label for="nama">Email</label><span class="error"> * <?php echo $emailErr;?></span>
		<input type="text" name="email" value="<?php echo $email;?>" class="form-control">
    </div> 
    <div class="form-group">
		<label for="nama">Alamat</label>
		<textarea name="alamat" row="5" cols="40" class="form-control"><?php echo $alamat;?></textarea>
	</div>	
	<div class="form-group">
		<label for="nama">Jenis Kelamin</label><span class="error"> * <?php echo $kelaminErr;?></span>
	</div>
	<div class="custom-control custom-radio custom-control-inline">
		<input type="radio" id="ContohRadio1" name="kelamin" value="Laki-laki" <?php if(isset($kelamin) && $kelamin=="Laki-laki"){ echo "checked";}?> class="custom-control-input">
		<label class="custom-control-label" for="ContohRadio1">Laki-laki</label>
	</div>
	<div class="custom-control custom-radio custom-control-inline">
		<input type="radio" id="ContohRadio2" name="kelamin" value="Perempuan" <?php if(isset($kelamin) && $kelamin =="Perempuan"){ echo "checked";}?> class="custom-control-input">
		<label class="custom-control-label" for="ContohRadio2">Perempuan</label>
	</div>
	
	<div class="form-group">
    <label class = "custom-control-label" for = "photo"> Photo </label>
    <input type="file" name="fileToUpload" id="fileToUpload">

	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary ">Simpan</button>
	</div>
    </form>
</div>
<?php

?>
<!-- JS -->
<script src="assets/js/jquery.js"></script> 
<script src="assets/js/popper.js"></script> 
<script src="assets/js/bootstrap.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>
</html>