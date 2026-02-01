<?php
session_start();
include "../config/koneksi.php";

if ($_SESSION['role'] != 'warga') {
    header("Location: ../auth/login.php");
}

$id_user = $_SESSION['id_user'];
$data = mysqli_query($koneksi, 
    "SELECT * FROM laporan WHERE id_user='$id_user' ORDER BY tanggal DESC"
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>History Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h4>History Laporan</h4>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>

        <?php $no=1; while($row=mysqli_fetch_assoc($data)) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['judul']; ?></td>
            <td><?= $row['tanggal']; ?></td>
            <td><?= $row['status']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
</div>

<!--background-->
<link rel="stylesheet" href="../assets/style.css">

</body>
</html>
