<?php
	// Memanggil file koneksi db
	include('dbconn/dbconn.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Form Ubah</title>
	<!-- CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.css"> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        .error{color: #FF0000;}
    </style>
	</head>    
<body>
<script> swal("Silakan edit data") </script>
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
                $nimerr = "Format salah. Hanya Menampung 7 digit angka";
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
        
        //Ubah Data
        $id_data = $_POST["id"];
        $sql_update = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', email = '$email', alamat = '$alamat', kelamin = '$kelamin' WHERE id='$id_data'";

        if($conn->query($sql_update) === TRUE)
        {
            echo "<script>alert('Data Berhasil Diubah');window.location='index.php';</script>";
            //header("location: index.php");
        }
        else
        {
            echo "Error : ". $sql_update . "<br>" . $conn->error;
        }        

        $conn->close();

        //Redirect
        

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
    <h2><center>Form Ubah</center></h2>
    <?php
        $id_mhs= $_GET["id"];
        $sql_select = "SELECT * FROM mahasiswa  WHERE id='$id_mhs'";
        $result = $conn->query($sql_select);

        while($row = $result->fetch_assoc())
		{
    ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-group">
		<label for="nama">NIM</label><span class="error"> * <?php echo $nimErr;?></span>
		<input type="text" name="nim" value="<?php echo $row["nim"];?>" required class="form-control">
	</div>		
    <div class="form-group">
		<label for="nama">Nama</label><span class="error"> * <?php echo $namaErr;?></span>
		<input type="text" name="nama" value="<?php echo $row["nama"];?>" required class="form-control">
    </div> 
    <div class="form-group">
		<label for="nama">Email</label><span class="error"> * <?php echo $emailErr;?></span>
		<input type="text" name="email" value="<?php echo $row["email"];?>" required class="form-control">
    </div>
	<div class="form-group">
		<label for="nama">Alamat</label>
		<input type="text" name="alamat" value="<?php echo $row["alamat"];?>" required class="form-control">
	</div>	
	<div class="form-group">
		<label for="name">Jenis Kelamin</label><span class="error"> * <?php echo $kelaminErr;?></span>
	</div>
	<div class="custom-control custom-radio custom-control-inline">
		<input type="radio" id="ContohRadio1" name="kelamin" value="Laki-laki" <?php if($row["kelamin"]=="Laki-laki"){ echo "checked";}?> class="custom-control-input">
		<label class="custom-control-label" for="ContohRadio1">Laki-laki</label>
	</div>
	<div class="custom-control custom-radio custom-control-inline">
		<input type="radio" id="ContohRadio2" name="kelamin" value="Perempuan" <?php if($row["kelamin"]=="Perempuan"){ echo "checked";}?> class="custom-control-input">
		<label class="custom-control-label" for="ContohRadio2">Perempuan</label>
	</div>
	
	<div class="form-group">
	</div>
	<div class="form-group">
    <input type="hidden" name="id" value="<?php echo $row["id"];?>" class="form-control">
		<button type="submit" class="btn btn-primary">Ubah</button>
	</div>
    </form>
    <?php
		}
	?>
</div>

<!-- JS -->
<script src="assets/js/jquery.js"></script> 
<script src="assets/js/popper.js"></script> 
<script src="assets/js/bootstrap.js"></script>

</body>
</html>