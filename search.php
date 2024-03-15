<?php
// Include file koneksi ke database
include "koneksi/koneksi.php";
include "header.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Inisialisasi variabel pencarian
$pencarian = "";

// Cek apakah form pencarian telah dikirimkan
if (isset($_GET['search'])) {
    // Sanitasi inputan pengguna
    $pencarian = mysqli_real_escape_string($conn, $_GET['search']);

    // Kueri pencarian ke database
    $query = "SELECT id, title, tags FROM posts WHERE title LIKE '%$pencarian%' OR tags LIKE '%$pencarian%' OR id LIKE '%$pencarian%' OR kategori LIKE '%$pencarian%'";
    $result = mysqli_query($conn, $query);
} else {
    // Jika form tidak dikirimkan, tampilkan pesan pencarian kosong
    echo "Silakan masukkan kata kunci pencarian.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <style>
    /* Gaya tambahan untuk tampilan hasil pencarian */
    .search-results {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 16px;
        margin-top: 16px;
    }

    .search-item {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    .search-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .search-item a {
        display: block;
        width: 100%;
        height: 100%;
        text-decoration: none;
    }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <!-- <form class="mb-8 mt-8" method="GET">
            <div class="flex items-center justify-center">
                <input type="text" name="search" placeholder="Cari foto..." class="max-w-screen-sm p-2 border border-gray-300 rounded-l-full focus:outline-none">
                <button type="submit" class="bg-blue-500 hover-bg-blue-700 text-white font-bold py-2 px-4 rounded-r-full">Cari</button>
            </div>
        </form> -->
        <form class="mb-8 mt-8" method="GET">
<div class="container mx-auto bg-none py-4 px-4 mt-5">
                    <form method="get">
                    <div class="w-full md:w-1/2 mx-auto">
                        <div class="relative">
                            <input type="text" name="search" class="w-full pl-10 pr-4 py-2 rounded-full border border-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Cari foto...">
                            <div class="absolute top-0 left-0 flex items-center h-full pl-4">
                                <svg class="text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" height="20">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a8 8 0 018 8m-2 0a4 4 0 014-4m-10 2a2 2 0 002 2m-2 0a2 2 0 002-2m7 10l5 5M7 7l-5 5" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
        <h1 class="text-2xl font-semibold mb-4">Search result: <span class="italic"><?php echo $pencarian ?></span></h1>

        <!-- Tampilkan hasil pencarian di sini -->
        <?php
if (isset($_GET['search'])) {
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    } elseif (mysqli_num_rows($result) > 0) {
        // Check if there is only one result
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $redirectURL = "detail.php?id=" . $row["id"];
            echo '<script>window.location = "' . $redirectURL . '";</script>';
            exit();
        
        
        } else {
                    echo '<div class="search-results">';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="search-item">';
                        echo '<a href="detail.php?id=' . $row["id"] . '" style="cursor: default;">';
                        
                        // Tambahkan gambar ke dalam hasil pencarian
                        $sqlImage = "SELECT image_path FROM posts WHERE id = " . $row['id'];
                        $resultImage = $conn->query($sqlImage);
                        
                        if ($resultImage->num_rows > 0) {
                            $imageData = $resultImage->fetch_assoc()["image_path"];
                            $imageType = finfo_buffer(finfo_open(), $imageData, FILEINFO_MIME_TYPE);
                            $base64Image = base64_encode($imageData);
                            $imageSrc = "data:$imageType;base64,$base64Image";
                            echo '<img src="' . $imageSrc . '" alt="Post">';
                        }
                        
                        echo '</a>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
            } else {
                echo "Tidak ditemukan hasil pencarian untuk kata kunci: '$pencarian'";
            }
        }
        ?>
    </div>
</body>
</html>

