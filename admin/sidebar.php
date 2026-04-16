<?php
if (!isset($activePage)) {
    $activePage = '';
}
?>
<div class="sidebar">
    <div>
        <div class="brand">
            <div class="brand-icon">T</div>
            <div>
                <div class="brand-title">Teras Alam Ulin</div>
                <div class="brand-subtitle">Admin Panel</div>
            </div>
        </div>

        <div class="menu-label">MENU</div>
        <a href="dashboard.php" class="sidebar-link <?= $activePage === 'dashboard' ? 'active' : ''; ?>">📊 Dashboard</a>
        <a href="fasilitas.php" class="sidebar-link <?= $activePage === 'fasilitas' ? 'active' : ''; ?>">🏕 Fasilitas</a>
        <a href="galeri.php" class="sidebar-link <?= $activePage === 'galeri' ? 'active' : ''; ?>">🖼️ Galeri</a>
        <a href="menu.php" class="sidebar-link <?= $activePage === 'menu' ? 'active' : ''; ?>">🍽️ Menu</a>
        <a href="testimoni.php" class="sidebar-link <?= $activePage === 'testimoni' ? 'active' : ''; ?>">💬 Testimoni</a>

        <div class="menu-label mt-4">GENERAL</div>
        <a href="../index.php" class="sidebar-link">🌐 Lihat Website</a>
        <a href="../logout.php" class="sidebar-link">🚪 Logout</a>
    </div>

    <div class="sidebar-card">
        <div class="small mb-2">Kelola konten utama website</div>
        <div class="fw-semibold mb-3">Semua data website bisa diatur dari panel admin ini.</div>
        <a href="../index.php" class="btn btn-success btn-sm w-100">Buka Website</a>
    </div>
</div>