<?php
/**
 * Template Name: Ekstrakurikuler — SMAN 1 Kediri
 * Description: Halaman Lengkap 24+ Cabang Ekstrakurikuler SMA Negeri 1 Kota Kediri
 *
 * @package SMAST
 * @version 2.1.0
 */

get_header();

$wa = get_theme_mod( 'smast_wa_number', '6281234567890' );

// 24 Ekskul Lengkap
$all_ekskul = array(
    // Kepemimpinan & Organisasi
    array(
        'name'     => 'OSIS (Organisasi Siswa Intra Sekolah)',
        'category' => 'Kepemimpinan & Organisasi',
        'type'     => 'kepemimpinan',
        'icon'     => 'fa-crown',
        'color'    => 'tag-navy',
        'desc'     => 'Induk organisasi kesiswaan yang mengkoordinasikan seluruh kegiatan ekstrakurikuler, pembinaan kepemimpinan, dan aspirasi siswa.',
        'jadwal'   => 'Senin & Kamis, 15.30 WIB',
    ),
    array(
        'name'     => 'MPK (Majelis Perwakilan Kelas)',
        'category' => 'Kepemimpinan & Organisasi',
        'type'     => 'kepemimpinan',
        'icon'     => 'fa-users-gear',
        'color'    => 'tag-navy',
        'desc'     => 'Lembaga legislatif kesiswaan yang mengawasi kinerja OSIS dan menjembatani aspirasi perwakilan kelas ke pihak sekolah.',
        'jadwal'   => 'Jumat, 13.30 WIB',
    ),
    array(
        'name'     => 'Pramuka Gudep SMAN 1 Kediri',
        'category' => 'Kepanduan & Karakter',
        'type'     => 'kepemimpinan',
        'icon'     => 'fa-campground',
        'color'    => 'tag-gold',
        'desc'     => 'Gerakan Pramuka Penegak yang melatih kemandirian, survival, kepanduan, kedisiplinan, dan pengabdian kepada masyarakat.',
        'jadwal'   => 'Jumat, 15.00 WIB',
    ),
    array(
        'name'     => 'Paskibra (Passmast)',
        'category' => 'Kedisiplinan & Bela Negara',
        'type'     => 'kepemimpinan',
        'icon'     => 'fa-flag',
        'color'    => 'tag-red',
        'desc'     => 'Pasukan Pengibar Bendera SMAST dengan tradisi disiplin tinggi, baris-berbaris presisi, dan pembinaan karakter generasi muda.',
        'jadwal'   => 'Selasa & Sabtu, 15.30 WIB',
    ),
    array(
        'name'     => 'PMR Wira (Palang Merah Remaja)',
        'category' => 'Kemanusiaan & Medis',
        'type'     => 'kepemimpinan',
        'icon'     => 'fa-heart-pulse',
        'color'    => 'tag-red',
        'desc'     => 'Pelatihan pertolongan pertama, donor darah, tanggap darurat bencana, dan penanaman jiwa kerelawanan.',
        'jadwal'   => 'Rabu, 15.30 WIB',
    ),

    // Sains & Teknologi
    array(
        'name'     => 'KIR (Kelompok Ilmiah Remaja)',
        'category' => 'Penelitian & Riset Sains',
        'type'     => 'sains',
        'icon'     => 'fa-microscope',
        'color'    => 'tag-blue',
        'desc'     => 'Wadah penelitian sains, penulisan karya ilmiah, dan inovasi terapan yang rutin meraih medali di ajang LKIR & OPSI Nasional.',
        'jadwal'   => 'Kamis, 15.30 WIB',
    ),
    array(
        'name'     => 'Robotik, IoT & Coding Club',
        'category' => 'Teknologi & Otomasi',
        'type'     => 'sains',
        'icon'     => 'fa-robot',
        'color'    => 'tag-purple',
        'desc'     => 'Eksplorasi mikrokontroler, robotika kompetisi, pemrograman web, Python, dan rekayasa teknologi cerdas.',
        'jadwal'   => 'Sabtu, 09.00 WIB',
    ),
    array(
        'name'     => 'Olimpiade Sains (KOS SMAST)',
        'category' => 'Akademik & Sains Prestasi',
        'type'     => 'sains',
        'icon'     => 'fa-atom',
        'color'    => 'tag-blue',
        'desc'     => 'Bimbingan intensif 9 bidang OSN: Matematika, Fisika, Kimia, Biologi, Astronomi, Kebumian, Geografi, Informatika, dan Ekonomi.',
        'jadwal'   => 'Selasa & Jumat, 15.30 WIB',
    ),

    // Bahasa & Komunikasi
    array(
        'name'     => 'English Debate & Speech Club',
        'category' => 'Bahasa & Public Speaking',
        'type'     => 'bahasa',
        'icon'     => 'fa-comments',
        'color'    => 'tag-green',
        'desc'     => 'Asah kemampuan debat parlemen bahasa Inggris, pidato publik, story telling, dan persiapan kompetisi NSDC & Asian Parliamentary.',
        'jadwal'   => 'Rabu, 15.30 WIB',
    ),
    array(
        'name'     => 'Japanese Language Club (Nihon-bu)',
        'category' => 'Bahasa & Budaya Asing',
        'type'     => 'bahasa',
        'icon'     => 'fa-torii-gate',
        'color'    => 'tag-red',
        'desc'     => 'Pembelajaran bahasa Jepang dasar, percakapan sehari-hari, kaligrafi (shodo), serta festival budaya Jepang.',
        'jadwal'   => 'Kamis, 15.30 WIB',
    ),
    array(
        'name'     => 'Jurnalistik & Majalah Sekolah',
        'category' => 'Literasi & Media Siswa',
        'type'     => 'bahasa',
        'icon'     => 'fa-feather-pointed',
        'color'    => 'tag-blue',
        'desc'     => 'Liputan kegiatan sekolah, wawancara, penulisan artikel feature, mading kreatif, dan penerbitan majalah berkala SMAST.',
        'jadwal'   => 'Selasa, 15.30 WIB',
    ),

    // Seni & Kreativitas
    array(
        'name'     => 'Paduan Suara (SMAST Choir)',
        'category' => 'Seni Vokal & Padus',
        'type'     => 'seni',
        'icon'     => 'fa-music',
        'color'    => 'tag-gold',
        'desc'     => 'Grup vokal dan paduan suara bertaraf festival nasional yang rutin memenangkan kompetisi padus antar-SMA se-Jawa Timur.',
        'jadwal'   => 'Senin & Kamis, 15.30 WIB',
    ),
    array(
        'name'     => 'Karawitan & Tari Tradisional',
        'category' => 'Seni Budaya Nusantara',
        'type'     => 'seni',
        'icon'     => 'fa-masks-theater',
        'color'    => 'tag-gold',
        'desc'     => 'Pelestarian gamelan Jawa, tembang macapat, serta tari tradisional kreasi baru yang tampil di acara resmi dan festival kebudayaan.',
        'jadwal'   => 'Rabu, 15.00 WIB',
    ),
    array(
        'name'     => 'Teater Sekolah (Teater SMAST)',
        'category' => 'Seni Peran & Sastra',
        'type'     => 'seni',
        'icon'     => 'fa-theater-masks',
        'color'    => 'tag-purple',
        'desc'     => 'Pengembangan ekspresi panggung, monolog, tata artistik, dan pementasan lakon teater berkala.',
        'jadwal'   => 'Jumat, 15.30 WIB',
    ),
    array(
        'name'     => 'Band Musik & Akustik',
        'category' => 'Musik Modern',
        'type'     => 'seni',
        'icon'     => 'fa-guitar',
        'color'    => 'tag-navy',
        'desc'     => 'Komposisi musik pop, rock, dan jazz; pelatihan ensemble instrumen dan persiapan pensi sekolah.',
        'jadwal'   => 'Rabu & Sabtu, 15.30 WIB',
    ),
    array(
        'name'     => 'Fotografi, Desain & Sinematografi',
        'category' => 'Multimedia Kreatif',
        'type'     => 'seni',
        'icon'     => 'fa-camera',
        'color'    => 'tag-purple',
        'desc'     => 'Teknik kamera DSLR/mirrorless, editing foto & video, pembuatan film pendek festival, dan desain grafis visual.',
        'jadwal'   => 'Sabtu, 10.00 WIB',
    ),

    // Olahraga Prestasi
    array(
        'name'     => 'Basket Putra & Putri (DBL)',
        'category' => 'Olahraga Prestasi',
        'type'     => 'olahraga',
        'icon'     => 'fa-basketball',
        'color'    => 'tag-gold',
        'desc'     => 'Tim basket unggulan yang aktif berlaga di Honda DBL East Java Series dengan fasilitas lapangan indoor dan pelatih berlisensi.',
        'jadwal'   => 'Senin, Rabu, Jumat, 15.45 WIB',
    ),
    array(
        'name'     => 'Futsal & Sepak Bola',
        'category' => 'Olahraga Prestasi',
        'type'     => 'olahraga',
        'icon'     => 'fa-futbol',
        'color'    => 'tag-green',
        'desc'     => 'Latihan strategi fisik, turnamen regional Kediri Raya, dan pembentukan tim sepak bola tangguh SMAST.',
        'jadwal'   => 'Selasa & Kamis, 15.45 WIB',
    ),
    array(
        'name'     => 'Bola Voli Sekolah',
        'category' => 'Olahraga Prestasi',
        'type'     => 'olahraga',
        'icon'     => 'fa-volleyball',
        'color'    => 'tag-blue',
        'desc'     => 'Pembinaan teknik servis, spike, blocking, dan persiapan turnamen O2SN tingkat Kota Kediri.',
        'jadwal'   => 'Senin & Kamis, 15.45 WIB',
    ),
    array(
        'name'     => 'Bulutangkis (Badminton)',
        'category' => 'Olahraga Prestasi',
        'type'     => 'olahraga',
        'icon'     => 'fa-table-tennis-paddle-ball',
        'color'    => 'tag-green',
        'desc'     => 'Latihan teknik dasar dan lanjutan, kelincahan gerak, serta sparing pertandingan di aula serbaguna.',
        'jadwal'   => 'Selasa & Sabtu, 15.30 WIB',
    ),
    array(
        'name'     => 'Catur Prestasi',
        'category' => 'Asah Otak & Strategi',
        'type'     => 'olahraga',
        'icon'     => 'fa-chess',
        'color'    => 'tag-navy',
        'desc'     => 'Analisis pembukaan, taktik tengah, dan babak akhir catur standar maupun catur cepat.',
        'jadwal'   => 'Rabu, 15.30 WIB',
    ),

    // Bela Diri & Karakter
    array(
        'name'     => 'Pencak Silat',
        'category' => 'Bela Diri Tradisional',
        'type'     => 'beladiri',
        'icon'     => 'fa-hand-fist',
        'color'    => 'tag-red',
        'desc'     => 'Penguasaan jurus bela diri warisan leluhur bangsa, penguatan fisik, mental, dan sportivitas kejuaraan.',
        'jadwal'   => 'Rabu & Sabtu, 15.30 WIB',
    ),
    array(
        'name'     => 'Taekwondo',
        'category' => 'Seni Bela Diri Korea',
        'type'     => 'beladiri',
        'icon'     => 'fa-shield-halved',
        'color'    => 'tag-navy',
        'desc'     => 'Latihan teknik tendangan (kyorugi) dan keindahan gerakan (poomsae) berstandar World Taekwondo.',
        'jadwal'   => 'Selasa & Jumat, 15.30 WIB',
    ),
    array(
        'name'     => 'Pecinta Alam (PA SMAST)',
        'category' => 'Kelestarian Lingkungan & Survival',
        'type'     => 'beladiri',
        'icon'     => 'fa-mountain-sun',
        'color'    => 'tag-green',
        'desc'     => 'Eksplorasi alam terbuka, navigasi darat, mountaineering, reboisasi, dan kampanye kepedulian lingkungan hidup.',
        'jadwal'   => 'Sabtu, 08.00 WIB',
    ),
    array(
        'name'     => 'Rohis & Rokris (Kerohanian)',
        'category' => 'Pembinaan Karakter & Spiritual',
        'type'     => 'beladiri',
        'icon'     => 'fa-hands-praying',
        'color'    => 'tag-gold',
        'desc'     => 'Pembinaan iman, kajian keagamaan, perayaan hari besar keagamaan, serta bakti sosial untuk memperkuat toleransi dan integritas moral.',
        'jadwal'   => 'Jumat, 11.30 WIB',
    ),
);
?>

