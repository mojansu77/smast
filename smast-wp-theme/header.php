<!DOCTYPE html>
<html <?php language_attributes(); ?> data-theme="light">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website Resmi SMA Negeri 1 Kota Kediri (SMAST). Unggul dalam Prestasi, Berakhlak Mulia. Smast Mulia Jaya Jaya Jaya!!! Pusat informasi akademik, profil sekolah, kesiswaan, ekstrakurikuler, dan prestasi.">

    <!-- Open Graph (Facebook / WA / Telegram Share) -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?>">
    <meta property="og:description" content="SMA Negeri 1 Kota Kediri (SMAST) &mdash; Unggul dalam Prestasi, Berakhlak Mulia. Smast Mulia Jaya Jaya Jaya!!! Sekolah Menengah Atas Negeri Unggulan Kota Kediri terakreditasi A.">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/Logo SMAST.png">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/Logo SMAST.png?v=2">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/Logo SMAST.png?v=2">

    <!-- Anti-FOUC Theme Detection Script -->
    <script>
        (function() {
            var savedTheme = localStorage.getItem('smast-theme');
            var prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
                document.documentElement.setAttribute('data-theme', 'dark');
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.setAttribute('data-theme', 'light');
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ══════════════════════════════════════════════════════════════════════════
     TOP ACCESSIBILITY SKIP LINK
     ══════════════════════════════════════════════════════════════════════════ -->
<a href="#main-content" class="skip-to-content" style="position:absolute; left:-9999px; top:auto; width:1px; height:1px; overflow:hidden; z-index:99999;">
    Loncat ke konten utama
</a>

<!-- ══════════════════════════════════════════════════════════════════════════
     MINIMALIST SINGLE NAVBAR (1 Baris Rapi: Brand | Menu | Email, Telepon, Cari, Mode, Dashboard)
     ══════════════════════════════════════════════════════════════════════════ -->
<header class="smast-navbar" id="smast-navbar" role="banner">
    <div class="smast-container smast-navbar-inner">

        <!-- Brand Identity (Left): Logo + Nama Sekolah + Semboyan -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="smast-navbar-brand" aria-label="SMA Negeri 1 Kota Kediri - Beranda">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo SMAST.png" alt="Logo SMA Negeri 1 Kota Kediri" class="brand-logo-img">
            <div class="brand-text">
                <span class="brand-school-name">SMA NEGERI 1 KOTA KEDIRI</span>
                <span class="brand-school-motto">Smast Mulia Jaya Jaya Jaya!!!</span>
            </div>
        </a>

        <!-- Desktop Navigation Links (Center) -->
        <?php if ( has_nav_menu( 'primary-menu' ) ) : ?>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary-menu',
                'container'      => false,
                'menu_class'     => 'smast-nav-menu',
                'menu_id'        => 'smast-nav-menu',
                'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
                'walker'         => new SMAST_Nav_Walker(),
                'fallback_cb'    => false,
            ) );
            ?>
        <?php else : ?>
        <ul class="smast-nav-menu" id="smast-nav-menu" role="menubar">
            <li role="none">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="smast-nav-link smast-nav-home <?php echo is_front_page() ? 'active' : ''; ?>" role="menuitem" title="Beranda" aria-label="Beranda">
                    <i class="fas fa-home" aria-hidden="true"></i>
                </a>
            </li>

            <li class="smast-dropdown" role="none">
                <a href="<?php echo esc_url( home_url( '/profil' ) ); ?>" class="smast-nav-link <?php echo ( is_page('profil') || is_page('sejarah') || is_page('kurikulum') ) ? 'active' : ''; ?>" role="menuitem" aria-haspopup="true">
                    PROFIL <i class="fas fa-chevron-down nav-arrow"></i>
                </a>
                <ul class="smast-dropdown-menu" role="menu" aria-label="Submenu Profil">
                    <li role="none"><a href="<?php echo esc_url( home_url( '/#sambutan' ) ); ?>" role="menuitem"><i class="fas fa-user-tie fa-fw"></i> Sambutan Kepala Sekolah</a></li>
                    <li role="none"><a href="<?php echo esc_url( home_url( '/profil#visi-misi' ) ); ?>" role="menuitem"><i class="fas fa-compass fa-fw"></i> Visi &amp; Misi (MUSTIKA)</a></li>
                    <li role="none"><a href="<?php echo esc_url( home_url( '/kurikulum' ) ); ?>" role="menuitem"><i class="fas fa-graduation-cap fa-fw"></i> Kurikulum &amp; Program MIPA-IPS</a></li>
                    <li role="none"><a href="<?php echo esc_url( home_url( '/sejarah' ) ); ?>" role="menuitem"><i class="fas fa-landmark fa-fw"></i> Sejarah</a></li>
                    <li role="none"><a href="<?php echo esc_url( home_url( '/profil#data-sekolah' ) ); ?>" role="menuitem"><i class="fas fa-id-card fa-fw"></i> Identitas &amp; Data Sekolah</a></li>
                    <li role="none"><a href="<?php echo esc_url( home_url( '/profil#struktur' ) ); ?>" role="menuitem"><i class="fas fa-sitemap fa-fw"></i> Struktur Organisasi</a></li>
                </ul>
            </li>

            <li role="none">
                <a href="<?php echo esc_url( home_url( '/fasilitas' ) ); ?>" class="smast-nav-link <?php echo ( is_page( 'fasilitas' ) || is_post_type_archive( 'fasilitas' ) ) ? 'active' : ''; ?>" role="menuitem">
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
                </ul>
            </li>

            <li class="smast-dropdown" role="none">
                <a href="<?php echo esc_url( home_url( '/galeri' ) ); ?>" class="smast-nav-link <?php echo ( is_page( 'galeri' ) || is_post_type_archive( 'galeri' ) || is_tax( 'kategori_galeri' ) ) ? 'active' : ''; ?>" role="menuitem" aria-haspopup="true">
                    GALERI <i class="fas fa-chevron-down nav-arrow"></i>
                </a>
                <ul class="smast-dropdown-menu" role="menu" aria-label="Submenu Galeri">
                    <li role="none"><a href="<?php echo esc_url( home_url( '/galeri#foto' ) ); ?>" role="menuitem"><i class="fas fa-camera fa-fw"></i> Galeri Foto</a></li>
                    <li role="none"><a href="<?php echo esc_url( home_url( '/galeri#video' ) ); ?>" role="menuitem"><i class="fas fa-video fa-fw"></i> Galeri Video</a></li>
                </ul>
            </li>

            <li role="none">
                <a href="<?php echo esc_url( home_url( '/ekskul' ) ); ?>" class="smast-nav-link <?php echo ( is_page( 'ekskul' ) || is_post_type_archive( 'ekskul' ) ) ? 'active' : ''; ?>" role="menuitem">
                    EKSKUL
                </a>
            </li>

            <li class="smast-dropdown" role="none">
                <a href="<?php echo esc_url( home_url( '/berita' ) ); ?>" class="smast-nav-link <?php echo ( is_home() || is_singular( 'post' ) || is_category() || is_tag() || is_post_type_archive( 'pengumuman' ) || is_singular( 'pengumuman' ) || is_page( 'pengumuman' ) ) ? 'active' : ''; ?>" role="menuitem" aria-haspopup="true">
                    KABAR <i class="fas fa-chevron-down nav-arrow"></i>
                </a>
                <ul class="smast-dropdown-menu" role="menu" aria-label="Submenu Kabar">
                    <li role="none"><a href="<?php echo esc_url( home_url( '/berita' ) ); ?>" role="menuitem"><i class="fas fa-newspaper fa-fw"></i> Kabar &amp; Berita</a></li>
                    <li role="none"><a href="<?php echo esc_url( home_url( '/pengumuman' ) ); ?>" role="menuitem"><i class="fas fa-bullhorn fa-fw"></i> Pengumuman Resmi</a></li>
                </ul>
            </li>

            <!-- SOSMED (Hanya Instagram & YouTube - X dan FB dihapus sesuai arahan) -->
            <li class="smast-dropdown" role="none">
                <a href="#" class="smast-nav-link" role="menuitem" aria-haspopup="true">
                    SOSMED <i class="fas fa-chevron-down nav-arrow"></i>
                </a>
                <ul class="smast-dropdown-menu" role="menu" aria-label="Submenu Sosmed">
                    <li role="none"><a href="<?php echo esc_url( get_theme_mod( 'smast_instagram_url', 'https://www.instagram.com/smast_kediri_official/' ) ); ?>" target="_blank" rel="noopener noreferrer" role="menuitem"><i class="fab fa-instagram fa-fw" style="color:#E1306C;"></i> Instagram Resmi</a></li>
                    <li role="none"><a href="<?php echo esc_url( get_theme_mod( 'smast_youtube_url', 'https://www.youtube.com/@smast_kediri_official' ) ); ?>" target="_blank" rel="noopener noreferrer" role="menuitem"><i class="fab fa-youtube fa-fw" style="color:#FF0000;"></i> YouTube Resmi</a></li>
                </ul>
            </li>

            <li role="none">
                <a href="<?php echo esc_url( home_url( '/kontak' ) ); ?>" class="smast-nav-link <?php echo is_page( 'kontak' ) ? 'active' : ''; ?>" role="menuitem">
                    HUBUNGI KAMI
                </a>
            </li>
        </ul>
        <?php endif; ?>

        <!-- Right Side Minimalist Cluster: 1) Email, 2) Telepon, 3) Pencarian, 4) Mode, 5) Dashboard (Hamburger) -->
        <div class="smast-navbar-actions">
            <!-- 1. Email Link -->
            <a href="mailto:<?php echo esc_attr( get_theme_mod( 'smast_email', 'redaksi@smastkediri.sch.id' ) ); ?>" class="smast-nav-action-btn" title="Kirim Email ke SMAST (<?php echo esc_attr( get_theme_mod( 'smast_email', 'redaksi@smastkediri.sch.id' ) ); ?>)" aria-label="Email Resmi">
                <i class="fas fa-envelope" aria-hidden="true"></i>
            </a>

            <!-- 2. Telepon Link -->
            <a href="tel:<?php echo esc_attr( str_replace( array(' ', '-', '(', ')'), '', get_theme_mod( 'smast_phone', '+62 354 771829' ) ) ); ?>" class="smast-nav-action-btn" title="Telepon Kantor SMAST (<?php echo esc_attr( get_theme_mod( 'smast_phone', '+62 354 771829' ) ); ?>)" aria-label="Telepon Resmi">
                <i class="fas fa-phone-alt" aria-hidden="true"></i>
            </a>

            <!-- 3. Pencarian Modal Trigger -->
            <button type="button" class="smast-nav-action-btn" id="search-modal-trigger" aria-label="Buka Pencarian Website" title="Pencarian">
                <i class="fas fa-search" aria-hidden="true"></i>
            </button>

            <!-- 4. Mode Tampilan (Day / Night) -->
            <button type="button" class="smast-nav-action-btn smast-theme-toggle" id="theme-toggle" aria-label="Ganti Mode Terang / Gelap" title="Mode Tampilan">
                <i class="fas fa-moon" id="theme-icon" aria-hidden="true"></i>
            </button>

            <!-- 5. Dashboard Menu Toggle (Mobile Drawer) -->
            <button class="smast-hamburger" id="smast-hamburger" aria-label="Buka Menu Dashboard Navigasi" aria-expanded="false" aria-controls="smast-mobile-nav" title="Menu Dashboard">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </button>
        </div>

    </div>
