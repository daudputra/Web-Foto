<?php
    $database = "dbWebFoto";
    $server = "localhost";
    $user = "root";
    $password = "";

    $conn = mysqli_connect($server, $user, $password, $database);

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    if (!$conn) {
        die("Koneksi Gagal : " . mysqli_connect_error());
    }else{
    //    echo "<script>alert('Connected')</script>";
    }
    return $conn;
?>