<?php
include "../koneksi/koneksi.php";
session_start();
if (!$_SESSION['id']) {
    header("Location: ../login.php");
    exit();
}

// Query untuk mengambil jumlah pengguna
$queryUsers = "SELECT COUNT(*) AS userCount FROM users";
$resultUsers = $conn->query($queryUsers);
$userCount = $resultUsers->fetch_assoc()['userCount'];

// Query untuk mengambil jumlah post
$queryPosts = "SELECT COUNT(*) AS postCount FROM posts";
$resultPosts = $conn->query($queryPosts);
$postCount = $resultPosts->fetch_assoc()['postCount'];

// Query untuk mengambil jumlah transaksi
$queryTransactions = "SELECT COUNT(*) AS transactionCount FROM transaksi";
$resultTransactions = $conn->query($queryTransactions);
$transactionCount = $resultTransactions->fetch_assoc()['transactionCount'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <title>Admin Dashboard</title>
    <?php include "header.php"; ?>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Main Content -->
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-4">
        <!-- Your content goes here -->
        <div class="bg-white p-6 rounded-md shadow-md">
            <h1 class="text-2xl font-semibold mb-4">Dashboard</h1>

            <!-- Example: Statistics Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:grid-cols-2">
                <a href="viewUser.php">
                <div class="bg-blue-500 p-4 text-white rounded-md transition delay-100 hover:bg-blue-800">
                    <h2 class="text-lg font-semibold">Users</h2>
                    <p class="text-3xl font-bold"><?php echo $userCount; ?></p>
                </div>
                </a>
                <a href="viewPost.php">
                <div class="bg-green-500 p-4 text-white rounded-md transition delay-100 hover:bg-green-800">
                    <h2 class="text-lg font-semibold">Post</h2>
                    <p class="text-3xl font-bold"><?php echo $postCount ?></p>
                </div>
                </a>
                <a href="viewTransaction.php">
                <div class="bg-yellow-500 p-4 text-white rounded-md transition delay-100 hover:bg-yellow-600">
                    <h2 class="text-lg font-semibold">Transaction</h2>
                    <p class="text-3xl font-bold"><?php echo $transactionCount ?></p>
                </div>
                </a>
                <!-- <div class="bg-red-500 p-4 text-white rounded-md transition delay-100 hover:bg-red-800">
                    <h2 class="text-lg font-semibold">Report</h2>
                    <p class="text-3xl font-bold">890</p>
                </div> -->
            </div>

            <!-- Example: Recent Orders Table -->
            <!-- <div class="mt-8">
                <h2 class="text-xl font-semibold mb-4">Recent Orders</h2>
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Order ID</th>
                            <th class="py-2 px-4 border-b">Product</th>
                            <th class="py-2 px-4 border-b">Amount</th>
                            <th class="py-2 px-4 border-b">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b">#12345</td>
                            <td class="py-2 px-4 border-b">Product A</td>
                            <td class="py-2 px-4 border-b">$100</td>
                            <td class="py-2 px-4 border-b">Shipped</td>
                        </tr>
                    </tbody>
                </table>
            </div> -->

            <!-- Add more interesting components as needed -->
            <!-- <div class="mt-8">
    <div class="bg-white p-6 rounded-md shadow-md">
        <h2 class="text-xl font-semibold mb-4">Additional Information</h2>
        <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor bibendum sem, eget tempus velit congue non. Vivamus at sapien quis augue pellentesque venenatis id ut ligula.</p>
    </div>
</div> -->

        </div>
    </main>
</body>
</html>
