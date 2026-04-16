<?php
require '../config/auth.php';
require '../config/koneksi.php';

$activePage = 'galeri';
$data = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Galeri</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<?php include 'layout_style.php'; ?>

<style>
    .galeri-table th,
    .galeri-table td {
        vertical-align: middle;
    }

    .galeri-table th:nth-child(2),
    .galeri-table td:nth-child(2) {
        text-align: center;
    }

    .galeri-table th:nth-child(4),
    .galeri-table td:nth-child(4) {
        text-align: center;
    }

    .galeri-table td:nth-child(2) img {
        display: block;
        margin: 0 auto;
        width: 96px;
        height: 96px;
        object-fit: cover;
        border-radius: 16px;
    }

    .aksi-wrap {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        transform: translateX(6px);
    }
</style>
</head>
<body>

<div class="admin-layout">
    <?php include 'sidebar.php'; ?>

    <div class="main-content">
        <div class="topbar d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h2>Data Galeri</h2>
                <p>Kelola galeri foto website.</p>
            </div>

            <a href="tambah_galeri.php" class="btn btn-success">+ Tambah Galeri</a>
        </div>

        <div class="content-card">
            <h4 class="mb-4">Daftar Galeri</h4>

            <table class="table-dark-glass galeri-table">
                <thead>
                    <tr>
                        <th style="width: 70px;">No</th>
                        <th style="width: 170px;">Gambar</th>
                        <th>Keterangan</th>
                        <th style="width: 170px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($data && mysqli_num_rows($data) > 0): ?>
                        <?php $no = 1; while ($row = mysqli_fetch_assoc($data)): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <?php if (!empty($row['gambar'])): ?>
                                    <img src="../assets/img/<?= htmlspecialchars($row['gambar']); ?>" alt="Galeri">
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($row['keterangan'] ?? ''); ?></td>
                            <td>
                                <div class="aksi-wrap">
                                    <a href="edit_galeri.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="../aksi/aksi_hapus_galeri.php?id=<?= $row['id']; ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Yakin hapus data?')">Hapus</a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" style="text-align:center;">Belum ada data galeri.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>