<?php
session_start();

require_once '../dbconnection.php';
$id = $_POST['id'];
$decrypted_id = openssl_decrypt(urldecode($id), 'AES-128-ECB', 'your_secret_key');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $url = $_POST['url'];


    if(empty($name)){
        $errors['name'] = "The Middle Menu name is required";
    }
    if(empty($url)){
        $errors['url'] = "The Middle Menu url is required";
    }
    if ($errors) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $_POST;
        header("Location: listing_middle_menu.php");
        exit();
    }
    $photoImagePath = $_POST['old_image'] ?? null; // Default to old image path

    $photo_image = $_FILES['image'] ?? null;
    $maxFileSize = 5242880; // 5MB
    $allowedTypes = ["image/jpeg", "image/gif", "image/png"];

    // Check if a new image is uploaded
    if ($photo_image && $photo_image['name']) {
        // Validate uploaded image
        if (!$photo_image['name']) $errors['image'] = 'Image is required.';
        if ($photo_image['size'] > $maxFileSize || !in_array($photo_image['type'], $allowedTypes)) {
            $errors['image_Spec'] = 'Invalid image type or size.';
        }
        if ($errors) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
            header("Location: listing_middle_menu.php");
            exit();
        }

        // Generate new image filename
        function generateUniqueFileName($extension) {
            return uniqid() . '.' . $extension;
        }
        
        $photoImagePath = generateUniqueFileName(pathinfo($photo_image['name'], PATHINFO_EXTENSION));
        $uploadPath = "../../upload/" . $photoImagePath;
        move_uploaded_file($photo_image['tmp_name'], $uploadPath);
    }

    $sql = "UPDATE middle_menu SET name = '".$name."', url = '".$url."' ,image = '".$photoImagePath."' WHERE id = '".$decrypted_id."'";
    // print_r($sql);
    // die;

    if ($conn->query($sql) === TRUE) {
        $_SESSION['status'] = "Update";
        header("Location:listing_middle_menu.php");
        // print_r();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        header("Location:listing_middle_menu.php");

    }
}
?>
