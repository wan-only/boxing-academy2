<?php
session_start();
include 'conect.php'; // Pastikan koneksi database sudah benar

// Cek apakah form sudah dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $first_name = $_POST['fName'];
    $last_name = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Validasi input
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'register.php';
            </script>
        ";
        exit;
    }

    // Hash password untuk keamanan
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Query untuk memasukkan data ke database
    $sql = "INSERT INTO users (first_name, last_name, email, password) 
            VALUES ('$first_name', '$last_name', '$email', '$hashed_password')";

    // Eksekusi query dan cek apakah berhasil
    if (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Registrasi Berhasil, Silahkan Login');
                window.location = 'login.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan Saat Registrasi');
                window.location = 'register.php';
            </script>
        ";
    }
} else {
    // Jika request bukan POST, redirect ke halaman register
    header('Location: register.php');
    exit;
}
?>
