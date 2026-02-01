<?php
session_start();
include "../config/koneksi.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

if (isset($_POST['simpan'])) {
    mysqli_query($koneksi, "
        INSERT INTO event_desa (judul_event, deskripsi, tanggal, waktu, lokasi)
        VALUES (
            '$_POST[judul]',
            '$_POST[deskripsi]',
            '$_POST[tanggal]',
            '$_POST[waktu]',
            '$_POST[lokasi]'
        )
    ");
    header("Location: event.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<!--background-->
<link rel="stylesheet" href="../assets/style.css">

<body>

<nav class="navbar navbar-dark bg-success">
    <div class="container">
        <span class="navbar-brand">Tambah Event Desa</span>
        <a href="event.php" class="btn btn-outline-light btn-sm">Kembali</a>
    </div>
</nav>

<div class="container mt-4">

    <form method="POST">
        <div class="mb-3">
            <label>Judul Event</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Waktu</label>
            <input type="time" name="waktu" class="form-control">
        </div>

        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <button name="simpan" class="btn btn-success">Simpan</button>
        <a href="event.php" class="btn btn-secondary">Batal</a>
    </form>
</div>

</body>
</html>
