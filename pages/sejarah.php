<?php
/**
 * Template Name: Sejarah Sekolah — SMAN 1 Kediri
 *
 * @package SMAST
 * @version 2.2.0
 */

get_header();
?>

<!-- Page Hero -->
<section class="smast-page-hero">
    <div class="smast-container">
        <div class="smast-page-hero-content">
            <div class="smast-breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Beranda</a>
                <i class="fas fa-chevron-right"></i>
                <a href="<?php echo esc_url( home_url( '/profil' ) ); ?>">Profil</a>
                <i class="fas fa-chevron-right"></i>
                <span>Sejarah Sekolah</span>
            </div>
            <h1>Sejarah <span>SMA Negeri 1 Kota Kediri</span></h1>
            <p>Jejak langkah perjalanan sejarah SMAN 1 Kediri sejak era gedung MULO 1924, markas perjuangan kemerdekaan, hingga SK Residen Kediri Bapak Samadikun tahun 1950.</p>
        </div>
    </div>
</section>

<!-- Narasi Sejarah Utama -->
<section class="smast-section" style="padding-top: 60px;">
    <div class="smast-container" style="max-width: 920px;">

        <!-- Latar Belakang Sejarah -->
        <div class="sejarah-intro smast-reveal" style="background: linear-gradient(135deg, var(--smast-navy) 0%, #001f3f 100%); color: #fff; border-radius: var(--smast-radius-lg); padding: 40px; margin-bottom: 50px; position: relative; overflow: hidden; box-shadow: var(--smast-shadow-md); border-left: 6px solid var(--smast-gold);">
            <div style="position: absolute; right: -30px; top: -30px; width: 180px; height: 180px; border-radius: 50%; background: rgba(255,184,0,0.12);"></div>
            <span style="display:inline-block; background:rgba(255,184,0,0.15); color:var(--smast-gold); padding:5px 14px; border-radius:50px; font-size:0.8rem; font-weight:700; text-transform:uppercase; letter-spacing:1px; margin-bottom:16px;">
                <i class="fas fa-landmark"></i> Sejarah Perjalanan Sekolah
            </span>
            <h2 style="font-size: clamp(1.4rem, 3vw, 1.85rem); margin-bottom: 16px; color: #fff; line-height: 1.3;">
                Warisan Panjang Pendidikan Bersejarah di Kota Kediri
            </h2>
            <p style="font-size: 0.98rem; line-height: 1.85; opacity: 0.94; margin-bottom: 16px;">
                SMA Negeri 1 Kediri memiliki akar sejarah yang amat kuat dan membanggakan bagi masyarakat Jawa Timur. Kompleks sekolah yang berlokasi di Jalan Veteran No. 1 telah menjadi saksi bisu berbagai fase penting perjalanan bangsa sejak era kemerdekaan hingga era modern saat ini.
            </p>
            <p style="font-size: 0.98rem; line-height: 1.85; opacity: 0.94; margin: 0;">
                Gedung utama di Jalan Veteran No. 1 telah berdiri sejak kisaran tahun <strong>1924</strong> sebagai sekolah lanjutan <em>Meer Uitgebreid Lager Onderwijs (MULO) Kediri</em>, sebelum bertransformasi menjadi markas pejuang kemerdekaan dan akhirnya ditetapkan sebagai Sekolah Menengah Atas Negeri pertama di Kediri oleh Residen Samadikun.
            </p>
        </div>

        <!-- Timeline Sejarah Berurutan -->
        <div class="smast-section-header smast-reveal" style="text-align: center; margin-bottom: 40px;">
            <span class="smast-section-eyebrow"><i class="fas fa-history"></i> Garis Waktu</span>
            <h2 class="smast-section-title">Kronik Sejarah <span>SMAN 1 Kediri</span></h2>
            <p class="smast-section-desc">Rangkaian peristiwa penting yang membentuk jati diri sekolah unggulan Kota Kediri.</p>
        </div>

        <div class="timeline">

            <!-- 1. 1924 -->
            <div class="timeline-item smast-reveal">
                <div class="timeline-badge"><i class="fas fa-landmark" style="color: var(--smast-gold);"></i></div>
                <div class="timeline-card">
                    <div class="timeline-year">Kisaran 1924</div>
                    <h3 class="timeline-title">Pendirian Gedung MULO Kediri</h3>
                    <p class="timeline-desc">
                        Kediri sebagai pusat Karesidenan dan Gemeente kolonial yang berkembang pesat dengan industri perkebunan tebu, karet, dan kopi membutuhkan sarana pendidikan lanjutan. Pemerintah kolonial mendirikan <em>Meer Uitgebreid Lager Onderwijs (MULO) Kediri</em> di kawasan Majenang (sekarang Jalan Veteran) dengan arsitektur tropis berbentuk huruf U dan cerobong ventilasi udara khas.
                    </p>
                </div>
            </div>

            <!-- 2. 1938 -->
            <div class="timeline-item smast-reveal">
                <div class="timeline-badge"><i class="fas fa-map" style="color: var(--smast-gold);"></i></div>
                <div class="timeline-card">
                    <div class="timeline-year">1938</div>
                    <h3 class="timeline-title">Tercatat dalam Peta Resmi Kota Kediri</h3>
                    <p class="timeline-desc">
                        Berdasarkan overlay peta historis Kota Kediri tahun 1938 dengan peta eksisting, bangunan sekolah berbentuk U di sisi utara Jl. Veteran ini telah kokoh berdiri dan menjadi bagian integral kawasan hunian berfasilitas modern masa itu.
                    </p>
                </div>
            </div>

            <!-- 3. 1942 - 1945 -->
            <div class="timeline-item smast-reveal">
                <div class="timeline-badge"><i class="fas fa-shield-halved" style="color: var(--smast-gold);"></i></div>
                <div class="timeline-card">
                    <div class="timeline-year">1942 &ndash; 1945</div>
                    <h3 class="timeline-title">Masa Pendudukan Jepang &amp; Aktivitas Militer</h3>
                    <p class="timeline-desc">
                        Pada masa pendudukan militer Jepang, kegiatan sekolah MULO dibubarkan. Kompleks gedung dialihfungsikan menjadi markas tentara Jepang dan pusat tahanan tawanan perang bagi orang-orang Belanda di wilayah Kediri.
                    </p>
                </div>
            </div>

            <!-- 4. 1945 - 1949 -->
            <div class="timeline-item smast-reveal">
                <div class="timeline-badge"><i class="fas fa-flag" style="color: var(--smast-gold);"></i></div>
                <div class="timeline-card">
                    <div class="timeline-year">1945 &ndash; 1949</div>
                    <h3 class="timeline-title">Pusat Pertahanan BKR, TKR, &amp; Divisi Brawijaya</h3>
                    <p class="timeline-desc">
                        Pasca Proklamasi Kemerdekaan, gedung strategis ini direbut oleh Badan Keamanan Rakyat (BKR) dan Tentara Keamanan Rakyat (TKR). Sejak tahun 1947, gedung digunakan sebagai pos komando Divisi Brawijaya mempertahankan kedaulatan RI, hingga sempat beralih fungsi saat agresi militer Belanda tahun 1948.
                    </p>
                </div>
            </div>

            <!-- 5. 1950 -->
            <div class="timeline-item smast-reveal">
                <div class="timeline-badge"><i class="fas fa-school" style="color: var(--smast-gold);"></i></div>
                <div class="timeline-card">
                    <div class="timeline-year">1950</div>
                    <h3 class="timeline-title">SK Residen Kediri Bapak Samadikun: Lahirnya SMAN 1 Kediri</h3>
                    <p class="timeline-desc">
                        Memasuki era kedaulatan penuh Republik Indonesia, melalui Surat Keputusan Residen Kediri <strong>Bapak Samadikun</strong>, gedung ini resmi dialihkan dan ditetapkan sebagai Sekolah Menengah Atas Negeri pertama di Kediri untuk mendidik putra-putri bangsa menjadi generasi penerus yang cerdas dan berkarakter.
                    </p>
                </div>
            </div>

            <!-- 6. 1987 -->
            <div class="timeline-item smast-reveal">
                <div class="timeline-badge"><i class="fas fa-users-viewfinder" style="color: var(--smast-gold);"></i></div>
                <div class="timeline-card">
                    <div class="timeline-year">1987</div>
                    <h3 class="timeline-title">Pembangunan Aula Pertemuan Swadana Alumni</h3>
                    <p class="timeline-desc">
                        Sebagai wujud kepedulian dan kontribusi nyata lulusan, perkumpulan alumni SMAN 1 Kediri menggalang swadana untuk mendirikan Gedung Aula Pertemuan serbaguna yang kini menjadi pusat kegiatan seni, upacara, dan seminar sekolah.
                    </p>
                </div>
            </div>

            <!-- 7. 2010 - 2012 -->
            <div class="timeline-item smast-reveal">
                <div class="timeline-badge"><i class="fas fa-building" style="color: var(--smast-gold);"></i></div>
                <div class="timeline-card">
                    <div class="timeline-year">2010 &ndash; 2012</div>
                    <h3 class="timeline-title">Perluasan Gedung Sekolah Modern &amp; Sarana Baru</h3>
                    <p class="timeline-desc">
                        Untuk menampung kapasitas siswa yang terus berkembang di atas lahan seluas 24.814 m², dibangun gedung baru sisi timur dan barat (2010/2011) serta gedung bagian belakang (2012) yang menyatu harmonis dengan arsitektur bangunan bersejarah bagian depan.
                    </p>
                </div>
            </div>

            <!-- 8. 2018 - Sekarang -->
            <div class="timeline-item smast-reveal">
                <div class="timeline-badge"><i class="fas fa-award" style="color: var(--smast-gold);"></i></div>
                <div class="timeline-card">
                    <div class="timeline-year">2018 &ndash; Sekarang</div>
                    <h3 class="timeline-title">Era Modern &amp; Sekolah Unggulan Berprestasi</h3>
                    <p class="timeline-desc">
                        Gedung bersejarah SMAN 1 Kediri dirawat dengan baik sebagai kebanggaan Kota Kediri. Kini SMAN 1 Kediri terus mengukir prestasi tingkat nasional dengan 24+ ekstrakurikuler, laboratorium canggih, dan komitmen melestarikan nilai-nilai luhur kepribadian bangsa.
                    </p>
                </div>
            </div>

        </div><!-- .timeline -->

        <!-- Data Teknis Arsitektur & Lingkungan Bangunan -->
        <div class="smast-card smast-reveal" style="margin-top: 60px; padding: 36px; border-radius: var(--smast-radius-lg); box-shadow: var(--smast-shadow-sm); border: 1px solid var(--smast-border);">
            <div style="display:flex; align-items:center; gap:12px; margin-bottom:20px;">
                <div style="width:48px; height:48px; border-radius:10px; background:var(--smast-navy); color:#FFB800; display:flex; align-items:center; justify-content:center; font-size:1.4rem;">
                    <i class="fas fa-compass-drafting"></i>
                </div>
                <div>
                    <h3 style="font-size:1.25rem; font-weight:800; color:var(--smast-navy); margin:0;">Identifikasi Fisik &amp; Batas Wilayah Sekolah</h3>
                    <span style="font-size:0.85rem; color:var(--smast-text-muted);">Data Administrasi &amp; Astronomis SMAN 1 Kediri</span>
                </div>
            </div>

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(260px, 1fr)); gap:20px; margin-bottom:24px;">
                <div style="background:var(--smast-off-white); padding:16px 20px; border-radius:var(--smast-radius); border-left:4px solid var(--smast-navy);">
                    <strong style="display:block; font-size:0.82rem; text-transform:uppercase; color:var(--smast-text-muted); margin-bottom:4px;">Luas Lahan Sekolah</strong>
                    <span style="font-size:1.2rem; font-weight:800; color:var(--smast-navy);">24.814 m&sup2;</span>
                </div>
                <div style="background:var(--smast-off-white); padding:16px 20px; border-radius:var(--smast-radius); border-left:4px solid var(--smast-gold);">
                    <strong style="display:block; font-size:0.82rem; text-transform:uppercase; color:var(--smast-text-muted); margin-bottom:4px;">Koordinat Astronomis</strong>
                    <span style="font-size:0.95rem; font-weight:700; color:var(--smast-navy);">S 7&ordm; 48&rsquo; 40.73&rdquo; &bull; E 112&ordm; 0&rsquo; 10.33&rdquo;</span>
                </div>
                <div style="background:var(--smast-off-white); padding:16px 20px; border-radius:var(--smast-radius); border-left:4px solid #10B981;">
                    <strong style="display:block; font-size:0.82rem; text-transform:uppercase; color:var(--smast-text-muted); margin-bottom:4px;">Alamat Administrasi</strong>
                    <span style="font-size:0.92rem; font-weight:600; color:var(--smast-navy);">Jl. Veteran No.1, Bandar Lor, Mojoroto</span>
                </div>
            </div>

            <h4 style="font-size:0.95rem; font-weight:800; color:var(--smast-navy); margin-bottom:12px; text-transform:uppercase; letter-spacing:0.5px;">Batas-Batas Kompleks Sekolah:</h4>
            <ul style="list-style:none; padding:0; margin:0; display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:12px; font-size:0.9rem;">
                <li style="padding:10px 14px; background:var(--smast-off-white); border-radius:8px;">
                    <strong>Utara:</strong> Jl. Veteran (Komplek Welirang)
                </li>
                <li style="padding:10px 14px; background:var(--smast-off-white); border-radius:8px;">
                    <strong>Barat:</strong> SMA Katolik St. Agustinus
                </li>
                <li style="padding:10px 14px; background:var(--smast-off-white); border-radius:8px;">
                    <strong>Selatan:</strong> Perumahan Barisan (Bandar Lor)
                </li>
                <li style="padding:10px 14px; background:var(--smast-off-white); border-radius:8px;">
                    <strong>Timur:</strong> Kantor Pembantu Residen
                </li>
            </ul>
        </div>

    </div>
