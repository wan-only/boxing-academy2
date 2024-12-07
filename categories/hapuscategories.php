<?php
include '../conect.php'; 


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $query = "DELETE FROM categories WHERE id = $id";

    if (mysqli_query($koneksi, $query)) {
        
        header('Location: categories.php');
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
