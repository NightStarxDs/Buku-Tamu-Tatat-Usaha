<?php
include 'koneksi.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// DEBUG WAJIB SEKALI SAJA
// var_dump($_POST); exit;

// VALIDASI KERAS
$required = [
  'guest_name','email','phone_number','company_name',
  'visit_date','time_in','time_out','appointment','status'
];

foreach ($required as $field) {
  if (empty($_POST[$field])) {
    die("Field $field wajib diisi");
  }
}

$guest_name   = $_POST['guest_name'];
$email        = $_POST['email'];
$phone_number = $_POST['phone_number'];
$company_name = $_POST['company_name'];
$visit_desc   = $_POST['visit_desc'] ?? null;
$visit_date   = $_POST['visit_date'];
$time_in      = $_POST['time_in'];
$time_out     = $_POST['time_out'];
$appointment  = $_POST['appointment'];
$status       = $_POST['status'];

$id_unit = null;
$id_staf = null;

$sql = "INSERT INTO visit_data (
  guest_name, email, phone_number, company_name,
  visit_desc, id_unit, id_staf,
  visit_date, time_in, time_out,
  appointment, status
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($koneksi, $sql);

mysqli_stmt_bind_param(
  $stmt,
  "sssssiiissss",
  $guest_name,
  $email,
  $phone_number,
  $company_name,
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
