<?php
include __DIR__ . '/koneksi.php';

if (strtolower($_COOKIE['username'] ?? '') !== 'imam') {
    die("Akses Ditolak: Hanya Master Admin yang diizinkan menghapus.");
}

$id = mysqli_real_escape_string($koneksi, $_GET['id'] ?? '');
if (empty($id)) {
    header("Location: /admin/kelola_admin.php");
    exit();
}

$query    = "DELETE FROM users WHERE id = '$id' AND role = 'admin'";
$eksekusi = mysqli_query($koneksi, $query);

if ($eksekusi) {
    header("Location: /admin/kelola_admin.php?status=terhapus");
} else {
    echo "Gagal menghapus: " . mysqli_error($koneksi);
}
?>