<?php
/**
 * Front Page Template — SMA Negeri 1 Kota Kediri (SMAST)
 *
 * @package SMAST
 * @version 2.1.0
 */

get_header();

// Ambil pengumuman ticker dari customizer atau default (Zero PPDB)
$ticker_default = 'Tim Olimpiade Sains SMAN 1 Kediri Raih Juara 1 Tingkat Provinsi | Penilaian Tengah Semester (PTS) Ganjil Dimulai 10 November 2025 | Selamat kepada Siswa-Siswi yang Lolos Seleksi SNBP 2025 | Dies Natalis SMA Negeri 1 Kota Kediri';
$ticker_raw = get_theme_mod( 'smast_ticker_text', $ticker_default );

// Bersihkan PPDB jika ada residu tersimpan di database
$ticker_raw = trim( str_ireplace( array( 'PPDB 2025/2026 Telah Dibuka |', 'PPDB 2025/2026 Telah Dibuka', 'PPDB 2025', 'Penerimaan Peserta Didik Baru' ), '', $ticker_raw ), " |" );
if ( empty( $ticker_raw ) ) {
    $ticker_raw = $ticker_default;
}

$ticker_items = array_filter( array_map( 'trim', explode( '|', $ticker_raw ) ) );

// Sisipkan pengumuman resmi terbaru dari CPT pengumuman jika ada
$cpt_pengumuman_ticker = get_posts( array(
    'post_type'      => 'pengumuman',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
) );
if ( ! empty( $cpt_pengumuman_ticker ) ) {
    $pengumuman_items = array();
    foreach ( $cpt_pengumuman_ticker as $ann_post ) {
        $pengumuman_items[] = 'PENGUMUMAN RESMI: ' . get_the_title( $ann_post->ID );
    }
    $ticker_items = array_merge( $pengumuman_items, $ticker_items );
}

// Kepala sekolah data
$principal_name  = get_theme_mod( 'smast_principal_name', 'ARIF SYAH PUTRA, M.Pd.' );
$principal_nip   = get_theme_mod( 'smast_principal_nip', 'Kepala SMA Negeri 1 Kota Kediri' );
$principal_photo = get_theme_mod( 'smast_principal_photo', '' );
if ( empty( $principal_photo ) ) {
    $principal_photo = get_template_directory_uri() . '/assets/images/Kepala Sekolah.png';
}

// ─── QUERY HERO SLIDER DINAMIS (Dari Berita, Galeri, dan CPT: hero_slide) ─────
// 1. Ambil pos Berita & Galeri yang dicentang "Tampilkan di Hero Slider"
$dynamic_items = get_posts( array(
    'post_type'      => array( 'post', 'galeri' ),
    'posts_per_page' => 8,
    'post_status'    => 'publish',
    'meta_key'       => '_show_in_hero',
    'meta_value'     => '1',
    'orderby'        => 'date',
    'order'          => 'DESC',
) );

// 2. Ambil slide manual dari CPT hero_slide (jika ada)
$custom_slides = get_posts( array(
    'post_type'      => 'hero_slide',
    'posts_per_page' => 8,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order date',
    'order'          => 'ASC',
) );

$all_slide_posts = array_merge( $dynamic_items, $custom_slides );
$slides = array();

if ( ! empty( $all_slide_posts ) ) {
    foreach ( $all_slide_posts as $p ) {
        $pid    = $p->ID;
        $ptype  = $p->post_type;
        $bg_img = function_exists( 'smast_get_galeri_image' )
            ? smast_get_galeri_image( $pid, 'full' )
            : ( get_the_post_thumbnail_url( $pid, 'full' ) ?: '' );

        $badge_val = get_post_meta( $pid, '_hero_badge', true );
        if ( ! empty( $badge_val ) ) {
            // Bersihkan sufiks kategori jika tersimpan otomatis sebelumnya
            $badge_val = trim( preg_replace( '/\s*—\s*(Tak Berkategori|Foto Dokumentasi|Dokumentasi Sekolah|Berita Harian|Warta Sekolah)/i', '', $badge_val ) );
        }
        $tag_val   = get_post_meta( $pid, '_hero_tagline', true );
        $btn1_t    = get_post_meta( $pid, '_hero_btn1_text', true );
        $btn1_u    = get_post_meta( $pid, '_hero_btn1_url', true );
        $btn2_t    = get_post_meta( $pid, '_hero_btn2_text', true );
        $btn2_u    = get_post_meta( $pid, '_hero_btn2_url', true );
        $custom_title = get_post_meta( $pid, '_hero_custom_title', true );

        if ( $ptype === 'post' ) {
            // Berita (Tanpa kategori di badge hero slider sesuai permintaan)
            $default_badge = 'Warta SMAN 1 Kediri';
            $default_tag   = '"Kabar & Prestasi Terkini SMAN 1 Kota Kediri"';
            $default_desc  = has_excerpt( $pid ) ? get_the_excerpt( $pid ) : wp_trim_words( $p->post_content, 26, '...' );
            $default_btn1  = 'Baca Berita Lengkap';
            $default_btn1_url = get_permalink( $pid );
            $default_btn2  = 'Kabar & Berita';
            $default_btn2_url = esc_url( home_url( '/berita' ) );
        } elseif ( $ptype === 'galeri' ) {
            // Galeri (Tanpa kategori di badge hero slider sesuai permintaan)
            $default_badge = 'Galeri Dokumentasi';
            $default_tag   = '"Potret Prestasi & Kebanggaan SMAN 1 Kota Kediri"';
            $caption_val   = get_post_meta( $pid, '_galeri_caption', true );
            $default_desc  = ! empty( $caption_val ) ? $caption_val : ( has_excerpt( $pid ) ? get_the_excerpt( $pid ) : wp_trim_words( $p->post_content, 26, '...' ) );
            $default_btn1  = 'Buka Dokumentasi';
            $default_btn1_url = get_permalink( $pid );
            $default_btn2  = 'Semua Galeri';
            $default_btn2_url = esc_url( home_url( '/galeri' ) );
        } else {
            // CPT hero_slide
            $default_badge = 'Terakreditasi A — SMAN 1 Kediri';
            $default_tag   = '"Unggul dalam Prestasi, Berakhlak Mulia"';
            $default_desc  = has_excerpt( $pid ) ? get_the_excerpt( $pid ) : wp_trim_words( $p->post_content, 26, '...' );
            $default_btn1  = 'Profil Sekolah';
            $default_btn1_url = esc_url( home_url( '/profil' ) );
            $default_btn2  = 'Kabar & Berita';
            $default_btn2_url = esc_url( home_url( '/berita' ) );
        }

        $slides[] = array(
            'badge'      => $badge_val ?: $default_badge,
            'title'      => ! empty( $custom_title ) ? $custom_title : get_the_title( $pid ),
            'tagline'    => $tag_val ?: $default_tag,
            'desc'       => $default_desc,
            'btn1_text'  => $btn1_t ?: $default_btn1,
            'btn1_url'   => $btn1_u ?: $default_btn1_url,
            'btn2_text'  => $btn2_t ?: $default_btn2,
            'btn2_url'   => $btn2_u ?: $default_btn2_url,
            'bg_img'     => $bg_img,
        );
    }
}

