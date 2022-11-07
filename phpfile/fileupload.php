<?php
$namadir = "upload/";
$namafile = $namadir . basename($_FILES["file"]["name"]);
$uploadok = 1;
$imageFileType = strtolower(pathinfo($namafile,PATHINFO_EXTENSION));
//CEK jika yang diupload merupakan file gambar

if(isset($_POST["submit"]))
{
    $cek = getimagesize($_FILES["file"]["tmp_name"]);
    if($cek !==false)
    {
        echo "file adalah gambar" . $cek["mime"] . "."; 
        $uploadok = 1;
    }else
    {
        echo "file bukan foto";
        $uploadok = 0;
    }
    //cek jika gambar sudah ada
    if(file_exists($namafile))
    {
        echo "gambar sudah ada";
        $uploadok = 0;

    }
    //hanya extension aja
    if($imageFileType != "jpg" && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif')
    {
        echo "bukan gambar";
        $uploadok = 0;

    }
    //batasan
    if($_FILES["file"]["size"] > 5000000)
    {
        echo "maaf file lbh dari 5 mb";
        $uploadok = 0;
        
    }
    if($uploadok == 0)
    {
        echo "maaf file yang anda upload bukan gambar";

    }else
    {
        if(move_uploaded_file($_FILES["file"]["tmp_name"],$namafile))
        {
            echo "berhasil".htmlspecialchars(basename($_FILES["file"]["name"]))."telah terupload";


        }else
        {
            echo "gagal";
        }
    }

    

}

?>