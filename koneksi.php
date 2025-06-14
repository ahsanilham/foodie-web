<?php
$host       = 'foodiepemweb-foodie2.b.aivencloud.com';
$port       = 23801;
$username   = 'avnadmin';
$password   = 'AVNS_EZlmc-hCNd3lUvyxMq5';
$database   = 'db_foodie';
$ssl_ca     = __DIR__ . '/ca.pem'; // Ganti sesuai lokasi file CA dari Aiven

// Buat koneksi MySQL dengan SSL
$conn = mysqli_init();
$conn->ssl_set(NULL, NULL, $ssl_ca, NULL, NULL);


// Coba koneksi
if (!$conn->real_connect($host, $username, $password, $database, $port, NULL, MYSQLI_CLIENT_SSL)) {
    die('Koneksi gagal: ' . mysqli_connect_error());
}

