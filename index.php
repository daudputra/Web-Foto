<?php
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .section-image-index {
            height: 30rem;
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

<body class="bg-gray-100 font-sans">
    <!-- Hero Section -->
    <section class="bg-cover bg-center md:h-96 flex items-center section-image-index" style="background-image: url('img/image2.jpg');">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl md:text-4xl lg:text-3xl text-white font-bold leading-tight">Discover and share the world’s best photos</h1>
            <p class="text-base md:text-lg lg:text-xl text-white mt-4">Get inspired with incredible photos from diverse styles and genres around the world.
                <br><span>We're not guided by fads—just great photography</span>.
            </p>

            <?php if (!isset($_SESSION['username'])) : ?>
                <div id="signup-button" class="mt-6">
                    <a href="login.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 md:py-2 md:px-12 rounded-full text-lg md:text-2xl">Sign Up</a>
                </div>
            <?php else : ?>
                <!-- Kolom Pencarian -->
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
            <?php endif; ?>
        </div>
    </section>

    <section class="bg-gray-200 py-10">
        <div class="container-no-padding text-center">
            <h1 class="text-3xl font-semibold">Search by Tags</h1>
            <div class="flex overflow-x-auto mt-4 max-w-full overflow-container">
                <a href="search.php?search=horse">
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Horse</span>
                </a>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Mustang</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Night</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Sky</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Aurora</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">White</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Yellow</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Porsche</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Anime</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Ramen</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Cake</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Black</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Nike</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Audi</span>
                <span class="inline-block bg-gray-300 rounded-full px-4 py-2 text-lg font-semibold text-gray-700 mx-2">Mountain</span>
            </div>
            <div class="scroll-btn left">&lt;</div>
            <div class="scroll-btn right">&gt;</div>
        </div>
    </section>

    <!-- Galeri Foto -->
    <section class="py-10 bg-white-200 mx-1">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-semibold mb-2">Galeri Foto Terbaru</h2>
            <p class="text-gray-600 mb-4">Jelajahi koleksi foto terbaru dari berbagai genre dan gaya di seluruh dunia. Temukan inspirasi dalam keindahan fotografi.</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Item Foto -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden relative">
                        <img src="img/cat2.jpg" alt="Foto 1" class="w-full h-full object-cover">
                        <div class="p-4 opacity-0 transition-opacity duration-300 absolute inset-0 flex flex-col justify-center items-center hover:opacity-100 bg-black bg-opacity-50 hover:bg-opacity-90">
                            <h3 class="text-xl font-semibold text-white">Nama Foto 1</h3>
                            <p class="text-gray-300">Deskripsi Foto 1</p>
                        </div>
                    </div>

                </div>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden relative">
                        <img src="img/cat2.jpg" alt="Foto 1" class="w-full h-full object-cover">
                        <div class="p-4 opacity-0 transition-opacity duration-300 absolute inset-0 flex flex-col justify-center items-center hover:opacity-100 bg-black bg-opacity-50 hover:bg-opacity-90">
                            <h3 class="text-xl font-semibold text-white">Nama Foto 1</h3>
                            <p class="text-gray-300">Deskripsi Foto 1</p>
                        </div>
                    </div>

                </div>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden relative">
                        <img src="img/cat2.jpg" alt="Foto 1" class="w-full h-full object-cover">
                        <div class="p-4 opacity-0 transition-opacity duration-300 absolute inset-0 flex flex-col justify-center items-center hover:opacity-100 bg-black bg-opacity-50 hover:bg-opacity-90">
                            <h3 class="text-xl font-semibold text-white">Nama Foto 1</h3>
                            <p class="text-gray-300">Deskripsi Foto 1</p>
                        </div>
                    </div>

                </div>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden relative">
                        <img src="img/cat2.jpg" alt="Foto 1" class="w-full h-full object-cover">
                        <div class="p-4 opacity-0 transition-opacity duration-300 absolute inset-0 flex flex-col justify-center items-center hover:opacity-100 bg-black bg-opacity-50 hover:bg-opacity-90">
                            <h3 class="text-xl font-semibold text-white">Nama Foto 1</h3>
                            <p class="text-gray-300">Deskripsi Foto 1</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
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