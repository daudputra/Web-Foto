        <?php
        // include "../header.php";
        include "../koneksi/koneksi.php";
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
          }
          

        $query = "SELECT bio FROM users WHERE username = '{$_SESSION['username']}'";
        $result = mysqli_query($conn, $query);

        if ($result) {
        $row = mysqli_fetch_assoc($result);
        $userBio = $row['bio'];
        } else {
        echo "Error: " . mysqli_error($conn);
        }

        error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <!-- Tambahkan tautan ke file CSS Tailwind CSS -->
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
            <title>Edit Profil</title>
        </head>
        <body class="bg-gray-100">
            <!-- <script>alert("Edit Foto Profile Error:v")</script> -->
            <div class="container mx-auto p-4 mt-2">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h1 class="text-4xl font-semibold mb-4">Edit Profil</h1>
                    
                    <!-- <form method="POST" enctype="multipart/form-data" action="../proses/editProfile.php"> -->
                    <form method="POST" enctype="multipart/form-data" action="../proses/editProfile.php">
                        <!-- <div class="mb-4">
                            <label for="username" class="block text-gray-600 font-semibold">Username</label>
                            <input type="text" name="username" id="username" value="<?php echo $_SESSION['username']; ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg" disabled>
                        </div> -->
                        
                        <div class="mb-4">
                            <label for="new_password" class="block text-gray-600 font-semibold">Kata Sandi Baru (kosongkan jika tidak ingin mengubah)</label>
                            <input type="password" name="new_password" id="new_password" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        </div>
                        
                        <div class="mb-4">
                            <label for="bio" class="block text-gray-600 font-semibold">Bio</label>
                            <textarea name="bio" id="bio" class="w-full px-4 py-2 border border-gray-300 rounded-lg" rows="4"><?php echo $userBio; ?></textarea>

                        </div>
                        
                        <!-- <div class="mb-4">
                            <label for="profile_photo" class="block text-gray-600 font-semibold">Foto Profil</label>
                            <input type="file" accept=".png, .jpg, .jpeg" name="profile_photo" id="profile_photo" class="w-full border border-gray-300 rounded-lg">

                        </div> -->
                        
                        <!-- <div class="mb-4">
                            <label class="block text-gray-600 font-semibold">Foto Profil Saat Ini</label>
                            <?php
                            if ($row = mysqli_fetch_assoc($result)) {
                                $profilePhoto = $row['profile_photo'];
                                if (!empty($profilePhoto)) {
                                    echo '<img src="' . $profilePhoto . '" alt="Foto Profil" class="w-32 h-32 object-cover rounded-full">';
                                }
                            }
                            ?>
                        </div> -->
                        
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Save</button>
                            <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" onclick="window.history.back()">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </body>
        </html>
