<?php
session_start();
include "../config/koneksi.php";

// Cek login warga
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'warga') {
    header("Location: ../auth/login.php");
    exit;
}

// Ambil status layanan
$layanan = mysqli_query($koneksi, "SELECT * FROM layanan_desa LIMIT 1");
$data_layanan = mysqli_fetch_assoc($layanan);

// Ambil kalender event
$event = mysqli_query($koneksi,"SELECT * FROM event_desa WHERE tanggal >= CURDATE() ORDER BY tanggal ASC");
?>


<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<!--background-->
<link rel="stylesheet" href="../assets/style.css">

<body>

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <span class="navbar-brand">Sistem Informasi Perdesaan</span>

        <div class="ms-auto dropdown">
            <a href="#"
               class="d-flex align-items-center justify-content-center 
                      bg-light rounded-circle text-primary fw-bold"
               style="width:40px;height:40px;text-decoration:none"
               data-bs-toggle="dropdown">

                <?= strtoupper(substr($_SESSION['nama'], 0, 1)); ?>
            </a>

            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="profil.php">
                        Profil
                    </a>
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
    <h4>Dashboard Warga</h4>
    <p>Selamat datang, <b><?= $_SESSION['nama']; ?></b></p>

    <div class="row mt-4">

        <!-- Card Buat Laporan -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Buat Laporan</h5>
                    <p class="card-text">Sampaikan laporan atau aspirasi Anda.</p>
                    <a href="buat_laporan.php" class="btn btn-primary">Buat Laporan</a>
                </div>
            </div>
        </div>

        <!-- Card History -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">History Laporan</h5>
                    <p class="card-text">Lihat riwayat dan status laporan.</p>
                    <a href="history_laporan.php" class="btn btn-success">Lihat History</a>
                </div>
            </div>
        </div>

        <!-- Card Status Layanan -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Status Layanan Desa</h5>

                    <p class="card-text mb-1">
                        <?= $data_layanan['nama_layanan']; ?>
                    </p>

                    <small class="text-muted">
                        <?= $data_layanan['hari_layanan']; ?><br>
                        <?= $data_layanan['jam_layanan']; ?>
                    </small>

                    <div class="mt-3">
                        <?php if ($data_layanan['status'] == 'Aktif') { ?>
                            <span class="badge bg-success">Aktif</span>
                        <?php } else { ?>
                            <span class="badge bg-danger">Tutup</span>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Kalender -->
<div class="container section-bottom mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5>📅 Agenda Kegiatan Desa</h5>

            <?php if (mysqli_num_rows($event) == 0) { ?>
                <p class="text-muted">Belum ada agenda.</p>
            <?php } else { ?>
                <ul class="list-group list-group-flush">
                    <?php while($e=mysqli_fetch_assoc($event)) { ?>
                    <li class="list-group-item">
                        <strong><?= htmlspecialchars($e['judul_event']); ?></strong><br>
                        <?= $e['tanggal']; ?> <?= $e['waktu']; ?><br>
                        <small><?= htmlspecialchars($e['lokasi']); ?></small>
                        <br><?= htmlspecialchars($e['deskripsi']); ?><br>
                    </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
