<?php
session_start();

// Include your database connection file if needed
include "../koneksi/koneksi.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username'];
    $newPassword = $_POST['new_password'];
    $bio = mysqli_real_escape_string($conn, $_POST['bio']);

    
    // Update bio and password if needed
    if (!empty($newPassword)) {
        // Update the password if a new one is provided
        $updateQuery = "UPDATE users SET password='$newPassword', bio='$bio' WHERE username='$username'";
    } else {
        $updateQuery = "UPDATE users SET bio='$bio' WHERE username='$username'";
    }

    // Execute the update query
    if (mysqli_query($conn, $updateQuery)) {
        // Redirect to the profile page after making changes
        header("Location: ../account.php");
        exit();
    } else {
        // Handle the database error
        echo "Error updating user information: " . mysqli_error($conn);
    }
}

  // // Check if a new profile photo is being uploaded
    // if (!empty($_FILES['profile_photo']['name'])) {
    //     $photoFileName = $_FILES['profile_photo']['name'];
    //     $photoTempName = $_FILES['profile_photo']['tmp_name'];
    
    //     // Move the uploaded file to a temporary location
    //     $photoDestination = '/home/yuu/.wine/dosdevices/z:/opt/lampp/htdocs/WebFoto/Data/img/' . $photoFileName;
    
    //     if (move_uploaded_file($photoTempName, $photoDestination)) {
    //         // Calculate the file size in KiB
    //         $fileSizeInKiB = round(filesize($photoDestination) / 1024, 2);
            
    //         // Update the profile photo information in the database, including the size
    //         $updatePhotoQuery = "UPDATE users SET profile_photo='$photoFileName', photo_size_kib='$fileSizeInKiB' WHERE username='$username'";
            
    //         if (!mysqli_query($conn, $updatePhotoQuery)) {
    //             // Handle the database error
    //             echo "Error updating profile photo: " . mysqli_error($conn);
    //             exit();
    //         }
    //     } else {
    //         // Handle the file upload error
    //         echo "Error uploading profile photo.";
    //         exit();
    //     }
    // }
?>


