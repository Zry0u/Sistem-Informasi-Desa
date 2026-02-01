<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-success">
    <div class="container">
        <span class="navbar-brand mb-0 h1">Dashboard Admin Desa</span>
    
        <div class="dropdown ms-auto">
            <a href="#"
                class="d-flex align-items-center justify-content-center 
                        bg-light rounded-circle text-success fw-bold"
                style="width:40px;height:40px;text-decoration:none"
                data-bs-toggle="dropdown"
                role="button">
                <?= strtoupper(substr($_SESSION['nama'], 0, 1)); ?>
            </a>

            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="profil.php">Profil Admin</a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item text-danger" href="../auth/logout.php">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h4>Dashboard Admin</h4>
    <p>Selamat datang, <b><?= $_SESSION['nama']; ?></b></p>

    <div class="row mt-4">

        <!-- Card Kelola Laporan -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Kelola Laporan</h5>
                    <p class="card-text">
                        Melihat dan memproses laporan dari warga.
                    </p>
                    <a href="laporan.php" class="btn btn-success">
                        Lihat Laporan
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Data Penduduk -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Data Penduduk</h5>
                    <p class="card-text">
                        Mengelola data kependudukan desa.
                    </p>
                    <a href="penduduk.php" class="btn btn-primary">
                        Kelola Penduduk
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Cetak -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Cetak Laporan</h5>
                    <p class="card-text">
                        Cetak laporan desa dalam bentuk dokumen.
                    </p>
                    <a href="cetak_laporan.php" class="btn btn-secondary">
                        Cetak
                    </a>
                </div>
            </div>
        </div>

        <!-- Card Kalender event -->
        <div class="col-md-4 mt-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">📅 Event Desa</h5>
                    <p class="card-text">
                        Kelola agenda dan kegiatan desa
                    </p>
                    <a href="event.php" class="btn btn-success">
                        Kelola Event
                    </a>
                </div>
            </div>
        </div>


    </div>
</div>

<a href="layanan.php" class="btn btn-info">
    Status Layanan Desa
</a>

<!--background-->
<link rel="stylesheet" href="../assets/style.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
