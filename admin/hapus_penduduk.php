<?php
session_start();
include "../config/koneksi.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
}

$id = $_GET['id'];
mysqli_query($koneksi,
    "DELETE FROM penduduk WHERE id_penduduk='$id'"
);

header("Location: penduduk.php");
?>
