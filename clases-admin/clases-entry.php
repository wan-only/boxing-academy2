<?php
include '../conect.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $class_name = $_POST['class_name'];
    $price = $_POST['price'];

    // Menangani file gambar
    $image = $_FILES['image']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($image);

    // Memindahkan file gambar ke folder upload
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // Query untuk memasukkan data kelas ke tabel classes
        $query = "INSERT INTO classes (class_name, image, price) VALUES ('$class_name', '$image', '$price')";
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Data berhasil ditambahkan!'); window.location.href = 'clases-admin.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data!');</script>";
        }
    } else {
        echo "<script>alert('Gagal mengupload gambar!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boxing Academy - Add Class</title>
    <link rel="stylesheet" href="../categories/categories.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <h2>Boxing Academy</h2>
            </div>
            <ul>
                <li><a href="../admin.php">Dashboard</a></li>
                <li><a href="../clases-admin/clases-admin.php">Classes</a></li>
                <li><a href="categories.php">Categories</a></li>
                <li><a href="../transaction/transaction.php">Transaction</a></li>
                <li><a href="../index.php">Log out</a></li>
            </ul>
        </aside>

        <div class="main-content">
            <header>
                <button class="menu-toggle">&#9776;</button>
                <span class="admin-title">Boxing Academy Admin</span>
            </header>

            <section class="dashboard-content">
                <h2>Tambah Kelas</h2>
                <form action="clases-entry.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="class_name">Class Name</label>
                        <input type="text" name="class_name" id="class_name" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Class Image</label>
                        <input type="file" name="image" id="image" required>
                    </div>
                    <button type="submit" class="submit-button">Simpan</button>
                    <button type="button" class="cancel-button" onclick="window.location.href='clases-admin.php'">Batal</button>
                </form>
            </section>
        </div>
    </div>
</body>
</html>
