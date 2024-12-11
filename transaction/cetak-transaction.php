<?php
require_once '../dompdf/autoload.inc.php'; // Pastikan path ke DOMPDF benar

use Dompdf\Dompdf;
use Dompdf\Options;

include '../conect.php'; // Koneksi ke database

// Ambil data transaksi dari database
$query = "SELECT t.*, c.class_name 
          FROM transaction t
          JOIN classes c ON t.class_id = c.id";
$result = mysqli_query($koneksi, $query);

// Menyiapkan HTML untuk PDF
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 8px 12px; border: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Transaction Report</h2>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Kategori Kelas</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>';

while ($row = mysqli_fetch_assoc($result)) {
    $html .= '
            <tr>
                <td>' . htmlspecialchars($row['transaction_date']) . '</td>
                <td>' . htmlspecialchars($row['user_name']) . '</td>
                <td>' . htmlspecialchars($row['class_name']) . '</td>
                <td>' . number_format($row['price'], 0, ',', '.') . '</td>
                <td>' . ucfirst($row['status']) . '</td>
            </tr>';
}

$html .= '
        </tbody>
    </table>
</body>
</html>';

$options = new Options();
$options->set("isHtml5ParserEnabled", true);
$options->set("isPhpEnabled", true);

// Inisialisasi DOMPDF
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("transaction_report.pdf", array("Attachment" => 0));
?>
