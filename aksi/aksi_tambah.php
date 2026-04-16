<?php
require __DIR__ . '/../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../admin/wisata.php');
    exit;
}

$nama_wisata = trim($_POST['nama_wisata'] ?? '');
$deskripsi   = trim($_POST['deskripsi'] ?? '');
$harga_tiket = trim($_POST['harga_tiket'] ?? '');
$lokasi      = trim($_POST['lokasi'] ?? '');
$jam_buka    = trim($_POST['jam_buka'] ?? '');

$stmt = mysqli_prepare($conn, "INSERT INTO wisata (nama_wisata, deskripsi, harga_tiket, lokasi, jam_buka) VALUES (?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssiss", $nama_wisata, $deskripsi, $harga_tiket, $lokasi, $jam_buka);

if (mysqli_stmt_execute($stmt)) {
    header('Location: ../admin/wisata.php');
    exit;
} else {
    echo "Gagal menambahkan data wisata: " . mysqli_error($conn);
}
?>