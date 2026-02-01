<?php
session_start();
include "../config/koneksi.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
}

$data = mysqli_query($koneksi, "
    SELECT laporan.*, users.nama 
    FROM laporan 
    JOIN users ON laporan.id_user = users.id_user
    ORDER BY tanggal DESC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<!--background-->
<link rel="stylesheet" href="../assets/style.css">

<body>

<nav class="navbar navbar-dark bg-success">
    <div class="container">
        <span class="navbar-brand">Kelola Laporan Warga</span>
        <a href="dashboard.php" class="btn btn-outline-light btn-sm">Kembali</a>
    </div>
</nav>

<div class="container mt-4">

    <table class="table table-bordered table-striped">
        <tr class="text-center">
            <th>No</th>
            <th>Nama Warga</th>
            <th>Judul</th>
            <th>Isi Laporan</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php $no=1; while($row=mysqli_fetch_assoc($data)) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['judul']; ?></td>
            <td><?= $row['isi_laporan']; ?></td>
            <td><?= $row['tanggal']; ?></td>
            <td class="text-center">
                <span class="badge bg-info"><?= $row['status']; ?></span>
            </td>
            <td class="text-center">
                <a href="update_status.php?id=<?= $row['id_laporan']; ?>&status=Diproses"
                    class="btn btn-warning btn-sm mb-1">Proses</a>

                <a href="update_status.php?id=<?= $row['id_laporan']; ?>&status=Selesai"
                    class="btn btn-success btn-sm mb-1">Selesai</a>

                <a href="hapus_laporan.php?id=<?= $row['id_laporan']; ?>"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin ingin menghapus laporan ini?')">
                    Hapus
                </a>
            </td>
        </tr>
        <?php } ?>

    </table>

</div>

</body>
</html>
