<?php
require '../config/auth.php';
require '../config/koneksi.php';

$activePage = 'dashboard';

$total_fasilitas = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM fasilitas"));
$total_galeri    = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM galeri"));
$total_menu      = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM menu"));
$total_testimoni = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM testimoni"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php include 'layout_style.php'; ?>
</head>
<body>

<div class="admin-layout">
    <?php include 'sidebar.php'; ?>

    <div class="main-content">
        <div class="topbar">
            <h2>Dashboard Admin</h2>
            <p>Selamat datang di panel pengelolaan Teras Alam Ulin.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-xl-3">
                <div class="content-card h-100">
                    <div class="fs-3 mb-3">🏕</div>
                    <div class="mb-2">Total Fasilitas</div>
                    <h1 class="m-0"><?= $total_fasilitas; ?></h1>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="content-card h-100">
                    <div class="fs-3 mb-3">🖼️</div>
                    <div class="mb-2">Total Galeri</div>
                    <h1 class="m-0"><?= $total_galeri; ?></h1>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="content-card h-100">
                    <div class="fs-3 mb-3">🍽️</div>
                    <div class="mb-2">Total Menu</div>
                    <h1 class="m-0"><?= $total_menu; ?></h1>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="content-card h-100">
                    <div class="fs-3 mb-3">💬</div>
                    <div class="mb-2">Total Testimoni</div>
                    <h1 class="m-0"><?= $total_testimoni; ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>