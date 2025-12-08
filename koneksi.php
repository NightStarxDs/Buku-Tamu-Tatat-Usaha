<?php
$host = "localhost";
$user = "root";
$pass = "root";
$db   = "guest_book";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
