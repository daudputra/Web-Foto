<!DOCTYPE html>
<html>
<head>
    <title>Edit Foto - Admin Panel</title>
    <!-- Tautan ke stylesheet Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <header class="bg-blue-500 text-white p-4">
            <h1 class="text-2xl font-semibold">Edit Foto</h1>
            <a href="dashboard.php" class="text-sm underline">Kembali ke Dasbor</a>
        </header>
        <main class="bg-white rounded-lg p-8 mt-4 lg:w-1/2 mx-auto">
            <form action="update_photo.php" method="post" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="photoTitle" class="block text-gray-700 font-semibold">Judul Foto:</label>
                    <input type="text" id="photoTitle" name="photoTitle" value="Nama Foto Yang Diubah" class="w-full lg:w-3/4 p-2 border border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="photoDescription" class="block text-gray-700 font-semibold">Deskripsi Foto:</label>
                    <textarea id="photoDescription" name="photoDescription" class="w-full lg:w-3/4 p-2 border border-gray-300 rounded">Deskripsi Foto Yang Diubah</textarea>
                </div>
                <div class="mb-4">
                    <label for="photoPrice" class="block text-gray-700 font-semibold">Harga:</label>
                    <input type="number" id="photoPrice" name="photoPrice" value="100" class="w-full lg:w-3/4 p-2 border border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="photoTags" class="block text-gray-700 font-semibold">Tag Foto:</label>
                    <input type="text" id="photoTags" name="photoTags" value="tag1, tag2, tag3" class="w-full lg:w-3/4 p-2 border border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="photoImage" class="block text-gray-700 font-semibold">Ganti Gambar:</label>
                    <input type="file" id="photoImage" name="photoImage" class="p-2">
                </div>
                <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-700">Simpan Perubahan</button>
            </form>
        </main>
    </div>
</body>
</html>
