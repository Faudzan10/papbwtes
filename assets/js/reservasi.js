function kirimWhatsApp() {
    let nama = document.getElementById('nama').value;
    let tanggal = document.getElementById('tanggal').value;

    let tgl = new Date(tanggal);
    let mysqlDate = tgl.toISOString().split('T')[0];

    let jumlah = document.getElementById('jumlah').value;
    let jenis = document.getElementById('jenis').value;

    if (!nama || !tanggal || !jumlah) {
        alert("Harap lengkapi semua data!");
        return;
    }

    fetch('controllers/reservasiController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `nama=${nama}&tanggal=${mysqlDate}&jumlah=${jumlah}&jenis=${jenis}`
    })
    .then(response => response.text())
    .then(result => {

        console.log(result);

        if(result === "success") {

            let pesan = `Halo Admin Teras Alam Ulin 👋

Saya ingin reservasi:

Nama: ${nama}
Tanggal: ${tanggal}
Jumlah Orang: ${jumlah}
Jenis Acara: ${jenis}`;

            let noWa = "6281258254443";
            let url = `https://wa.me/${noWa}?text=${encodeURIComponent(pesan)}`;

            window.open(url, '_blank');

            document.getElementById('formReservasi').reset();

        } else {
            alert(result);
        }

    });
}