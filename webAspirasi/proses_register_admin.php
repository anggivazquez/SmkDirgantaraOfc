<?php
include 'koneksi.php';

$user = $_POST['username'];
$pass = $_POST['password'];
$conf = $_POST['confirm_password'];

// 1. Cek apakah password cocok
if ($pass !== $conf) {
    echo "<script>alert('Password tidak cocok!'); window.history.back();</script>";
    exit;
}

// 2. CEK APAKAH USERNAME SUDAH ADA DI DATABASE
// Bagian ini penting agar tidak ada username ganda (seperti egiluyy yang muncul berkali-kali)
$cek_user = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$user'");
if (mysqli_num_rows($cek_user) > 0) {
    echo "<script>alert('Gagal daftar! Akun sudah ada, gunakan username lain.'); window.history.back();</script>";
    exit;
}

// 3. INSERT KE DATABASE (Tanpa password_hash)
// Menggunakan variabel $pass langsung agar tersimpan sebagai teks biasa
$query = "INSERT INTO admin (username, password) VALUES ('$user', '$pass')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "<script>alert('Admin berhasil terdaftar!'); window.location='beranda_admin.php';</script>";
} else {
    echo "Gagal mendaftar: " . mysqli_error($koneksi);
}
?>