<?php
include "../koneksi/koneksi.php";
include "header.php";

// Query untuk mendapatkan daftar top-up yang masih dalam status "pending"
$sql = "SELECT * FROM transaksi WHERE topup_status = 'pending'";
$result = $conn->query($sql);

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kelola Top-Up</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>

<body>


<main class="flex-1 overflow-y-auto bg-gray-100 p-4">

    <a>
        <h1 class="text-2x1 font-semibold mb-2 text-center justify-center bg-slate-100 hover:bg-slate-200 p-2 w-1/4 rounded-lg m-auto transition delay-75">Transaction Management</h1>
    </a>

    <table class="min-w-full bg-white border border-gray-300 text-center">
        <thead>
            <tr>
                <th class="bg-slate-400 py-2 px-4 border-b border-l border-r">ID</th>
                <th class="bg-slate-400 py-2 px-4 border-b border-l border-r">User ID</th>
                <!-- <th class="bg-slate-400 py-2 px-4 border-b border-l border-r">Username</th> -->
                <th class="bg-slate-400 py-2 px-4 border-b border-l border-r">Amount</th>
                <th class="bg-slate-400 py-2 px-4 border-b border-l border-r">Payment</th>
                <th class="bg-slate-400 py-2 px-4 border-b border-l border-r">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                $topupId = $row['id'];
                $userId = $row['user_id'];
                $amount = $row['amount'];
                echo '<tr class="hover:bg-sky-100">';
                echo '<td class="py-2 px-4 border-b border-l border-r">' . $topupId . '</td>';
                echo '<td class="py-2 px-4 border-b border-l border-r">' . $userId . '</td>';
                // echo '<td class="py-2 px-4 border-b border-l border-r">' . $username . '</td>';
                echo '<td class="py-2 px-4 border-b border-l border-r">' . $amount . '</td>';
                echo '<td class="py-2 px-4 border-b border-l border-r">';
                echo '<a href="payment.php?id=' . $topupId . '" class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded"> View</a>';
                echo '</td>';
                echo '<td class="py-2 px-4 border-b">
                    <form action="proses/topupProses.php" method="post">
                        <input type="hidden" name="topup_id" value="' . $topupId . '">
                        <input type="hidden" name="user_id" value="' . $userId . '">
                        <input type="hidden" name="amount" value="' . $amount . '">
                        <button type="submit" name="action" value="approve" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded"><box-icon name="like" type="solid" color="#ffffff" ></box-icon></button>
                        <button type="submit" name="action" value="reject" class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded"><box-icon name="dislike" type="solid" color="#ffffff" ></box-icon></button>
                    </form>
                </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</main>

</body>

</html>
