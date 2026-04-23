<?php
$host = 'gateway01.ap-southeast-1.prod.alicloud.tidbcloud.com';
$port = 4000;
$user = '2Vzj4pSZjsdQK7C.root';
$pass = 'QGg7Imvucz85WjP0';
$db   = 'pemweb-SIMPENAN';

$koneksi = mysqli_init();

mysqli_ssl_set($koneksi, NULL, NULL, NULL, NULL, NULL);

$real_connect = mysqli_real_connect(
    $koneksi, 
    $host, 
    $user, 
    $pass, 
    $db, 
    $port, 
    NULL, 
    MYSQLI_CLIENT_SSL
);

if (!$real_connect) {
    die("Koneksi ke TiDB Cloud gagal: " . mysqli_connect_error());
}
?>