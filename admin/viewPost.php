    <?php
    include "../koneksi/koneksi.php";
    include "header.php";
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
         <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    </head>

    <body>
        <main class="flex-1 overflow-y-auto bg-gray-100 p-4">

            <a>
                <h1 class="text-2x1 font-semibold mb-2 text-center justify-center bg-slate-100 hover:bg-slate-200 p-2 w-1/4 rounded-lg m-auto transition delay-75">Post Management</h1>
            </a>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <table class="min-w-full bg-white border border-gray-300 text-center">
                    <thead>
                        <tr>
                            <th class="bg-slate-400 py-2 px-4 border-b border-l border-r">ID</th>
                            <th class="bg-slate-400 py-2 px-4 border-b border-l border-r">Owner</th>
                            <th class="bg-slate-400 py-2 px-4 border-b border-l border-r">Title</th>
                            <th class="bg-slate-400 py-2 px-4 border-b border-l border-r">Description</th>
                            <th class="bg-slate-400 py-2 px-4 border-b border-l border-r">Price</th>
                            <th class="bg-slate-400 py-2 px-4 border-b border-l border-r">Stock</th>
                            <th class="bg-slate-400 py-2 px-4 border-b border-l border-r">Tags</th>
                            <th class="bg-slate-400 py-2 px-4 border-b border-l border-r">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM posts";
                        $result = $conn->query($query);

                        while ($row = $result->fetch_assoc()) {
                            echo '<tr class="hover:bg-sky-100">';
                            echo '<td class="py-2 px-4 border-b border-l border-r">' . $row['id'] . '</td>';
                            echo '<td class="py-2 px-4 border-b border-l border-r">' . $row['user_id'] . '</td>';
                            echo '<td class="py-2 px-4 border-b border-l border-r">' . $row['title'] . '</td>';
                            echo '<td class="py-2 px-4 border-b border-l border-r">' . $row['description'] . '</td>';
                            echo '<td class="py-2 px-4 border-b border-l border-r">' . $row['harga'] . '</td>';
                            echo '<td class="py-2 px-4 border-b border-l border-r">' . $row['stock'] . '</td>';
                            echo '<td class="py-2 px-2 border-b border-l border-r">' . $row['tags'] . '</td>';
                            echo '<td class="py-2 px-4 border-b">
                            <a class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded" href="proses/deletePost.php?id=' . $row['id'] . '"><box-icon name="trash-alt" type="solid" color="#ffffff" ></box-icon></a>
                            <a class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded" href="user/viewPostuser.php?id=' . $row['id'] . '"><box-icon name="paper-plane" color="#ffffff" ></box-icon></a>
                            </td>';
                            echo '</tr>';
                                
                        }
                        ?>
                    </tbody>
                    <!-- <button class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded" onclick="editUser(' . $row['id'] . ')">Edit</button> -->
                </table>
            </div>
        </main>
        <script>
// function redirectToDetail(id) {
//     swal({
//         title: "Are you sure?",
//         text: "Are you sure you want to view post " + id + "?",
//         icon: "warning",
//         buttons: true,
//         dangerMode: true,
//     }).then((willRedirect) => {
//         if (willRedirect) {
//             window.location.href = "user/viewPostuser.php?id=" + id;
//         } else {
//             swal("View Post canceled.");
//         }
//     });
// }

function deleteUser(id) {
    console.log("ID Pengguna yang Akan Dihapus:", id);
    swal({
        title: "Are you sure?",
        text: "Are you sure you want to delete post " + id + "?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            window.location.href = "proses/deletePost.php?id=" + id;
            swal("Success delete!", {
                icon: "success",
            });
        } else {
            swal("Delete Post canceled.");
        }
    });
}

</script>
    </body>

    </html>