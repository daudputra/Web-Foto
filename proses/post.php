<?php
session_start();
include '../koneksi/koneksi.php';
echo "Error: " . $stmt->error;
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Mengambil data dari form
$title = $_POST['title'];
$description = $_POST['description'];
$harga = $_POST['harga'];
$user_id = $_SESSION['id'];
$tags = $_POST['tags'];
$stock = $_POST['stock'];
$kategori = $_POST['kategori'];

// Mengambil data gambar
$image_name = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];
$imageData = file_get_contents($image_tmp);

// Memindahkan gambar ke direktori tujuan
$upload_directory = '/home/yuu/.wine/dosdevices/z:/opt/lampp/htdocs/WebFoto/Data/img/';
$uploaded_image_path = $upload_directory . '/' . $image_name;
move_uploaded_file($image_tmp, $uploaded_image_path);


// Mengecek ukuran file gambar sebelum diunggah
$maxFileSize = 10 * 1024 * 1024; // Contoh: Batasan ukuran 10 MB
if ($_FILES['image']['size'] > $maxFileSize) {
    echo "Ukuran gambar terlalu besar. Maksimum 10 MB.";
} else {
    // Menyimpan data ke dalam tabel database menggunakan prepared statement
$stmt = $conn->prepare("INSERT INTO posts (title, description, harga, user_id, tags, image_path, stock, kategori) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
echo "Error : ".$tmt->error;
$stmt->bind_param("ssdissis", $title, $description, $harga, $user_id, $tags, $imageData, $stock, $kategori);

    
if ($stmt->execute()) {
    header("Location: ../account.php");
} else {
    echo "Error: " . $stmt->error;
}
}


$stmt->close();
$conn->close();
?>