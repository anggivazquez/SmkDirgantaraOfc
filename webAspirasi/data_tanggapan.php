<?php 
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
<link rel="icon" type="image/ico" href="img/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tanggapan - SIPSIS</title>
    <link rel="stylesheet" href="data_tanggapan.css">
</head>
<body>

    <div class="admin-container">
        <header class="table-header">
            <div class="title-section">
                <h2>DATA TANGGAPAN</h2>
                <p>Daftar aspirasi yang telah ditanggapi oleh petugas.</p>
            </div>
            <a href="beranda_admin.php" class="btn-back">Kembali ke Dashboard</a>
        </header>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID Aspirasi</th>
                        <th>Tgl Aspirasi</th>
                        <th>Nama Siswa</th>
                        <th>Isi Laporan</th>
                        <th>Tanggapan Admin</th>
                        <th>Tgl Tanggapan</th>
                        <th>Petugas</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Query JOIN untuk mengambil data dari tabel aspirasi, tanggapan, dan siswa
                    // Sesuaikan nama kolom dengan database Anda
                    // Sesuaikan query agar memanggil tabel 'feedback' dan 'admin'
                $query = "SELECT aspirasi.*, feedback.pesan, feedback.tanggal_feedback, admin.username 
                             FROM feedback 
                            INNER JOIN aspirasi ON feedback.id_aspirasi = aspirasi.id_aspirasi
                            INNER JOIN admin ON feedback.id_admin = admin.id_admin
                            ORDER BY feedback.tanggal_feedback DESC";
                    
                    $result = mysqli_query($koneksi, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id_aspirasi'] . "</td>";
                            echo "<td>" . date('d/m/y', strtotime($row['tanggal_input'])) . "</td>";
                            echo "<td>" . ($row['nisn'] ?? '-') . "</td>";
                            echo "<td class='truncate'>" . $row['deskripsi'] . "</td>";
                            echo "<td class='text-highlight'>" . $row['pesan'] . "</td>";
                            echo "<td>" . date('d/m/y', strtotime($row['tanggal_feedback'])) . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td><span class='badge-done'>Selesai</span></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>Belum ada tanggapan yang diberikan.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>