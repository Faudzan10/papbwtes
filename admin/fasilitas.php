<?php
require '../config/auth.php';
require '../config/koneksi.php';

$activePage = 'fasilitas';
$data = mysqli_query($conn, "SELECT * FROM fasilitas ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Fasilitas</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<?php include 'layout_style.php'; ?>

<style>
    .fasilitas-table th,
    .fasilitas-table td {
        vertical-align: middle;
    }

    .fasilitas-table th:nth-child(4),
    .fasilitas-table td:nth-child(4) {
        text-align: center;
    }

    .fasilitas-table th:nth-child(5),
    .fasilitas-table td:nth-child(5) {
        text-align: center;
    }

    .fasilitas-table td:nth-child(4) img {
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
                <h2>Data Fasilitas</h2>
                <p>Kelola data fasilitas yang tampil di website utama.</p>
            </div>

            <a href="tambah_fasilitas.php" class="btn btn-success">+ Tambah Fasilitas</a>
        </div>

        <div class="content-card">
            <h4 class="mb-4">Daftar Fasilitas</h4>

            <table class="table-dark-glass fasilitas-table">
                <thead>
                    <tr>
                        <th style="width: 70px;">No</th>
                        <th style="width: 180px;">Nama</th>
                        <th>Deskripsi</th>
                        <th style="width: 170px;">Gambar</th>
                        <th style="width: 170px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($data && mysqli_num_rows($data) > 0): ?>
                        <?php $no = 1; while ($row = mysqli_fetch_assoc($data)): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($row['nama'] ?? ''); ?></td>
                            <td><?= htmlspecialchars($row['deskripsi'] ?? ''); ?></td>
                            <td>
                                <?php if (!empty($row['gambar'])): ?>
                                    <img src="../assets/img/<?= htmlspecialchars($row['gambar']); ?>" alt="<?= htmlspecialchars($row['nama'] ?? ''); ?>">
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="aksi-wrap">
                                    <a href="edit_fasilitas.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="../aksi/aksi_hapus_fasilitas.php?id=<?= $row['id']; ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Yakin hapus data?')">Hapus</a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align:center;">Belum ada data fasilitas.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>