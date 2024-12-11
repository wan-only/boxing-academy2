<?php
include '../conect.php'; 


$query = "SELECT * FROM categories";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boxing Academy - Categories</title>
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
                <h2>Categories</h2>
                <button class="add-button">
                    <a href="categoriesentry.php">Tambah Data</a>
                </button>
                <table>
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Categories</th>
                            <th>Description</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><img src="../uploads/<?= htmlspecialchars($row['photo']); ?>" alt="<?= htmlspecialchars($row['category_name']); ?>"></td>
                                <td><?= htmlspecialchars($row['category_name']); ?></td>
                                <td><?= htmlspecialchars($row['description']); ?></td>
                                <td><?= number_format($row['price'], 0, ',', '.'); ?></td>
                                <td>
                                    <a href="editcategories.php?id=<?= $row['id']; ?>" class="edit-button">Edit</a>
                                    <a href="hapuscategories.php?id=<?= $row['id']; ?>" class="delete-button" onclick="return confirm('Are you sure?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</body>
</html>
