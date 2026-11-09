<?php
// admin/artikel.php
$page_title = 'Manajemen Artikel';
require_once 'includes/header.php';

$action = $_GET['action'] ?? 'list';
$upload_dir = '../assets/images/';

// Notifikasi
$msg = '';
$msg_type = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add']) || isset($_POST['edit'])) {
        $judul = trim($_POST['judul'] ?? '');
        // Buat slug sederhana dari judul
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $judul)));
        $konten = $_POST['konten'] ?? '';
        $penulis = trim($_POST['penulis'] ?? 'Admin');
        $gambar = $_POST['gambar_lama'] ?? '';

        // Handle file upload
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
            $allowed = ['jpg', 'jpeg', 'png', 'webp'];
            $filename = $_FILES['gambar']['name'];
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            if (in_array($ext, $allowed)) {
                $new_filename = 'artikel_' . time() . '_' . rand(100, 999) . '.' . $ext;
                if (move_uploaded_file($_FILES['gambar']['tmp_name'], $upload_dir . $new_filename)) {
                    $gambar = $new_filename;
                }
            } else {
                $msg = "Format gambar tidak diizinkan. Gunakan JPG/PNG/WEBP.";
                $msg_type = "danger";
            }
        }

        if (empty($msg) && $db_connected) {
            try {
                if (isset($_POST['add'])) {
                    $stmt = $pdo->prepare("INSERT INTO artikel (judul, slug, konten, gambar, penulis) VALUES (?, ?, ?, ?, ?)");
                    $stmt->execute([$judul, $slug, $konten, $gambar, $penulis]);
                    $msg = "Artikel berhasil ditambahkan.";
                    $msg_type = "success";
                } else if (isset($_POST['edit'])) {
                    $id = $_POST['id'];
                    $stmt = $pdo->prepare("UPDATE artikel SET judul=?, slug=?, konten=?, gambar=?, penulis=? WHERE id=?");
                    $stmt->execute([$judul, $slug, $konten, $gambar, $penulis, $id]);
                    $msg = "Artikel berhasil diperbarui.";
                    $msg_type = "success";
                }
                $action = 'list';
            } catch (PDOException $e) {
                $msg = "Gagal menyimpan artikel: " . $e->getMessage();
                $msg_type = "danger";
            }
        } else if (!$db_connected) {
            $msg = "Koneksi database terputus. Tidak dapat menyimpan data.";
            $msg_type = "danger";
        }
    }
}

// Proses Delete
if ($action == 'delete' && isset($_GET['id'])) {
    if ($db_connected) {
        try {
            $stmt = $pdo->prepare("DELETE FROM artikel WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            $msg = "Artikel berhasil dihapus.";
            $msg_type = "success";
        } catch (PDOException $e) {
            $msg = "Gagal menghapus artikel: " . $e->getMessage();
            $msg_type = "danger";
        }
    }
    $action = 'list';
}
?>

<?php if ($msg): ?>
<div class="alert alert-<?php echo $msg_type; ?> alert-dismissible fade show" role="alert">
    <?php echo $msg; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<?php if ($action == 'list'): ?>
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Artikel</h6>
            <a href="?action=add" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah Artikel</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="15%">Gambar</th>
                            <th width="40%">Judul</th>
                            <th width="15%">Penulis</th>
                            <th width="15%">Tanggal</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if ($db_connected) {
                            $stmt = $pdo->query("SELECT * FROM artikel ORDER BY id DESC");
                            $artikels = $stmt->fetchAll();
                            
                            if (count($artikels) > 0) {
                                foreach ($artikels as $a):
                        ?>
                                <tr>
                                    <td><?php echo $a['id']; ?></td>
                                    <td>
                                        <?php if ($a['gambar']): ?>
                                            <img src="../assets/images/<?php echo htmlspecialchars($a['gambar']); ?>" alt="img" class="img-thumbnail" style="max-height: 60px;">
                                        <?php else: ?>
                                            <span class="text-muted small">Tanpa Gambar</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo htmlspecialchars($a['judul']); ?></td>
                                    <td><?php echo htmlspecialchars($a['penulis']); ?></td>
                                    <td><?php echo date('d M Y', strtotime($a['created_at'])); ?></td>
                                    <td>
                                        <a href="?action=edit&id=<?php echo $a['id']; ?>" class="btn btn-sm btn-info text-white" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="?action=delete&id=<?php echo $a['id']; ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus artikel ini?');"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                        <?php 
                                endforeach;
                            } else {
                                echo '<tr><td colspan="6" class="text-center">Belum ada artikel.</td></tr>';
                            }
                        } else {
                            echo '<tr><td colspan="6" class="text-center text-danger">Koneksi database gagal.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php elseif ($action == 'add' || $action == 'edit'): 
    $edit_data = null;
    if ($action == 'edit' && isset($_GET['id']) && $db_connected) {
        $stmt = $pdo->prepare("SELECT * FROM artikel WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $edit_data = $stmt->fetch();
    }
?>
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $action == 'add' ? 'Tambah Artikel Baru' : 'Edit Artikel'; ?></h6>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <?php if ($edit_data): ?>
                    <input type="hidden" name="id" value="<?php echo $edit_data['id']; ?>">
                    <input type="hidden" name="gambar_lama" value="<?php echo htmlspecialchars($edit_data['gambar']); ?>">
                <?php endif; ?>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Judul Artikel</label>
                    <input type="text" name="judul" class="form-control" required value="<?php echo $edit_data ? htmlspecialchars($edit_data['judul']) : ''; ?>">
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Penulis</label>
                    <input type="text" name="penulis" class="form-control" value="<?php echo $edit_data ? htmlspecialchars($edit_data['penulis']) : 'Admin'; ?>">
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Gambar Cover</label>
                    <?php if ($edit_data && $edit_data['gambar']): ?>
                        <div class="mb-2">
                            <img src="../assets/images/<?php echo htmlspecialchars($edit_data['gambar']); ?>" alt="Current Image" class="img-thumbnail" style="max-height: 150px;">
                        </div>
                    <?php endif; ?>
                    <input type="file" name="gambar" class="form-control" accept="image/jpeg, image/png, image/webp">
                    <div class="form-text">Biarkan kosong jika tidak ingin <?php echo $action == 'add' ? 'menambahkan' : 'mengubah'; ?> gambar. Ukuran disarankan 800x600px.</div>
                </div>
                
                <div class="mb-4">
                    <label class="form-label fw-bold">Konten Artikel</label>
                    <textarea name="konten" class="form-control summernote" required><?php echo $edit_data ? htmlspecialchars($edit_data['konten']) : ''; ?></textarea>
                </div>
                
                <button type="submit" name="<?php echo $action; ?>" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Artikel</button>
                <a href="?action=list" class="btn btn-secondary"><i class="fas fa-times"></i> Batal</a>
            </form>
        </div>
    </div>
<?php endif; ?>

<?php require_once 'includes/footer.php'; ?>
