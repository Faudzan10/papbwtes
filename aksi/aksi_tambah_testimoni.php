<?php
require __DIR__ . '/../config/koneksi.php';

$nama = $_POST['nama'] ?? '';
$komentar = $_POST['komentar'] ?? '';
$rating = (int)($_POST['rating'] ?? 0);

if ($nama === '' || $komentar === '' || $rating < 1 || $rating > 5) {
    header("Location: ../index.php");
    exit;
}

$status = 'tampil';

$stmt = mysqli_prepare($conn, "INSERT INTO testimoni (nama, komentar, rating, status) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssis", $nama, $komentar, $rating, $status);
mysqli_stmt_execute($stmt);

header("Location: ../index.php");
exit;
?>