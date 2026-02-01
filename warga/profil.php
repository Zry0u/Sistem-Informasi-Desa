<?php
session_start();

// Cek login warga
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'warga') {
    header("Location: ../auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <span class="navbar-brand">Profil Warga</span>
        <a href="dashboard.php" class="btn btn-outline-light btn-sm">
            Kembali
        </a>
    </div>
</nav>

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h4 class="mb-3">🚧 Dalam Tahap Pengembangan</h4>

                    <p class="text-muted">
                        Fitur profil saat ini masih dalam tahap pengembangan.
                        <br>
                        Informasi akun dan data pribadi akan tersedia pada pengembangan selanjutnya.
                    </p>

                    <hr>

                    <p class="mb-1">
                        <strong>Nama:</strong> <?= $_SESSION['nama']; ?>
                    </p>
                    <p class="mb-0">
                        <strong>Role:</strong> Warga
                    </p>
                </div>
            </div>

        </div>
    </div>

</div>

<!--background-->
<link rel="stylesheet" href="../assets/style.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
