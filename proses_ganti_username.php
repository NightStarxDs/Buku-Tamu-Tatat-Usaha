<?php
session_start();
// Asumsi 'koneksi.php' menyediakan objek koneksi MySQLi: $koneksi
include 'koneksi.php';

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Cek apakah data POST telah dikirim
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['username_baru'])) {
    // Arahkan kembali jika tidak ada POST data
    header("Location: profil.php"); // Ganti dengan halaman form yang relevan
    exit;
}

$new_username = trim($_POST['username_baru']);
$current_username = $_SESSION['username'];
$pesan_error = '';

// --- 1. Validasi Input ---

// Pastikan username baru tidak kosong
if (empty($new_username)) {
    $pesan_error = "Username baru tidak boleh kosong!";
}
// Tambahkan validasi panjang atau karakter lain jika diperlukan
else if (strlen($new_username) < 5) {
    $pesan_error = "Username baru minimal 5 karakter.";
}
// Pastikan username baru tidak sama dengan yang lama
else if ($new_username === $current_username) {
    $pesan_error = "Username baru tidak boleh sama dengan username saat ini.";
}


if (!empty($pesan_error)) {
    echo "<script>
            alert('$pesan_error');
            window.location='profil.php'; // Ganti ke halaman form
          </script>";
    exit;
}


// --- 2. Cek Username Baru Sudah Ada (Penting!) ---
$sql_check = "SELECT username FROM users WHERE username = ?";
$stmt_check = mysqli_prepare($koneksi, $sql_check);
mysqli_stmt_bind_param($stmt_check, 's', $new_username);
mysqli_stmt_execute($stmt_check);
mysqli_stmt_store_result($stmt_check);

if (mysqli_stmt_num_rows($stmt_check) > 0) {
    mysqli_stmt_close($stmt_check);
    echo "<script>
            alert('Username $new_username sudah digunakan oleh pengguna lain!');
            window.location='profil.php'; // Ganti ke halaman form
          </script>";
    exit;
}
mysqli_stmt_close($stmt_check);


// --- 3. Proses Update Username (Menggunakan Prepared Statement) ---

$sql_update = "UPDATE users SET username = ? WHERE username = ?";
$stmt_update = mysqli_prepare($koneksi, $sql_update);

// Cek jika prepare gagal
if (!$stmt_update) {
    die("Prepare failed: " . mysqli_error($koneksi));
}

// 'ss' menandakan dua parameter bertipe string (username baru, username lama)
mysqli_stmt_bind_param($stmt_update, 'ss', $new_username, $current_username);

if (mysqli_stmt_execute($stmt_update)) {

    // Sukses: Update variabel sesi dan berikan notifikasi
    $_SESSION['username'] = $new_username;

    mysqli_stmt_close($stmt_update);
    echo "<script>
            alert('Username berhasil diubah menjadi $new_username!');
            window.location='dashboard.php'; 
          </script>";
} else {

    // Gagal update
    mysqli_stmt_close($stmt_update);
    echo "<script>
            alert('Gagal mengubah username: " . mysqli_error($koneksi) . "');
            window.location='profil.php';
          </script>";
}
