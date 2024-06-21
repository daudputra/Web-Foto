<?php
include "koneksi/koneksi.php";
include 'header.php';



error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore More Image</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Gaya tambahan */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 16px;
        }

        .grid-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 16px;
            background-color: #fff;
        }

        .grid-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Mempertahankan aspek rasio dan memotong gambar jika perlu */
        }

        .grid-item a {
            display: block;
            width: 100%;
            height: 100%;
            text-decoration: none;
            /* Menghilangkan garis bawah pada tautan */
        }

        .grid-item:nth-child(odd) {
            grid-row: span 1;
            /* jika ingin ukuran gambar acak gunakan span 2 */
        }

        .grid-item:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;

        }
    </style>
</head>

<body>
    <!-- <header>
        <div class="logo">Explore More Image</div>
    </header> -->

<form class="mt-8 mb-8" action="search.php" method="GET">
<div class="container px-4 py-4 mx-auto mt-5 bg-none">
                    <form action="search.php" method="get">
                    <div class="w-full mx-auto md:w-1/2">
                        <div class="relative">
                            <input type="text" name="search" class="w-full py-2 pl-10 pr-4 border border-gray-400 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Cari foto...">
                            <div class="absolute top-0 left-0 flex items-center h-full pl-4">
                                <svg class="text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20" height="20">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a8 8 0 018 8m-2 0a4 4 0 014-4m-10 2a2 2 0 002 2m-2 0a2 2 0 002-2m7 10l5 5M7 7l-5 5" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>

    <main>
        <div class="grid">
            <?php
            // Query untuk mengambil data gambar blob dari database
            $sql = "SELECT id, image_path FROM posts ORDER BY id DESC ";
            $result = $conn->query($sql);

            // Menampilkan gambar-gambar dari blob ke elemen HTML
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Konversi blob menjadi data gambar
                    $imageData = $row["image_path"];
                    $imageType = finfo_buffer(finfo_open(), $imageData, FILEINFO_MIME_TYPE);
                    $base64Image = base64_encode($imageData);
                    $imageSrc = "data:$imageType;base64,$base64Image";

                    // Tampilkan gambar di halaman dengan tautan ke halaman detail
                    echo
                    '<div class="grid-item">
                        <a href="detail.php?id=' . $row["id"] . '" style="cursor: default;">
                            <img src="' . $imageSrc . '" alt="Post">
                        </a>
                    </div>';
                }
            } else {
                echo "Tidak ada gambar yang ditemukan.";
            }

            // Menutup koneksi database
            $conn->close();
            ?>
        </div>
    </main>
</body>

</html>