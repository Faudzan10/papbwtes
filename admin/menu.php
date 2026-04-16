<?php
require '../config/auth.php';
require '../config/koneksi.php';

$activePage = 'menu';
$data = mysqli_query($conn, "SELECT * FROM menu ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Menu</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<?php include 'layout_style.php'; ?>

<style>
    .menu-table th:nth-child(5),
    .menu-table td:nth-child(5) {
        text-align: center;
    }

    .menu-table th:nth-child(6),
    .menu-table td:nth-child(6) {
        text-align: center;
    }

    .menu-table td:nth-child(5) img {
        display: block;
        margin: 0 auto;
        width: 86px;
        height: 64px;
        object-fit: cover;
        border-radius: 10px;
    }

    .aksi-wrap {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    transform: translateX(6px);
}

    .menu-table td,
    .menu-table th {
        vertical-align: middle;
    }
</style>
</head>
<body>

<div class="admin-layout">
    <?php include 'sidebar.php'; ?>

    <div class="main-content">
        <div class="topbar d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h2>Data Menu</h2>
                <p>Kelola data menu yang tampil di website utama.</p>
            </div>
            <a href="tambah_menu.php" class="btn btn-success">+ Tambah Menu</a>
        </div>

        <div class="content-card">
            <table class="table-dark-glass menu-table">
                <thead>
                    <tr>
                        <th style="width: 70px;">No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th style="width: 110px;">Harga</th>
                        <th style="width: 140px;">Gambar</th>
                        <th style="width: 170px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($data && mysqli_num_rows($data) > 0): ?>
                        <?php $no = 1; while($row = mysqli_fetch_assoc($data)): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($row['nama_menu']); ?></td>
                            <td><?= htmlspecialchars($row['deskripsi']); ?></td>
                            <td><?= htmlspecialchars($row['harga']); ?></td>
                            <td>
                                <?php if (!empty($row['gambar'])): ?>
                                    <img src="../assets/img/<?= htmlspecialchars($row['gambar']); ?>" alt="<?= htmlspecialchars($row['nama_menu']); ?>">
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="aksi-wrap">
                                    <a href="edit_menu.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="../aksi/aksi_hapus_menu.php?id=<?= $row['id']; ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Yakin hapus data?')">Hapus</a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align:center;">Belum ada data menu.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>