</section>

<!-- CTA Banner -->
<section class="smast-section" style="padding-top: 0; padding-bottom: 80px;">
    <div class="smast-container" style="max-width: 920px;">
        <div style="background: linear-gradient(135deg, var(--smast-navy) 0%, #001f3f 100%); color: #fff; border-radius: var(--smast-radius-lg); padding: 44px 32px; text-align: center; box-shadow: var(--smast-shadow-md); border-top: 4px solid var(--smast-gold);">
            <h3 style="font-size: 1.6rem; font-weight: 800; color: #fff; margin-bottom: 12px;">Menjadi Bagian dari Sejarah Panjang SMA Negeri 1 Kediri</h3>
            <p style="margin-bottom: 24px; font-size: 0.95rem; opacity: 0.9; max-width: 600px; margin-left: auto; margin-right: auto;">Raih prestasi terbaikmu di sekolah bersejarah dengan fasilitas modern terlengkap di Kota Kediri.</p>
            <div style="display:flex; gap:14px; justify-content:center; flex-wrap:wrap;">
                <a href="<?php echo esc_url( home_url( '/fasilitas' ) ); ?>" class="smast-btn smast-btn-gold smast-btn-lg">
                    <i class="fas fa-building"></i> Jelajahi Fasilitas Sekolah
                </a>
                <a href="<?php echo esc_url( home_url( '/profil' ) ); ?>" class="smast-btn smast-btn-outline smast-btn-lg">
                    <i class="fas fa-school"></i> Lihat Visi &amp; Profil Sekolah
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
