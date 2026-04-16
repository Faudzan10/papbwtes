<?php
require '../config/auth.php';
require '../config/koneksi.php';

$activePage = 'testimoni';

if (!isset($_GET['id'])) {
    header("Location: testimoni.php");
    exit;
}

$id = (int) $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM testimoni WHERE id='$id'");
$row = mysqli_fetch_assoc($query);

if (!$row) {
    header("Location: testimoni.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Testimoni</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<?php include 'layout_style.php'; ?>
</head>
<body>

<div class="admin-layout">
    <?php include 'sidebar.php'; ?>

    <div class="main-content">
        <div class="topbar">
            <h2>Edit Testimoni</h2>
            <p>Ubah isi testimoni dan status tampil di website utama.</p>
        </div>

        <div class="content-card">
            <form action="../aksi/aksi_edit_testimoni.php" method="POST">
                <input type="hidden" name="id" value="<?= $row['id']; ?>">

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($row['nama']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Komentar</label>
                    <textarea name="komentar" class="form-control" rows="4" required><?= htmlspecialchars($row['komentar']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Rating</label>
                    <select name="rating" class="form-select" required>
                        <option value="1" <?= $row['rating'] == 1 ? 'selected' : ''; ?>>1</option>
                        <option value="2" <?= $row['rating'] == 2 ? 'selected' : ''; ?>>2</option>
                        <option value="3" <?= $row['rating'] == 3 ? 'selected' : ''; ?>>3</option>
                        <option value="4" <?= $row['rating'] == 4 ? 'selected' : ''; ?>>4</option>
                        <option value="5" <?= $row['rating'] == 5 ? 'selected' : ''; ?>>5</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="pending" <?= $row['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                        <option value="tampil" <?= $row['status'] == 'tampil' ? 'selected' : ''; ?>>Tampil</option>
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" name="update" class="btn btn-success">Simpan</button>
                    <a href="testimoni.php" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>