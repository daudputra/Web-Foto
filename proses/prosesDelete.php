<?php
include "../koneksi/koneksi.php";
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Pengecekan keberadaan parameter 'id'
if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Pembersihan input dari potensi SQL injection
    $id = mysqli_real_escape_string($conn, $id);

    // Pengecekan hak akses pengguna
    $username = $_SESSION['username'];
    $checkAccessQuery = "SELECT user_id FROM posts WHERE id = $id";
    $accessResult = mysqli_query($conn, $checkAccessQuery);

    if ($accessResult && mysqli_num_rows($accessResult) > 0) {
        $accessData = mysqli_fetch_assoc($accessResult);
        $userId = $accessData['user_id'];

        // if ($username == $userId) 
            // Pengguna memiliki hak akses untuk menghapus postingan
            $sql = "DELETE FROM posts WHERE id = $id";

            if($conn->query($sql) === TRUE){
                echo '<script>alert("Delete Success")</script>';
                // header("Location: ../account.php");
                echo '<script>window.location.href = "../account.php"</script>';
            } else {
                echo "Error: " . $sql . "</br>" . $conn->error;
            }
        } else {
            echo "Anda tidak memiliki hak akses untuk menghapus postingan ini.";
        }
    } else {
        echo "Postingan tidak ditemukan.";
    }
// }

$conn->close();
?>
