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
    <style>
        .error{color: #FF0000;}
    </style>
	</head>    
<body>
<?php
  
    //mendefinisikan variable dan menset variabel kosong
    $nameErr = $emailErr = $paymentErr = $nohpErr = "";
    $name = $email = $payment = $address = $nohp = "";
    $hargatotal = 0;    
    $paket;
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

        if(empty($_POST["nohp"]))
        {
            $nohp = "";
        }
        else
        {
            $nohp = test_input($_POST["nohp"]);   
            //Cek validasi inputan nohp
            if(!preg_match("/^([0-9]{12})/",$nohp))
            {
                $nohpErr = "No.HP salah";
            }
        }
        $address = test_input($_POST["address"]);

        if(empty($_POST["payment"]))
        {
            $paymentErr = "Pembayaran";
        }
        else
        {
            $payment = test_input($_POST["payment"]);
            
        }
        if(!empty($_POST["paket"]))
        {
            $paket=implode(",", $_POST['paket']);
            $hargatotal = 0;
            if(in_array("Paket1",$_POST["paket"]))
            {
                $hargatotal += 25000;

            }
            if(in_array("Paket2",$_POST["paket"]))
            {
                $hargatotal += 20000;

            }
            if(in_array("Paket3",$_POST["paket"]))
            {
                $hargatotal += 15000;
            }

        }else {
            $paketErr = "isi paketnya donk minimal 1";
        }
        if($payment == "Cash")
        {
            $hargatotal = $hargatotal * 95/100;
        }else  if($payment == "Debet"){
            $hargatotal = $hargatotal * 90/100;
            
        }else if($payment == "Credit")
        {
            $hargatotal = $hargatotal * 85/100;
        }

        //Tambah Data
		
		//Masukan tanggal ke tabel di MySQL
		$date = date("Y-m-d");
        $idaku = $_POST["id"];
        $update = "UPDATE transaksi SET nama = '$name' , email = '$email' , nohp = '$nohp', alamat = '$address' , paket = '$paket', pembayaran = '$payment', total = '$hargatotal' WHERE id = '$idaku'";
      
        if(!empty($name) and !empty($email) and empty($nohpErr) and !empty($payment) and empty($nameErr) and empty($emailErr))        {
        $conn->query($update);
        
        header("location: index.php");

        }
        
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
    <?php
    if(isset($_GET["id"])  and !empty($_GET["id"]))
    {
        $idx = $_GET["id"];
    }else {
        
        $idx = $_POST["id"];
    }
   
    $select = "SELECT * FROM transaksi WHERE ID = '$idx'";
    $koneksi = $conn->query($select);

    while($row = $koneksi->fetch_assoc())
    {
        $paket=explode(',', $row['paket']);

    ?>
    <h2><center>Form Tambah</center></h2>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-group">
		<label for="nama">Nama</label><span class="error"> * <?php echo $nameErr;?></span>
		<input type="text" name="name" value="<?php echo $row["nama"];?>" class="form-control">
	</div>		
    <div class="form-group">
		<label for="nama">Email</label><span class="error"> * <?php echo $emailErr;?></span>
		<input type="text" name="email" value="<?php echo $row["email"];?>" class="form-control">
    </div> 
	<div class="form-group">
		<label for="nama">No.HP</label>
		<input type="text" name="nohp" value="<?php echo $row["nohp"];?>" class="form-control">
	</div>	
    <div class="form-group">
		<label for="nama">Alamat</label>
		<textarea name="address" row="5" cols="40" class="form-control"><?php echo $row["alamat"];?></textarea>
	</div>	
	
	<div class="form-group">
		<label for="nama">Paket Makanan</label><span class="error"></span>
	</div>
	
	<div class="custom-control custom-checkbox ">
    <input type="checkbox" id="cbpk1" name="paket[]" value="Paket1" <?php if(in_array("Paket1", $paket)) echo "checked";?> class="custom-control-input">
		<label class="custom-control-label" for="cbpk1">Paket 1 (Craby Patty + Baked Potato + Cola)</label>
	</div>
	<div class="custom-control custom-checkbox ">
    <input type="checkbox" id="cbpk2" name="paket[]" value="Paket2" <?php if(in_array("Paket2", $paket)) echo "checked";?> class="custom-control-input">
		<label class="custom-control-label" for="cbpk2">Paket 2 (Craby Patty + French Fries + Milkshake)</label>
	</div>
	<div class="custom-control custom-checkbox ">
    <input type="checkbox" id="cbpk3" name="paket[]" value="Paket3" <?php if(in_array("Paket3", $paket)) echo "checked";?> class="custom-control-input">
		<label class="custom-control-label" for="cbpk3">Paket 3 (Warteg Komplit + Permen Dalgona  + Es Teh Manis)</label>
	</div>
	
	
	<div class="form-group">
	</div>
	
	<div class="form-group">
		<label for="nama">Pembayaran</label><span class="error"> * <?php echo $paymentErr;?></span>
	</div>
	
	<div class="custom-control custom-radio custom-control-inline">
		<input type="radio" id="ContohRadio1" name="payment" value="Cash" <?php if( $row["pembayaran"]=="Cash"){ echo "checked";}?>  class="custom-control-input">
		<label class="custom-control-label" for="ContohRadio1">Tunai</label>
	</div>
	<div class="custom-control custom-radio custom-control-inline">
		<input type="radio" id="ContohRadio2" name="payment" value="Debet" <?php if( $row["pembayaran"]=="Debet"){ echo "checked";}?> class="custom-control-input">
		<label class="custom-control-label" for="ContohRadio2">Debet</label>
	</div>
	<div class="custom-control custom-radio custom-control-inline">
		<input type="radio" id="ContohRadio3" name="payment" value="Credit" <?php if($row["pembayaran"]=="Credit"){ echo "checked";}?> class="custom-control-input">
		<label class="custom-control-label" for="ContohRadio3">Kredit</label>
	</div>
	
	<div class="form-group">
	</div>
    <input type = "hidden" name = "id" value = "<?php echo $row["id"]; ?>">
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Simpan</button>
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