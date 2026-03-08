<!DOCTYPE html>
<html lang="id">
<head>
<link rel="icon" type="image/ico" href="img/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Siswa</title>
    <link rel="stylesheet" href="daftar_siswa.css">
</head>
<body>

    <div class="register-container">
        <div class="register-header">
            <h2>REGISTRASI SISWA</h2>
            <p>Lengkapi data diri untuk membuat akun baru</p>
        </div>

        <form action="proses_register_siswa.php" method="POST" class="register-form">
            <div class="input-group">
                <label for="nisn">NISN</label>
                <input type="text" id="nisn" name="nisn" placeholder="Masukkan 10 digit NISN" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Buat password unik" required>
            </div>

            <div class="input-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Sesuai nama di rapot" required>
            </div>

            <div class="input-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="" disabled selected>- Pilih Jenis Kelamin -</option>
                    <option value="Laki - Laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="input-group">
                <label for="nomor_telp">Nomor Telepon</label>
                <input type="nomor_telp" id="nomor_telp" name="nomor_telp" placeholder="Contoh: 0812xxxxxxxx" required>
            </div>

            <button type="submit" class="btn-register">Daftar Sekarang</button>
            
            <div class="form-footer">
                <p>Sudah punya akun? <a href="login_siswa.php">Login di sini</a></p>
                <a href="index.php" class="link-back">← Kembali ke Beranda</a>
            </div>
        </form>
    </div>

</body>
</html>