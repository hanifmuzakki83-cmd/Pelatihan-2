<?php
$host = "localhost";
$user = "root";     // Default user XAMPP/Laragon
$pass = "";         // Default password kosong
$db   = "db_kursus";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>