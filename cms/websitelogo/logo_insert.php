<?php
session_start();

require_once '../dbconnection.php';

$data = mysqli_query($conn, "SELECT * FROM `logo`");
$rowcount = mysqli_num_rows($data);
if ($rowcount > 0) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        $errors = [];
        $name = $_POST['name'];

        if(empty($name)){
            $errors['name'] = "The logo title is required";
        }

        $photo_image = $_FILES['logo_image'] ?? null;
        $maxFileSize = 5242880;
        $allowedTypes = ["image/jpeg", "image/gif", "image/png"];
        if (!$photo_image['name']) $errors['logo_image'] = 'Logo image is required.';
        if ($photo_image['size'] > $maxFileSize || !in_array($photo_image['type'], $allowedTypes)) $errors['logo_image_Spec'] = 'Invalid Logo image type or size.';
        if ($errors) {
            session_start();
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
            header("Location: logo.php");
            exit();
        }
        function generateUniqueFileName($extension) {
            return uniqid() . '.' . $extension;
        }

        $photoImagePath =  generateUniqueFileName(pathinfo($photo_image['name'], PATHINFO_EXTENSION));
        $uploadPath = "../../upload/" . $photoImagePath;
        move_uploaded_file($photo_image['tmp_name'], $uploadPath);

        $sql = "UPDATE logo SET name = '".$name."', image = '".$photoImagePath."'";
        // print_r($sql);
        // die;
        
        if ($conn->query($sql) === TRUE) {
            $_SESSION['update'] = "Update";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        header("Location:logo.php");
    }
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        $errors = [];
        $name = $_POST['name'];

        if(empty($name)){
            $errors['name'] = "The logo title is required";
        }

        $photo_image = $_FILES['logo_image'] ?? null;
        $maxFileSize = 5242880;
        $allowedTypes = ["image/jpeg", "image/gif", "image/png"];
          if (!$photo_image['name']) $errors['logo_image'] = 'Logo image is required.';
          if ($photo_image['size'] > $maxFileSize || !in_array($photo_image['type'], $allowedTypes)) $errors['logo_image_Spec'] = 'Invalid Logo image type or size.';
          if ($errors) {
            session_start();
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
            header("Location: logo.php");
            exit();
        }
        function generateUniqueFileName($extension) {
            return uniqid() . '.' . $extension;
        }

        $photoImagePath =  generateUniqueFileName(pathinfo($photo_image['name'], PATHINFO_EXTENSION));
        $uploadPath = "../../upload/" . $photoImagePath;
        move_uploaded_file($photo_image['tmp_name'], $uploadPath);
        $sql = "INSERT INTO logo (name, image) VALUES ('{$name}','{$photoImagePath}')";
        // print_r($sql);
        // die;

        if ($conn->query($sql) === TRUE) {
            $_SESSION['status'] = "Success";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        header("Location:logo.php");
    }
}
?>
