<?php
session_start();
include "koneksi.php";

$username = md5($_POST['username']);
$password = md5($_POST['password']);

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);

    $_SESSION['username'] = $data['username'];
    $_SESSION['login'] = true;

    header("Location: dashboard.php");
} else {
    echo "<script>alert('Username atau password salah!'); window.location='form.php';</script>";
}
