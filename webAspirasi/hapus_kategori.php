<?php
// 1. Hubungkan ke database
include 'koneksi.php';

// 2. Ambil ID kategori dari URL
// Kita menggunakan $_GET karena ID dikirim melalui link (hapus_kategori.php?id=...)
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // 3. Jalankan query hapus
    $query = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori = '$id'");

    // 4. Cek apakah penghapusan berhasil
    if ($query) {
        echo "<script>
                alert('Kategori berhasil dihapus!');
                window.location='data_kategori.php';
              </script>";
    } else {
        // Jika gagal (misal karena id sedang digunakan di tabel lain)
        echo "<script>
                alert('Gagal menghapus kategori: " . mysqli_error($koneksi) . "');
                window.location='data_kategori.php';
              </script>";
    }
} else {
    // Jika mencoba akses file ini tanpa mengirim ID di URL
    header("location:data_kategori.php");
}
?>