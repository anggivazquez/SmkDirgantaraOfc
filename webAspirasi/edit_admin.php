<?php
include 'koneksi.php';
session_start();

// Proteksi halaman: pastikan hanya admin yang bisa akses
if($_SESSION['status'] != "login_admin"){
    header("location:login_admin.php?pesan=belum_login");
    exit();
}

// Ambil ID dari URL (?id=...)
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin = '$id'");
$data = mysqli_fetch_array($query);

// Cek jika data tidak ditemukan
if (!$data) {
    echo "<script>alert('Data admin tidak ditemukan!'); window.location='data_admin.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Akun Admin - SIPSIS</title>
    <link rel="stylesheet" href="edit_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <div class="edit-wrapper">
        <div class="edit-card">
            <div class="edit-header">
                <i class="fas fa-user-shield"></i>
                <h2>Edit Akun Admin</h2>
                <p>Silakan perbarui username atau password di bawah ini.</p>
            </div>

            <form action="proses_update_admin.php" method="POST">
                <input type="hidden" name="id_admin" value="<?php echo $data['id_admin']; ?>">

                <div class="form-group">
                    <label><i class="fas fa-user"></i> Username</label>
                    <input type="text" name="username" value="<?php echo $data['username']; ?>" required autocomplete="off">
                </div>

                <div class="form-group">
                    <label><i class="fas fa-lock"></i> Password Baru</label>
                    <input type="text" name="password" value="<?php echo $data['password']; ?>" required>
                    <small>*Ubah teks di atas untuk mengganti password.</small>
                </div>

                <div class="form-actions">
                    <a href="data_admin.php" class="btn-secondary">Batal</a>
                    <button type="submit" name="update" class="btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>