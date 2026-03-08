<?php
// Memulai session
session_start();

// Menghapus semua data session yang tersimpan
session_unset();

// Menghancurkan session secara keseluruhan
session_destroy();

// Memberikan notifikasi dan mengarahkan kembali ke halaman login
echo "<script>
        alert('Anda telah berhasil keluar dari sistem.');
        window.location='login_siswa.php'; 
      </script>";
exit;
?>