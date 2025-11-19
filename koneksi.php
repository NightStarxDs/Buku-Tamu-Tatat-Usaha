<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'guest_book');

if (!$koneksi) {
    echo "Koneksi Anda Gagal";
}

?>