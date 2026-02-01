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
    <title>Cetak Laporan Desa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2, h4 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 12px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 6px;
        }
        th {
            background-color: #f2f2f2;
        }
        .ttd {
            margin-top: 60px;
            text-align: right;
        }
    </style>
</head>
<body onload="window.print()">

<h2>LAPORAN PENGADUAN WARGA</h2>
<h4>Sistem Informasi Perdesaan</h4>

<table>
    <tr>
        <th>No</th>
        <th>Nama Warga</th>
        <th>Judul Laporan</th>
        <th>Isi Laporan</th>
        <th>Tanggal</th>
        <th>Status</th>
    </tr>

    <?php $no=1; while($row=mysqli_fetch_assoc($data)) { ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['judul']; ?></td>
        <td><?= $row['isi_laporan']; ?></td>
        <td><?= $row['tanggal']; ?></td>
        <td><?= $row['status']; ?></td>
    </tr>
    <?php } ?>
</table>

<div class="ttd">
    <p>Mengetahui,</p>
    <p><b>Kepala Desa</b></p>
    <br><br>
    <p>(Saya Sendiri kepala desa)</p>
</div>

</body>
</html>