// Fallback jika belum ada slide yang dibuat di WP Admin
if ( empty( $slides ) ) {
    $slides = array(
        array(
            'badge'      => 'Terakreditasi A — Sekolah Unggulan Kota Kediri',
            'title'      => 'SMA Negeri 1<br><span class="gold-text">Kota Kediri</span>',
            'tagline'    => '"Unggul dalam Prestasi, Berakhlak Mulia"',
            'desc'       => 'Mencetak Manusia Unggul Spiritual, Tinggi Intelektual, Kreatif berwawasan lingkungan dan Amanah (MUSTIKA).',
            'btn1_text'  => 'Profil Sekolah',
            'btn1_url'   => esc_url( home_url( '/profil' ) ),
            'btn2_text'  => 'Kabar & Berita',
            'btn2_url'   => esc_url( home_url( '/berita' ) ),
            'bg_img'     => '',
        ),
        array(
            'badge'      => 'Pusat Keunggulan Akademik & Sains',
            'title'      => 'Prestasi Juara<br><span class="gold-text">Sains & Humaniora</span>',
            'tagline'    => '"Smast Mulia Jaya Jaya Jaya!!!"',
            'desc'       => 'Mengembangkan potensi peserta didik melalui pembelajaran berbasis kurikulum merdeka, riset ilmiah, dan pembinaan olimpiade sains berprestasi nasional.',
            'btn1_text'  => 'Fasilitas Sekolah',
            'btn1_url'   => esc_url( home_url( '/fasilitas' ) ),
            'btn2_text'  => 'Sejarah Sekolah',
            'btn2_url'   => esc_url( home_url( '/sejarah' ) ),
            'bg_img'     => '',
        ),
        array(
            'badge'      => 'Prestasi & Pengembangan Karakter',
            'title'      => '24 Cabang<br><span class="gold-text">Ekstrakurikuler</span>',
            'tagline'    => '"Wadah Bakat, Kreativitas, dan Jiwa Kepemimpinan Siswa"',
            'desc'       => 'Mendukung eksplorasi minat siswa di bidang sains teknologi, seni musik, paduan suara, teater, jurnalistik, bela negara, serta cabang olahraga prestasi di tingkat nasional.',
            'btn1_text'  => 'Jelajahi Ekskul',
            'btn1_url'   => esc_url( home_url( '/ekskul' ) ),
            'btn2_text'  => 'Galeri Kegiatan',
            'btn2_url'   => esc_url( home_url( '/galeri' ) ),
            'bg_img'     => '',
        ),
    );
}
?>

<!-- ══════════════════════════════════════════════════════════════════════════
     SECTION 1: HERO SLIDESHOW (Dynamic WP_Query — Clean UI No Scroll Indicator)
     ══════════════════════════════════════════════════════════════════════════ -->
<section class="smast-hero" id="hero" aria-label="Banner Utama SMA Negeri 1 Kota Kediri">

    <div class="smast-hero-slider" id="smast-hero-slider">
        <?php foreach ( $slides as $i => $s ) : ?>
            <div class="smast-hero-slide <?php echo $i === 0 ? 'active' : ''; ?>" data-index="<?php echo $i; ?>">
                <div class="smast-hero-slide-bg" <?php echo ! empty( $s['bg_img'] ) ? 'style="background-image: url(\'' . esc_url( $s['bg_img'] ) . '\');"' : ''; ?> aria-hidden="true"></div>
                <div class="smast-hero-overlay" aria-hidden="true"></div>
                <div class="smast-container">
                    <div class="smast-hero-content">
                        <h1 class="smast-hero-title" style="color: #FFFFFF !important; text-shadow: 0 3px 18px rgba(0,0,0,0.85);"><?php echo wp_kses_post( $s['title'] ); ?></h1>

                        <?php if ( ! empty( $s['tagline'] ) ) : ?>
                            <p class="smast-hero-tagline"><?php echo esc_html( $s['tagline'] ); ?></p>
                        <?php endif; ?>

                        <p class="smast-hero-desc"><?php echo esc_html( $s['desc'] ); ?></p>

                        <div class="smast-hero-buttons">
                            <?php if ( ! empty( $s['btn1_text'] ) ) : ?>
                                <a href="<?php echo esc_url( $s['btn1_url'] ); ?>" class="smast-btn smast-btn-gold smast-btn-lg">
                                    <i class="fas fa-user-graduate" aria-hidden="true"></i> <span><?php echo esc_html( $s['btn1_text'] ); ?></span>
                                </a>
                            <?php endif; ?>
                            <?php if ( ! empty( $s['btn2_text'] ) ) : ?>
                                <a href="<?php echo esc_url( $s['btn2_url'] ); ?>" class="smast-btn smast-btn-outline smast-btn-lg">
                                    <i class="fas fa-newspaper" aria-hidden="true"></i> <span><?php echo esc_html( $s['btn2_text'] ); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Arrow navigation -->
    <button class="smast-hero-arrow smast-hero-prev" id="hero-prev-btn" aria-label="Slide Sebelumnya">
        <i class="fas fa-chevron-left" aria-hidden="true"></i>
    </button>
    <button class="smast-hero-arrow smast-hero-next" id="hero-next-btn" aria-label="Slide Selanjutnya">
        <i class="fas fa-chevron-right" aria-hidden="true"></i>
    </button>

    <!-- Dot indicators -->
    <div class="smast-hero-dots" id="hero-dots-container" aria-label="Navigasi slide">
        <?php foreach ( $slides as $i => $s ) : ?>
            <button class="smast-hero-dot <?php echo $i === 0 ? 'active' : ''; ?>" data-slide="<?php echo $i; ?>" aria-label="Slide <?php echo $i + 1; ?>"></button>
        <?php endforeach; ?>
    </div>

    <!-- Scroll arrow indicator COMPLETELY REMOVED for clean Hero UI -->
