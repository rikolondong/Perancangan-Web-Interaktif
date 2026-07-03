<?php
include 'config.php';
session_start();

// Jika sudah login, langsung lempar ke dashboard
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Cek apakah username sudah terdaftar
    $cek_user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    
    if (mysqli_num_rows($cek_user) > 0) {
        $error = "Username sudah digunakan! Silakan pilih username lain.";
    } else {
        // Enkripsi password sebelum disimpan ke database
        $password_hashed = password_hash($password, PASSWORD_BCRYPT);
        
        $query = "INSERT INTO users (nama, username, password) VALUES ('$nama', '$username', '$password_hashed')";
        
        if (mysqli_query($conn, $query)) {
            $success = "Registrasi berhasil! Silakan <a href='login.php' style='color: #3b82f6;'>Login di sini</a>.";
        } else {
            $error = "Terjadi kesalahan saat mendaftar.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Test Register & Login - Register</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        :root {
            --bg-color: #0b0e14; --card-bg: #151a23; --input-bg: #0b0e14;
            --text-main: #ffffff; --text-muted: #8b949e; --border-color: #30363d;
            --btn-gradient: linear-gradient(90deg, #4f46e5 0%, #3b82f6 100%);
            --btn-hover: linear-gradient(90deg, #4338ca 0%, #2563eb 100%);
        }
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Inter', sans-serif; }
        body {
            background-color: var(--bg-color); color: var(--text-main);
            min-height: 100vh; display: flex; justify-content: center; align-items: center; position: relative;
        }
        body::before {
            content: ''; position: absolute; top: -20%; left: 50%; transform: translateX(-50%);
            width: 80vw; height: 80vh; background: radial-gradient(circle, rgba(59, 130, 246, 0.15) 0%, rgba(11, 14, 20, 0) 70%);
            z-index: -1; pointer-events: none;
        }
        .auth-card {
            background-color: var(--card-bg); padding: 40px; border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.05); width: 100%; max-width: 450px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5); text-align: center;
        }
        .auth-header h1 { font-size: 26px; font-weight: 600; margin-bottom: 12px; letter-spacing: -0.5px; }
        .auth-header p { color: var(--text-muted); font-size: 14px; line-height: 1.5; margin-bottom: 25px; }
        .form-group { margin-bottom: 20px; text-align: left; }
        .form-group label { display: block; margin-bottom: 8px; font-size: 14px; color: #d1d5db; }
        .input-wrapper { position: relative; }
        .form-group input {
            width: 100%; padding: 14px 16px; background-color: var(--input-bg);
            border: 1px solid var(--border-color); border-radius: 8px; color: var(--text-main); font-size: 14px; outline: none;
        }
        .form-group input:focus { border-color: #3b82f6; }
        .eye-icon { position: absolute; right: 16px; top: 50%; transform: translateY(-50%); color: var(--text-muted); cursor: pointer; }
        .btn-primary {
            width: 100%; padding: 14px; background: var(--btn-gradient); border: none; border-radius: 8px;
            color: white; font-size: 15px; font-weight: 600; cursor: pointer; margin-top: 10px;
        }
        .btn-primary:hover { background: var(--btn-hover); }
        .toggle-auth { text-align: center; margin-top: 20px; font-size: 13px; color: var(--text-muted); }
        .toggle-auth a { color: #3b82f6; text-decoration: none; font-weight: 500; }
        .alert { padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; }
        .alert-danger { background-color: rgba(239, 68, 68, 0.15); border: 1px solid #ef4444; color: #fca5a5; }
        .alert-success { background-color: rgba(16, 185, 129, 0.15); border: 1px solid #10b981; color: #a7f3d0; }
    </style>
</head>
<body>

    <div class="auth-card">
        <div class="auth-header">
            <h1>Website Test Register & Login</h1>
            <p>Silakan daftarkan akun baru Anda di bawah ini.</p>
        </div>

        <?php if($error): ?>
            <div class="alert alert-danger"><?= $error; ?></div>
        <?php endif; ?>

        <?php if($success): ?>
            <div class="alert alert-success"><?= $success; ?></div>
        <?php endif; ?>

        <form action="register.php" method="POST">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Masukkan nama lengkap Anda" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Buat username Anda" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <div class="input-wrapper">
                    <input type="password" name="password" id="reg-pwd" placeholder="Buat password Anda" required>
                    <span class="eye-icon" onclick="togglePassword('reg-pwd')">👁️</span>
                </div>
            </div>
            <button type="submit" class="btn-primary">Sign Up</button>
        </form>

        <div class="toggle-auth">
            Sudah punya akun? <a href="login.php">Sign in</a>
        </div>
    </div>

    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            input.type = input.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>