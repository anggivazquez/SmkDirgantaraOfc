<?php 
include 'koneksi.php'; 
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
    <title>Data Siswa - SIPSIS</title>
    <link rel="stylesheet" href="data_siswa.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <div class="container">
        <header class="header-content">
            <div class="title">
                <h2>DATABASE SISWA</h2>
                <p>Daftar seluruh akun siswa yang terdaftar dalam sistem.</p>
            </div>
            <a href="beranda_admin.php" class="btn-home">Kembali ke Dashboard</a>
        </header>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>Nama Lengkap</th>
                        <th>Password</th>
                        <th>Jenis Kelamin</th>
                        <th>Nomor Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM siswa ORDER BY nama ASC";
                    $result = mysqli_query($koneksi, $query);
                    $no = 1;

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><strong><?php echo $row['nisn']; ?></strong></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><code><?php echo $row['password']; ?></code></td>
                            <td><?php echo $row['jenis_kelamin']; ?></td>
                            <td><?php echo $row['nomor_telp'] ?? '-'; ?></td>
                            <td>
                                <a href="hapus_siswa.php?nisn=<?php echo $row['nisn']; ?>" 
                                   class="btn-delete" 
                                   onclick="return confirm('Yakin ingin menghapus siswa ini? Semua data aspirasi miliknya juga akan berpengaruh.')">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='7' class='empty-row'>Belum ada siswa yang mendaftar.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>