<?php
// config/db.php — Konfigurasi Database SMAN 1 Kediri
// Fallback mock data otomatis jika koneksi gagal

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'smast_kediri';

$pdo          = null;
$db_connected = false;

try {
    $dsn     = "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo          = new PDO($dsn, $db_user, $db_pass, $options);
    $db_connected = true;
} catch (PDOException $e) {
    $db_connected = false;
}

// ─── 1. ARTIKEL / BERITA ────────────────────────────────────────────────────
function get_artikel($slug = null) {
    global $pdo, $db_connected;

    $mock = [
        [
            'id' => 1, 'judul' => 'SMAN 1 Kediri Raih Juara 1 Olimpiade Sains Provinsi Jawa Timur',
            'slug' => 'sman1-kediri-juara-olimpiade-sains-provinsi-jatim',
            'konten' => '<p>SMA Negeri 1 Kediri kembali menorehkan prestasi gemilang di kancah pendidikan Jawa Timur. Tim Olimpiade Sains SMAN 1 Kediri berhasil meraih Juara 1 pada ajang OSN tingkat Provinsi Jawa Timur yang diselenggarakan di Surabaya.</p><p>Keberhasilan ini merupakan buah dari kerja keras siswa dan bimbingan intensif para guru pembimbing.</p>',
            'gambar' => '', 'kategori' => 'prestasi',
            'penulis' => 'Admin SMAN 1 Kediri', 'created_at' => '2025-10-20 08:00:00'
        ],
        [
            'id' => 2, 'judul' => 'PPDB Online 2025/2026 SMAN 1 Kediri Resmi Dibuka',
            'slug' => 'ppdb-online-2025-2026-sman1-kediri-dibuka',
            'konten' => '<p>SMA Negeri 1 Kediri resmi membuka Penerimaan Peserta Didik Baru (PPDB) Tahun Ajaran 2025/2026 secara online mulai tanggal 1 Juni 2025. Tersedia jalur Zonasi, Afirmasi, Perpindahan Tugas Orang Tua, dan Jalur Prestasi.</p>',
            'gambar' => '', 'kategori' => 'pengumuman',
            'penulis' => 'Panitia PPDB', 'created_at' => '2025-06-01 07:00:00'
        ],
        [
            'id' => 3, 'judul' => 'Class Meeting Semester Ganjil 2025 — Semangat Sportivitas Antar Kelas',
            'slug' => 'class-meeting-semester-ganjil-2025',
            'konten' => '<p>Pekan Class Meeting Semester Ganjil SMAN 1 Kediri berlangsung meriah selama lima hari. Berbagai cabang olahraga dan seni dipertandingkan, mulai dari futsal, basket, voli, bulu tangkis, hingga lomba paduan suara.</p>',
            'gambar' => '', 'kategori' => 'kegiatan',
            'penulis' => 'Tim OSIS', 'created_at' => '2025-11-01 10:00:00'
        ],
    ];

    if ($slug !== null) {
        if ($db_connected) {
            try {
                $stmt = $pdo->prepare("SELECT * FROM artikel WHERE slug = ?");
                $stmt->execute([$slug]);
                $res = $stmt->fetch();
                if ($res) return $res;
            } catch (PDOException $e) {}
        }
        foreach ($mock as $a) {
            if ($a['slug'] === $slug) return $a;
        }
        return null;
    }

    if ($db_connected) {
        try {
            return $pdo->query("SELECT * FROM artikel ORDER BY id DESC")->fetchAll();
        } catch (PDOException $e) {}
    }
    return $mock;
}

// ─── 2. GALERI FOTO ─────────────────────────────────────────────────────────
function get_galeri($kategori = null) {
    global $pdo, $db_connected;

    $mock = [
        ['id' => 1, 'judul' => 'Upacara Bendera Hari Senin',          'nama_file' => '', 'kategori' => 'kegiatan'],
        ['id' => 2, 'judul' => 'Olimpiade Sains — Tim SMAN 1 Kediri', 'nama_file' => '', 'kategori' => 'prestasi'],
        ['id' => 3, 'judul' => 'Fasilitas Laboratorium IPA',          'nama_file' => '', 'kategori' => 'fasilitas'],
        ['id' => 4, 'judul' => 'Kegiatan Pramuka Penegak',            'nama_file' => '', 'kategori' => 'kesiswaan'],
        ['id' => 5, 'judul' => 'Wisuda Kelas XII Tahun 2025',         'nama_file' => '', 'kategori' => 'kegiatan'],
        ['id' => 6, 'judul' => 'Perpustakaan Digital',                'nama_file' => '', 'kategori' => 'fasilitas'],
    ];

    if ($db_connected) {
        try {
            if ($kategori) {
                $stmt = $pdo->prepare("SELECT * FROM galeri WHERE kategori = ? ORDER BY id DESC");
                $stmt->execute([$kategori]);
            } else {
                $stmt = $pdo->query("SELECT * FROM galeri ORDER BY id DESC");
            }
            return $stmt->fetchAll();
        } catch (PDOException $e) {}
    }

    if ($kategori) {
        return array_values(array_filter($mock, fn($g) => $g['kategori'] === $kategori));
    }
    return $mock;
}

