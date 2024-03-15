<?php
include "header.php";
include "koneksi/koneksi.php";
// session_start();
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}


error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}



$query = "SELECT profile_photo, username, bio FROM users WHERE username = '{$_SESSION['username']}'";
$result = mysqli_query($conn, $query);

if ($result) {
  $row = mysqli_fetch_assoc($result);
  $username = $row['username'];
  $userBio = $row['bio'];
  $Profile = $row['profile_photo'];
} else {
  echo "Error: " . mysqli_error($conn);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Baru</title>
    <!-- Tambahkan link ke CDN Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <style>
        #bg-profile {
            background-image: url('img/image2.jpg');
            background-size: cover;
            background-position: center;
        }

                /* Efek Hover */
                .hover-scale {
            transition: transform 0.3s ease-in-out;
        }

        .hover-scale:hover {
            transform: scale(1.05);
        }
    #openSetting{
        display: hidden;
    }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8 px-4">
        <div class="flex flex-wrap gap-2 p-6 bg-cover rounded-xl bg-center" id="bg-profile">
            <div >
                <!-- <img src="../../WebFoto/image/anime.jpg" alt="" class="rounded-full w-40 h-40"> -->
                <?php if (!empty($Profile)) : ?>
            <img src="data:image/jpeg;base64,<?php echo base64_encode($Profile); ?>" class="rounded-full w-40 h-40 object-cover object-center" alt="Foto Profil">
        <?php else : ?>
          <img src="img/user1.jpg" class="rounded-full w-40 h-40" alt="Image-Profile">
        <?php endif; ?>
            </div>
            <div class="md:w-2/3  flex flex-col justify-center">
                <h1 class="text-3xl font-semibold mb-2 text-white"><?php echo $username?></h1>
                <p class="text-gray-500 line-clamp-2"><?php echo $userBio?></p>
                <div class="mt-4">
                    <a href="upload/" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Post</a>
                    <a href="setting/editProfile.php" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">Edit Profile</a>
                    <!-- <button onclick="openSetting()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">Setting</button> -->
                </div>
            </div>
        </div>

        <div id="settingModal" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center">
    <div class="bg-white p-8 rounded-lg">
        <span onclick="closeSetting()" class="absolute top-4 right-4 cursor-pointer text-gray-500 hover:text-gray-700">&times;</span>
        <a href="setting/editProfile.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Edit Profile</a>
        <a href="setting/editPost.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Edit Post</a>
    </div>
</div>


        <!-- Tambahkan kelas "mx-auto md:mx-0" untuk mengatur profil ke tengah pada ukuran layar yang berbeda
        <div class="md:flex-row md:flex mx-auto md:mx-0 rounded-3xl" id="bg-profile">
            <div class="md:flex-shrink-0 xs:pt-4 md:pt-0 pl-2">
                <img src="../img/user1.jpg" class="mx-auto mt-4 mb-4 ml-17 w-36 h-36 object-cover rounded-full" alt="Foto Profil">
            </div>
            <div class="p-6 md:w-2/3">
                <h1 class="text-3xl font-semibold mb-2 text-white">Nama Pengguna</h1>
                <p class="text-gray-500">Deskripsi singkat tentang pengguna.</p>
                <div class="mt-4">
                    <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Kirim Pesan</a>
                    <a href="#" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">Ikuti</a>
                </div>
            </div>
        </div> -->

        <div class="mt-8">
    <h2 class="text-2xl font-semibold mb-4">Foto-foto Terbaru</h2>
    <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 mt-4">

       <!-- proses tampil dan ambil gambar -->
       <?php
        $query_posts = "SELECT id, image_path, title FROM posts WHERE user_id = (SELECT id FROM users WHERE username = '{$_SESSION['username']}') ORDER BY id DESC LIMIT 99";
        $result_posts = mysqli_query($conn, $query_posts);

        if ($result_posts) {
          while ($post = mysqli_fetch_assoc($result_posts)) {
            $imageData = $post['image_path'];
            $id = $post['id'];

            // Mengonversi data blob ke format gambar yang benar
            $imageSrc = 'data:' . ';base64,' . base64_encode($imageData);

        ?>

            <!-- Gambar-gambar terbaru di sini -->
            <div class= "rounded-lg p-2">
                <a href="detail.php?id=<?php echo $id; ?>" class="cursor-default">
                    <img src="data:image/jpeg;base64,<?= base64_encode($imageData); ?>" alt="<?= $post['title'] ?>" class="w-full h-auto rounded-lg hover-scale">
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

    <script>
        function openSetting(){
            document.getElementById('settingModal').style.display = 'block';
        }
        function closeSetting(){
            document.getElementById('settingModal').style.display = 'none';
        }
    </script>
</body>
</html>