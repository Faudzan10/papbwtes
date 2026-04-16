<footer class="footer-clean">
    <div class="container text-center">

        <!-- ICON SOSIAL -->
        <div class="footer-icons">
            <a href="https://www.tiktok.com/@teras_alam_ulin" target="_blank" class="social-btn">
                <img src="assets/img/tt.png" alt="TikTok">
            </a>

            <a href="https://web.facebook.com/profile.php?id=100084307477587" target="_blank" class="social-btn">
                <img src="assets/img/fb.png" alt="Facebook">
            </a>

            <a href="https://www.instagram.com/teras.alam.ulin" target="_blank" class="social-btn">
                <img src="assets/img/ige..png" alt="Instagram">
            </a>
        </div>

        <!-- MENU FOOTER -->
        <div class="footer-links">
            <a href="index.php">Home</a>
            <a href="index.php#galeri">Galeri</a>
            <a href="index.php#tentang">Tentang</a>
            <a href="index.php#menu">Menu</a>
            <a href="index.php#kontak">Kontak</a>
        </div>

        <!-- COPYRIGHT -->
        <div class="footer-copy">
            © 2026 Teras Alam Ulin
        </div>

    </div>
</footer>

<style>
.footer-clean {
    background: #000;
    padding: 22px 0 16px;
}

/* ICON */
.footer-icons {
    display: flex;
    justify-content: center;
    gap: 16px;
    margin-bottom: 14px;
}

.social-btn {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    transition: 0.3s;
    box-shadow: 0 3px 8px rgba(0,0,0,0.3);
}

/* default IG */
.social-btn img {
    width: 28px;
    height: 28px;
    object-fit: contain;
}

/* 🔥 paksa TikTok & FB biar BESAR + ke-zoom */
.social-btn img[alt="TikTok"],
.social-btn img[alt="Facebook"] {
    width: 48px;
    height: 48px;
    transform: scale(1.2);
}

/* HOVER BIAR KEREN */
.social-btn:hover {
    transform: translateY(-4px);
    background: #198754;
}

/* MENU */
.footer-links {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 10px;
}

.footer-links a {
    color: #ddd;
    text-decoration: none;
    font-size: 14px;
    transition: 0.3s;
}

.footer-links a:hover {
    color: #198754;
}

/* COPYRIGHT */
.footer-copy {
    color: #aaa;
    font-size: 13px;
}
</style>