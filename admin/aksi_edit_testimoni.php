<?php
require_once '../config/koneksi.php';

if (isset($_POST['update'])) {
    $id = (int) $_POST['id'];
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $komentar = mysqli_real_escape_string($conn, $_POST['komentar']);
    $rating = (int) $_POST['rating'];
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $query = "UPDATE testimoni SET 
                nama = '$nama',
                komentar = '$komentar',
                rating = '$rating',
                status = '$status'
              WHERE id = '$id'";

    mysqli_query($conn, $query);

    header("Location: testimoni.php");
    exit;
}

header("Location: testimoni.php");
exit;
?>