<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM penyakit WHERE id = '$id'";
    
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data penyakit berhasil dihapus!'); window.location='../admin/kelola_penyakit.php';</script>";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    header("Location: ../admin/kelola_penyakit.php");
}
?>