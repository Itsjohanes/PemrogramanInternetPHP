<?php
    // Memanggil file koneksi db
	include('dbconn/dbconn.php');
    //Hapus Data
    $id_data = $_GET["id"];
    $sql_hapus = "DELETE FROM mahasiswa WHERE id='$id_data'";
    $sql_select = "SELECT  * FROM mahasiswa WHERE id='$id_data'";

    
     $z = $conn->query($sql_select) ;
     while($row = $z->fetch_assoc())
     {
        $img = $row['photo'];
        unlink("upload/". $img);

     }
     if($conn->query($sql_hapus))
     {
         echo "data berhasil dihapus";
         header("location: index.php");


     }else
     {
         echo "gagal";
     }
  

    
    
   

    $conn->close();

    //Redirect
?>
