<?php
require '../config/auth.php';
require '../config/koneksi.php';

$activePage = 'testimoni';
$data = mysqli_query($conn, "SELECT * FROM testimoni ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Testimoni</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<?php include 'layout_style.php'; ?>

<style>
    .testimoni-table th,
    .testimoni-table td {
        vertical-align: middle;
    }

    .testimoni-table th:nth-child(4),
    .testimoni-table td:nth-child(4) {
        text-align: center;
    }

    .testimoni-table th:nth-child(5),
    .testimoni-table td:nth-child(5) {
        text-align: center;
    }

    .testimoni-table th:nth-child(6),
    .testimoni-table td:nth-child(6) {
        text-align: center;
    }

    .aksi-wrap {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        transform: translateX(6px);
    }

    .badge-status {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 999px;
        font-size: 14px;
        font-weight: 600;
    }

    .status-tampil {
        background: rgba(25, 135, 84, 0.18);
        color: #9ff0b8;
        border: 1px solid rgba(25, 135, 84, 0.35);
    }

    .status-pending {
        background: rgba(255, 193, 7, 0.18);
        color: #ffe08a;
        border: 1px solid rgba(255, 193, 7, 0.35);
    }

    .rating-bintang {
        letter-spacing: 2px;
        white-space: nowrap;
    }
</style>
</head>
<body>

<div class="admin-layout">
    <?php include 'sidebar.php'; ?>

    <div class="main-content">
        <div class="topbar d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h2>Data Testimoni</h2>
                <p>Kelola seluruh testimoni pengunjung Teras Alam Ulin.</p>
            </div>
        </div>

        <div class="content-card">
            <h4 class="mb-4">Daftar Testimoni</h4>

            <table class="table-dark-glass testimoni-table">
                <thead>
                    <tr>
                        <th style="width: 70px;">No</th>
                        <th style="width: 170px;">Nama</th>
                        <th>Komentar</th>
                        <th style="width: 140px;">Rating</th>
                        <th style="width: 150px;">Status</th>
                        <th style="width: 170px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($data && mysqli_num_rows($data) > 0): ?>
                        <?php $no = 1; while ($row = mysqli_fetch_assoc($data)): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($row['nama']); ?></td>
                            <td><?= htmlspecialchars($row['komentar']); ?></td>
                            <td class="rating-bintang">
                                <?php
                                $rating = (int)$row['rating'];
                                for ($i = 1; $i <= 5; $i++) {
                                    echo $i <= $rating ? '★' : '☆';
                                }
                                ?>
                            </td>
                            <td>
                                <?php if (($row['status'] ?? '') === 'tampil'): ?>
                                    <span class="badge-status status-tampil">Tampil</span>
                                <?php else: ?>
                                    <span class="badge-status status-pending">Pending</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="aksi-wrap">
                                    <a href="edit_testimoni.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="../aksi/aksi_hapus_testimoni.php?id=<?= $row['id']; ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Yakin hapus data?')">Hapus</a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align:center;">Belum ada data testimoni.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>