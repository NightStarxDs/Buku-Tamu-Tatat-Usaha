<?php
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']); // enkripsi sama dengan di database

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($query);

if ($cek > 0) {
    session_start();
    $_SESSION['username'] = $username;

    header("Location: admin.php");
    exit;
} else {
    echo "<script>alert('Login gagal! Username atau password salah'); window.location='login.php';</script>";
}
?>