</section>

<!-- ══════════════════════════════════════════════════════════════════════════
     KUTIPAN & INFORMASI TICKER (Exact match to live website screenshot)
     ══════════════════════════════════════════════════════════════════════════ -->
<div class="smast-kutipan-bar" role="marquee" aria-label="Kutipan dan Informasi">
    <div class="smast-container smast-kutipan-inner">
        <div class="smast-kutipan-badge">
            <i class="fas fa-quote-left" aria-hidden="true"></i> KUTIPAN
        </div>
        <div class="smast-kutipan-track-wrapper">
            <div class="smast-kutipan-track" id="smast-kutipan-track">
                <span class="smast-kutipan-item">
                    <?php echo esc_html( get_theme_mod( 'smast_kutipan_text', 'Agama tanpa ilmu pengetahuan adalah buta. Dan ilmu pengetahuan tanpa agama adalah lumpuh.' ) ); ?>
                    <strong class="smast-kutipan-author"><?php echo esc_html( get_theme_mod( 'smast_kutipan_author', 'Anonim' ) ); ?></strong>
                </span>
                <?php if ( ! empty( $ticker_items ) ) : ?>
                    <?php foreach ( $ticker_items as $item ) : ?>
                        <span class="smast-kutipan-item">
                            <i class="fas fa-circle-dot" aria-hidden="true"></i> <?php echo esc_html( $item ); ?>
                        </span>
                    <?php endforeach; ?>
                <?php endif; ?>
                <!-- Duplicate for seamless continuous scroll loop -->
                <span class="smast-kutipan-item" aria-hidden="true">
                    <?php echo esc_html( get_theme_mod( 'smast_kutipan_text', 'Agama tanpa ilmu pengetahuan adalah buta. Dan ilmu pengetahuan tanpa agama adalah lumpuh.' ) ); ?>
                    <strong class="smast-kutipan-author"><?php echo esc_html( get_theme_mod( 'smast_kutipan_author', 'Anonim' ) ); ?></strong>
                </span>
                <?php if ( ! empty( $ticker_items ) ) : ?>
                    <?php foreach ( $ticker_items as $item ) : ?>
                        <span class="smast-kutipan-item" aria-hidden="true">
                            <i class="fas fa-circle-dot" aria-hidden="true"></i> <?php echo esc_html( $item ); ?>
                        </span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════════════════════════════════════════
     SECTION 2: STATS BAR
     ══════════════════════════════════════════════════════════════════════════ -->
<section class="smast-stats" aria-label="Statistik Sekolah">
    <div class="smast-container">
        <div class="smast-stats-grid">
            <div class="smast-stat-item smast-reveal">
                <span class="smast-stat-icon"><i class="fas fa-user-graduate" aria-hidden="true"></i></span>
                <span class="smast-stat-number" data-target="1247">1.247</span>
                <span class="smast-stat-label">Jumlah Siswa Aktif</span>
            </div>
            <div class="smast-stat-item smast-reveal smast-reveal-delay-1">
                <span class="smast-stat-icon"><i class="fas fa-chalkboard-teacher" aria-hidden="true"></i></span>
                <span class="smast-stat-number" data-target="89">89</span>
                <span class="smast-stat-label">Guru &amp; Tenaga Pendidik</span>
            </div>
            <div class="smast-stat-item smast-reveal smast-reveal-delay-2">
                <span class="smast-stat-icon"><i class="fas fa-trophy" aria-hidden="true"></i></span>
                <span class="smast-stat-number" data-target="24">24</span>
                <span class="smast-stat-label">Ekstrakurikuler Aktif</span>
            </div>
            <div class="smast-stat-item smast-reveal smast-reveal-delay-3">
                <span class="smast-stat-icon"><i class="fas fa-award" aria-hidden="true"></i></span>
                <span class="smast-stat-number" data-target="100" data-suffix="%">A</span>
                <span class="smast-stat-label">Akreditasi A Unggul</span>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════════════════════════════════════════════════════════════════
     SECTION 3: SAMBUTAN KEPALA SEKOLAH
     ══════════════════════════════════════════════════════════════════════════ -->
