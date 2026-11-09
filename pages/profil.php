<?php
/**
 * Template Name: SMAST - Profil Sekolah
 * Description: Halaman Profil Sekolah SMA Negeri 1 Kediri
 *
 * @package SMAST
 * @version 2.0.0
 */

get_header();

$principal_name  = get_theme_mod( 'smast_principal_name', 'ARIF SYAH PUTRA, M.Pd.' );
$principal_photo = get_theme_mod( 'smast_principal_photo', '' );
if ( empty( $principal_photo ) ) {
    $principal_photo = get_template_directory_uri() . '/assets/images/Kepala Sekolah.png';
}
?>

<!-- Page Hero -->
<section class="smast-page-hero">
    <div class="smast-container">
        <div class="smast-breadcrumb">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Beranda</a>
            <span><i class="fas fa-chevron-right" style="font-size:0.65rem;"></i></span>
            <span class="current">Profil Sekolah</span>
        </div>
        <h1>Profil Sekolah</h1>
        <p>Mengenal lebih dalam identitas, visi misi, data pokok, dan struktur organisasi SMA Negeri 1 Kediri.</p>
    </div>
</section>

<!-- Sambutan Kepala Sekolah -->
<section class="smast-sambutan smast-section" id="sambutan">
    <div class="smast-container">
        <div class="smast-sambutan-grid">
            <div class="smast-principal-photo-wrap smast-reveal-left">
                <?php if ( ! empty( $principal_photo ) ) : ?>
                    <img src="<?php echo esc_url( $principal_photo ); ?>" alt="<?php echo esc_attr( $principal_name ); ?>" class="smast-sambutan-img" style="width: 100%; border-radius: var(--smast-radius); box-shadow: var(--smast-shadow-md);">
                <?php else : ?>
                    <div class="smast-principal-photo-placeholder">
                        <i class="fas fa-user-tie"></i>
                        <span>Foto Kepala Sekolah</span>
                    </div>
                <?php endif; ?>
            </div>
            <div class="smast-sambutan-content smast-reveal-right">
                <span class="section-badge"><i class="fas fa-quote-left"></i> Sambutan Kepala Sekolah</span>
                <h2>Pesan dari Kepala Sekolah</h2>
                <span class="smast-quote-mark" aria-hidden="true">&ldquo;</span>
                <p class="sambutan-text"><em>Bismillahirrahmanirrahim. Assalamu'alaikum Warahmatullahi Wabarakatuh.</em></p>
                <p class="sambutan-text">SMA Negeri 1 Kediri hadir sebagai lembaga pendidikan yang berkomitmen mencetak generasi penerus bangsa yang tidak hanya cerdas secara intelektual, namun juga berakhlak mulia dan berkarakter kuat. Kami senantiasa berupaya menghadirkan lingkungan belajar yang kondusif, inovatif, dan menyenangkan.</p>
                <p class="sambutan-text">Dengan dukungan tenaga pendidik berpengalaman, sarana prasarana modern, dan kurikulum yang adaptif, kami siap mendampingi setiap peserta didik meraih potensi terbaiknya guna menyongsong masa depan yang gemilang.</p>
                <p class="sambutan-text"><em>Wassalamu'alaikum Warahmatullahi Wabarakatuh.</em></p>
                <div class="smast-principal-info">
                    <div class="pi-avatar"><i class="fas fa-user-tie"></i></div>
                    <div>
                        <strong><?php echo esc_html( $principal_name ); ?></strong>
                        <span>Kepala SMA Negeri 1 Kediri</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Visi & Misi (MUSTIKA) -->
