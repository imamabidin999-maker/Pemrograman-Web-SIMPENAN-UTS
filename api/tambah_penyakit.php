<?php
include __DIR__ . '/koneksi.php';

if(!isset($_COOKIE['role']) || $_COOKIE['role'] !== 'admin') {
    header("Location: /login");
    exit();
}

$nama_input = isset($_POST['nama_penyakit']) ? $_POST['nama_penyakit'] : (isset($_POST['nama']) ? $_POST['nama'] : '');
$deskripsi_input = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : '';

if(!empty($nama_input)) {
    $nama = mysqli_real_escape_string($koneksi, $nama_input);
    $deskripsi = mysqli_real_escape_string($koneksi, $deskripsi_input);
    $gambar = "default.png";

    $query = "INSERT INTO penyakit (nama, deskripsi, gambar) VALUES ('$nama', '$deskripsi', '$gambar')";
    
    if(mysqli_query($koneksi, $query)) {
        header("Location: /admin/kelola_penyakit.php");
        exit();
    } else {
        echo "Error Database: " . mysqli_error($koneksi);
    }
} else {
    echo "<script>
        alert('Gagal: Kolom Nama Penyakit tidak boleh kosong!'); 
        window.location='/admin/kelola_penyakit.php';
    </script>";
}
?>