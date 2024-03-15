<?php
include "../koneksi/koneksi.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['id'])) {
    $postId = $_GET['id'];
    $query = "SELECT * FROM posts WHERE id = '$postId'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $desc = $row['description'];
        $title = $row['title'];
        $harga = $row['harga'];
        $stock = $row['stock'];
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Handle case where no ID is provided
    echo "Post ID not provided";
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <title>Edit Post</title>
</head>
<body class="bg-gray-100">

<div class="container mx-auto p-8">
    <h1 class="text-3xl font-semibold mb-8">Edit Post</h1>

    <form action="../proses/editPost.php" method="POST" class="bg-white p-8 rounded-lg shadow-md">
        <!-- Nama -->
        <div class="mb-4">
            <label for="title" class="block text-gray-600 font-semibold">Username</label>
            <input type="text" name="title" id="title" class="w-full px-4 py-2 border border-gray-300 rounded-lg" value="<?php echo $row['title']?>">
        </div>
        
        <!-- Harga -->
        <div class="mb-4">
            <label for="harga" class="block text-gray-600 font-semibold">Harga</label>
            <input type="text" name="harga" id="harga" class="w-full px-4 py-2 border border-gray-300 rounded-lg" value="<?php echo $row['harga']; ?>">
        </div>

        <!-- Stock -->
        <div class="mb-4">
            <label for="stock" class="block text-gray-600 font-semibold">Stock</label>
            <input type="text" name="stock" id="stock" class="w-full px-4 py-2 border border-gray-300 rounded-lg" value="<?php echo $row['stock']; ?>">
        </div>

        <!-- Tags -->
        <!-- <div class="mb-4">
            <label for="tags" class="block text-gray-600 font-semibold">Tags</label>
            <input type="text" name="tags" id="tags" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div> -->

        <!-- Category -->
        <!-- <div class="mb-4">
            <label for="category" class="block text-gray-600 font-semibold">Category</label>
            <select name="category" id="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                <option value="category1">Category 1</option>
                <option value="category2">Category 2</option>
                <option value="category3">Category 3</option>
            </select>
        </div> -->

        <!-- Bio -->
        <div class="mb-4">
            <label for="description" class="block text-gray-600 font-semibold">Bio</label>
            <textarea name="description" id="description" class="w-full px-4 py-2 border border-gray-300 rounded-lg" rows="4" ><?php echo $desc?></textarea>
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Update Post</button>
            <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" onclick="window.history.back()">Cancel</button>
        </div>
    </form>
</div>

</body>
</html>
