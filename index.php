<?php
// index.php — Entry point & Router SMA Negeri 1 Kediri (SMAST)

require_once 'config/db.php';

$page = isset($_GET['page']) ? trim($_GET['page']) : 'beranda';

// Whitelist halaman yang diizinkan
$allowed_pages = [
    'beranda'   => 'Beranda',
    'profil'    => 'Profil Sekolah',
    'sejarah'   => 'Sejarah Sekolah',
    'fasilitas' => 'Fasilitas Sekolah',
    'ekskul'    => 'Ekstrakurikuler',
    'artikel'   => 'Berita & Artikel',
    'galeri'    => 'Galeri Foto & Video',
    'kontak'    => 'Hubungi Kami',
];

if (!array_key_exists($page, $allowed_pages)) {
    $page = 'beranda';
}

$page_title = $allowed_pages[$page];

require_once 'includes/header.php';
require_once 'includes/navbar.php';

// Load halaman konten
$page_file = "pages/{$page}.php";
if (file_exists($page_file)) {
    require_once $page_file;
} else {
    require_once 'pages/beranda.php';
}

require_once 'includes/footer.php';
?>
