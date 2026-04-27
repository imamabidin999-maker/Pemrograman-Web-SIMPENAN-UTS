<?php
include __DIR__ . '/koneksi.php';

if (($_COOKIE['role'] ?? '') === 'admin' && isset($_POST['id'])) {
    $id       = mysqli_real_escape_string($koneksi, $_POST['id']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $email    = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];

    mysqli_query($koneksi, "UPDATE users SET username='$username', email='$email' WHERE id='$id'");

    if (!empty($password)) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($koneksi, "UPDATE users SET password='$hashed' WHERE id='$id'");
    }

    echo "<script>alert('Data berhasil diperbarui!'); window.location='/admin/kelola_user.php';</script>";
} else {
    header("Location: /login");
    exit();
}
?>