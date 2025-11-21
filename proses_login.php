<?php
session_start();
include 'db.php';

// Mengambil input
$username = $_POST['username'];
$password = md5($_POST['password']); 

// Query cek user
$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");

if (mysqli_num_rows($query) > 0) {
    $_SESSION['username'] = $username;
    header("Location: dashboard.php"); // masuk dashboard
    exit();
} else {
    echo "Username atau password salah!";
}
?>
