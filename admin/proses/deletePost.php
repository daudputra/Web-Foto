<?php
include "../../koneksi/koneksi.php";

Error_reporting(E_ALL);
ini_set('display_errors', 1);


if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM posts WHERE id = $id";

    if($conn->query($sql) === TRUE){
        header("Location: ../viewPost.php");
    }else{
        echo "Error: " . $sql . "</br>" . $conn->error;
    }
}

$conn->close();
?>