<section class="smast-sambutan" id="sambutan" aria-label="Sambutan Kepala Sekolah">
    <div class="smast-container">
        <div class="smast-sambutan-card smast-reveal">
            <div class="smast-sambutan-grid">

                <!-- Foto Kepala Sekolah -->
                <div class="smast-sambutan-photo-col">
                    <div class="smast-sambutan-photo-frame">
                        <?php if ( ! empty( $principal_photo ) ) : ?>
                            <img src="<?php echo esc_url( $principal_photo ); ?>" alt="Foto <?php echo esc_attr( $principal_name ); ?>" class="smast-sambutan-img">
                        <?php else : ?>
                            <div class="smast-sambutan-img-placeholder" aria-label="Foto Kepala Sekolah">
                                <i class="fas fa-user-tie" aria-hidden="true"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Teks Sambutan -->
                <div class="smast-sambutan-text-col">
                    <span class="smast-section-eyebrow">
                        <i class="fas fa-comment-dots" aria-hidden="true"></i> Kata Pengantar
                    </span>
                    <h2 class="smast-sambutan-heading">Sambutan Kepala Sekolah</h2>
                    <div class="smast-sambutan-divider"></div>

                    <div class="smast-sambutan-body">
                        <p>
                            <em>Assalamu’alaikum Warahmatullahi Wabarakatuh, Salam Sejahtera bagi Kita Semua,</em><br>
                            Selamat datang di portal informasi resmi <strong>SMA Negeri 1 Kota Kediri (SMAST)</strong>.
                        </p>
                        <?php
                        $sambutan_text = get_theme_mod(
                            'smast_sambutan_text',
                            'Website ini kami hadirkan sebagai wujud komitmen sekolah dalam mewujudkan keterbukaan informasi, pelayanan publik yang prima, serta ruang interaksi edukatif bagi seluruh warga sekolah, alumni, dan masyarakat luas.'
                        );
                        echo wp_kses_post( wpautop( $sambutan_text ) );
                        ?>
                        <p>
                            SMA Negeri 1 Kota Kediri senantiasa berikhtiar mencetak generasi penerus bangsa yang tidak hanya unggul
                            dalam penguasaan ilmu pengetahuan dan teknologi, tetapi juga berakhlak mulia, berintegritas,
                            dan memiliki kepedulian sosial yang tinggi.
                        </p>
                    </div>

                    <div class="smast-sambutan-signature">
                        <div class="sig-name"><?php echo esc_html( $principal_name ); ?></div>
                        <div class="sig-title">Kepala SMA Negeri 1 Kota Kediri &bull; <?php echo esc_html( $principal_nip ); ?></div>
                    </div>

                    <div class="smast-sambutan-btn-wrap" style="margin-top: 24px;">
                        <a href="<?php echo esc_url( home_url( '/profil' ) ); ?>" class="smast-btn smast-btn-navy">
                            <i class="fas fa-school" aria-hidden="true"></i> <span>Profil Lengkap SMAN 1 Kediri</span> <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════════════════════
     SECTION 5: PROFIL & AKADEMIK CARDS (6 Grid)
     ══════════════════════════════════════════════════════════════════════════ -->
<section class="smast-section bg-light" id="profil-cards" aria-label="Profil dan Program Unggulan">
    <div class="smast-container">
        <div class="smast-section-header smast-reveal">
            <span class="smast-section-eyebrow"><i class="fas fa-landmark" aria-hidden="true"></i> Profil &amp; Akademik</span>
            <h2 class="smast-section-title">Pilar Pendidikan <span>Berkualitas</span></h2>
            <p class="smast-section-desc">Mendukung terwujudnya lingkungan belajar yang inspiratif, inklusif, dan adaptif terhadap perkembangan zaman di SMA Negeri 1 Kota Kediri.</p>
        </div>

        <div class="smast-profil-grid">
            <!-- Card 1 -->
            <div class="smast-card smast-reveal">
                <div class="smast-card-icon icon-navy"><i class="fas fa-bullseye" aria-hidden="true"></i></div>
                <h3 class="smast-card-title">Visi &amp; Misi (MUSTIKA)</h3>
                <p class="smast-card-desc">Mencetak Manusia Unggul Spiritual, Tinggi Intelektual, Kreatif berwawasan lingkungan dan Amanah (MUSTIKA).</p>
                <a href="<?php echo esc_url( home_url( '/profil#visi-misi' ) ); ?>" class="smast-card-link">Baca Visi Misi <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
            </div>

            <!-- Card 2 -->
            <div class="smast-card smast-reveal smast-reveal-delay-1">
                <div class="smast-card-icon icon-gold"><i class="fas fa-atom" aria-hidden="true"></i></div>
                <h3 class="smast-card-title">Program MIPA &amp; IPS</h3>
                <p class="smast-card-desc">Kurikulum komprehensif didukung laboratorium modern fisika, kimia, biologi, dan komputer berstandar nasional.</p>
                <a href="<?php echo esc_url( home_url( '/kurikulum#mipa-ips' ) ); ?>" class="smast-card-link">Pelajari Program <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
            </div>

            <!-- Card 3 -->
            <div class="smast-card smast-reveal smast-reveal-delay-2">
                <div class="smast-card-icon icon-blue"><i class="fas fa-building-columns" aria-hidden="true"></i></div>
                <h3 class="smast-card-title">Fasilitas Lengkap</h3>
                <p class="smast-card-desc">Ruang kelas ber-AC, perpustakaan digital, lab bahasa, aula serbaguna, sarana olahraga, dan hotspot terpadu.</p>
                <a href="<?php echo esc_url( home_url( '/fasilitas' ) ); ?>" class="smast-card-link">Jelajahi Fasilitas <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
            </div>

            <!-- Card 4 -->
            <div class="smast-card smast-reveal">
                <div class="smast-card-icon icon-green"><i class="fas fa-medal" aria-hidden="true"></i></div>
                <h3 class="smast-card-title">Tradisi Prestasi</h3>
                <p class="smast-card-desc">Ratusan piala olimpiade sains (OSN), festival seni (FLS2N), olahraga (O2SN), dan debat bahasa di tingkat daerah hingga nasional.</p>
                <a href="<?php echo esc_url( home_url( '/galeri?kategori=prestasi#galeri-content' ) ); ?>" class="smast-card-link">Lihat Prestasi <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
            </div>

            <!-- Card 5 -->
            <div class="smast-card smast-reveal smast-reveal-delay-1">
                <div class="smast-card-icon icon-purple"><i class="fas fa-book-open-reader" aria-hidden="true"></i></div>
                <h3 class="smast-card-title">Kurikulum Merdeka</h3>
                <p class="smast-card-desc">Implementasi Projek Penguatan Profil Pelajar Pancasila (P5) yang mengasah kreativitas, kolaborasi, dan nalar kritis siswa.</p>
                <a href="<?php echo esc_url( home_url( '/kurikulum' ) ); ?>" class="smast-card-link">Info Kurikulum <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
            </div>

            <!-- Card 6 -->
            <div class="smast-card smast-reveal smast-reveal-delay-2">
                <div class="smast-card-icon icon-red"><i class="fas fa-laptop-code" aria-hidden="true"></i></div>
                <h3 class="smast-card-title">Sistem E-Learning</h3>
                <p class="smast-card-desc">Platform pembelajaran digital terintegrasi untuk mendukung proses belajar daring, tugas mandiri, dan ujian berbasis CBT.</p>
                <a href="<?php echo esc_url( home_url( '/kontak' ) ); ?>" class="smast-card-link">Akses Portal <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Call-to-Action to Full Profil & Sejarah -->
        <div class="smast-ekskul-cta-wrap smast-reveal">
            <p class="smast-ekskul-cta-note">
                <i class="fas fa-info-circle" aria-hidden="true"></i> Pelajari lebih dalam visi misi MUSTIKA, sejarah SMAN 1 Kediri sejak 1946, dan program unggulan sekolah.
            </p>
            <a href="<?php echo esc_url( home_url( '/profil' ) ); ?>" class="smast-btn smast-btn-gold smast-btn-lg">
                <i class="fas fa-school" aria-hidden="true"></i> <span>Lihat Profil Lengkap SMAN 1 Kediri</span> <i class="fas fa-arrow-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════════════════════
     SECTION 6: BERITA & PENGUMUMAN TERBARU
     ══════════════════════════════════════════════════════════════════════════ -->
