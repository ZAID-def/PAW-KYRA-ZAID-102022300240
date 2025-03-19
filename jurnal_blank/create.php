<?php
include 'connect.php';

if (isset($_POST['create'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $penulis = mysqli_real_escape_string($conn, $_POST['penulis']);
    $tahun_terbit = mysqli_real_escape_string($conn, $_POST['tahun_terbit']);

    // Validasi input tidak boleh kosong
    if (empty($judul) || empty($penulis) || empty($tahun_terbit)) {
        echo "<script>alert('Semua field harus diisi!');</script>";
    } else {
        // Definisikan query untuk insert data
        $query = "INSERT INTO buku (judul, penulis, tahun_terbit) VALUES ('$judul', '$penulis', '$tahun_terbit')";
        mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn) > 0) {
            header("Location: katalog_buku.php");
            exit;
        } else {
            echo "<script>alert('Data gagal ditambahkan');</script>";
        }
    }
}
?>
