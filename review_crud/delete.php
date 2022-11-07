<?php
    // Memanggil file koneksi db
	include('dbconn.php');
    //Hapus Data
    $id_data = $_GET["id"];
    $sql_hapus = "DELETE FROM mhs WHERE id='$id_data'";
    
    if($koneksibaru->query($sql_hapus) === TRUE)
    {
        echo "Data telah dihapus ke tabel";
    }
    else
    {
        echo "Error : ". $sql_update . "<br>" . $koneksibaru->error;
    }        

    $koneksibaru->close();

    //Redirect
    header("location: formtampilan.php");
?>