<?php
// admin/galeri.php — Manajemen Galeri Foto SMAN 1 Kediri
$page_title = 'Manajemen Galeri Foto';
require_once 'includes/header.php';

$action     = $_GET['action'] ?? 'list';
$upload_dir = '../assets/images/';

$msg      = '';
$msg_type = '';

$kategori_options = ['akademik', 'kesiswaan', 'prestasi', 'fasilitas', 'kegiatan'];
$kategori_labels  = [
    'akademik'  => 'Akademik',
    'kesiswaan' => 'Kesiswaan',
    'prestasi'  => 'Prestasi',
    'fasilitas' => 'Fasilitas',
    'kegiatan'  => 'Kegiatan',
];

// ——— PROSES TAMBAH FOTO ———
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    $judul    = trim($_POST['judul']    ?? '');
    $kategori = trim($_POST['kategori'] ?? 'kegiatan');

    // Validasi kategori
    if (!in_array($kategori, $kategori_options)) {
        $kategori = 'kegiatan';
    }

    $nama_file = '';

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $allowed  = ['jpg', 'jpeg', 'png', 'webp'];
        $filename = $_FILES['gambar']['name'];
        $ext      = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (in_array($ext, $allowed)) {
            $new_filename = 'galeri_' . time() . '_' . rand(100, 999) . '.' . $ext;
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $upload_dir . $new_filename)) {
                $nama_file = $new_filename;
            } else {
                $msg      = 'Gagal memindahkan file. Periksa permission folder assets/images/.';
                $msg_type = 'danger';
            }
        } else {
            $msg      = 'Format gambar tidak diizinkan. Gunakan JPG, PNG, atau WEBP.';
            $msg_type = 'danger';
        }
    } else {
        $msg      = 'Gambar wajib diupload.';
        $msg_type = 'danger';
    }

    if (empty($msg) && !empty($nama_file) && !empty($judul) && $db_connected) {
        try {
            $stmt = $pdo->prepare("INSERT INTO galeri (judul, nama_file, kategori) VALUES (?, ?, ?)");
            $stmt->execute([$judul, $nama_file, $kategori]);
            $msg      = 'Foto galeri berhasil ditambahkan!';
            $msg_type = 'success';
            $action   = 'list';
        } catch (PDOException $e) {
            $msg      = 'Gagal menyimpan foto: ' . $e->getMessage();
            $msg_type = 'danger';
        }
    }
}

// ——— PROSES HAPUS FOTO ———
if ($action == 'delete' && isset($_GET['id'])) {
    if ($db_connected) {
        try {
            // Ambil nama file dulu untuk hapus fisik
            $stmt = $pdo->prepare("SELECT nama_file FROM galeri WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            $row = $stmt->fetch();

            if ($row && file_exists($upload_dir . $row['nama_file'])) {
                unlink($upload_dir . $row['nama_file']);
            }

            $stmt = $pdo->prepare("DELETE FROM galeri WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            $msg      = 'Foto galeri berhasil dihapus.';
            $msg_type = 'success';
        } catch (PDOException $e) {
            $msg      = 'Gagal menghapus foto: ' . $e->getMessage();
            $msg_type = 'danger';
        }
    }
    $action = 'list';
}
?>

<?php if ($msg): ?>
<div class="alert alert-<?php echo $msg_type; ?> alert-dismissible fade show" role="alert">
    <i class="fas <?php echo $msg_type == 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'; ?> me-2"></i>
    <?php echo htmlspecialchars($msg); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<?php if ($action == 'list'): ?>
    <!-- LIST VIEW -->
    <div class="card shadow-sm mb-4 border-0">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 fw-bold text-primary"><i class="fas fa-images me-2"></i>Daftar Foto Galeri</h6>
            <a href="?action=add" class="btn btn-sm btn-primary"><i class="fas fa-upload me-1"></i> Upload Foto</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">#</th>
                            <th width="18%">Gambar</th>
                            <th>Judul Foto</th>
                            <th width="15%">Kategori</th>
                            <th width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($db_connected) {
                            $stmt   = $pdo->query("SELECT * FROM galeri ORDER BY id DESC");
                            $galeri = $stmt->fetchAll();

                            if (count($galeri) > 0) {
                                foreach ($galeri as $g): ?>
                                <tr>
                                    <td><?php echo $g['id']; ?></td>
                                    <td>
                                        <img src="../assets/images/<?php echo htmlspecialchars($g['nama_file']); ?>" 
                                             alt="<?php echo htmlspecialchars($g['judul']); ?>"
                                             class="img-thumbnail"
                                             style="max-height: 72px; max-width: 120px; object-fit: cover;"
                                             onerror="this.src='../assets/images/placeholder.jpg'">
                                    </td>
                                    <td><?php echo htmlspecialchars($g['judul']); ?></td>
                                    <td>
                                        <?php
                                        $badge_colors = [
                                            'akademik'  => 'primary',
                                            'kesiswaan' => 'success',
                                            'prestasi'  => 'warning text-dark',
                                            'fasilitas' => 'info',
                                            'kegiatan'  => 'secondary',
                                        ];
                                        $bc = $badge_colors[$g['kategori']] ?? 'secondary';
                                        ?>
                                        <span class="badge bg-<?php echo $bc; ?>">
                                            <?php echo htmlspecialchars($kategori_labels[$g['kategori']] ?? ucfirst($g['kategori'])); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="?action=delete&id=<?php echo $g['id']; ?>" 
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Yakin ingin menghapus foto ini? File gambar juga akan dihapus.');">
                                            <i class="fas fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach;
                            } else {
                                echo '<tr><td colspan="5" class="text-center py-4 text-muted"><i class="fas fa-images fa-2x mb-2 d-block opacity-25"></i>Belum ada foto galeri.</td></tr>';
                            }
                        } else {
                            echo '<tr><td colspan="5" class="text-center text-danger py-3"><i class="fas fa-database me-1"></i> Koneksi database gagal.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php elseif ($action == 'add'): ?>
    <!-- ADD FORM -->
    <div class="card shadow-sm mb-4 border-0">
        <div class="card-header bg-white py-3 d-flex align-items-center gap-2">
            <i class="fas fa-upload text-primary"></i>
            <h6 class="m-0 fw-bold text-primary">Upload Foto Galeri Baru</h6>
        </div>
        <div class="card-body">
            <form action="galeri.php" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul / Deskripsi Singkat <span class="text-danger">*</span></label>
                    <input type="text" name="judul" class="form-control" required
                           placeholder="Contoh: Upacara Hari Pahlawan 2024">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                    <select name="kategori" class="form-select" required>
                        <?php foreach ($kategori_options as $opt): ?>
                        <option value="<?php echo $opt; ?>">
                            <?php echo $kategori_labels[$opt]; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="form-text">Pilih kategori yang paling sesuai dengan isi foto.</div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">File Gambar <span class="text-danger">*</span></label>
                    <input type="file" name="gambar" class="form-control" 
                           accept="image/jpeg,image/png,image/webp" required>
                    <div class="form-text">Format: JPG, PNG, WEBP. Rekomendasi: ukuran file &lt; 2MB.</div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" name="add" class="btn btn-primary">
                        <i class="fas fa-upload me-1"></i> Upload Foto
                    </button>
                    <a href="?action=list" class="btn btn-secondary">
                        <i class="fas fa-times me-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>

<?php require_once 'includes/footer.php'; ?>
