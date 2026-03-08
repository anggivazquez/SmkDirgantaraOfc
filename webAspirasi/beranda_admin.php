<?php 
session_start();

// Cek apakah yang masuk benar-benar admin
if($_SESSION['status'] != "login_admin"){
    header("location:login_admin.php?pesan=belum_login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<link rel="icon" type="image/ico" href="img/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="beranda_admin.css">
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-header">
            <img src="logo.png" alt="" class="logo-small">
            <h2>Beranda Admin</h2>
            <p>SMK Dirgantara III</p>
        </div>

        <nav class="nav-menu">
            <p class="menu-label">NAVIGASI UTAMA</p>
            <a href="data_pengaduan.php" class="nav-link">
                <span class="icon">📥</span> Data Pengaduan
            </a>
            <a href="data_tanggapan.php" class="nav-link">
                <span class="icon">📝</span> Data Tanggapan
            </a>

            <p class="menu-label">PENGELOLAAN DATA</p>
            <a href="data_siswa.php" class="nav-link">
                <span class="icon">🎓</span> Akun Siswa
            </a>
            <a href="data_admin.php" class="nav-link">
                <span class="icon">👮</span> Akun Petugas
            </a>
            <a href="register_admin.php" class="nav-link">
                <span class="icon">➕</span> Register Admin
            </a>
            <a href="data_kategori.php" class="nav-link">
                <span class="icon">📂</span> Kategori Aspirasi
            </a>

            <div class="logout-section">
                <a href="logout_admin.php" class="nav-link logout-btn" onclick="return confirm('Keluar dari sistem?')">
                    <span class="icon">🚪</span> Keluar / Logout
                </a>
            </div>
        </nav>
    </aside>

    <main class="content">
        <header class="topbar">
            <div class="breadcrumb">Beranda / Dashboard</div>
                <div class="admin-profile" style="text-align: right; float: right; padding: 10px;">
            <span>Selamat Datang, <strong><?php echo $_SESSION['username']; ?></strong></span>
            </div>
        </header>

        <section class="stats-container">
            <div class="stat-box box-red">
                <div class="stat-text">
                    <h3>Pengaduan</h3>
                    <p>12 Masuk</p>
                </div>
                <div class="stat-icon">🔔</div>
            </div>
            <div class="stat-box box-green">
                <div class="stat-text">
                    <h3>Tanggapan</h3>
                    <p>45 Selesai</p>
                </div>
                <div class="stat-icon">✅</div>
            </div>
            <div class="stat-box box-blue">
                <div class="stat-text">
                    <h3>Total Siswa</h3>
                    <p>120 Akun</p>
                </div>
                <div class="stat-icon">👥</div>
            </div>
        </section>

        <div class="welcome-card">
            <h1>Selamat Datang di Dashboard Admin</h1>
            <p>Silahkan pilih menu di samping untuk memproses aspirasi siswa atau mengelola database pengguna.</p>
        </div>
    </main>

</body>
</html>