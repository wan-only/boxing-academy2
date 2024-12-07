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
                <li><a href="#">Classes</a></li>
                <li><a href="../categories/categories.php">Categories</a></li>
                <li><a href="transaction.php">Transaction</a></li>
                <li><a href="/index.php">Log out</a></li>
            </ul>
        </aside>
        <div class="main-content">
            <header>
                <button class="menu-toggle">&#9776;</button>
                <span class="admin-title">Boxing Academy Admin</span>
            </header>
            <section class="dashboard-content">
                <h2>Transaction</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>02-06-2024</td>
                            <td>Johan suranto</td>
                            <td>boxing gloves</td>
                            <td>450,000</td>
                            <td><span class="status success">Success</span></td>
                            <td><button class="detail-button">Detail</button></td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</body>
</html>
