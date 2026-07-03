<?php
session_start();

// Proteksi halaman: Jika belum login, tendang kembali ke login.php
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Website Test</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        :root {
            --bg-color: #0b0e14; --card-bg: #151a23; --border-color: #30363d;
            --text-main: #ffffff; --text-muted: #8b949e;
            --btn-gradient: linear-gradient(90deg, #4f46e5 0%, #3b82f6 100%);
        }
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Inter', sans-serif; }
        body { background-color: var(--bg-color); color: var(--text-main); padding: 40px; min-height: 100vh; display: flex; justify-content: center; align-items: center; }
        
        .dashboard-container {
            display: flex; width: 100%; max-width: 1100px; height: 80vh;
            background-color: var(--card-bg); border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.05); overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        .sidebar {
            width: 240px; background-color: #0d1117; padding: 30px 20px;
            border-right: 1px solid var(--border-color); display: flex; flex-direction: column;
        }
        .logo { font-size: 20px; font-weight: bold; margin-bottom: 40px; background: var(--btn-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .nav-item { padding: 12px 15px; margin-bottom: 8px; border-radius: 8px; cursor: pointer; color: var(--text-muted); font-size: 14px; transition: 0.2s; text-decoration: none; }
        .nav-item:hover, .nav-item.active { background-color: rgba(59, 130, 246, 0.1); color: white; }
        .logout-btn { margin-top: auto; color: #ef4444; }
        .logout-btn:hover { background-color: rgba(239, 68, 68, 0.1); color: #fca5a5; }
        
        .main-content { flex: 1; padding: 40px; overflow-y: auto; text-align: left; }
        .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 35px; }
        .user-profile { display: flex; align-items: center; gap: 12px; }
        .avatar { width: 40px; height: 40px; border-radius: 50%; background: var(--btn-gradient); }
        
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; margin-bottom: 35px; }
        .stat-card { background-color: #0d1117; padding: 24px; border-radius: 12px; border: 1px solid var(--border-color); }
        .stat-title { color: var(--text-muted); font-size: 13px; margin-bottom: 10px; }
        .stat-value { font-size: 26px; font-weight: bold; }

        .recent-activity { background-color: #0d1117; padding: 24px; border-radius: 12px; border: 1px solid var(--border-color); }
        .activity-item { padding: 15px 0; border-bottom: 1px solid var(--border-color); display: flex; justify-content: space-between; font-size: 14px; }
        .activity-item:last-child { border-bottom: none; }
    </style>
</head>
<body>

    <div class="dashboard-container">
        <div class="sidebar">
            <div class="logo">AppSystem.</div>
            <a href="#" class="nav-item active">Overview</a>
            <a href="#" class="nav-item">Analytics Data</a>
            <a href="#" class="nav-item">Settings</a>
            <a href="logout.php" class="nav-item logout-btn">Log Out</a>
        </div>

        <div class="main-content">
            <div class="top-bar">
                <div>
                    <h2>Selamat Datang, <?= htmlspecialchars($_SESSION['nama']); ?>!</h2>
                    <p style="color: var(--text-muted); font-size: 14px; margin-top: 4px;">Berikut adalah rangkuman data pengujian sistem Anda hari ini.</p>
                </div>
                <div class="user-profile">
                    <span style="font-size: 14px; color: var(--text-muted);">@<?= htmlspecialchars($_SESSION['username']); ?></span>
                    <div class="avatar"></div>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-title">Total Pengguna Terdaftar</div>
                    <div class="stat-value">Aktif</div>
                </div>
                <div class="stat-card">
                    <div class="stat-title">Status Database</div>
                    <div class="stat-value" style="color: #10b981;">Terhubung</div>
                </div>
                <div class="stat-card">
                    <div class="stat-title">Metode Enkripsi</div>
                    <div class="stat-value" style="font-size: 18px;">PASSWORD_BCRYPT</div>
                </div>
            </div>

            <div class="recent-activity">
                <h3 style="margin-bottom: 20px; font-size: 18px;">Log Aktivitas Sistem</h3>
                <div class="activity-item">
                    <span>Berhasil melakukan query ke tabel <code>users</code>.</span>
                    <span style="color: var(--text-muted);">Baru saja</span>
                </div>
                <div class="activity-item">
                    <span>Sesi autentikasi aman (PHP Session) telah diaktifkan.</span>
                    <span style="color: var(--text-muted);">Baru saja</span>
                </div>
            </div>
        </div>
    </div>

</body>
</html>