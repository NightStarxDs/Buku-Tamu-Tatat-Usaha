<?php
session_start();
include 'koneksi.php';

// Cek login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Validasi POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['username_baru'])) {
    header("Location: profil.php");
    exit;
}

$new_username = trim($_POST['username_baru']);
$current_username = $_SESSION['username'];

// Validasi input
if (empty($new_username)) {
    $pesan = "Username tidak boleh kosong!";
} elseif (strlen($new_username) < 5) {
    $pesan = "Username minimal 5 karakter.";
} elseif ($new_username === $current_username) {
    $pesan = "Username tidak boleh sama dengan yang sekarang.";
} else {
    // Cek username sudah ada
    $stmt = mysqli_prepare($koneksi, "SELECT username FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, 's', $new_username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    
    if (mysqli_stmt_num_rows($stmt) > 0) {
        $pesan = "Username sudah digunakan!";
    } else {
        // Update username
        mysqli_stmt_close($stmt);
        $stmt = mysqli_prepare($koneksi, "UPDATE users SET username = ? WHERE username = ?");
        mysqli_stmt_bind_param($stmt, 'ss', $new_username, $current_username);
        
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['username'] = $new_username;
            mysqli_stmt_close($stmt);
            echo "<script>alert('Username berhasil diubah!'); window.location='dashboard.php';</script>";
            exit;
        } else {
            $pesan = "Gagal mengubah username!";
        }
    }
    mysqli_stmt_close($stmt);
}

// Tampilkan error jika ada
echo "<script>alert('$pesan'); window.location='profil.php';</script>";
?>