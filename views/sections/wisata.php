<section id="wisata" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Wisata di Samarinda</h2>
            <p class="text-muted">Informasi objek wisata yang tersedia.</p>
        </div>

        <?php if ($data_wisata && mysqli_num_rows($data_wisata) > 0): ?>
            
            <div class="row justify-content-center g-4">
                
                <?php while($row = mysqli_fetch_assoc($data_wisata)) : ?>
                    
                    <div class="col-md-4 d-flex justify-content-center">
                        <div class="card shadow-sm border-0 rounded-4 h-100" style="max-width: 350px; width:100%;">
                            
                            <div class="card-body text-center p-4">
                                
                                <h5 class="fw-bold mb-2">
                                    <?= htmlspecialchars($row['nama_wisata']); ?>
                                </h5>

                                <p class="text-muted small mb-3">
                                    <?= htmlspecialchars(mb_strimwidth($row['deskripsi'], 0, 100, "...")); ?>
                                </p>

                                <p class="mb-1">
                                    <strong>Harga:</strong> 
                                    Rp<?= number_format($row['harga_tiket'], 0, ',', '.'); ?>
                                </p>

                                <p class="mb-1">
                                    <strong>Lokasi:</strong> 
                                    <?= htmlspecialchars($row['lokasi']); ?>
                                </p>

                                <p class="mb-3">
                                    <strong>Jam Buka:</strong><br>

                                    <?php 
                                    $jam = htmlspecialchars($row['jam_buka']);

                                    // contoh custom tampil
                                    if (strpos($jam, 'Jumat') !== false) {
                                        echo 'Senin - Kamis: 09:30 - 18:00 <br>';
                                        echo 'Jumat: <span style="color:red;">Tutup</span><br>';
                                        echo 'Sabtu - Minggu: 08:00 - 18:00';
                                    } else {
                                        echo $jam;
                                    }
                                    ?>
                                </p>

                                <a href="detail_wisata.php?id=<?= $row['id']; ?>" 
                                class="btn btn-success btn-sm w-100">
                                Lihat Detail
                                </a>

                            </div>

                        </div>
                    </div>

                <?php endwhile; ?>

            </div>

        <?php else: ?>
            <div class="text-center text-muted">
                Belum ada data wisata.
            </div>
        <?php endif; ?>

    </div>
</section>