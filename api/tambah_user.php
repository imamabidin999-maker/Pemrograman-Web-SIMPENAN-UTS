<?php
include 'koneksi.php';

$user = mysqli_real_escape_string($koneksi, $_POST['username']);
$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

$query = "INSERT INTO users (username, email, password, role) VALUES ('$user', '$email', '$pass', 'user')";
if(mysqli_query($koneksi, $query)) {
    header("Location: ../admin/kelola_user.php?status=sukses");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>