<?php
include 'db.php';

$nama = $_POST['nama'];
$instansi = $_POST['instansi'];
$tanggal = $_POST['tanggal'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$datang = $_POST['waktu_datang'];
$pulang = $_POST['waktu_pulang'];
$perihal = $_POST['perihal'];

$query = "INSERT INTO visits 
(nama, instansi, tanggal, email, telepon, waktu_datang, waktu_pulang, perihal) 
VALUES 
('$nama','$instansi','$tanggal','$email','$telepon','$datang','$pulang','$perihal')";

mysqli_query($conn, $query);

header("Location: success.php");
?>
