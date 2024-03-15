<?php
include "../koneksi/koneksi.php";

error_reporting(0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['beli'])) {
    // Start the session
    session_start();

    // Fetch user credit from the database
    $username = $_SESSION['username'];

    $postId = $_POST['id'];

    // Fetch image details (harga and imageData) from the database
    $getImageDetailsSql = "SELECT harga, image_path, stock FROM posts WHERE id = $postId";
    $imageDetailsResult = mysqli_query($conn, $getImageDetailsSql);

    if ($imageDetailsResult && mysqli_num_rows($imageDetailsResult) > 0) {
        $imageDetails = mysqli_fetch_assoc($imageDetailsResult);

        // Extract details
        $hargaGambar = $imageDetails['harga'];
        $imageData = $imageDetails['image_path'];

        // Fetch user credit from the database
        $getUserCreditSql = "SELECT kredit FROM users WHERE username = '$username'";
        $userCreditResult = mysqli_query($conn, $getUserCreditSql);

        if ($userCreditResult && mysqli_num_rows($userCreditResult) > 0) {
            $userData = mysqli_fetch_assoc($userCreditResult);
            $kreditPengguna = $userData['kredit'];

            // Cek apakah kredit mencukupi
            if ($kreditPengguna >= $hargaGambar) {
                $stockGambar = $imageDetails['stock'];

                if ($stockGambar > 0) {
                    // Kurangi kredit
                    $kreditBaru = $kreditPengguna - $hargaGambar;
                    $updateKreditSql = "UPDATE users SET kredit = $kreditBaru WHERE username = '$username'";
                    mysqli_query($conn, $updateKreditSql);

                    // fungsi untuk mengurangi stock 
                    $stockBaru = $stockGambar - 1;
                    $updateStock = "UPDATE posts set stock = $stockBaru WHERE id = $postId";
                    mysqli_query($conn, $updateStock);

                    // Simpan gambar ke folder tertentu (gantilah path dengan yang sesuai)
                    // $lokasiSimpan = "path/to/folder"; // Sesuaikan dengan lokasi yang sesuai
                    // file_put_contents($lokasiSimpan . "/$postId.jpg", $imageData);

                    echo "<script>alert('Pembelian berhasil.');</script>";
                } else {
                    echo "<script>alert('Stok gambar telah habis. Pembelian Gagal!');</script>";
                }
            } else {
                echo "<script>alert('Pembelian Gagal! Kredit tidak mencukupi.');</script>";
            }
        } else {
            // Handle the error or redirect appropriately
            echo "Error fetching user credit.";
        }

        // Redirect setelah melakukan proses pembelian
        echo "<script>window.location.href = '../detail.php?id=$postId';</script>";
        exit();
    } else {
        echo "Error fetching image details.";
    }
}
?>
