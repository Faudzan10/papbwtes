<?php
require '../config/auth.php';
require '../config/koneksi.php';

$data_wisata = mysqli_query($conn, "SELECT * FROM wisata ORDER BY id DESC");
$edit = null;

if (isset($_GET['edit'])) {
    $id_edit = (int) $_GET['edit'];
    $result_edit = mysqli_query($conn, "SELECT * FROM wisata WHERE id = $id_edit");
    $edit = mysqli_fetch_assoc($result_edit);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
    <h2 class="mb-4">Data Wisata</h2>

    <a href="dashboard.php" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

    <div class="card mb-4">
        <div class="card-body">
            <h5><?= $edit ? 'Edit Wisata' : 'Tambah Wisata'; ?></h5>

            <form action="<?= $edit ? '../aksi/aksi_edit.php' : '../aksi/aksi_tambah.php'; ?>" method="POST">
                <?php if ($edit): ?>
                    <input type="hidden" name="id" value="<?= $edit['id']; ?>">
                <?php endif; ?>

                <div class="mb-3">
                    <label class="form-label">Nama Wisata</label>
                    <input type="text" name="nama_wisata" class="form-control" required value="<?= $edit['nama_wisata'] ?? ''; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" required><?= $edit['deskripsi'] ?? ''; ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga Tiket</label>
                    <input type="number" name="harga_tiket" class="form-control" required value="<?= $edit['harga_tiket'] ?? ''; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" required value="<?= $edit['lokasi'] ?? ''; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Jam Buka</label>
                    <input type="text" name="jam_buka" class="form-control" required value="<?= $edit['jam_buka'] ?? ''; ?>">
                </div>

                <button type="submit" class="btn btn-success"><?= $edit ? 'Update' : 'Tambah'; ?></button>

                <?php if ($edit): ?>
                    <a href="wisata.php" class="btn btn-secondary">Batal</a>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5>Daftar Wisata</h5>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Wisata</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Lokasi</th>
                        <th>Jam Buka</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; while ($row = mysqli_fetch_assoc($data_wisata)): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['nama_wisata']); ?></td>
                        <td><?= htmlspecialchars($row['deskripsi']); ?></td>
                        <td><?= htmlspecialchars($row['harga_tiket']); ?></td>
                        <td><?= htmlspecialchars($row['lokasi']); ?></td>
                        <td><?= htmlspecialchars($row['jam_buka']); ?></td>
                        <td>
                            <a href="wisata.php?edit=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="../aksi/aksi_hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>