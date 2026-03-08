<?php
include 'koneksi.php';

// Mengambil ID terakhir untuk menampilkan estimasi ID otomatis berikutnya
$query_auto = mysqli_query($koneksi, "SELECT MAX(id_kategori) AS last_id FROM kategori");
$data_auto  = mysqli_fetch_array($query_auto);
$next_id    = $data_auto['last_id'] + 1;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori Aspirasi</title>
    <link rel="stylesheet" href="tambah_kategori.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<div class="form-container">
    <div class="form-header">
        <h2><i class="fas fa-plus-circle"></i> Tambah Kategori Baru</h2>
        <p>Silakan isi keterangan kategori di bawah ini.</p>
    </div>

    <form action="simpan_kategori.php" method="POST">
        <div class="input-group">
            <label>ID Kategori (Otomatis)</label>
            <input type="text" value="<?php echo $next_id; ?>" readonly class="input-readonly">
            <small>*ID ini dihasilkan otomatis oleh sistem</small>
        </div>

        <div class="input-group">
            <label>Keterangan Kategori</label>
            <input type="text" name="ket_kategori" placeholder="Contoh: Sarana Prasarana" required autocomplete="off">
        </div>

        <div class="button-group">
            <a href="data_kategori.php" class="btn-cancel">Batal</a>
            <button type="submit" name="submit" class="btn-submit">
                <i class="fas fa-save"></i> Simpan Kategori
            </button>
        </div>
    </form>
</div>

</body>
</html>