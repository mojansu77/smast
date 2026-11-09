<?php
// admin/includes/header.php
require_once 'auth.php';
require_once '../config/db.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - SMAN 1 Kediri</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Summernote (Rich Text Editor) -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f4f6f9; }
        .sidebar { min-height: 100vh; background-color: #003366; color: #fff; }
        .sidebar .brand-title { font-size: 1.1rem; font-weight: 700; color: #FFB800; letter-spacing: 0.5px; }
        .sidebar .brand-sub  { font-size: 0.72rem; color: rgba(255,255,255,0.6); display: block; }
        .sidebar a { color: #c2c7d0; text-decoration: none; padding: 10px 16px; display: flex; align-items: center; gap: 10px; border-radius: 6px; margin-bottom: 4px; font-size: 0.9rem; transition: background 0.2s, color 0.2s; }
        .sidebar a:hover, .sidebar a.active { background-color: rgba(255,184,0,0.15); color: #FFB800; }
        .sidebar a.active { border-left: 3px solid #FFB800; }
        .sidebar .nav-section-label { font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; color: rgba(255,255,255,0.35); padding: 14px 16px 4px; display: block; }
        .content { padding: 30px; width: 100%; }
        .navbar-custom { background-color: #fff; box-shadow: 0 2px 6px rgba(0,0,0,.08); padding: 14px 28px; }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3" style="width: 270px; flex-shrink: 0;">
            <!-- Brand -->
            <div class="text-center py-3 mb-3 border-bottom border-secondary">
                <i class="fas fa-school fa-2x text-warning mb-2"></i>
                <div class="brand-title">SMAST Admin</div>
                <span class="brand-sub">SMA Negeri 1 Kediri</span>
            </div>

            <nav>
                <span class="nav-section-label">Menu Utama</span>
                <a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                    <i class="fas fa-tachometer-alt fa-fw"></i> Dashboard
                </a>

                <span class="nav-section-label">Konten</span>
                <a href="artikel.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'artikel.php' ? 'active' : ''; ?>">
                    <i class="fas fa-newspaper fa-fw"></i> Berita & Artikel
                </a>
                <a href="galeri.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'galeri.php' ? 'active' : ''; ?>">
                    <i class="fas fa-images fa-fw"></i> Galeri Foto
                </a>

                <span class="nav-section-label">Akun</span>
                <a href="logout.php" class="text-danger">
                    <i class="fas fa-sign-out-alt fa-fw"></i> Logout
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="content p-0" style="flex: 1; overflow-x: hidden;">
            <div class="navbar-custom d-flex justify-content-between align-items-center mb-4">
                <h5 class="m-0 text-dark fw-semibold">
                    <?php echo isset($page_title) ? htmlspecialchars($page_title) : 'Dashboard'; ?>
                </h5>
                <div class="d-flex align-items-center gap-3">
                    <span class="text-muted" style="font-size: 0.85rem;">
                        <i class="fas fa-user-circle me-1"></i>
                        <?php echo htmlspecialchars($_SESSION['admin_fullname'] ?? 'Admin'); ?>
                    </span>
                    <a href="../index.php" target="_blank" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-external-link-alt me-1"></i> Lihat Website
                    </a>
                </div>
            </div>
            <div class="container-fluid px-4">
