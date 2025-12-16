<?php
session_start();
include 'koneksi.php';

$nama       = $_POST['nama'];
$email      = $_POST['email'];
$pertanyaan = $_POST['perihal']; // dari form, masuk ke kolom pertanyaan
// insert data

$stmt = mysqli_prepare(
    $conn,
    "INSERT INTO pertanyaan_faq (nama, email, pertanyaan)
     VALUES (?, ?, ?)"
);

mysqli_stmt_bind_param(
    $stmt,
    "sss",
    $nama,
    $email,
    $pertanyaan
);

if (mysqli_stmt_execute($stmt)) {
    header("Location: success.php");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
