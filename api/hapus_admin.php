<?php
session_start();
include 'koneksi.php';

if (strtolower($_SESSION['username']) !== 'imam') {
    die("Akses Ditolak: Hanya Master Admin yang diizinkan menghapus.");
}

$id = $_GET['id'];
$query = "DELETE FROM users WHERE id = '$id' AND role = 'admin'";
$eksekusi = mysqli_query($koneksi, $query);

if ($eksekusi) {
    header("Location: ../admin/kelola_admin.php?status=terhapus");
} else {
    echo "Gagal menghapus: " . mysqli_error($koneksi);
}
?>