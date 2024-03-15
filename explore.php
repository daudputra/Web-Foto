<?php
include "header.php";
// include "../koneksi/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <!-- Tambahkan tautan ke file CSS Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <style>
                /* Efek Hover */
                .hover-scale {
            transition: transform 0.3s ease-in-out;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }
        /* Teks di dalam Gambar */
        .image-text {
            position: absolute;
            bottom: 10px;
            left: 10px;
            /* background-color: rgba(0, 0, 0, 0.5); */
            color: white;
            padding: 5px 10px;
            /* border-radius: 5px; */
            font-size: 20px;
        }

        .container-no-padding {
            padding-left: 0;
            padding-right: 0;
        }

        .overflow-container {
            overflow-x: auto;
            overflow-y: hidden;
            white-space: nowrap;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .overflow-container::-webkit-scrollbar {
            display: none;
        }

        .scroll-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.8);
            padding: 8px;
            cursor: pointer;
            border-radius: 4px;
            display: none;
        }

        .scroll-btn.left {
            left: 0;
        }

        .scroll-btn.right {
            right: 0;
        }

        .container-no-padding {
            position: relative;
        }
    </style>

</head>
<body class="bg-gray-100">


<form class="mb-8 mt-8" action="search.php" method="GET">
<div class="container mx-auto bg-none py-4 px-4 mt-5">
                    <form action="search.php" method="get">
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

        <div class="container-no-padding text-center">
            <div class="flex overflow-x-auto mb-4 overflow-container">
                <a href="search.php?search=Horse">
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Horse</span>
                </a>
                <a href="search.php?search=Mustang">
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Mustang</span>
                </a>
                <a href="search.php?search=Ramen">
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Ramen</span>
                </a>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Horse</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Green</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Rose</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Tiger</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Cow</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Monkey</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Bear</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Snake</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Audi</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Porsche</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Meatball</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Kode</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Kode</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Kode</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Kode</span>
            </div>
            <div class="scroll-btn left">&lt;</div>
            <div class="scroll-btn right">&gt;</div>
        </div>

    <!-- Galeri Gambar -->
    <div class="container mx-auto p-4">
    <h1 class="text-4xl font-bold mb-6 text-center">Category</h1>
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3">
            <!-- Gambar 1 -->
            <a href="search.php?search=Animal" class="relative">
                <img src="img/cat2.jpg" alt="Gambar 1" class="w-full max-h-48 object-cover rounded-md cursor-pointer hover-scale">
                <span class="image-text">Animal</span>
            </a>

            <!-- Gambar 2 -->
            <a href="search.php?search=Food" class="relative">
                <img src="img/ramen.jpg" alt="Gambar 2" class="w-full max-h-48 object-cover rounded-md cursor-default hover-scale">
                <span class="image-text">Foods</span>
            </a>

            <!-- Gambar 3 -->
            <a href="search.php?search=Nature" class="relative">
                <img src="img/flower3.jpg" alt="Gambar 3" class="w-full max-h-48 object-cover rounded-md cursor-default hover-scale">
                <span class="image-text">Nature</span>
            </a>

            <!-- Gambar 4 -->
            <a href="search.php?search=sport" class="relative">
                <img src="img/sports.jpg" alt="Gambar 4" class="w-full max-h-48 object-cover rounded-md cursor-default hover-scale">
                <span class="image-text ">Sport</span>
            </a>

            <!-- Gambar 5 -->
            <a href="Explore" class="relative">
                <img src="img/nature1.jpg" alt="Gambar 5" class="w-full max-h-48 object-cover rounded-md cursor-default hover-scale">
                <span class="image-text">Explore</span>
            </a>

            <!-- Gambar 6 -->
            <a href="search.php?search=desain" class="relative">
                <img src="../WebFoto/img/logo1.jpg" alt="Gambar 6" class="w-full max-h-48 object-cover rounded-md cursor-default hover-scale">
                <span class="image-text">Desain</span>
            </a>
            
            <a href="search.php?search=vechile" class="relative">
                <img src="../WebFoto/img/car2.jpg" alt="Gambar 6" class="w-full max-h-48 object-cover rounded-md cursor-default hover-scale">
                <span class="image-text">Vehicle</span>
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.overflow-container');
            const scrollLeftBtn = document.querySelector('.scroll-btn.left');
            const scrollRightBtn = document.querySelector('.scroll-btn.right');

            scrollLeftBtn.addEventListener('click', function() {
                container.scrollBy({
                    left: -100,
                    behavior: 'smooth'
                });
            });

            scrollRightBtn.addEventListener('click', function() {
                container.scrollBy({
                    left: 100,
                    behavior: 'smooth'
                });
            });

            container.addEventListener('scroll', function() {
                scrollLeftBtn.style.display = container.scrollLeft > 0 ? 'block' : 'none';
                scrollRightBtn.style.display = container.scrollLeft < container.scrollWidth - container.clientWidth ? 'block' : 'none';
            });
        });
    </script>

</body>
</html>
