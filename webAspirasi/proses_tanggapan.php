<?php
include 'koneksi.php';

// Ambil data dari form
$id_aspirasi = $_POST['id_aspirasi'];
$id_admin    = $_POST['id_admin']; // Pastikan ID Admin ini ada di tabel admin
$pesan       = $_POST['pesan'];
$status      = $_POST['status'];
$tanggal     = date('Y-m-d H:i:s');

// VALIDASI: Jangan lanjut jika ID Aspirasi kosong
if (empty($id_aspirasi)) {
    die("Error: ID Aspirasi tidak ditemukan. Silakan kembali ke halaman pengaduan.");
}

// 1. Simpan ke tabel feedback (Sesuaikan nama kolom dengan Screenshot 202)
$query_feedback = "INSERT INTO feedback (id_aspirasi, id_admin, pesan, tanggal_feedback) 
                   VALUES ('$id_aspirasi', '$id_admin', '$pesan', '$tanggal')";

$save = mysqli_query($koneksi, $query_feedback);

if ($save) {
    // 2. Update status di tabel aspirasi jika simpan feedback berhasil
    mysqli_query($koneksi, "UPDATE aspirasi SET status = '$status' WHERE id_aspirasi = '$id_aspirasi'");
    
    echo "<script>alert('Tanggapan berhasil dikirim!'); window.location='data_tanggapan.php';</script>";
} else {
    // Jika masih error, tampilkan pesan errornya
    echo "Gagal menyimpan: " . mysqli_error($koneksi);
}
?>