</header>

<!-- ══════════════════════════════════════════════════════════════════════════
     SEARCH OVERLAY MODAL (Fast & Clean Search Dialog)
     ══════════════════════════════════════════════════════════════════════════ -->
<div class="smast-search-modal" id="smast-search-modal" aria-hidden="true" role="dialog" aria-label="Pencarian Website SMAST">
    <div class="smast-search-modal-backdrop" id="smast-search-modal-close"></div>
    <div class="smast-search-modal-box">
        <button type="button" class="smast-search-close-btn" id="search-close-btn" aria-label="Tutup Pencarian">&times;</button>
        <div class="smast-search-header">
            <i class="fas fa-search" aria-hidden="true"></i>
            <h3>Pencarian Website SMAN 1 Kota Kediri</h3>
        </div>
        <form role="search" method="get" class="smast-search-modal-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div class="smast-search-input-group">
                <input type="search" class="smast-search-field" placeholder="Ketik kata kunci pencarian (misal: Prestasi, Sejarah, Ekstrakurikuler)..." value="<?php echo get_search_query(); ?>" name="s" autocomplete="off" required>
                <button type="submit" class="smast-btn smast-btn-primary">Cari Sekarang</button>
            </div>
        </form>
        <p class="smast-search-hint">Tekan ESC atau klik di luar untuk menutup.</p>
    </div>
