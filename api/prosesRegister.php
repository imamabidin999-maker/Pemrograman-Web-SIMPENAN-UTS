<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
    $username = strtolower(mysqli_real_escape_string($koneksi, $_POST['username']));
    $email    = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', 'user')";
    if (mysqli_query($koneksi, $query)) {
        header("Location: ../login.php?status=success");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>