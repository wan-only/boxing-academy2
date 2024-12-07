<?php
include 'conect.php';
$query = "SELECT * FROM jadwal_kelas ORDER BY FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'), jam_mulai ASC";
$result = mysqli_query($conn, $query);
?>

<table border="1">
    <tr>
        <th>Hari</th>
        <th>Jam</th>
        <th>Nama Kelas</th>
        <th>Pelatih</th>
        <th>Kuota</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['hari']; ?></td>
        <td><?= date('H:i', strtotime($row['jam_mulai'])) . " - " . date('H:i', strtotime($row['jam_selesai'])); ?></td>
        <td><?= $row['nama_kelas']; ?></td>
        <td><?= $row['nama_pelatih']; ?></td>
        <td><?= $row['kuota_terisi'] . "/" . $row['kuota_maksimum']; ?></td>
    </tr>
    <?php } ?>
</table>