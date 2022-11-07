<?php
$servername = "localhost";
$database = "cobain";
$username = "root";
$password = "";

// untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
echo "Koneksi berhasil";
$id = $_POST['ID_DOSEN'];
$nama = $_POST['NAMA_DOSEN'];
$alamat = $_POST['ALAMAT'];
$sql = "INSERT INTO entity_1 (ID_DOSEN, NAMA_DOSEN, ALAMAT) VALUES ('$id', '$nama', '$alamat')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>