<?php
// admin/index.php — Dashboard SMAN 1 Kediri
$page_title = 'Dashboard';
require_once 'includes/header.php';

// Hitung statistik
$count_artikel   = 0;
$count_galeri    = 0;
$count_pesan     = 0;
$count_pengumuman = 0;

if ($db_connected) {
    try {
        $count_artikel    = $pdo->query("SELECT COUNT(*) FROM artikel")->fetchColumn();
        $count_galeri     = $pdo->query("SELECT COUNT(*) FROM galeri")->fetchColumn();
        $count_pesan      = $pdo->query("SELECT COUNT(*) FROM kontak")->fetchColumn();
        $count_pengumuman = $pdo->query("SELECT COUNT(*) FROM pengumuman")->fetchColumn();
    } catch (PDOException $e) {
        // Abaikan error jika tabel belum ada
    }
}
?>

<!-- Stat Cards -->
<div class="row mt-4 g-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card text-white h-100 border-0 shadow-sm" style="background: linear-gradient(135deg, #003366, #004d99);">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-uppercase fw-semibold mb-1" style="font-size: 0.72rem; opacity: 0.75; letter-spacing: 0.5px;">Total Artikel</div>
                        <div class="display-6 fw-bold"><?php echo $count_artikel; ?></div>
                    </div>
                    <i class="fas fa-newspaper fa-2x" style="opacity: 0.3;"></i>
                </div>
            </div>
            <div class="card-footer border-0 bg-transparent py-2">
                <a href="artikel.php" class="small text-white text-decoration-none opacity-75">
                    Kelola Artikel <i class="fas fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card text-white h-100 border-0 shadow-sm" style="background: linear-gradient(135deg, #d97706, #FFB800);">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-uppercase fw-semibold mb-1" style="font-size: 0.72rem; opacity: 0.75; letter-spacing: 0.5px;">Total Galeri</div>
                        <div class="display-6 fw-bold"><?php echo $count_galeri; ?></div>
                    </div>
                    <i class="fas fa-images fa-2x" style="opacity: 0.3;"></i>
                </div>
            </div>
            <div class="card-footer border-0 bg-transparent py-2">
                <a href="galeri.php" class="small text-white text-decoration-none opacity-75">
                    Kelola Galeri <i class="fas fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card text-white h-100 border-0 shadow-sm" style="background: linear-gradient(135deg, #dc2626, #ef4444);">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-uppercase fw-semibold mb-1" style="font-size: 0.72rem; opacity: 0.75; letter-spacing: 0.5px;">Pesan Masuk</div>
                        <div class="display-6 fw-bold"><?php echo $count_pesan; ?></div>
                    </div>
                    <i class="fas fa-envelope fa-2x" style="opacity: 0.3;"></i>
                </div>
            </div>
            <div class="card-footer border-0 bg-transparent py-2">
                <a href="#" class="small text-white text-decoration-none opacity-75">
                    Lihat Pesan <i class="fas fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card text-white h-100 border-0 shadow-sm" style="background: linear-gradient(135deg, #0891b2, #06b6d4);">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-uppercase fw-semibold mb-1" style="font-size: 0.72rem; opacity: 0.75; letter-spacing: 0.5px;">Pengumuman</div>
                        <div class="display-6 fw-bold"><?php echo $count_pengumuman; ?></div>
                    </div>
                    <i class="fas fa-bullhorn fa-2x" style="opacity: 0.3;"></i>
                </div>
            </div>
            <div class="card-footer border-0 bg-transparent py-2">
                <a href="#" class="small text-white text-decoration-none opacity-75">
                    Lihat Pengumuman <i class="fas fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Welcome Card -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center gap-2">
                <i class="fas fa-school text-primary"></i>
                <h6 class="m-0 fw-bold text-primary">Selamat Datang di Panel Admin SMAN 1 Kediri</h6>
            </div>
            <div class="card-body">
                <p>
                    Halo, <strong><?php echo htmlspecialchars($_SESSION['admin_fullname'] ?? 'Admin'); ?></strong>! 
                    Selamat datang di Panel Administrasi <strong>SMA Negeri 1 Kediri</strong>.
                </p>
                <p>Melalui panel ini, Anda dapat mengelola berbagai konten website secara dinamis, antara lain:</p>
                <ul>
                    <li><i class="fas fa-newspaper text-primary me-2"></i> Menulis dan mengedit <strong>berita & artikel</strong> terbaru seputar kegiatan sekolah.</li>
                    <li><i class="fas fa-images text-warning me-2"></i> Mengelola <strong>galeri foto</strong> yang dikategorikan berdasarkan kegiatan, akademik, kesiswaan, prestasi, dan fasilitas.</li>
                    <li><i class="fas fa-bullhorn text-info me-2"></i> Menambahkan <strong>pengumuman</strong> penting untuk siswa, orang tua, dan calon peserta didik baru.</li>
                    <li><i class="fas fa-envelope text-danger me-2"></i> Memantau <strong>pesan masuk</strong> dari masyarakat yang menghubungi sekolah melalui halaman kontak.</li>
                </ul>
                <p class="mb-0 text-muted" style="font-size: 0.85rem;">
                    <i class="fas fa-info-circle text-info me-1"></i>
                    Pastikan server MySQL aktif sebelum mengelola data. Panel Admin terhubung langsung ke database <code>smast_kediri</code>.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mt-4 mb-5">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 border-bottom">
                <h6 class="m-0 fw-bold text-dark">Aksi Cepat</h6>
            </div>
            <div class="card-body">
                <div class="d-flex flex-wrap gap-3">
                    <a href="artikel.php?action=add" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i> Tambah Artikel Baru
                    </a>
                    <a href="galeri.php?action=add" class="btn btn-warning text-dark">
                        <i class="fas fa-upload me-2"></i> Upload Foto Galeri
                    </a>
                    <a href="../index.php" target="_blank" class="btn btn-outline-secondary">
                        <i class="fas fa-external-link-alt me-2"></i> Lihat Website
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
