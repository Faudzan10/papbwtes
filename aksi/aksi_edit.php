<?php
require __DIR__ . '/../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../admin/wisata.php');
    exit;
}

$id          = (int)($_POST['id'] ?? 0);
$nama_wisata = trim($_POST['nama_wisata'] ?? '');
$deskripsi   = trim($_POST['deskripsi'] ?? '');
$harga_tiket = trim($_POST['harga_tiket'] ?? '');
$lokasi      = trim($_POST['lokasi'] ?? '');
$jam_buka    = trim($_POST['jam_buka'] ?? '');

$stmt = mysqli_prepare($conn, "UPDATE wisata SET nama_wisata = ?, deskripsi = ?, harga_tiket = ?, lokasi = ?, jam_buka = ? WHERE id = ?");
mysqli_stmt_bind_param($stmt, "ssissi", $nama_wisata, $deskripsi, $harga_tiket, $lokasi, $jam_buka, $id);

if (mysqli_stmt_execute($stmt)) {
    header('Location: ../admin/wisata.php');
    exit;
} else {
    echo "Gagal mengedit data wisata: " . mysqli_error($conn);
}
?>