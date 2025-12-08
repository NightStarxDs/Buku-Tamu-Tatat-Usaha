<?php

include 'koneksi.php';
$id = $_GET['id'];

$update_query = "UPDATE visit_data SET status = 'Upcoming' WHERE id = '$id'";
$update_success = mysqli_query($koneksi, $update_query);

if ($update_success) {

    $sql_fetch = "SELECT guest_name, phone_number FROM visit_data WHERE id = '$id'";
    $result = mysqli_query($koneksi, $sql_fetch);

    if ($result && $guest_data = mysqli_fetch_assoc($result)) {

        $guest_name = $guest_data['guest_name'];
        $phone_number = $guest_data['phone_number'];

        $message = "Kepada " . $guest_name . ".\n\nPermintaan Kunjungan Anda *Diterima*.\n\nUntuk informasi lebih lanjut mengenai kunjungan, Anda bisa bertanya pada nomor ini atau Anda bisa menananyakan langsung ke Ruangan Tata Usaha.";

        $encoded_message = urlencode($message);

        $whatsapp_url = "https://wa.me/" . $phone_number . "?text=" . $encoded_message;

        header("Location: " . $whatsapp_url);
        exit();
    } else {
        header("Location: kunjungan_pending.php?status=db_error");
        exit();
    }
} else {
    header("Location: kunjungan_pending.php?status=update_fail");
    exit();
}
