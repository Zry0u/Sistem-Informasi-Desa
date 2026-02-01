<?php
session_start();
include "../config/koneksi.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

$data = mysqli_query($koneksi, "SELECT * FROM event_desa ORDER BY tanggal ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Agenda Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<!--background-->
<link rel="stylesheet" href="../assets/style.css">

<body>

<nav class="navbar navbar-dark bg-success">
    <div class="container">
        <span class="navbar-brand">📅 Kelola Event Desa</span>
        <a href="dashboard.php" class="btn btn-outline-light btn-sm">Kembali</a>
    </div>
</nav>

<div class="container mt-4">

    <a href="event_tambah.php" class="btn btn-primary mb-3">
        + Tambah Event
    </a>

    <table class="table table-bordered table-striped">
        <tr class="text-center">
            <th>No</th>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Lokasi</th>
            <th>Aksi</th>
        </tr>

        <?php $no=1; while($row=mysqli_fetch_assoc($data)) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($row['judul_event']); ?></td>
            <td><?= $row['tanggal']; ?></td>
            <td><?= $row['waktu']; ?></td>
            <td><?= htmlspecialchars($row['lokasi']); ?></td>
            <td class="text-center">
                <a href="event_edit.php?id=<?= $row['id_event']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="event_hapus.php?id=<?= $row['id_event']; ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Hapus event ini?')">
                   Hapus
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
