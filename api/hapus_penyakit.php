<?php
include __DIR__ . '/koneksi.php';

// Proteksi Cookie
if(!isset($_COOKIE['role']) || $_COOKIE['role'] !== 'admin') {
    header("Location: /login");
    exit();
}

if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    mysqli_query($koneksi, "DELETE FROM penyakit WHERE id = '$id'");
}

header("Location: /admin/kelola_penyakit.php");
exit();