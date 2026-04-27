<?php
session_start(['cookie_path' => '/']);
include 'koneksi.php';

if (strtolower($_SESSION['username']) !== 'imam') {
    die("Akses Ditolak: Anda bukan Master Admin.");
}

$user = mysqli_real_escape_string($koneksi, $_POST['username']);
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

$query = "INSERT INTO users (username, password, role) VALUES ('$user', '$pass', 'admin')";
if(mysqli_query($koneksi, $query)) {
    header("Location: ../admin/kelola_admin.php?status=admin_baru");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>