<?php
include __DIR__ . '/koneksi.php';

if(!isset($_COOKIE['role']) || $_COOKIE['role'] !== 'admin') {
    header("Location: /login");
    exit();
}

if(isset($_POST['username']) && isset($_POST['password'])) { 
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $email    = mysqli_real_escape_string($koneksi, $_POST['email'] ?? '');
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role     = 'user';

    $query = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";
    
    if(mysqli_query($koneksi, $query)) {
        header("Location: /admin/kelola_user.php");
        exit();
    } else {
        echo "Error Database: " . mysqli_error($koneksi);
    }
}
?>