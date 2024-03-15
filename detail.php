<?php
include "koneksi/koneksi.php";
include "header.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

error_reporting(E_ALL);
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
            <!-- Gambar -->
            <!-- <img src="./img/grab-v3J53MWPvzA-unsplash.jpg" alt="Nama Gambar" class="w-full h-96 object-contain bg-center rounded-md"> -->
            <?php
            if (isset($imageData)) {
                echo '<img src="data:image/jpeg;base64,' . base64_encode($imageData) . '" alt="' . $title . '" class="w-full max-h-screen object-contain bg-center rounded-md">';
                echo '</a>';
            } else {
                echo '<p>Postingan tidak ditemukan.</p>';
            }
            ?>

            <!-- Informasi Gambar -->
            <div class="mt-8">
                <h1 class="text-4xl font-semibold"> <?php echo $title ?></h1>
                <p class="text-gray-600">ID: <?php echo $id_gambar ?></p>
                <p class="text-gray-600">Harga: <?php echo "$" . $harga ?></p>
                <p class="text-gray-600">
                    <?php
                    if ($ownerusername === $username) {
                        // Jika ini adalah username pengguna saat ini, arahkan ke account.php
                        echo "Owner: <a href='account.php'>" . $ownerusername . "</a>";
                    } else {
                        // Jika ini adalah username lain, arahkan ke viewAccount.php
                        echo "Upload By: <a href='viewAccount.php?username=" . $ownerusername . "'>" . $ownerusername . "</a>";
                    }
                    ?>
                </p>

                </p>
            </div>

            <div class="mt-4">
    <h2 class="text-lg font-semibold">Category:</h2>
    <p class="text gray-800"><?php echo $kategori ?></p>
</div>

            <div class="mt-4">
                <h2 class="text-lg font-semibold">Stock:</h2>
                <p class="text gray-800"><?php echo $stock ?></p>
            </div>

            <!-- Deskripsi Gambar -->
            <div class="mt-4">
                <h2 class="text-lg font-semibold">Deskripsi:</h2>
                <p class="text-gray-800"><?php echo $description ?></p>
            </div>

            <!-- Tag Gambar -->
            <div class="mt-4">
                <h2 class="text-lg font-semibold">Tag:</h2>
                <ul class="flex space-x-2">
                    <?php
                    foreach ($tags as $tag) {
                        echo '<li class="bg-gray-300 px-2 py-1 rounded-full">' . $tag . '</li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="mt-8 space-x-4">
            <?php
if ($ownerusername === $username) {
    // Jika ini adalah username pengguna saat ini, arahkan ke account.php
    echo '<a href="setting/editPost.php?id=' . $postId . '" name="edit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Edit Post</a>';
    echo '<a href="proses/prosesDelete.php?id=' . $postId . '" name="delete" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">Delete</a>';
} else {
    // Jika ini adalah username lain, arahkan ke viewAccount.php
    echo '<form action="proses/prosesBeli.php" method="post">';
    echo '<input type="hidden" name="id" value="' . $postId . '">';
    echo '<button type="submit" name="beli" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Beli</button>';
    echo '<button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold ml-2 py-2 px-4 rounded-full" onclick="window.history.back()">Back</button>';
    echo '</form>';
}
?>
                 

                <!-- <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">Laporkan</button> -->
                <!-- <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Simpan</button> -->
            </div>
        </div>
    </div>

</body>

</html>