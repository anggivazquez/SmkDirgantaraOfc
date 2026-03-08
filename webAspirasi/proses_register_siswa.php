<?php
include 'koneksi.php';

// 1. Mengambil data dari form registrasi
$nisn          = mysqli_real_escape_string($koneksi, $_POST['nisn']);
$password      = $_POST['password'];
$nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
$jenis_kelamin = $_POST['jenis_kelamin'];
$nomor_telp = $_POST['nomor_telp'];

// 2. Validasi: Pastikan tidak ada data yang kosong
if (empty($nisn) || empty($password) || empty($nama)) {
    echo "<script>alert('Mohon lengkapi semua data!'); window.history.back();</script>";
    exit;
}

// 3. Cek apakah NISN sudah terdaftar di database
$cek_nisn = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn = '$nisn'");
if (mysqli_num_rows($cek_nisn) > 0) {
    echo "<script>alert('Gagal daftar! NISN sudah terdaftar, silakan login.'); window.location='login_siswa.php';</script>";
    exit;
}

// 4. Proses Simpan ke Tabel Siswa
// Sesuaikan nama kolom (nisn, password, nama_siswa, jk, telp) dengan tabel database Anda
$query = "INSERT INTO siswa (nisn, password, nama, jenis_kelamin, nomor_telp) 
          VALUES ('$nisn', '$password', '$nama', '$jenis_kelamin', '$nomor_telp')";

$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "<script>alert('Pendaftaran Berhasil! Silakan Login.'); window.location='login_siswa.php';</script>";
} else {
    echo "Gagal mendaftar: " . mysqli_error($koneksi);
}
?>