<section class="smast-profil-section" id="visi-misi">
    <div class="smast-container">
        <div class="smast-section-header smast-reveal">
            <span class="smast-section-eyebrow"><i class="fas fa-compass"></i> Landasan Nilai</span>
            <h2 class="smast-section-title">Visi, Indikator &amp; <span>Misi Sekolah</span></h2>
            <p class="smast-section-desc">Arah dan pedoman seluruh civitas akademika SMA Negeri 1 Kota Kediri dalam mencapai keunggulan.</p>
        </div>

        <!-- 1. Visi Utama MUSTIKA -->
        <div class="smast-vm-card smast-vm-visi smast-reveal">
            <div class="smast-vm-visi-badge">
                <i class="fas fa-compass"></i> VISI RESMI SMAN 1 KOTA KEDIRI
            </div>
            <h3 class="smast-vm-visi-heading">
                &ldquo;Mencetak Manusia Unggul Spiritual, Tinggi Intelektual, Kreatif berwawasan lingkungan dan Amanah <span class="mustika-gold">(MUSTIKA)</span>.&rdquo;
            </h3>
            <p class="smast-vm-visi-sub">Pedoman fundamental pembentukan akhlak mulia, kecerdasan intelektual, kepedulian lingkungan, dan integritas amanah.</p>
        </div>

        <div class="smast-vm-grid">
            <!-- 2. Indikator Visi -->
            <div class="smast-vm-card smast-vm-indikator smast-reveal-left">
                <h3 class="smast-vm-title">
                    <i class="fas fa-arrow-right" style="color: var(--smast-navy);"></i> Indikator Visi Sekolah
                </h3>
                <ul class="smast-vm-list">
                    <li>
                        <i class="fas fa-arrow-right" style="color: var(--smast-navy);"></i>
                        <span>Menunjukkan perilaku taat beribadah sesuai dengan agama yang dianutnya.</span>
                    </li>
                    <li>
                        <i class="fas fa-arrow-right" style="color: var(--smast-navy);"></i>
                        <span>Meraih prestasi dalam bidang akademik.</span>
                    </li>
                    <li>
                        <i class="fas fa-arrow-right" style="color: var(--smast-navy);"></i>
                        <span>Memiliki banyak gagasan.</span>
                    </li>
                    <li>
                        <i class="fas fa-arrow-right" style="color: var(--smast-navy);"></i>
                        <span>Memiliki kepedulian terhadap sesama.</span>
                    </li>
                    <li>
                        <i class="fas fa-arrow-right" style="color: var(--smast-navy);"></i>
                        <span>Memiliki kepedulian terhadap kebersihan dan keindahan lingkungan.</span>
                    </li>
                    <li>
                        <i class="fas fa-arrow-right" style="color: var(--smast-navy);"></i>
                        <span>Menghasilkan karya inovatif yang berwawasan lingkungan.</span>
                    </li>
                    <li>
                        <i class="fas fa-arrow-right" style="color: var(--smast-navy);"></i>
                        <span>Menampilkan perilaku jujur dalam perkataan dan perbuatan.</span>
                    </li>
                    <li>
                        <i class="fas fa-arrow-right" style="color: var(--smast-navy);"></i>
                        <span>Memiliki sikap tanggung jawab.</span>
                    </li>
                </ul>
            </div>

            <!-- 3. Misi Sekolah -->
            <div class="smast-vm-card smast-vm-misi smast-reveal-right">
                <h3 class="smast-vm-title">
                    <i class="fas fa-arrow-right" style="color: var(--smast-gold);"></i> Misi Sekolah
                </h3>
                <ul class="smast-vm-list">
                    <li>
                        <i class="fas fa-arrow-right" style="color: var(--smast-gold);"></i>
                        <span>Menyelenggarakan kegiatan ibadah sehari - hari di sekolah.</span>
                    </li>
                    <li>
                        <i class="fas fa-arrow-right" style="color: var(--smast-gold);"></i>
                        <span>Menyelenggrakan pembelajaran sesuai dengan bakat, minat dan kecepatan belajar peserta didik.</span>
                    </li>
                    <li>
                        <i class="fas fa-arrow-right" style="color: var(--smast-gold);"></i>
                        <span>Melibatkan siswa dalam mengambil keputusan kegiatan sekolah.</span>
                    </li>
                    <li>
                        <i class="fas fa-arrow-right" style="color: var(--smast-gold);"></i>
                        <span>Menyelenggarakan kegiatan amal sosial.</span>
                    </li>
                    <li>
                        <i class="fas fa-arrow-right" style="color: var(--smast-gold);"></i>
                        <span>Memberi tanggung jawab menjaga kebersihan dan keindahan lingkungan.</span>
                    </li>
                    <li>
                        <i class="fas fa-arrow-right" style="color: var(--smast-gold);"></i>
                        <span>Melaksanakan pembelajaran hasta karya.</span>
                    </li>
                    <li>
                        <i class="fas fa-arrow-right" style="color: var(--smast-gold);"></i>
                        <span>Memberikan keteladanan perilaku jujur dalam perkataan dan perbuatan.</span>
                    </li>
                    <li>
                        <i class="fas fa-arrow-right" style="color: var(--smast-gold);"></i>
                        <span>Menyelenggarakan berbagai kegiatan organisasi di sekolah.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Sejarah Singkat Ringkasan -->
