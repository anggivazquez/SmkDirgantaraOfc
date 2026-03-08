<?php
include 'koneksi.php'; // Hubungkan ke database

// 1. Ambil ID dari URL
$id = $_GET['id'];

// 2. Jalankan Query Hapus
$query = mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin = '$id'");

// 3. Cek apakah berhasil
if ($query) {
    echo "<script>alert('Data admin berhasil dihapus!'); window.location='data_admin.php';</script>";
} else {
    echo "Gagal menghapus: " . mysqli_error($koneksi);
}
?>