<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP</title>
</head>
<body>
	<?php
	$kata = "<h1>saya belajar php</h1>";
	$kata2 = "<p>saya sangat senang belajar php</p>";
	$var1 = 510;
	$var2 = 10.365;
	
	$bool = true;
    var_dump($var1);
	var_dump($var2);
	var_dump($bool);
	$os_hape = array("android","ios","windows phone");
	var_dump($os_hape);
	$a = 10;
	$b = 20;
	$c = $a <=> $b;
	echo "<br>";
echo $c;
	?>
	<?php
	$date1 = date("H");

	if($date1 < "05")
	{
		echo "pagi";
	}
	elseif($date1 <"20")
	{
		echo "selamat menikmati hari ini<br>";
	}else
	{
		echo "selamat menikmati malam ini";
	}
	$date2 = date("l");


	switch($date2)
	{
		case "sunday":
			echo "ini minggu";
			break;
		case "Monday":
			echo "ini senin";
			break;
		case "Tuesday":
			echo "ini selasa";
			break;
		case "wendnesday":
			echo "ini rabu";
			break;
		case "thursday":
			echo "ini kamis";
			break;
		case "friday":
			echo "ini jumat";
			break;
		
	}
  echo "<br>";
  echo "<h2>menampilkan pengulangan</h2>";
  $i = 1;
  while($i <5)
  {
	  echo "menampilkan angka dari ke-1 $i <br>";
	  $i++; 
  }
?>
<?php
echo "proses do while <br>";
$j = 1;
do
{
	echo "menampilkan angka dari ke-1 $i <br>";
    $j++;
}while($j<5);
echo "menampilkan pengulangan menggunakan for<BR>";
for($x = 0;$x<=10;$x++)
{
	echo "menampilkan pengulangan angka ke-$x <br>";
}
echo "menampilkan for menurun<BR>";
for($y = 5;$y >=1 ;$y--)
{
	echo "menampilkan pengulangan ke-$y <br>";
}
$bahasapemrograman = array("bahasa c","html","css");
foreach ($bahasapemrograman as $value)
{
	echo $value ;
}
echo "<H2>menampilkan fungsi </h2>";
function penjumlahan($a,$b)
{
	return $a+ $b;

}
echo penjumlahan(10,12);
echo "<br>";
$cars = array("VOLVO","BMW","TOYOTA");
echo "i like" .$cars[0] . "," . $cars[1] . "," . $cars[2] . ".";

?>




</body>
</html>