<section class="smast-profil-section bg-white" id="sejarah">
    <div class="smast-container">
        <div class="smast-section-header smast-reveal">
            <span class="smast-section-eyebrow"><i class="fas fa-landmark"></i> Rekam Jejak</span>
            <h2 class="smast-section-title">Sejarah <span>Singkat Sekolah</span></h2>
        </div>
        <div class="smast-profil-sejarah-card smast-reveal">
            <p style="color:var(--smast-text); line-height:1.85; margin-bottom:16px;">
                SMA Negeri 1 Kediri berdiri pada tahun <strong style="color:var(--smast-navy);">1950</strong>, menjadikannya salah satu sekolah menengah atas tertua dan paling bersejarah di Kota Kediri, Jawa Timur.
            </p>
            <p style="color:var(--smast-text); line-height:1.85; margin-bottom:20px;">
                Selama lebih dari tujuh dekade, sekolah ini telah melahirkan ribuan alumni yang berkiprah di berbagai bidang &mdash; dari jajaran pemerintahan, akademisi, pengusaha, hingga atlet dan seniman berprestasi nasional.
            </p>
            <a href="<?php echo esc_url( home_url( '/sejarah' ) ); ?>" class="smast-btn smast-btn-navy" style="font-size:0.9rem;">
                <i class="fas fa-timeline"></i> <span>Lihat Garis Waktu Lengkap (1950 &ndash; Sekarang)</span>
            </a>
        </div>
    </div>
</section>

<!-- Data Pokok Sekolah -->
<section class="smast-profil-section" id="data-sekolah">
    <div class="smast-container">
        <div class="smast-section-header smast-reveal">
            <span class="smast-section-eyebrow"><i class="fas fa-table"></i> Informasi Resmi</span>
            <h2 class="smast-section-title">Data Pokok <span>Pendidikan</span></h2>
            <p class="smast-section-desc">Identitas resmi sekolah yang tercatat pada Kementerian Pendidikan Dasar dan Menengah.</p>
        </div>
        <div class="smast-dapodik-wrapper smast-reveal">
            <div class="smast-table-responsive smast-dapodik-container">
            <table class="smast-data-table smast-dapodik-table">
                <tbody>
                    <tr><th>Nama Sekolah</th><td class="dapodik-val-bold">SMA Negeri 1 Kota Kediri (SMAST)</td></tr>
                    <tr><th>NPSN</th><td class="dapodik-val-bold"><?php echo esc_html( get_theme_mod( 'smast_npsn', '20534394' ) ); ?></td></tr>
                    <tr><th>Status Sekolah</th><td><?php echo esc_html( get_theme_mod( 'smast_status_sekolah', 'Negeri' ) ); ?></td></tr>
                    <tr><th>Bentuk Pendidikan</th><td><?php echo esc_html( get_theme_mod( 'smast_bentuk_pendidikan', 'Sekolah Menengah Atas (SMA)' ) ); ?></td></tr>
                    <tr><th>Status Kepemilikan</th><td><?php echo esc_html( get_theme_mod( 'smast_status_kepemilikan', 'Pemerintah Provinsi Jawa Timur' ) ); ?></td></tr>
                    <tr><th>SK Pendirian Sekolah</th><td><?php echo esc_html( get_theme_mod( 'smast_sk_pendirian', '1946 (17 September 1946)' ) ); ?></td></tr>
                    <tr><th>Status Akreditasi</th><td><span class="smast-badge-akreditasi"><i class="fas fa-star"></i> <?php echo esc_html( get_theme_mod( 'smast_akreditasi', 'A (Unggul) — Nilai 96' ) ); ?></span></td></tr>
                    <tr><th>Kurikulum</th><td><?php echo esc_html( get_theme_mod( 'smast_kurikulum', 'Kurikulum Merdeka' ) ); ?></td></tr>
                    <tr><th>Kepala Sekolah</th><td class="dapodik-val-bold"><?php echo esc_html( $principal_name ); ?></td></tr>
                    <tr><th>Luas Lahan / Tanah</th><td><?php echo esc_html( get_theme_mod( 'smast_luas_tanah', '24.814 m²' ) ); ?></td></tr>
                    <tr><th>Rombel &amp; Daya Tampung</th><td><?php echo esc_html( get_theme_mod( 'smast_daya_tampung', '34 Rombongan Belajar (± 1.150 Siswa)' ) ); ?></td></tr>
                    <tr><th>Alamat Sekolah</th><td><?php echo esc_html( get_theme_mod( 'smast_address', 'Jalan Veteran No. 1, Kelurahan Bandar Lor, Kecamatan Mojoroto, Kota Kediri, Jawa Timur 64114' ) ); ?></td></tr>
                    <tr><th>Koordinat Astronomis</th><td><?php echo esc_html( get_theme_mod( 'smast_koordinat', 'S 7° 48\' 40.73"  E 112° 0\' 10.33"' ) ); ?></td></tr>
                    <tr><th>Telepon / HP</th><td><a href="tel:<?php echo esc_attr( str_replace( array(' ', '-', '(', ')'), '', get_theme_mod( 'smast_phone', '+62 354 771829' ) ) ); ?>" class="dapodik-link"><?php echo esc_html( get_theme_mod( 'smast_phone', '+62 354 771829' ) ); ?></a></td></tr>
                    <tr><th>Surel Resmi</th><td><a href="mailto:<?php echo esc_attr( get_theme_mod( 'smast_email', 'redaksi@smastkediri.sch.id' ) ); ?>" class="dapodik-link"><?php echo esc_html( get_theme_mod( 'smast_email', 'redaksi@smastkediri.sch.id' ) ); ?></a></td></tr>
                    <tr><th>Semboyan / Motto</th><td class="dapodik-val-gold"><?php echo esc_html( get_theme_mod( 'smast_motto', 'Smast Mulia Jaya Jaya Jaya!!!' ) ); ?></td></tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</section>

