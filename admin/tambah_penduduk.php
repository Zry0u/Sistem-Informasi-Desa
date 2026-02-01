<?php
session_start();
include "../config/koneksi.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
}

if (isset($_POST['simpan'])) {
    mysqli_query($koneksi,
        "INSERT INTO penduduk 
        (nik, nama, alamat, jenis_kelamin, tanggal_lahir)
        VALUES
        ('$_POST[nik]', '$_POST[nama]', '$_POST[alamat]',
         '$_POST[jk]', '$_POST[tgl]')"
    );

    header("Location: penduduk.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Penduduk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<!--background-->
<link rel="stylesheet" href="../assets/style.css">

<body>

<div class="container mt-4">
    <h4>Tambah Data Penduduk</h4>

    <form method="POST">
        <div class="mb-2">
            <label>NIK</label>
            <input type="text" name="nik" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-2">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>
        <div class="mb-2">
            <label>Jenis Kelamin</label>
            <select name="jk" class="form-control" required>
                <option value="">- Pilih -</option>
                <option>Laki-laki</option>
                <option>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl" class="form-control" required>
        </div>

        <button name="simpan" class="btn btn-success">Simpan</button>
        <a href="penduduk.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
