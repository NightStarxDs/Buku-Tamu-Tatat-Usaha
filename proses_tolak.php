<?php
include 'koneksi.php';
$id = $_GET['id'];
$update_query = "UPDATE visit_data SET status = 'Rejected', time_out = NULL WHERE id = '$id'";
$update_success = mysqli_query($koneksi, $update_query);
if ($update_success) 