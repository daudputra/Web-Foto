<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah Gambar dengan Pratinjau</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto p-4 mt-8">
    <h1 class="text-2xl font-semibold mb-4">Unggah Gambar dengan Pratinjau</h1>

    <!-- Formulir Unggah Gambar -->
    <form id="form-gambar" action="../proses/post.php" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded-lg shadow-md">
        <!-- Pilih Gambar -->
        <div class="mb-4">
            <label for="gambar" class="block text-lg font-semibold">Pilih Gambar</label>
            <input type="file" name="image" accept=".png, .jpg, .jpeg" id="gambar" class="border border-gray-300 p-2 rounded-md w-full">
        </div>

        <!-- Pratinjau Gambar -->
        <div id="pratinjau-gambar" style="display: none;" class="mb-4">
            <label class="block text-lg font-semibold">Pratinjau Gambar:</label>
            <img id="gambar-pratinjau" class="mt-2 rounded-md" alt="Pratinjau Gambar" style="max-width: 100%;">
        </div>

        <!-- Title -->
        <div class="mb-4">
            <label for="title" class="block text-lg font-semibold">Title</label>
            <input type="text" name="title" id="title" placeholder="Write Your Title..." class="border border-gray-300 p-2 rounded-md h-10 w-full">
        </div>

        <!-- Harga -->
        <div class="mb-4">
            <label for="harga" class="block text-lg font-semibold">Harga</label>
            <input type="number" name="harga" id="harga" placeholder="Amount a Price.." class="border border-gray-300 p-2 rounded-md h-10 w-full">
        </div>

        <div class="mb-4">
            <label for="stock" class="block text-lg font-semibold">Stock</label>
            <input type="number" name="stock" id="stock" placeholder="Stock.." class="border border-gray-300 p-2 rounded-md h-10 w-full">
        </div>
                <!-- kategori  -->
                <div class="mb-4">
            <label for="deskripsi" class="block text-lg font-semibold">Kategori</label>
            <select name="kategori" id="kategori" class="border border-gray-300 p-2 rounded-md h-10 w-full">
                <option value="Animal">Animals</option>
                <option value="Food" selected>Food</option>
                <option value="Nature">Nature</option>
                <option value="Sport">Sport</option>
                <option value="Explore">Explore</option>
                <option value="Vechile">Vehicle</option>
                <option value="Desain">Desain</option>
            </select>
        </div>


        <!-- Deskripsi Gambar -->
        <div class="mb-4">
            <label for="deskripsi" class="block text-lg font-semibold">Deskripsi</label>
            <textarea name="description" id="deskripsi" placeholder="Write Your Image Descrption" class="border border-gray-300 p-2 rounded-md h-20 w-full"></textarea>
        </div>
                <!-- Tags -->
                <div class="mb-4">
            <label for="tags" class="block text-lg font-semibold">Tags</label>
            <input type="text" name="tags" placeholder="Tags..." id="tags" class="border border-gray-300 p-2 rounded-md h-10 w-full">
        </div>

        <!-- Tombol Unggah -->
        <div class="mt-4 flex justify-center">
<button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full mr-4" onclick="goBack()">
    Close
</button>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
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
