<?php require_once 'config/koneksi.php'; ?>

<?php
$data_galeri = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Lengkap - Teras Alam Ulin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .page-title {
            font-weight: 700;
            color: #1f2d3d;
        }

        .galeri-card {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 4px 14px rgba(0,0,0,0.08);
            transition: 0.3s ease;
            background: #fff;
            height: 100%;
        }

        .galeri-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 22px rgba(0,0,0,0.12);
        }

        .galeri-card img {
            width: 100%;
            height: 260px;
            object-fit: cover;
        }

        .galeri-caption {
            padding: 14px 16px;
            text-align: center;
            font-weight: 500;
            color: #444;
        }

        .btn-kembali {
            border-radius: 30px;
            padding: 10px 24px;
        }
    </style>
</head>
<body>

<?php include 'views/components/navbar.php'; ?>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="page-title">Galeri Lengkap</h2>
            <p class="text-muted">Lihat suasana dan fasilitas Teras Alam Ulin lebih lengkap.</p>
        </div>

        <div class="row g-4">
            <?php if ($data_galeri && mysqli_num_rows($data_galeri) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($data_galeri)): ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="galeri-card">
                            <?php if (!empty($row['gambar'])): ?>
                                <img src="assets/img/<?= htmlspecialchars($row['gambar']); ?>" alt="Galeri">
                            <?php else: ?>
                                <img src="assets/img/no-image.png" alt="Tidak ada gambar">
                            <?php endif; ?>

                            <div class="galeri-caption">
                                <?= htmlspecialchars($row['keterangan'] ?? 'Galeri Teras Alam Ulin'); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        Belum ada data galeri.
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="text-center mt-5">
            <a href="index.php#galeri" class="btn btn-success btn-kembali">
                ← Kembali ke Beranda
            </a>
        </div>
    </div>
</section>

<?php include 'views/components/footer.php'; ?>

</body>
</html>