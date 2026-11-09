<?php
/**
 * Template Name: Fasilitas Sekolah — SMAN 1 Kediri
 *
 * @package SMAST
 * @version 2.2.0
 */

get_header();

// Data Resmi Fasilitas SMAN 1 Kediri
$fasilitas_kbm = array(
    array(
        'nama'  => 'Ruang KBM dilengkapi AC dan LCD Proyektor',
        'kategori' => 'kbm',
        'ikon'  => 'fa-chalkboard-user',
        'badge' => 'Penunjang KBM',
        'desc'  => 'Seluruh ruang kelas dilengkapi pendingin ruangan (AC), proyektor LCD multimedia interaktif, audio sound, dan koneksi internet serat optik untuk kenyamanan kegiatan belajar mengajar.',
    ),
    array(
        'nama'  => 'Laboratorium Komputer',
        'kategori' => 'kbm',
        'ikon'  => 'fa-laptop-code',
        'badge' => 'Penunjang KBM',
        'desc'  => 'Dilengkapi puluhan unit PC modern berkecepatan tinggi, sistem jaringan LAN terpusat, dan pendingin ruangan untuk ujian berbasis CBT serta pembelajaran coding dan literasi digital.',
    ),
    array(
        'nama'  => 'Laboratorium Kimia',
        'kategori' => 'kbm',
        'ikon'  => 'fa-vial',
        'badge' => 'Penunjang KBM',
        'desc'  => 'Menyediakan meja praktikum tahan zat kimia, lemari asam standar keselamatan, reagen analitik lengkap, dan alat pelindung diri untuk eksperimen kimia praktis.',
    ),
    array(
        'nama'  => 'Laboratorium Fisika',
        'kategori' => 'kbm',
        'ikon'  => 'fa-atom',
        'badge' => 'Penunjang KBM',
        'desc'  => 'Fasilitas eksperimen mekanika, optika, magnetik, termodinamika, dan elektronika dengan instrumen pengukur presisi tinggi untuk riset olimpiade sains.',
    ),
    array(
        'nama'  => 'Laboratorium Biologi',
        'kategori' => 'kbm',
        'ikon'  => 'fa-microscope',
        'badge' => 'Penunjang KBM',
        'desc'  => 'Dilengkapi mikroskop binokuler elektrik, preparat awetan flora-fauna, model torso anatomi, dan media pembelajaran bioteknologi hayati.',
    ),
    array(
        'nama'  => 'Laboratorium Bahasa',
        'kategori' => 'kbm',
        'ikon'  => 'fa-headphones',
        'badge' => 'Penunjang KBM',
        'desc'  => 'Bilik audio multimedia interaktif dengan headset peredam bising untuk melatih kemahiran listening, speaking, dan TOEFL/IELTS Bahasa Inggris dan Bahasa Jepang.',
    ),
);

$fasilitas_olahraga = array(
    array(
        'nama'  => 'Lapangan Sepakbola',
        'kategori' => 'olahraga',
        'ikon'  => 'fa-futbol',
        'badge' => 'Sarana Olahraga',
        'desc'  => 'Lapangan rumput alami berstandar turnamen untuk latihan tim sepakbola sekolah, kegiatan upacara bendera hari besar nasional, dan peringatan akbar sekolah.',
    ),
    array(
        'nama'  => 'Lapangan Futsal',
        'kategori' => 'olahraga',
        'ikon'  => 'fa-shoe-prints',
        'badge' => 'Sarana Olahraga',
        'desc'  => 'Sarana lapangan futsal dengan garis lapangan resmi dan permukaan lantai terawat untuk pertandingan antarkelas (classmeeting) dan pembinaan tim futsal putra-putri.',
    ),
    array(
        'nama'  => 'Lapangan Basket',
        'kategori' => 'olahraga',
        'ikon'  => 'fa-basketball',
        'badge' => 'Sarana Olahraga',
        'desc'  => 'Lapangan basket berstandar kompetisi DBL Jawa Timur, dilengkapi ring papan pantul standar dan tribun penonton untuk memfasilitasi tim basket kebanggaan SMAST.',
    ),
    array(
        'nama'  => 'Lapangan Bola Volly',
        'kategori' => 'olahraga',
        'ikon'  => 'fa-volleyball',
        'badge' => 'Sarana Olahraga',
        'desc'  => 'Lapangan voli dengan tiang net resmi dan area servis memadai untuk pembinaan atlet voli serta pembelajaran pendidikan jasmani.',
    ),
    array(
        'nama'  => 'Lapangan Bulutangkis',
        'kategori' => 'olahraga',
        'ikon'  => 'fa-table-tennis-paddle-ball',
        'badge' => 'Sarana Olahraga',
        'desc'  => 'Arena bulutangkis terlindung angin yang mendukung latihan reli, smash cepat, dan pembinaan bibit atlet bulutangkis daerah.',
    ),
    array(
        'nama'  => 'Lapangan Tennis',
        'kategori' => 'olahraga',
        'ikon'  => 'fa-baseball',
        'badge' => 'Sarana Olahraga',
        'desc'  => 'Lapangan tenis lapangan hard-court berkualitas untuk melatih ketangkasan servis, ketahanan fisik, dan teknik pukulan siswa pecinta tenis.',
    ),
    array(
        'nama'  => 'Lapangan Tenis Meja',
        'kategori' => 'olahraga',
        'ikon'  => 'fa-circle-dot',
        'badge' => 'Sarana Olahraga',
        'desc'  => 'Area tenis meja indoor dengan meja resmi standar ITTF dan pencahayaan terang untuk mengasah refleks cepat dan strategi pertandingan.',
    ),
);
?>

