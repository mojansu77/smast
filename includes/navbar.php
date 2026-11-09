<?php
// includes/navbar.php — Navigasi SMAST (SMA Negeri 1 Kota Kediri)
$currentPage = isset($_GET['page']) ? trim($_GET['page']) : 'beranda';

// Helper: active class
function nav_active($page, $current) {
    return ($page === $current) ? 'active' : '';
}
function nav_active_multi($pages, $current) {
    return in_array($current, $pages) ? 'active' : '';
}
?>

<!-- ══════════════════════════════════════════════════════════════════════════
     1. SLIM TOP UTILITY STRIP (Clean Modern Navy)
     ══════════════════════════════════════════════════════════════════════════ -->
<div class="smast-top-strip" id="smast-top-strip">
    <div class="smast-container smast-top-inner">
        <!-- Contact Links on the Left -->
        <div class="smast-top-contact">
            <a href="mailto:redaksi@smastkediri.sch.id" class="top-strip-link" title="Email Resmi SMAST">
                <i class="fas fa-envelope" aria-hidden="true"></i>
                <span class="top-strip-text">redaksi@smastkediri.sch.id</span>
            </a>
            <span class="top-strip-divider" aria-hidden="true">&bull;</span>
            <a href="tel:+62354771829" class="top-strip-link" title="Telepon Kantor">
                <i class="fas fa-phone" aria-hidden="true"></i>
                <span class="top-strip-text">+62 354 771829</span>
            </a>
        </div>

        <!-- Utility Links on the Right -->
        <div class="smast-top-tools">
            <button type="button" class="top-strip-link top-search-trigger" id="search-modal-trigger" aria-label="Buka Pencarian Website" title="Pencarian">
                <i class="fas fa-search" aria-hidden="true"></i>
                <span>Pencarian</span>
            </button>
            <button type="button" class="smast-theme-toggle" id="theme-toggle" aria-label="Ganti Mode Terang / Gelap" title="Ganti Mode Tampilan">
                <i class="fas fa-moon" id="theme-icon" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════════════════════════════════════════
     2. MODERN MAIN NAVBAR (Pure White Typography, Minimal Gold)
     ══════════════════════════════════════════════════════════════════════════ -->
