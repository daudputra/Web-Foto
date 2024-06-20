<?php
include "koneksi/koneksi.php";
session_start();

// error_reporting(E_ALL);
error_reporting(0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$query = "SELECT id, kredit from users WHERE username = '{$_SESSION['username']}'";
$result = mysqli_query($conn, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $kredit = $row['kredit'];
} else {
    echo "error";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="bg-white shadow-md">
        <div class="container flex items-center justify-between px-2 py-4 mx-auto">
            <!-- Logo -->
            <div class="text-2xl font-semibold text-gray-800">
                <a href="../WebFoto/">Logo</a>
            </div>


            <!-- Hamburger Icon -->
            <div class="flex items-center justify-end md:hidden">
                <a href="topup.php" class="text-sm font-bold text-gray-600 cursor-pointer hover:text-black"><?php echo $kredit; ?><i class="mx-1 fa fa-credit-card"></i></a>
                <a href="account.php">
                    <button id="" class="text-gray-600 hover:text-gray-800">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-2 3h4a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                        </svg>
                    </button>
                </a>

                <button id="toggleMobileMenu" class="text-gray-600 hover:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>

            </div>

            <!-- Navigation Menu (hidden on mobile) -->
            <nav class="hidden space-x-4 md:flex">
                <a href="../Web-Foto" class="text-gray-600 hover:text-gray-800">Home</a>
                <a href="explore.php" class="text-gray-600 hover:text-gray-800">Explore</a>
                <a href="dashboard.php" class="text-gray-600 hover:text-gray-800">Dashboard</a>
                <!-- <a href="#" class="text-gray-600 hover:text-gray-800">Discover</a> -->
                <!-- <a href="#" class="text-gray-600 hover:text-gray-800">Photos</a> -->
            </nav>

            <!-- Sign In / Sign Up Button (hidden on mobile) -->
            <div class="hidden space-x-4 md:flex">

                <?php if (!isset($_SESSION['username'])) : ?>
                    <a href="login.php" class="px-4 py-2 font-bold text-gray-600 hover:text-gray-800">Sign In</a>
                    <a href="login.php" class="px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700">Sign Up</a>
                <?php else : ?>
                    <a href="topup.php" class="text-sm text-gray-600 hover:text-black font-bold cursor-pointer mt-1.5"><?php echo $kredit; ?><i class="ml-1 fa fa-credit-card"></i></a>
                    <a href="account.php">
                        <button id="" class="text-gray-600 hover:text-gray-800">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-2 3h4a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                            </svg>
                        </button>
                    </a>
                    <!-- dropdown menu  -->
                    <i id="dropdownIcon" class="fa fa-angle-down items-center mt-1.5 cursor-pointer" style="color: #000000;"></i>
                    <div id="dropdownMenu" class="absolute flex flex-col hidden px-5 py-3 pl-6 mt-10 bg-white border rounded">
                        <a href="account.php" class="mb-2">Profile</a>
                        <!-- <a href="#" class="mb-2">Favourite</a> -->
                        <a href="proses/logout.php" class="">Logout</a>
                        <!-- Tambahkan tautan dropdown lainnya sesuai kebutuhan -->
                    </div>

                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="hidden md:hidden" id="mobileMenu">
        <!-- Mobile Menu (displayed when hamburger icon is clicked) -->
        <div class="bg-white shadow-md">
            <div class="container px-2 py-4 mx-auto">
                <nav class="flex flex-col space-y-4">
                    <a href="../WebFoto/" class="text-gray-600 hover:text-gray-800">Home</a>
                    <a href="explore.php" class="text-gray-600 hover:text-gray-800">Explore</a>
                    <a href="dashboard.php" class="text-gray-600 hover:text-gray-800">Dashboard</a>
                    <a href="#" class="text-gray-600 hover:text-gray-800">Discover</a>
                    <a href="#" class="text-gray-600 hover:text-gray-800">Photos</a>
                </nav>
                <div class="justify-center pt-4">
                    <?php if (!isset($_SESSION['username'])) : ?>
                        <a href="login.php" class="py-2 font-bold text-gray-600 hover:text-gray-800">Sign In</a>
                        <a href="login.php" class="px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700">Sign Up</a>
                    <?php else : ?>
                        <a href="account.php" class="text-gray-600 hover:text-gray-800">View Profile</a>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        // hamburger icon 
        const toggleMobileMenuButton = document.getElementById('toggleMobileMenu');
        const mobileMenu = document.getElementById('mobileMenu');

        toggleMobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // dropdown menu 
        // dropdown menu profile
        $(document).ready(function() {
            // Tambahkan baris ini untuk menggunakan jQuery
            var dropdownIcon = $("#dropdownIcon");
            var dropdownMenu = $("#dropdownMenu");

            dropdownIcon.on("click", function(event) {
                event.stopPropagation(); // Stop the event from propagating upwards
                dropdownMenu.toggleClass("hidden");
            });

            // hide dropdown when clicking outside of it
            $(document).on("click", function(event) {
                if (!dropdownIcon.is(event.target) && !dropdownMenu.has(event.target).length) {
                    dropdownMenu.addClass("hidden");
                }
            });
        });
    </script>

</body>

</html>