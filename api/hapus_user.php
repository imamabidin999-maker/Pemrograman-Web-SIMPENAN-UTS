<?php
session_start(['cookie_path' => '/']);
include 'koneksi.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM users WHERE id = '$id' AND role = 'user'";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('User berhasil dihapus!'); window.location='../admin/kelola_user.php';</script>";
    } else {
        echo "Gagal menghapus: " . mysqli_error($koneksi);
    }
}
?>