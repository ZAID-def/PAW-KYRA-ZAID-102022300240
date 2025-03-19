<?php
include 'connect.php';

// Cek Apakah ada data yang dikirim
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    if (!is_numeric($id)) {
        echo "<script>alert('ID tidak valid!'); window.location.href = 'katalog_buku.php';</script>";
        exit;
    }

    // Definisikan query untuk menghapus data
    $query = "DELETE FROM buku WHERE id = $id";

    // Jalankan query
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        header("location: katalog_buku.php");
    } else {
        echo "<script>alert('Data gagal dihapus');</script>";
    }
}
?>