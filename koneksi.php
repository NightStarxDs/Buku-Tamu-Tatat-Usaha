<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_tata_usaha"; // ganti dengan nama database Anda

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
