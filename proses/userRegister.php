<?php
require "../koneksi/koneksi.php";
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$full_name = $_POST['full_name'];
$default_kredit = 0;

// Pemeriksaan apakah username sudah ada
$check_query = "SELECT username FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($result) > 0) {
    // username sudah ada dalam database, tampilkan pesan kesalahan
    echo 
    "<script>
        alert('username sudah digunakan. Pendaftaran Gagal.') 
        window.location.href = '../login.php';
    </script>";
    exit; // Keluar dari skrip
}

// Jika username belum ada, lakukan pendaftaran
$query_sql = "INSERT INTO users (full_name, username, email, password, kredit) VALUES ('$full_name','$username','$email','$password', '$default_kredit')";

if (mysqli_query($conn, $query_sql)) {
    // Pendaftaran berhasil, set session untuk username
    session_start();
    $_SESSION['username'] = $username;
    header("Location: ../index.php");
    exit;
} else {
    // echo "Pendaftaran Gagal: " . mysqli_error($conn);
    echo 
    "<script>
        alert('Pendaftaran Gagal') 
        window.location.href = '../login.php';
    </script>";
}

?>

