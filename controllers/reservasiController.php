<?php
require_once __DIR__ . '/../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama = $_POST['nama'];
    $tanggal = date('Y-m-d', strtotime($_POST['tanggal']));
    $jumlah = $_POST['jumlah'];
    $jenis = $_POST['jenis'];

    $query = "INSERT INTO reservasi (nama, tanggal, jumlah_orang, jenis_acara, status)
        VALUES ('$nama', '$tanggal', '$jumlah', '$jenis', 'pending')";

    if (mysqli_query($conn, $query)) {
        echo "success";
    } else {
        echo "error: " . mysqli_error($conn);
    }
}
?>