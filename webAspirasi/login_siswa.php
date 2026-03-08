<!DOCTYPE html>
<html lang="id">
<head>
<link rel="icon" type="image/ico" href="img/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa</title>
    <link rel="stylesheet" href="login_siswa.css">
</head>
<body>

    <div class="login-container">
        <div class="login-header">
            <h2>LOGIN SISWA</h2>
            <p>Aspirasi Siswa</p>
        </div>

        <form action="proses_login_siswa.php" method="POST" class="login-form">
            <div class="input-group">
                <label for="nisn">NISN</label>
                <input type="text" id="nisn" name="nisn" placeholder="Masukkan NISN Anda" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
            </div>

            <button type="submit" class="btn-login">Masuk</button>
            
            <div class="form-footer">
                <p>Belum punya akun? <a href="daftar_siswa.php">Daftar di sini</a></p>
                <a href="index.php" class="link-back">← Kembali ke Beranda</a>
            </div>
        </form>
    </div>

</body>
</html>