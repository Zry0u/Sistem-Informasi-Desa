<?php
session_start();
if ($_SESSION['role'] != 'warga') {
    header("Location: ../auth/login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buat Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h4>Buat Laporan</h4>

    <form action="proses_laporan.php" method="POST">
        <div class="mb-3">
            <label>Judul Laporan</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Isi Laporan</label>
            <textarea name="isi" class="form-control" rows="5" required></textarea>
        </div>

        <button class="btn btn-primary" type="submit">Kirim Laporan</button>
        <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<!--background-->
<link rel="stylesheet" href="../assets/style.css">

</body>
</html>
