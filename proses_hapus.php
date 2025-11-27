<?php

include 'koneksi.php';
$id = $_GET['id'];
$query = "DELETE FROM visit_data WHERE id='$id'";
mysqli_query($koneksi, $query);
header("Location: kunjungan_selesai.php");
exit();
