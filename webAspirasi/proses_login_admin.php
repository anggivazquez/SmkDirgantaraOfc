<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Mengambil data admin berdasarkan username
$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username'");
$data  = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) > 0) {
    
    // Periksa apakah password benar
    if ($password == $data['password']) {
        
        // --- TARUH KODE SESSION DI SINI ---
        session_start();
        $_SESSION['status'] = "login_admin";
        $_SESSION['id_admin'] = $data['id_admin'];
        
        // Baris ini yang akan mengirimkan nama ke halaman beranda
        $_SESSION['username'] = $data['username']; 
        
        header("location:beranda_admin.php");
        exit();
        // ----------------------------------

    } else {
        echo "<script>alert('Password salah!'); window.location='login_admin.php';</script>";
    }
} else {
    echo "<script>alert('Username tidak ditemukan!'); window.location='login_admin.php';</script>";
}
?>