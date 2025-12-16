<?php
require 'koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: kunjungan_pending.php");
    exit;
}

$id = (int) $_GET['id'];

// Update status jadi Rejected
$update_query = "
    UPDATE visit_data 
    SET status = 'Rejected', time_out = NULL 
    WHERE id = $id
";

if (!mysqli_query($koneksi, $update_query)) {
    header("Location: kunjungan_pending.php?status=update_fail");
    exit;
}

// Ambil data tamu
$sql_fetch = "
    SELECT nama_tamu, telepon 
    FROM visit_data 
    WHERE id = $id
";

$result = mysqli_query($koneksi, $sql_fetch);

if (!$result || mysqli_num_rows($result) === 0) {
    header("Location: kunjungan_pending.php?status=db_error");
    exit;
}

$guest_data = mysqli_fetch_assoc($result);

// INI YANG BENAR
$nama_tamu = $guest_data['nama_tamu'];
$telepon   = $guest_data['telepon'];

// Pesan WhatsApp
$message = "Kepada $nama_tamu.\n\n"
         . "Permintaan Kunjungan Anda *DITOLAK*.\n\n"
         . "Untuk informasi lebih lanjut, silakan hubungi Tata Usaha.";

$encoded_message = urlencode($message);

// Format nomor (opsional tapi disarankan)
$telepon = preg_replace('/[^0-9]/', '', $telepon);
if (substr($telepon, 0, 1) === '0') {
    $telepon = '62' . substr($telepon, 1);
}

$whatsapp_url = "https://wa.me/$telepon?text=$encoded_message";

header("Location: $whatsapp_url");
exit;
