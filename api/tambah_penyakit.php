<?php
include __DIR__ . '/koneksi.php';

if(!isset($_COOKIE['role']) || $_COOKIE['role'] !== 'admin') {
    header("Location: /login");
    exit();
}

$nama_form = isset($_POST['nama_penyakit']) ? $_POST['nama_penyakit'] : (isset($_POST['nama']) ? $_POST['nama'] : '');
$deskripsi = isset($_POST['deskripsi']) ? mysqli_real_escape_string($koneksi, $_POST['deskripsi']) : '';

if (!empty($nama_form)) {
    $nama = mysqli_real_escape_string($koneksi, $nama_form);
    $gambar = "default.png"; 

    $query = "INSERT INTO penyakit (nama, deskripsi, gambar) VALUES ('$nama', '$deskripsi', '$gambar')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: /admin/kelola_penyakit.php");
        exit();
    } else {
        echo "Database Error: " . mysqli_error($koneksi);
    }
} else {
    echo "<script>alert('Gagal: Nama penyakit tidak terisi!'); window.location='/admin/kelola_penyakit.php';</script>";
}
?>