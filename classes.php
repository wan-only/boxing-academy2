<?php
include 'conect.php';  // Koneksi ke database

// Ambil data kelas dari database
$query = "SELECT * FROM classes";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/clases.css"> <!-- Link ke CSS yang sudah dipisah -->
    <title>Boxing Academy - Classes</title>
</head>
<body>
    <h2>Classes Available</h2>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Class Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <!-- Menampilkan gambar kelas -->
                    <td><img src="uploads/<?= htmlspecialchars($row['image']); ?>" alt="<?= htmlspecialchars($row['class_name']); ?>" width="100"></td>
                    <td><?= htmlspecialchars($row['class_name']); ?></td>
                    <td><?= number_format($row['price'], 0, ',', '.'); ?></td>
                    <td>
                        <button onclick="openPaymentForm(<?= $row['id']; ?>, '<?= htmlspecialchars($row['class_name']); ?>', <?= $row['price']; ?>)">Pay</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Modal Form for Payment Confirmation -->
    <div id="paymentModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closePaymentForm()">&times;</span>
            <h3>Confirm Payment</h3>
            <form id="paymentForm" method="POST" action="transaction/process-transaction.php">
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="class_id" id="class_id">
                <input type="hidden" name="price" id="price">
                <input type="hidden" name="status" id="status" value="pending">
                <input type="hidden" name="created_at" id="created_at" value="<?= date('Y-m-d H:i:s'); ?>">

                <label for="user_name">Your Name:</label>
                <input type="text" id="user_name" name="user_name" required>

                <label for="transaction_date">Transaction Date:</label>
                <input type="date" id="transaction_date" name="transaction_date" required>

                <button type="submit">Confirm Payment</button>
            </form>
        </div>
    </div>

    <script>
        // Function to open the payment form modal
        function openPaymentForm(classId, className, price) {
            document.getElementById('class_id').value = classId;
            document.getElementById('price').value = price;
            document.getElementById('paymentModal').style.display = "block";
        }

        // Function to close the payment form modal
        function closePaymentForm() {
            document.getElementById('paymentModal').style.display = "none";
        }

        // Close the modal if the user clicks outside the modal content
        window.onclick = function(event) {
            if (event.target == document.getElementById('paymentModal')) {
                closePaymentForm();
            }
        }
    </script>
</body>
</html>
