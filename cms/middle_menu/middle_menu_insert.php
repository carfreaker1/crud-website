<?php
session_start();
require_once '../dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $url = $_POST['url'];

    if(empty($name)){
        $errors['name'] = "The Middle Menu name is required";
    }
    if(empty($url)){
        $errors['url'] = "The Middle Menu url is required";
    }
    $photo_image = $_FILES['image'] ?? null;
    $maxFileSize = 5242880;
    $allowedTypes = ["image/jpeg", "image/gif", "image/png"];
    if (!$photo_image['name']) $errors['image'] = 'Image is required.';
    if ($photo_image['size'] > $maxFileSize || !in_array($photo_image['type'], $allowedTypes)) $errors['image_spec'] = 'Invalid image type or size.';
    if ($errors) {
    session_start();
    $_SESSION['errors'] = $errors;
    $_SESSION['old'] = $_POST;
    header("Location: create_middle_menu.php");
    exit();
    }
    function generateUniqueFileName($extension) {
        return uniqid() . '.' . $extension;
    }

    $photoImagePath =  generateUniqueFileName(pathinfo($photo_image['name'], PATHINFO_EXTENSION));
    $uploadPath = "../../upload/" . $photoImagePath;
    move_uploaded_file($photo_image['tmp_name'], $uploadPath);
    

    // Insert query
    $sql = "INSERT INTO middle_menu (name, url, image) VALUES ('$name', '$url', '$photoImagePath')";
    // print_r($sql);
    // die;
    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        $_SESSION['status'] = "Success";
        header("Location:create_middle_menu.php");
        exit(); // Ensure script execution stops after redirection
    } else {
        $_SESSION['status'] = "Error: " . $sql . "<br>" . $conn->error;
        header("Location:create_middle_menu.php");

    }

}


?>
