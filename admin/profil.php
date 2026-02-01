<?php
session_start();

// Cek login admin
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-success">
    <div class="container">
        <span class="navbar-brand">Profil Admin</span>
        <a href="dashboard.php" class="btn btn-outline-light btn-sm">
            Kembali
        </a>
    </div>
</nav>

<div class="container mt-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-body text-center">

            <h4 class="mb-3">🚧 Dalam Tahap Pengembangan</h4>

            <p class="text-muted">
                Fitur profil saat ini masih dalam tahap pengembangan.
                Informasi akun dan data pribadi akan tersedia pada pengembangan selanjutnya.
            </p>

            <hr>

            <p class="mb-1">
                <strong>Nama:</strong> <?= $_SESSION['nama']; ?>
            </p>
            <p class="mb-0">
                <strong>Role:</strong> <?= ucfirst($_SESSION['role']); ?>
            </p>

        </div>
    </div>
</div>

<!--background-->
<link rel="stylesheet" href="../assets/style.css">

</body>
</html>
