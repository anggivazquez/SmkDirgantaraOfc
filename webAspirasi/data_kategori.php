<?php
include 'koneksi.php';
// Query untuk mengambil semua data kategori
$query = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori DESC");
?>

<!DOCTYPE html>
<html lang="id">
<link rel="icon" type="image/ico" href="img/logo.png">
<head>
    <meta charset="UTF-8">
    <title>Data Kategori Aspirasi</title>
    <link rel="stylesheet" href="data_kategori.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<div class="container">
    <div class="header-action">
        <h2><i class="fas fa-folder-plus"></i> Pengelolaan Kategori</h2>
        <div class="button-group">
            <a href="beranda_admin.php" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
            </a>
            <a href="tambah_kategori.php" class="btn-add">
                <i class="fas fa-plus-circle"></i> Tambah Kategori
            </a>
        </div>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th width="10%">ID Kategori</th>
                    <th>Keterangan Kategori</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td class="text-center"><?php echo $row['id_kategori']; ?></td>
                    <td><?php echo $row['ket_kategori']; ?></td>
                    <td class="text-center">
                        <a href="hapus_kategori.php?id=<?php echo $row['id_kategori']; ?>" 
                           class="btn-delete" 
                           onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                           <i class="fas fa-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>