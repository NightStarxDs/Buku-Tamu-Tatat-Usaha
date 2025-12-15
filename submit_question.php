<?php
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$question = $_POST['question'];

$stmt = mysqli_prepare(
    $conn,
    "INSERT INTO pertanyaan_faq (nama, email, pertanyaan) VALUES (?, ?, ?)"
);

mysqli_stmt_bind_param($stmt, "sss", $name, $email, $question);

if (mysqli_stmt_execute($stmt)) {
    header("Location: succees2.php");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
