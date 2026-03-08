<?php
include 'koneksi.php';

// 1. Ambil ID dari link (?id=...)
$id = $_GET['id']; 

// 2. Cari ke database (PASTIKAN nama tabel 'aspirasi' dan kolom 'id_aspirasi' benar)
$query = mysqli_query($koneksi, "SELECT * FROM aspirasi WHERE id_aspirasi = '$id'");
$data = mysqli_fetch_array($query);

// 3. Jika data tidak ditemukan, beri peringatan
if (!$data) {
    die("Error: Data aspirasi dengan ID $id tidak ditemukan di database.");
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
<link rel="icon" type="image/ico" href="img/logo.png">
    <meta charset="UTF-8">
    <title>Beri Tanggapan </title>
    <style>
        body { font-family: sans-serif; background: #f4f4f4; padding: 40px; }
        .container { max-width: 600px; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { color: #A31D1D; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        .laporan-siswa { background: #fff9db; padding: 15px; border-radius: 5px; margin-bottom: 20px; font-style: italic; }
        textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; resize: vertical; }
        .btn-kirim { background: #A31D1D; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; margin-top: 10px; }
        .btn-kirim:hover { background: #333; }
    </style>
</head>
<body>

<div class="container">
    <h2>BERI TANGGAPAN</h2>
    <p><strong>Laporan dari Siswa (ID: <?php echo $id; ?>):</strong></p>
    <div class="laporan-siswa">
        "<?php echo $data['deskripsi']; ?>"
    </div>

    <form action="proses_tanggapan.php" method="POST">
        <input type="hidden" name="id_aspirasi" value="<?php echo $id; ?>">
        
        <input type="hidden" name="id_admin" value="1"> 

        <label for="pesan">Tanggapan Admin:</label><br><br>
        <textarea name="pesan" id="pesan" rows="6" placeholder="Tulis tanggapan atau solusi di sini..." required></textarea>
        
        <br>
        <label for="status">Update Status:</label>
        <select name="status">
            <option value="PROSES">PROSES</option>
            <option value="SELESAI">SELESAI</option>
        </select>

        <br><br>
        <button type="submit" class="btn-kirim">Kirim Tanggapan</button>
        <a href="data_pengaduan.php" style="margin-left:10px; color:#666;">Batal</a>
    </form>
</div>

</body>
</html>