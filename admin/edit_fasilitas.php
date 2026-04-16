<?php
require '../config/auth.php';
require '../config/koneksi.php';

$activePage = 'fasilitas';

$id = (int)($_GET['id'] ?? 0);
$query = mysqli_query($conn, "SELECT * FROM fasilitas WHERE id = $id");
$row = mysqli_fetch_assoc($query);

if (!$row) {
    echo "Data fasilitas tidak ditemukan.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Fasilitas</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<?php include 'layout_style.php'; ?>
</head>
<body>

<div class="admin-layout">
    <?php include 'sidebar.php'; ?>

    <div class="main-content">
        <div class="content-card">
            <h3 class="mb-4">Edit Fasilitas</h3>

            <form action="../aksi/aksi_edit_fasilitas.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $row['id']; ?>">

                <div class="mb-3">
                    <label class="form-label">Nama Fasilitas</label>
                    <input type="text" name="nama" class="form-control"
                           value="<?= htmlspecialchars($row['nama']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control"><?= htmlspecialchars($row['deskripsi'] ?? ''); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Saat Ini</label><br>
                    <?php if (!empty($row['gambar'])): ?>
                        <img src="../assets/img/<?= htmlspecialchars($row['gambar']); ?>" class="preview-img">
                    <?php else: ?>
                        <span class="text-white">Tidak ada gambar</span>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Ganti Gambar</label>
                    <input type="file" name="gambar" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="fasilitas.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>