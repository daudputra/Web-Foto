<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com/"></script>
    <title>Edit Profil</title>
    <style>
        /* Style untuk overlay hitam di belakang popup */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1;
        }

        /* Style untuk popup */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            z-index: 2;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        /* Tombol penutup popup */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4 mt-2">
        <!-- Tambahkan tombol atau tautan yang akan memicu pop-up -->
        <button id="showPopupButton" class="bg-blue-500 hover-bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Edit Profil</button>

        <!-- Overlay untuk latar belakang popup -->
        <div class="overlay" id="overlay"></div>

        <!-- Popup -->
        <div class="popup" id="popup">
            <span class="close-btn" id="closePopup">&times;</span>
            <h1 class="text-4xl font-semibold mb-4">Edit Profil</h1>
            
            <!-- Tempatkan konten edit profil Anda di sini -->
            <form method="POST" enctype="multipart/form-data" action="../proses/editProfile.php">
                <!-- Isi form edit profil Anda di sini -->
                
                <div class="mt-4">
                    <button type="submit" class="bg-blue-500 hover-bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Fungsi untuk menampilkan pop-up
        function showPopup() {
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('popup').style.display = 'block';
        }

        // Fungsi untuk menyembunyikan pop-up
        function closePopup() {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('popup').style.display = 'none';
        }

        // Tambahkan event listener untuk tampilkan dan sembunyikan pop-up
        document.getElementById('showPopupButton').addEventListener('click', showPopup);
        document.getElementById('closePopup').addEventListener('click', closePopup);
    </script>
</body>
</html>
