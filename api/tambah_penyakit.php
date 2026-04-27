<?php
include __DIR__ . '/koneksi.php';

if(!isset($_COOKIE['role']) || $_COOKIE['role'] !== 'admin') {
    header("Location: /login");
    exit();
}

if(isset($_POST['nama'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    
    // Default gambar jika tidak upload
    $gambar = "default.png"; 

    // Perbaikan: Gunakan kolom 'nama', bukan 'nama_penyakit'
    $query = "INSERT INTO penyakit (nama, deskripsi, gambar) VALUES ('$nama', '$deskripsi', '$gambar')";
    
    if(mysqli_query($koneksi, $query)) {
        header("Location: /admin/kelola_penyakit.php");
        exit();
    } else {
        echo "Error Database: " . mysqli_error($koneksi);
    }
}
?>