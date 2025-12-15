<?php
session_start();
include 'koneksi.php';

$user = $_POST['username'];
$pass = $_POST['password'];

$q = mysqli_query($koneksi,
    "SELECT * FROM user WHERE username='$user' AND password='$pass'"
);

if (mysqli_num_rows($q) > 0) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $user;
    header("Location: dashboard.php");
    exit;
} else {
    header("Location: login.php?error=1");
    exit;
}
