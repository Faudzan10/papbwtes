<section id="testimoni" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Apa Kata Mereka?</h2>
            <p class="text-muted">Beberapa ulasan pengunjung Teras Alam Ulin.</p>
        </div>

        <?php if ($testimoni && mysqli_num_rows($testimoni) > 0): ?>
            <div class="row justify-content-center testimoni-row">
                <?php while ($row = mysqli_fetch_assoc($testimoni)): ?>
                    <div class="col-auto d-flex justify-content-center">
                        <div class="testimoni-card">
                            <h5 class="testimoni-nama">
                                <?= htmlspecialchars($row['nama']); ?>
                            </h5>

                            <div class="testimoni-rating">
                                <?php
                                $rating = (int)$row['rating'];
                                for ($i = 1; $i <= 5; $i++) {
                                    echo $i <= $rating ? '★' : '☆';
                                }
                                ?>
                            </div>

                            <p class="testimoni-komentar">
                                “<?= htmlspecialchars($row['komentar']); ?>”
                            </p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-muted">Belum ada testimoni</p>
        <?php endif; ?>

        <hr class="my-5">

        <div class="mt-3">
            <h4 class="text-center mb-4 fw-bold">Beri Ulasan</h4>

            <form action="" method="POST" class="mx-auto" style="max-width: 800px;">
                <div class="mb-3">
                    <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                </div>

                <div class="mb-3">
                    <textarea name="komentar" class="form-control" rows="4" placeholder="Komentar" required></textarea>
                </div>

                <div class="mb-3 text-center">
                    <div id="rating-stars" style="font-size: 28px; cursor: pointer; user-select: none;">
                        <span data-value="1" style="color:#ccc;">★</span>
                        <span data-value="2" style="color:#ccc;">★</span>
                        <span data-value="3" style="color:#ccc;">★</span>
                        <span data-value="4" style="color:#ccc;">★</span>
                        <span data-value="5" style="color:#ccc;">★</span>
                    </div>

                    <input type="hidden" name="rating" id="rating-value" required>
                    <small id="rating-text" class="text-muted d-block mt-2">Pilih rating</small>
                </div>

                <div class="text-center">
                    <button type="submit" name="kirim_testimoni" class="btn btn-success w-100">
                        Kirim Testimoni
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<style>
#testimoni .testimoni-row {
    display: flex;
    justify-content: center;
    gap: 12px;
    row-gap: 12px;
    flex-wrap: wrap;
}

#testimoni .testimoni-card {
    background: #ece9cf;
    border-radius: 18px;
    padding: 18px 16px;
    width: 250px;
    min-height: 160px;

    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;

    box-shadow: 0 3px 10px rgba(0,0,0,0.08);
    transition: 0.2s;
}

#testimoni .testimoni-card:hover {
    transform: translateY(-3px);
}

#testimoni .testimoni-nama {
    font-size: 17px;
    font-weight: 700;
    margin-bottom: 6px;
    color: #1f2d3d;
}

#testimoni .testimoni-rating {
    font-size: 16px;
    color: #f4a100;
    margin-bottom: 10px;
    line-height: 1;
}

#testimoni .testimoni-komentar {
    font-size: 14px;
    color: #4b5563;
    line-height: 1.5;
    margin: 0;
}

#testimoni .form-control {
    border-radius: 10px;
    padding: 12px;
}

@media (max-width: 768px) {
    #testimoni .testimoni-row {
        gap: 10px;
    }

    #testimoni .testimoni-card {
        width: 100%;
        max-width: 320px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('#rating-stars span');
    const ratingInput = document.getElementById('rating-value');
    const ratingText = document.getElementById('rating-text');
    let selectedRating = 0;

    function updateStars(rating) {
        stars.forEach((star, index) => {
            star.style.color = index < rating ? '#f4a100' : '#ccc';
        });
    }

    stars.forEach((star) => {
        star.addEventListener('mouseover', function () {
            const value = parseInt(this.getAttribute('data-value'));
            updateStars(value);
        });

        star.addEventListener('click', function () {
            selectedRating = parseInt(this.getAttribute('data-value'));
            ratingInput.value = selectedRating;
            updateStars(selectedRating);
            ratingText.textContent = 'Rating: ' + selectedRating + ' bintang';
        });
    });

    document.getElementById('rating-stars').addEventListener('mouseleave', function () {
        updateStars(selectedRating);
    });
});
</script>