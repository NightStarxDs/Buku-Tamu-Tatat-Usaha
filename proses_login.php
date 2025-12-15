<?php
session_start();
include 'koneksi.php';

$user = md5($_POST['username']);
$pass = md5($_POST['password']);

$q = mysqli_query($koneksi,
    "SELECT * FROM user WHERE username='$user' AND password='$pass' LIMIT 1"
);

if (mysqli_num_rows($q) === 1) {
    $data = mysqli_fetch_assoc($q);

    $_SESSION['login'] = true;
    $_SESSION['username'] = $_POST['username'];

    header("Location: dashboard.php");
    exit;
}

header("Location: login.php?error=1");
exit;
