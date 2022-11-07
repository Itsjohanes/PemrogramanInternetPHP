<?php

$connect = mysqli_connect("localhost","root","","cobain");

if($connect)
{
	echo "berhasil terkoneksi";
}else
{
	echo "gagal";
}

?>