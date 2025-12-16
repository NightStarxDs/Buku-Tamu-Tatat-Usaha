<?php
include 'koneksi.php';

// Cek apakah tombol simpan diklik
if (isset($_POST['update']) || $_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Ambil ID dari input hidden
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

    // Inilah yang memicu pesan error jika ID-nya 0 atau kosong
    if ($id <= 0) {
        die("ID tidak valid! Pastikan input hidden ID sudah ada di form edit.");
    }

    // Ambil data lainnya dari form
    $guest_name    = mysqli_real_escape_string($koneksi, $_POST['guest_name']);
    $email         = mysqli_real_escape_string($koneksi, $_POST['email']);
    $phone_number  = mysqli_real_escape_string($koneksi, $_POST['phone_number']);
    $company_name  = mysqli_real_escape_string($koneksi, $_POST['company_name']);
    $visit_regards = mysqli_real_escape_string($koneksi, $_POST['visit_regards']);
    $visit_date    = mysqli_real_escape_string($koneksi, $_POST['visit_date']);
    $status        = mysqli_real_escape_string($koneksi, $_POST['status']);
    $time_in       = $_POST['time_in'];
    $time_out      = $_POST['time_out'];

    // Query Update
    $sql = "UPDATE visit_data SET 
            guest_name = '$guest_name',
            email = '$email',
            phone_number = '$phone_number',
            company_name = '$company_name',
            visit_regards = '$visit_regards',
            visit_date = '$visit_date',
            status = '$status',
            time_in = '$time_in',
            time_out = '$time_out'
            WHERE id = $id";

    if (mysqli_query($koneksi, $sql)) {
        echo "<script>alert('Perubahan berhasil disimpan!'); window.location='kunjungan_berjalan.php';</script>";
    } else {
        echo "Gagal mengupdate: " . mysqli_error($koneksi);
    }
} else {
    echo "Akses ditolak!";
}
?>