// ─── 3. FASILITAS SEKOLAH ───────────────────────────────────────────────────
function get_fasilitas() {
    global $pdo, $db_connected;

    $mock = [
        ['id'=>1,'nama'=>'Laboratorium IPA',      'deskripsi'=>'Laboratorium Fisika, Kimia, dan Biologi lengkap dengan peralatan modern.','ikon'=>'fa-flask'],
        ['id'=>2,'nama'=>'Laboratorium Komputer', 'deskripsi'=>'60 unit komputer dengan internet cepat untuk pembelajaran TIK dan pemrograman.','ikon'=>'fa-computer'],
        ['id'=>3,'nama'=>'Perpustakaan Digital',  'deskripsi'=>'Lebih dari 5.000 koleksi buku fisik dan ribuan e-book serta jurnal digital.','ikon'=>'fa-book-open'],
        ['id'=>4,'nama'=>'Lapangan Olahraga',     'deskripsi'=>'Lapangan basket, futsal, voli, dan atletik yang memadai.','ikon'=>'fa-futbol'],
        ['id'=>5,'nama'=>'Aula Serbaguna',        'deskripsi'=>'Kapasitas 500 orang untuk wisuda, seminar, dan kegiatan besar.','ikon'=>'fa-users'],
        ['id'=>6,'nama'=>'Ruang Seni & Musik',    'deskripsi'=>'Studio musik dan ruang kesenian lengkap untuk pengembangan bakat seni.','ikon'=>'fa-music'],
        ['id'=>7,'nama'=>'Kantin Sehat',          'deskripsi'=>'Kantin bersih dengan menu bergizi yang telah lulus uji Dinas Kesehatan.','ikon'=>'fa-utensils'],
        ['id'=>8,'nama'=>'Koperasi Siswa',        'deskripsi'=>'Koperasi dikelola siswa menyediakan keperluan sekolah dengan harga terjangkau.','ikon'=>'fa-store'],
    ];

    if ($db_connected) {
        try {
            return $pdo->query("SELECT * FROM fasilitas ORDER BY id ASC")->fetchAll();
        } catch (PDOException $e) {}
    }
    return $mock;
}

// ─── 4. PENGUMUMAN / TICKER ─────────────────────────────────────────────────
function get_pengumuman($aktif_only = true) {
    global $pdo, $db_connected;

    $mock = [
        ['id'=>1,'judul'=>'PPDB Online 2025/2026 Dibuka','isi'=>'Pendaftaran PPDB Online sudah dibuka.','tanggal'=>'2025-06-01'],
        ['id'=>2,'judul'=>'UTS Ganjil 10–17 November 2025','isi'=>'Ujian Tengah Semester Ganjil dilaksanakan 10–17 November 2025.','tanggal'=>'2025-10-20'],
        ['id'=>3,'judul'=>'Beasiswa Prestasi — Deadline 30 Nov','isi'=>'Pendaftaran beasiswa prestasi daerah masih dibuka.','tanggal'=>'2025-10-15'],
        ['id'=>4,'judul'=>'Class Meeting Akhir Semester','isi'=>'Turnamen Olahraga Antar Kelas setelah UAS semester ganjil.','tanggal'=>'2025-10-01'],
    ];

    if ($db_connected) {
        try {
            $sql = $aktif_only
                ? "SELECT * FROM pengumuman WHERE aktif = 1 ORDER BY tanggal DESC"
                : "SELECT * FROM pengumuman ORDER BY tanggal DESC";
            return $pdo->query($sql)->fetchAll();
        } catch (PDOException $e) {}
    }
    return $mock;
}

// ─── 5. SIMPAN PESAN KONTAK ─────────────────────────────────────────────────
function save_kontak($nama, $email, $subjek, $pesan) {
    global $pdo, $db_connected;
    if ($db_connected) {
        try {
            $stmt = $pdo->prepare("INSERT INTO kontak (nama, email, subjek, pesan) VALUES (?, ?, ?, ?)");
            return $stmt->execute([$nama, $email, $subjek, $pesan]);
        } catch (PDOException $e) {
            return false;
        }
    }
    return true; // mock: selalu sukses
}

