<?php
session_start();
include "koneksi/koneksi.php";

// Get the top-up amount from the form
$amount = $_POST['amount'];
$id = $_SESSION['id'];

// Check if the form is submitted with the 'payment' file
if (isset($_FILES['payment'])) {
    // Debugging: Print the $_FILES array
    echo "<pre>";
    print_r($_FILES['payment']);
    echo "</pre>";

    // File handling
    $payment_tmp_name = $_FILES['payment']['tmp_name'];
    $payment_image = file_get_contents($payment_tmp_name);

    // Check if file_get_contents succeeded
    if ($payment_image === false) {
        echo "Error reading the payment file.";
        exit; // Stop execution
    }

    $payment_image = mysqli_real_escape_string($conn, $payment_image);

    // Insert the top-up request into the database as pending
    $sql = "INSERT INTO transaksi (user_id, amount, topup_status, payment) VALUES ($id, $amount, 'pending', '$payment_image')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Top-up request submitted successfully. It will be processed after admin approval.')</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: 'payment' key not set in \$_FILES.";
}

$conn->close();
?>
