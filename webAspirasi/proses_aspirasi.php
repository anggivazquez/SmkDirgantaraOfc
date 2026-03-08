<?php
include 'koneksi.php';

// Ambil data dari form aspirasi
$id_aspirasi      = $_POST['id_aspirasi'];
$nisn             = $_POST['nisn'];
$kategori_aspirasi = $_POST['id_kategori'];
$lokasi_kejadian   = $_POST['lokasi'];
$deskripsi        = $_POST['deskripsi'];
$tanggal_input     = date("Y-m-d H:i:s"); // Mengambil waktu saat ini
$status           = "Pending"; // Status awal aspirasi

// Validasi sederhana agar data tidak kosong
if (empty($nisn) || empty($deskripsi)) {
    echo "<script>alert('NISN dan Deskripsi tidak boleh kosong!'); window.history.back();</script>";
    exit;
}

// Query untuk memasukkan data ke tabel aspirasi
// Pastikan nama kolom di database Anda (id_aspirasi, nisn, dll) sesuai
$query = "INSERT INTO aspirasi (id_aspirasi, nisn, id_kategori, lokasi, deskripsi, tanggal_input, status) 
          VALUES ('$id_aspirasi', '$nisn', '$kategori_aspirasi', '$lokasi_kejadian', '$deskripsi', '$tanggal_input', '$status')";

$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "<script>alert('Aspirasi berhasil dikirim! Terima kasih.'); window.location='riwayat_aspirasi.php';</script>";
} else {
    echo "Gagal mengirim aspirasi: " . mysqli_error($koneksi);
}
?>