<!-- ══ PAGE HERO ══════════════════════════════════════════════════════════════ -->
<section class="smast-page-hero">
    <div class="smast-container">
        <div class="smast-page-hero-content">
            <div class="smast-breadcrumb">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Beranda</a>
                <i class="fas fa-chevron-right" aria-hidden="true"></i>
                <span>Ekstrakurikuler</span>
            </div>
            <h1>24+ Cabang <span>Ekstrakurikuler</span></h1>
            <p>Wadah pengembangan minat, bakat, kepemimpinan, dan tradisi prestasi siswa-siswi SMA Negeri 1 Kota Kediri.</p>
        </div>
    </div>
</section>

<!-- ══ FILTER BUTTONS & GRID SECTION ═════════════════════════════════════════ -->
<section class="smast-section" style="padding-top: 50px;">
    <div class="smast-container">

        <!-- Kategori Filter Tabs -->
        <div class="smast-ekskul-filter-bar" style="display: flex; gap: 8px; flex-wrap: wrap; justify-content: center; margin-bottom: 36px;">
            <button type="button" class="smast-filter-btn active" data-filter="all" style="padding: 8px 18px; border-radius: 50px; border: 1.5px solid var(--smast-border); background: var(--smast-navy); color: #fff; cursor: pointer; font-weight: 600; font-size: 0.88rem; transition: all 0.25s ease;">Semua Cabang (24+)</button>
            <button type="button" class="smast-filter-btn" data-filter="kepemimpinan" style="padding: 8px 18px; border-radius: 50px; border: 1.5px solid var(--smast-border); background: var(--smast-white); color: var(--smast-text); cursor: pointer; font-weight: 600; font-size: 0.88rem; transition: all 0.25s ease;">Kepemimpinan &amp; Organisasi</button>
            <button type="button" class="smast-filter-btn" data-filter="sains" style="padding: 8px 18px; border-radius: 50px; border: 1.5px solid var(--smast-border); background: var(--smast-white); color: var(--smast-text); cursor: pointer; font-weight: 600; font-size: 0.88rem; transition: all 0.25s ease;">Sains &amp; Teknologi</button>
            <button type="button" class="smast-filter-btn" data-filter="bahasa" style="padding: 8px 18px; border-radius: 50px; border: 1.5px solid var(--smast-border); background: var(--smast-white); color: var(--smast-text); cursor: pointer; font-weight: 600; font-size: 0.88rem; transition: all 0.25s ease;">Bahasa &amp; Jurnalistik</button>
            <button type="button" class="smast-filter-btn" data-filter="seni" style="padding: 8px 18px; border-radius: 50px; border: 1.5px solid var(--smast-border); background: var(--smast-white); color: var(--smast-text); cursor: pointer; font-weight: 600; font-size: 0.88rem; transition: all 0.25s ease;">Seni &amp; Musik</button>
            <button type="button" class="smast-filter-btn" data-filter="olahraga" style="padding: 8px 18px; border-radius: 50px; border: 1.5px solid var(--smast-border); background: var(--smast-white); color: var(--smast-text); cursor: pointer; font-weight: 600; font-size: 0.88rem; transition: all 0.25s ease;">Olahraga Prestasi</button>
            <button type="button" class="smast-filter-btn" data-filter="beladiri" style="padding: 8px 18px; border-radius: 50px; border: 1.5px solid var(--smast-border); background: var(--smast-white); color: var(--smast-text); cursor: pointer; font-weight: 600; font-size: 0.88rem; transition: all 0.25s ease;">Bela Diri &amp; Karakter</button>
        </div>

        <!-- Grid 24 Ekskul Lengkap -->
        <div class="smast-ekskul-full-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px;">
            <?php foreach ( $all_ekskul as $item ) : ?>
                <div class="smast-ekskul-card smast-reveal" data-type="<?php echo esc_attr( $item['type'] ); ?>">
                    <div class="smast-ekskul-icon" style="background: rgba(0,51,102,0.08); width: 56px; height: 56px; border-radius: 14px; display: flex; align-items: center; justify-content: center; margin-bottom: 14px;">
                        <i class="fas <?php echo esc_attr( $item['icon'] ); ?>" style="color: var(--smast-navy); font-size: 1.4rem;" aria-hidden="true"></i>
                    </div>
                    <div class="smast-ekskul-info">
                        <span style="font-size: 0.76rem; font-weight: 700; color: #b45309; background: #fef3c7; padding: 3px 10px; border-radius: 20px; display: inline-block; margin-bottom: 8px;">
                            <?php echo esc_html( $item['category'] ); ?>
                        </span>
                        <h3 style="font-size: 1.05rem; font-weight: 800; color: var(--smast-text); margin-bottom: 8px; line-height: 1.35;">
                            <?php echo esc_html( $item['name'] ); ?>
                        </h3>
                        <p style="font-size: 0.88rem; color: var(--smast-text-muted); line-height: 1.6; margin-bottom: 14px;">
                            <?php echo esc_html( $item['desc'] ); ?>
                        </p>
                        <div style="font-size: 0.8rem; color: var(--smast-text); font-weight: 600; display: flex; align-items: center; gap: 6px; padding-top: 10px; border-top: 1px solid var(--smast-border);">
                            <i class="far fa-clock" style="color: var(--smast-gold);"></i> <?php echo esc_html( $item['jadwal'] ); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Konsultasi Pendaftaran Ekskul -->
        <div style="background: linear-gradient(135deg, #001f3f, #003366); border-radius: 16px; padding: 36px 30px; text-align: center; margin-top: 60px; color: #fff;">
            <h3 style="color: #fff; font-size: 1.4rem; font-weight: 800; margin-bottom: 10px;">Tertarik Bergabung dengan Ekstrakurikuler SMAST?</h3>
            <p style="color: #e2e8f0; font-size: 0.95rem; max-width: 600px; margin: 0 auto 20px;">Pendaftaran anggota baru dibuka setiap awal tahun ajaran pada kegiatan Masa Pengenalan Lingkungan Sekolah (MPLS) dan Expo Ekskul SMAST.</p>
            <a href="https://wa.me/<?php echo esc_attr( $wa ); ?>?text=Halo%20Admin%20SMAST,%20saya%20ingin%20bertanya%20seputar%20kegiatan%20ekstrakurikuler" target="_blank" rel="noopener noreferrer" class="smast-btn smast-btn-gold">
                <i class="fab fa-whatsapp" aria-hidden="true"></i> Hubungi Pembina Kesiswaan via WhatsApp
            </a>
        </div>

    </div>
</section>

<!-- Simple Filter Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.smast-filter-btn');
    const cards = document.querySelectorAll('.smast-ekskul-full-grid .smast-ekskul-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => {
                b.style.background = 'var(--smast-white)';
                b.style.color = 'var(--smast-text)';
            });
            this.style.background = 'var(--smast-navy)';
            this.style.color = '#fff';

            const filter = this.getAttribute('data-filter');
            cards.forEach(card => {
                if (filter === 'all' || card.getAttribute('data-type') === filter) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>

<?php
get_footer();