<header class="smast-navbar" id="smast-navbar" role="banner">
    <div class="smast-container smast-navbar-inner">

        <!-- Brand Identity (Left): Logo + Pure White Title & Subtitle -->
        <a href="index.php" class="smast-navbar-brand" aria-label="SMA Negeri 1 Kota Kediri - Beranda">
            <img src="assets/images/Logo SMAST.png" alt="Logo SMA Negeri 1 Kota Kediri" class="brand-logo-img">
            <div class="brand-text">
                <span class="brand-school-name">SMA NEGERI 1 KOTA KEDIRI</span>
                <span class="brand-school-motto">Smast Mulia Jaya Jaya Jaya!!!</span>
            </div>
        </a>

        <!-- Desktop Navigation Links (Center / Right) -->
        <ul class="smast-nav-menu" id="smast-nav-menu" role="menubar">
            <li role="none">
                <a href="index.php?page=beranda" class="smast-nav-link smast-nav-home <?php echo nav_active('beranda', $currentPage); ?>" role="menuitem" title="Beranda" aria-label="Beranda">
                    <i class="fas fa-home" aria-hidden="true"></i>
                </a>
            </li>

            <li class="smast-dropdown" role="none">
                <a href="index.php?page=profil" class="smast-nav-link <?php echo nav_active_multi(array('profil', 'sejarah'), $currentPage); ?>" role="menuitem" aria-haspopup="true">
                    PROFIL <i class="fas fa-chevron-down nav-arrow"></i>
                </a>
                <ul class="smast-dropdown-menu" role="menu" aria-label="Submenu Profil">
                    <li role="none"><a href="index.php?page=profil#visi-misi" role="menuitem"><i class="fas fa-compass fa-fw"></i> Visi &amp; Misi (MUSTIKA)</a></li>
                    <li role="none"><a href="index.php?page=sejarah" role="menuitem"><i class="fas fa-landmark fa-fw"></i> Sejarah</a></li>
                    <li role="none"><a href="index.php?page=profil#data-sekolah" role="menuitem"><i class="fas fa-id-card fa-fw"></i> Identitas &amp; Data Sekolah</a></li>
                    <li role="none"><a href="index.php?page=profil#struktur" role="menuitem"><i class="fas fa-sitemap fa-fw"></i> Struktur Organisasi</a></li>
                </ul>
            </li>

            <li role="none">
                <a href="index.php?page=fasilitas" class="smast-nav-link <?php echo nav_active('fasilitas', $currentPage); ?>" role="menuitem">
                    FASILITAS
                </a>
            </li>

            <li class="smast-dropdown" role="none">
                <a href="#" class="smast-nav-link" role="menuitem" aria-haspopup="true">
                    APLIKASI <i class="fas fa-chevron-down nav-arrow"></i>
                </a>
                <ul class="smast-dropdown-menu" role="menu" aria-label="Submenu Aplikasi">
                    <li role="none"><a href="https://si.smastkediri.sch.id/index.php" target="_blank" rel="noopener noreferrer" role="menuitem"><i class="fas fa-laptop-code fa-fw"></i> SISMAST</a></li>
                    <li role="none"><a href="https://elibrary.smastkediri.sch.id/" target="_blank" rel="noopener noreferrer" role="menuitem"><i class="fas fa-book-reader fa-fw"></i> Perpustakaan (E-Library)</a></li>
                    <li role="none"><a href="https://alumni.smastkediri.sch.id/" target="_blank" rel="noopener noreferrer" role="menuitem"><i class="fas fa-stamp fa-fw"></i> Legalisir Online</a></li>
                </ul>
            </li>

            <li class="smast-dropdown" role="none">
                <a href="index.php?page=galeri" class="smast-nav-link <?php echo nav_active('galeri', $currentPage); ?>" role="menuitem" aria-haspopup="true">
                    GALERI <i class="fas fa-chevron-down nav-arrow"></i>
                </a>
                <ul class="smast-dropdown-menu" role="menu" aria-label="Submenu Galeri">
                    <li role="none"><a href="index.php?page=galeri#foto" role="menuitem"><i class="fas fa-camera fa-fw"></i> Galeri Foto</a></li>
                    <li role="none"><a href="index.php?page=galeri#video" role="menuitem"><i class="fas fa-video fa-fw"></i> Galeri Video</a></li>
                </ul>
            </li>

            <li role="none">
                <a href="index.php?page=ekskul" class="smast-nav-link <?php echo nav_active('ekskul', $currentPage); ?>" role="menuitem">
                    EKSKUL
                </a>
            </li>

            <li role="none">
                <a href="index.php?page=artikel" class="smast-nav-link <?php echo nav_active('artikel', $currentPage); ?>" role="menuitem">
                    KABAR
                </a>
            </li>

            <li class="smast-dropdown" role="none">
                <a href="#" class="smast-nav-link" role="menuitem" aria-haspopup="true">
                    SOSMED <i class="fas fa-chevron-down nav-arrow"></i>
                </a>
                <ul class="smast-dropdown-menu" role="menu" aria-label="Submenu Sosmed">
                    <li role="none"><a href="https://www.instagram.com/smast_kediri_official/" target="_blank" rel="noopener noreferrer" role="menuitem"><i class="fab fa-instagram fa-fw" style="color:#E1306C;"></i> Instagram</a></li>
                    <li role="none"><a href="https://www.facebook.com/smastkediriofficial/" target="_blank" rel="noopener noreferrer" role="menuitem"><i class="fab fa-facebook fa-fw" style="color:#1877F2;"></i> Facebook</a></li>
                    <li role="none"><a href="https://www.youtube.com/@smast_kediri_official" target="_blank" rel="noopener noreferrer" role="menuitem"><i class="fab fa-youtube fa-fw" style="color:#FF0000;"></i> YouTube</a></li>
                    <li role="none"><a href="https://www.facebook.com/smastkediriofficial/" target="_blank" rel="noopener noreferrer" role="menuitem"><i class="fab fa-x-twitter fa-fw"></i> Twitter / X</a></li>
                </ul>
            </li>

            <li role="none">
                <a href="index.php?page=kontak" class="smast-nav-link <?php echo nav_active('kontak', $currentPage); ?>" role="menuitem">
                    HUBUNGI KAMI
                </a>
            </li>
        </ul>

        <!-- Right Side: Hamburger Toggle -->
        <div class="smast-navbar-actions">
            <!-- Mobile Hamburger Toggle -->
            <button class="smast-hamburger" id="smast-hamburger" aria-label="Buka Menu Navigasi" aria-expanded="false" aria-controls="smast-mobile-nav">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </button>
        </div>

    </div>
</header>

<!-- Search Overlay Modal -->
<div class="smast-search-modal" id="smast-search-modal" aria-hidden="true" role="dialog" aria-label="Pencarian Website SMAST">
    <div class="smast-search-modal-backdrop" id="smast-search-modal-close"></div>
    <div class="smast-search-modal-box">
        <button type="button" class="smast-search-close-btn" id="search-close-btn" aria-label="Tutup Pencarian">&times;</button>
        <div class="smast-search-header">
            <i class="fas fa-search" aria-hidden="true"></i>
            <h3>Pencarian Website SMAN 1 Kota Kediri</h3>
        </div>
        <form role="search" method="get" class="smast-search-modal-form" action="index.php">
            <div class="smast-search-input-group">
                <input type="search" class="smast-search-field" placeholder="Ketik kata kunci pencarian (misal: Profil, Sejarah, Ekstrakurikuler)..." name="q" autocomplete="off" required>
                <button type="submit" class="smast-btn smast-btn-primary">Cari Sekarang</button>
            </div>
        </form>
        <p class="smast-search-hint">Tekan ESC atau klik di luar untuk menutup.</p>
    </div>
