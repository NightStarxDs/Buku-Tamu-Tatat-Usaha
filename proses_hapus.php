<?php
require 'koneksi.php';

$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php';

$query = "DELETE FROM visit_data WHERE id='$id'";
mysqli_query($koneksi, $query);

header("Location: " . $redirect);
exit();