<!-- Page Hero -->
<section class="smast-page-hero">
    <div class="smast-container">
        <div class="smast-page-hero-content">
            <div class="smast-breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Beranda</a>
                <i class="fas fa-chevron-right"></i>
                <span>Fasilitas Sekolah</span>
            </div>
            <h1>Fasilitas &amp; <span>Sarana Prasarana SMAN 1 Kediri</span></h1>
            <p>Dukungan infrastruktur lengkap di atas lahan 24.814 m&sup2; yang mencakup sarana penunjang kegiatan belajar mengajar (KBM) ber-AC dan 7 sarana olahraga prestasi.</p>
        </div>
    </div>
</section>

<!-- Filter Tabs & Grid Fasilitas -->
<section class="smast-section" style="padding-top: 60px;">
    <div class="smast-container">

        <!-- 1. SEKSI SARANA PENUNJANG KBM -->
        <div class="smast-section-header smast-reveal" style="text-align: left; margin-bottom: 28px;">
            <span class="smast-section-eyebrow"><i class="fas fa-chalkboard-user"></i> Akademik &amp; Eksperimen</span>
            <h2 class="smast-section-title">Sarana Penunjang <span>KBM</span></h2>
            <p class="smast-section-desc">Ruang kelas ber-AC dengan proyektor multimedia serta 5 laboratorium sains dan bahasa modern.</p>
        </div>

        <div class="fasilitas-grid" style="margin-bottom: 60px;">
            <?php foreach ( $fasilitas_kbm as $f ) : ?>
                <div class="fasilitas-card smast-reveal">
                    <div class="fasilitas-icon">
                        <i class="fas <?php echo esc_attr( $f['ikon'] ); ?>" aria-hidden="true"></i>
                    </div>
                    <span class="fasilitas-badge">
                        <?php echo esc_html( $f['badge'] ); ?>
                    </span>
                    <h3 class="fasilitas-title"><?php echo esc_html( $f['nama'] ); ?></h3>
                    <p class="fasilitas-desc"><?php echo esc_html( $f['desc'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- 2. SEKSI SARANA OLAHRAGA -->
        <div class="smast-section-header smast-reveal" style="text-align: left; margin-bottom: 28px;">
            <span class="smast-section-eyebrow"><i class="fas fa-medal"></i> Prestasi &amp; Kebugaran</span>
            <h2 class="smast-section-title">Sarana <span>Olahraga</span></h2>
            <p class="smast-section-desc">7 fasilitas cabang olahraga representatif untuk menunjang kebugaran jasmani dan pembinaan atlet juara.</p>
        </div>

        <div class="fasilitas-grid">
            <?php foreach ( $fasilitas_olahraga as $f ) : ?>
                <div class="fasilitas-card smast-reveal">
                    <div class="fasilitas-icon">
                        <i class="fas <?php echo esc_attr( $f['ikon'] ); ?>" aria-hidden="true"></i>
                    </div>
                    <span class="fasilitas-badge">
                        <?php echo esc_html( $f['badge'] ); ?>
                    </span>
                    <h3 class="fasilitas-title"><?php echo esc_html( $f['nama'] ); ?></h3>
                    <p class="fasilitas-desc"><?php echo esc_html( $f['desc'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- CTA Hubungi Kami -->
<section class="smast-section" style="padding-top: 0; padding-bottom: 80px;">
    <div class="smast-container">
        <div style="background: linear-gradient(135deg, var(--smast-navy) 0%, #001f3f 100%); color: #fff; border-radius: var(--smast-radius-lg); padding: 44px 32px; text-align: center; box-shadow: var(--smast-shadow-md); border-top: 4px solid var(--smast-gold);">
            <h3 style="font-size: 1.6rem; font-weight: 800; color: #fff; margin-bottom: 12px;">Kunjungi SMA Negeri 1 Kota Kediri</h3>
            <p style="max-width: 650px; margin: 0 auto 28px; font-size: 0.95rem; opacity: 0.9;">Untuk informasi kunjungan edukatif, studi tiru, atau tur fasilitas sekolah, silakan menghubungi sekretariat sekolah.</p>
            <div style="display:flex; gap:14px; justify-content:center; flex-wrap:wrap;">
                <a href="<?php echo esc_url( home_url( '/kontak' ) ); ?>" class="smast-btn smast-btn-gold smast-btn-lg">
                    <i class="fas fa-map-marker-alt"></i> Lokasi &amp; Kontak Kami
                </a>
                <a href="<?php echo esc_url( home_url( '/ekskul' ) ); ?>" class="smast-btn smast-btn-outline smast-btn-lg">
                    <i class="fas fa-users"></i> Lihat Ekstrakurikuler
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();

