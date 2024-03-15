<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Up Kredit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        .transparent-blur{
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
        }
    </style>
</head>
<body class="bg-gray-100 p-4 bg-cover" style="background-image: url(img/image2.jpg);">

    <div class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md mt-16 transparent-blur">
        <h2 class="text-2xl font-semibold mb-4">Top Up Kredit</h2>

        <form action="topupProses.php" method="post" enctype="multipart/form-data">
            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-white">Jumlah Kredit</label>
                <input type="number" name="amount" id="amount" class="mt-1 p-2 w-full border rounded-md">
            </div>
            <div class="mb-4">
                <label for="payment" class="block text-sm font-medium text-white">Bukti Transfer</label>
                <input type="file" name="payment" id="payment" class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Top Up</button>
                <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md" onclick="window.history.back();">Back</button>
            </div>
        </form>
    </div>

</body>
</html>
