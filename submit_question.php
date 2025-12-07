<?php
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$question = $_POST['question'];

$query = "INSERT INTO pertanyaan_faq (nama, email, pertanyaan)
          VALUES ('$name', '$email', '$question')";

if (mysqli_query($conn, $query)) {
    header("Location: succees2.php");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
