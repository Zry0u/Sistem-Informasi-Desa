<?php
session_start();
include "../config/koneksi.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
}

$id     = $_GET['id'];
$status = $_GET['status'];

mysqli_query($koneksi, 
    "UPDATE laporan SET status='$status' WHERE id_laporan='$id'"
);

header("Location: laporan.php");
?>
