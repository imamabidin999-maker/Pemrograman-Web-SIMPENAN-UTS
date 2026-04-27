<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama   = mysqli_real_escape_string($koneksi, $_POST['nama_penyakit']);
    $gejala = mysqli_real_escape_string($koneksi, $_POST['gejala_utama']);
    $ciri   = mysqli_real_escape_string($koneksi, $_POST['ciri_ciri']);
    $obat   = mysqli_real_escape_string($koneksi, $_POST['penanganan']);

    $foto_name = $_FILES['foto']['name'];
    $foto_tmp  = $_FILES['foto']['tmp_name'];
    
    if(!empty($foto_name)){
        $ekstensi = pathinfo($foto_name, PATHINFO_EXTENSION);
        $new_name = "penyakit_" . time() . "." . $ekstensi;
        $target   = "/assets/img/penyakit/" . $new_name;
        
        move_uploaded_file($foto_tmp, $target);
        $foto_db = $new_name;
    } else {
        $foto_db = "";
    }

    $query = "INSERT INTO penyakit (nama_penyakit, gejala_utama, ciri_ciri, penanganan, foto) 
              VALUES ('$nama', '$gejala', '$ciri', '$obat', '$foto_db')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: ../admin/kelola_penyakit.php?status=sukses");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>