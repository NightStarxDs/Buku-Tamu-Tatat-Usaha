<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION['username'];
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];

    if (empty($password_lama) || empty($password_baru)) {
        echo "<script>
                alert('Semua field harus diisi!');
                window.location='ganti_passwd.php';
              </script>";
        exit;
    }

    if (strlen($password_baru) < 6) {
        echo "<script>
                alert('Password baru minimal 6 karakter!');
                window.location='ganti_passwd.php';
              </script>";
        exit;
    }

    // Ambil password dari database
    $password_db = null;
    $sql = "SELECT password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($koneksi, $sql);

    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($koneksi));
    }

    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $password_db);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    // Cek apakah user ditemukan
    if (is_null($password_db)) {
        echo "<script>
                alert('User tidak ditemukan!');
                window.location='ganti_passwd.php';
              </script>";
        exit;
    }

    if (md5($password_lama) === $password_db) {
        $password_baru_hash = md5($password_baru);

        $sql_update = "UPDATE users SET password = ? WHERE username = ?";
        $stmt_update = mysqli_prepare($koneksi, $sql_update);

        if (!$stmt_update) {
            die("Update prepare failed: " . mysqli_error($koneksi));
        }

        mysqli_stmt_bind_param($stmt_update, 'ss', $password_baru_hash, $username);

        if (mysqli_stmt_execute($stmt_update)) {
            mysqli_stmt_close($stmt_update);
            echo "<script>
                    alert('Password berhasil diubah!');
                    window.location='dashboard.php';
                  </script>";
        } else {
            mysqli_stmt_close($stmt_update);
            echo "<script>
                    alert('Gagal mengubah password!');
                    window.location='ganti_passwd.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Password lama salah!');
                window.location='ganti_passwd.php';
              </script>";
    }
} else {
    header("Location: ganti_passwd.php");
    exit;
}
