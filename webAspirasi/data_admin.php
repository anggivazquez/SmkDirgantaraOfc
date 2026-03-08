<?php 
session_start();
include 'koneksi.php'; 

// Cek login admin (opsional tapi disarankan)
if($_SESSION['status'] != "login_admin"){
    header("location:login.php?pesan=belum_login");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" type="image/ico" href="img/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Admin - SIPSIS</title>
    <link rel="stylesheet" href="data_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="content-area">
        <div class="header-section">
            <h1><i class="fas fa-user-shield"></i> Akun Admin</h1>
            <div class="action-buttons">
                <a href="beranda_admin.php" class="btn-back-dashboard">
                    <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
        </div>

        <div class="card-table">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Admin</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Status</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM admin ORDER BY id_admin ASC");
                    
                    if (mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><strong>#ADM-<?php echo $row['id_admin']; ?></strong></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><code><?php echo $row['password']; ?></code></td>
                        <td><span class="badge">Aktif</span></td>
                        <td style="text-align: center;">
                            <a href="edit_admin.php?id=<?php echo $row['id_admin']; ?>" class="btn-edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="hapus_admin.php?id=<?php echo $row['id_admin']; ?>" class="btn-delete" onclick="return confirm('Hapus akun admin ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php 
                        } 
                    } else {
                        echo "<tr><td colspan='6' style='text-align:center;'>Tidak ada data admin.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>