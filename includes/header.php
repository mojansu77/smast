<?php
// includes/header.php — SMA Negeri 1 Kota Kediri (SMAST)
?>
<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title) . ' — SMA Negeri 1 Kota Kediri' : 'SMA Negeri 1 Kota Kediri — Unggul dalam Prestasi, Berakhlak Mulia'; ?></title>

    <!-- Meta SEO -->
    <meta name="description" content="Website Resmi SMA Negeri 1 Kota Kediri (SMAST). Informasi PPDB, akademik, kesiswaan, ekstrakurikuler, berita, dan galeri foto. Terakreditasi A.">
    <meta name="keywords" content="SMA Negeri 1 Kota Kediri, SMAN 1 Kediri, SMAST Kediri, PPDB Kediri, sekolah unggulan Kediri, Jawa Timur">
    <meta name="author" content="SMA Negeri 1 Kota Kediri">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo isset($page_title) ? htmlspecialchars($page_title) . ' — SMAST Kediri' : 'SMA Negeri 1 Kota Kediri — Unggul dalam Prestasi'; ?>">
    <meta property="og:description" content="Website Resmi SMA Negeri 1 Kota Kediri. Terakreditasi A, sekolah unggulan Kota Kediri, Jawa Timur.">
    <meta property="og:image" content="assets/images/Logo SMAST.png">

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

    <!-- Google Fonts: Inter + Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- SMAST Main Stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo file_exists('assets/css/style.css') ? filemtime('assets/css/style.css') : '1'; ?>">
</head>
<body class="smast-page">
