<section id="menu" class="py-5" style="background:#F5F5DC;">
<div class="container">
<h2 class="fw-bold mb-4">Menu Kantin</h2>

<div id="appMenu">
    <div class="row">
        <div class="col-md-3 mb-4" v-for="menu in menus" :key="menu.id">
            <div class="card border-0 shadow rounded-4">
                <img :src="'assets/img/' + menu.gambar" style="height:150px;object-fit:cover;">
                <div class="card-body">
                    <h6>{{ menu.nama_menu }}</h6>
                    <p class="text-success">Rp{{ formatRupiah(menu.harga) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</section>
