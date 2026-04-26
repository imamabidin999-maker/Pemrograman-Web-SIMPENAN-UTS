<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");
    
    if (mysqli_num_rows($result) === 1) {
        $user_data = mysqli_fetch_assoc($result);
        if (password_verify($password, $user_data['password'])) {
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['role']     = $user_data['role'];

            // WAJIB: Pastikan sesi tersimpan sebelum redirect di Vercel
            session_write_close(); 

            if ($user_data['role'] === 'admin') {
                // Gunakan path absolut sesuai rute vercel.json
                header("Location: /admin/index.php"); 
            } else {
                // Gunakan /dashboard (bukan dashboard.php) agar sesuai rute Vercel
                header("Location: /dashboard"); 
            }
            exit();
        }
    }
    echo "<script>alert('Username atau Password Salah!'); window.location='../login.php';</script>";
}
?>