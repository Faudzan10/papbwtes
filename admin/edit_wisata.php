i<?php
require '../config/auth.php';
require '../config/koneksi.php';

$id = (int)$_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM wisata WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data tidak ditemukan");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="dashboard.php">Admin Panel</a>
        <div class="ms-auto">
            <a href="wisata.php" class="btn btn-light btn-sm me-2">Data Wisata</a>
            <a href="../logout.php" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4">Edit Data Wisata</h2>

            <form action="../aksi_edit.php" method="POST">
                <input type="hidden" name="id" value="<?= $data['id']; ?>">

                <div class="mb-3">
                    <label class="form-label">Nama Wisata</label>
                    <input type="text" name="nama_wisata" class="form-control" value="<?= htmlspecialchars($data['nama_wisata']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4" required><?= htmlspecialchars($data['deskripsi']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga Tiket</label>
                    <input type="number" name="harga_tiket" class="form-control" value="<?= htmlspecialchars($data['harga_tiket']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Lokasi</label>
                    <textarea name="lokasi" class="form-control" rows="3" required><?= htmlspecialchars($data['lokasi']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jam Buka</label>
                    <input type="text" name="jam_buka" class="form-control" value="<?= htmlspecialchars($data['jam_buka']); ?>" required>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="wisata.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>