// ─── 6. WORDPRESS ENVIRONMENT COMPATIBILITY POLYFILLS ───────────────────────
if (!function_exists('get_header')) {
    function get_header() { /* Handled by index.php */ }
}
if (!function_exists('get_footer')) {
    function get_footer() { /* Handled by index.php */ }
}
if (!function_exists('get_theme_mod')) {
    function get_theme_mod($name, $default = false) {
        $defaults = [
            'smast_principal_name'     => 'ARIF SYAH PUTRA, M.Pd.',
            'smast_principal_nip'      => 'Kepala SMA Negeri 1 Kota Kediri',
            'smast_principal_photo'    => 'assets/images/Kepala Sekolah.png',
            'smast_npsn'               => '20534394',
            'smast_status_sekolah'     => 'Negeri',
            'smast_bentuk_pendidikan'  => 'Sekolah Menengah Atas (SMA)',
            'smast_status_kepemilikan' => 'Pemerintah Provinsi Jawa Timur',
            'smast_sk_pendirian'       => '1946 (17 September 1946)',
            'smast_akreditasi'         => 'A (Unggul) — Nilai 96',
            'smast_kurikulum'          => 'Kurikulum Merdeka',
            'smast_luas_tanah'         => '24.814 m²',
            'smast_daya_tampung'       => '34 Rombongan Belajar (± 1.150 Siswa)',
            'smast_koordinat'          => 'S 7° 48\' 40.73"  E 112° 0\' 10.33"',
            'smast_motto'              => 'Smast Mulia Jaya Jaya Jaya!!!',
            'smast_email'              => 'redaksi@smastkediri.sch.id',
            'smast_phone'              => '+62 354 771829',
            'smast_wa_number'          => '6281234567890',
            'smast_address'            => 'Jalan Veteran No. 1, Kelurahan Bandar Lor, Kecamatan Mojoroto, Kota Kediri, Jawa Timur 64114',
            'smast_instagram_url'      => 'https://www.instagram.com/smast_kediri_official/',
            'smast_facebook_url'       => 'https://www.facebook.com/smastkediriofficial/',
            'smast_youtube_url'        => 'https://www.youtube.com/@smast_kediri_official',
            'smast_twitter_url'        => 'https://www.facebook.com/smastkediriofficial/',
        ];
        return isset($defaults[$name]) ? $defaults[$name] : $default;
    }
}
if (!function_exists('home_url')) {
    function home_url($path = '/') {
        $p = trim($path, '/#');
        if (empty($p)) return 'index.php';
        return 'index.php?page=' . $p;
    }
}
if (!function_exists('esc_url')) {
    function esc_url($url) { return htmlspecialchars((string)$url, ENT_QUOTES, 'UTF-8'); }
}
if (!function_exists('esc_html')) {
    function esc_html($text) { return htmlspecialchars((string)$text, ENT_QUOTES, 'UTF-8'); }
}
if (!function_exists('esc_attr')) {
    function esc_attr($text) { return htmlspecialchars((string)$text, ENT_QUOTES, 'UTF-8'); }
}
if (!function_exists('wp_kses_post')) {
    function wp_kses_post($text) { return $text; }
}
if (!function_exists('wpautop')) {
    function wpautop($pee) { return '<p>' . nl2br((string)$pee) . '</p>'; }
}
if (!function_exists('sanitize_key')) {
    function sanitize_key($key) { return preg_replace('/[^a-z0-9_\-]/i', '', (string)$key); }
}
if (!function_exists('add_query_arg')) {
    function add_query_arg($key, $val) { return '?' . http_build_query(array_merge($_GET, [$key => $val])); }
}
if (!function_exists('remove_query_arg')) {
    function remove_query_arg($key) {
        $g = $_GET; unset($g[$key]);
        return '?' . http_build_query($g);
    }
}
if (!function_exists('is_front_page')) {
    function is_front_page() { return (!isset($_GET['page']) || $_GET['page'] === 'beranda'); }
}
if (!function_exists('is_page')) {
    function is_page($p = '') {
        $curr = isset($_GET['page']) ? $_GET['page'] : 'beranda';
        return empty($p) ? true : ($curr === $p);
    }
}
if (!function_exists('is_post_type_archive')) {
    function is_post_type_archive($pt = '') { return false; }
}
if (!function_exists('is_tax')) {
    function is_tax($t = '') { return false; }
}
if (!function_exists('get_template_directory_uri')) {
    function get_template_directory_uri() { return 'assets'; }
}
if (!function_exists('wp_reset_postdata')) {
    function wp_reset_postdata() {}
}
if (!function_exists('the_post')) {
    function the_post() {}
}
if (!class_exists('WP_Query')) {
    class WP_Query {
        public $posts = [];
        public function __construct($args = []) {}
        public function have_posts() { return false; }
        public function the_post() {}
    }
}
