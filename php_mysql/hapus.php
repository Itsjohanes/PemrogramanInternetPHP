<?php
    // Memanggil file koneksi db
	include('dbconn/dbconn.php');
    //Hapus Data
    $id_data = $_GET["id"];
    $sql_hapus = "DELETE FROM tamu WHERE id='$id_data'";

    if($conn->query($sql_hapus) === TRUE)
    {
        echo "Data telah dihapus ke tabel";
    }
    else
    {
        echo "Error : ". $sql_update . "<br>" . $conn->error;
    }        

    $conn->close();

    //Redirect
    header("location: index.php");
?>