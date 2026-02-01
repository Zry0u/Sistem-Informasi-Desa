<?php
session_start();
include "../config/koneksi.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
}

$cari = isset($_GET['cari']) ? $_GET['cari'] : '';
$data = mysqli_query($koneksi,
    "SELECT * FROM penduduk 
     WHERE nama LIKE '%$cari%' OR nik LIKE '%$cari%'
     ORDER BY nama ASC"
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Penduduk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<!--background-->
<link rel="stylesheet" href="../assets/style.css">

<body>

<nav class="navbar navbar-dark bg-success">
    <div class="container">
        <span class="navbar-brand">Manajemen Data Penduduk</span>
        <a href="dashboard.php" class="btn btn-outline-light btn-sm">Kembali</a>
    </div>
</nav>

<div class="container mt-4">

    <form method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="cari" class="form-control" placeholder="Cari NIK / Nama">
            <button class="btn btn-secondary">Cari</button>
            <a href="tambah_penduduk.php" class="btn btn-success">Tambah</a>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <tr class="text-center">
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>JK</th>
            <th>Tgl Lahir</th>
            <th>Aksi</th>
        </tr>

        <?php $no=1; while($row=mysqli_fetch_assoc($data)) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nik']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['alamat']; ?></td>
            <td><?= $row['jenis_kelamin']; ?></td>
            <td><?= $row['tanggal_lahir']; ?></td>
            <td class="text-center">
                <a href="hapus_penduduk.php?id=<?= $row['id_penduduk']; ?>"
                   onclick="return confirm('Hapus data?')"
                   class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</div>

</body>
</html>
