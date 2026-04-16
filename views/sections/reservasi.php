<section id="reservasi" class="section-cream">
<div class="container">
<div class="row align-items-center">

    <div class="col-md-6 mb-4">
        <h2 class="fw-bold mb-3">Rencanakan Kunjungan Anda</h2>
        <p class="text-muted">
            Pastikan tempat untuk acara keluarga, gathering, atau sekadar kunjungan akhir pekan Anda.
            Tim kami akan segera menghubungi Anda untuk konfirmasi.
        </p>
        <div class="mt-4">
            <div class="d-flex align-items-start mb-3">
                <div class="icon-box me-3">✔</div>
                <div>
                    <strong>Reservasi Fleksibel</strong>
                    <p class="mb-0 small text-muted">Ubah jadwal hingga 24 jam sebelum kedatangan.</p>
                </div>
            </div>
            <div class="d-flex align-items-start">
                <div class="icon-box me-3">👥</div>
                <div>
                    <strong>Paket Gathering</strong>
                    <p class="mb-0 small text-muted">Harga khusus untuk rombongan lebih dari 20 orang.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="reservasi-card">
            <form id="formReservasi">
                <div class="row g-3">
                    <div class="col-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" id="nama" class="form-control" placeholder="John Doe">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Tanggal Kunjungan</label>
                        <input type="date" id="tanggal" class="form-control">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Jumlah Orang</label>
                        <input type="number" id="jumlah" class="form-control" placeholder="Contoh: 5">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Jenis Acara</label>
                        <select id="jenis" class="form-control">
                            <option>Keluarga</option>
                            <option>Gathering</option>
                        </select>
                    </div>
                </div>
                <button type="button" onclick="kirimWhatsApp()" class="btn btn-success w-100 mt-4">
                    Kirim Reservasi
                </button>
                <div class="text-center my-3 text-muted">Atau</div>
                <a href="https://wa.me/6281258254443" target="_blank" class="btn btn-outline-success w-100">
                    Reservasi via WhatsApp
                </a>
            </form>
        </div>
    </div>
</div>
</div>
</section>
