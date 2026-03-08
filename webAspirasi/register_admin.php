<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin - SIPSIS</title>
    <link rel="stylesheet" href="register_admin.css">
</head>
<body>

    <div class="register-container">
        <div class="register-card">
            <div class="register-header">
                <h2>Tambah Admin Baru</h2>
                <p>Silakan lengkapi data di bawah untuk mendaftarkan petugas baru.</p>
            </div>
            
            <form action="proses_register_admin.php" method="POST">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan username..." required>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password..." required>
                </div>

                <div class="input-group">
                    <label for="confirm_password">Konfirmasi Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Ulangi password..." required>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn-register">Daftarkan Petugas</button>
                    <a href="data_admin.php" class="btn-cancel">Batal / Kembali</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>