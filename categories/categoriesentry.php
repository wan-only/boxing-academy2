<?php
include '../conect.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $category_name = $_POST['category_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

   
    $photo = $_FILES['photo']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($photo);
    move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);

    $query = "INSERT INTO categories (category_name, description, price, photo) VALUES ('$category_name', '$description', '$price', '$photo')";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href = 'categories.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boxing Academy - Add Category</title>
        <link rel="stylesheet" href="categories.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <h2>Boxing Academy</h2>
            </div>
            <ul>
                <li><a href="../admin.php">Dashboard</a></li>
                <li><a href="#">Classes</a></li>
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
                <h2>Tambah Kategori</h2>
                <form action="categoriesentry.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" name="category_name" id="category_name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" required>
                    </div>
                    <div class="form-group">
                        <label for="photo">Category Photo</label>
                        <input type="file" name="photo" id="photo" required>
                    </div>
                    <button type="submit" class="submit-button">Simpan</button>
                </form>
            </section>
        </div>
    </div>
</body>
</html>
