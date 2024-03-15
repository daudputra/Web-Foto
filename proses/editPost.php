<?php
include "../koneksi/koneksi.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
    $stock = mysqli_real_escape_string($conn, $_POST['stock']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $query = "UPDATE posts SET title='$title', harga='$harga', stock='$stock', description='$description' WHERE user_id = '{$_SESSION['id']}'";

    if (mysqli_query($conn, $query)) {
        // Post updated successfully, redirect to a confirmation page or wherever needed
        // header("Location: ../detail.php?id=".$imageId);
        header("Location: ../account.php");
        exit();
    } else {
        // Handle the database error
        echo "Error updating post: " . mysqli_error($conn);
    }
}
?>
