<?php
include "../koneksi/koneksi.php";
include "header.php";

if (isset($_GET['id'])) {
    $topupId = $_GET['id'];
    $sql = "SELECT * FROM transaksi WHERE id = $topupId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $paymentImage = $row['payment']; 

        // Check if the image data is not empty
        if (!empty($paymentImage)) {
            // Encode the binary data to base64
            $base64Image = base64_encode($paymentImage);

            // Display the image
            echo '<div class="container p-4 mx-auto mt-2">';
            echo '<div class="max-h-screen p-4 overflow-y-auto bg-white rounded-lg shadow-md max-w-screen">';
            echo '<img src="data:image/jpeg;base64,' . $base64Image . '" alt="Payment Image" class="object-cover object-center ">';
            echo '</div>';
            echo '</div>';
        } else {
            echo 'Image data is empty.';
        }
    } else {
        echo 'Transaction not found.';
    }
} else {
    echo 'Invalid request.';
}
?>