<section class="smast-section" id="berita" aria-label="Berita dan Informasi Terkini">
    <div class="smast-container">
        <div class="smast-section-header smast-reveal">
            <span class="smast-section-eyebrow"><i class="fas fa-newspaper" aria-hidden="true"></i> Informasi Terkini</span>
            <h2 class="smast-section-title">Tulisan <span>Terbaru</span></h2>
            <p class="smast-section-desc">Kabar terkini, pengumuman resmi, dan liputan kegiatan keluarga besar SMA Negeri 1 Kota Kediri.</p>
        </div>

        <div class="smast-berita-grid">
            <?php
            $news_query = new WP_Query( array(
                'posts_per_page'      => 3,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => 1,
            ) );

            if ( $news_query->have_posts() ) :
                while ( $news_query->have_posts() ) : $news_query->the_post();
            ?>
                <article class="smast-berita-card smast-reveal">
                    <div class="smast-berita-thumb">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'smast-card', array( 'alt' => get_the_title() ) ); ?>
                        <?php else : ?>
                            <div class="smast-berita-thumb-placeholder">
                                <i class="fas fa-newspaper" aria-hidden="true"></i>
                                <span>SMA Negeri 1 Kota Kediri</span>
                            </div>
                        <?php endif; ?>
                        <span class="smast-berita-badge">
                            <?php
                            $cats = get_the_category();
                            echo ! empty( $cats ) ? esc_html( $cats[0]->name ) : 'Berita';
                            ?>
                        </span>
                    </div>
                    <div class="smast-berita-content">
                        <div class="smast-berita-meta">
                            <span><i class="fas fa-calendar-alt" aria-hidden="true"></i> <?php echo get_the_date( 'd M Y' ); ?></span>
                            <span><i class="fas fa-user" aria-hidden="true"></i> <?php the_author(); ?></span>
                        </div>
                        <h3 class="smast-berita-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p class="smast-berita-excerpt">
                            <?php echo wp_trim_words( get_the_excerpt(), 18, '...' ); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="smast-berita-readmore">
                            Baca Selengkapnya <i class="fas fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <!-- Fallback 3 Kartu Berita Sekolah -->
                <article class="smast-berita-card smast-reveal">
                    <div class="smast-berita-thumb">
                        <div class="smast-berita-thumb-placeholder">
                            <i class="fas fa-file-invoice" aria-hidden="true"></i>
                            <span>Akademik SMAST</span>
                        </div>
                        <span class="smast-berita-badge">Akademik</span>
                    </div>
                    <div class="smast-berita-content">
                        <div class="smast-berita-meta">
                            <span><i class="fas fa-calendar-alt"></i> 10 November 2025</span>
                            <span><i class="fas fa-user"></i> Kurikulum SMAST</span>
                        </div>
                        <h3 class="smast-berita-title">
                            <a href="<?php echo esc_url( home_url( '/berita' ) ); ?>">Jadwal Penilaian Akhir Semester Ganjil SMA Negeri 1 Kota Kediri</a>
                        </h3>
                        <p class="smast-berita-excerpt">
                            Pelaksanaan penilaian sumatif berbasis CBT terintegrasi di laboratorium komputer bagi siswa kelas X, XI, dan XII.
                        </p>
                        <a href="<?php echo esc_url( home_url( '/berita' ) ); ?>" class="smast-berita-readmore">
                            Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>

                <article class="smast-berita-card smast-reveal smast-reveal-delay-1">
                    <div class="smast-berita-thumb">
                        <div class="smast-berita-thumb-placeholder">
                            <i class="fas fa-trophy" aria-hidden="true"></i>
                            <span>Prestasi Siswa</span>
                        </div>
                        <span class="smast-berita-badge">Prestasi</span>
                    </div>
                    <div class="smast-berita-content">
                        <div class="smast-berita-meta">
                            <span><i class="fas fa-calendar-alt"></i> 02 Mei 2025</span>
                            <span><i class="fas fa-user"></i> Tim Jurnalistik</span>
                        </div>
                        <h3 class="smast-berita-title">
                            <a href="<?php echo esc_url( home_url( '/berita' ) ); ?>">Siswa SMA Negeri 1 Kota Kediri Raih Medali Emas Olimpiade Sains Nasional</a>
                        </h3>
                        <p class="smast-berita-excerpt">
                            Prestasi membanggakan kembali diraih kontingen SMAST dalam ajang Olimpiade Sains Nasional (OSN) tingkat provinsi Jawa Timur.
                        </p>
                        <a href="<?php echo esc_url( home_url( '/berita' ) ); ?>" class="smast-berita-readmore">
                            Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>

                <article class="smast-berita-card smast-reveal smast-reveal-delay-2">
                    <div class="smast-berita-thumb">
                        <div class="smast-berita-thumb-placeholder">
                            <i class="fas fa-palette" aria-hidden="true"></i>
                            <span>Gelar Karya P5</span>
                        </div>
                        <span class="smast-berita-badge">Kesiswaan</span>
                    </div>
                    <div class="smast-berita-content">
                        <div class="smast-berita-meta">
                            <span><i class="fas fa-calendar-alt"></i> 20 Apr 2025</span>
                            <span><i class="fas fa-user"></i> Humas SMAST</span>
                        </div>
                        <h3 class="smast-berita-title">
                            <a href="<?php echo esc_url( home_url( '/berita' ) ); ?>">Gelar Karya P5: Mengembangkan Kreativitas dan Solidaritas Sosial Siswa</a>
                        </h3>
                        <p class="smast-berita-excerpt">
                            Ratusan siswa menampilkan karya inovatif, kerajinan tangan, dan proyek sosial dalam pameran Projek Profil Pelajar Pancasila.
                        </p>
                        <a href="<?php echo esc_url( home_url( '/berita' ) ); ?>" class="smast-berita-readmore">
                            Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            <?php endif; ?>
        </div>

        <!-- Call-to-Action to Full News Directory -->
        <div class="smast-ekskul-cta-wrap smast-reveal">
            <p class="smast-ekskul-cta-note">
                <i class="fas fa-bullhorn" aria-hidden="true"></i> Ikuti pembaruan berkala tentang prestasi siswa, agenda akademik, dan informasi kedinasan.
            </p>
            <a href="<?php echo esc_url( home_url( '/berita' ) ); ?>" class="smast-btn smast-btn-gold smast-btn-lg">
                <i class="fas fa-newspaper" aria-hidden="true"></i> <span>Jelajahi Seluruh Berita Sekolah</span> <i class="fas fa-arrow-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════════════════════
     SECTION: FASILITAS UNGGULAN SEKOLAH (Preview)
     ══════════════════════════════════════════════════════════════════════════ -->
