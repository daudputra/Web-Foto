<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <?php
    include "../koneksi/koneksi.php";
    include "header.php";
    ?>
</head>

<body>
    <main class="flex-1 overflow-y-auto bg-gray-100 p-4">

        <a>
            <h1 class="text-2x1 font-semibold mb-2 text-center justify-center bg-slate-100 hover:bg-slate-200 p-2 w-1/4 rounded-lg m-auto transition delay-75">User Management</h1>
        </a>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <table class="min-w-full bg-white border border-gray-300 text-center">
                <thead>
                    <tr>
                        <th class="bg-slate-400 py-2 px-4 border-b border-l border-r">ID</th>
                        <th class="bg-slate-400 py-2 px-4 border-b border-l border-r">Username</th>
                        <th class="bg-slate-400 py-2 px-4 border-b border-l border-r">Name</th>
                        <th class="bg-slate-400 py-2 px-4 border-b border-l border-r">Email</th>
                        <th class="bg-slate-400 py-2 px-4 border-b border-l border-r">Password</th>
                        <th class="bg-slate-400 py-2 px-4 border-b border-l border-r">Kredit</th>
                        <th class="bg-slate-400 py-2 px-4 border-b border-l border-r">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM users";
                    $result = $conn->query($query);

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr class="hover:bg-sky-100" onclick="redirectToDetail(' . $row['id'] . ')">';
                        echo '<td class="py-2 px-4 border-b border-l border-r">' . $row['id'] . '</td>';
                        echo '<td class="py-2 px-4 border-b border-l border-r">' . $row['username'] . '</td>';
                        echo '<td class="py-2 px-4 border-b border-l border-r">' . $row['full_name'] . '</td>';
                        echo '<td class="py-2 px-4 border-b border-l border-r">' . $row['email'] . '</td>';
                        echo '<td class="py-2 px-4 border-b border-l border-r">' . $row['password'] . '</td>';
                        echo '<td class="py-2 px-4 border-b border-l border-r">' . $row['kredit'] . '</td>';
                        echo '<td class="py-2 px-4 border-b">
                        <a href="proses/deleteUser.php?id=' . $row['id'] . '"><button class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded" onclick="deleteUser(' . $row['id'] . ')"><box-icon name="trash-alt" type="solid" color="#ffffff" ></box-icon></button></a>
                        </td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
                <!-- <button class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded" onclick="editUser(' . $row['id'] . ')">Edit</button> -->
            </table>
        </div>
    </main>
<!-- <script>
    function redirectToDetail(id) {
            window.location.href = "user/viewAccount.php?id=" + id;
        }
</script> -->
   
</body>

</html>