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
        <main class="flex-1 p-4 overflow-y-auto bg-gray-100">

            <a>
                <h1 class="justify-center w-1/4 p-2 m-auto mb-2 font-semibold text-center transition delay-75 rounded-lg text-2x1 bg-slate-100 hover:bg-slate-200">Post Management</h1>
            </a>
            <div class="p-6 bg-white rounded-lg shadow-md">
                <table class="min-w-full text-center bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b border-l border-r bg-slate-400">ID</th>
                            <th class="px-4 py-2 border-b border-l border-r bg-slate-400">Owner</th>
                            <th class="px-4 py-2 border-b border-l border-r bg-slate-400">Title</th>
                            <th class="px-4 py-2 border-b border-l border-r bg-slate-400">Description</th>
                            <th class="px-4 py-2 border-b border-l border-r bg-slate-400">Price</th>
                            <th class="px-4 py-2 border-b border-l border-r bg-slate-400">Stock</th>
                            <th class="px-4 py-2 border-b border-l border-r bg-slate-400">Tags</th>
                            <th class="px-4 py-2 border-b border-l border-r bg-slate-400">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM posts";
                        $result = $conn->query($query);

                        while ($row = $result->fetch_assoc()) {
                            echo '<tr class="hover:bg-sky-100">';
                            echo '<td class="px-4 py-2 border-b border-l border-r">' . $row['id'] . '</td>';
                            echo '<td class="px-4 py-2 border-b border-l border-r">' . $row['user_id'] . '</td>';
                            echo '<td class="px-4 py-2 border-b border-l border-r">' . $row['title'] . '</td>';
                            echo '<td class="px-4 py-2 border-b border-l border-r">' . $row['description'] . '</td>';
                            echo '<td class="px-4 py-2 border-b border-l border-r">' . $row['harga'] . '</td>';
                            echo '<td class="px-4 py-2 border-b border-l border-r">' . $row['stock'] . '</td>';
                            echo '<td class="px-2 py-2 border-b border-l border-r">' . $row['tags'] . '</td>';
                            echo '<td class="flex items-start gap-2 px-4 py-2 border-b">
                            <a class="px-2 py-1 text-white bg-red-500 rounded hover:bg-red-700" href="proses/deletePost.php?id=' . $row['id'] . '"><box-icon name="trash-alt" type="solid" color="#ffffff" ></box-icon></a>
                            <a class="px-2 py-1 text-white bg-green-500 rounded hover:bg-green-700" href="user/viewPostuser.php?id=' . $row['id'] . '"><box-icon name="paper-plane" color="#ffffff" ></box-icon></a>
                            </td>';
                            echo '</tr>';
                                
                        }
                        ?>
                    </tbody>
                    <!-- <button class="px-2 py-1 text-white bg-blue-500 rounded hover:bg-blue-700" onclick="editUser(' . $row['id'] . ')">Edit</button> -->
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