<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah Gambar dengan Pratinjau</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container p-4 mx-auto mt-8">
    <h1 class="mb-4 text-2xl font-semibold">Unggah Gambar dengan Pratinjau</h1>

    <!-- Formulir Unggah Gambar -->
    <form id="form-gambar" action="../proses/post.php" method="POST" enctype="multipart/form-data" class="p-4 bg-white rounded-lg shadow-md">
        <!-- Pilih Gambar -->
        <div class="mb-4">
            <label for="gambar" class="block text-lg font-semibold">Pilih Gambar</label>
            <input type="file" name="image" accept=".png, .jpg, .jpeg" id="gambar" class="w-full p-2 border border-gray-300 rounded-md">
        </div>

        <!-- Pratinjau Gambar -->
        <div id="pratinjau-gambar" style="display: none;" class="mb-4">
            <label class="block text-lg font-semibold">Pratinjau Gambar:</label>
            <img id="gambar-pratinjau" class="mt-2 rounded-md" alt="Pratinjau Gambar" style="max-width: 100%;">
        </div>

        <!-- Title -->
        <div class="mb-4">
            <label for="title" class="block text-lg font-semibold">Title</label>
            <input type="text" name="title" id="title" placeholder="Write Your Title..." class="w-full h-10 p-2 border border-gray-300 rounded-md">
        </div>

        <!-- Harga -->
        <div class="mb-4">
            <label for="harga" class="block text-lg font-semibold">Harga</label>
            <input type="number" name="harga" id="harga" placeholder="Amount a Price.." class="w-full h-10 p-2 border border-gray-300 rounded-md">
        </div>

        <div class="mb-4">
            <label for="stock" class="block text-lg font-semibold">Stock</label>
            <input type="number" name="stock" id="stock" placeholder="Stock.." class="w-full h-10 p-2 border border-gray-300 rounded-md">
        </div>
                <!-- kategori  -->
                <div class="mb-4">
            <label for="deskripsi" class="block text-lg font-semibold">Kategori</label>
            <select name="kategori" id="kategori" class="w-full h-10 p-2 border border-gray-300 rounded-md">
                <option value="Animal">Animals</option>
                <option value="Food" selected>Food</option>
                <option value="Nature">Nature</option>
                <option value="Sport">Sport</option>
                <option value="Explore">Explore</option>
                <option value="Vechile">Vehicle</option>
                <option value="Desain">Desain</option>
                <option value="Illustration">Illustration</option>
            </select>
        </div>


        <!-- Deskripsi Gambar -->
        <div class="mb-4">
            <label for="deskripsi" class="block text-lg font-semibold">Deskripsi</label>
            <textarea name="description" id="deskripsi" placeholder="Write Your Image Descrption" class="w-full h-20 p-2 border border-gray-300 rounded-md"></textarea>
        </div>
                <!-- Tags -->
                <div class="mb-4">
            <label for="tags" class="block text-lg font-semibold">Tags</label>
            <input type="text" name="tags" placeholder="Tags..." id="tags" class="w-full h-10 p-2 border border-gray-300 rounded-md">
        </div>

        <!-- Tombol Unggah -->
        <div class="flex justify-center mt-4">
<button type="button" class="px-4 py-2 mr-4 font-bold text-white bg-red-500 rounded-full hover:bg-red-700" onclick="goBack()">
    Close
</button>

            <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700">
                Post
            </button>
        </div>
    </form>
</div>

<script>
    // Mengambil elemen input gambar dan elemen pratinjau gambar
    const inputGambar = document.getElementById('gambar');
    const pratinjauGambar = document.getElementById('pratinjau-gambar');
    const gambarPratinjau = document.getElementById('gambar-pratinjau');

    // Mendengarkan perubahan pada input gambar
    inputGambar.addEventListener('change', function() {
        if (inputGambar.files && inputGambar.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                // Menampilkan pratinjau gambar
                gambarPratinjau.src = e.target.result;
                pratinjauGambar.style.display = 'block';
            }

            reader.readAsDataURL(inputGambar.files[0]);
        }
    });

    // tombol kembali untukk button close
    function goBack(){
        window.history.back();
    }
</script>
</body>
</html>
