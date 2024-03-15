<?php
include "../koneksi/koneksi.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-rKiDqDlDOVhVQkWeYmNXk0EGVlJrV4+EvAi+wq4wpAd9Y8g+q44HiCQWdPprH2ZgkprnAtMK1N7fbdREf4OkGg==" crossorigin="anonymous" />

</head>

<body>
    <div class="flex h-screen bg-gray-200">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 p-4">
            <div class="text-white text-2xl font-semibold mb-6">
                
                Admin Panel
            </div>

            <!-- Navigation Links -->
            <nav>

                <a href="index.php" class="block py-2 px-4 text-white hover:bg-gray-700">Dashboard</a>
                <a href="viewUser.php" class="block py-2 px-4 text-white hover:bg-gray-700">Users</a>
                <a href="viewPost.php" class="block py-2 px-4 text-white hover:bg-gray-700">Post</a>
                <a href="viewTransaction.php" class="block py-2 px-4 text-white hover:bg-gray-700">Transaction</a>
                <a href="proses/logout.php" class="block py-2 px-4 text-white hover:bg-gray-700">Logout</a>
                <!-- Add more navigation links as needed -->
            </nav>
        </div>

        <!-- Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <header class="bg-gray-700 p-4">
                <div class="flex justify-between items-center">
                    <!-- Toggle Sidebar Button -->
                    <button id="toggle-sidebar" class="text-white focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>

                    <!-- User Avatar and Dropdown -->
                    <div class="flex items-center">
                    <div class="mr-2 text-white">
                            <?php echo $_SESSION['username'] ?>
                        </div>
                        <img class="h-8 w-8 rounded-full object-cover" src="https://randomuser.me/api/portraits/men/1.jpg" alt="User Avatar">
                    </div>
                </div>
            </header>

    <script>
        document.getElementById('toggle-sidebar').addEventListener('click', function () {
            document.querySelector('.bg-gray-800').classList.toggle('hidden');
        });
    </script>
</body>
</html>