<?php 
include 'koneksi.php'; // Pastikan file koneksi sudah dibuat
?>
<!DOCTYPE html>
<html lang="id">
<head>
<link rel="icon" type="image/ico" href="img/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengaduan Masuk</title>
    <link rel="stylesheet" href="data_pengaduan.css">
</head>
<body>

    <div class="admin-container">
        <header class="table-header">
            <div class="title-section">
                <h2>PENGADUAN MASUK</h2>
                <p>Daftar aspirasi siswa yang perlu ditinjau dan ditanggapi.</p>
            </div>
            <a href="beranda_admin.php" class="btn-back">Kembali ke Dashboard</a>
        </header>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID ASPIRASI</th>
                        <th>NISN</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Query mengambil data aspirasi
                    $query = "SELECT * FROM aspirasi ORDER BY tanggal_input DESC";
                    $result = mysqli_query($koneksi, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Penentuan warna badge status
                            $status_class = "";
                            if($row['status'] == 'Menunggu') $status_class = 'st-pending';
                            else if($row['status'] == 'Proses') $status_class = 'st-process';
                            else $status_class = 'st-done';

                            echo "<tr>";
                            echo "<td>" . $row['id_aspirasi'] . "</td>";
                            echo "<td>" . $row['nisn'] . "</td>";
                            echo "<td>" . $row['id_kategori'] . "</td>";
                            echo "<td>" . $row['lokasi'] . "</td>";
                            echo "<td class='text-truncate'>" . $row['deskripsi'] . "</td>";
                            echo "<td>" . date('d/m/Y', strtotime($row['tanggal_input'])) . "</td>";
                            echo "<td><span class='status-badge $status_class'>" . $row['status'] . "</span></td>";
                            echo "<td>
                                    <a href='beri_tanggapan.php?id=" . $row['id_aspirasi'] . "' class='btn-tanggapi'>Tanggapi</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9' class='text-center'>Belum ada data aspirasi masuk.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>