</div>

<!-- Mobile Navigation Drawer -->
<div class="smast-mobile-menu" id="smast-mobile-nav" aria-hidden="true">
    <div class="mobile-drawer-header">
        <div class="mobile-drawer-brand">
            <img src="assets/images/Logo SMAST.png" alt="Logo SMAST" style="height:36px; width:auto;">
            <div>
                <strong style="color:var(--smast-navy); font-size:0.92rem; display:block; line-height:1.15;">SMAN 1 KOTA KEDIRI</strong>
                <span style="font-size:0.75rem; color:var(--smast-text-muted);">Smast Mulia Jaya Jaya Jaya!!!</span>
            </div>
        </div>
        <button type="button" class="smast-theme-toggle" id="theme-toggle-mobile" aria-label="Ganti Mode Terang/Gelap" style="width:36px; height:36px; flex-shrink:0;">
            <i class="fas fa-moon" id="theme-icon-mobile"></i>
        </button>
    </div>

    <!-- Quick Contact Chips -->
    <div class="mobile-contact-bar">
        <a href="mailto:redaksi@smastkediri.sch.id" class="mobile-contact-chip">
            <i class="fas fa-envelope"></i> Email
        </a>
        <a href="tel:+62354771829" class="mobile-contact-chip">
            <i class="fas fa-phone"></i> Telepon
        </a>
    </div>

    <ul>
        <li><a href="index.php?page=beranda"><i class="fas fa-home fa-fw"></i> Beranda</a></li>
        <li><a href="index.php?page=profil"><i class="fas fa-school fa-fw"></i> Profil &amp; Visi Misi</a></li>
        <li><a href="index.php?page=sejarah"><i class="fas fa-landmark fa-fw"></i> Sejarah</a></li>
        <li><a href="index.php?page=fasilitas"><i class="fas fa-building fa-fw"></i> Fasilitas</a></li>
        <li><a href="index.php?page=ekskul"><i class="fas fa-users fa-fw"></i> 24+ Ekstrakurikuler</a></li>
        <li><a href="index.php?page=galeri"><i class="fas fa-images fa-fw"></i> Galeri Foto &amp; Video</a></li>
        <li><a href="index.php?page=artikel"><i class="fas fa-newspaper fa-fw"></i> Kabar &amp; Berita</a></li>

        <!-- Aplikasi Sekolah -->
        <li style="border-top: 1px solid var(--smast-border); margin-top: 8px; padding-top: 8px;">
            <span style="font-size:0.75rem; text-transform:uppercase; letter-spacing:1px; color:var(--smast-text-muted); padding:6px 16px; display:block; font-weight:700;">Aplikasi Sekolah</span>
        </li>
        <li><a href="https://si.smastkediri.sch.id/index.php" target="_blank" rel="noopener noreferrer"><i class="fas fa-laptop-code fa-fw"></i> SISMAST</a></li>
        <li><a href="https://elibrary.smastkediri.sch.id/" target="_blank" rel="noopener noreferrer"><i class="fas fa-book-reader fa-fw"></i> Perpustakaan (E-Library)</a></li>
        <li><a href="https://alumni.smastkediri.sch.id/" target="_blank" rel="noopener noreferrer"><i class="fas fa-stamp fa-fw"></i> Legalisir Online</a></li>

        <!-- Media Sosial -->
        <li style="border-top: 1px solid var(--smast-border); margin-top: 8px; padding-top: 8px;">
            <span style="font-size:0.75rem; text-transform:uppercase; letter-spacing:1px; color:var(--smast-text-muted); padding:6px 16px; display:block; font-weight:700;">Media Sosial</span>
        </li>
        <li><a href="https://www.instagram.com/smast_kediri_official/" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram fa-fw" style="color:#E1306C;"></i> Instagram</a></li>
        <li><a href="https://www.facebook.com/smastkediriofficial/" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook fa-fw" style="color:#1877F2;"></i> Facebook</a></li>
        <li><a href="https://www.youtube.com/@smast_kediri_official" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube fa-fw" style="color:#FF0000;"></i> YouTube</a></li>

        <!-- Hubungi Kami -->
        <li style="border-top: 1px solid var(--smast-border); margin-top: 8px; padding-top: 8px;">
            <a href="index.php?page=kontak"><i class="fas fa-envelope fa-fw"></i> Hubungi Kami</a>
        </li>
    </ul>
</div>
