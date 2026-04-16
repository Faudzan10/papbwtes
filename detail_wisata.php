<?php
require_once 'config/koneksi.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$query = mysqli_query($conn, "SELECT * FROM wisata WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data wisata tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($data['nama_wisata']); ?> - Teras Alam Ulin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">TERAS ALAM ULIN</a>
    </div>
</nav>

<div class="container py-5">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <h2 class="fw-bold mb-3"><?= htmlspecialchars($data['nama_wisata']); ?></h2>
            <p><strong>Deskripsi:</strong></p>
            <p><?= nl2br(htmlspecialchars($data['deskripsi'])); ?></p>

            <p><strong>Harga Tiket:</strong> Rp<?= number_format($data['harga_tiket'], 0, ',', '.'); ?></p>
            <p><strong>Lokasi:</strong> <?= htmlspecialchars($data['lokasi']); ?></p>
            <p><strong>Jam Buka:</strong> <?= htmlspecialchars($data['jam_buka']); ?></p>

            <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>

</body>
</html>