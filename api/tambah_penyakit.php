<?php
include __DIR__ . '/koneksi.php';

if(!isset($_COOKIE['role']) || $_COOKIE['role'] !== 'admin') {
    header("Location: /login");
    exit();
}

$nama_penyakit = isset($_POST['nama_penyakit']) ? mysqli_real_escape_string($koneksi, $_POST['nama_penyakit']) : '';
$gejala_utama  = isset($_POST['gejala_utama'])  ? mysqli_real_escape_string($koneksi, $_POST['gejala_utama'])  : '';
$ciri_ciri     = isset($_POST['ciri_ciri'])     ? mysqli_real_escape_string($koneksi, $_POST['ciri_ciri'])     : '';
$penanganan    = isset($_POST['penanganan'])    ? mysqli_real_escape_string($koneksi, $_POST['penanganan'])    : '';

if (!empty($nama_penyakit)) {
    $res_id  = mysqli_query($koneksi, "SELECT COALESCE(MAX(id), 0) + 1 AS next_id FROM penyakit");
    $row_id  = mysqli_fetch_assoc($res_id);
    $next_id = (int) $row_id['next_id'];

    $foto = "default.png";
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $ext  = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        if (in_array($ext, $allowed)) {
            $foto = uniqid('penyakit_') . '.' . $ext;
            $dest = __DIR__ . '/../assets/img/penyakit/' . $foto;
            if (!is_dir(dirname($dest))) mkdir(dirname($dest), 0755, true);
            move_uploaded_file($_FILES['foto']['tmp_name'], $dest);
        }
    }

    $query = "INSERT INTO penyakit (id, nama_penyakit, gejala_utama, ciri_ciri, penanganan, foto)
              VALUES ('$next_id', '$nama_penyakit', '$gejala_utama', '$ciri_ciri', '$penanganan', '$foto')";

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