<section id="galeri" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Galeri Teras Alam Ulin</h2>
            <p class="text-muted">Beberapa suasana dan spot menarik di Teras Alam Ulin.</p>
        </div>

        <div class="row g-4">
            <?php if ($galeri && mysqli_num_rows($galeri) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($galeri)): ?>
                    <div class="col-md-4">
                        <div class="overflow-hidden rounded-4 shadow-sm h-100">
                            <?php if (!empty($row['gambar'])): ?>
                                <img 
                                    src="assets/img/<?= htmlspecialchars($row['gambar']); ?>" 
                                    alt="Galeri"
                                    class="img-fluid w-100"
                                    style="height: 320px; object-fit: cover;"
                                >
                            <?php else: ?>
                                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 320px;">
                                    Tidak ada gambar
                                </div>
                            <?php endif; ?>
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
            <a href="galeri_lengkap.php" class="btn btn-outline-success px-5 py-3 rounded-pill">
                Lihat Galeri Lengkap →
            </a>
        </div>
    </div>
</section>