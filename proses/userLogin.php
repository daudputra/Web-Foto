<?php
require "../koneksi/koneksi.php";
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$username = $_POST['username'];
$password = $_POST['password'];

$query_sql = "SELECT id, role FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query_sql);

if (mysqli_num_rows($result) > 0) {
    $user_data = mysqli_fetch_assoc($result);
    $user_role = $user_data['role'];

    $_SESSION['id'] = $user_data['id'];
    $_SESSION['username'] = $username;

    if ($user_role === 'admin') {
        header("Location: ../admin/"); 
    } else {
        header("Location: ../index.php");
    }
    exit;
} else {
    echo "<script>
        alert('Username atau Sandi Salah') 
        window.location.href = '../login.php';
    </script>";
}
?>