<section class="smast-section bg-light" id="fasilitas-preview" aria-label="Fasilitas Unggulan SMA Negeri 1 Kota Kediri">
    <div class="smast-container">
        <div class="smast-section-header smast-reveal">
            <span class="smast-section-eyebrow"><i class="fas fa-building" aria-hidden="true"></i> Sarana &amp; Prasarana</span>
            <h2 class="smast-section-title">Fasilitas Sekolah <span>Standar Nasional</span></h2>
            <p class="smast-section-desc">Lingkungan belajar asri seluas 24.814 m² didukung ruang KBM modern ber-AC, laboratorium sains terpadu, dan sarana olahraga terlengkap di Kota Kediri.</p>
        </div>

        <div class="smast-fasilitas-preview-grid">
            <div class="smast-fasilitas-preview-card smast-reveal">
                <div class="smast-fasilitas-preview-icon"><i class="fas fa-snowflake" aria-hidden="true"></i></div>
                <h3 class="smast-fasilitas-preview-title">Ruang KBM Ber-AC &amp; LCD</h3>
                <p class="smast-fasilitas-preview-desc">Seluruh ruang kelas dilengkapi pendingin ruangan (AC) dan proyektor multimedia LCD interaktif untuk kenyamanan belajar optimal.</p>
            </div>
            <div class="smast-fasilitas-preview-card smast-reveal smast-reveal-delay-1">
                <div class="smast-fasilitas-preview-icon"><i class="fas fa-microscope" aria-hidden="true"></i></div>
                <h3 class="smast-fasilitas-preview-title">5 Laboratorium Lengkap</h3>
                <p class="smast-fasilitas-preview-desc">Laboratorium Komputer berkecepatan tinggi, Lab Kimia, Fisika, Biologi, dan Lab Bahasa dengan peralatan riset terstandarisasi.</p>
            </div>
            <div class="smast-fasilitas-preview-card smast-reveal smast-reveal-delay-2">
                <div class="smast-fasilitas-preview-icon"><i class="fas fa-basketball" aria-hidden="true"></i></div>
                <h3 class="smast-fasilitas-preview-title">7 Sarana Olahraga</h3>
                <p class="smast-fasilitas-preview-desc">Lapangan basket standar kompetisi DBL, lapangan sepakbola, futsal, bulutangkis, bola volly, lapangan tenis, dan tenis meja.</p>
            </div>
            <div class="smast-fasilitas-preview-card smast-reveal smast-reveal-delay-3">
                <div class="smast-fasilitas-preview-icon"><i class="fas fa-book-reader" aria-hidden="true"></i></div>
                <h3 class="smast-fasilitas-preview-title">Perpustakaan &amp; E-Library</h3>
                <p class="smast-fasilitas-preview-desc">Koleksi ribuan buku referensi, karya ilmiah, serta akses repositori literasi digital terintegrasi SISMAST.</p>
            </div>
        </div>

        <!-- Call-to-Action to Full Fasilitas Directory -->
        <div class="smast-ekskul-cta-wrap smast-reveal">
            <p class="smast-ekskul-cta-note">
                <i class="fas fa-landmark" aria-hidden="true"></i> Bangunan bersejarah dengan fasilitas modern di Jalan Veteran No. 1 Kota Kediri.
            </p>
            <a href="<?php echo esc_url( home_url( '/fasilitas' ) ); ?>" class="smast-btn smast-btn-gold smast-btn-lg">
                <i class="fas fa-building-columns" aria-hidden="true"></i> <span>Jelajahi Seluruh Fasilitas Sekolah</span> <i class="fas fa-arrow-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════════════════════
     SECTION: PORTAL APLIKASI DIGITAL SEKOLAH (Presisi & Sejajar)
     ══════════════════════════════════════════════════════════════════════════ -->
