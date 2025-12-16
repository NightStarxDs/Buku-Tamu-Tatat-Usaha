<?php
require 'auth.php';
require 'koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: arsip_kunjungan.php");
    exit;
}

$id = (int) $_GET['id'];

mysqli_query($koneksi, "
    DELETE FROM visit_data
    WHERE id = $id
");

header("Location: arsip_kunjungan.php");
exit;
