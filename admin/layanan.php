<?php
session_start();
include "../config/koneksi.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM layanan_desa LIMIT 1"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Status Layanan Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<!--background-->
<link rel="stylesheet" href="../assets/style.css">

<body>

<div class="container mt-4">
    <h4>Status Layanan Desa</h4>

    <form method="POST">
        <div class="mb-3">
            <label>Status Layanan</label>
            <select name="status" class="form-select">
                <option value="Aktif" <?= $data['status']=='Aktif'?'selected':''; ?>>Aktif</option>
                <option value="Tutup" <?= $data['status']=='Tutup'?'selected':''; ?>>Tutup</option>
            </select>
        </div>

        <button name="simpan" class="btn btn-success">Simpan</button>
        <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>

<?php
if (isset($_POST['simpan'])) {
    $status = $_POST['status'];
    mysqli_query($koneksi, "UPDATE layanan_desa SET status='$status' WHERE id=".$data['id']);
    header("Location: layanan.php");
}
?>