<!-- Struktur Organisasi -->
<section class="smast-profil-section bg-white" id="struktur">
    <div class="smast-container">
        <div class="smast-section-header smast-reveal">
            <span class="smast-section-eyebrow"><i class="fas fa-sitemap"></i> Tata Kelola</span>
            <h2 class="smast-section-title">Struktur <span>Organisasi Sekolah</span></h2>
            <p class="smast-section-desc">Kepemimpinan dan manajemen profesional penggerak kemajuan SMAN 1 Kediri.</p>
        </div>
        <div class="smast-orgchart smast-reveal">
            <div class="smast-orgchart-level">
                <div class="smast-orgchart-node top">
                    <strong><?php echo esc_html( $principal_name ); ?></strong>
                    <span>Kepala Sekolah</span>
                </div>
            </div>
            <div class="smast-orgchart-line"></div>
            <div class="smast-orgchart-level" style="gap:16px; flex-wrap:wrap; justify-content:center;">
                <div class="smast-orgchart-node"><strong>Wakasek Kurikulum</strong><span>Bidang Pembelajaran &amp; Ujian</span></div>
                <div class="smast-orgchart-node"><strong>Wakasek Kesiswaan</strong><span>Bidang Siswa &amp; Ekskul</span></div>
                <div class="smast-orgchart-node"><strong>Wakasek Sarana Prasarana</strong><span>Bidang Fasilitas &amp; IT</span></div>
                <div class="smast-orgchart-node"><strong>Wakasek Hubungan Masyarakat</strong><span>Bidang Kerjasama &amp; Komunikasi</span></div>
            </div>
            <div class="smast-orgchart-line"></div>
            <div class="smast-orgchart-level" style="gap:14px; flex-wrap:wrap; justify-content:center;">
                <div class="smast-orgchart-node" style="min-width:140px;"><strong>Kepala Tata Usaha</strong><span>Administrasi Sekolah</span></div>
                <div class="smast-orgchart-node" style="min-width:140px;"><strong>Koordinator Guru BK</strong><span>Bimbingan Konseling</span></div>
                <div class="smast-orgchart-node" style="min-width:140px;"><strong>Wali Kelas</strong><span>Wali Kelas X, XI, XII</span></div>
                <div class="smast-orgchart-node" style="min-width:140px;"><strong>Guru Mata Pelajaran</strong><span>Tenaga Pendidik</span></div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
