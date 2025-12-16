<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: kunjungan_pending.php?status=invalid");
    exit();
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);

// Ambil data tamu dulu sebelum update
$sql_fetch = "SELECT guest_name, phone_number FROM visit_data WHERE id = '$id'";
$result = mysqli_query($koneksi, $sql_fetch);

if (!$result || mysqli_num_rows($result) == 0) {
    header("Location: kunjungan_pending.php?status=not_found");
    exit();
}

$guest_data = mysqli_fetch_assoc($result);

// Update status
$update_query = "UPDATE visit_data SET status = 'Rejected', time_out = NULL WHERE id = '$id'";
$update_success = mysqli_query($koneksi, $update_query);

if (!$update_success) {
    header("Location: kunjungan_pending.php?status=update_fail");
    exit();
}

// Redirect ke WhatsApp
$guest_name = $guest_data['guest_name'];
$phone_number = $guest_data['phone_number'];
$message = "Kepada " . $guest_name . ".\n\nPermintaan Kunjungan Anda *Ditolak*.\n\nUntuk informasi lebih lanjut mengenai penolakan, Anda bisa bertanya pada nomor ini atau Anda bisa menanyakan langsung ke Ruangan Tata Usaha.";
$encoded_message = urlencode($message);
$whatsapp_url = "https://wa.me/" . $phone_number . "?text=" . $encoded_message;

header("Location: " . $whatsapp_url);
exit();
?>