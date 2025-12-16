<?php
session_start();
include 'koneksi.php';

// insert data

header("Location: form.php?status=sukses");
header("Location: tamu.php?status=sukses");
exit;