<?php
include '../conect.php';

// Ambil data kelas dari database
$query = "SELECT * FROM classes";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boxing Academy - Classes</title>
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
                <h2>Classes</h2>
                <button class="add-button">
                    <a href="clases-entry.php">Tambah Kelas</a>
                </button>
                <table>
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Class Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><img src="../uploads/<?= htmlspecialchars($row['image']); ?>" alt="<?= htmlspecialchars($row['class_name']); ?>"></td>
                                <td><?= htmlspecialchars($row['class_name']); ?></td>
                                <td><?= number_format($row['price'], 0, ',', '.'); ?></td>
                                <td>
                                    <a href="edit-clases.php?id=<?= $row['id']; ?>" class="edit-button">Edit</a>
                                    <a href="hapus-clases.php?id=<?= $row['id']; ?>" class="delete-button" onclick="return confirm('Are you sure?')">Hapus</a>
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
