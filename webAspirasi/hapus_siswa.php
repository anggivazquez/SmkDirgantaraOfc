<?php
include 'koneksi.php';
session_start();

// Proteksi halaman: Hanya admin yang boleh menghapus
if($_SESSION['status'] != "login_admin"){
    header("location:login_admin.php?pesan=belum_login");
    exit();
}

// Mengambil NISN dari URL
if (isset($_GET['nisn'])) {
    $nisn = $_GET['nisn'];

    // 1. Hapus dulu semua aspirasi milik siswa ini agar tidak error Foreign Key
    // Langkah ini penting jika tabel aspirasi terhubung ke NISN
    mysqli_query($koneksi, "DELETE FROM aspirasi WHERE nisn = '$nisn'");

    // 2. Baru hapus data siswanya dari tabel siswa
    $query_hapus_siswa = mysqli_query($koneksi, "DELETE FROM siswa WHERE nisn = '$nisn'");

    if ($query_hapus_siswa) {
        echo "<script>
                alert('Data siswa dan semua riwayat aspirasinya berhasil dihapus!');
                window.location='data_siswa.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data: " . mysqli_error($koneksi) . "');
                window.location='data_siswa.php';
              </script>";
    }
} else {
    // Jika tidak ada NISN yang dikirim, kembalikan ke halaman data siswa
    header("location:data_siswa.php");
}
?>