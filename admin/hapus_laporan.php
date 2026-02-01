<?php
session_start();
include "../config/koneksi.php";

// Cek admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM laporan WHERE id_laporan='$id'");

header("Location: laporan.php");
exit;
