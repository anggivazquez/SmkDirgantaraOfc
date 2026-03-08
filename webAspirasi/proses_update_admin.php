<?php
include 'koneksi.php';
session_start();

if (isset($_POST['update'])) {
    $id       = $_POST['id_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query Update
    $query = mysqli_query($koneksi, "UPDATE admin SET username='$username', password='$password' WHERE id_admin='$id'");

    if ($query) {
        echo "<script>
                alert('Data admin berhasil diperbarui!');
                window.location='data_admin.php';
              </script>";
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($koneksi);
    }
} else {
    header("location:data_admin.php");
}
?>