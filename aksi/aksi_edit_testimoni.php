<?php
require '../config/koneksi.php';

if (isset($_POST['update'])) {
    $id = (int) $_POST['id'];
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $komentar = mysqli_real_escape_string($conn, $_POST['komentar']);
    $rating = (int) $_POST['rating'];
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    mysqli_query($conn, "UPDATE testimoni SET
        nama = '$nama',
        komentar = '$komentar',
        rating = '$rating',
        status = '$status'
        WHERE id = '$id'
    ");
}

header("Location: ../admin/testimoni.php");
exit;
?>