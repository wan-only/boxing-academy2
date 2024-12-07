<?php
include '../conect.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $query = "SELECT * FROM categories WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Data tidak ditemukan!'); window.location.href = 'categories.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location.href = 'categories.php';</script>";
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_name = $_POST['category_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $photo = $_FILES['photo']['name'];

  
    if ($photo) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($photo);
        move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);
        $photoUpdate = ", photo = '$photo'";
    } else {
        $photoUpdate = ""; 
    }

 
    $updateQuery = "UPDATE categories SET category_name = '$category_name', description = '$description', price = '$price' $photoUpdate WHERE id = $id";

    if (mysqli_query($koneksi, $updateQuery)) {
        
        header('Location: categories.php');
        exit;
    } else {
        echo "<script>alert('Gagal mengupdate data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boxing Academy - Edit Category</title>
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
                <h2>Edit Category</h2>
                <form action="editcategories.php?id=<?= $row['id']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" name="category_name" id="category_name" value="<?= $row['category_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="4" required><?= $row['description']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" value="<?= $row['price']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="photo">Category Photo (Optional)</label>
                        <input type="file" name="photo" id="photo">
                        <img src="../uploads/<?= $row['photo']; ?>" alt="Category Photo" style="width: 150px; height: auto; border-radius: 10px; margin-top: 10px;">
                    </div>
                    <button type="submit" class="submit-button">Update</button>
                </form>
            </section>
        </div>
    </div>
</body>
</html>
