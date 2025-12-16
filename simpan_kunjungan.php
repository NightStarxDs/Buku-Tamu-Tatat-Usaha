<?php
include 'koneksi.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// VALIDASI KERAS (Menambahkan visit_regards)
$required = [
  'guest_name','email','phone_number','company_name',
  'visit_regards', // Tambahkan ini karena NOT NULL di SQL
  'visit_date','time_in','time_out','appointment','status'
];

foreach ($required as $field) {
  if (empty($_POST[$field])) {
    die("Field $field wajib diisi");
  }
}

// Ambil Data dari POST
$guest_name    = $_POST['guest_name'];
$email         = $_POST['email'];
$phone_number  = $_POST['phone_number'];
$company_name  = $_POST['company_name'];
$visit_regards = $_POST['visit_regards']; // Sesuai ENUM di database
$visit_desc    = $_POST['visit_desc'] ?? null;
$visit_date    = $_POST['visit_date'];
$time_in       = $_POST['time_in'];
$time_out      = $_POST['time_out'];
$appointment   = $_POST['appointment'];
$status        = $_POST['status'];

// Tangani id_unit dan id_staf jika dikirim dari form
$id_unit = !empty($_POST['id_unit']) ? $_POST['id_unit'] : null;
$id_staf = !empty($_POST['id_staf']) ? $_POST['id_staf'] : null;

// Query SQL (Menambahkan visit_regards)
$sql = "INSERT INTO visit_data (
  guest_name, email, phone_number, company_name,
  visit_regards, visit_desc, id_unit, id_staf,
  visit_date, time_in, time_out,
  appointment, status
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($koneksi, $sql);

// Binding Param (Total 13 parameter)
// s = string, i = integer
mysqli_stmt_bind_param(
  $stmt,
  "ssssssiisssss", // Perhatikan jumlah 's' dan 'i'
  $guest_name,
  $email,
  $phone_number,
  $company_name,
  $visit_regards,
  $visit_desc,
  $id_unit,
  $id_staf,
  $visit_date,
  $time_in,
  $time_out,
  $appointment,
  $status
);

if (!mysqli_stmt_execute($stmt)) {
  die("GAGAL SIMPAN: " . mysqli_stmt_error($stmt));
}

echo "DATA BERHASIL DISIMPAN";