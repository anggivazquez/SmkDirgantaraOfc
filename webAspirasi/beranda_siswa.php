<?php 
session_start(); // Memulai session

// Cek apakah siswa sudah login, jika belum arahkan kembali ke login
if($_SESSION['status'] != "login_siswa"){
    header("location:login_siswa.php?pesan=belum_login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<link rel="icon" type="image/ico" href="img/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Siswa</title>
    <link rel="stylesheet" href="beranda_siswa.css">
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-logo">
            <h2>Aspirasi Siswa</h2>
            <p>SMK Dirgantara III</p>
        </div>
        <nav class="sidebar-menu">
            <a href="form_aspirasi.php" class="menu-item">
                <span class="icon">📝</span> Form Aspirasi
            </a>
            <a href="riwayat_aspirasi.php" class="menu-item">
                <span class="icon">📜</span> Riwayat Aspirasi
            </a>
            <hr>
            <a href="logout_siswa.php" class="menu-item logout" onclick="return confirm('Apakah Anda yakin ingin keluar?')">
                <span class="icon">🚪</span> Logout
            </a>
        </nav>
    </div>

    <main class="main-content">
        <header class="top-header">
            <div class="user-info" style="text-align: right;">
    <span>Selamat Datang, <strong><?php echo $_SESSION['nama']; ?></strong></span>
</div>
        </header>

        <section class="dashboard-hero">
            <h1>Halo, Siswa Hebat!</h1>
            <p>Suara Anda sangat berarti untuk kemajuan sekolah kita. Pilih menu di samping untuk mulai menyampaikan aspirasi atau melihat status pengaduan Anda.</p>
            
            <div class="card-container">
                <div class="card">
                    <h3>Form Aspirasi</h3>
                    <p>Sampaikan keluhan, saran, atau ide Anda secara langsung.</p>
                    <a href="form_aspirasi.php" class="btn-action">Buat Aspirasi</a>
                </div>
                <div class="card">
                    <h3>Riwayat</h3>
                    <p>Pantau status aspirasi yang telah Anda kirim sebelumnya.</p>
                    <a href="riwayat_aspirasi.php" class="btn-action secondary">Lihat Riwayat</a>
                </div>
            </div>
        </section>
    </main>

</body>
</html>