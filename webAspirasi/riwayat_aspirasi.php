<?php
session_start();
include 'koneksi.php';

// 1. Proteksi Halaman
if($_SESSION['status'] != "login_siswa"){
    header("location:login_siswa.php?pesan=belum_login");
    exit();
}

$nisn_siswa = $_SESSION['nisn'];

// 2. Query Data
$query = mysqli_query($koneksi, "SELECT * FROM aspirasi WHERE nisn = '$nisn_siswa' ORDER BY tanggal_input DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" type="image/ico" href="img/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Aspirasi - SIPSIS</title>
    <link rel="stylesheet" href="riwayat_aspirasi.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <div class="container">
        <header class="header">
            <h2>RIWAYAT ASPIRASI ANDA</h2>
            <p>Daftar aspirasi yang telah Anda sampaikan ke pihak sekolah.</p>
        </header>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID Aspirasi</th>
                        <th>NISN</th>
                        <th>ID Kategori</th>
                        <th>Lokasi</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Input</th>
                        <th>Status</th>
                        <th>Hasil Tanggapan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // POSISI WHILE HARUS DI SINI (Di dalam tbody)
                    while($data = mysqli_fetch_array($query)){ 
                    ?>
                    <tr>
                        <td><?php echo $data['id_aspirasi']; ?></td>
                        <td><?php echo $data['nisn']; ?></td>
                        <td><?php echo $data['id_kategori']; ?></td>
                        <td><?php echo $data['lokasi']; ?></td>
                        <td><?php echo $data['deskripsi']; ?></td>
                        <td><?php echo $data['tanggal_input']; ?></td>
                        <td>
                            <span class="badge-status <?php echo strtolower($data['status']); ?>">
                                <?php echo $data['status']; ?>
                            </span>
                        </td>
                        <td>
                            <?php 
                            // Perbaikan Logika: Cek berdasarkan kolom 'status'
                            if ($data['status'] == 'selesai' || $data['status'] == 'SELESAI') { 
                            ?>
                                <a href="lihat_tanggapan.php?id=<?php echo $data['id_aspirasi']; ?>" class="btn-lihat">
                                    <i class="fas fa-eye"></i> Lihat Hasil
                                </a>
                            <?php } else { ?>
                                <span class="badge-proses">Menunggu...</span>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } // AKHIR DARI WHILE ?>
                </tbody>
            </table>
        </div>

        <div class="footer-action">
            <a href="beranda_siswa.php" class="btn-back"> Kembali ke Beranda</a>
        </div>
    </div>

</body>
</html>           