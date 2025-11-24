<?php
session_start(); // Untuk memulai session
include 'db.php'; // Panggil koneksi database

// Ambil data dari form
$admin = $_POST['admin'];
$password_admin = $_POST['password'];

// Enkripsi password dengan MD5 (agar sama dengan di database)
$password_enkripsi = md5($password_admin);

// Query untuk cek apakah admin dan password cocok
$query = "SELECT * FROM users WHERE admin='$admin' AND password='$password_enkripsi'";
$result = mysqli_query($koneksi, $query);

// Hitung jumlah baris hasil query
$cek = mysqli_num_rows($result);

if ($cek > 0) {
    // Jika cocok, ambil datanya
    $data = mysqli_fetch_assoc($result);

    // Buat session login
    $_SESSION['admin'] = $data['admin'];
    $_SESSION['status'] = "login";

    // Arahkan ke halaman dashboard
    header("Location: admin.php");
} else {
    // Jika tidak cocok
    echo "Username atau password salah!";
}
?>
