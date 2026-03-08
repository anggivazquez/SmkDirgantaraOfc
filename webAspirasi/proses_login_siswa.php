<?php
session_start();
include 'koneksi.php';

// Ambil data dari form login siswa
// mysqli_real_escape_string digunakan untuk mencegah SQL Injection
$nisn     = mysqli_real_escape_string($koneksi, $_POST['nisn']);
$password = $_POST['password'];

// 1. CARI data siswa berdasarkan NISN di database
// Pastikan nama tabel kamu adalah 'siswa'
$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn = '$nisn'");
$data  = mysqli_fetch_assoc($query);

// 2. Cek apakah NISN ditemukan
if (mysqli_num_rows($query) > 0) {
    
    // 3. Verifikasi Password
    // Menggunakan perbandingan langsung (==) karena kita tidak menggunakan password_hash
    if ($password == $data['password']) {
        
        // Buat Session untuk menandai siswa sudah login
        $_SESSION['status'] = "login_siswa";
        $_SESSION['nisn']   = $data['nisn'];
        $_SESSION['nama']   = $data['nama']; // Opsional, untuk menyapa nama siswa di beranda
        
        // Jika berhasil, arahkan ke beranda siswa
        header("location:beranda_siswa.php");
        exit(); 
        
    } else {
        // Jika password salah
        echo "<script>alert('Password salah!'); window.location='login_siswa.php';</script>";
    }
} else {
    // Jika NISN tidak terdaftar di database
    echo "<script>alert('NISN tidak terdaftar!'); window.location='login_siswa.php';</script>";
}
?>