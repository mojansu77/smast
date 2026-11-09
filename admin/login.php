<?php
// admin/login.php
session_start();
require_once '../config/db.php';

// Jika sudah login, langsung ke dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($db_connected) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id']        = $user['id'];
            $_SESSION['admin_username']  = $user['username'];
            $_SESSION['admin_fullname']  = $user['fullname'];
            header('Location: index.php');
            exit;
        } else {
            $error = 'Username atau password salah.';
        }
    } else {
        $error = 'Koneksi database gagal. Login tidak dapat dilakukan.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SMAN 1 Kediri</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body {
            background: linear-gradient(135deg, #003366 0%, #004d99 50%, #003366 100%);
            display: flex; align-items: center; justify-content: center;
            min-height: 100vh; font-family: 'Inter', sans-serif; padding: 20px;
        }
        .login-box {
            width: 100%; max-width: 420px;
            background: #fff;
            padding: 44px 40px;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        .login-logo {
            text-align: center;
            margin-bottom: 28px;
        }
        .login-logo .school-icon {
            width: 70px; height: 70px;
            background: linear-gradient(135deg, #003366, #004d99);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 14px;
        }
        .login-logo .school-icon i { font-size: 1.8rem; color: #FFB800; }
        .login-logo h1 { font-size: 1.3rem; font-weight: 700; color: #003366; margin: 0 0 4px; }
        .login-logo p  { font-size: 0.8rem; color: #6b7280; margin: 0; }
        .form-label { font-size: 0.88rem; font-weight: 600; color: #374151; }
        .form-control {
            border-radius: 8px; border: 1.5px solid #e5e7eb;
            padding: 10px 14px; font-size: 0.9rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-control:focus {
            border-color: #003366;
            box-shadow: 0 0 0 3px rgba(0,51,102,0.12);
        }
        .input-group-text {
            border-radius: 8px 0 0 8px; border: 1.5px solid #e5e7eb; border-right: 0;
            background: #f9fafb; color: #6b7280;
        }
        .input-group .form-control { border-radius: 0 8px 8px 0; }
        .btn-login {
            background: #003366; color: #fff; border: none; border-radius: 8px;
            padding: 12px; font-size: 0.95rem; font-weight: 600; width: 100%;
            transition: background 0.2s, transform 0.1s;
        }
        .btn-login:hover { background: #004d99; color: #fff; transform: translateY(-1px); }
        .btn-login:active { transform: translateY(0); }
        .divider { text-align: center; margin: 20px 0; color: #9ca3af; font-size: 0.8rem; }
        .back-link { display: flex; align-items: center; justify-content: center; gap: 6px; font-size: 0.84rem; color: #6b7280; text-decoration: none; }
        .back-link:hover { color: #003366; }
    </style>
</head>
<body>
    <div class="login-box">
        <!-- Logo -->
        <div class="login-logo">
            <div class="school-icon">
                <i class="fas fa-school"></i>
            </div>
            <h1>SMAST Admin</h1>
            <p>Panel Administrasi SMA Negeri 1 Kediri</p>
        </div>

        <!-- Error Alert -->
        <?php if ($error): ?>
            <div class="alert alert-danger d-flex align-items-center gap-2 py-2" style="font-size: 0.88rem; border-radius: 8px; margin-bottom: 20px;">
                <i class="fas fa-exclamation-circle"></i>
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <!-- Form -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required autofocus>
                </div>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                </div>
            </div>
            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt me-2"></i> Masuk ke Panel Admin
            </button>
        </form>

        <div class="divider">— atau —</div>
        <a href="../index.php" class="back-link">
            <i class="fas fa-arrow-left"></i> Kembali ke Website Sekolah
        </a>
    </div>
</body>
</html>
