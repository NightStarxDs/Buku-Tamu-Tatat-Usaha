<?php
$conn = mysqli_connect("localhost", "root", "", "visitlog_db");

if (!$conn) {
    die("DB Connection Failed: " . mysqli_connect_error());
}
?>
