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
<body class="font-sans leading-normal tracking-normal bg-gray-100">
    <!-- Main Content -->
    <main class="flex-1 p-4 overflow-x-hidden overflow-y-auto bg-gray-100">
        <!-- Your content goes here -->
        <div class="p-6 bg-white rounded-md shadow-md">
            <h1 class="mb-4 text-2xl font-semibold">Dashboard</h1>

            <!-- Example: Statistics Cards -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 md:grid-cols-2">
                <a href="viewUser.php">
                <div class="p-4 text-white transition delay-100 bg-blue-500 rounded-md hover:bg-blue-800">
                    <h2 class="text-lg font-semibold">Users</h2>
                    <p class="text-3xl font-bold"><?php echo $userCount; ?></p>
                </div>
                </a>
                <a href="viewPost.php">
                <div class="p-4 text-white transition delay-100 bg-green-500 rounded-md hover:bg-green-800">
                    <h2 class="text-lg font-semibold">Post</h2>
                    <p class="text-3xl font-bold"><?php echo $postCount ?></p>
                </div>
                </a>
                <a href="viewTransaction.php">
                <div class="p-4 text-white transition delay-100 bg-yellow-500 rounded-md hover:bg-yellow-600">
                    <h2 class="text-lg font-semibold">Transaction</h2>
                    <p class="text-3xl font-bold"><?php echo $transactionCount ?></p>
                </div>
                </a>
                <!-- <div class="p-4 text-white transition delay-100 bg-red-500 rounded-md hover:bg-red-800">
                    <h2 class="text-lg font-semibold">Report</h2>
                    <p class="text-3xl font-bold">890</p>
                </div> -->
            </div>

            <!-- Example: Recent Orders Table -->
            <!-- <div class="mt-8">
                <h2 class="mb-4 text-xl font-semibold">Recent Orders</h2>
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b">Order ID</th>
                            <th class="px-4 py-2 border-b">Product</th>
                            <th class="px-4 py-2 border-b">Amount</th>
                            <th class="px-4 py-2 border-b">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 border-b">#12345</td>
                            <td class="px-4 py-2 border-b">Product A</td>
                            <td class="px-4 py-2 border-b">$100</td>
                            <td class="px-4 py-2 border-b">Shipped</td>
                        </tr>
                    </tbody>
                </table>
            </div> -->

            <!-- Add more interesting components as needed -->
            <!-- <div class="mt-8">
    <div class="p-6 bg-white rounded-md shadow-md">
        <h2 class="mb-4 text-xl font-semibold">Additional Information</h2>
        <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor bibendum sem, eget tempus velit congue non. Vivamus at sapien quis augue pellentesque venenatis id ut ligula.</p>
    </div>
</div> -->

        </div>
    </main>
</body>
</html>
