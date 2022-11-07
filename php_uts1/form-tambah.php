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
    $nameErr = $emailErr = $paymentErr = $nohpErr = "";
    $name = $email = $payment = $address = $nohp = "";
    $harga1 = 0; $harga2 = 0; $harga3 = 0; $hargatotal = 0; $totalbayar = 0;$pakettotal = 0;
    $paket1 = "";$paket2 = "";$paket3 = "";$pakettotal;
    
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
        if(!empty($_POST["cbpk1"]))
        {
           $paket1 = "Paket1";
            $harga1 = 25000;
        }
        if(!empty($_POST["cbpk2"]))
        {
            $paket2 = "Paket2";
            $harga2 = 20000;

        }
        if(!empty ($_POST["cbpk3"]))
        {
            $paket3 = "Paket3";
            $harga3 = 15000;
        }
        $hargatotal = $harga1 + $harga2 + $harga3;
        if($payment == "Cash")
        {
            $totalbayar = $hargatotal * (95/100); //dari 100-5
        }else  if ($payment == "Debet")
        {
            $totalbayar = $hargatotal * (90/100);

        }else if($payment = "Kredit")
        {
            $totalbayar = $hargatotal * (85/100);
        }
            
        $pakettotal = "$paket1"." "."$paket2"." "."$paket3";

        //Tambah Data
		
		//Masukan tanggal ke tabel di MySQL
		$date = date("Y-m-d");
        if(!empty($name) and !empty($email) and empty($nohpErr) and !empty($payment) and empty($nameErr) and empty($emailErr)) 
        {
            $insert = "INSERT into transaksi (nama,email,nohp,pembayaran,total,paket,alamat,tanggal) value ('$name','$email','$nohp','$payment',$totalbayar,'$pakettotal','$address','$date')";
        $conn->query($insert);
        
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
		<label for="nama">No.HP</label> <span class="error"> * <?php echo $nohpErr;?></span>
		<input type="text" name="nohp" value="<?php echo $nohp;?>" class="form-control">
	</div>	
    <div class="form-group">
		<label for="nama">Alamat</label>
		<textarea name="address" row="5" cols="40" class="form-control"><?php echo $address;?></textarea>
	</div>	
	
	<div class="form-group">
		<label for="nama">Paket Makanan</label><span class="error"></span>
	</div>
	
	<div class="custom-control custom-checkbox ">
		<input type="checkbox" id="cbpk1" name="cbpk1" value="Paket1"  class="custom-control-input">
		<label class="custom-control-label" for="cbpk1">Paket 1 (Craby Patty + Baked Potato + Cola)</label>
	</div>
	<div class="custom-control custom-checkbox ">
		<input type="checkbox" id="cbpk2" name="cbpk2" value="Paket2"  class="custom-control-input">
		<label class="custom-control-label" for="cbpk2">Paket 2 (Craby Patty + French Fries + Milkshake)</label>
	</div>
	<div class="custom-control custom-checkbox ">
		<input type="checkbox" id="cbpk3" name="cbpk3" value="Paket3"  class="custom-control-input">
		<label class="custom-control-label" for="cbpk3">Paket 3 (Warteg Komplit + Permen Dalgona  + Es Teh Manis)</label>
	</div>
	
	
	<div class="form-group">
	</div>
	
	<div class="form-group">
		<label for="nama">Pembayaran</label><span class="error"> * <?php echo $paymentErr;?></span>
	</div>
	
	<div class="custom-control custom-radio custom-control-inline">
		<input type="radio" id="ContohRadio1" name="payment" value="Cash" <?php if(isset($payment) && $payment=="Cash"){ echo "checked";}?> class="custom-control-input">
		<label class="custom-control-label" for="ContohRadio1">Tunai</label>
	</div>
	<div class="custom-control custom-radio custom-control-inline">
		<input type="radio" id="ContohRadio2" name="payment" value="Debet" <?php if(isset($payment) && $payment=="Debet"){ echo "checked";}?> class="custom-control-input">
		<label class="custom-control-label" for="ContohRadio2">Debet</label>
	</div>
	<div class="custom-control custom-radio custom-control-inline">
		<input type="radio" id="ContohRadio3" name="payment" value="Credit" <?php if(isset($payment) && $payment=="Credit"){ echo "checked";}?> class="custom-control-input">
		<label class="custom-control-label" for="ContohRadio3">Kredit</label>
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