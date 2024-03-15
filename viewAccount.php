<?php
include "header.php";
include "koneksi/koneksi.php";

// Periksa apakah pengguna sudah masuk, jika tidak, arahkan ke halaman login
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}

// Ambil data pengguna yang sedang dilihat
$viewedUsername = $_GET['username']; // Anda perlu mengambil username dari URL atau sumber lain
$query = "SELECT profile_photo, username, bio FROM users WHERE username = '$viewedUsername'";
$result = mysqli_query($conn, $query);

if ($result) {
  $row = mysqli_fetch_assoc($result);
  $username = $row['username'];
  $userBio = $row['bio'];
  $profile = $row['profile_photo'];
} else {
  echo "Error: " . mysqli_error($conn);
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
            background-image: url('img/image2.jpg');
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
                    <img src="img/user1.jpg" class="rounded-full w-40 h-40" alt="Image-Profile">
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
                $query_posts = "SELECT id, image_path, title FROM posts WHERE user_id = (SELECT id FROM users WHERE username = '$viewedUsername') ORDER BY id DESC LIMIT 99";
                $result_posts = mysqli_query($conn, $query_posts);

                if ($result_posts) {
                    while ($post = mysqli_fetch_assoc($result_posts)) {
                        $imageData = $post['image_path'];
                        $id = $post['id'];

                        // Mengonversi data blob ke format gambar yang benar
                        $imageSrc = 'data:' . ';base64,' . base64_encode($imageData);

                        ?>

                        <!-- Gambar-gambar terbaru di sini -->
                        <div class="rounded-lg p-2">
                            <a href="detail.php/?id=<?php echo $id; ?>" class="cursor-pointer">
                                <img src="data:image/jpeg;base64,<?= base64_encode($imageData); ?>" alt="<?= $post['title']; ?>" class="w-full h-auto rounded-lg hover-scale">
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
