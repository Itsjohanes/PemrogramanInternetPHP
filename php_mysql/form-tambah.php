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
	<!-- CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.css"> 
    <style>
        .error{color: #FF0000;}
    </style>
	</head>    
<body>
<?php
    //mendefinisikan variable dan menset variabel kosong
    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    $name = $email = $gender = $comment = $website = "";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["name"]))
        {
            $nameErr = "Nama harus diisi";
        }
        else
        {
            $name = test_input($_POST["name"]);
            //Cek validasi inputan harus huruf dan spasi putih
            if(!preg_match("/^[a-zA-Z-' ]*$/",$name))
            {
                $nameErr = "Hanya huruf besar, kecil dan spasi putih yang diizinkan";
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

        if(empty($_POST["website"]))
        {
            $website = "";
        }
        else
        {
            $website = test_input($_POST["website"]);   
            //Cek validasi inputan website
            if(!filter_var($website,FILTER_VALIDATE_URL))
            {
                $websiteErr = "URL salah";
            }
        }
        $comment = test_input($_POST["comment"]);

        if(empty($_POST["gender"]))
        {
            $genderErr = "Jenis kelamin harus diisi";
        }
        else
        {
            $gender = test_input($_POST["gender"]);
        }

        $sql_insert = "INSERT INTO tamu (nama,email,website,pesan,jenis_kelamin) VALUE ('$name','$email','$website','$comment','$gender')";

        
        if(!empty($name) and !empty($email) and !empty($gender) and empty($nameErr) and empty($websiteErr))
        
        {
             
            mysqli_query($conn,$sql_insert);
            $conn->close();
            header("location: index.php");

        
        

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
		<label for="nama">Nama</label><span class="error"> * <?php echo $nameErr;?></span>
		<input type="text" name="name" value="<?php echo $name;?>" class="form-control">
	</div>		
    <div class="form-group">
		<label for="nama">Email</label><span class="error"> * <?php echo $emailErr;?></span>
		<input type="text" name="email" value="<?php echo $email;?>" class="form-control">
    </div> 
	<div class="form-group">
		<label for="nama">Website</label> <span class = "error"> * <?php echo $websiteErr ;?> </span>
		<input type="text" name="website" value="<?php echo $website;?>" class="form-control">
	</div>	
    <div class="form-group">
		<label for="nama">Komentar</label>
		<textarea name="comment" row="5" cols="40" class="form-control"><?php echo $comment;?></textarea>
	</div>	
	<div class="form-group">
		<label for="nama">Jenis Kelamin</label><span class="error"> * <?php echo $genderErr;?></span>
	</div>
	<div class="custom-control custom-radio custom-control-inline">
		<input type="radio" id="ContohRadio1" name="gender" value="Laki-laki" <?php if(isset($gender) && $gender=="Laki-laki"){ echo "checked";}?> class="custom-control-input">
		<label class="custom-control-label" for="ContohRadio1">Laki-laki</label>
	</div>
	<div class="custom-control custom-radio custom-control-inline">
		<input type="radio" id="ContohRadio2" name="gender" value="Perempuan" <?php if(isset($gender) && $gender=="Perempuan"){ echo "checked";}?> class="custom-control-input">
		<label class="custom-control-label" for="ContohRadio2">Perempuan</label>
	</div>
	
	<div class="form-group">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Simpan</button>
	</div>
    </form>
</div>

<!-- JS -->
<script src="assets/js/jquery.js"></script> 
<script src="assets/js/popper.js"></script> 
<script src="assets/js/bootstrap.js"></script>

</body>
</html>