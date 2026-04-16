<?php require_once 'config/koneksi.php'; ?>

<?php
require_once 'controllers/fasilitasController.php';
require_once 'controllers/galeriController.php';
require_once 'controllers/testimoniController.php';
require_once 'controllers/reservasiController.php';

$data_wisata = mysqli_query($conn, "SELECT * FROM wisata ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Teras Alam Ulin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<?php include 'views/components/navbar.php'; ?>

<?php include 'views/sections/hero.php'; ?>
<?php include 'views/sections/tentang.php'; ?>

<?php include 'views/sections/wisata.php'; ?>

<?php include 'views/sections/fasilitas.php'; ?>
<?php include 'views/sections/galeri.php'; ?>
<?php include 'views/sections/testimoni.php'; ?>
<?php include 'views/sections/menu.php'; ?>
<?php include 'views/sections/reservasi.php'; ?>
<?php include 'views/sections/lokasi.php'; ?>

<?php include 'views/components/footer.php'; ?>

<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="assets/js/rating.js"></script>
<script src="assets/js/reservasi.js"></script>

<script>
const { createApp } = Vue;

createApp({
    data() {
        return { menus: [] }
    },
    mounted() {
        fetch('controllers/menuApi.php')
            .then(res => res.json())
            .then(data => this.menus = data);
    },
    methods: {
        formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID').format(angka);
        }
    }
}).mount('#appMenu');
</script>

</body>
</html>