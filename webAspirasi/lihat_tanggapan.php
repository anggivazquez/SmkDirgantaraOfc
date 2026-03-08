<?php
include 'koneksi.php';

// Ambil ID dari URL. Gunakan nama 'id' sesuai dengan link di atas
$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id != '') {
    // Perhatikan nama kolom 'tanggapan' (sesuai pengecekan sebelumnya)
    $query = mysqli_query($koneksi, "SELECT aspirasi.*, feedback.pesan, feedback.tanggal_feedback, admin.username 
                                     FROM aspirasi 
                                     JOIN feedback ON aspirasi.id_aspirasi = feedback.id_aspirasi
                                     JOIN admin ON feedback.id_admin = admin.id_admin
                                     WHERE aspirasi.id_aspirasi = '$id'");
    $data = mysqli_fetch_array($query);
}

// Jika data tidak ditemukan, beri peringatan agar tidak error null
if (!$data) {
    echo "<script>alert('Tanggapan belum tersedia atau data tidak ditemukan'); window.location='riwayat_aspirasi.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<link rel="icon" type="image/ico" href="img/logo.png">
    <meta charset="UTF-8">
    <title>Lihat Tanggapan </title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; padding: 50px; }
        .card { background: white; width: 100%; max-width: 600px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); overflow: hidden; }
        .card-header { background: #34495e; color: white; padding: 20px; text-align: center; }
        .card-body { padding: 30px; }
        .section-title { color: #7f8c8d; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px; }
        .content-box { background: #f9f9f9; padding: 15px; border-radius: 8px; border-left: 5px solid #3498db; margin-bottom: 25px; }
        .tanggapan-box { background: #ebf5fb; padding: 15px; border-radius: 8px; border-left: 5px solid #2ecc71; }
        .meta-info { font-size: 11px; color: #95a5a6; margin-top: 10px; display: block; }
        .btn-back { display: inline-block; margin-top: 20px; padding: 10px 20px; background: #e74c3c; color: white; text-decoration: none; border-radius: 5px; transition: 0.3s; }
        .btn-back:hover { background: #c0392b; }
    </style>
</head>
<body>

<div class="card">
    <div class="card-header">
        <h2 style="margin:0;">Detail Aspirasi</h2>
    </div>
    <div class="card-body">
        <div class="section-title">Laporan Anda:</div>
        <div class="content-box">
            <p style="margin:0; color: #2c3e50; line-height: 1.6;"><?php echo $data['deskripsi']; ?></p>
        </div>

        <div class="section-title">Tanggapan Admin:</div>
        <div class="tanggapan-box">
            <p style="margin:0; color: #27ae60; font-weight: 500;">
                <?php echo $data['pesan'] ? $data['pesan'] : "<em>Belum ada tanggapan resmi.</em>"; ?>
            </p>
            <?php if($data['username']) { ?>
                <span class="meta-info">
                    Dibalas oleh: <strong><?php echo $data['username']; ?></strong> pada <?php echo date('d M Y, H:i', strtotime($data['tanggal_feedback'])); ?>
                </span>
            <?php } ?>
        </div>

        <div style="text-align: center;">
            <a href="riwayat_aspirasi.php" class="btn-back">Kembali ke Riwayat</a>
        </div>
    </div>
</div>

</body>
</html>