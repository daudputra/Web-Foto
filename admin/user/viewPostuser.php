<?php
include "../../koneksi/koneksi.php";
// include "header.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

error_reporting(0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if (!isset($_SESSION['username'])) {
    echo "<script>alert('Anda harus login terlebih dahulu')</script>";
    echo "<script>window.location.href = 'login.php'</script>";
}

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Query untuk mengambil data pengguna
    $userQuery = "SELECT username, profile_photo FROM users WHERE username = '$username'";
    $userResult = mysqli_query($conn, $userQuery);

    if ($userResult && mysqli_num_rows($userResult) > 0) {
        $userData = mysqli_fetch_assoc($userResult);
        $profileImage = $userData['profile_photo'];
        $username = $userData['username'];
    }
}



if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    $query = "SELECT id, image_path, title, description, harga, stock, kategori FROM posts WHERE id = $postId";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $post = mysqli_fetch_assoc($result);
        $imageData = $post['image_path'];
        $stock = $post['stock'];
        $title = $post['title'];
        $description = $post['description'];
        $harga = $post['harga'];
        $id_gambar = $post['id'];
        $kategori = $post['kategori'];
    } else {
        echo "Postingan tidak ditemukan.";
        exit;
    }
} else {
    echo "ID postingan tidak valid.";
    exit;
}

// Query untuk mengambil tag yang terkait dengan postingan
$tagQuery = "SELECT tags FROM posts WHERE id = $postId";
$tagResult = mysqli_query($conn, $tagQuery);

$tags = [];
if ($tagResult && mysqli_num_rows($tagResult) > 0) {
    $tagsData = mysqli_fetch_assoc($tagResult);
    // Membagi tag menjadi array
    $tags = explode(',', $tagsData['tags']);
}

if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    $query = "SELECT p.id, p.image_path, p.title, p.description, p.harga, p.stock, u.username, u.profile_photo 
              FROM posts p
              JOIN users u ON p.user_id = u.id
              WHERE p.id = $postId";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $post = mysqli_fetch_assoc($result);
        $imageData = $post['image_path'];
        $stock = $post['stock'];
        $title = $post['title'];
        $description = $post['description'];
        $harga = $post['harga'];
        $ownerusername = $post['username'];
        $ownerProfilePhoto = $post['profile_photo'];
    } else {
        echo "Postingan tidak ditemukan.";
        exit;
    }
} else {
    echo "ID postingan tidak valid.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Gambar</title>
    <!-- Tambahkan tautan ke file CSS Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-4 mt-2">
        <div class="bg-white p-4 rounded-lg shadow-md">
           
            <?php
            if (isset($imageData)) {
                echo '<img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="' . $title . '" class="w-full max-h-screen object-contain bg-center rounded-md">';
                echo '</a>';
            } else {
                echo '<p>Postingan tidak ditemukan.</p>';
            }
            ?>

            <!-- <div class="mt-8">
                <h1 class="text-4xl font-semibold"> <?php echo $title ?></h1>
                <p class="text-gray-600">ID: <?php echo $id_gambar ?></p>
                <p class="text-gray-600">Harga: <?php echo "$" . $harga ?></p>
                <p class="text-gray-600">
                    <?php
                    if ($ownerusername === $username) {
                        echo "Owner: <a href='account.php'>" . $ownerusername . "</a>";
                    } else {
                        echo "Upload By: <a href='viewAccount.php?username=" . $ownerusername . "'>" . $ownerusername . "</a>";
                    }
                    ?>
                </p>

                </p>
            </div> -->

            <!-- <div class="mt-4">
                <h2 class="text-lg font-semibold">Category:</h2>
                <p class="text gray-800"><?php echo $kategori ?></p>
            </div>

            <div class="mt-4">
                <h2 class="text-lg font-semibold">Stock:</h2>
                <p class="text gray-800"><?php echo $stock ?></p>
            </div>

            <div class="mt-4">
                <h2 class="text-lg font-semibold">Deskripsi:</h2>
                <p class="text-gray-800"><?php echo $description ?></p>
            </div>

            <div class="mt-4">
                <h2 class="text-lg font-semibold">Tag:</h2>
                <ul class="flex space-x-2">
                    <?php
                    foreach ($tags as $tag) {
                        echo '<li class="bg-gray-300 px-2 py-1 rounded-full">' . $tag . '</li>';
                    }
                    ?>
                </ul>
            </div> -->
            <!-- <div class="mt-8 space-x-4">
                <a class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" onclick="window.history.back()">Back</a>
            </div> -->
        </div>
    </div>

</body>

</html>