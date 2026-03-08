<?php
// Menghubungkan ke database
include 'koneksi.php';

// Cek apakah tombol submit sudah diklik
if (isset($_POST['submit'])) {
    
    // Ambil data dari form (nama_kategori berasal dari atribut 'name' di input form)
    $nama_kategori = $_POST['ket_kategori'];

    // Query untuk memasukkan data. 
    // Kita tidak memasukkan id_kategori karena sudah AUTO_INCREMENT di database.
    $query = mysqli_query($koneksi, "INSERT INTO kategori (ket_kategori) VALUES ('$nama_kategori')");

    if ($query) {
        // Jika berhasil, munculkan pesan dan kembali ke halaman data kategori
        echo "<script>
                alert('Kategori Berhasil Ditambahkan!');
                window.location='data_kategori.php';
              </script>";
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
} else {
    // Jika file diakses langsung tanpa klik tombol, arahkan kembali
    header("location:data_kategori.php");
}
?>