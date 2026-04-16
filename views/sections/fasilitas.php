<section id="fasilitas" class="py-5" style="background:#F5F5DC;">
<div class="container">
<p class="text-muted mb-1">Fasilitas</p>
<h2 class="fw-bold mb-3">Fasilitas Unggulan</h2>

<div class="row">
<?php if(isset($fasilitas) && mysqli_num_rows($fasilitas) > 0) { ?>
    <?php while($f = mysqli_fetch_assoc($fasilitas)) { ?>
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow rounded-4">
            <img src="assets/img/<?php echo $f['gambar']; ?>" class="card-img-top" style="height:200px;object-fit:cover;">
            <div class="card-body">
                <h5><?php echo $f['nama']; ?></h5>
                <p><?php echo $f['deskripsi']; ?></p>
            </div>
        </div>
    </div>
    <?php } ?>
<?php } else { ?>
    <p>Data fasilitas belum tersedia</p>
<?php } ?>
</div>
</div>
</section>
