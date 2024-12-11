<?php
include '../conect.php';  // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $user_name = mysqli_real_escape_string($koneksi, $_POST['user_name']);
    $transaction_date = mysqli_real_escape_string($koneksi, $_POST['transaction_date']);
    $class_id = mysqli_real_escape_string($koneksi, $_POST['class_id']);
    $price = mysqli_real_escape_string($koneksi, $_POST['price']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);
    $created_at = mysqli_real_escape_string($koneksi, $_POST['created_at']);

    // Query untuk menyimpan data transaksi
    $query = "INSERT INTO transaction (user_name, transaction_date, class_id, price, status, created_at) 
              VALUES ('$user_name', '$transaction_date', '$class_id', '$price', '$status', '$created_at')";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Redirect atau beri notifikasi setelah berhasil
        echo "<script>alert('Transaction confirmed successfully!'); window.location.href = '../classes.php';</script>";
    } else {
        // Tampilkan pesan error jika query gagal
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>
