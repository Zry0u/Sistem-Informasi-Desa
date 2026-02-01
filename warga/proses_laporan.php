<?php
session_start();
include "../config/koneksi.php";

$id_user = $_SESSION['id_user'];
$judul   = $_POST['judul'];
$isi     = $_POST['isi'];

$query = mysqli_query($koneksi, 
    "INSERT INTO laporan (id_user, judul, isi_laporan)
     VALUES ('$id_user', '$judul', '$isi')"
);

if ($query) {
    echo "<script>
        alert('Laporan berhasil dikirim');
        window.location='dashboard.php';
    </script>";
} else {
    echo "Gagal menyimpan laporan";
}
?>
