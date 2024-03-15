<?php
include "../../koneksi/koneksi.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    // Ambil data pengguna yang sedang dilihat
    $viewedId = $_GET['id'];
    $query = "SELECT profile_photo, username, bio FROM users WHERE id = '$viewedId'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // Check if $row is not null before accessing its elements
        if ($row !== null) {
            $username = $row['username'];
            $userBio = $row['bio'];
            $profile = $row['profile_photo'];
        } else {
            echo "Error: User not found.";
            exit();
        }
    } else {
        echo "Error: " . mysqli_error($conn);
        exit();
    }
} else {
    // Display an error message or redirect the user to a default page
    echo "Error: User ID parameter is not set.";
    // OR
    // header("Location: default-page.php");
    exit(); // Make sure to exit after redirection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil <?php echo $username; ?></title>
    <!-- Tambahkan link ke CDN Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <style>
        #bg-profile {
            background-image: url('../../img/image2.jpg');
            background-position: center;
            background-size: cover;
        }

        /* Efek Hover */
        .hover-scale {
            transition: transform 0.3s ease-in-out;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8 px-4">
        <div class="flex flex-wrap gap-2 p-6 bg-cover rounded-xl bg-center" id="bg-profile">
            <div>
                <?php if (!empty($profile)) : ?>
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($profile); ?>" class="rounded-full w-40 h-40 object-cover object-center" alt="Foto Profil">
                <?php else : ?>
                    <img src="../../img/user1.jpg" class="rounded-full w-40 h-40" alt="Image-Profile">
                <?php endif; ?>
            </div>
            <div class="md:w-2/3  flex flex-col justify-center">
                <h1 class="text-3xl font-semibold mb-2 text-white"><?php echo $username; ?></h1>
                <p class="text-gray-500 line-clamp-2"><?php echo $userBio; ?></p>
                <div class="mt-4">
                    <!-- Tombol "Ikuti" untuk pengguna lain -->
                    <!-- <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Bio</button> -->
                </div>
            </div>
        </div>

        <div class="mt-8">
            <h2 class="text-2xl font-semibold mb-4">Foto-foto Terbaru</h2>
            <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 mt-4">

                <!-- Proses tampil dan ambil gambar -->
                <?php
                $query_posts = "SELECT id, image_path, title FROM posts WHERE user_id = (SELECT id FROM users WHERE username = '$viewedId') ORDER BY id DESC LIMIT 99";
                $result_posts = mysqli_query($conn, $query_posts);

                if ($result_posts) {
                    while ($post = mysqli_fetch_assoc($result_posts)) {
                        $imagePath = $post['image_path'];
                        $id = $post['id'];

                        // Adjust the path based on your file structure
                        $imageSrc = '../../' . $imagePath;

                        ?>

                        <!-- Gambar-gambar terbaru di sini -->
                        <div class="rounded-lg p-2">
                            <a href="../../detail.php/?id=<?php echo $id; ?>" class="cursor-pointer">
                                <img src="<?= $imageSrc; ?>" alt="<?= $post['title']; ?>" class="w-full h-auto rounded-lg hover-scale">
                            </a>
                        </div>

                        <?php
                    }
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
