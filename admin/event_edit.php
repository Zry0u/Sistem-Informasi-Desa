<?php
session_start();
include "../config/koneksi.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

$id = $_GET['id'];
$data = mysqli_fetch_assoc(
    mysqli_query($koneksi, "SELECT * FROM event_desa WHERE id_event='$id'")
);

if (!$data) {
    echo "Event tidak ditemukan.";
    exit;
}

if (isset($_POST['update'])) {
    mysqli_query($koneksi, "
        UPDATE event_desa SET
        judul_event='$_POST[judul]',
        deskripsi='$_POST[deskripsi]',
        tanggal='$_POST[tanggal]',
        waktu='$_POST[waktu]',
        lokasi='$_POST[lokasi]'
        WHERE id_event='$id'
    ");
    header("Location: event.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<!--background-->
<link rel="stylesheet" href="../assets/style.css">

<body>

<nav class="navbar navbar-dark bg-success">
    <div class="container">
        <span class="navbar-brand">Edit Event Desa</span>
        <a href="event.php" class="btn btn-outline-light btn-sm">Kembali</a>
    </div>
</nav>

<div class="container mt-4">

    <form method="POST">
        <div class="mb-3">
            <label>Judul Event</label>
            <input type="text" name="judul" class="form-control" value="<?php echo htmlspecialchars($data['judul_event']); ?>" required>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="<?php echo htmlspecialchars($data['tanggal']); ?>" required>
        </div>

        <div class="mb-3">
            <label>Waktu</label>
            <input type="time" name="waktu" class="form-control" value="<?php echo htmlspecialchars($data['waktu']); ?>">
        </div>

        <div class="mb-3">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="<?php echo htmlspecialchars($data['lokasi']); ?>">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"><?php echo htmlspecialchars($data['deskripsi']); ?></textarea>
        </div>

        <button name="update" class="btn btn-success">Update</button>
        <a href="event.php" class="btn btn-secondary">Batal</a>
    </form>
</div>

</body>
</html>