<section class="smast-section" id="layanan-digital" aria-label="Portal Aplikasi Digital SMA Negeri 1 Kota Kediri">
    <div class="smast-container">
        <div class="smast-section-header smast-reveal">
            <span class="smast-section-eyebrow"><i class="fas fa-laptop-code" aria-hidden="true"></i> Layanan Online</span>
            <h2 class="smast-section-title">Portal Layanan &amp; <span>Aplikasi Sekolah</span></h2>
            <p class="smast-section-desc">Akses cepat sistem informasi akademik dan perpustakaan daring resmi SMA Negeri 1 Kota Kediri.</p>
        </div>

        <div class="smast-portal-grid">
            <!-- Portal 1: SISMAST -->
            <div class="smast-portal-card smast-reveal">
                <div class="smast-portal-body">
                    <span class="smast-portal-badge badge-sis"><i class="fas fa-id-card"></i> Akademik &amp; Nilai</span>
                    <h3 class="smast-portal-title">SISMAST Kediri</h3>
                    <p class="smast-portal-desc">Sistem Informasi Manajemen Sekolah untuk presensi digital terpadu, rekap nilai raport, jadwal KBM, dan data administrasi siswa serta guru.</p>
                </div>
                <div class="smast-portal-footer">
                    <a href="https://si.smastkediri.sch.id/index.php" target="_blank" rel="noopener noreferrer" class="smast-portal-btn" aria-label="Akses Portal SISMAST">
                        <span>Akses SISMAST</span> <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <!-- Portal 2: Perpustakaan E-Library (Presisi & Rapi) -->
            <div class="smast-portal-card smast-reveal smast-reveal-delay-1">
                <div class="smast-portal-body">
                    <span class="smast-portal-badge badge-lib"><i class="fas fa-book-reader"></i> Literasi Digital</span>
                    <h3 class="smast-portal-title">E-Library SMAST</h3>
                    <p class="smast-portal-desc">Perpustakaan digital terintegrasi untuk pencarian e-book pelajaran, katalog pustaka daring, literasi membaca, dan repositori karya ilmiah.</p>
                </div>
                <div class="smast-portal-footer">
                    <a href="https://elibrary.smastkediri.sch.id/" target="_blank" rel="noopener noreferrer" class="smast-portal-btn" aria-label="Akses Portal E-Library">
                        <span>Akses E-Library</span> <i class="fas fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════════════════════
     SECTION 7: EKSTRAKURIKULER UNGGULAN (Customizer & CPT Ekskul)
     ══════════════════════════════════════════════════════════════════════════ -->
<?php
$ekskul_count = absint( get_theme_mod( 'smast_ekskul_count', 8 ) );
if ( $ekskul_count < 1 ) {
    $ekskul_count = 8;
}

$ekskul_sec_title = get_theme_mod( 'smast_ekskul_title', 'Ekstrakurikuler Pilihan' );
$ekskul_sec_desc  = get_theme_mod( 'smast_ekskul_desc', 'Kembangkan potensi non-akademik, kepemimpinan, dan bakat kreatif bersama berbagai klub dan organisasi kesiswaan aktif di SMA Negeri 1 Kota Kediri.' );

$cpt_ekskul_query = new WP_Query( array(
    'post_type'      => 'ekskul',
    'posts_per_page' => $ekskul_count,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order date',
    'order'          => 'ASC',
) );

$has_cpt_ekskul = $cpt_ekskul_query->have_posts();
?>
<section class="smast-section bg-light" id="ekskul" aria-label="Ekstrakurikuler SMA Negeri 1 Kota Kediri">
    <div class="smast-container">
        <div class="smast-section-header smast-reveal">
            <span class="smast-section-eyebrow"><i class="fas fa-users" aria-hidden="true"></i> Kesiswaan</span>
            <h2 class="smast-section-title"><?php echo esc_html( $ekskul_sec_title ); ?></h2>
            <p class="smast-section-desc"><?php echo esc_html( $ekskul_sec_desc ); ?></p>
        </div>

        <div class="smast-ekskul-grid">
            <?php
            if ( $has_cpt_ekskul ) :
                while ( $cpt_ekskul_query->have_posts() ) : $cpt_ekskul_query->the_post();
                    $cat_label = get_post_meta( get_the_ID(), '_ekskul_category_label', true ) ?: 'Kesiswaan';
                    $icon_val  = get_post_meta( get_the_ID(), '_ekskul_icon', true ) ?: 'fa-star';
            ?>
                <div class="smast-ekskul-card smast-reveal">
                    <div class="smast-ekskul-icon">
                        <i class="fas <?php echo esc_attr( $icon_val ); ?>" aria-hidden="true"></i>
                    </div>
                    <div class="smast-ekskul-info">
                        <h4 class="smast-ekskul-name"><?php the_title(); ?></h4>
                        <span class="smast-ekskul-category"><?php echo esc_html( $cat_label ); ?></span>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Fallback: 8 Featured Extracurriculars for clean uncluttered layout
                $featured_ekskul = array(
                    array( 'OSIS / MPK', 'Kepemimpinan & Organisasi', 'fa-crown' ),
                    array( 'Pramuka Gudep', 'Kepanduan & Karakter', 'fa-campground' ),
                    array( 'PMR Wira', 'Kemanusiaan & Medis', 'fa-heart-pulse' ),
                    array( 'Paskibra (Passmast)', 'Disiplin & Baris Berbaris', 'fa-flag' ),
                    array( 'KIR (Karya Ilmiah)', 'Penelitian & Riset Sains', 'fa-microscope' ),
                    array( 'Robotik & Coding', 'Teknologi & Otomasi', 'fa-robot' ),
                    array( 'English Club', 'Debat & Public Speaking', 'fa-comments' ),
                    array( 'Basket Putra/Putri', 'Olahraga Prestasi DBL', 'fa-basketball' ),
                );

                foreach ( $featured_ekskul as $ek ) :
            ?>
                <div class="smast-ekskul-card smast-reveal">
                    <div class="smast-ekskul-icon">
                        <i class="fas <?php echo esc_attr( $ek[2] ); ?>" aria-hidden="true"></i>
                    </div>
                    <div class="smast-ekskul-info">
                        <h4 class="smast-ekskul-name"><?php echo esc_html( $ek[0] ); ?></h4>
                        <span class="smast-ekskul-category"><?php echo esc_html( $ek[1] ); ?></span>
                    </div>
                </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>

        <!-- Call-to-Action to Full 24+ Ekskul Directory -->
        <div class="smast-ekskul-cta-wrap smast-reveal">
            <p class="smast-ekskul-cta-note">
                <i class="fas fa-info-circle" aria-hidden="true"></i> Menampilkan <?php echo $has_cpt_ekskul ? esc_html( $cpt_ekskul_query->post_count ) : '8'; ?> ekstrakurikuler unggulan di beranda.
            </p>
            <a href="<?php echo esc_url( home_url( '/ekskul' ) ); ?>" class="smast-btn smast-btn-gold smast-btn-lg">
                <i class="fas fa-th-large" aria-hidden="true"></i> <span>Jelajahi 24+ Ekstrakurikuler Lengkap</span> <i class="fas fa-arrow-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</section>


