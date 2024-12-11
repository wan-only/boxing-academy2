<?php
include '../conect.php';

// Pastikan id diambil dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan id
    $query = "DELETE FROM classes WHERE id = $id";
    
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Kelas berhasil dihapus!'); window.location.href = 'clases-admin.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus kelas!'); window.location.href = 'clases-admin.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location.href = 'clases-admin.php';</script>";
}
?>