</div>

<!-- ══════════════════════════════════════════════════════════════════════════
     MOBILE NAVIGATION DRAWER ("DASHBOARD" MENU)
     ══════════════════════════════════════════════════════════════════════════ -->
<div class="smast-mobile-menu" id="smast-mobile-nav" aria-hidden="true">
    <div class="mobile-drawer-header">
        <div class="mobile-drawer-brand">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo SMAST.png" alt="Logo SMAST" class="mobile-drawer-logo">
            <div>
                <strong class="mobile-drawer-title">SMAN 1 KOTA KEDIRI</strong>
                <span class="mobile-drawer-motto">Smast Mulia Jaya Jaya Jaya!!!</span>
            </div>
        </div>
        <div class="mobile-drawer-header-actions">
            <!-- Mode Toggle di Drawer -->
            <button type="button" class="smast-theme-toggle mobile-drawer-action-btn" id="theme-toggle-mobile" aria-label="Ganti Mode Terang/Gelap" title="Mode Tampilan">
                <i class="fas fa-moon" id="theme-icon-mobile"></i>
            </button>
            <!-- Tombol X Close Drawer -->
            <button type="button" class="mobile-drawer-close-btn" id="mobile-drawer-close" aria-label="Tutup Menu Dashboard" title="Tutup Menu">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>

    <!-- Quick Contact in Mobile Drawer -->
    <div class="mobile-contact-bar">
        <a href="mailto:<?php echo esc_attr( get_theme_mod( 'smast_email', 'redaksi@smastkediri.sch.id' ) ); ?>" class="mobile-contact-chip">
            <i class="fas fa-envelope"></i> <?php echo esc_html( get_theme_mod( 'smast_email', 'redaksi@smastkediri.sch.id' ) ); ?>
        </a>
        <a href="tel:<?php echo esc_attr( str_replace( array(' ', '-', '(', ')'), '', get_theme_mod( 'smast_phone', '+62 354 771829' ) ) ); ?>" class="mobile-contact-chip">
            <i class="fas fa-phone-alt"></i> <?php echo esc_html( get_theme_mod( 'smast_phone', '+62 354 771829' ) ); ?>
        </a>
    </div>

    <ul>
        <?php if ( has_nav_menu( 'primary-menu' ) ) : ?>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary-menu',
                'container'      => false,
                'items_wrap'     => '%3$s',
                'walker'         => new SMAST_Mobile_Nav_Walker(),
                'fallback_cb'    => false,
            ) );
            ?>
        <?php else : ?>
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fas fa-home fa-fw"></i> Beranda</a></li>
        <li><a href="<?php echo esc_url( home_url( '/profil' ) ); ?>"><i class="fas fa-school fa-fw"></i> Profil &amp; Visi Misi</a></li>
        <li><a href="<?php echo esc_url( home_url( '/kurikulum' ) ); ?>"><i class="fas fa-graduation-cap fa-fw"></i> Kurikulum &amp; Program MIPA-IPS</a></li>
        <li><a href="<?php echo esc_url( home_url( '/sejarah' ) ); ?>"><i class="fas fa-landmark fa-fw"></i> Sejarah Sekolah</a></li>
        <li><a href="<?php echo esc_url( home_url( '/fasilitas' ) ); ?>"><i class="fas fa-building fa-fw"></i> Fasilitas Kampus</a></li>
        <li><a href="<?php echo esc_url( home_url( '/ekskul' ) ); ?>"><i class="fas fa-users fa-fw"></i> 24+ Ekstrakurikuler</a></li>
        <li><a href="<?php echo esc_url( home_url( '/galeri' ) ); ?>"><i class="fas fa-images fa-fw"></i> Galeri Foto &amp; Video</a></li>
        <li><a href="<?php echo esc_url( home_url( '/berita' ) ); ?>"><i class="fas fa-newspaper fa-fw"></i> Kabar &amp; Berita</a></li>
        <li><a href="<?php echo esc_url( home_url( '/pengumuman' ) ); ?>"><i class="fas fa-bullhorn fa-fw"></i> Pengumuman Resmi</a></li>

        <!-- Aplikasi Sekolah -->
        <li class="drawer-section-divider">
            <span>Aplikasi Sekolah</span>
        </li>
        <li><a href="https://si.smastkediri.sch.id/index.php" target="_blank" rel="noopener noreferrer"><i class="fas fa-laptop-code fa-fw"></i> SISMAST</a></li>
        <li><a href="https://elibrary.smastkediri.sch.id/" target="_blank" rel="noopener noreferrer"><i class="fas fa-book-reader fa-fw"></i> Perpustakaan (E-Library)</a></li>

        <!-- Media Sosial (Hanya Instagram & YouTube - FB & X dihapus) -->
        <li class="drawer-section-divider">
            <span>Media Sosial Resmi</span>
        </li>
        <li><a href="<?php echo esc_url( get_theme_mod( 'smast_instagram_url', 'https://www.instagram.com/smast_kediri_official/' ) ); ?>" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram fa-fw" style="color:#E1306C;"></i> Instagram Resmi</a></li>
        <li><a href="<?php echo esc_url( get_theme_mod( 'smast_youtube_url', 'https://www.youtube.com/@smast_kediri_official' ) ); ?>" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube fa-fw" style="color:#FF0000;"></i> YouTube Resmi</a></li>

        <!-- Hubungi Kami -->
        <li class="drawer-section-divider">
            <a href="<?php echo esc_url( home_url( '/kontak' ) ); ?>"><i class="fas fa-envelope fa-fw"></i> Hubungi Kami</a>
        </li>
        <?php endif; ?>
    </ul>
</div>

<main id="main-content">
