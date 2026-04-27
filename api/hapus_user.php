<?php
include __DIR__ . '/koneksi.php';

if(!isset($_COOKIE['role']) || $_COOKIE['role'] !== 'admin') {
    header("Location: /login");
    exit();
}

if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    
    mysqli_query($koneksi, "DELETE FROM users WHERE id = '$id'");

    header("Location: /admin/kelola_user.php");
    exit();
} else {
    header("Location: /admin/kelola_user.php");
    exit();
}
?>