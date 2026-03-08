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
    <title>Form Aspirasi</title>
    <link rel="stylesheet" href="form_aspirasi.css">
</head>
<body>

    <div class="form-container">
        <div class="form-header">
            <h2>FORM ASPIRASI</h2>
            <p>Sampaikan aspirasi Anda secara rinci dan jujur.</p>
        </div>

        <form action="proses_aspirasi.php" method="POST">
            <div class="form-grid">
                
                <div class="input-group">
                    <label>ID Aspirasi</label>
                    <input type="text" value="ASP-<?php echo date('YmdHis'); ?>" readonly class="readonly-input">
                    <small>*Otomatis oleh sistem</small>
                </div>

                <div class="input-group">
                    <label for="nisn">NISN</label>
                    <input type="text" 
                        id="nisn" 
                        name="nisn" 
                        placeholder="Masukkan NISN Anda" 
                        value="<?php echo isset($_SESSION['nisn']) ? $_SESSION['nisn'] : ''; ?>" required>
                </div>

                <div class="input-group">
                    <label for="id_kategori">Kategori Aspirasi</label>
                    <select name="id_kategori" id="id_kategori" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="1">Fasilitas Sekolah</option>
                        <option value="2">Fasilitas Lab</option>
                        <option value="4">Keamanan Sekolah</option>
                        <option value="5">Kebersihan & Lingkungan</option>
                        <option value="6">Kegiatan Sekolah</option>
                        <option value="7">Pelayanan Sekolah</option>
                        <option value="8">Saran & Ide Baru</option>
                        <option value="9">Kesehatan & Kesejahteraan Siswa</option>
                        <option value="11">Teknologi & Sistem Sekolah</option>
                    </select>
                </div>

                <div class="input-group">
                    <label for="lokasi">Lokasi Kejadian</label>
                    <input type="text" name="lokasi" id="lokasi" placeholder="Contoh: Kantin, Lab Komputer" required>
                </div>

                <div class="input-group full-width">
                    <label for="deskripsi">Deskripsi Aspirasi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="5" placeholder="Jelaskan detail aspirasi Anda..." required></textarea>
                </div>

                <div class="input-group">
                    <label>Tanggal Input</label>
                    <input type="text" value="<?php echo date('d-m-Y'); ?>" readonly class="readonly-input">
                </div>

                <div class="input-group">
                    <label>Status</label>
                    <input type="text" value="Menunggu Verifikasi" readonly class="status-readonly">
                    <small>*Hanya dapat diubah oleh Admin</small>
                </div>

            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Kirim Aspirasi</button>
                <a href="beranda_siswa.php" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>

</body>
</html>