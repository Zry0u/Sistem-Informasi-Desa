<?php
session_start();
include "../config/koneksi.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

mysqli_query($koneksi, "DELETE FROM event_desa WHERE id_event='$_GET[id]'");
header("Location: event.php");
