<?php
include "../../koneksi/koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus baris terkait di tabel transaksi
    $sqlDeleteTransaksi = "DELETE FROM transaksi WHERE user_id = $id";
    $conn->query($sqlDeleteTransaksi);

    // Hapus pengguna
    $sqlDeleteUser = "DELETE FROM users WHERE id = $id";

    if ($conn->query($sqlDeleteUser) === TRUE) {
        header("Location: ../viewUser.php");
    } else {
        echo "Error: " . $sqlDeleteUser . "</br>" . $conn->error;
    }
}


$conn->close();
?>