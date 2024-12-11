<?php
include '../conect.php';

// Ambil ID kelas yang akan diedit
$id = $_GET['id'];

// Ambil data kelas berdasarkan ID
$query = "SELECT * FROM classes WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$class = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data yang diinput
    $class_name = $_POST['class_name'];
    $price = $_POST['price'];

    // Cek apakah gambar baru diupload
    if ($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($image);
        
        // Pindahkan gambar yang diupload
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

        // Hapus gambar lama jika ada
        if (!empty($class['image']) && file_exists("../uploads/{$class['image']}")) {
            unlink("../uploads/{$class['image']}");
        }
    } else {
        // Jika tidak ada gambar baru, gunakan gambar lama
        $image = $class['image'];
    }

    // Update data kelas
    $query = "UPDATE classes SET class_name = '$class_name', price = '$price', image = '$image' WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location.href = 'clases-admin.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Class - Boxing Academy</title>
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
                <li><a href="clases-admin.php">Classes</a></li>
                <li><a href="../categories/categories.php">Categories</a></li>
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
                <h2>Edit Class</h2>
                <form action="edit-clases.php?id=<?= $class['id']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="class_name">Class Name</label>
                        <input type="text" name="class_name" id="class_name" value="<?= htmlspecialchars($class['class_name']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" value="<?= htmlspecialchars($class['price']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Current Photo</label>
                        <p>
                            <?php if (!empty($class['image']) && file_exists("../uploads/{$class['image']}")): ?>
                                <img src="../uploads/<?= htmlspecialchars($class['image']); ?>" alt="<?= htmlspecialchars($class['class_name']); ?>" width="100">
                            <?php else: ?>
                                <span>No image available</span>
                            <?php endif; ?>
                        </p>
                        <label for="image">New Photo (Optional)</label>
                        <input type="file" name="image" id="image">
                    </div>

                    <button type="submit" class="submit-button">Update</button>
                </form>
            </section>
        </div>
    </div>
</body>
</html>
