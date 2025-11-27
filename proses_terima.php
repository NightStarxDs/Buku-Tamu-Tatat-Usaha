<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "UPDATE visit_data SET status='Upcoming' WHERE id='$id'";
mysqli_query($koneksi, $query);
header("Location: kunjungan_pending.php");
exit();
