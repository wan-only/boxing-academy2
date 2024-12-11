<?php
include '../conect.php';  // Koneksi ke database

// Ambil data transaksi dari database
$query = "SELECT t.*, c.class_name 
          FROM transaction t
          JOIN classes c ON t.class_id = c.id";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boxing Academy - Transaction</title>
    <link rel="stylesheet" href="../css/transaction.css">
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
                <li><a href="../categories/categories.php">Categories</a></li>
                <li><a href="transaction.php">Transaction</a></li>
                <li><a href="../index.php">Log out</a></li>
            </ul>
        </aside>
        <div class="main-content">
            <header>
                <button class="menu-toggle">&#9776;</button>
                <span class="admin-title">Boxing Academy Admin</span>
            </header>
            <section class="dashboard-content">
                <h2>Transaction</h2>

                <!-- Tabel Daftar Transaksi -->
                <table>
                    <thead>
                   <!-- Tombol untuk mencetak laporan transaksi -->
                <form action="cetak-transaction.php" method="get">
                    <button type="submit" class="detail-button">Cetak</button>
                </form>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>kategori kelas</th>
                            <th>Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['transaction_date']); ?></td>
                                <td><?= htmlspecialchars($row['user_name']); ?></td>
                                <td><?= htmlspecialchars($row['class_name']); ?></td>
                                <td><?= number_format($row['price'], 0, ',', '.'); ?></td>
                                <td><span class="status <?= $row['status'] == 'success' ? 'success' : 'pending'; ?>"><?= ucfirst($row['status']); ?></span></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</body>
</html>
