<?php
session_start(['cookie_path' => '/']);
include 'koneksi.php';

if ($_SESSION['role'] === 'admin' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];

    $query = "UPDATE users SET username='$username', email='$email' WHERE id='$id'";
    mysqli_query($koneksi, $query);

    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($koneksi, "UPDATE users SET password='$hashed_password' WHERE id='$id'");
    }

    echo "<script>alert('Data berhasil diperbarui!'); window.location='../admin/kelola_user.php';</script>";
}
?>