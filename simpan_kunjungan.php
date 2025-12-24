<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $guest_name    = mysqli_real_escape_string($koneksi, $_POST['guest_name']);
  $email         = mysqli_real_escape_string($koneksi, $_POST['email']);
  $phone_number  = mysqli_real_escape_string($koneksi, $_POST['phone_number']);
  $company_name  = mysqli_real_escape_string($koneksi, $_POST['company_name']);
  $visit_regards = mysqli_real_escape_string($koneksi, $_POST['visit_regards']);
  $visit_desc    = mysqli_real_escape_string($koneksi, $_POST['visit_desc']);
  $visit_date    = mysqli_real_escape_string($koneksi, $_POST['visit_date']);
  $time_in       = mysqli_real_escape_string($koneksi, $_POST['time_in']);
  $time_out      = mysqli_real_escape_string($koneksi, $_POST['time_out']);

  $id_staf = NULL;
  $id_unit = NULL;
  $status = 'Upcoming';

  if ($visit_regards == 'Janji_temu_staf' || $visit_regards == 'Janji_temu_unit') {
    $appointment = mysqli_real_escape_string($koneksi, $_POST['appointment']);

    if ($appointment == 'No') {
      $status = 'Pending';
    } elseif ($appointment == 'Yes') {
      $status = 'Upcoming';
    }

    if ($visit_regards == 'Janji_temu_staf' && !empty($_POST['staf_tujuan'])) {
      $id_staf = mysqli_real_escape_string($koneksi, $_POST['staf_tujuan']);
    }

    if ($visit_regards == 'Janji_temu_unit' && !empty($_POST['unit_tujuan'])) {
      $id_unit = mysqli_real_escape_string($koneksi, $_POST['unit_tujuan']);
    }
  }

  $sql = "INSERT INTO visit_data (
                guest_name, email, phone_number, company_name, 
                visit_regards, visit_desc, visit_date, 
                time_in, time_out, status, 
                id_staf, id_unit
            ) VALUES (
                '$guest_name', '$email', '$phone_number', '$company_name', 
                '$visit_regards', '$visit_desc', '$visit_date', 
                '$time_in', '$time_out', '$status', 
                " . ($id_staf ? "'$id_staf'" : "NULL") . ", 
                " . ($id_unit ? "'$id_unit'" : "NULL") . "
            )";

  if (mysqli_query($koneksi, $sql)) {
    echo "<script>
            alert('Data kunjungan berhasil disimpan!');
            window.location.href = 'tamu.php';
          </script>";
  } else {
    echo "<script>
            alert('Gagal menyimpan data: " . mysqli_error($koneksi) . "');
            window.location.href = 'tamu.php';
          </script>";
  }

  mysqli_close($koneksi);
} else {
  header("Location: tamu.php");
  exit();
}
