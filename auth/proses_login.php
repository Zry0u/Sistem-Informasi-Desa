<?php
session_start();
include "../config/koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']); // sementara MD5 (aman untuk tugas)

$query = mysqli_query($koneksi, 
    "SELECT * FROM users WHERE username='$username' AND password='$password'"
);

$data = mysqli_fetch_assoc($query);

if ($data) {
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nama']    = $data['nama'];
    $_SESSION['role']    = $data['role'];

    if ($data['role'] == 'admin') {
        header("Location: ../admin/dashboard.php");
    } else {
        header("Location: ../warga/dashboard.php");
    }
} else {
    echo "<script>
        alert('Login gagal! Username atau password salah');
        window.location='login.php';
    </script>";
}
?>
