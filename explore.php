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

        <div class="text-center container-no-padding">
            <div class="flex mb-4 overflow-x-auto overflow-container">
                <a href="search.php?search=Horse">
                <span class="inline-block px-4 py-2 mx-2 text-lg font-semibold text-gray-700 bg-gray-300 rounded-full">Horse</span>
                </a>
                <a href="search.php?search=Mustang">
                <span class="inline-block px-4 py-2 mx-2 text-lg font-semibold text-gray-700 bg-gray-300 rounded-full">Mustang</span>
                </a>
                <a href="search.php?search=Ramen">
                <span class="inline-block px-4 py-2 mx-2 text-lg font-semibold text-gray-700 bg-gray-300 rounded-full">Ramen</span>
                </a>
                <span class="inline-block px-4 py-2 mx-2 text-lg font-semibold text-gray-700 bg-gray-300 rounded-full">Horse</span>
                <span class="inline-block px-4 py-2 mx-2 text-lg font-semibold text-gray-700 bg-gray-300 rounded-full">Green</span>
                <span class="inline-block px-4 py-2 mx-2 text-lg font-semibold text-gray-700 bg-gray-300 rounded-full">Rose</span>
                <span class="inline-block px-4 py-2 mx-2 text-lg font-semibold text-gray-700 bg-gray-300 rounded-full">Tiger</span>
                <span class="inline-block px-4 py-2 mx-2 text-lg font-semibold text-gray-700 bg-gray-300 rounded-full">Cow</span>
                <span class="inline-block px-4 py-2 mx-2 text-lg font-semibold text-gray-700 bg-gray-300 rounded-full">Monkey</span>
                <span class="inline-block px-4 py-2 mx-2 text-lg font-semibold text-gray-700 bg-gray-300 rounded-full">Bear</span>
                <span class="inline-block px-4 py-2 mx-2 text-lg font-semibold text-gray-700 bg-gray-300 rounded-full">Snake</span>
                <span class="inline-block px-4 py-2 mx-2 text-lg font-semibold text-gray-700 bg-gray-300 rounded-full">Audi</span>
                <span class="inline-block px-4 py-2 mx-2 text-lg font-semibold text-gray-700 bg-gray-300 rounded-full">Porsche</span>
                <span class="inline-block px-4 py-2 mx-2 text-lg font-semibold text-gray-700 bg-gray-300 rounded-full">Meatball</span>
                <span class="inline-block px-4 py-2 mx-2 text-lg font-semibold text-gray-700 bg-gray-300 rounded-full">Kode</span>
                <span class="inline-block px-4 py-2 mx-2 text-lg font-semibold text-gray-700 bg-gray-300 rounded-full">Kode</span>
                <span class="inline-block px-4 py-2 mx-2 text-lg font-semibold text-gray-700 bg-gray-300 rounded-full">Kode</span>
                <span class="inline-block px-4 py-2 mx-2 text-lg font-semibold text-gray-700 bg-gray-300 rounded-full">Kode</span>
            </div>
            <div class="scroll-btn left">&lt;</div>
            <div class="scroll-btn right">&gt;</div>
        </div>

    <!-- Galeri Gambar -->
    <div class="container p-4 mx-auto">
    <h1 class="mb-6 text-4xl font-bold text-center">Category</h1>
    <div class="grid grid-cols-2 gap-3 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
            <!-- Gambar 1 -->
            <a href="search.php?search=Animal" class="relative">
                <img src="img/cat2.jpg" alt="Gambar 1" class="object-cover w-full rounded-md cursor-pointer max-h-48 hover-scale">
                <span class="image-text">Animal</span>
            </a>

            <!-- Gambar 2 -->
            <a href="search.php?search=Food" class="relative">
                <img src="img/ramen.jpg" alt="Gambar 2" class="object-cover w-full rounded-md cursor-default max-h-48 hover-scale">
                <span class="image-text">Foods</span>
            </a>

            <!-- Gambar 3 -->
            <a href="search.php?search=Nature" class="relative">
                <img src="img/flower3.jpg" alt="Gambar 3" class="object-cover w-full rounded-md cursor-default max-h-48 hover-scale">
                <span class="image-text">Nature</span>
            </a>

            <!-- Gambar 4 -->
            <a href="search.php?search=sport" class="relative">
                <img src="img/sports.jpg" alt="Gambar 4" class="object-cover w-full rounded-md cursor-default max-h-48 hover-scale">
                <span class="image-text ">Sport</span>
            </a>

            <!-- Gambar 5 -->
            <a href="search.php?search=explore" class="relative">
                <img src="img/nature1.jpg" alt="Gambar 5" class="object-cover w-full rounded-md cursor-default max-h-48 hover-scale">
                <span class="image-text">Explore</span>
            </a>

            <!-- Gambar 6 -->
            <a href="search.php?search=desain" class="relative">
                <img src="img/logo1.jpg" alt="Gambar 6" class="object-cover w-full rounded-md cursor-default max-h-48 hover-scale">
                <span class="image-text">Desain</span>
            </a>
            
            <a href="search.php?search=vechile" class="relative">
                <img src="img/car2.jpg" alt="Gambar 7" class="object-cover w-full rounded-md cursor-default max-h-48 hover-scale">
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
