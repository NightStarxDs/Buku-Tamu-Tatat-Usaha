<?php
session_start();
include 'koneksi.php';

$user = mysqli_real_escape_string($koneksi, $_POST['username']);
$pass = md5($_POST['password']);

$q = mysqli_query(
    $koneksi,
    "SELECT * FROM users WHERE username='$user' AND password='$pass' LIMIT 1"
);

if (mysqli_num_rows($q) === 1) {
    $data = mysqli_fetch_assoc($q);

    $_SESSION['login'] = true;
    $_SESSION['username'] = $data['username'];

    header("Location: dashboard.php");
    exit;
} else {
    // Menggunakan alert biasa dan kembali ke login.php
    echo "<script>
            alert('Maaf Username Atau Password Salah');
            window.location.href = 'login.php';
          </script>";
    exit;
}
