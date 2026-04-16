<?php
require_once 'config/koneksi.php';

$query = "SELECT * FROM testimoni 
          WHERE status = 'tampil' 
          ORDER BY id DESC 
          LIMIT 3";

$testimoni = mysqli_query($conn, $query);

if (isset($_POST['kirim_testimoni'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $komentar = mysqli_real_escape_string($conn, $_POST['komentar']);
    $rating = (int) $_POST['rating'];

    $query_insert = "INSERT INTO testimoni (nama, komentar, rating, status) 
                     VALUES ('$nama', '$komentar', '$rating', 'pending')";

    mysqli_query($conn, $query_insert);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>