<!-- ══════════════════════════════════════════════════════════════════════════
     SECTION 8: GALERI FOTO & VIDEO DOKUMENTASI SEKOLAH
     ══════════════════════════════════════════════════════════════════════════ -->
<?php
$home_galeri_query = new WP_Query( array(
    'post_type'      => 'galeri',
    'posts_per_page' => 6,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
) );

$has_custom_galeri = $home_galeri_query->have_posts();

if ( $has_custom_galeri ) :
?>
<section class="smast-section" id="galeri" aria-label="Galeri Foto & Video SMA Negeri 1 Kota Kediri">
    <div class="smast-container">
        <div class="smast-section-header smast-reveal">
            <span class="smast-section-eyebrow"><i class="fas fa-camera-retro" aria-hidden="true"></i> Dokumentasi &amp; Multimedia</span>
            <h2 class="smast-section-title">Galeri <span>Foto &amp; Video Sekolah</span></h2>
            <p class="smast-section-desc">Momen-momen inspiratif dalam kegiatan belajar, upacara peringatan, kejuaraan sains, pementasan seni, dan kreativitas siswa di SMA Negeri 1 Kota Kediri.</p>
        </div>

        <div class="smast-galeri-preview-grid">
            <?php
            while ( $home_galeri_query->have_posts() ) :
                $home_galeri_query->the_post();
                $post_id    = get_the_ID();
                $media_type = get_post_meta( $post_id, '_galeri_media_type', true );
                $video_url  = get_post_meta( $post_id, '_galeri_video_url', true );
                $yt_id      = function_exists( 'smast_get_yt_id' ) ? smast_get_yt_id( $video_url ) : '';
                $is_video   = ( 'video' === $media_type || ! empty( $yt_id ) );

                $thumb = function_exists( 'smast_get_galeri_image' )
                    ? smast_get_galeri_image( $post_id, 'large' )
                    : ( get_the_post_thumbnail_url( $post_id, 'large' ) ?: get_template_directory_uri() . '/assets/images/Sekolah.jpg' );

                $terms = get_the_terms( $post_id, 'kategori_galeri' );
                $badge = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0]->name : ( $is_video ? 'Video Kegiatan' : 'Dokumentasi' );

                $link_url = ( $is_video && ! empty( $video_url ) ) ? esc_url( $video_url ) : get_permalink( $post_id );
                $target   = $is_video ? 'target="_blank" rel="noopener noreferrer"' : '';
            ?>
                <a href="<?php echo $link_url; ?>" <?php echo $target; ?> class="smast-galeri-item smast-reveal <?php echo $is_video ? 'is-video-item' : ''; ?>" aria-label="<?php the_title_attribute(); ?>">
                    <img src="<?php echo esc_url( $thumb ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                    <?php if ( $is_video ) : ?>
                        <div class="galeri-play-center">
                            <span class="galeri-play-badge"><i class="fas fa-play"></i></span>
                        </div>
                    <?php endif; ?>
                    <div class="smast-galeri-overlay">
                        <span class="badge"><i class="<?php echo $is_video ? 'fab fa-youtube' : 'fas fa-camera'; ?>"></i> <?php echo esc_html( $badge ); ?></span>
                        <h4><?php the_title(); ?></h4>
                        <?php if ( $is_video ) : ?>
                            <span class="galeri-meta-sub"><i class="fab fa-youtube" style="color:#FF0000;"></i> Tonton Video di YouTube &rarr;</span>
                        <?php else : ?>
                            <span class="galeri-meta-sub">Dokumentasi SMA Negeri 1 Kota Kediri</span>
                        <?php endif; ?>
                    </div>
                </a>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>

        <!-- Call-to-Action to Full Galeri Directory -->
        <div class="smast-ekskul-cta-wrap smast-reveal" style="text-align: center; margin-top: 36px;">
            <p class="smast-ekskul-cta-note" style="color: var(--smast-text-muted); font-size: 0.95rem; margin-bottom: 16px;">
                <i class="fas fa-camera" aria-hidden="true"></i> Telusuri seluruh dokumentasi kegiatan, video liputan, dan album foto resmi sekolah.
            </p>
            <a href="<?php echo esc_url( home_url( '/galeri' ) ); ?>" class="smast-btn smast-btn-outline-navy smast-btn-lg">
                <i class="fas fa-images" aria-hidden="true"></i> <span>Jelajahi Galeri Foto &amp; Video</span> <i class="fas fa-arrow-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
get_footer();
