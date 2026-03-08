<!DOCTYPE html>
<html lang="id">
<head>
<link rel="icon" type="image/ico" href="img/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="login_admin.css">
</head>
<body>

    <div class="login-admin-box">
        <div class="admin-icon">
            <span class="icon">👤</span>
        </div>
        
        <h2>LOGIN ADMIN</h2>
        <p>Silahkan masuk ke panel administrasi</p>

        <form action="proses_login_admin.php" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan Username Admin" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
            </div>

            <button type="submit" class="btn-login-admin">LOGIN SEKARANG</button>
            
            <div class="admin-footer">
                <a href="index.php">← Kembali ke Halaman Utama</a>
            </div>
        </form>
    </div>

</body>
</html>